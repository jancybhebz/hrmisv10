<?php 
/** 
Purpose of file:    Model for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_account_model extends CI_Model {

	var $table = 'tblEmpAccount';
	var $tableid = 'empNumber';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intEmpNumber = '')
	{		
		if($intEmpNumber != "")
		{
			$this->db->where($this->tableid,$intEmpNumber);
		}
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();		
	}

	function getEmpDetails($intEmpNumber = '')
	{		
	    if($intEmpNumber != "")
		{
			$this->db->where($this->tableid,$intEmpNumber);
		}
		$this->db->join('tblEmpPersonal','tblEmpPersonal.empNumber = '.$this->table.'.empNumber','left');
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getUserLevel($strULevel = '')
	{		
		if($strULevel != "")
		{
			$this->db->where('userLevel',$strULevel);
		}
		// $this->db->group_by('userLevel');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();		
	}

	function getPayrollGroup($intPGroup = '')
	{		
		if($intPGroup != "")
		{
			$this->db->where('payrollGroupId',$intPGroup);
		}
		// $this->db->group_by('payrollGroupName');
		$objQuery = $this->db->get('tblPayrollGroup');
		return $objQuery->result_array();		
	}

	
	function add($arrData)
	{			
		$this->db->insert($this->table, $arrData);
		echo $this->db->last_query();
		return $this->db->insert_id();	
	}
	
	function checkExist($strAccessLevel = '', $strUsername = '')
	{		

		$this->db->where('userLevel',$strAccessLevel);
		$this->db->or_where('userName', $strUsername);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function check_user_exists($username,$empnumber)
	{
		$this->db->where('userName',$username);
		$this->db->or_where('empNumber',$empnumber);
		return $this->db->get('tblEmpAccount')->result_array();
	}

	function save($arrData, $intEmpNumber)
	{
		$this->db->where($this->tableid, $intEmpNumber);
		$this->db->update($this->table, $arrData);
		// echo $this->db->last_query();
		// exit(1);
		// echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intEmpNumber)
	{
		$this->db->where($this->tableid, $intEmpNumber);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	
	function getemployee_forapi($empnumber = '')
	{
		# position
		$this->db->select('tblEmpPosition.group1,tblEmpPosition.group2,tblEmpPosition.group3,tblEmpPosition.group4,tblEmpPosition.group5');
		# personal
		$this->db->select('tblEmpPersonal.empNumber,tblEmpPersonal.surname,tblEmpPersonal.firstname,tblEmpPersonal.middlename,tblEmpPersonal.middleInitial,tblEmpPersonal.nameExtension,tblEmpPersonal.sex,tblEmpPersonal.birthday,tblEmpPersonal.mobile');
	    # user account
		$this->db->select('tblEmpAccount.userName,tblEmpAccount.userPassword');

	    $this->db->join('tblEmpAccount','tblEmpAccount.empNumber = tblEmpPosition.empNumber','left');
	    $this->db->join('tblEmpPersonal','tblEmpPersonal.empNumber = tblEmpPosition.empNumber','left');

	    $res = $this->db->get_where('tblEmpPosition',array('tblEmpPosition.statusOfAppointment' => 'In-Service'))->result_array();

	    return $res;
	}


}
