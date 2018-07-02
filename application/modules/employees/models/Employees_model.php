<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employees_model extends CI_Model {
	var $table = 'tblEmpPersonal';
	var $tableid = 'empNumber';
	public function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	public function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}
	
	public function checkExist($strEmpNo)
	{		
		$objQuery = $this->select('empNumber')->get($this->table);
		// $strSQL = " SELECT empNumber FROM tblEmpPersonal					
		// 			WHERE 1=1 
		// 			AND empNumber='".$strEmpNo."'
		// 			";
		//echo $strSQL;exit(1);
		//$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	public function getData($strEmpNo="",$strSearch="",$strAppStatus="")
	{
		$this->db->select('tblEmpPersonal.*,tblEmpPosition.statusOfAppointment,tblEmpPosition.appointmentCode,tblEmpPosition.positionCode,tblPosition.positionDesc,tblAppointment.appointmentDesc');
		$where='';
		if($strEmpNo!="")
			$this->db->where('tblEmpPersonal.empNumber',$strEmpNo);
			//$where .= " AND tblEmpPersonal.empNumber='".$strEmpNo."'";
		if($strSearch!="")
			$this->db->where("(tblEmpPersonal.empNumber LIKE '%".$strSearch."%' OR surname LIKE '%".$strSearch."%' OR firstname LIKE '%".$strSearch."%' OR middlename LIKE '%".$strSearch."%')",NULL,FALSE);
			//$where .= " AND (tblEmpPersonal.empNumber LIKE '%".$strSearch."%' OR surname LIKE '%".$strSearch."%' OR firstname LIKE '%".$strSearch."%' OR middlename LIKE '%".$strSearch."%')";
		if($strAppStatus!="")
			$this->db->where('tblEmpPosition.statusOfAppointment',$strAppStatus);
		else
			$this->db->where('tblEmpPosition.statusOfAppointment','In-Service');
			//$where .= " AND tblEmpPosition.statusOfAppointment='".$strAppStatus."'";
		$this->db->join('tblEmpPosition','tblEmpPosition.empNumber=tblEmpPersonal.empNumber','left')
		->join('tblPosition','tblPosition.positionCode=tblEmpPosition.positionCode','left')
		->join('tblAppointment','tblAppointment.appointmentCode=tblEmpPosition.appointmentCode','left')
		->order_by('surname,firstname,middlename','asc');
		$strSQL = " SELECT tblEmpPersonal.*,tblEmpPosition.statusOfAppointment,tblEmpPosition.appointmentCode,tblEmpPosition.positionCode,tblPosition.positionDesc FROM tblEmpPersonal						
					LEFT JOIN tblEmpPosition ON tblEmpPosition.empNumber=tblEmpPersonal.empNumber
					LEFT JOIN tblPosition ON tblPosition.positionCode=tblEmpPosition.positionCode
					WHERE 1=1 
					$where
					ORDER BY surname,firstname,middlename
					";
		//echo $strSQL;exit(1);				
		//$objQuery = $this->db->query($strSQL);
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}			
		
	public function save($arrData, $strEmpNo)
	{
		$this->db->where($this->tableid,$strEmpNo);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	public function delete($strEmpNo)
	{
		$this->db->where($this->tableid, $strEmpNo);
		$this->db->delete($this->table); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	public function appointment_status($complete=FALSE)
	{
		$objQuery = $this->db->select('tblPayrollProcess.*,tblAppointment.appointmentDesc')
					->join('tblAppointment','tblPayrollProcess.appointmentCode = tblAppointment.appointmentCode','inner')
					->get('tblPayrollProcess');
		$arrData = array();
		if($complete):
			foreach($objQuery->result_array() as $row):
				//echo $row['processWith'];
				$arrAS = explode(',',$row['processWith']);
				if(!is_array($arrAS)):
					//echo "not array=".$row['processWith']."<br>";
					$arrData[]=$row['processWith'];
					$arrData[$row['processWith']]=$row['appointmentCode'];
					//$arrData[]
				else:
					foreach($arrAS as $as):
						//echo "array=".$as."<br>";
						//$arrData[]=$as;
						$arrData[$as]=$as;
					endforeach;
				endif;
				//$arrData[] = $arrAS;
			endforeach;
		else:
			foreach($objQuery->result_array() as $row):
				$arrData[]=$row['appointmentCode'];
			endforeach;
		endif;
		//print_r($arrData);
		return $arrData;
		//print_r($arrData);
	}

	function getEmployeeDetails($strEmpNo,$strSelect,$strTable,$strOrder="",$strJoinTable="",$strJoinString="",$strJoinType="")
	{
		if($strOrder!='')
			$this->db->order_by($strOrder);
		if($strJoinTable!='' && $strJoinString!='' && $strJoinType!='')
			$this->db->join($strJoinTable,$strJoinString,$strJoinType);
		if($strEmpNo!='')
			$this->db->where('empNumber',$strEmpNo);
		$this->db->select($strSelect);
		$rs = $this->db->get($strTable);
		return $rs->result_array();

	}
}
/* End of file Employees_model.php */
/* Location: ./application/modules/employees/models/Employees_model.php */