<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Computation_instance_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getData($mon,$yr,$appt)
	{
		return $this->db->get_where('tblComputationInstance',array('pmonth' => $mon, 'pyear' => $yr, 'appointmentCode' => $appt))->result_array();
	}

	function insert_computation_instance($arrData)
	{
		$this->db->insert('tblComputationInstance', $arrData);
		return $this->db->insert_id();
	}

	# delete computation instance
	function del_computation_instance($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tblComputationInstance');
		return $this->db->affected_rows();
	}

	function insert_computation($arrData)
	{
		$this->db->insert('tblComputation', $arrData);
		return $this->db->insert_id();
	}

	# delete computation
	function del_computation($id)
	{
		$this->db->where('fk_id', $id);
		$this->db->delete('tblComputation');
		return $this->db->affected_rows();
	}

	function insert_computation_details($arrData)
	{
		$this->db->insert('tblComputationDetails', $arrData);
		return $this->db->insert_id();
	}

	# delete computation details
	function del_computation_details($id)
	{
		$this->db->where('fk_id', $id);
		$this->db->delete('tblComputationDetails');
		return $this->db->affected_rows();
	}


}
/* End of file Computation_instance_model.php */
/* Location: ./application/modules/finance/models/Computation_instance_model.php */