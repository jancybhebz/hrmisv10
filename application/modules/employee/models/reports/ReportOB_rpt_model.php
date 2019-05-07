<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReportOB_rpt_model extends CI_Model {

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
		$this->fpdf->SetTitle('Official Business');
		$this->fpdf->SetLeftMargin(25);
		$this->fpdf->SetRightMargin(25);
		$this->fpdf->SetTopMargin(10);
		$this->fpdf->SetAutoPageBreak("on",10);
		$this->fpdf->AddPage('P','','A4');
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(10);

		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Republic of the Philippines','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','B',11);
		$this->fpdf->Cell(0,6,'       DEPARTMENT OF SCIENCE AND TECHNOLOGY','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Central Office','',0,'C');
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',11);
		$this->fpdf->Cell(0,6,'PERSONNEL TRAVEL PASS','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',10);

		$this->fpdf->Ln(8);
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(75, 5,"[", 0, 0, "R"); 
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(5, 5,"" , 0, 0, "L"); 
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(10, 5,"]  Official" , 0, 0, "L"); 
		
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(75, 5,"[", 0, 0, "R"); 
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(5, 5,"", 0, 0, "L");  
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(10, 5,"]  Personal" , 0, 0, "L");

		$this->fpdf->Ln(10);

		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(100, 5,""  , 0, 0, "C"); 
		$this->fpdf->Cell(100, 5," ", 0, 0, "C"); 
		$this->fpdf->Ln(1);
		$this->fpdf->Cell(75, 5,"___________________________________", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5,"___________________________________", 0, 0, "C"); 

		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(75, 5, "Name", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5, "Position / Office", 0, 0, "C"); 
		
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(100, 5,"  ", 0, 0, "C"); 
		$this->fpdf->Cell(100, 5, "", 0, 0, "C"); 
		$this->fpdf->Ln(1);
		$this->fpdf->Cell(75, 5,"___________________________________", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5,"___________________________________", 0, 0, "C"); 

		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(75, 5, "Signature", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5, "Date of Application", 0, 0, "C"); 
		  
		$this->fpdf->Ln(15);   
		$this->fpdf->SetFont('Arial', "", 10);	
		$this->fpdf->Cell(5, 5,"", 0, 0, "L"); 	
		$this->fpdf->Cell(20, 5,"DESTINATION :", 0, 0, "L"); 
		$this->fpdf->SetFont('Arial', "B", 10);		
		//$this->objRprt->Cell(100, 6,"     :           ".$strPlace, 0, 0, "L");
		$this->fpdf->MultiCell(130, 4, 0, 'J', 0);
		//$this->objRprt->Ln(1);
		$this->fpdf->Cell(34, 5,"", 0, 0, "L");
		$this->fpdf->Cell(110, 1,"__________________________________________________________________", 0, 0, "L"); 

		$this->fpdf->Ln(8);
		$this->fpdf->SetFont('Arial', "", 10);	
		$this->fpdf->Cell(5, 5,"", 0, 0, "L"); 	
		$this->fpdf->Cell(20, 5,"PURPOSE :", 0, 0, "L"); 
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->MultiCell(130, 4, 0, 'J', 0);
		// $this->objRprt->Cell(100, 5,"     :           ".$strPurpose, 0, 0, "L");
		// $this->objRprt->Ln(1);  
		$this->fpdf->Cell(34, 5,"", 0, 0, "L");
		$this->fpdf->Cell(110, 1,"__________________________________________________________________", 0, 0, "L"); 

		$this->fpdf->Ln(8);
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(5, 5,"", 0, 0, "L"); 		
		$this->fpdf->Cell(20, 5,"Date of Travel", 0, 0, "L"); 
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(40, 5,'    :', 0, 0, "L");

		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(80, 5,"Time of Travel :", 0, 0, "C"); 
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(10, 5, ' - ', 0, 0, "C");

		$this->fpdf->Ln(1); 
		$this->fpdf->Cell(34, 5,"", 0, 0, "L");
		$this->fpdf->Cell(20, 5,"_________________________", 0, 0, "L"); 
		$this->fpdf->Cell(20, 5,"", 0, 0, "C");
		$this->fpdf->Cell(135, 5,"________________________", 0, 0, "C"); 

		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial', "", 10);
		$this->fpdf->Cell(5, 5,"", 0, 0, "L"); 		
		$this->fpdf->Cell(10, 5,"RECOMMENDED BY:", 0, 0, "L"); 
		$this->fpdf->Cell(190, 5,"APPROVED BY:", 0, 0, "C");
		
		
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "B", 10);		
		$this->fpdf->Cell(100, 5,"", 0, 0, "C"); 
		$this->fpdf->Cell(100, 5, "", 0, 0, "C"); 
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(100, 5,"", 0, 0, "C"); 
		$this->fpdf->Cell(100, 5, "", 0, 0, "C"); 

		$this->fpdf->Ln(1);
		$this->fpdf->Cell(75, 5,"___________________________________", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5,"___________________________________", 0, 0, "C"); 		
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial', "", 10);		
		$this->fpdf->Cell(75, 5, "Immediate Supervisor", 0, 0, "C"); 
		$this->fpdf->Cell(110, 5, "Service Chief / EXECOM Concerned", 0, 0, "C"); 
		$this->fpdf->Cell(100, 5, "", 0, 0, "C"); 
	 
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

	
	