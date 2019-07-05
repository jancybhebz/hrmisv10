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
        $this->write_sqlstmt("# Remove unused Tables...");
        $tbl_toremove = array_diff($tbldb_hrmis,$tbldb_hrmisv10);
        foreach($tbl_toremove as $tbldel):
        	$this->write_sqlstmt("# Remove table <i>".$tbldel."</i>...");
        	$this->write_sqlstmt('DROP TABLE `'.$tbldel.'`;');
        endforeach;
        
        # get tables that exist in updated schema and not exist in current database, then create
        $this->write_sqlstmt("# Add necessary Tables...");
        $tbl_toadd = array_diff($tbldb_hrmisv10,$tbldb_hrmis);
        foreach($tbl_toadd as $tbladd):
        	$this->write_sqlstmt("# Add table <i>".$tbladd."</i>...");
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
    			$this->write_sqlstmt("# Fix Date Value.");
    			foreach($arr_datatype as $key => $dttype):
    				if($dttype == 'date'):
    					array_push($fields_ddtime_to_varchar, "CHANGE `".$desc_tbl[$key]['Field']."` `".$desc_tbl[$key]['Field']."` VARCHAR(20) DEFAULT NULL");
    					array_push($fields_varchar_to_ddtime, "CHANGE `".$desc_tbl[$key]['Field']."` `".$desc_tbl[$key]['Field']."` DATE DEFAULT NULL");
    					array_push($fields_alter,$desc_tbl[$key]['Field']);
    				endif;
    			endforeach;
    		endif;

    		if(count($fields_alter) > 0):
	    		$this->write_sqlstmt("# Fix date_time field in table '.$tbl");
	    		# Alter table, change date/datetime to varchar
	    		$this->write_sqlstmt("ALTER TABLE `".$tbl."` ".implode(',',$fields_ddtime_to_varchar).";");
	    		foreach($fields_alter as $field):
	    			# the update table, set null to datetime field with 0000-00-00 value
	    			$this->write_sqlstmt("UPDATE `".$tbl."` SET `".$field."` = NULL WHERE `".$field."` LIKE '0000%' OR `".$field."` LIKE '%-00-%' OR `".$field."` LIKE '%-00';");
	    			# back the field to its field date/datetime
	    		endforeach;
	    		# Alter table, change varchar to date/datetime
	    		$this->write_sqlstmt("ALTER TABLE `".$tbl."` ".implode(',',$fields_varchar_to_ddtime).";");
	    	endif;
    	endforeach;
    }

    function update_fields()
    {
    	echo '<pre>';
    	// $this->sql_initial_statement();
    	
    	$this->hrmisv10 = $this->load->database('hrmisv10_upt', TRUE);
    	$hrmisv10_table_list = $this->hrmisv10->list_tables();
    	$hrmis_table_list = $this->db->list_tables();

    	if(count($hrmisv10_table_list) != count($hrmis_table_list)):
    		# check if table list from both database is equal
    		echo 'There is error in migrating table, please try again.';
    		die();
    	else:
	    	foreach($hrmisv10_table_list as $tbl):
	    		$field_list_hrmisv10 = $this->hrmisv10->query('DESCRIBE '.$tbl.';')->result_array();
	    		$field_list = $this->db->query('DESCRIBE '.$tbl.';')->result_array();
	    		$field_diff = array_diff(array_column($field_list_hrmisv10,'Field'),array_column($field_list,'Field'));
	    		$arr_new_fields = array();
	    		$arr_new_primary = '';
	    		if(count($field_diff) > 0):
	    			$new_fields = $this->hrmisv10->query("SHOW COLUMNS FROM ".$tbl." WHERE FIELD IN ('".implode("','",$field_diff)."');")->result_array();
		    		foreach($new_fields as $field):
		    			// echo '<br>';
		    			// print_r($field);
		    			# check if field is primary, then check if primary key exist in currentdb
		    			if($field['Key'] == 'PRI'):
		    				$primary = $this->db->query("SHOW KEYS FROM ".$tbl." WHERE Key_name = 'PRIMARY';")->result_array();
		    				if(count($primary)):
		    					$this->write_sqlstmt("# Drop index for ".$tbl."  \nDROP INDEX `PRIMARY` ON ".$tbl.";");
		    				endif;
		    				$arr_new_primary = ", ADD PRIMARY KEY (`".$field['Field']."`)";
		    			endif;

		    			$isnull = $field['Null'] == 'NO' ? 'NOT NULL' : 'NULL';
		    			$default = $field['Default'] != '' ? "default '".$field['Default']."'" : '';
		    			array_push($arr_new_fields,"ADD `".$field['Field']."` ".$field['Type']." ".$isnull." ".$default." ".$field['Extra']);
		    		endforeach;
		    	endif;
		    	$this->write_sqlstmt("# Add new field/s for table ".$tbl);
		    	$this->write_sqlstmt("ALTER TABLE `".$tbl."` ".implode(",",$arr_new_fields).$arr_new_primary.";");
		    	// print_r($arr_new_fields);
	    		// echo '<hr>';
	    	endforeach;
	    endif;

    	// // print_r($hrmisv10_table_list);
    	// // print_r($hrmis_table_list);

    	// if(count($hrmisv10_table_list) != count($hrmis_table_list)):
    	// 	# check if table list from both database is equal
    	// 	echo 'There is error in migrating table, please try again.';
    	// 	die();
    	// else:
    	// 	foreach($hrmis_table_list as $tbl):
    	// 		$field_list_hrmisv10 = $this->hrmisv10->query('DESCRIBE '.$tbl.';')->result_array();
    	// 		$field_list = $this->db->query('DESCRIBE '.$tbl.';')->result_array();
    	// 		$field_diff = array_diff(array_column($field_list_hrmisv10,'Field'),array_column($field_list,'Field'));
    	// 		if(count($field_diff) > 0):
    	// 			$new_fields = $this->hrmisv10->query("SHOW COLUMNS FROM ".$tbl." WHERE FIELD IN ('".implode("','",$field_diff)."');")->result_array();
    	// 			$arr_new_fields = array();
    	// 			foreach($new_fields as $newf):
    	// 				$isnull = $newf['Null'] == 'NO' ? 'NOT NULL' : 'NULL';
		   //      		$default = $newf['Default'] != '' ? "default '".$newf['Default']."'" : '';
		   //      		array_push($arr_new_fields,"ADD `".$newf['Field']."` ".$newf['Type']." ".$isnull." ".$default." ".$newf['Extra']);
		   //      		# add primary
		   //      		if($newf['Key'] == 'PRI'):
		   //      			print_r($newf);
		   //      			// $this->write_sqlstmt("# Drop index for ".$tbl."  \nDROP INDEX `PRIMARY` ON ".$tbl.";");
		   //      			array_push($arr_new_fields,"ADD PRIMARY KEY (`".$newf['Field']."`)");
		   //      		endif;
    	// 			endforeach;
    	// 			$this->write_sqlstmt("# Add new field/s for table ".$tbl);
    	// 			$this->write_sqlstmt("ALTER TABLE `".$tbl."` ".implode(",",$arr_new_fields).";");
    	// 		endif;
    	// 	endforeach;
    	// endif;

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
		echo '<br>';echo $txt;
	}

	function sql_initial_statement()
	{
		$this->write_sqlstmt("# Set Global Variable");
		$this->write_sqlstmt("set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
		$this->write_sqlstmt("set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");

		# check if tblAppointment is exists, if yes, drop primary key
		// foreach(array('tblAppointment','tblDeduction','tblLeave') as $table):
		// 	$tblAppointment = $this->db->query("SHOW TABLES LIKE '".$table."';")->result_array();
		// 	if(count($tblAppointment) > 0):
		// 		$this->write_sqlstmt("# Drop index for ".$table."  \nDROP INDEX `PRIMARY` ON ".$table.";");
		// 	endif;
		// endforeach;
		

		
		// $this->write_sqlstmt("");

		// $this->write_sqlstmt("");
		// $this->write_sqlstmt("");
		// $this->write_sqlstmt("");
		// $this->write_sqlstmt("");
	}

	function sql_final_statement()
	{
		$this->write_sqlstmt("# Initial data for password: dost");
		$this->write_sqlstmt("UPDATE `tblEmpAccount` SET `userPassword` = '$2y$10\$n.QQrx3mdXY4EJ7VpYwUyeJ7Br7QAxo4E672pwPq7.5yrd5U4O1hm';");
	}



}
