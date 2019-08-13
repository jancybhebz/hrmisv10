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