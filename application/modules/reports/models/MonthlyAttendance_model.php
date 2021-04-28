<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MonthlyAttendance_model extends CI_Model {

	var $w=array(70,70,60,60);

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('report_helper');
	}
	
	public function Header()
	{

	}
	
	function Footer()
	{		
		$this->fpdf->SetFont('Arial','',7);	
		$this->fpdf->Cell(50,3,date('Y-m-d h:i A'),0,0,'L');
		$this->fpdf->Cell(0,3,"Page ".$this->fpdf->PageNo(),0,0,'R');
	}

	function getSQLData($intMonth="",$intYear="")
	{
		$arrPermGroup = getPermanentGroup();
		if(count($arrPermGroup)>0)
		{
			$arrGroup = explode(',',$arrPermGroup[0]['processWith']);
			$strGroup = implode('","',$arrGroup);
		}
		
		$this->db->select("a.empNumber, b.surname, b.firstname, b.middleInitial, c.positionDesc, FORMAT(a.actualSalary,2) as actualsalary, COALESCE(e.wfh,0) as office, COALESCE(d.wfh,0) as wfh, COALESCE(e.wfh,0) as daysinoffice, a.hpFactor");
		$this->db->join('tblEmpPersonal b','b.empNumber = a.empNumber','left');
		$this->db->join('tblPosition c','c.positionCode = a.positionCode','left');
		$this->db->join('(select empNumber, count(wfh) as wfh from tblEmpDTR where wfh = 1 and year(dtrDate) = '.$intYear.' and month(dtrDate) = '.$intMonth.' and (inam != "00:00:00" or outpm != "00:00:00") group by empNumber) d','d.empNumber = a.empNumber','left');
		$this->db->join('(select empNumber, count(wfh) as wfh from tblEmpDTR where wfh = 0 and year(dtrDate) = '.$intYear.' and month(dtrDate) = '.$intMonth.' and (inam != "00:00:00" or outpm != "00:00:00") group by empNumber) e','e.empNumber = a.empNumber','left');
		// $this->db->where('year(dtrDate)',$intYear);
		// $this->db->where('month(dtrDate)',$intMonth);
		$this->db->where_in('a.appointmentCode',$arrGroup);
		$this->db->where('a.statusofappointment',"In-Service");
		$this->db->where('a.hpFactor !=',0);
		$this->db->where('b.surname !=',"");
		$this->db->group_by('a.empNumber');
		$this->db->order_by('b.surname');
		$objQuery = $this->db->get('tblEmpPosition a');

		// echo $this->db->last_query();exit(1);
		return $objQuery->result_array();
	}

	function generate($arrData)
	{		
		$this->fpdf->AddPage('L','A4');
		$this->fpdf->Ln(18);
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(0,6,strtoupper('monthly attendance report'), 0, 0, 'C');
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(0,6,"For the Month of " .date("F", mktime(0, 0, 0, $arrData['intMonth'], 10)). ', ' .$arrData['intYear'], 0, 0, 'C');
		$this->fpdf->Ln(15);
		
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->SetFillColor(150,150,150);
		$this->fpdf->Cell(35,10,"Last Name",1,0,'C',1);
		$this->fpdf->Cell(35,10,"First Name",1,0,'C',1);
		$this->fpdf->Cell(10,10,"M.I.",1,0,'C',1);
		$this->fpdf->Cell(45,10,"Position",1,0,'C',1);
		$this->fpdf->Cell(25,10,"Salary",1,0,'C',1);
		$this->fpdf->Cell(40,5,"Attendance",1,0,'C',1);
		$this->fpdf->Cell(30,5,"Number of ","L,R,T",0,'C',1);
		$this->fpdf->Cell(20,10,"%",1,0,'C',1);
		$this->fpdf->Cell(30,10,"Hazard",1,0,'C',1);
		$this->fpdf->Cell(0,0,"",0,1);
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(150,5,"",0,0);
		$this->fpdf->Cell(20,5,"Office",1,0,'C',1);
		$this->fpdf->Cell(20,5,"WFH",1,0,'C',1);
		$this->fpdf->Cell(30,5,"days in Office","L,R,B",0,'C',1);

		$this->fpdf->Ln(6);
		
		$objQuery = $this->getSQLData($arrData['intMonth'],$arrData['intYear']);
		$this->fpdf->SetFillColor(255,255,255);
		$this->fpdf->SetDrawColor(0,0,0);
		$this->fpdf->SetFont('Arial','',10);

		$i=1;
		$totalsalary = 0;
		$totalhazard = 0;

		foreach($objQuery as $arrEmp)
		//while($arrSalaryGrade = mysql_fetch_array($objSalaryGrade))
		{
			$percent = 0;
			$hazard = 0;
			

			if($arrEmp['office'] >= 15 &&  $arrEmp['hpFactor'] == 30)
				$percent = 0.30;
			else if($arrEmp['office'] >= 15 &&  $arrEmp['hpFactor'] == 23)
				$percent = 0.23;
			else if($arrEmp['office'] >= 15 &&  $arrEmp['hpFactor'] == 15)
				$percent = 0.15;
			else if($arrEmp['office'] >= 15 &&  $arrEmp['hpFactor'] == 12)
				$percent = 0.12;
			else if(($arrEmp['office'] >= 8 && $arrEmp['office'] <= 14) &&  $arrEmp['hpFactor'] == 30)
				$percent = 0.23;
			else if(($arrEmp['office'] >= 8 && $arrEmp['office'] <= 14) &&  $arrEmp['hpFactor'] == 23)
				$percent = 0.15;
			else if(($arrEmp['office'] >= 8 && $arrEmp['office'] <= 14) &&  $arrEmp['hpFactor'] == 15)
				$percent = 0.12;
			else if($arrEmp['office'] < 8 && $arrEmp['hpFactor'] == 30)
				$percent = 0.15;
			else if($arrEmp['office'] < 8 && $arrEmp['hpFactor'] == 15)
				$percent = 0.10;
			else 
				$percent = 0.00;

			$hazard = (float)str_replace(',','',$arrEmp["actualsalary"]) * $percent;

			$w = array(35,35,10,45,25,20,20,30,20,30);
			$Ln = array('L','L','C','L','R','C','C','C','C','R');
			$this->fpdf->SetWidths($w);
			$this->fpdf->SetAligns($Ln);
			$this->fpdf->FancyRow(array($i.'. '.$arrEmp["surname"],$arrEmp["firstname"],$arrEmp["middleInitial"],$arrEmp["positionDesc"],$arrEmp["actualsalary"],$arrEmp["office"],$arrEmp["wfh"],$arrEmp["daysinoffice"],$percent*100,number_format($hazard,2)),array(1,1,1,1,1,1,1,1,1,1),$Ln);

			$totalsalary += (float)str_replace(',','',$arrEmp["actualsalary"]);
			$totalhazard += $hazard;
			$i++;
		}

		$this->fpdf->FancyRow(array("","Grand Total","","",number_format($totalsalary,2),"","","","",number_format($totalhazard,2)),array(1,1,1,1,1,1,1,1,1,1),$Ln);
		

		/* Signatory */
		 if($this->fpdf->GetY()>195)
			 $this->fpdf->AddPage();
			 
		
			
		$this->fpdf->Ln(20);
		$this->fpdf->Cell(160);
		$this->fpdf->Cell(30);				
		$this->fpdf->SetFont('Arial','B',12);		
		$this->fpdf->Cell(0,30,"Certified Copy:",0,0,'L');
		

		$sig=getSignatories($arrData['intSignatory']);
		if(count($sig)>0){
			$sigName = $sig[0]['signatory'];
			$sigPos = $sig[0]['signatoryPosition'];
		}else{
			$sigName='';
			$sigPos='';
		}

		$sigName='MA. VERONICA B. TOLEDANO';
		$sigPos='Administrative Officer IV';

		$this->fpdf->Ln(20);
		$this->fpdf->Cell(5);
		$this->fpdf->Cell(5);				
		$this->fpdf->SetFont('Arial','B',12);		
		$this->fpdf->Cell(0,10,$sigName,0,0,'L');

		$this->fpdf->Ln(4);
		$this->fpdf->Cell(5);
		$this->fpdf->Cell(5);				
		$this->fpdf->SetFont('Arial','',12);				
		$this->fpdf->Cell(0,10,$sigPos,0,0,'L');

		$this->fpdf->Ln(1);
		$this->fpdf->Cell(150);
		$this->fpdf->Cell(55);				
		$this->fpdf->SetFont('Arial','B',12);				
		$this->fpdf->Cell(0,0,'JESSICA L. MORAL',0,0,'L');

		$this->fpdf->Ln(4);
		$this->fpdf->Cell(140);
		$this->fpdf->Cell(55);				
		$this->fpdf->SetFont('Arial','',12);				
		$this->fpdf->Cell(0,0,'Supervising Administrative Officer',0,0,'L');

		$this->fpdf->Ln(4);
		$this->fpdf->Cell(155);
		$this->fpdf->Cell(55);				
		$this->fpdf->SetFont('Arial','',12);				
		$this->fpdf->Cell(0,0,'Personnel Division',0,0,'L');
		
		$this->fpdf->Ln(4);
		$this->fpdf->Cell(30);
		$this->fpdf->Cell(30);				
		$this->fpdf->SetFont('Arial','',12);				
		//$this->fpdf->Cell(0,10,$sig[0],0,0,'L');
		$this->fpdf->Ln(15);
			
		
		
		echo $this->fpdf->Output();
	}
	
}
/* End of file MonthlyAttendance_model.php */
/* Location: ./application/modules/reports/models/reports/MonthlyAttendance_model.php */