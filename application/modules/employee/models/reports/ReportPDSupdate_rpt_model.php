<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReportPDSupdate_rpt_model extends CI_Model {

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
		$InterLigne = 6;
		$Ligne = 45;
		// $row=$cn->Select($SQL);
		// $cn= new MySQLHandler2;
		// $cn->init();

		$this->fpdf->SetTitle('Personal Data Sheet');
		$this->fpdf->SetLeftMargin(25);
		$this->fpdf->SetRightMargin(25);
		$this->fpdf->SetTopMargin(10);
		$this->fpdf->SetAutoPageBreak("on",10);
		$this->fpdf->AddPage('P','','A4');
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(10);

		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"CS Form No. 212",'LTR',0,"L");
		$this->fpdf->Ln(4);
		$this->fpdf->Cell(0,$InterLigne, "(Revised 2017)","LR",0,"L");
		$this->fpdf->Ln(2);

		$this->fpdf->SetFont('Arial','B',20);
		$this->fpdf->Cell(0,20,"PERSONAL DATA SHEET","LR",0,"C");
		$this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,$InterLigne, "WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s","LR",0,"L");
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,$InterLigne,"against the person concerned.","LR",0,"L");
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,$InterLigne,"READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.","LR",0,"L");
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell(105,$InterLigne,"Print legibly. Tick appropriate boxes (     ) and use separate sheet if necessary. Indicate N/A if not applicable. ","L",0,"L");
		$this->fpdf->SetFont('Arial','B',6);
		$this->fpdf->Cell(30,$InterLigne,"DO NOT ABBREVIATE.","R",0,"L");
		$this->fpdf->SetFont('Arial','',6);

		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell(20,$InterLigne,"1.   CS ID NO.  ",1,0,'L',1);
				
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell(0,$InterLigne," (Do not fill up. For CSC use only)",'TR',0,"R");
		$this->fpdf->Ln(5);
		//  PERSONAL INFORMATION - Colors of frame, background and text
		$this->fpdf->SetFont('Arial','IB',10);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"I. PERSONAL INFORMATION",1,0,'L',1);
		$this->fpdf->Ln(6);
		
		$this->fpdf->SetFillColor(225,225,225);
		//  surname
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"2.     SURNAME ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,1,0,'L');
		$this->fpdf->Ln(6);
		//  firstname
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"        FIRST NAME ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(90,$InterLigne,1,0,'L');
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(40,$InterLigne,"NAME EXTENSION (e.g. Jr., Sr.) ",1,0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,1,0,'L');
		$this->fpdf->Ln(6);
		//  middlename
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"        MIDDLE NAME ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,1,0,'L');
		$this->fpdf->Ln(6);
		//  Date of Birth
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"3.     DATE OF BIRTH ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,'LTR',0,'L');
			//  Citizenship
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"16.    CITIZENSHIP           ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['citizenship']=="Filipino")
			{$this->fpdf->Cell(0,$InterLigne," [  X ]  Filipino      [    ]  Dual Citizenship",'LR',0,'L');}
		// if($row[$i]['citizenship']=="Dual Citizenship")
			// {$this->fpdf->Cell(0,$InterLigne," [    ]  Filipino      [  X  ]  Dual Citizenship",'LR',0,'L');}
		// if($row[$i]['citizenship']!="Filipino" && $row[$i]['citizenship']!="Dual Citizenship")
			// {$this->fpdf->Cell(0,$InterLigne," [    ]  Filipino      [    ]  Dual Citizenship",'LR',0,'L');}
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"         (mm/dd/yyyy)",'LR',0,'L',1);		//  Date of Birth Blank
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'L',1);		//  Citizenship Blank
		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['citizenship']=="by birth")
			{$this->fpdf->Cell(0,$InterLigne," [  X  ]  by birth    [ ]  by naturalization",'LR',0,'R');}
		// if($row[$i]['citizenship']=="by naturalization")
		// 	{$this->fpdf->Cell(0,$InterLigne," [    ]  by birth    [  X  ]  by naturalization",LR,0,R);}
		// if($row[$i]['citizenship']!="birth" && $row[$i]['citizenship']!="by naturalization")
		// 	{$this->fpdf->Cell(0,$InterLigne," [    ]  by birth    [    ]  by naturalization",LR,0,R);}
			
		$this->fpdf->SetFont('Arial','',7);	
		$this->fpdf->Ln(6);
		//  Place of Birth
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"4.     PLACE OF BIRTH ",'LTBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,1,0,'L');

		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"If holder of  dual citizenship,",'LR',0,'C',1);

		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"Pls. indicate country:",'LBR',0,'C');
		$this->fpdf->Ln(6);
		//  Sex
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"5.     SEX ",'LTBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['sex']=="M")
		// 	{$this->Cell($Ligne,$InterLigne,"[  X  ]   Male     [    ]   Female",1,0,C);}
		// else
			{$this->fpdf->Cell($Ligne,$InterLigne,"[    ]   Male     [  X  ]   Female",1,0,'C');}
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"please indicate the details.",'LBR',0,'C',1);
		$this->fpdf->Cell(0,$InterLigne,1,0);
		$this->fpdf->Ln(6);

		//  civil status
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"6.     CIVIL STATUS ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['civilStatus']=="Single")
			{$this->fpdf->Cell($Ligne,$InterLigne," [  X  ]  Single    [    ]  Married",'R',0,'C');}
		// if($row[$i]['civilStatus']=="Married")
		// 	{$this->Cell($Ligne,$InterLigne," [    ]  Single    [  X  ]  Married",R,0,C);}
		// if($row[$i]['civilStatus']!="Single" && $row[$i]['civilStatus']!="Married")
		// 	{$this->Cell($Ligne,$InterLigne," [    ]  Single    [    ]  Married",R,0,C);}
		// residential address
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"17. 		RESIDENTIAL ADDRESS                     ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,1,0,'L');//res address 1st line
		$this->fpdf->Ln(6);
			
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'C',1);		//  Civil Status Blank -1

		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['civilStatus']=="Widowed")
			{$this->fpdf->Cell($Ligne,$InterLigne,"   [  X  ]  Widowed  [    ]  Separated",'LR',0,'C');}
		// if($row[$i]['civilStatus']=="Separated")
		// 	{$this->Cell($Ligne,$InterLigne,"    [    ]  Widowed  [  X  ]  Separated",LR,0,C);}
		// if($row[$i]['civilStatus']!="Separated" && $row[$i]['civilStatus']!="Widowed")
		// 	{$this->Cell($Ligne,$InterLigne,"   [    ]  Widowed  [    ]  Separated",LR,0,C);}
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'L',1);  // Residential 2nd blank
		$this->fpdf->SetFont('Arial','',7);
		
		$this->fpdf->Cell(0,$InterLigne,1,0,'L');//res address 2nd line SUBD / BRGY
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'C');
		$this->fpdf->Ln(6);
		
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LBR',0,'C',1);		//  Civil Status Blank-2
		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['civilStatus']=="Other/s:")
			{$this->fpdf->Cell($Ligne,$InterLigne,"   [  X  ]  Other/s:  [    ]  ",'LBR',0,'C');}
		// if($row[$i]['civilStatus']=="")
		// 	{$this->fpdf->Cell($Ligne,$InterLigne,"    [    ]  Other/s:  [  X  ]  ",LBR,0,C);}
		// if($row[$i]['civilStatus']!="" && $row[$i]['civilStatus']!="Other/s:")
		// 	{$this->fpdf->Cell($Ligne,$InterLigne,"   [    ]  Other/s:  ",LBR,0,C);}

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'L',1);  // Residential 2nd blank
		$this->fpdf->SetFont('Arial','',7);
		
		$this->fpdf->Cell(0,$InterLigne,1,0,'L');//res address 3rd line CITY/PROV
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'C');
		$this->fpdf->Ln(6);
	}
	
	
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */

	
	