<?php 
/** 
Purpose of file:    Model for Official Business
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Official_business_model extends CI_Model {

	var $table = 'tblemprequest';
	var $tableid = 'requestID';

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();	
	}
	
	function getData($intReqId = '')
	{		
		$strWhere = '';
		if($intReqId != "")
			$strWhere .= " AND requestID = '".$intReqId."'";
		
		$strSQL = " SELECT * FROM tblemprequest					
					WHERE 1=1 
					$strWhere
					ORDER BY requestDate
					";
			
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function submit($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strOBtype = '', $dtmOBrequestdate = '')
	{		
		$strSQL = " SELECT * FROM tblemprequest					
					WHERE  
					requestDetails ='$strOBtype' OR
					requestDate ='$dtmOBrequestdate'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function save($arrData, $intReqId)
	{
		$this->db->where('requestID', $intReqId);
		$this->db->update('tblemprequest', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intReqId)
	{
		$this->db->where('requestID', $intReqId);
		$this->db->delete('tblemprequest'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function getEmployeeOB($empid,$datefrom,$dateto)
	{
		$this->db->where('empNumber', $empid);
		$this->db->where('approveHR', 'Y');
		$this->db->where("(obDateFrom between '".$datefrom."' and '".$dateto."' or obDateTo between '".$datefrom."' and '".$dateto."')");
		$res = $this->db->get('tblEmpOB')->result_array();
		return $res;
	}
		
}
