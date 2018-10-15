<?php 
/** 
Purpose of file:    Model for Plantilla Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Plantilla_model extends CI_Model {

	var $table = 'tblPlantilla';
	var $tableid = 'plantillaID';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	function getData($intPlantillaId = '')
	{		
		if($intPlantillaId != "")
		{
			$this->db->where($this->tableid,$intPlantillaId);
		}
		 $this->db->join('tblposition','tblposition.positionId = '.$this->table.'.plantillaID','left');
		 $this->db->join('tblplantillagroup','tblplantillagroup.plantillaGroupCode = '.$this->table.'.plantillaGroupCode','left');
		 $this->db->join('tblexamtype','tblexamtype.examCode = '.$this->table.'.examCode','left');
		 $this->db->order_by('tblPlantilla.'.$this->tableid,'ASC');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getAllPlantilla()
	{		
		return $this->db->order_by('itemNumber','ASC')->get($this->table)->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	function checkExist($strPlantilla = '', $strPosition = '')
	{		
		$this->db->where('itemNumber',$strPlantilla);
		$this->db->or_where('positionCode', $strPosition);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function save($arrData, $intPlantillaId)
	{
		$this->db->where($this->tableid, $intPlantillaId);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intPlantillaId)
	{
		$this->db->where($this->tableid, $intPlantillaId);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
