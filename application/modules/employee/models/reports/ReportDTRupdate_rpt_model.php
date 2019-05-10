<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReportDTRupdate_rpt_model extends CI_Model {

	public function __construct()
	{
		//parent::__construct();
		$this->load->database();
		$this->load->helper('report_helper');	
		//ini_set('display_errors','On');
		//$this->load->model(array());
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
	
	function generate($arrData)
	{
		$today =  date("F j, Y",strtotime(date("Y-m-d")));
		$dtmDTRupdate = date("F j, Y",strtotime($arrData['dtmDTRupdate']));
		$dtmMorningIn = $arrData['dtmMorningIn'];
		$dtmMorningOut = $arrData['dtmMorningOut'];
		$dtmAfternoonIn = $arrData['dtmAfternoonIn'];
		$dtmAfternoonOut = $arrData['dtmAfternoonOut'];
		$dtmOvertimeIn = $arrData['dtmOvertimeIn'];
		$dtmOvertimeOut = $arrData['dtmOvertimeOut'];
		$strReason = $arrData['strReason'];
		$dtmMonthOf = $arrData['dtmMonthOf'];
		$strEvidence = $arrData['strEvidence'];
		$strSignatory = $arrData['strSignatory'];

		$this->fpdf->SetTitle('Confirmation Slip');
		$this->fpdf->SetLeftMargin(20);
		$this->fpdf->SetRightMargin(20);
		$this->fpdf->SetTopMargin(10);
		$this->fpdf->SetAutoPageBreak("on",10);
		$this->fpdf->AddPage('P','','A4');
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(10);

		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'      Department of Science and Technology','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Administrative and Legal Service','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Human Resource Management Information System','',0,'C');
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       ATTENDANCE TRACKING SYSTEM','',0,'C');
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',11);
		$this->fpdf->Cell(0,6,'       CONFIRMATION SLIP','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,6,'       (For Noon Break Missing Entry/ies)','',0,'C');

		$this->fpdf->Ln(10);

		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(69, 5,"Name : ________________________________"  , 0, 0, "C"); 
		$this->fpdf->Cell(55, 5,"Position : ____________", 0, 0, "C"); 
		$this->fpdf->Cell(30, 5,"Date : ", 0, 0, "C"); 
		$this->fpdf->SetFont('Arial', "U", 10);	
		$this->fpdf->Cell(0, 5,"$today"."", 0, 0, "C"); 
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(22, 5,"For the month of :"  , 0, 0, "C"); 
		$this->fpdf->SetFont('Arial', "U", 10);	
		$this->fpdf->Cell(15, 5,"$dtmMonthOf"  , 0, 0, "C"); 
		$this->fpdf->Ln(10);
		// start of table
		$this->fpdf->SetFont('Arial', "", 10);	
		$this->fpdf->Cell(25,6,'Day',"RLT",0,"C");
		$this->fpdf->Cell(20,6,'IN',"RLT",0,"C");
		$this->fpdf->Cell(20,6,'OUT',"RLT",0,"C");
		$this->fpdf->Cell(70,6,'Signature Over Printed Name',"RLT",0,"C");
		$this->fpdf->Cell(35,6,'Supporting Evidence/',"RLT",0,"C");
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(25,6,'',"RL",0,"C");
		$this->fpdf->Cell(20,6,'',"RL",0,"C");
		$this->fpdf->Cell(20,6,'',"RL",0,"C");
		$this->fpdf->Cell(70,6,'of Authorized Official/Supervisor Concerned',"RL",0,"C");
		$this->fpdf->Cell(35,6,'Documents',"RL",0,"C");
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(25,6,'',"RL",0,"C");
		$this->fpdf->Cell(20,6,'',"RL",0,"C");
		$this->fpdf->Cell(20,6,'',"RL",0,"C");
		$this->fpdf->Cell(70,6,'Supervisor Concerned',"RL",0,"C");
		$this->fpdf->Cell(35,6,'',"RL",0,"C");
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(25,6,"$dtmDTRupdate",1,0,"C");
		$this->fpdf->Cell(20,6,'',1,0,"C");
		$this->fpdf->Cell(20,6,'',1,0,"C");
		$this->fpdf->Cell(70,6,"$strSignatory",1,0,"C");
		$this->fpdf->Cell(35,6,"$strEvidence",1,0,"C");
		// end of table

		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(15, 5,"Submitted by :"  , 0, 0, "C"); 
		$this->fpdf->Cell(172, 5,"Date Submitted : ", 0, 0, "C"); 
		$this->fpdf->Ln(10);
		
		$this->fpdf->Cell(65, 5,"_____________________________________"  , 0, 0, "C"); 
		$this->fpdf->SetFont('Arial', "U", 10);	
		$this->fpdf->Cell(66, 5,"$today", 0, 0, "C"); 
		$this->fpdf->SetFont('Arial', "", 10);	
			
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(60, 5, "Signature Over Printed Name of Employee", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5, "", 0, 0, "C"); 
		$this->fpdf->Cell(100, 5, "", 0, 0, "C"); 
		
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 8);
		$this->fpdf->Cell(0, 4, "===========================================================================================================", 0, 1, "C");		
		
			
		echo $this->fpdf->Output();
	}
	
	
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */

	
	