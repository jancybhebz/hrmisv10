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

	# get Leaves
	// TODO:: SURE FOR THIS FUNCTION
	function getleave($empid, $month=0, $yr=0)
	{
		$arrcond = array('empNumber' => $empid);
		if($month != 0) : $arrcond['periodMonth']=$month; endif;
		if($yr != 0) : $arrcond['periodYear']=$yr; endif;

		$this->db->order_by('periodMonth', 'desc');
		$this->db->order_by('periodYear', 'desc');
		return $this->db->get_where('tblEmpLeaveBalance', $arrcond)->result_array();
	}

	# add leaves
	function addLeaveBalance($arrData)
	{
		$this->db->insert('tblEmpLeaveBalance', $arrData);
		return $this->db->insert_id();
	}

	# Late undertime equivalent
	function ltut_table_equiv($ltut)
	{
		$arrequiv = array("0"  => 0.000, "1"  => 0.002, "2"  => 0.004, "3"  => 0.006,"4"  => 0.008,"5"  => 0.010,
						  "6"  => 0.012, "7"  => 0.015, "8"  => 0.017,"9"  => 0.019,"10" => 0.021,
						  "11" => 0.023, "12" => 0.025, "13" => 0.027,"14" => 0.029,"15" => 0.031,
						  "16" => 0.033, "17" => 0.035, "18" => 0.037,"19" => 0.040,"20" => 0.042,
						  "21" => 0.044, "22" => 0.046, "23" => 0.048,"24" => 0.050,"25" => 0.052,
						  "26" => 0.054, "27" => 0.056, "28" => 0.058,"29" => 0.060,"30" => 0.062,
						  "31" => 0.065, "32" => 0.067, "33" => 0.069,"34" => 0.071,"35" => 0.073,
						  "36" => 0.075, "37" => 0.077, "38" => 0.079,"39" => 0.081,"40" => 0.083,
						  "41" => 0.085, "42" => 0.087, "43" => 0.090,"44" => 0.092,"45" => 0.094,
						  "46" => 0.096, "47" => 0.098, "48" => 0.100,"49" => 0.102,"50" => 0.104,
						  "51" => 0.106, "52" => 0.108, "53" => 0.110,"54" => 0.112,"55" => 0.115,
						  "56" => 0.117, "57" => 0.119, "58" => 0.121,"59" => 0.123,"60" => 0.125);
		$hrs = 0;
		$mins = 0;
		if($ltut > 0):
			if($ltut>=60){
				$hrs=(int)($ltut/60);
				$mins=($ltut%60);
				$ltut = ($hrs*0.125) + ($arrequiv[$mins]);
			}else{
				$mins=($ltut%60);
				$ltut = $arrequiv[$mins];
			}
		endif;
		return $ltut;
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
	public function getforce_leave($empid, $yr=0, $month=0)
	{
		$this->db->where("empNumber", $empid);
		$this->db->where("remarks", "FL");
		if($month == 0):
			$this->db->like("dtrDate", $yr,'after');
		else:
			$this->db->where("dtrDate >", $yr.'-01-01');
			$this->db->where("dtrDate <", join('-',array($yr,sprintf('%02d', $month+1),'01')));
		endif;
		return $this->db->get('tblEmpDTR')->result_array();
	}

	public function getleave_data($code = '')
	{
		if($code!=''):
			return $this->db->get_where('tblLeave', array('leaveCode' => $code))->result_array();
		else:
			return $this->db->get('tblLeave')->result_array();
		endif;
	}
		
}
