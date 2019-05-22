<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Override_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}

	function get_override_ob($obid='')
	{
		if($obid!=''):
			$this->db->join('tblOverride','tblOverride.override_id = tblEmpOB.override_id','left');
			$res = $this->db->get_where('tblEmpOB' ,array('tblEmpOB.override_id' => $obid))->result_array();
		else:
			$this->db->group_by('override_id');
			$res = $this->db->get_where('tblEmpOB' ,array('is_override' => 1))->result_array();
		endif;
		return $res;
	}

	function add($arrData)
	{
		$this->db->insert('tblOverride', $arrData);
		return $this->db->insert_id();
	}

	function save($arrData, $id)
	{
		$this->db->where('override_id', $id);
		$this->db->update('tblOverride', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete($id)
	{
		$this->db->where('override_id', $id);
		$this->db->delete('tblOverride');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}


}
