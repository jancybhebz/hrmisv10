<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ApplicationforLeaveForm_model extends CI_Model {

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
		
		$this->fpdf->SetLeftMargin(25);
		$this->fpdf->SetRightMargin(25);
		$this->fpdf->SetTopMargin(10);
		$this->fpdf->SetAutoPageBreak("on",10);
		
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(10);

		$arrGet = $this->input->get();
		
		//$t_dtmRcvDate = $arrData['dtReceivedDay']." ".date('F',strtotime(date('Y').'-'.$arrData['dtReceivedMonth'].'-'.date('d')))." ".$arrData['dtReceivedYear'];
		//$t_dtmLtrDate = $arrData['dtLetterDay']." ".date('F',strtotime(date('Y').'-'.$arrData['dtLetterMonth'].'-'.date('d')))." ".$arrData['dtLetterYear'];
		//$t_dtmAcptDate = $arrData['dtAcceptedDay']." ".date('F',strtotime(date('Y').'-'.$arrData['dtAcceptedMonth'].'-'.date('d')))." ".$arrData['dtAcceptedYear'];

		$rs = $this->getSQLData($arrData['strSelectPer']==1?$arrData['empno']:'');
		foreach($rs as $t_arrEmpInfo):
			$this->fpdf->AddPage('P','','A4');
			$extension = (trim($t_arrEmpInfo['nameExtension'])=="") ? "" : " ".$t_arrEmpInfo['nameExtension'];		
			$strName = $t_arrEmpInfo['firstname']." ".mi($t_arrEmpInfo['middleInitial']).$t_arrEmpInfo['surname'].$extension;
			
			$this->fpdf->Ln(30);
			$this->fpdf->SetFont('Arial', "BU", 16);
			//$this->fpdf->Cell(0, 5, "Accumulated Report by Office", 0, 0, "C");
			$this->fpdf->Ln(20);
			$this->fpdf->SetFont('Arial', "", 12);	
			$this->fpdf->Cell(0, 5, date("F d, Y"), 0, 0, "L");
			$this->fpdf->Ln(20);
			$this->fpdf->SetFont('Arial', "", 12);
			$this->fpdf->Cell(0, 5, $strName, 0, 1, "L");
			$this->fpdf->Cell(0, 5, $t_arrEmpInfo['positionDesc'], 0, 0, "L");
			$this->fpdf->Ln();
			
			$this->fpdf->Cell(0, 5, trim(office_name(employee_office($t_arrEmpInfo['empNumber']))), 0, 0, "L");
			$this->fpdf->Ln(15);
			
			$this->fpdf->Cell(0, 5, "Sir/Madam:", 0, 0, "L");
			

			$strPrgrph1 = "This is to inform you that, per records of the Personnel Division, Personnel and Administrative Services Group, your leave credits in this office, as of ".date("F d, Y")." are as follows:";  
			//$strPrgrph2 = "are as follows:";
			//$strPrgrph3 = " to take effect ";
			//$strPrgrph4 = " at the close of the office hours on ".$t_dtmAcptDate.".";        
			$this->fpdf->Ln(15);
			$this->fpdf->SetFont('Arial', "", 12);
			$this->fpdf->Write(5,$strPrgrph1);
			$this->fpdf->SetFont('Arial', "", 12);
			//$this->fpdf->Write(5,$strPrgrph2);
			$this->fpdf->SetFont('Arial', "", 10);
			$this->fpdf->Ln(15);
			$this->fpdf->Cell(75,8,"Name","TB",0,'L');
			$this->fpdf->Cell(30,8,"Vac. Lv.","TB",0,'L');
			$this->fpdf->Cell(30,8,"Sick Lv.","TB",0,'L');
			$this->fpdf->Cell(0,8,"Total","TB",0,'L');
			$this->fpdf->Ln(8);
			$this->fpdf->Cell(75,8,$strName,"TB",0,'L');
			$this->fpdf->Cell(30,8,"Vac. Lv.","TB",0,'L');
			$this->fpdf->Cell(30,8,"Sick Lv.","TB",0,'L');
			$this->fpdf->Cell(0,8,"Total","TB",0,'L');

			$this->fpdf->SetFont('Arial', "", 12);
			$this->fpdf->Ln(20);
			$this->fpdf->Cell(0,10,"For information and guidance.",0,0,'L');
			$this->fpdf->Ln(20);
			$this->fpdf->Cell(0,10,"Very truly yours,",0,0,'L');				
			//$obj = new signatoryName();
			//$arrSig = $obj->createSignatory('AR');
			$this->fpdf->Ln(20);
			$this->fpdf->SetFont('Arial','',12);		
			//$sig=explode('|',PD);
			$sig=getSignatories($arrGet['intSignatory']);
			if(count($sig)>0)
			{
				$sigName = $sig[0]['signatory'];
				$sigPos = $sig[0]['signatoryPosition'];
			}
			else
			{
				$sigName='';
				$sigPos='';
			}
			//$this->fpdf->Cell(0,10,$sig[1],0,0,'L');
			$this->fpdf->Cell(0,10,$sigName,0,0,'L');

			$this->fpdf->Ln(5);
			//$this->Cell(130);		
			$this->fpdf->Cell(0,10,$sigPos,0,0,'L');
			$this->fpdf->Cell(0,10,'',0,0,'L');
			
			$this->fpdf->Ln(15);
			$this->fpdf->SetFont('Arial','',11);		
			//$this->fpdf->Cell(0,10,"Copy furnished:",0,0,'L');
			$this->fpdf->Ln(7);
			//$this->fpdf->Cell(0,10,"Civil Service Commision",0,0,'L');
			
		endforeach;
		 
		echo $this->fpdf->Output();
	}
	
	function getSQLData($t_strEmpNmbr="")
	{
	
		if($t_strEmpNmbr!='')
			$this->db->where('tblEmpPersonal.empNumber',$t_strEmpNmbr);
		$this->db->select('tblEmpPersonal.empNumber, tblEmpPersonal.surname, 
			tblEmpPersonal.firstname, tblEmpPersonal.middlename,tblEmpPersonal.middleInitial,tblEmpPersonal.nameExtension, tblEmpPersonal.sex, 
			tblPosition.positionDesc, 
			tblEmpPersonal.comTaxNumber, tblEmpPersonal.issuedAt, 
			tblEmpPersonal.issuedOn, tblEmpPosition.positionDate,tblAppointment.appointmentDesc,
			tblEmpPosition.firstDayAgency');
		$this->db->join('tblEmpPosition',
			'tblEmpPersonal.empNumber = tblEmpPosition.empNumber','left');
		$this->db->join('tblPosition',
			'tblEmpPosition.positionCode = tblPosition.positionCode','left');
		$this->db->join('tblAppointment',
			'tblAppointment.appointmentCode=tblEmpPosition.appointmentCode ','left');
		$this->db->order_by('tblEmpPersonal.surname, tblEmpPersonal.firstname');
		$objQuery = $this->db->get('tblEmpPersonal');
		return $objQuery->result_array();
	
	}
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */