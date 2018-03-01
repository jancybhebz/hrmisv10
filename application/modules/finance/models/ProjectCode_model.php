<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProjectCode_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblProject', $arrData);
		return $this->db->insert_id();
	}

	function edit($arrData, $code)
	{
		$this->db->where('projectCode',$code);
		$this->db->update('tblProject', $arrData);
		return $this->db->affected_rows();
	}

	public function delete($code)
	{
		$this->db->where('projectCode', $code);
		$this->db->delete('tblProject');
		return $this->db->affected_rows(); 
	}

	function getProjectCodes($code)
	{
		if($code==''):
			return $this->db->order_by('projectOrder','ASC')->get('tblProject')->result_array();
		else:
			return $this->db->get_where('tblProject', array('projectCode' => $code))->result_array();
		endif;
	}
	
		
}
/* End of file ProjectCode_model.php */
/* Location: ./application/modules/finance/models/ProjectCode_model.php */