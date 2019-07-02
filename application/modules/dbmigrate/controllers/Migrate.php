 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		// $this->load->model(array('Dtrkiosk_model','login/login_model','Dtr_log_model'));
    }

    function index()
    {
    	$this->load->view('default_view');
    }
    
    function migration()
    {
    	echo '<pre>';
    	$msg_log = array();

    	echo 'Comparing Databases...';
    	echo '<br>';
    	echo 'Checking Tables...';
    	echo '<br>';
    	echo 'Remove unused Tables...';
    	echo '<br>';
    	echo 'Add necessary Tables...';
    	echo '<br>';
    	echo 'Scanning Tables...';
    	echo '<br>';
    	echo 'Comparing Fields...';
    	echo '<br>';
    	echo 'Creating SQL File...';
    	echo '<br>';

    	print_r($msg_log);
    	echo 'migrate';
    }

}