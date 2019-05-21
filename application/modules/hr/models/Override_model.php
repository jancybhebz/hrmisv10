<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Override_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}

	function get_override_ob($obid='')
	{
		if($obid!=''):
			$res = $this->db->get_where('tblEmpOB' ,array('obID' => $obid))->result_array();
		else:
			$this->db->group_by('obPlace,purpose,obDateFrom,obDateTo');
			$res = $this->db->get_where('tblEmpOB' ,array('is_override' => 1))->result_array();
		endif;
		return $res;
	}

}