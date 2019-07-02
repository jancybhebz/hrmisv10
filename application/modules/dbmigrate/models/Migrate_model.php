<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();	
	}
	
	function get_table_list()
	{
		
	}

	

}
