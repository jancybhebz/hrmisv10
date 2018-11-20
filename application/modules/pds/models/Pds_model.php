<?php 
/** 
Purpose of file:    Model for PDS 
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pds_model extends CI_Model {

	var $table = 'tblEmpPersonal';
	var $tableid = 'empNumber';

	var $tblChild = 'tblEmpChild';
	var $tblChildId = 'childCode';

	var $tblEduc = 'tblEmpSchool';
	var $tblEducId = 'SchoolIndex';

	var $tblExam = 'tblEmpExam';
	var $tblExamId = 'ExamIndex';

	var $tblService = 'tblServiceRecord';
	var $tblServiceId = 'serviceRecID';

	var $tblVol = 'tblEmpVoluntaryWork';
	var $tblVolId = 'VoluntaryIndex';

	var $tblTraining = 'tblemptraining';
	var $tblTrainingId = 'XtrainingCode';

	var $tblPosition = 'tblEmpPosition';
	var $tblPositionId = 'empNumber';

	var $table9 = 'tblempduties';
	var $tableid9 = 'duties';

	var $table10 = 'tblplantilladuties';
	var $tableid10 = 'itemDuties';


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

	function getChild($intChildCode = '')
	{		
		if($intChildCode != "")
		{
			$this->db->where($this->tblChildId,$intChildCode);
		}
		$objQuery = $this->db->get($this->tblChild);
		return $objQuery->result_array();	
	}

	function getEduc($intSchoolIndex = '')
	{		
		if($intSchoolIndex != "")
		{
			$this->db->where($this->tblEducId,$intSchoolIndex);
		}
		$objQuery = $this->db->get($this->tblEduc);
		return $objQuery->result_array();	
	}

	function getExam($intExamIndex = '')
	{		
		if($intExamIndex != "")
		{
			$this->db->where($this->tblExamId,$intExamIndex);
		}
		$objQuery = $this->db->get($this->tblExam);
		return $objQuery->result_array();	
	}

	function getWorkExp($intServiceId = '')
	{		
		if($intServiceId != "")
		{
			$this->db->where($this->tblServiceId,$intServiceId);
		}
		$objQuery = $this->db->get($this->tblService);
		return $objQuery->result_array();	
	}

	function getPosition($strEmpNumber = '')
	{		
		if($strEmpNumber != "")
		{
			$this->db->where($this->tblPositionId,$strEmpNumber);
		}
		$objQuery = $this->db->get($this->tblPosition);
		return $objQuery->result_array();	
	}

	function getImage($ImageId = '')
	{		
		if($strEmpNumber != "")
		{
			$this->db->where($this->tableid,$strEmpNumber);
		}
		// $this->db->join('tblagencyimages','tblagencyimages.id = '.$this->table.'.agencyName','left');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	function add_child($arrData)
	{
		$this->db->insert($this->tblChild, $arrData);
		return $this->db->insert_id();		
	}

	function checkExist($strAgencyName = '', $strAgencyCode = '')
	{		
		
		$this->db->where('agencyName',$strAgencyName);
		$this->db->or_where('agencyCode', $strAgencyCode);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}
	
	function save_personal($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid, $strEmpNumber);
		$this->db->update($this->table, $arrData);
		//echo $this->db->last_query();exit(1);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_child($arrData, $intChildCode)
	{
		$this->db->where($this->tblChildId, $intChildCode);
		$this->db->update($this->tblChild, $arrData);
		//echo $this->db->last_query();exit(1);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_educ($arrData, $intSchoolIndex)
	{
		$this->db->where($this->tblEducId, $intSchoolIndex);
		$this->db->update($this->tblEduc, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_exam($arrData, $intExamIndex)
	{
		$this->db->where($this->tblExamId, $intExamIndex);
		$this->db->update($this->tblExam, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_workExp($arrData, $intServiceId)
	{
		$this->db->where($this->tblServiceId, $intServiceId);
		$this->db->update($this->tblService, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_training($arrData, $strEmpNumber)
	{
		$this->db->where($this->tblTrainingId, $strEmpNumber);
		$this->db->update($this->tblTraining, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_volWorks($arrData, $strVolIndex)
	{
		$this->db->where($this->tblVolId, $strVolIndex);
		$this->db->update($this->tblVol, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_skill($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid, $strEmpNumber);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_position($arrData, $strEmpNumber)
	{
		$this->db->where($this->tblPositionId, $strEmpNumber);
		$this->db->update($this->tblPosition, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_Duties($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid9, $strEmpNumber);
		$this->db->update($this->table9, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save($arrData, $strAgencyName)
	{
		$this->db->where($this->tableid, $strAgencyName);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function saveImage($arrData, $ImageId)
	{
		$this->db->where('id', $ImageId);
		$this->db->update('tblagencyimages', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($strAgencyName)
	{
		$this->db->where($this->tableid, $strAgencyName);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function getDataByField($arrWhere,$appt)
	{
		if($appt == 'P'):
			$compInstance = $this->db->get_where('tblComputationInstance',$arrWhere)->result_array();
			if(count($compInstance) > 0):
				$compInstance = $compInstance[0];
				$compDetails = $this->db->join('tblEmpPersonal', 'tblEmpPersonal.empNumber = tblComputationDetails.empNumber', 'left')
									->order_by('tblEmpPersonal.surname', 'ASC')
									->order_by('tblEmpPersonal.firstname', 'ASC')
									->where('fk_id',$compInstance['id'])
									->where('(periodmonth='.$compInstance['month'].' AND periodyear='.$compInstance['year'].')')
									->get('tblComputationDetails')->result_array();
				return $compDetails;
			endif;
		else:
		endif;
	}


}
