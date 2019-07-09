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

        echo '<br>host: '.$host;
        echo '<br>port: '.$port;
        echo '<br>dbname: '.$dbname;
        echo '<br>uname: '.$uname;
        echo '<br>pass: '.$pass;
        echo '<br>';
        $this->Migrate_model->get_table_list();
        echo 'Comparing Databases...';
    }

    function fix_datetime_fields()
    {
        echo 'Fixed datetime fields...';
        $this->Migrate_model->fix_datetime_fields();
    }

    function update_fields()
    {
        echo 'Update Fields...';
        $this->Migrate_model->update_fields();

    }

    function create_sql()
    {
        echo 'create sql file...';
    }


    // function migration()
    // {
    // 	echo '<pre>';
    // 	$msg_log = array();

    // 	echo 'Comparing Databases...';
    // 	echo '<br>';
    // 	echo 'Checking Tables...';
    // 	echo '<br>';
    // 	echo 'Remove unused Tables...';
    // 	echo '<br>';
    // 	echo 'Add necessary Tables...';
    // 	echo '<br>';
    // 	echo 'Scanning Tables...';
    // 	echo '<br>';
    // 	echo 'Comparing Fields...';
    // 	echo '<br>';
    // 	echo 'Creating SQL File...';
    // 	echo '<br>';

    // 	print_r($msg_log);
    // 	echo 'migrate';
    // }



}