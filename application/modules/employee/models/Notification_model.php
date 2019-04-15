<?php 
/** 
Purpose of file:    Model for Notification
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notification_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();	
	}

	function getData($intrequestID = '')
	{		
		if($intrequestID != "")
		{
			$this->db->where('requestID',$intrequestID);
		}
		$this->db->join('tblempPersonal','tblempPersonal.empNumber = tblempRequest.empNumber','left');
		$objQuery = $this->db->get('tblempRequest');
		return $objQuery->result_array();	
	}

	// showing all notifications
	// function getData($intrequestID = '')
	// {		
	// 	if($intrequestID != "")
	// 	{
	// 		$this->db->where('requestID',$intrequestID);
	// 	}
	// 	$this->db->join('tblempPersonal','tblempPersonal.empNumber = tblempRequest.empNumber','left');
	// 	$objQuery = $this->db->get('tblempRequest');
	// 	return $objQuery->result_array();	
	// }


	function add($arrData)
	{
		$this->db->insert('tblemprequest', $arrData);
		return $this->db->insert_id();		
	}
	
	// function checkExist($strAppointmentCode = '', $strAppointmentDesc = '')
	// {		
	// 	$strSQL = " SELECT * FROM tblAppointment					
	// 				WHERE  
	// 				appointmentCode ='$strAppointmentCode' OR
	// 				appointmentDesc ='$strAppointmentDesc'					
	// 				";
	// 	//echo $strSQL;exit(1);
	// 	$objQuery = $this->db->query($strSQL);
	// 	return $objQuery->result_array();	
	// }

				
		
	function save($arrData, $intAppointmentId)
	{
		$this->db->where('appointmentId', $intAppointmentId);
		$this->db->update('tblAppointment', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intAppointmentId)
	{
		$this->db->where('appointmentId', $intAppointmentId);
		$this->db->delete('tblAppointment'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	# BEGIN NOTIFICATION
	function signatoryflow($next_sign, $flow_sign, $req_sign)
	{
		switch ($next_sign):
		    case 'Signatory2':
		        $this->checksignatory2($flow_sign, $req_sign);
		        break;
		    case 'Signatory3':
		        $this->checksignatory3($flow_sign, $req_sign);
		        break;
		    case 'Signatory4':
		        $this->checksignatory4($flow_sign, $req_sign);
		        break;
		    default:
		    	$this->checksignatory1($flow_sign, $req_sign);
		        break;
		endswitch;
	}

	function checksignatory1($flow_sign, $req_sign)
	{
		if($flow_sign['Signatory1'] != ''):
			if($req_sign['Signatory1'] != ''):
				$this->signatoryflow('Signatory2', $flow_sign, $req_sign);
			else:
				return $flow_sign['Signatory1'];
			endif;
		else:
			$this->signatoryflow('Signatory2', $flow_sign, $req_sign);
		endif;
	}

	function checksignatory2($flow_sign, $req_sign)
	{
		if($flow_sign['Signatory2'] != ''):
			if($req_sign['Signatory2'] != ''):
				$this->signatoryflow('Signatory3', $flow_sign, $req_sign);
			else:
				return $flow_sign['Signatory2'];
			endif;
		else:
			$this->signatoryflow('Signatory3', $flow_sign, $req_sign);
		endif;
	}

	function checksignatory3($flow_sign, $req_sign)
	{
		if($flow_sign['Signatory3'] != ''):
			if($req_sign['Signatory3'] != ''):
				$this->signatoryflow('Signatory4', $flow_sign, $req_sign);
			else:
				return $flow_sign['Signatory3'];
			endif;
		else:
			$this->signatoryflow('Signatory4', $flow_sign, $req_sign);
		endif;
	}

	function checksignatory4($flow_sign, $req_sign)
	{
		if($flow_sign['SignatoryFin'] != ''):
			if($req_sign['SignatoryFin'] != ''):
				return 'done';
			else:
				return $flow_sign['SignatoryFin'];
			endif;
		else:
			return 'done';
		endif;
	}

	function getDestination($desti)
	{
		$desti = explode(';', $desti);
		if(count($desti) > 1):
			$empdesti = employee_name($desti[2]);
			switch ($desti[0]):
			    case 'RECOMMENDED':
			        return 'for Recommendation by '.$empdesti;
			        echo 'for Recommendation by '.$empdesti;
			        break;
			    case 'APPROVED':
			        return 'for Approval by '.$empdesti;
			        echo 'for Approval by '.$empdesti;
			        break;
			    case 'CERTIFIED':
			        return 'for Certification by '.$empdesti;
			        echo 'for Certification by '.$empdesti;
			        break;
			    default:
			    	return '';
			        break;
			endswitch;
		endif;
	}
	# END NOTIFICATION
		
}
