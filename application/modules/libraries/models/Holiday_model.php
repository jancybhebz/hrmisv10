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

	var $table = 'tblholiday';
	var $tableid = 'holidayCode';

	var $table2 = 'tbllocalholiday';
	var $tableid2 = 'holidayCode';

	var $table3 = 'tblholidayyear';
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
		$this->db->join('tblholidayYear','tblholidayYear.holidayCode = '.$this->table.'.holidayCode','inner');
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
		//$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');

		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function getHolidayDate($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid3,$strCode);
		}
		//$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');

		$objQuery = $this->db->get($this->table3);
		return $objQuery->result_array();	
	}

	//ADD
	function add($arrData)
	{
		$this->db->insert('tblholiday', $arrData);
		return $this->db->insert_id();		
	}

	function add_local($arrData)
	{
		$this->db->insert('tbllocalholiday', $arrData);
		return $this->db->insert_id();		
	}

	function manage_add($arrData)
	{
		$this->db->insert('tblholidayyear', $arrData);
		return $this->db->insert_id();		
	}
	
	//CHECK IF EXIST	
	function checkExist($strHolidayCode = '', $strHolidayName = '')
	{		
		$strSQL = " SELECT * FROM tblholiday					
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
		$strSQL = " SELECT * FROM tbllocalholiday					
					WHERE  
					holidayDate ='$dtmHolidayDate' 
					-- holidayDate ='$dtmHolidayDate' OR
									
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function checkHolidayExist($dtmHolidayDate = '')
	{		
		$strSQL = " SELECT * FROM tblholidayYear					
					WHERE  
					holidayCode ='$strHolidayCode' OR
					holidayDate ='$dtmHolidayDate' 								
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}


	// function getLastHolidayCode()
	// {		
	// 	$lenHM =5; 
	// 	$SQL ="SELECT SUBSTRING(holidayCode,$lenHM) AS codeNum FROM tblLocalHoliday ORDER BY codeNum DESC"; //WHERE holidayCode LIKE '$t_strHolidayName%' 
	// 	  $rs= $this->db->query($SQL);
	// 	  if( $rs->num_rows()==0)
	// 		{
	// 		$strCode="0001";	     
	// 		}
	// 	  	else
	// 		  {
	// 			$row = mysql_fetch_row($rs);
	// 		  	$strCode=substr($rs[0]['codeNum'],-4,4);
	// 		  	$strCode=intval($strCode)+1;
	// 		  	$strCode ="LOC-".$holidayCode;
	// 		  }
		  
	// 	  $SQL=
	// 	  $row=mysql_fetch_array(mysql_query("SELECT * FROM `tblHoliday` WHERE holidayCode='$t_strHolidayName'"));

	// 	  $results = "INSERT INTO tblLocalHoliday (holidayCode, holidayName, holidayDate) VALUES ('$holidayCode', '".$row["holidayName"]."', '$t_strHolidayDate')";
	// 	 mysql_query($results) or die (mysql_error());	
	// }

	
	//SAVE
	function save($arrData, $strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->update('tblholiday', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function save_local($arrData, $strCode)
	{
		$this->db->where('holidayName', $strCode);
		$this->db->update('tbllocalholiday', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_manage($arrData, $strCode)
	{
		$this->db->where('holidayId', $strCode);
		$this->db->update('tblholidayyear', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	
	//DELETE	
	function delete($strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->delete('tblholiday'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_local($strCode)
	{
		$this->db->where('holidayName', $strCode);
		$this->db->delete('tbllocalholiday'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_manage_holiday($strCode)
	{
		$this->db->where('holidayId', $strCode);
		$this->db->delete('tblholidayyear'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
