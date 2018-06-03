<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	public function authenticate($strUsername,$strPassword)
	{
		
		$strPass = $this->db->escape_str($strPassword);
		$strSQL = " SELECT tblEmpAccount.*,tblEmpPosition.*,tblEmpPersonal.surname,tblEmpPersonal.firstname FROM tblEmpAccount
					LEFT JOIN tblEmpPosition ON tblEmpPosition.empNumber=tblEmpAccount.empNumber
					LEFT JOIN tblEmpPersonal ON tblEmpPersonal.empNumber=tblEmpAccount.empNumber
					WHERE 1=1 
					AND userName='".$this->db->escape_str($strUsername)."'
					AND userPassword='".md5($strPass)."'
					";
		//echo $strSQL;exit(1);			
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();
	}		
}
/* End of file login_model.php */
/* Location: ./application/modules/login/models/login_model.php */