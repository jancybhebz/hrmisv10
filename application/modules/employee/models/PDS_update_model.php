<?php 
/** 
Purpose of file:    Model for PDS update
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PDS_update_model extends CI_Model {

	var $table = 'tblEmpPersonal';
	var $tableid = 'empNumber';

	var $tableSchool = 'tblempschool';
	var $tableSchoolid = 'levelCode';

	var $tableEduc = 'tbleducationallevel';
	var $tableEducid = 'levelIl';

	var $tableCourse = 'tblcourse';
	var $tableCourseid = 'courseCode';

	var $tableScholarship = 'tblscholarship';
	var $tableScholarshipid = 'id';

	var $tableTraining = 'tblemptraining';
	var $tableTrainingid = 'XtrainingCode';

	var $tableExam = 'tblexamtype';
	var $tableExamid = 'examId';

	

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($strEmpNumber = '')
	{		
		if($strEmpNumber != "")
		{
			$this->db->where($this->tableid,$strEmpNumber);
		}
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getEducData($intLevelId = '')
	{		
		if($intLevelId != "")
		{
			$this->db->where($this->tableEducid,$intLevelId);
		}
		
		$objQuery = $this->db->get($this->tableEduc);
		return $objQuery->result_array();	
	}

	function getCourseData($strCourseCode = '')
	{		
		if($strCourseCode != "")
		{
			$this->db->where($this->tableCourseid,$strCourseCode);
		}
		
		$objQuery = $this->db->get($this->tableCourse);
		return $objQuery->result_array();	
	}

	function getScholarshipData($intScholarId = '')
	{		
		if($intScholarId != "")
		{
			$this->db->where($this->tableScholarshipid,$intScholarId);
		}
		
		$objQuery = $this->db->get($this->tableScholarship);
		return $objQuery->result_array();	
	}
	function getSchoolData($intEmpNum = '')
	{		
		if($intEmpNum != "")
		{
			$this->db->where($this->tableSchoolid,$intEmpNum);
		}
		// $this->db->join('tblEmpPersonal','tblEmpPersonal.empNumber = '.$this->tableSchool.'.empNumber','left');
		// $this->db->order_by('tblempschool.'.$this->tableSchoolid,'ASC');
		$objQuery = $this->db->get($this->tableSchool);
		return $objQuery->result_array();	
	}

	function getTrainingData($strTableTraining = '')
	{		
		if($strTableTraining != "")
		{
			$this->db->where($this->tableTrainingid,$strTableTraining);
		}
		// $this->db->join('tblEmpPersonal','tblEmpPersonal.empNumber = '.$this->tableSchool.'.empNumber','left');
		// $this->db->order_by('tblempschool.'.$this->tableSchoolid,'ASC');
		$objQuery = $this->db->get($this->tableTraining);
		return $objQuery->result_array();	
	}
	function getExamData($intExamId = '')
	{		
		if($intExamId != "")
		{
			$this->db->where($this->tableExamid,$intExamId);
		}
		// $this->db->join('tblEmpPersonal','tblEmpPersonal.empNumber = '.$this->tableSchool.'.empNumber','left');
		// $this->db->order_by('tblempschool.'.$this->tableSchoolid,'ASC');
		$objQuery = $this->db->get($this->tableExam);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblAppointment', $arrData);
		return $this->db->insert_id();		
	}
	
	// function checkExist($strAppointmentCode = '', $strAppointmentDesc = '')
	// {		
	// 	$strSQL = " SELECT * FROM tblAppointment					
	// 				WHERE  
	// 				appointmentCode ='$strAppointmentCode' OR
	// 				appointmentDesc ='$strAppointmentDesc'					
	// 				";
	// 	//echo $strSQL;exit(1);
	// 	$objQuery = $this->db->query($strSQL);
	// 	return $objQuery->result_array();	
	// }

				
		
	function save($arrData, $intAppointmentId)
	{
		$this->db->where('appointmentId', $intAppointmentId);
		$this->db->update('tblAppointment', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intAppointmentId)
	{
		$this->db->where('appointmentId', $intAppointmentId);
		$this->db->delete('tblAppointment'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
