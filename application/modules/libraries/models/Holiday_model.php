<?php 
/** 
Purpose of file:    Model for Holiday Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Holiday_model extends CI_Model {

	var $table = 'tblHoliday';
	var $tableid = 'holidayCode';

	var $table2 = 'tblLocalHoliday';
	var $tableid2 = 'holidayCode';

	var $table3 = 'tblHolidayYear';
	var $tableid3 = 'holidayId';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid,$strCode);
		}
		$this->db->join('tblHolidayYear','tblHolidayYear.holidayCode = '.$this->table.'.holidayCode','inner');
		$this->db->order_by('holidayName');
		$this->db->group_by($this->table.'.holidayCode');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getLocalHoliday($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid2,$strCode);
		}
		//$this->db->join('tblEmpPersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');

		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function getHolidayDate($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid3,$strCode);
		}
		//$this->db->join('tblEmpPersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');

		$objQuery = $this->db->get($this->table3);
		return $objQuery->result_array();	
	}

	//ADD
	function add($arrData)
	{
		$this->db->insert('tblHoliday', $arrData);
		return $this->db->insert_id();		
	}

	function add_local($arrData)
	{
		$this->db->insert('tblLocalHoliday', $arrData);
		return $this->db->insert_id();		
	}

	function manage_add($arrData)
	{
		$this->db->insert('tblHolidayYear', $arrData);
		return $this->db->insert_id();		
	}

	function add_worksuspension($arrData)
	{
		$this->db->insert('tblHolidayYear', $arrData);
		return $this->db->insert_id();		
	}

	
	//CHECK IF EXIST	
	function checkExist($strHolidayCode = '', $strHolidayName = '')
	{		
		$strSQL = " SELECT * FROM tblHoliday					
					WHERE  
					holidayCode ='$strHolidayCode' OR
					holidayName ='$strHolidayName'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function checkLocExist($dtmHolidayDate = '')
	{		
		if($dtmHolidayDate!=''):
			$strSQL = " SELECT * FROM tblLocalHoliday					
					WHERE  
					holidayDate ='$dtmHolidayDate' 
					-- holidayDate ='$dtmHolidayDate' OR
									
					";
		else:
			$strSQL = "SELECT * FROM tblLocalHoliday";
		endif;
		
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function checkHolidayExist($dtmHolidayDate = '')
	{		
		$strSQL = " SELECT * FROM tblHolidayYear					
					WHERE  
					holidayCode ='$strHolidayCode' OR
					holidayDate ='$dtmHolidayDate' 								
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function checkWorkSuspensionExist($dtmSuspensionDate = '')
	{		
		$strSQL = " SELECT * FROM tblHolidayYear					
					WHERE  
					holidayDate ='$dtmSuspensionDate' OR
					holidayTime ='$dtmSuspensionTime' 								
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}


	//SAVE
	function save($arrData, $strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->update('tblHoliday', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_local($arrData, $strCode)
	{
		$this->db->where('holidayName', $strCode);
		$this->db->update('tblLocalHoliday', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_manage($arrData, $strCode)
	{
		$this->db->where('holidayId', $strCode);
		$this->db->update('tblHolidayYear', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_worksuspension($arrData, $strCode)
	{
		$this->db->where('holidayId', $strCode);
		$this->db->update('tblHolidayYear', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	
	//DELETE	
	function delete($strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->delete('tblHoliday'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_local($strCode)
	{
		$this->db->where('holidayName', $strCode);
		$this->db->delete('tblLocalHolidayYear'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_manage_holiday($strCode)
	{
		$this->db->where('holidayId', $strCode);
		$this->db->delete('tblHolidayYear'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_worksuspension($strCode)
	{
		$this->db->where('holidayId', $strCode);
		$this->db->delete('tblHolidayYear'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
