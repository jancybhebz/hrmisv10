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
		$this->fpdf->SetTitle('Confirmation Slip');
		$this->fpdf->SetLeftMargin(25);
		$this->fpdf->SetRightMargin(25);
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
		$this->fpdf->Cell(30, 5,"Date : _______________", 0, 0, "C"); 
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(85, 5,"For the month of : ________________________________"  , 0, 0, "C"); 
		$this->fpdf->Ln(10);
		// start of table

		$this->fpdf->Cell(20,6,'Day',1,0);
		$this->fpdf->Cell(20,6,'IN',1,0);
		$this->fpdf->Cell(20,6,'OUT',1,0);
		$this->fpdf->Cell(70,6,'Signature Over Printed Name',1,0);
		$this->fpdf->Cell(35,6,'Supporting Evidence/',1,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(20,6,'',1,0);
		$this->fpdf->Cell(20,6,'',1,0);
		$this->fpdf->Cell(20,6,'',1,0);
		$this->fpdf->Cell(70,6,'of Authorized Official/Supervisor Concerned',1,0);
		$this->fpdf->Cell(35,6,'Documents',1,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(20,6,'',1,0);
		$this->fpdf->Cell(20,6,'',1,0);
		$this->fpdf->Cell(20,6,'',1,0);
		$this->fpdf->Cell(70,6,'Supervisor Concerned',1,0);
		$this->fpdf->Cell(35,6,'',1,0);
		// end of table

		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(15, 5,"Submitted by :"  , 0, 0, "C"); 
		$this->fpdf->Cell(150, 5,"Date Submitted :", 0, 0, "C"); 
		$this->fpdf->Ln(10);
		$this->fpdf->Cell(65, 5,"_____________________________________"  , 0, 0, "C"); 
		$this->fpdf->Cell(70, 5,"________________________", 0, 0, "C"); 
			
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(60, 5, "Signature Over Printed Name of Employee", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5, "", 0, 0, "C"); 
		$this->fpdf->Cell(100, 5, "", 0, 0, "C"); 
		
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 8);
		$this->fpdf->Cell(0, 4, "========================================================================================================", 0, 1, "C");		
		
			
		echo $this->fpdf->Output();
	}
	
	
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */

	
	