<?php 
/** 
Purpose of file:    Model for Leave
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leave_model extends CI_Model {

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

	function submitFL($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	function submitSPL($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	function submitSL($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	function submitVL($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	function submitML($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	function submitPL($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	function submitSTL($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strDay = '')
	{		
		$strSQL = " SELECT * FROM tblemprequest					
					WHERE  
					requestDetails ='$strDay' 				
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

	## Begin get Leaves
	function getleave($empid, $month=0, $yr=0)
	{
		if($month == 0 || $yr == 0):
			$arrcond = array('empNumber' => $empid);
		else:
			$arrcond = array('empNumber' => $empid, 'periodMonth' => $month, 'periodYear' => $yr);
		endif;

		return $this->db->get_where('tblEmpLeaveBalance', $arrcond)->result_array();
	}

	#Priveledge Leave
	public function getspe_leave($empid, $yr=0)
	{
		$this->db->where("empNumber", $empid);
		$this->db->like("dtrDate", $yr, "after");
		$this->db->where("(remarks='PL' OR remarks='SPL')");
		$dtrpl_sl = $this->db->get('tblEmpDTR')->result_array();
		$dtrpl_sl_used = count($dtrpl_sl) > 0 ? count($dtrpl_sl) : 0;
		
		$numdays = $this->db->get_where('tblLeave', array('leaveCode' => 'PL'))->result_array();
		$numdays = count($numdays) > 0 ? $numdays[0]['numOfDays'] : 0;
		
		$spe_leave = $numdays - $dtrpl_sl_used;
		return $spe_leave;
	}

	#Forced Leave
	public function getforce_leave($empid, $yr=0)
	{
		echo '<pre>';
		$this->db->where("empNumber", $empid);
		$this->db->like("dtrDate", $yr, "after");
		$this->db->where("remarks", "FL");
		$dtrfl = $this->db->get('tblEmpDTR')->result_array();
		$dtrfl_used = count($dtrfl) > 0 ? count($dtrfl) : 0;
		
		// $numdays = $this->db->get_where('tblLeave', array('leaveCode' => 'PL'))->result_array();
		// $numdays = count($numdays) > 0 ? $numdays[0]['numOfDays'] : 0;
		
		// $spe_leave = $numdays - $dtrpl_sl_used;
		// return $spe_leave;
		die();
	}
		
}
