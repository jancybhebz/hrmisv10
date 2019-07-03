<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();
		$this->path = 'schema/data/migration/schema/';
		$this->created_sys_sql = 'schema/hrmisv10/hrmis-schema-upt.sql';
	}
	
	function get_table_list()
	{
		$this->hrmisv10 = null;
		$tbldb_hrmisv10 = array();
		$tbldb_hrmis = array();

		echo '<pre>';

		echo '<br>Create database hrmisv10_upt..';
		$check_db_exist = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'hrmisv10_upt'";
		$db_new_isexist = $this->db->query($check_db_exist)->result_array();
		if(count($db_new_isexist) > 0):
			$this->hrmisv10 = $this->load->database('hrmisv10_upt', TRUE);
		else:
			$create_db = $this->db->query('CREATE DATABASE IF NOT EXISTS hrmisv10_upt');
			if(!$create_db):
				echo '<br><b>ERR!!</b> Error in creating database for migration..';
			endif;
			$db_new_isexist = $this->db->query($check_db_exist)->result_array();
		endif;

		if(count($db_new_isexist) > 0):
			echo '<br>Checking database if not empty...';
			$this->hrmisv10 = $this->load->database('hrmisv10_upt', TRUE);
			if(count($this->hrmisv10->list_tables()) < 1):
				echo '<br>Importing database...';
				$this->import_database($this->hrmisv10);
			endif;
			# get the table list from hrmisv10 schema
			$tbldb_hrmisv10 = $this->hrmisv10->list_tables();
		else:
			echo '<br><b>ERR!!</b> Error in creating database for migration..';
		endif;

		# get the table list from current database
		$tbldb_hrmis = $this->db->list_tables();

		# call check_tables
		$this->check_tables($tbldb_hrmisv10, $tbldb_hrmis);
	}

	function check_tables($tbldb_hrmisv10, $tbldb_hrmis)
    {
    	echo '<br>Start creating sql file...';
        echo '<br>Checking Tables...';

        # get tables that does not exist in updated schema
        $this->write_sqlstmt('# Remove unused Tables that does not exist in updated schema');
        echo '<br># Remove unused Tables...';
        $tbl_toremove = array_diff($tbldb_hrmis,$tbldb_hrmisv10);
        foreach($tbl_toremove as $tbldel):
        	echo '<br># Remove table <i>'.$tbldel.'</i>...';
        	$this->write_sqlstmt('DROP TABLE `'.$tbldel.'`;');
        	echo '<br>DROP TABLE `'.$tbldel.'`;';
        endforeach;
        
        # get tables that exist in updated schema and not exist in current database, then create
        echo '<br>Add necessary Tables...';
        $tbl_toadd = array_diff($tbldb_hrmisv10,$tbldb_hrmis);
        foreach($tbl_toadd as $tbladd):
        	echo '<br>Add table <i>'.$tbladd.'</i>...';
        	$desc_tbl = $this->hrmisv10->query('DESCRIBE '.$tbladd.';')->result_array();
        	# populate fields
        	$arr_fields = array();
        	$arr_primary = array();
        	foreach($desc_tbl as $field):
        		$isnull = $field['Null'] == 'NO' ? 'NOT NULL' : 'NULL';
        		$default = $field['Default'] != '' ? "default '".$field['Default']."'" : '';
        		array_push($arr_fields,"`".$field['Field']."` ".$field['Type']." ".$isnull." ".$default." ".$field['Extra']);
        		# add primary
        		if($field['Key'] == 'PRI'):
        			array_push($arr_primary,"PRIMARY KEY  (`".$field['Field']."`)");
        		endif;
        	endforeach;

        	$new_tbl = "CREATE TABLE IF NOT EXISTS `".$tbladd."` (".implode(",",$arr_fields).(count($arr_primary) > 0 ? ','.implode(",",$arr_primary) : '').");";
        	echo $new_tbl;
			$this->write_sqlstmt('# Add table '.$tbldel);
			$this->write_sqlstmt($new_tbl);
        endforeach;
    }

    function fix_datetime_fields()
    {
    	echo '<pre>';
    	// $this->hrmisv10 = $this->load->database('hrmisv10_upt', TRUE);
    	$tbldb_hrmis = $this->db->list_tables();
    	foreach($tbldb_hrmis as $tbl):
    		$desc_tbl = $this->db->query('DESCRIBE '.$tbl.';')->result_array();
    		$arr_datatype = array_column($desc_tbl,'Type');
    		$fields_ddtime_to_varchar = array();
    		$fields_varchar_to_ddtime = array();
    		$fields_alter = array();

    		if(in_array('datetime',$arr_datatype)):
    			echo '<br><br>##DATETIME';
    			foreach($arr_datatype as $key => $dttype):
    				if($dttype == 'datetime'):
    					array_push($fields_ddtime_to_varchar, "CHANGE `".$desc_tbl[$key]['Field']."` `".$desc_tbl[$key]['Field']."` VARCHAR(20) DEFAULT NULL");
    					array_push($fields_varchar_to_ddtime, "CHANGE `".$desc_tbl[$key]['Field']."` `".$desc_tbl[$key]['Field']."` DATETIME DEFAULT NULL");
    					array_push($fields_alter,$desc_tbl[$key]['Field']);
    				endif;
    			endforeach;
    		endif;

    		if(in_array('date',$arr_datatype)):
    			echo '<br><br>##DATE';
    			foreach($arr_datatype as $key => $dttype):
    				if($dttype == 'date'):
    					array_push($fields_ddtime_to_varchar, "CHANGE `".$desc_tbl[$key]['Field']."` `".$desc_tbl[$key]['Field']."` VARCHAR(20) DEFAULT NULL");
    					array_push($fields_varchar_to_ddtime, "CHANGE `".$desc_tbl[$key]['Field']."` `".$desc_tbl[$key]['Field']."` DATE DEFAULT NULL");
    					array_push($fields_alter,$desc_tbl[$key]['Field']);
    				endif;
    			endforeach;
    		endif;

    		if(count($fields_alter) > 0):
	    		echo '<br># Fix date_time field in table '.$tbl;
	    		# Alter table, change date/datetime to varchar
	    		echo "<br>ALTER TABLE `".$tbl."` ".implode(',',$fields_ddtime_to_varchar).";";
	    		foreach($fields_alter as $field):
	    			# the update table, set null to datetime field with 0000-00-00 value
	    			echo "<br>UPDATE `".$tbl."` SET `".$field."` = NULL WHERE `".$field."` LIKE '0000%';";
	    			echo "<br>UPDATE `".$tbl."` SET `".$field."` = NULL WHERE `".$field."` LIKE '%-00-%';";
	    			echo "<br>UPDATE `".$tbl."` SET `".$field."` = NULL WHERE `".$field."` LIKE '%-00%';";
	    			# back the field to its field date/datetime
	    		endforeach;
	    		# Alter table, change varchar to date/datetime
	    		echo "<br>ALTER TABLE `".$tbl."` ".implode(',',$fields_varchar_to_ddtime).";";
	    	endif;
    	endforeach;
    }

    function update_fields()
    {
    	echo '<pre>';
    	$this->hrmisv10 = $this->load->database('hrmisv10_upt', TRUE);
    	$hrmisv10_table_list = $this->hrmisv10->list_tables();
    	$hrmis_table_list = $this->db->list_tables();

    	// print_r($hrmisv10_table_list);
    	// print_r($hrmis_table_list);

    	if(count($hrmisv10_table_list) != count($hrmis_table_list)):
    		# check if table list from both database is equal
    		echo 'There is error in migrating table, please try again.';
    		die();
    	else:
    		foreach($hrmis_table_list as $tbl):
    			echo '<br>Table '.$tbl;
    			echo '<br>Check Field';
    			$field_list_hrmisv10 = $this->hrmisv10->query('DESCRIBE '.$tbl.';')->result_array();
    			$field_list = $this->db->query('DESCRIBE '.$tbl.';')->result_array();
    			$field_diff = array_diff(array_column($field_list_hrmisv10,'Field'),array_column($field_list,'Field'));
    			echo '<hr>';
    		endforeach;
    	endif;

    	# get all table list

    }

	function import_database($dbconn) 
	{
		$sql_filename = 'hrmis-schema-upt.sql';

		$sql_contents = file_get_contents($this->path.$sql_filename);
		$sql_contents = explode(";", $sql_contents);

		foreach($sql_contents as $query):
			$pos = strpos($query,'ci_sessions');
			if($pos == false):
				$result = $dbconn->query($query);
			else:
				continue;
			endif;
		endforeach;
		echo '<br>Database Import Successfully!!...';
	}

	function write_sqlstmt($txt)
	{
		// file_put_contents($this->created_sys_sql, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
	}



}
