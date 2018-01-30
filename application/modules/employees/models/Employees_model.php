<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employees_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	public function add($arrData)
	{
		$this->db->insert('tblEmpPersonal', $arrData);
		return $this->db->insert_id();		
	}
	
	public function checkExist($strEmpNo)
	{		
		$strSQL = " SELECT empNumber FROM tblEmpPersonal					
					WHERE 1=1 
					AND empNumber='".$strEmpNo."'
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	public function getData($strEmpNo="",$strSearch="")
	{		
		$where='';
		if($strEmpNo!="")
			$where .= " AND tblEmpPersonal.empNumber='".$strEmpNo."'";
		if($strSearch!="")
			$where .= " AND (tblEmpPersonal.empNumber LIKE '%".$strSearch."%' OR surname LIKE '%".$strSearch."%' OR firstname LIKE '%".$strSearch."%' OR middlename LIKE '%".$strSearch."%')";
		
		$strSQL = " SELECT tblEmpPersonal.*,tblEmpPosition.statusOfAppointment,tblEmpPosition.appointmentCode,tblEmpPosition.positionCode FROM tblEmpPersonal						LEFT JOIN tblEmpPosition ON tblEmpPosition.empNumber=tblEmpPersonal.empNumber
					WHERE 1=1 
					$where
					ORDER BY surname,firstname,middlename
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}			
		
	public function save($arrData, $strEmpNo)
	{
		$this->db->where('empNumber',$strEmpNo);
		$this->db->update('tblEmpPersonal', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	public function delete($strEmpNo)
	{
		$this->db->where('empNumber', $strEmpNo);
		$this->db->delete('tblEmpPersonal'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
/* End of file Employees_model.php */
/* Location: ./application/modules/employees/models/Employees_model.php */