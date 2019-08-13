 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		$this->load->model(array('Migrate_model'));
    }

    function index()
    {
    	$this->load->view('default_view');
    }
    
    function comparing_tables()
    {
        $host = $_GET['host'];
        $dbname = $_GET['dbname'];
        $uname = $_GET['uname'];
        $pass = $_GET['pass'];
        $pass = str_replace('^amp;','&',$pass);
        $pass = str_replace('^atrsk;','*',$pass);
        $pass = str_replace('^pls;','+',$pass);
        $pass = str_replace('^hash;','#',$pass);

        echo 'host: '.$host;
        echo '<br>dbname: '.$dbname;
        echo '<br>uname: '.$uname;
        echo '<br>pass: '.$pass;

        # update .env file
        # read the entire string
        $str=file_get_contents('.env');

        # replace something in the file string
        $str=str_replace('DB_HOST = "'.$_ENV['DB_HOST'].'"', 'DB_HOST = "'.$host.'"',$str);
        $str=str_replace('DB_USER = "'.$_ENV['DB_USER'].'"', 'DB_USER = "'.$uname.'"',$str);
        // $str=str_replace('DB_PASS = "'.$_ENV['DB_PASS'].'"', 'DB_PASS = "'.$pass.'"',$str);
        $str=str_replace('DB_NAME = "'.$_ENV['DB_NAME'].'"', 'DB_NAME = "'.$dbname.'"',$str);

        # write the entire string
        file_put_contents('.env', $str);

        $path1 = 'schema/hrmisv10/hrmis-schema-upt_001.sql';
        $path2 = 'schema/hrmisv10/hrmis-schema-upt_002.sql';
        $path3 = 'schema/hrmisv10/hrmis-schema-upt_003.sql';
        $path4 = 'schema/hrmisv10/hrmis-schema-upt_004.sql';
        if(file_exists($path1)) { unlink('schema/hrmisv10/hrmis-schema-upt_001.sql'); }
        if(file_exists($path2)) { unlink('schema/hrmisv10/hrmis-schema-upt_002.sql'); }
        if(file_exists($path3)) { unlink('schema/hrmisv10/hrmis-schema-upt_003.sql'); }
        if(file_exists($path4)) { unlink('schema/hrmisv10/hrmis-schema-upt_004.sql'); }
        $this->Migrate_model->comparing_tables();
        echo 'Comparing Databases...';
        file_put_contents('schema/hrmisv10/hrmis-schema-upt.sql','');
    }

    /* STEP 2; Fix Date*/
    function fix_datetime_fields()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_001.sql';
        
        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents('schema/hrmisv10/hrmis-schema-upt.sql', $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Fixed datetime fields...';
        $this->Migrate_model->fix_datetime_fields();
    }

    /* STEP 3; Fix Time*/
    function fix_time()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s3.sql';
        
        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents('schema/hrmisv10/hrmis-schema-upt_002-s3.sql', $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Time successfully Fixed...';
    }

    /* STEP 4; fix DateTime field in table tblEmpDTR*/
    function fix_dtr_datetime_field()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s4.sql';

        ## BEGIN Update DTR 
        # Fix dtrDate 
        $this->Migrate_model->write_sqlstmt("# Fix DateTime field in table tblEmpDTR",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` CHANGE  `dtrDate`  `dtrDate` VARCHAR( 20 ) NULL DEFAULT NULL;",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `dtrDate` = NULL WHERE dtrDate = '0000-00-00';",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `dtrDate` = NULL WHERE dtrDate LIKE '%-00-%';",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `dtrDate` = NULL WHERE dtrDate LIKE '0000-%';",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `dtrDate` = NULL WHERE dtrDate LIKE '%-00';",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` CHANGE  `dtrDate`  `dtrDate` DATE NULL DEFAULT NULL;",$path);
        
        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents($path, $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'DateTime field in table Dtr successfully fixed...';
    }

    /* STEP 5; Change inPM to Military Time*/
    function fix_dtr_inpm_military_time()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s5.sql';

        # change inPM to Military Time 
        $this->Migrate_model->write_sqlstmt("# Change inPM to Military Time",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` CHANGE  `inPM`  `inPM_old_data` TIME NOT NULL DEFAULT  '00:00:00';",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` ADD  `inPM` TIME NULL AFTER  `inPM_old_data`;",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `inPM` = 
                                                CASE
                                                    WHEN (`inPM_old_data` > '00:59:59' AND `inPM_old_data` <= '11:59:59') THEN (TIME(STR_TO_DATE(concat(`dtrDate`,' ',`inPM_old_data`,' PM'),'%Y-%m-%d  %h:%i:%s %p'))) 
                                                    WHEN (`inPM_old_data` = '00:00:00') THEN NULL 
                                                    ELSE `inPM_old_data` 
                                                END;",$path);

        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents($path, $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Change tblEmpDTR.inPM to Military Time...';
    }

    /* STEP 6; Change outPM to Military Time*/
    function fix_dtr_outpm_military_time()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s6.sql';

        # change outPM to Military Time 
        $this->Migrate_model->write_sqlstmt("# Change outPM to Military Time",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` CHANGE  `outPM`  `outPM_old_data` TIME NOT NULL DEFAULT  '00:00:00';",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` ADD  `outPM` TIME NULL AFTER  `outPM_old_data`;",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `outPM` =   
                                                CASE 
                                                    WHEN (`outPM_old_data` > '00:59:59' AND `outPM_old_data` <= '11:59:59') THEN (TIME(STR_TO_DATE(concat(`dtrDate`,' ',`outPM_old_data`,' PM'),'%Y-%m-%d  %h:%i:%s %p'))) 
                                                    WHEN (`outPM_old_data` = '00:00:00') THEN NULL 
                                                    ELSE `outPM_old_data` 
                                                END;",$path);

        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents($path, $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Change tblEmpDTR.outPM to Military Time...';
    }

    /* STEP 7; Change inOT to Military Time*/
    function fix_dtr_inot_military_time()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s7.sql';

        # change inOT to Military Time 
        $this->Migrate_model->write_sqlstmt("# Change inOT to Military Time",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` CHANGE  `inOT`  `inOT_old_data` TIME NOT NULL DEFAULT  '00:00:00';",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` ADD  `inOT` TIME NULL AFTER  `inOT_old_data`;",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `inOT` =   
                                                 CASE 
                                                     WHEN (`inOT_old_data` > '00:59:59' AND `inOT_old_data` <= '11:59:59') THEN (TIME(STR_TO_DATE(concat(`dtrDate`,' ',`inOT_old_data`,' PM'),'%Y-%m-%d  %h:%i:%s %p'))) 
                                                     WHEN (`inOT_old_data` = '00:00:00') THEN NULL 
                                                     ELSE `inOT_old_data` 
                                                 END;",$path);

        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents($path, $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Change tblEmpDTR.inOT to Military Time...';
    }

    /* STEP 8; Change outOT to Military Time*/
    function fix_dtr_outot_military_time()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s8.sql';

        # change outOT to Military Time 
        $this->Migrate_model->write_sqlstmt("# Change outOT to Military Time",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` CHANGE  `outOT`  `outOT_old_data` TIME NOT NULL DEFAULT  '00:00:00';",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE  `tblEmpDTR` ADD  `outOT` TIME NULL AFTER  `outOT_old_data`;",$path);
        $this->Migrate_model->write_sqlstmt("UPDATE `tblEmpDTR` SET `outOT` =   
                                                 CASE 
                                                     WHEN (`outOT_old_data` > '00:59:59' AND `outOT_old_data` <= '11:59:59') THEN (TIME(STR_TO_DATE(concat(`dtrDate`,' ',`outOT_old_data`,' PM'),'%Y-%m-%d  %h:%i:%s %p'))) 
                                                     WHEN (`outOT_old_data` = '00:00:00') THEN NULL 
                                                     ELSE `outOT_old_data` 
                                                 END;",$path);

        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents($path, $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Change tblEmpDTR.outOT to Military Time...';
    }

    /* STEP 9; Drop old field with old data */
    function fix_dtr_drop_old_field()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002-s9.sql';

        # drop old field with old data 
        $this->Migrate_model->write_sqlstmt("# Drop old field with old data ",$path);
        $this->Migrate_model->write_sqlstmt("ALTER TABLE `tblEmpDTR` DROP `inPM_old_data`, DROP `outPM_old_data`, DROP `inOT_old_data`, DROP `outOT_old_data`;",$path);
        ## END Update DTR

        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents($path, $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'DTR table successfully fixed...';
    }

    function update_fields()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_002.sql';
        
        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents('schema/hrmisv10/hrmis-schema-upt.sql', $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Update Fields...';
        $this->Migrate_model->update_fields();
    }

    function update_data_type()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_003.sql';
        
        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents('schema/hrmisv10/hrmis-schema-upt.sql', $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        echo 'Update Data Type...';
        $this->Migrate_model->update_data_type();

    }

    function update_database()
    {
        $path = 'schema/hrmisv10/hrmis-schema-upt_004.sql';
        
        $total_line = 0;
        $ctrcomment = 0;
        if(file_exists($path)):
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                $this->Migrate_model->update_database($path);
            endif;
            # append file in schema update
            $str=file_get_contents($path);
            file_put_contents('schema/hrmisv10/hrmis-schema-upt.sql', $str.PHP_EOL , FILE_APPEND | LOCK_EX);

            unlink($path);
        endif;

        $this->Migrate_model->drop_dbase();
        echo 'Database successfully updated... Migration log is added in schema/hrmisv10/hrmis-schema-upt.sql.. Click here to <a class="btn btn-xs" href="login"> Login </a>';
    }



}