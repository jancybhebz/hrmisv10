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

	var $table = 'tblemppersonal';
	var $tableid = 'empNumber';

	var $table2 = 'tblempchild';
	var $tableid2 = 'empNumber';

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

	function getChildData($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid2,$strCode);
		}
		$objQuery = $this->db->get($this->table2);
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

	function save_child($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid2, $strEmpNumber);
		$this->db->update($this->table2, $arrData);
		//echo $this->db->last_query();exit(1);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_Educ($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid3, $strEmpNumber);
		$this->db->update($this->table3, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_Exam($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid4, $strEmpNumber);
		$this->db->update($this->table4, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_Training($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid7, $strEmpNumber);
		$this->db->update($this->table7, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_VolWorks($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid6, $strEmpNumber);
		$this->db->update($this->table6, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_Position($arrData, $strEmpNumber)
	{
		$this->db->where($this->tableid8, $strEmpNumber);
		$this->db->update($this->table8, $arrData);
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
}
