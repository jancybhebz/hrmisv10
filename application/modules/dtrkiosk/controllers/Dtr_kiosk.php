 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr_kiosk extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		// $this->load->model(array());
    }
    
	public function index()
	{
		$this->load->view('default_view');
	}

   
}
