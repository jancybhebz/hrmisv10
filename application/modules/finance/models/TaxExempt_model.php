<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TaxExempt_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getData($code='')
	{
		if($code==''):
			return $this->db->order_by('taxStatus','DESC')->get('tblTaxExempt')->result_array();
		else:
			return $this->db->get_where('tblTaxExempt', array('taxStatus' => $code))->result_array();
		endif;
	}
		
}
/* End of file TaxExempt_model.php */
/* Location: ./application/modules/finance/models/TaxExempt_model.php */