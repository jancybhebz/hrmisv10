<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Remittance_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getRemittance($empid, $code, $from, $to)
	{
		$this->db->where("deductYear between '".str_replace(' ', '', $from)."' and '".str_replace(' ', '', $to)."'");
		$this->db->where('tblEmpDeductionRemit.deductionCode',$code);
		$this->db->where('empNumber',$empid);
		$res = $this->db->join('tblDeduction', 'tblDeduction.deductionCode = tblEmpDeductionRemit.deductionCode', 'left')->get_where('tblEmpDeductionRemit')->result_array();
		return $res;
	}
		
}
/* End of file Remittance_model.php */
/* Location: ./application/modules/finance/models/Remittance_model.php */