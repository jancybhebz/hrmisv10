<?php
class AcceptanceResignation_model extends CI_Model {

	public function __construct()
	{
		//parent::__construct();
		$this->load->database();		
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
		$this->load->model('employees/employees_model');
		$this->fpdf->SetLeftMargin(25);
		$this->fpdf->SetRightMargin(25);
		$this->fpdf->SetTopMargin(10);
		$this->fpdf->SetAutoPageBreak("on",10);
		$this->fpdf->AddPage('P','','A4');
		
		
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(10);

		$arrGet = $this->input->get();
		
		$t_dtmLtrDate = $arrData['dtLetterDay']." ".date('F',strtotime(date('Y').'-'.$arrData['dtLetterMonth'].'-'.date('d')))." ".$arrData['dtLetterYear'];
		$t_dtmRcvDate = $arrData['dtReceivedDay']." ".date('F',strtotime(date('Y').'-'.$arrData['dtReceivedMonth'].'-'.date('d')))." ".$arrData['dtReceivedYear'];
		$t_dtmAcptDate = $arrData['dtAcceptedDay']." ".date('F',strtotime(date('Y').'-'.$arrData['dtAcceptedMonth'].'-'.date('d')))." ".$arrData['dtAcceptedYear'];

		$rs = $this->getSQLData($arrData['empno']);
		foreach($rs as $t_arrEmpInfo):
			$extension = (trim($t_arrEmpInfo['nameExtension'])=="") ? "" : " ".$t_arrEmpInfo['nameExtension'];		
			$strName = $t_arrEmpInfo['firstname']." ".$t_arrEmpInfo['middleInitial'].". ".$t_arrEmpInfo['surname'].$extension;
			$this->fpdf->Ln(30);
			$this->fpdf->SetFont('Arial', "BU", 16);
			//$this->Cell(0, 5, "A C C E P T A N C E  O F  R E S I G N A T I O N", 0, 0, "C");
			$this->fpdf->Ln(20);
					
			$this->fpdf->SetFont('Arial', "", 12);	
			$this->fpdf->Cell(0, 5, date("d F Y"), 0, 0, "L");


			$this->fpdf->Ln(20);
			$this->fpdf->SetFont('Arial', "", 12);
			$this->fpdf->Cell(0, 5, $strName, 0, 1, "L");
			$this->fpdf->Cell(0, 5, $t_arrEmpInfo['positionDesc'], 0, 0, "L");
			$this->fpdf->Ln();
			//$this->Cell(0, 5, $objGen->getOfficeGroupDeptDiv($t_arrEmpInfo['empNumber']), 0, 0, "L");
			$this->fpdf->Cell(0, 5, $t_arrEmpInfo['empNumber'].'=office', 0, 0, "L");
			$this->fpdf->Ln(15);
			
			//$this->Cell(0, 5, "Sir/Madam:", 0, 0, "L");
			$this->fpdf->Cell(0, 5, $t_arrEmpInfo['sex']."salutation:", 0, 0, "L");
			//$t_arrEmpInfo = 
			// $this->Ln(20);
			// $this->SetFont('Arial', "", 12);
			// $this->Cell(0, 5, $strName, 0, 1, "L");
			// $this->Cell(0, 5, $t_arrEmpInfo['positionDesc'], 0, 0, "L");
			// $this->Ln();
			// $this->Cell(0, 5, $objGen->getOfficeGroupDeptDiv($t_arrEmpInfo['empNumber']), 0, 0, "L");
			// $this->Ln(15);
			
			// //$this->Cell(0, 5, "Sir/Madam:", 0, 0, "L");
			// $this->Cell(0, 5, $this->getSalutation($t_arrEmpInfo['sex']).":", 0, 0, "L");
			
		
			// $this->Write(5,$strP2);

			$strPrgrph1 = "In reply to your letter of ".$t_dtmLtrDate  
						." which we received last ".$t_dtmRcvDate 
						.", opting for resignation from the position of ".$t_arrEmpInfo['positionDesc']
						." in this Office, please be advised that the same is hereby ";
			$strPrgrph2 = "accepted";
			$strPrgrph3 = " to take effect ";
			$strPrgrph4 = " at the close of the office hours on ".$t_dtmAcptDate.".";        
			$this->fpdf->Ln(15);
			$this->fpdf->SetFont('Arial', "", 12);
			$this->fpdf->Write(5,$strPrgrph1);
			$this->fpdf->SetFont('Arial', "B", 12);
			$this->fpdf->Write(5,$strPrgrph2);
			$this->fpdf->SetFont('Arial', "", 12);
			$this->fpdf->Write(5,$strPrgrph3);
			$this->fpdf->SetFont('Arial', "B", 12);
			$this->fpdf->Write(5,$strPrgrph4);
			$this->fpdf->SetFont('Arial', "", 12);
		endforeach;
		 
		echo $this->fpdf->Output();
	}
	
	function getSQLData($t_strEmpNmbr="")
	{
	
		if($t_strEmpNmbr!='')
			$this->db->where('tblEmpPersonal.empNumber',$t_strEmpNmbr);


		// $sql = "SELECT tblEmpPersonal.empNumber, tblEmpPersonal.surname, 
		// 	tblEmpPersonal.firstname, tblEmpPersonal.middlename,tblEmpPersonal.middleInitial,tblEmpPersonal.nameExtension, tblEmpPersonal.sex, 
		// 	tblPosition.positionDesc, 
		// 	tblEmpPersonal.comTaxNumber, tblEmpPersonal.issuedAt, 
		// 	tblEmpPersonal.issuedOn, tblEmpPosition.positionDate,tblAppointment.appointmentDesc,
		// 	tblEmpPosition.firstDayAgency 
		// FROM tblEmpPersonal
		// LEFT JOIN tblEmpPosition
		// 	ON tblEmpPersonal.empNumber = tblEmpPosition.empNumber
		// 	LEFT JOIN tblPosition
		// 		ON tblEmpPosition.positionCode = tblPosition.positionCode
		// 			LEFT JOIN tblAppointment
		// 				ON tblAppointment.appointmentCode=tblEmpPosition.appointmentCode 
		// $where
		// ORDER BY tblEmpPersonal.surname, tblEmpPersonal.firstname";	
		//$rs = mysql_query($sql);	
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
		//$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();
	
	}

	function getFoundationsActiveCertification()
	{
		// $strSQL = "SELECT DISTINCT tblcertifications.*,tblfoundations.* FROM tblcertifications
		// 			INNER JOIN tblfoundations ON tblfoundations.fdn_id=tblcertifications.cert_fdn_id
		// 			INNER JOIN tblstatus ON tblstatus.status_id=tblfoundations.fdn_status_id
		// 			WHERE tblcertifications.cert_date_expiration>='".date('Y-m-d')."'
		// 			AND tblstatus.status_desc='Active Certification'
		// 			GROUP BY tblfoundations.fdn_id,tblcertifications.cert_id
		// 			ORDER BY tblfoundations.fdn_name
		// 			";
		// $objQuery = $this->db->query($strSQL);
		// return $objQuery->result_array();
	}

	function getLatestCertification($fdnid)
	{
		// $strSQL = "SELECT cert_number,cert_date_effectivity,cert_date_expiration,cert_due_renewal FROM tblcertifications
		// 			WHERE cert_fdn_id='".$fdnid."'
		// 			ORDER BY cert_date_expiration DESC 
		// 			";
		// $objQuery = $this->db->query($strSQL);
		// return $objQuery->result_array();
	}

	function getTotalCertification($fdnid)
	{
		// $strSQL = "SELECT count(cert_id) as total FROM tblcertifications
		// 			WHERE cert_fdn_id='".$fdnid."'
		// 			";
		// $objQuery = $this->db->query($strSQL);
		// $rs = $objQuery->result_array();
		// return count($rs)>0?$rs[0]['total']:0;
	}
	
}
/* End of file Reminder_renewal_model.php */
/* Location: ./application/models/reports/Reminder_renewal_model.php */