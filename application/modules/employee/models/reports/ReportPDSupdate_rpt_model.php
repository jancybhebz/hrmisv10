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
		$this->fpdf->SetLeftMargin(8);
		$this->fpdf->SetRightMargin(6);
		$this->fpdf->SetTopMargin(0);
		$this->fpdf->SetAutoPageBreak("on",10);
		$this->fpdf->AddPage('P','','Legal');
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(5);

		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"CS Form No. 212",'LTR',0,"L");
		$this->fpdf->Ln(4);
		$this->fpdf->Cell(0,$InterLigne, "(Revised 2017)","LR",0,"L");
		$this->fpdf->Ln(2);

		$this->fpdf->SetFont('Arial','B',20);
		$this->fpdf->Cell(0,20,"PERSONAL DATA SHEET","LR",0,"C");
		$this->fpdf->Ln(20);
		
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
		$this->fpdf->SetFont('Arial','IB',9);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"I. PERSONAL INFORMATION",1,0,'L',1);
		$this->fpdf->Ln(6);
		
		$this->fpdf->SetFillColor(225,225,225);
		//  surname
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"2.     SURNAME ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		//  firstname
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"        FIRST NAME ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne," ",'LTB',0,'L');
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(45,$InterLigne," ",'TBR',0,'L');
		$this->fpdf->Cell(40,$InterLigne,"NAME EXTENSION (e.g. Jr., Sr.) ",1,0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		//  middlename
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"        MIDDLE NAME ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		//  Date of Birth
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"3.     DATE OF BIRTH ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,'',0,'L');
			//  Citizenship
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"16.    CITIZENSHIP           ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		// if($row[$i]['citizenship']=="Filipino")
			{$this->fpdf->Cell(0,$InterLigne," [  X ] Filipino    [    ]  Dual Citizenship",'LR',0,'L');}
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
			{$this->fpdf->Cell(0,$InterLigne,"[ X ]  by birth  [  ]  by naturalization",'LR',0,'R');}
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
		$this->fpdf->Cell($Ligne,$InterLigne,'',0,'L');

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
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
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
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');//res address 1st line
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
		
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');//res address 2nd line SUBD / BRGY
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
		
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');//res address 3rd line CITY/PROV
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'C');
		$this->fpdf->Ln(6);
		//  height
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"7.     HEIGHT (m) ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,'',1,0);//res address 4th line
		$this->fpdf->Ln(6);
		//  weight
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"8.     WEIGHT (kg) ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->Cell($Ligne,$InterLigne,"ZIP CODE",'LR',0,'C',1);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		// blood type
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"9.     BLOOD TYPE ",1,0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"18.   PERMANENT ADDRESS",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);

		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');//res address 1st line LOT/STREET
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"10.   GSIS ID NO. ",1,0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');//perm address 2nd line sudb/brgy
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"11.   PAG-IBIG ID NO. ",1,0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->Cell($Ligne,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');//perm address 3rd line city2/prov2
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"12.   PHILHEALTH NO. ",1,0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->Cell($Ligne,$InterLigne,"ZIP CODE",'LR',0,'C',1);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"13.   SSS NO. ",1,0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"19.    TELEPHONE NO.          ",'LTBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		//$this->Cell(0,$InterLigne,$new_str[1],1,0);
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"14.    TIN NO.           ",1,0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"20.    MOBILE NO.    ",1,0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"15.    AGENCY EMPLOYEE NO.    ",1,0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"",'B',0,'L');
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($Ligne,$InterLigne,"21.    E-MAIL ADDRESS (if any)   ",1,0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"",1,0,'L');
		$this->fpdf->Ln(6);
		//   FAMILY BACKGROUND
		$this->fpdf->SetFont('Arial','IB',9);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"II. FAMILY BACKGROUND",1,0,'L',1);
		$this->fpdf->Ln(6);
		$this->fpdf->SetFillColor(225,225,225);

		//  name of spouse
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"22.   SPOUSE'S SURNAME",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell(55,$InterLigne,"23.   NAME of CHILDREN  (Write full name and list all)",1,0,'L',1);

		// if($row[$i]['empNumber']!="" && $row[$i]['empNumber']!="undefined")
		// 	$whereChild = " AND empNumber='".$row[$i]['empNumber']."'";
		// else
		// 	$whereChild = "";
		// $SQL = "SELECT childName,childBirthDate FROM tblEmpChild 
		// WHERE 1=1 $whereChild ORDER BY childBirthDate ASC";
		
		// $cn= new MySQLHandler2;
		// $cn->init();
		// $row2=$cn->Select($SQL);

		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell(0,$InterLigne,"DATE OF BIRTH",1,0,'C',1);
		$this->fpdf->Ln(6);

		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        FIRST NAME",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(35,$InterLigne,"",'LTRB',0,'L');
		

		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell(25,$InterLigne,"    NAME EXTENSION (JR,SR)   ",1,0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(10,$InterLigne,"",'LRB',0,'C');
		$this->fpdf->Cell(55,$InterLigne,"",'LRB',0,'C');//1st child
		$this->fpdf->SetFont('Arial','',7);
		// if($row2[0]['childBirthDate']!='0000-00-00' && $row2[0]['childBirthDate']!='')
		// 	$this->fpdf->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[0]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',7);  
		$this->fpdf->Cell($Ligne,$InterLigne,"        MIDDLE NAME",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);  
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'TBRL',0,'C');//1st child
		// if($row2[0]['childBirthDate']!='0000-00-00' && $row2[0]['childBirthDate']!='')
		// 	$this->fpdf->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[1]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
			// occupation
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        OCCUPATION",'LTBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);  
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'TBRL',0,'C');
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[2]['childBirthDate']!='')
		// 	$this->fpdf->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[2]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		// employer/business name
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        EMPLOYER/BUSINESS NAME ",'LTBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'TBRL',0,'C');
		// if($row2[0]['childBirthDate']!='0000-00-00' && $row2[3]['childBirthDate']!='')
		// 	$this->fpdf->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[3]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        BUSINESS ADDRESS ",'LTBR',0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'TBRL',0,'C');
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[4]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[4]['childBirthDate'])),1,0,'C');//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		// bus. telephone no.
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        TELEPHONE NO. ",'LTBR',0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'TBRL',0,'C');
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[5]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[5]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		//  name of father
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"24.   FATHER'S SURNAME ",'LTR',0,'LR',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'TBRL',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'TBRL',0,'C');
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[6]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[6]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);

		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        FIRST NAME",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(35,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell(25,$InterLigne,"    NAME EXTENSION (JR,SR)   ",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(10,$InterLigne,"",'LBR',0,'C');
		$this->fpdf->Cell(55,$InterLigne,"",'LBR',0,'L');//1st child
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[7]['childBirthDate']!='')
		// 	$this->fpdf->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[7]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        MIDDLE NAME",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'LTRB',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'LTRB',0,'C');//1st child
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[8]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[8]['childBirthDate'])),1,0,C);//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		//  full maiden name of mother
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"25.   MOTHER'S MAIDEN NAME",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'LTRB',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'LTRB',0,'C');//1st child
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[9]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[9]['childBirthDate'])),1,0,'C');//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        SURNAME",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'LTRB',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'LTRB',0,'C');//1st child
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[10]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[10]['childBirthDate'])),1,0,'C');//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        FIRSTNAME",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'LTRB',0,'L');
		$this->fpdf->Cell(55,$InterLigne,"",'LTRB',0,'C');//1st child
		// if($row2[2]['childBirthDate']!='0000-00-00' && $row2[11]['childBirthDate']!='')
		// 	$this->Cell(0,$InterLigne,date('m/d/Y',strtotime($row2[11]['childBirthDate'])),1,0,'C');//1st child bday
		// else
			$this->fpdf->Cell(0,$InterLigne,'',1,0,'C');
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($Ligne,$InterLigne,"        MIDDLENAME",'LBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(70,$InterLigne,"",'LTRB',0,'L');
		$this->fpdf->SetFont('Arial','I',7);
		$this->fpdf->Cell(0,$InterLigne,"(Continue on separate sheet if necessary)",'LTRB',0,'C',1);
		$this->fpdf->Ln(6);
		//  EDUCATIONAL BACKGROUND
		$this->fpdf->SetFont('Arial','IB',9);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"III. EDUCATIONAL BACKGROUND",1,0,'L',1);
		$this->fpdf->Ln(6);
		$this->fpdf->SetFillColor(225,225,225);
		$h=array(20,45,39,17,17,22,0);

		//  level
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($h[0],3,"26.",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($h[1],3,"",'LTR',0,'C',1);
		$this->fpdf->Cell($h[2],3,"",'LTR',0,'C',1);
		$this->fpdf->Cell($h[3],3,"",'LTR',0,'C',1);
		$this->fpdf->Cell($h[4],3,"Highest",'LTR',0,'C',1);
		$this->fpdf->Cell($h[5],3,"",'LTR',0,'C',1);
		$this->fpdf->Cell($h[6],3,"SCHOLARSHIP/",'LTR',0,'C',1);
		$this->fpdf->Ln(3);
		
		$this->fpdf->Cell($h[0],3,"",'LR',0,'C',1);
		$this->fpdf->Cell($h[1],3,"NAME OF SCHOOL",'LR',0,'C',1);
		$this->fpdf->Cell($h[2],3,"BASIC EDUCATION/DEGREE/COURSE",'LR',0,'C',1);
		$this->fpdf->Cell($h[3],3,"PERIOD OF",'LR',0,'C',1);
		$this->fpdf->Cell($h[4],3,"Level/",'LR',0,'C',1);
		$this->fpdf->Cell($h[5],3,"YEAR",'LR',0,'C',1);
		$this->fpdf->Cell($h[6],3,"ACADEMIC",'LR',0,'C',1);
		$this->fpdf->Ln(3);
		
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($h[0],3,"LEVEL",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($h[1],3,"(Write in full)",'LR',0,'C',1);
		$this->fpdf->Cell($h[2],3,"(Write in full)",'LR',0,'C',1);
		$this->fpdf->Cell($h[3],3,"ATTENDANCE",'LR',0,'C',1);
		$this->fpdf->Cell($h[4],3,"Units Earned",'LR',0,'C',1);
		$this->fpdf->Cell($h[5],3,"GRADUATED",'LR',0,'C',1);
		$this->fpdf->Cell($h[6],3,"HONORS",'LR',0,'C',1);
		$this->fpdf->Ln(3);
		
		$this->fpdf->Cell($h[0],3,"",'LR',0,'C',1);
		$this->fpdf->Cell($h[1],3,"",'LR',0,'C',1);
		$this->fpdf->Cell($h[2],3,"",'LR',0,'C',1);
		$this->fpdf->Cell($h[3],3,"",'LR',0,'C',1);
		$this->fpdf->Cell($h[4],3,"(If not",'LR',0,'C',1);
		$this->fpdf->Cell($h[5],3,"",'LR',0,'C',1);
		$this->fpdf->Cell($h[6],3,"RECEIVED",'LR',0,'C',1);
		$this->fpdf->Ln(3);
		
		$this->fpdf->Cell($h[0],3,"",'LBR',0,'C',1);
		$this->fpdf->Cell($h[1],3,"",'LBR',0,'C',1);
		$this->fpdf->Cell($h[2],3,"",'LBR',0,'C',1);
		$this->fpdf->Cell($h[3]/2,3,"FROM",'LTBR',0,'C',1);
		$this->fpdf->Cell($h[3]/2,3,"TO",'LTBR',0,'C',1);
		$this->fpdf->Cell($h[4],3,"graduate)",'LBR',0,'C',1);
		$this->fpdf->Cell($h[5],3,"",'LBR',0,'C',1);
		$this->fpdf->Cell($h[6],3,"",'LBR',0,'C',1);
		$this->fpdf->Ln(3);

		// $educSQL = "SELECT * FROM tblEducationalLevel ORDER BY level DESC,levelCode";
		// $result_educ = mysql_query($educSQL);
		// $this->SetWidths(array($h[0], $h[1], $h[2], ($h[3]/2), ($h[3]/2), $h[4], $h[5], 36));
		// $align = array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C');
		// $this->SetAligns($align);
		// $this->SetFont('Arial','',6);
		// while($educ=mysql_fetch_array($result_educ)) {
		// 	$qry = "SELECT * FROM tblEmpSchool WHERE empNumber='".$strEmpNmbr."' AND levelCode='".$educ['levelCode']."'";
		// 	$result3 = mysql_query($qry);
		// 	$t_educCode = "";
		// 	while ($row3 = mysql_fetch_array($result3)) {
		// 		if($t_educCode==$educ['levelCode'])
		// 			$educ_header = "";
		// 		else
		// 			$educ_header=$educ['levelDesc'];
		// 		if($row3['graduated']=='Y')
		// 			$year_graduated = $row3['schoolToDate'];
				
		// 		$this->Row( array($educ_header, $row3['schoolName'], $row3['course'], $row3['schoolFromDate'], $row3['schoolToDate'], $row3['units'], $year_graduated, urldecode($row3['honors'])), 1);		
		// 		$t_educCode=$educ['levelCode'];
		// 	}
		// }
		$this->fpdf->SetFont('Arial','I',7);
		$this->fpdf->Cell(0,5,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell(20,5,"SIGNATURE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell($Ligne,5,"",'LTB',0,'C');
		$this->fpdf->Cell(39,5,"",'TBR',0,'C');
		$this->fpdf->Cell(17,5,"DATE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,5,"",'LTBR',0,'C');
		$this->fpdf->Ln(5);

		$this->fpdf->SetFont('Arial','I',6);
		$this->fpdf->Cell(0,4,"CS FORM 212 (Revised 2017), Page 1 of 4",1,0,'R');
		$this->fpdf->Ln(50);

		$this->fpdf->AddPage();
		//  CIVIL SERVICE ELIGIBILITY
		$this->fpdf->SetFont('Arial','IB',9);
		$this->fpdf->Cell(0,$InterLigne,"IV. CIVIL SERVICE ELIGIBILITY",1,0,'L',1);
		$this->fpdf->Ln(6);
		
		//  career service/RA 1080(board/bar)
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(65,$InterLigne,"27.CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER ",'LTR',0,'L',1);
		$this->fpdf->Cell(20,$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Cell(30,$InterLigne,"DATE OF",'LTR',0,'C',1);
		$this->fpdf->Cell(50,$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"LICENSE (if applicable)",'LTBR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(65,$InterLigne,"SPECIAL LAWS/ CES/ CSEE ",'LR',0,'C',1);
		$this->fpdf->Cell(20,$InterLigne,"RATING",'LR',0,'C',1);
		$this->fpdf->Cell(30,$InterLigne,"EXAMINATION/",'LR',0,'C',1);
		$this->fpdf->Cell(50,$InterLigne,"PLACE OF EXAMINATION / CONFERMENT",'LR',0,'C',1);
		$this->fpdf->Cell(15,$InterLigne,"NUMBER",'LTBR',0,'C',1);
		$this->fpdf->Cell(16,$InterLigne,"DATE OF",'LTR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->Cell(65,$InterLigne,"BARANGAY ELIGIBILITY / DRIVER'S LICENSE",'LBR',0,'C',1);
		$this->fpdf->Cell(20,$InterLigne,"(If Applicable)",'LBR',0,'C',1);
		$this->fpdf->Cell(30,$InterLigne,"CONFERNMENT",'LBR',0,'C',1);
		$this->fpdf->Cell(50,$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell(15,$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell(16,$InterLigne,"Validity",'LBR',0,'C',1);
		
		$this->fpdf->Ln(6);

		// $examSQL = "SELECT * FROM tblEmpExam WHERE empNumber='".$strEmpNmbr."' ORDER BY examDate DESC";
		// $result_exam = mysql_query($examSQL);
		// $this->SetWidths(array(65, 20, 30, 50, 15, 16));
		// $align = array('L', 'L', 'L', 'L', 'L', 'L');
		// $this->SetAligns($align);
		// $this->SetFont('Arial','B',6);
		// $exam_limit = 15;
		// while($exam=mysql_fetch_array($result_exam)) {
		// 	$qry = "SELECT * FROM tblExamType WHERE examCode='".$exam['examCode']."'";
		// 	$result3 = mysql_query($qry);
		// 	$total_exam = mysql_num_rows($result3);
		// 	while ($row3 = mysql_fetch_array($result3)) {
		// 		$strDate = explode('-',$exam['examDate']);
		// 		$examDate = $strDate[1]."/".$strDate[2]."/".$strDate[0];
		// 		$strDate2 = explode('-',$exam['dateRelease']);
		// 		$releaseDate = $strDate2[1]."/".$strDate2[2]."/".$strDate2[0];
		// 		$this->Row(array($row3['examDesc'], $exam['examRating'], $examDate, $exam['examPlace'], $exam['licenseNumber'], $releaseDate), 1);		
		// 	}		
		// }
		// while($total_exam<$exam_limit)
		// 	{
		// 	$this->Row(array("", "", "", "", "", ""), 1);
		// 	$total_exam+=1;
		// 	}

		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);

		// work experience
		$this->fpdf->SetFont('Arial','IB',10);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"V. WORK EXPERIENCE",'LTR',0,'L',1);
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','IB',8);
		$this->fpdf->Cell(0,$InterLigne,"(Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.",'LBR',0,'L',1);
		$this->fpdf->Ln(6);
		
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->SetFillColor(225,225,225);
		$w=array(32,36,50,20,20,19,19);
		$this->fpdf->Cell($w[0],$InterLigne,"28. INCLUSIVE DATES",'LTR',0,'L',1);
		$this->fpdf->Cell($w[1],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell($w[4],$InterLigne,"SALARY/JOB/PAY",'LTR',0,'C',1);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[5],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Cell($w[6],$InterLigne,"GOV'T",'LTR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0],$InterLigne,"(mm/dd/yyyy)",'LBR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"POSITION TITLE",'LR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"DEPARTMENT/AGENCY/OFFICE/COMPANY",'LR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"MONTHLY",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell($w[4],$InterLigne,"GRADE(If applicable) &",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[5],$InterLigne,"STATUS OF",'LR',0,'C',1);
		$this->fpdf->Cell($w[6],$InterLigne,"SERVICE",'LR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"(Write in full/Do not abbreviate)",'LBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"(Write in full/Do not abbreviate)",'LBR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell($w[4],$InterLigne,"STEP(FORMAT 00-0)/",'LBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[5],$InterLigne,"APPOINTMENT",'LBR',0,'C',1);
		$this->fpdf->Cell($w[6],$InterLigne,"(Yes / No)",'LBR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0]-16,$InterLigne,"From",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[0]-16,$InterLigne,"To",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell($w[4],$InterLigne,"INCREMENT",'LBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[5],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[6],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Ln(6);

		// $workSQL = "SELECT * FROM tblServiceRecord WHERE empNumber='".$strEmpNmbr."' ORDER BY serviceFromDate DESC";
		// $result_work = mysql_query($workSQL);
		// $total_work = mysql_num_rows($result_work);
		// $limit_work = 20;
		// $this->SetWidths(array($w[0]-16, $w[0]-16, $w[1], $w[2], $w[3], $w[4], $w[5], $w[6]));
		// $align = array('L', 'L', 'L', 'L', 'L', 'L', 'L', 'L');
		// $this->SetAligns($align);
		// $this->SetFont('Arial','B',6);
		// while($work=mysql_fetch_array($result_work)) {
		// 	if($work['positionDesc']=="")
		// 		{
		// 		$result_position = mysql_query("SELECT * FROM tblPosition WHERE positionCode='".$work['positionCode']."'");
		// 		$row_position = mysql_fetch_assoc($result_position);
		// 		$positionDesc=$row_position['positionDesc'];
		// 		}
		// 	else
		// 		$positionDesc=	$work['positionDesc'];
		// 	$result_app = mysql_query("SELECT * FROM tblAppointment WHERE appointmentCode='".$work['appointmentCode']."'");
		// 	$row_app = mysql_fetch_assoc($result_app);
		// 	$strFromDate = explode('-',$work['serviceFromDate']);
		// 	$fromDate = $strFromDate[1]."/".$strFromDate[2]."/".$strFromDate[0];
		// 	if($work['serviceToDate']!="Present")
		// 		{
		// 		$strToDate = explode('-',$work['serviceToDate']);
		// 		$toDate = $strToDate[1]."/".$strToDate[2]."/".$strToDate[0];
		// 		}
		// 	else
		// 		$toDate = $work['serviceToDate'];
		// 	//$salary = 'P '.$work['salary']."/".$work['salaryPer'];
		// 	$this->Row(array($fromDate, $toDate, $positionDesc, $work['stationAgency'], 'P '.$work['salary']."/".$work['salaryPer'], $work['salaryGrade'],$row_app['appointmentDesc'], $work['governService']), 1);		
		// 	}
		// 	while($total_work<$limit_work)
		// 	{
		// 	$this->Row(array("", "", "", "", "".""."", "","", ""), 1);
		// 	$total_work+=1;
		// 	}

		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Ln(2);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);
		
		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell(20,5,"SIGNATURE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell($Ligne,5,"",'LTB',0,'C');
		$this->fpdf->Cell(39,5,"",'TBR',0,'C');
		$this->fpdf->Cell(17,5,"DATE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,5,"",'LTBR',0,'C');
		$this->fpdf->Ln(5);

		$this->fpdf->SetFont('Arial','I',6);
		$this->fpdf->Cell(0,4,"CS FORM 212 (Revised 2017), Page 2 of 4",1,0,'R');
		$this->fpdf->Ln(50);

		$this->fpdf->AddPage();
		//  VOLUNTARY WORK (Colors of frame, background and text)
		$this->fpdf->SetFont('Arial','IB',9);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S",1,0,'L',1);
		$this->fpdf->Ln(6);
		//Text color in gray
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$w=array(70,50,30,46);
		$this->fpdf->Cell($w[0],$InterLigne,"29.      NAME & ADDRESS OF ORGANIZATION",'LTR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"INCLUSIVE DATES",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"NUMBER OF",'LTR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Ln(4);
		
		$this->fpdf->Cell($w[0],$InterLigne,"(Write in full)",'LR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"(mm/dd/yyyy)",'LBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"HOURS",'LR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"POSITION / NATURE OF WORK",'LR',0,'C',1);
		$this->fpdf->Ln(6);

		$this->fpdf->Cell($w[0],$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->Cell($w[1]/2,$InterLigne,"From",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[1]/2,$InterLigne,"To",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Ln(6);

		// $volSQL = "SELECT * FROM tblEmpVoluntaryWork WHERE empNumber='".$strEmpNmbr."' ORDER BY vwDateFrom DESC";
		// $result_vol = mysql_query($volSQL);
		// $total_vol = mysql_num_rows($result_vol);
		// $limit_vol = 5;
		// $this->SetWidths(array($w[0], $w[1]/2, $w[1]/2, $w[2], $w[3]));
		// $align = array('C', 'C', 'C', 'C', 'C');
		// $this->SetAligns($align);
		// $this->SetFont('Arial','B',6);
		// while($vol=mysql_fetch_array($result_vol)) {
		// 	$strFromDate = explode('-',$vol['vwDateFrom']);
		// 	$fromDate = $strFromDate[1]."-".$strFromDate[2]."-".$strFromDate[0];
		// 	$strToDate = explode('-',$vol['vwDateTo']);
		// 	$toDate = $strToDate[1]."-".$strToDate[2]."-".$strToDate[0];		
		// 	$this->Row(array($vol['vwName'].", ".$vol['vwAddress'], $fromDate, $toDate, $vol['vwHours'], $vol['vwPosition']), 1);		
		// }
		// while($total_vol<$limit_vol)	
		// 	{
		// 	$this->Row(array(""." "."", "", "", "", ""), 1);
		// 	$total_vol+=1;
		// 	}

		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);

		// training
		//  TRAINING PROGRAMS (Colors of frame, background and text)
		$this->fpdf->SetFont('Arial','IB',10);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED",1,0,'L',1);
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','I',7);
		$this->fpdf->Cell(0,$InterLigne,"(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)",1,0,'L',1);
		$this->fpdf->Ln(6);
		
		//  30. title of seminar/trainings
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->SetFillColor(225,225,225);
		$w=array(90,40,15,15,36);
		$this->fpdf->Cell($w[0],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"INCLUSIVE DATES OF",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"Type of LD",'LTR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"",'LTR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->Cell($w[0],$InterLigne,"30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS ",'LR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"ATTENDANCE",'LBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"NUMBER OF ",'LR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"(Managerial/",'LR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"CONDUCTED/ SPONSORED BY",'LR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->Cell($w[0],$InterLigne,"(Write in full)",'LR',0,'C',1);
		$this->fpdf->Cell($w[1],$InterLigne,"(mm/dd/yyyy)",'LBR',0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"HOURS",'LR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"Supervisory/",'LR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"(Write in full)",'LR',0,'C',1);
		$this->fpdf->Ln(4);
		$this->fpdf->Cell($w[0],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[1]/2,$InterLigne,"From",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[1]/2,$InterLigne,"To",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"Technical/etc)",'LBR',0,'C',1);
		$this->fpdf->Cell($w[4],$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Ln(6);
		
		// $trainingSQL = "SELECT * FROM tblEmpTraining WHERE empNumber='".$strEmpNmbr."' ORDER BY trainingStartDate DESC";
		// $result_training = mysql_query($trainingSQL);
		// $total_training = mysql_num_rows($result_training);
		// $limit_training = 20;
		// $this->SetWidths(array($w[0], $w[1]/2, $w[1]/2, $w[2], $w[3], $w[4]));
		// $align = array('C', 'C', 'C', 'C', 'C','C');
		// $this->SetAligns($align);
		// $this->SetFont('Arial','',6);
		// while($training=mysql_fetch_array($result_training)) {
		// 	$strDate = explode("-",$training['trainingStartDate']);
		// 	$startDate = $strDate[1]."/".$strDate[2]."/".$strDate[0];		
		// 	$strDate2 = explode("-",$training['trainingEndDate']);
		// 	$endDate = $strDate2[1]."/".$strDate2[2]."/".$strDate2[0];		
		// 	$this->Row(array($training['trainingDesc'], $startDate, $endDate, $training['trainingHours'], $training['trainingTypeofLD'], $training['trainingConductedBy']),1);		
		// }
		// while($total_training<$limit_training)
		// 	{
		// 	$this->Row(array("", "", "", "", "",""), 1);	
		// 	$total_training+=1;	
		// 	}

		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);

		$this->fpdf->SetFont('Arial','IB',10);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"VII. OTHER INFORMATION",1,0,'L',1);
		$this->fpdf->Ln(6);
		
		//  special skills/recognition/organization
		$w=array(60,80,0);
		$this->fpdf->SetFont('Arial','',7);	
		$this->fpdf->Cell($w[0],$InterLigne,"31. SPECIAL SKILLS and HOBBIES",'LTR',0,'C');
		$this->fpdf->Cell($w[1],$InterLigne,"32. NON-ACADEMIC DISTINCTIONS / RECOGNITION",'LTR',0,'C');
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[2],$InterLigne,"33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION",'LTR',0,'L');
		$this->fpdf->Ln(3);
		$this->fpdf->Cell($w[0],$InterLigne,"",'LR',0,'C');
		$this->fpdf->Cell($w[1],$InterLigne,"(Write in full)",'LR',0,'C');
		$this->fpdf->Cell($w[2],$InterLigne,"(Write in full)",'LR',0,'C');
		$this->fpdf->Ln(6);
				
		$this->fpdf->SetWidths(array($w[0], $w[1], 56));
		$align = array('C', 'C', 'C');
		$this->fpdf->SetAligns($align);
		$this->fpdf->SetFont('Arial','B',6);
		$this->fpdf->Row(array(), 1);	
		// $this->fpdf->Row(array($row[$i]['skills'], $row[$i]['nadr'], $row[$i]['miao']), 1);	
		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);

		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell(20,5,"SIGNATURE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell($Ligne,5,"",'LTB',0,'C');
		$this->fpdf->Cell(39,5,"",'TBR',0,'C');
		$this->fpdf->Cell(17,5,"DATE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,5,"",'LTBR',0,'C');
		$this->fpdf->Ln(5);$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);

		$this->fpdf->SetFont('Arial','IB',10);
		$this->fpdf->SetFillColor(200,200,200);
		$this->fpdf->Cell(0,$InterLigne,"VII. OTHER INFORMATION",1,0,'L',1);
		$this->fpdf->Ln(6);
		
		//  special skills/recognition/organization
		$w=array(60,80,0);
		$this->fpdf->SetFont('Arial','',7);	
		$this->fpdf->Cell($w[0],$InterLigne,"31. SPECIAL SKILLS and HOBBIES",'LTR',0,'C');
		$this->fpdf->Cell($w[1],$InterLigne,"32. NON-ACADEMIC DISTINCTIONS / RECOGNITION",'LTR',0,'C');
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[2],$InterLigne,"33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION",'LTR',0,'L');
		$this->fpdf->Ln(3);
		$this->fpdf->Cell($w[0],$InterLigne,"",'LR',0,'C');
		$this->fpdf->Cell($w[1],$InterLigne,"(Write in full)",'LR',0,'C');
		$this->fpdf->Cell($w[2],$InterLigne,"(Write in full)",'LR',0,'C');
		$this->fpdf->Ln(6);
				
		$this->fpdf->SetWidths(array($w[0], $w[1], 56));
		$align = array('C', 'C', 'C');
		$this->fpdf->SetAligns($align);
		$this->fpdf->SetFont('Arial','B',6);
		$this->fpdf->Row(array(), 1);	
		// $this->fpdf->Row(array($row[$i]['skills'], $row[$i]['nadr'], $row[$i]['miao']), 1);	
		
		$this->fpdf->SetFont('Arial','IB',7);
		$this->fpdf->Cell(0,4,"(Continue on Separate sheet if necessary)",1,0,'C');
		$this->fpdf->Ln(4);

		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell(20,5,"SIGNATURE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','B',7);
		$this->fpdf->Cell($Ligne,5,"",'LTB',0,'C');
		$this->fpdf->Cell(39,5,"",'TBR',0,'C');
		$this->fpdf->Cell(17,5,"DATE",'LTBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,5,"",'LTBR',0,'C');
		$this->fpdf->Ln(5);

		$this->fpdf->SetFont('Arial','I',6);
		$this->fpdf->Cell(0,4,"CS FORM 212 (Revised 2017), Page 3 of 4",1,0,'R');
		$this->fpdf->Ln(50);

		$this->fpdf->AddPage();
		//end page
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->SetFillColor(225,225,225);
		$InterLigne=4;
		$this->fpdf->Cell(144,$InterLigne,"34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the ",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"",'LTR',0,'C');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(144,$InterLigne,"     chief of bureau or office or to the person who has immediate supervision over you in the Office, ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','I',9);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'C');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(144,$InterLigne,"     Bureau or Department where you will be apppointed,",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','I',9);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'C');
		$this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(144,$InterLigne,"a.  within the third degree?",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['relatedThird'] == "Y")
		// 	{$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",'LR',0,'L');}
		// if ($row[$i]['relatedThird']== "N")	
		// 	{$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LR,0,L);}
		// if ($row[$i]['relatedThird'] != "N" && $row[$i]['relatedThird'] != "Y")
		// 	{$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LR,0,L);}
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(144,$InterLigne,"b.  within the fourth degree (for Local Government Unit - Career Employees)?",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['relatedThird'] == "Y")
		// 	{$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",'LR',0,'L');}
		// if ($row[$i]['relatedThird']== "N")
		// 	{$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LR,0,L);}
		// if ($row[$i]['relatedThird'] != "N" && $row[$i]['relatedThird'] != "Y")
			{$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",'LR',0,'L');}
		
		$this->fpdf->Ln(4);

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES, give details:",'LR',0,'L');
		$this->fpdf->Ln();

		// if(strlen($row[$i]['relatedDegreeParticularsThird'])>38 && $row[$i]['relatedThird']=="Y")
		// 	{
		// 	$t_relatedThirdDegreeParticular = substr($row[$i]['relatedDegreeParticularsThird'],0,38);
		// 	$t_relatedThirdDegreeParticular2 = substr($row[$i]['relatedDegreeParticularsThird'],38,38);
		// 	$t_relatedThirdDegreeParticular3 = substr($row[$i]['relatedDegreeParticularsThird'],76,38);
		// 	}
		// else if($row[$i]['relatedThird']=="N")
		// 	$t_relatedThirdDegreeParticular = "";
		// else
		// 	$t_relatedThirdDegreeParticular = $row[$i]['relatedDegreeParticularsThird']	;

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LRB',0,'L');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'L');
		$this->fpdf->Ln();
		//35
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(144,$InterLigne,"35. a. Have you ever been found guilty of any administrative offense?",'LTR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",'LTR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['formallyCharged'] == "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LTR,0,L);
		// if ($row[$i]['formallyCharged'] == "N")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LTR,0,L);
		// if ($row[$i]['formallyCharged'] != "N" && $row[$i]['formallyCharged'] != "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LTR,0,L);		
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES, give details:",'LR',0,'L');
		$this->fpdf->Ln();

		// if(strlen($row[$i]['relatedDegreeParticulars'])>38 && $row[$i]['formallyCharged']=="Y")
		// 	{
		// 	$t_strformallyChargedParticulars = substr($row[$i]['formallyChargedParticulars'],0,38);
		// 	$t_strformallyChargedParticulars2 = substr($row[$i]['formallyChargedParticulars'],38,38);
		// 	$t_strformallyChargedParticulars3 = substr($row[$i]['formallyChargedParticulars'],76,38);
		// 	}
		// else if($row[$i]['formallyCharged']=="N")
		// 	$t_strformallyChargedParticulars = "";
		// else
		// 	$t_strformallyChargedParticulars = $row[$i]['formallyChargedParticulars'];
		
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
				
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(144,$InterLigne,"      b. Have you been criminally charged before any court? ",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"  ",'LR',0,'L');
		$this->fpdf->SetFont('Arial','',9); 
		// if ($row[$i]['adminCase'] == "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LR,0,L);
		// if ($row[$i]['adminCase'] == "N")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LR,0,L);
		// if ($row[$i]['adminCase'] != "N" && $row[$i]['adminCase'] != "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LR,0,L);

		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES, give details:",'LR',0,'L');
		$this->fpdf->Ln();
		// if(strlen($row[$i]['adminCaseParticulars'])>38 && $row[$i]['adminCase']=="Y")
		// 	{
		// 	$t_stradminCaseParticulars = substr($row[$i]['adminCaseParticulars'],0,38);
		// 	$t_stradminCaseParticulars2 = substr($row[$i]['adminCaseParticulars'],38,38);
		// 	$t_stradminCaseParticulars3 = substr($row[$i]['adminCaseParticulars'],76,38);
		// 	}
		// else if($row[$i]['adminCase']=="N")
		// 	$t_stradminCaseParticulars = "";
		// else
		// 	$t_stradminCaseParticulars = $row[$i]['adminCaseParticulars'];
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"Date Filed:",'LR',0,'L');
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');

		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"Status of Case/s:",'LR',0,'L');
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		//  36
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(144,$InterLigne,"36.  Have you ever been convicted of any crime or violation of any law, decree, ordinance or ",'LTR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",'LTR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['violateLaw'] == "Y")
		// 	$this->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LTR,0,L);
		// if ($row[$i]['violateLaw'] == "N")
		// 	$this->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LTR,0,L);
		// if ($row[$i]['violateLaw'] != "N" && $row[$i]['violateLaw'] != "Y")
		// 	$this->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LTR,0,L);

		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"       regulation by any court or tribunal?",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES , give details:",'LR',0,'L');
		$this->fpdf->Ln();
		// if(strlen($row[$i]['violateLawParticulars'])>38 && $row[$i]['violateLaw']=="Y")
		// 	{
		// 	$t_strviolateLawParticulars = substr($row[$i]['violateLawParticulars'],0,38);
		// 	$t_strviolateLawParticulars2 = substr($row[$i]['violateLawParticulars'],38,38);
		// 	$t_strviolateLawParticulars3 = substr($row[$i]['violateLawParticulars'],76,38);
		// 	}
		// else if($row[$i]['violateLaw']=="N")
		// 	$t_strviolateLawParticulars = "";
		// else
		// 	$t_strviolateLawParticulars = $row[$i]['violateLawParticulars'];

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();

		//  37
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(144,$InterLigne,"37. Have you ever been separated from the service in any of the following modes: resignation, ",'LTR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne," ",'LTR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// 

		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"     retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out ",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES , give details:",'LR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"     (abolition) in the public or private sector?",'LR',0,'L',1);

		// if(strlen($row[$i]['forcedResignParticulars'])>38 && $row[$i]['forcedResign']=="Y")
		// 	{
		// 	$t_strforcedResignParticulars = substr($row[$i]['forcedResignParticulars'],0,38);
		// 	$t_strforcedResignParticulars2 = substr($row[$i]['forcedResignParticulars'],38,38);
		// 	$t_strforcedResignParticulars3 = substr($row[$i]['forcedResignParticulars'],76,38);
		// 	}
		// else if($row[$i]['forcedResign']=="N")
		// 	$t_strforcedResignParticulars = "";
		// else
		// 	$t_strforcedResignParticulars = $row[$i]['forcedResignParticulars'];

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();

		//  38
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(144,$InterLigne,"38. a. Have you ever been a candidate in a national or local election held within the last year (except ",'LTR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne," ",'LTR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['candidate'] == "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LTR,0,L);
		// if ($row[$i]['candidate'] == "N")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LTR,0,L);
		// if ($row[$i]['candidate'] != "N" && $row[$i]['candidate'] != "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LTR,0,L);
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"       Barangay election)?",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES , give details:",'LR',0,'L');
		$this->fpdf->Ln();
		
		// if(strlen($row[$i]['candidateParticulars'])>38 && $row[$i]['candidate']=="Y")
		// 	{
		// 	$t_strcandidateParticulars = substr($row[$i]['candidateParticulars'],0,38);
		// 	$t_strcandidateParticulars2 = substr($row[$i]['candidateParticulars'],38,38);
		// 	$t_strcandidateParticulars3 = substr($row[$i]['candidateParticulars'],76,38);
		// 	}
		// else if($row[$i]['candidate']=="N")
		// 	$t_strv = "";
		// else
		// 	$t_strcandidateParticulars = $row[$i]['candidateParticulars'];

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'L');
		$this->fpdf->Ln();
		//
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(144,$InterLigne,"       b. Have you resigned from the government service during the three (3)-month period before the ",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"  ",'LR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['campaign'] == "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LTR,0,L);
		// if ($row[$i]['campaign'] == "N")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LTR,0,L);
		// if ($row[$i]['campaign'] != "N" && $row[$i]['campaign'] != "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LTR,0,L);
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"       last election to promote/actively campaign for a national or local candidate?",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"If YES , give details:",'LR',0,'L');
		$this->fpdf->Ln();
		
		// if(strlen($row[$i]['campaignParticulars'])>38 && $row[$i]['campaign']=="Y")
		// 	{
		// 	$t_strcampaignParticulars = substr($row[$i]['campaignParticulars'],0,38);
		// 	$t_strcampaignParticulars2 = substr($row[$i]['campaignParticulars'],38,38);
		// 	$t_strcampaignParticulars3 = substr($row[$i]['campaignParticulars'],76,38);
		// 	}
		// else if($row[$i]['campaign']=="N")
		// 	$t_strv = "";
		// else
		// 	$t_strcampaignParticulars = $row[$i]['campaignParticulars'];
		
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);	
		$this->fpdf->Cell(144,$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		//39
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"39. Have you acquired the status of an immigrant or permanent resident of another country?",'LTR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",'R',0,'C');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['immigrant'] == "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LTR,0,L);
		// if ($row[$i]['immigrant'] == "N")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LTR,0,L);
		// if ($row[$i]['immigrant'] != "N" && $row[$i]['immigrant'] != "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LTR,0,L);
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"If YES, please give details (country):",'R',0,'L');
		$this->fpdf->Ln();

		// if(strlen($row[$i]['immigrantParticulars'])>16 && $row[$i]['indigenous']=="Y")
		// 	{
		// 	$t_strimmigrantParticulars = substr($row[$i]['immigrantParticulars'],0,16);
			
		// 	}
		// else if($row[$i]['immigrant']=="N")
		// 	$t_strimmigrantParticulars = "";
		// else
		// 	$t_strimmigrantParticulars = $row[$i]['immigrantParticulars'];

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'BR',0,'L');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'LBR',0,'L');
		$this->fpdf->Ln();
		//40
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->Cell(144,$InterLigne,"40.  Pursuant  to  (a)  Indigenous People's Act (RA 8371);(b) Magna Carta for Disabled Persons (RA",'LTR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"",'LTR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"     7277); and Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:",'LR',0,'L',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"     a. Are you a member of any indigenous group?",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"",'R',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['indigenous'] == "Y")
		// 	$this->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LR,0,L);
		// if ($row[$i]['indigenous'] == "N")
		// 	$this->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LR,0,L);
		// if ($row[$i]['indigenous'] != "N" && $row[$i]['indigenous'] != "Y")
		// 	$this->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LR,0,L);

		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(35,$InterLigne,"If YES, please specify:",'L',0,'L');
		// if(strlen($row[$i]['indigenousParticulars'])>16 && $row[$i]['indigenous']=="Y")
		// 	{
		// 	$t_strindigenousParticulars = substr($row[$i]['indigenousParticulars'],0,16);
		// 	}
		// else if($row[$i]['indigenous']=="N")
		// 	$t_strindigenousParticulars = "";
		// else
		// 	$t_strindigenousParticulars = $row[$i]['indigenousParticulars'];
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'RB',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"     b. Are you differently abled?",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne," ",'R',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['disabled'] == "Y")
		// 	$this->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LR,0,L);
		// if ($row[$i]['disabled'] == "N")
		// 	$this->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LR,0,L);
		// if ($row[$i]['disabled'] != "N" && $row[$i]['disabled'] != "Y")
		// 	$this->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LR,0,L);
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(35,$InterLigne,"If YES, please specify:",'L',0,'L');
		// if(strlen($row[$i]['disabledParticulars'])>16 && $row[$i]['disabled']=="Y")
		// 	{
		// 	$t_strdisabledParticulars = substr($row[$i]['disabledParticulars'],0,16);
	
		// 	}
		// else if($row[$i]['disabled']=="N")
		// 	$t_strdisabledParticulars = "";
		// else
		// 	$t_strdisabledParticulars = $row[$i]['disabledParticulars'];
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"",'BR',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"     c. Are you a solo parent?",'LR',0,'L',1);
		$this->fpdf->Cell(0,$InterLigne,"   ",'LR',0,'L');
		$this->fpdf->SetFont('Arial','',9);
		// if ($row[$i]['soloParent'] == "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[  X  ] YES   [    ] NO",LR,0,L);
		// if ($row[$i]['soloParent'] == "N")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [  X  ] NO",LR,0,L);
		// if ($row[$i]['soloParent'] != "N" && $row[$i]['soloParent'] != "Y")
		// 	$this->fpdf->Cell(0,$InterLigne,"[    ] YES   [    ] NO",LR,0,L);

		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(35,$InterLigne,"If YES, please specify:",'L',0,'L');
		// if(strlen($row[$i]['soloParentParticulars'])>16 && $row[$i]['soloParent']=="Y")
		// 	{
		// 	$t_strsoloParentParticulars = substr($row[$i]['soloParentParticulars'],0,16);
	
		// 	}
		// else if($row[$i]['soloParent']=="N")
		// 	$t_strsoloParentParticulars = "";
		// else
		// 	$t_strsoloParentParticulars = $row[$i]['soloParentParticulars'];
		$this->fpdf->SetFont('Arial','',8);		
		$this->fpdf->Cell(0,$InterLigne,"",'RB',0,'L');
		$this->fpdf->Ln();

		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(144,$InterLigne,"",'LR',0,'C',1);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(0,$InterLigne,"",'LR',0,'C');
		$this->fpdf->Ln(2);
		$this->fpdf->Cell(144,$InterLigne,"",'LBR',0,'C',1);
		$this->fpdf->Cell(0,$InterLigne,"",'LRB',0,'C');
		$this->fpdf->Ln(2);
		$InterLigne=6;
		//  41.  References
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"41.  REFERENCES (Person not related by consanguinity or affinity to applicant /appointee)",1,0,'LTRB',1);
		$this->fpdf->Ln();
		
		//  name
		$this->fpdf->SetFont('Arial','',8);
		$w=array(65,70,20,4,33,4);
		$this->fpdf->Cell($w[0],$InterLigne,"NAME",'LTBR',0,'C',1);
		//  address
		$this->fpdf->Cell($w[1],$InterLigne,"ADDRESS",'LTBR',0,'C',1);
		//  telephone no.
		$this->fpdf->Cell($w[2],$InterLigne,"TEL NO.",'LTBR',0,'C',1);
		$this->fpdf->Cell($w[3],$InterLigne,"",0,'C');
		$this->fpdf->SetFont('Arial','',6);
		$this->fpdf->Cell($w[4],$InterLigne,"ID picture taken within",'LR',0,'C');
		$this->fpdf->Cell($w[5],$InterLigne,"",'R','C');
		$this->fpdf->Ln();
		
		//  line space 1
		$j = 0;
		// $SQL11 = "SELECT * FROM tblEmpReference WHERE empNumber='".$strEmpNmbr."' LIMIT 3";
		// $result11 = mysql_query($SQL11);
		// $total_ref = mysql_num_rows($result11);
		// while ($row11 = mysql_fetch_array($result11)) {
			$j+=1;
			$this->fpdf->setFont('Arial','',7);
			$this->fpdf->Cell($w[0],$InterLigne,"",1,0,'L');
			$this->fpdf->Cell($w[1],$InterLigne,"",1,0,'L');
			$this->fpdf->Cell($w[2],$InterLigne,"",1,0,'C');
			$this->fpdf->Cell($w[3],$InterLigne,"",'LR','C');
		// 	$this->fpdf->setFont('Arial','',6);
			if ($j==1)
				$this->fpdf->Cell($w[4],$InterLigne,"the last  6 months 3.5 cm",'R',0,'C');
			if ($j==2)
				$this->fpdf->Cell($w[4],$InterLigne,"X 4.5cm (passport size) ",'R',0,'C');
			if ($j==3)
				$this->fpdf->Cell($w[4],$InterLigne,"With full and handwritten",0,0,'C');
			$this->fpdf->setFont('Arial','',8);
			// $this->fpdf->Cell($w[5],$InterLigne,"",'LR','C');
			
			$this->fpdf->Ln();
			
		// }
		// $n = 3 - $total_ref;
		// $x = 1;
		
		// while($x<=$n) {
			$this->fpdf->setFont('Arial','',8);
			$this->fpdf->Cell($w[0],$InterLigne,"",1,0,'C');
			$this->fpdf->Cell($w[1],$InterLigne,"",1,0,'C');
			$this->fpdf->Cell($w[2],$InterLigne,"",1,0,'C');
			$this->fpdf->Cell($w[3],$InterLigne,"",'LR',0,'C');
			// $x++;
			
		$this->fpdf->setFont('Arial','',6);
		// if($j==0)		
		// 	$this->fpdf->Cell($w[4],$InterLigne,"the last  6 months 3.5 cm",'R',0,'C');
		// // if($j==1)
		// 	$this->fpdf->Cell($w[4],$InterLigne,"X 4.5cm (passport size)",'R',0,'C');
		// // if($j==2)
		// 	$this->fpdf->Cell($w[4],$InterLigne,"With full and handwritten",'R',0,'C');
		// $x+=1;$j+=1;
		$this->fpdf->Cell($w[5],$InterLigne,"",'R','C');
		$this->fpdf->Ln();
		// }
		//$this->Cell($w[5],$InterLigne,"",LR,C);
		//$this->Ln();
		//  42. declaration to wit
		$txt = "42.  I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and";
		$this->fpdf->SetFont('Arial','',7);
		$w=array(155,4,33,4);
		$this->fpdf->Cell($w[0],$InterLigne,$txt,'LTR',0,'L',1);
		$this->fpdf->Cell($w[1],$InterLigne,"",'LR','C');
		$this->fpdf->setFont('Arial','',6);
		$this->fpdf->Cell($w[2],$InterLigne,"name tag and signature over",0,0,'C');
		$this->fpdf->Cell($w[3],$InterLigne,"",'LR','C');
		$this->fpdf->Ln();

		//  paragraph1
		$txt = "        complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the ";
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0],$InterLigne,$txt,'LR',0,'L',1);
		$this->fpdf->Cell($w[1],$InterLigne,"",'LR','C');
		$this->fpdf->setFont('Arial','',6);
		$this->fpdf->Cell($w[2],$InterLigne,"printed name.Computer",0,0,'C');
		$this->fpdf->Cell($w[3],$InterLigne,"",'LR','C');
		$this->fpdf->Ln();
		// paragraph1
		$txt = "        Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein.";
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0],$InterLigne,$txt,'LR',0,'L',1);
		$this->fpdf->Cell($w[1],$InterLigne,"",'LR','C');
		$this->fpdf->setFont('Arial','',6);
		$this->fpdf->Cell($w[2],$InterLigne,"generated or photocopied",0,0,'C');
		$this->fpdf->Cell($w[3],$InterLigne,"",'LR','C');
		$this->fpdf->Ln();
		//  paragraph2
		$txt = "         I  agree that any misrepresentation made in this document and its attachments shall cause the filing of ";
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0],$InterLigne,$txt,'LR',0,'L',1);
		$this->fpdf->Cell($w[1],$InterLigne,"",'LR','C');
		$this->fpdf->setFont('Arial','',6);
		$this->fpdf->Cell($w[2],$InterLigne,"picture is not acceptable",'B',0,'C');
		$this->fpdf->Cell($w[3],$InterLigne,"",'LR','C');

		$this->fpdf->Ln();
		//  paragraph2
		$txt = "         administrative/criminal case/s against me.";
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[0],$InterLigne,$txt,'LBR',0,'L',1);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(0,$InterLigne,"PHOTO",'LRB',0,'C');
		$this->fpdf->Ln(2);

		//  SIGNATURE/DATE ACCOMPLISHED/TAX
		$w=array(3,70,2,80,4,33,4);
		$this->fpdf->SetFont('Arial','',5);
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->Cell($w[1],$InterLigne,"",0,0);			//  signature
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"",0,0);			//  blank/space provided
		$this->fpdf->Cell($w[4],$InterLigne,"",0,0);			//  spaces
		$this->fpdf->Cell($w[5],10,"",0,0);					//  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				
		$this->fpdf->Ln();

		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[1],$InterLigne,"Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's,",1,0,'C',1);
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"",'LRT',0,'C');          // signature
		$this->fpdf->Cell($w[4],$InterLigne,"",'LR',0);				//  spaces
		$this->fpdf->Cell($w[5],$InterLigne,"",'RT',0);			    //  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln();
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[1],$InterLigne,"License, etc.)             PLEASE INDICATE ID Number",1,0,'L',1);
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"",'LR',0,'C');           // signature
		$this->fpdf->Cell($w[4],$InterLigne,"",'LR',0);				//  spaces
		$this->fpdf->Cell($w[5],$InterLigne,"",'R',0);		     	//  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln();
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[1],$InterLigne,"Government Issued ID: ",1,0,'L');
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0,'C');
		$this->fpdf->Cell($w[3],$InterLigne,"SIGNATURE (Sign inside the box)",1,0,'C',1);     // signature
		$this->fpdf->Cell($w[4],$InterLigne,"",'LR',0);				//  spaces
		$this->fpdf->Cell($w[5],$InterLigne,"",'R',0);			    //  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln();
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[1],$InterLigne,"ID/License/Passport No.: ",1,0,'L');
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		// $strDate2 = explode('-',$row[$i]['dateAccomplished']);
		// $dateAccomplished = $strDate2[1]."-".$strDate2[2]."-".$strDate2[0];
		$this->fpdf->Cell($w[3],$InterLigne,"",'LTBR',0,'C');           // date accomplished
		$this->fpdf->Cell($w[4],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Cell($w[5],$InterLigne,"",'LR',0);			    //  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln();

		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->SetFillColor(225,225,225);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell($w[1],$InterLigne,"Date/Place of Issuance: ",1,0,'L');
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"Date Accomplished",'LTBR',0,'C',1);           // signature
		$this->fpdf->Cell($w[4],$InterLigne,"",'R',0);									 //  spaces
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($w[5],$InterLigne,"Right Thumbmark",'LTBR',0,'C',1);			 //  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'LR',0);	
		$this->fpdf->Ln(2);
		// sworn
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->Cell($w[1],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"",0,0);              // signature
		$this->fpdf->Cell($w[4],$InterLigne,"",0,0);				//  spaces
		$this->fpdf->Cell($w[5],$InterLigne,"",0,0);				//  spaces
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln();
		//sworn
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell(0,$InterLigne,"SUBSCRIBED AND SWORN to before me this ________________, affiant exhibiting his/her validly issued government ID as indicated above.",'LTR',0,'C');
		$this->fpdf->Ln(2);

		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->Cell($w[1],$InterLigne,"",0,0,'C');
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"",0,0,'C');           // signature
		$this->fpdf->Cell($w[4],$InterLigne,"",0,0);				//  spaces
		$this->fpdf->Cell($w[5],$InterLigne,"",0,0);			//  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln(4);

		$this->fpdf->SetFont('Arial','',8);
		$InterLigne=13;
		$this->fpdf->Cell($w[0],$InterLigne,'','L',0,'C');
		$this->fpdf->Cell($w[1],$InterLigne,'',0,0,'C');
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		
		$this->fpdf->Cell($w[3],$InterLigne,'','LTR',0,'C');
		$this->fpdf->Cell($w[4],$InterLigne,"",0,0);				//  spaces
		$this->fpdf->SetFont('Arial','',10);
		$this->fpdf->Cell($w[5],$InterLigne,"",0,0,'C');			//  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln();
		$InterLigne=6;
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->SetFont('Arial','',8);
		$this->fpdf->Cell($w[1],$InterLigne,"",0,'C');
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"Person Administering Oath",'LTBR',0,'C',1);
		$this->fpdf->Cell(0,$InterLigne,"",'R',0);				//  spaces
		$this->fpdf->Ln(3);
		$this->fpdf->SetFont('Arial','B',8);
		$this->fpdf->Cell($w[0],$InterLigne,"",'L',0);
		$this->fpdf->Cell($w[1],$InterLigne,"",0,0);			//  signature
		$this->fpdf->Cell($w[2],$InterLigne,"",0,0);
		$this->fpdf->Cell($w[3],$InterLigne,"",0,0);			//  blank/space provided
		$this->fpdf->Cell($w[4],$InterLigne,"",0,0);			//  spaces
		$this->fpdf->Cell($w[5],10,"",0,0);					//  thumbmark
		$this->fpdf->Cell($w[6],$InterLigne,"",'R',0);				
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','I',6);
		$this->fpdf->Cell(0,$InterLigne,"CS FORM 212 (Revised 2017),  Page 4 of 4",1,0,'R');
		$this->fpdf->Ln(6);

	}
	
	
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */
//Instanciation of inherited class

	
	