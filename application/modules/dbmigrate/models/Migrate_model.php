<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();
		$this->sqlite = $this->load->database('hrmisv10_upt', TRUE);
	}
	
	function get_table_list()
	{
		$tbldb_prev = array();
		$tbldb_old = array();

		# get the table list from hrmisv10 schema
		// $tbldb_prev = $this->sqlite->list_tables();

		# get the table list from current database
		$tbldb_old = $this->db->list_tables();

		return array('tbldb_prev' => $tbldb_prev, 'tbldb_old' => $tbldb_old);
	}

	

}
