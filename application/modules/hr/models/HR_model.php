<?php 
/** 
Purpose of file:    Model for HR update
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HR_model extends CI_Model {
	
	var $table = 'tblEmpPersonal';
	var $tableid = 'empNumber';

	var $table2 = 'tblEmpChild';
	var $tableid2 = 'childCode';

	var $table3 = 'tblEmpSchool';
	var $tableid3 = 'levelCode';

	var $table4 = 'tblempexam';
	var $tableid4 = 'examCode';

	var $table5 = 'tblservicerecord';
	var $tableid5 = 'serviceRecID';

	var $table6 = 'tblempvoluntarywork';
	var $tableid6 = 'vwName';

	var $table7 = 'tblemptraining';
	var $tableid7 = 'XtrainingCode';

	var $table8 = 'tblempposition';
	var $tableid8 = 'appointmentCode';

	var $table9 = 'tblempduties';
	var $tableid9 = 'duties';

	var $table10 = 'tblplantilladuties';
	var $tableid10 = 'itemDuties';

	public function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	public function add_employee($arrData)
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

	//for QRCode
	public function getData($strEmpNo="",$strSearch="",$strAppStatus="")
	{
		$this->db->select('tblEmpPersonal.*,tblEmpPosition.*,tblPosition.positionDesc,tblAppointment.appointmentDesc');
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
		// echo $strSQL;exit(1);				
		//$objQuery = $this->db->query($strSQL);
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}			
		
	public function savePersonal($arrData, $strEmpNo)
	{
		$this->db->where($this->tableid,$strEmpNo);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function saveSpouse($arrData, $strEmpNo)
	{
		$this->db->where($this->tableid2,$strEmpNo);
		$this->db->update($this->table2, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function saveParents($arrData, $strEmpNo)
	{
		$this->db->where($this->tableid2,$strEmpNo);
		$this->db->update($this->table2, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function saveChild($arrData, $strChildCode)
	{
		$this->db->where($this->tableid2,$strChildCode);
		$this->db->update($this->table2, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function saveEduc($arrData, $strLevelCode)
	{
		$this->db->where($this->tableid3,$strLevelCode);
		$this->db->update($this->table3, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function saveExam($arrData, $strExamCode)
	{
		$this->db->where($this->tableid4,$strExamCode);
		$this->db->update($this->table4, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	
	public function delete($strEmpNo)
	{
		$this->db->where($this->tableid, $strEmpNo);
		$this->db->delete($this->table); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// children
	public function deleteChild($strChildCode)
	{
		$this->db->where($this->tableid2, $strChildCode);
		$this->db->delete($this->table2); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// education
	public function deleteEduc($strLevelCode)
	{
		$this->db->where($this->tableid3, $strLevelCode);
		$this->db->delete($this->table3); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// examination
	public function deleteExam($strExamCode)
	{
		$this->db->where($this->tableid4, $strExamCode);
		$this->db->delete($this->table4); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// work experience
	public function deleteWorkExp($strServiceRecID)
	{
		$this->db->where($this->tableid5, $strServiceRecID);
		$this->db->delete($this->table5); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// voluntary works
	public function deleteVolWorks($strVwName)
	{
		$this->db->where($this->tableid6, $strVwName);
		$this->db->delete($this->table6); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// trainings
	public function deleteTraining($strXtrainingCode)
	{
		$this->db->where($this->tableid7, $strXtrainingCode);
		$this->db->delete($this->table7); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// appointment issued
	public function deleteAppoint($strAppointmentCode)
	{
		$this->db->where($this->tableid8, $strAppointmentCode);
		$this->db->delete($this->table8); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	} 

	// duties
	public function deleteDuties($strDuties)
	{
		$this->db->where($this->tableid9, $strDuties);
		$this->db->delete($this->table9); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	// plantilla duties
	public function deletePlantillaDuties($strItemDuties)
	{
		$this->db->where($this->tableid10, $strItemDuties);
		$this->db->delete($this->table10); 	
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

	function getPlantillaDuties($strEmpNo)
	{
		if($strEmpNo!='')
			$this->db->where('empNumber',$strEmpNo);
		$this->db->join('tblEmpPosition','tblEmpPosition.itemNumber = '.'tblPlantillaDuties.itemNumber','left');
		$objQuery = $this->db->get('tblPlantillaDuties');
		return $objQuery->result_array();	
	}

	
	// public function getEmpNumber($intInviteeId="",$intSourceAgency="",$strSearch="",$isVIP="")
	// {
	// 	$strWhere = '';
	// 	if($intInviteeId!='')
	// 		$strWhere .= ' AND '.$this->tableid.'='.$intInviteeId;
	// 	if($intSourceAgency!='')
	// 		$strWhere .= ' AND prf_source_agency_id='.$intSourceAgency;
	// 	if($strSearch!='')
	// 		$strWhere .= " AND (firstname LIKE '%".$strSearch."%' OR middlename LIKE '%".$strSearch."%' OR surname LIKE '%".$strSearch."%')";
	// 	//echo 'isVIP='.$isVIP;
	// 	if($isVIP!='')
	// 	{
	// 	if($isVIP==1)
	// 		$strWhere .= " AND prf_is_vip='Y'";
	// 	//if($isVIP==0)
	// 		//$strWhere .= " AND prf_is_vip='N'";
	// 	}
	//   	$strSQL = "SELECT *  FROM  ".$this->table." 
	// 			  LEFT JOIN `tblclassification` ON `tblinvitees`.`prf_sector_id`=`tblclassification`.`cls_class_id` 
	// 			  LEFT JOIN `tblsourceagency` ON `tblinvitees`.`prf_source_agency_id`=`tblsourceagency`.`sa_agency_id` 
	// 			  WHERE 1=1 ".$strWhere;
	// 	//echo $isVIP;
	// 	//echo $strSQL; exit(1);
	//   $objQuery = $this->db->query( $strSQL );
	//   return $objQuery->result_array();		
	// }	
}
/* End of file HR_model.php */
/* Location: ./application/modules/employees/models/Employees_model.php */