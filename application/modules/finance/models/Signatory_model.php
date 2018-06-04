<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signatory_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblSignatory', $arrData);
		return $this->db->insert_id();
	}

	function edit($arrData, $code)
	{
		$this->db->where('signatoryId',$code);
		$this->db->update('tblSignatory', $arrData);
		return $this->db->affected_rows();
	}

	public function delete($code)
	{
		$this->db->where('signatoryId', $code);
		$this->db->delete('tblSignatory');
		return $this->db->affected_rows(); 
	}

	function getSignatories($id)
	{
		if($id==''):
			return $this->db->join('tblPayrollGroup', 'tblPayrollGroup.payrollGroupCode = tblSignatory.payrollGroupCode', 'left')->order_by('signatory','ASC')->get('tblSignatory')->result_array();
		else:
			$result = $this->db->get_where('tblSignatory', array('signatoryId' => $id))->result_array();
			return $result[0];
		endif;
	}	
		
}
/* End of file Signatory_model.php */
/* Location: ./application/modules/finance/models/Signatory_model.php */