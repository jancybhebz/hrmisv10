<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pds extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
    }

	public function index()
	{
		$this->load->model(array('hr/Hr_model','hr/chart_model'));
		$arrData['arrEmployees'] = $this->Hr_model->getData();
		//plantilla chart
		$arrPlantillaChart = $this->chart_model->plantilla_positions();
		$intFilled=0;$intVacant=0;
		foreach($arrPlantillaChart->result_array() as $row):
			if($row['empNumber']!='')
				$intFilled+=1;
			else
				$intVacant+=1;
		endforeach;
		$arrData['intFilled']=$intFilled;
		$arrData['intVacant']=$intVacant;
		//gender chart
		$arrAS = $this->Hr_model->appointment_status();
		$arrASFull = $this->Hr_model->appointment_status(TRUE);
		//print_r($arrASFull);
		foreach($arrASFull as $row):
			//echo $row."<br>";
			$arrGenderChart[$row]['M'] = $this->chart_model->gender_appointment($row,'M');
			$arrGenderChart[$row]['M']['appCode'] = appstatus_code($row);
			$arrGenderChart[$row]['F'] = $this->chart_model->gender_appointment($row,'F');
			$arrGenderChart[$row]['F']['appCode'] = appstatus_code($row);
			//echo "<br>";
			//$arrGenderChart[$row] = $this->chart_model->gender_appointment($row);
		endforeach;
		//total male
		$i=0;$arrGender=array('intTotalMale'=>0,'intTotalFemale'=>0);
        foreach($arrASFull as $row):
        	//echo $row.'=>M=>'.$arrGenderChart[$row]['M'][0]['total']."<br>";
        	//echo $row.'=>F=>'.$arrGenderChart[$row]['F'][0]['total'];
        	//echo '<br><br>';
            $arrGender['intTotalMale'] += $arrGenderChart[$row]['M'][0]['total'];
            $arrGender['intTotalFemale'] += $arrGenderChart[$row]['F'][0]['total'];
        endforeach;

		$arrData['arrAS'] = $arrAS;
		$arrData['arrASFull'] = $arrASFull;
		$arrData['arrGender'] = $arrGender;
		$arrData['arrGenderChart'] = $arrGenderChart;
		$this->template->load('template/template_view','pds/default_view',$arrData);
	}
	
	
	

}
