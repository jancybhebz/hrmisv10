<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Courses_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	public function add($arrData)
	{
		$this->db->insert('tblCourse', $arrData);
		return $this->db->insert_id();		
	}
	
	public function checkExist($strCode)
	{		
		$strSQL = " SELECT courseCode FROM tblCourse					
					WHERE 1=1 
					AND courseCode='".$strCode."'
					ORDER BY courseDesc
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	public function getData($strCode="")
	{		
		$where='';
		if($strCode!="")
			$where .= " AND courseCode='".$strCode."'";
		
		$strSQL = " SELECT * FROM tblCourse					
					WHERE 1=1 
					$where
					ORDER BY courseDesc
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}			
		
	public function save($arrData, $strCode)
	{
		$this->db->where('courseCode',$strCode);
		$this->db->update('tblCourse', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	public function delete($strCode)
	{
		$this->db->where('courseCode', $strCode);
		$this->db->delete('tblCourse'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
/* End of file Courses_model.php */
/* Location: ./application/modules/libraries/models/Courses_model.php */