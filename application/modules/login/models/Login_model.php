<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	public function authenticate($strUsername,$strPassword)
	{
		$strSQL = " SELECT tblEmpAccount.*,tblEmpPosition.*,tblEmpPersonal.surname,tblEmpPersonal.firstname FROM tblEmpAccount
					LEFT JOIN tblEmpPosition ON tblEmpPosition.empNumber=tblEmpAccount.empNumber
					LEFT JOIN tblEmpPersonal ON tblEmpPersonal.empNumber=tblEmpAccount.empNumber
					WHERE 1=1 
					AND userName='".$this->db->escape_str($strUsername)."'";

		// echo $strSQL;exit(1);			
		$objQuery = $this->db->query($strSQL);
		$rs= $objQuery->result_array();
		if (count($rs)>0)
		{
			$strPass = $this->db->escape_str($rs[0]['userPassword']);
			$hashed_password = password_hash($strPass,PASSWORD_BCRYPT);
			$blnValid = password_verify($strPass,$hashed_password);
			
			if($blnValid)
			{
				return $rs;
			}
			else{
				return array();
			}
		}
		else
		{
			return array();
		}

	}		
}
/* End of file login_model.php */
/* Location: ./application/modules/login/models/login_model.php */