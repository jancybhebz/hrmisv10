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
		// $this->db->join('tblHolidayYear','tblHolidayYear.holidayCode = '.$this->table.'.holidayCode','inner');
		// $this->db->order_by('holidayName');
		// $this->db->group_by($this->table.'.holidayCode');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getManageHoliday($intHolidayId = '')
	{	
		$this->db->Select('tblHolidayYear.*,tblHoliday.holidayName');
		if($intHolidayId != "")
		{
			$this->db->where('tblHolidayYear.holidayId',$intHolidayId);
		}
		$this->db->join('tblHolidayYear','tblHolidayYear.holidayCode = '.$this->table.'.holidayCode','inner');
		$this->db->order_by('holidayName');
		$this->db->group_by($this->table.'.holidayCode');
		$objQuery = $this->db->get($this->table);
		//echo $this->db->last_query();
		return $objQuery->result_array();	
	}

	function getLocalHoliday($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid2,$strCode);
		}
		$this->db->order_by('holidayDate desc');

		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function getLastLocalCode()
	{		
		$this->db->Select('holidayCode');
		$this->db->order_by('holidayCode desc');
		$objQuery = $this->db->get('tblLocalHoliday');
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

	
	function getWorkSuspension($intHolidayId = '')
	{		
		$this->db->where('holidayCode','WS');
		if($intHolidayId != "")
		{
			$this->db->where('holidayId',$intHolidayId);
		}
		//$this->db->join('tblEmpPersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');
		$this->db->order_by('holidayCode');
		// $this->db->group_by('tblholidayyear'.'.holidayCode');
		$objQuery = $this->db->get('tblHolidayYear');
		return $objQuery->result_array();	
	}


	//ADD
	function add($arrData)
	{
		$this->db->insert('tblHoliday', $arrData);
		return $this->db->insert_id();		
	}

	function manage_add($arrData)
	{
		$this->db->insert('tblHolidayYear', $arrData);
		return $this->db->insert_id();		
	}

	function add_local($arrData)
	{
		$this->db->insert('tblLocalHoliday', $arrData);
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

	function checkHolidayExist($strHolidayName = '', $dtmHolidayDate = '')
	{		
		$strSQL = " SELECT * FROM tblHolidayYear					
					WHERE  
					holidayCode ='$strHolidayName' AND
					holidayDate ='$dtmHolidayDate' 								
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function checkLocExist($strLocalName = '', $dtmHolidayDate = '')
	{		
		if($dtmHolidayDate!=''):
			$strSQL = " SELECT * FROM tblLocalHoliday					
					WHERE  
					holidayCode ='$strLocalName' AND
					holidayName ='$dtmHolidayDate'					
					";
		else:
			$strSQL = "SELECT * FROM tblLocalHoliday";
		endif;
		
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function checkWorkSuspensionExist($dtmSuspensionDate = '')
	{		
		$strSQL = " SELECT * FROM tblHolidayYear					
					WHERE  
					holidayDate ='$dtmSuspensionDate'								
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

	function save_manage($arrData, $intHolidayId)
	{
		$this->db->where('holidayId', $intHolidayId);
		$this->db->update('tblHolidayYear', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_local($arrData, $strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->update('tblLocalHoliday', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_worksuspension($arrData, $intHolidayId)
	{
		$this->db->where('holidayId', $intHolidayId);
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

	function delete_manage($intHolidayId)
	{
		$this->db->where('holidayId', $intHolidayId);
		$this->db->delete('tblHolidayYear'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_local($strCode)
	{
		$this->db->where('holidayName', $strCode);
		$this->db->delete('tblLocalHoliday'); 	
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

	function getAllHolidates($empid,$sdate,$edate)
	{
		$this->db->where("(holidayDate >= '".$sdate."' and holidayDate <= '".$edate."')");
		$reg_holidays = $this->db->get_where('tblHolidayYear')->result_array();

		$this->db->select("concat(holidayYear,'-',LPAD(holidayMonth,2,0),'-',LPAD(holidayDay,2,0)) as holidate");
		$this->db->where("(STR_TO_DATE(concat(holidayYear,'-',holidayMonth,'-',holidayDay),'%Y-%m-%d') >= '".$sdate."' and STR_TO_DATE(concat(holidayYear,'-',holidayMonth,'-',holidayDay),'%Y-%m-%d') <= '".$edate."')");
		$localholidays = $this->db->get('tblLocalHoliday')->result_array();

		$allholidays = array_merge(array_column($reg_holidays,'holidayDate'),array_column($localholidays,'holidate'));
		return $allholidays;
	}

		
}
