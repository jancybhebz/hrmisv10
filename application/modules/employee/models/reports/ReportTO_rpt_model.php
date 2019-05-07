<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReportTO_rpt_model extends CI_Model {

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
		$this->fpdf->SetTitle('Travel Order');
		$this->fpdf->SetLeftMargin(25);
		$this->fpdf->SetRightMargin(25);
		$this->fpdf->SetTopMargin(10);
		$this->fpdf->SetAutoPageBreak("on",10);
		$this->fpdf->AddPage('P','','A4');
		

		$this->fpdf->SetFont('Arial', "", 12);
		$this->fpdf->Cell(0, 5, "", 0, 1, "C");	
		$this->fpdf->Cell(0, 5, "Republic of the Philippines ", 0, 1, "C");	
		$this->fpdf->SetFont('Arial', "B", 12);
		$this->fpdf->Cell(0, 5, '', 0, 1, "C");
		$this->fpdf->SetFont('Arial', "", 12);
		$this->fpdf->Cell(0, 5, '', 0, 0, "C");	
		$this->fpdf->Ln(5);	

		$this->fpdf->SetFont('Arial', "B", 12);
		$this->fpdf->Cell(0, 5, "TRAVEL ORDER", 0, 0, "C");

		$this->fpdf->Ln(10);
		
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(30, 5, "Name:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5, '', 0, 0, "L");
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(15, 5, "Salary:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5, "", 0, 0, "L"); 
 
		$this->fpdf->Ln(7);

		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(30, 5, "Position:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);			 
		$this->fpdf->Cell(75, 5, "", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(15, 5, "Station:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5, "", 0, 0, "L"); 

		$this->fpdf->Ln(7);
		
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(30, 5, "Departure Date:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5, "", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(15, 5, "Time:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5, "                       ", 0, 0, "L");

		$this->fpdf->Ln(7);		

		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(30, 5, "Return Date:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5,"" , 0, 0, "L");
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(15, 5, "Time:", 0, 0, "L");
		$this->fpdf->SetFont('Arial', "BU", 10);		
		$this->fpdf->Cell(75, 5, "                       ", 0, 0, "L");
		
 		$this->fpdf->Ln(10);
		
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(90, 5, "Destination (Place/Office)", 1, 0, "C");
		
		$this->fpdf->Cell(90, 5,"Purpose", 1, 0, "C");
		$this->fpdf->Ln(5);		
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(90, 5, "", 1, 0, "L");
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(90, 5, "", 1, 0, "L");


 		$this->fpdf->Ln(10);
		$this->fpdf->Cell(270, 5, "Date : ______________________", 0, 0, "C"); 
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial', "BI", 8);
		$this->fpdf->Cell(200, 5, "", 0, 0, "C");
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial', "", 8);
		$this->fpdf->Cell(0, 4, "**************** NO SIGNATURE NEEDED. THIS DOCUMENT HAS BEEN APPROVED ONLINE ****************", 0, 1, "C");		
		// $arrGet = $this->input->get();

		// $strPrgrph1 = "In reply to your letter of  ";
		// $strPrgrph2 = "accepted";
		// $strPrgrph3 = " to take effect ";
		// $strPrgrph4 = " at the close of the office hours on ";        
		// $this->fpdf->Ln(15);
		// $this->fpdf->SetFont('Arial', "", 12);
		// $this->fpdf->Write(5,$strPrgrph1);
		// $this->fpdf->SetFont('Arial', "B", 12);
		// $this->fpdf->Write(5,$strPrgrph2);
		// $this->fpdf->SetFont('Arial', "", 12);
		// $this->fpdf->Write(5,$strPrgrph3);
		// $this->fpdf->SetFont('Arial', "B", 12);
		// $this->fpdf->Write(5,$strPrgrph4);
		// $this->fpdf->SetFont('Arial', "", 12);

		// $this->fpdf->Ln(20);
		// $this->fpdf->Cell(0,10,"Very truly yours,",0,0,'L');
			
		echo $this->fpdf->Output();
	}
	
	
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */

	
	