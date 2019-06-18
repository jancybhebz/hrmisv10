<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/Hr_model','hr/chart_model','pds/pds_model','home_model'));
    }

	public function index()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$userlevel = $this->session->userdata('sessUserLevel');
		if($userlevel == 2):
			redirect('finance/notifications/npayroll');
		endif;

		if(in_array($userlevel, array(3,4,5))):
			redirect('hr/profile/'.$empid);
		endif;

		# plantilla chart
		$arrPlantillaChart = $this->chart_model->plantilla_positions();
		$intFilled=0;$intVacant=0;
		foreach($arrPlantillaChart->result_array() as $row):
			if($row['empNumber']!='')
				$intFilled+=1;
			else
				$intVacant+=1;
		endforeach;
		$this->arrData['intFilled']=$intFilled;
		$this->arrData['intVacant']=$intVacant;
		# gender chart
		$arrAS = $this->Hr_model->appointment_status();
		$arrASFull = $this->Hr_model->appointment_status(TRUE);
				
		foreach($arrASFull as $row):
			$arrGenderChart[$row]['M'] = $this->chart_model->gender_appointment($row,'M');
			$arrGenderChart[$row]['M']['appCode'] = appstatus_code($row);
			$arrGenderChart[$row]['F'] = $this->chart_model->gender_appointment($row,'F');
			$arrGenderChart[$row]['F']['appCode'] = appstatus_code($row);
		endforeach;
		# total male
		$i=0;$arrGender=array('intTotalMale'=>0,'intTotalFemale'=>0);
		      foreach($arrASFull as $row):
		          $arrGender['intTotalMale'] += $arrGenderChart[$row]['M'][0]['total'];
		          $arrGender['intTotalFemale'] += $arrGenderChart[$row]['F'][0]['total'];
		      endforeach;

		$this->arrData['arrAS'] = $arrAS;
		$this->arrData['arrASFull'] = $arrASFull;
		$this->arrData['arrGender'] = $arrGender;
		$this->arrData['arrGenderChart'] = $arrGenderChart;
		$this->template->load('template/template_view','home/home_view',$this->arrData);
	}

	public function switch_hr_emp()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 5;
		redirect('hr/profile/'.$empid);
	}

	public function switch_emp_hr()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 1;
		redirect('home');
	}

	public function switch_fin_emp()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 5;
		redirect('hr/profile/'.$empid);
	}

	public function switch_emp_fin()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 2;
		redirect('home');
	}

	public function birthdays()
	{
		$this->arrData['arrData'] = $this->home_model->getbirthdays();
		$this->template->load('template/template_view','home/birthday_view',$this->arrData);
	}

	public function vacantpositions()
	{
		$arrTmpData = $this->home_model->getvacantpositions();
		$i=0;
		foreach($arrTmpData as $row):
			$itemNumber = $row['itemNumber'];
			$positionCode = $row['positionCode'];
			$plantillaGroupCode = $row['plantillaGroupCode'];
			// $result = mysql_query("SELECT tblEmpPersonal.empNumber, tblEmpPosition.itemNumber, tblEmpPosition.divisionCode,
			// 					tblEmpPosition.statusOfAppointment FROM tblEmpPersonal
			// 					INNER JOIN tblEmpPosition
			// 					ON tblEmpPersonal.empNumber = tblEmpPosition.empNumber
			// 					WHERE tblEmpPosition.statusOfAppointment = 'In-Service'
			// 					AND tblEmpPosition.itemNumber = '".$itemNumber."'");
			// $numResult = mysql_num_rows($result);

			$objResult = $this->db->select('tblEmpPersonal.empNumber, tblEmpPosition.itemNumber,tblEmpPosition.statusOfAppointment')->join('tblEmpPosition','tblEmpPersonal.empNumber = tblEmpPosition.empNumber','inner')->where('tblEmpPosition.statusOfAppointment','In-Service')->where('tblEmpPosition.itemNumber',$itemNumber)->get('tblEmpPersonal')->result_array();
			//echo $this->db->last_query();
			$numResult = count($objResult);
			if($numResult==0)
			{
				$strPlantillaGroupName = plantilla_group($plantillaGroupCode);
				$strPositionName = position_name($positionCode);
				$arrData[$i] = array(
					'itemNumber'=>$itemNumber,
					'positionName'=>$strPositionName,
					'plantillaGroup'=>$strPlantillaGroupName
					);
				$i++;
				// echo "<tr>
				// 		<td>&nbsp;".$itemNumber."</td>
				// 		<td>&nbsp;".$strPositionName."</td>
				// 		<td>&nbsp;".$strPlantillaGroupName."</td>
				// 	  </tr>";
			}
		endforeach;
		$this->arrData['arrData'] = $arrData;
		$this->template->load('template/template_view','home/vacantposition_view',$this->arrData);
	}

	
}
