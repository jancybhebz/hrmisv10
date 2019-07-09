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
        $port = $_GET['port'];
        $dbname = $_GET['dbname'];
        $uname = $_GET['uname'];
        $pass = $_GET['pass'];

        echo 'host: '.$host;
        echo '<br>port: '.$port;
        echo '<br>dbname: '.$dbname;
        echo '<br>uname: '.$uname;
        $this->Migrate_model->comparing_tables();
        echo 'Comparing Databases...';
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
            echo 'exists';
            $sql_contents = file_get_contents($path);
            $file = fopen($path,"r");
            while(! feof($file)):
                $line = fgets($file);
                $total_line++;
                if($line[0] == '#' || $line == '') { $ctrcomment++; }
            endwhile;
            fclose($file);

            if($total_line != $ctrcomment):
                echo 'migrate';
                $this->Migrate_model->update_database($path);
            endif;
            // unlink($path);
        endif;

        // echo 'Fixed datetime fields...';
        // $this->Migrate_model->fix_datetime_fields();
        echo 'Update Fields...';
        // $this->Migrate_model->update_fields();

    }

    function update_database()
    {
        # update Database
        $this->Migrate_model->update_database();
    }



}