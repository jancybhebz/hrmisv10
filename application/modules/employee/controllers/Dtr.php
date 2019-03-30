<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/Hr_model','libraries/Attendance_scheme_model','hr/Attendance_summary_model','libraries/Agency_profile_model'));
    }
	
	public function print_preview()
	{
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$agencyname = $this->Agency_profile_model->getData();
		$agencyname = $agencyname[0]['agencyName'];
		
		$this->load->library('general/Pdf_gen');
		$this->fpdf = new Pdf_gen();

		$this->fpdf->AddPage('P');
		$this->fpdf->SetTitle(date('F', mktime(0, 0, 0, $month, 10)).' '.$yr);

		# header
		$this->fpdf->Image('assets/images/logo.png',10,10,20,20);
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(25);
		$this->fpdf->Cell(0,10,'Republic of the Philippines',0,0,'L');
		$this->fpdf->Ln(7);
		$this->fpdf->SetFont('Arial','B',14);
		$this->fpdf->Cell(25);
		$this->fpdf->Cell(0,8,strtoupper($agencyname),0,0,'L');
		$this->fpdf->SetTextColor(0,0,0);

		$this->fpdf->Ln(15);
		$this->fpdf->Cell(0, 5,"Daily Time Record", 0, 1, "C");
		$this->fpdf->Ln(2);

		# employee details
		$empid = $this->uri->segment(4);
		$empdata = $this->Hr_model->getData($empid,'','all');
		$empdata = $empdata[0];
		$emp_att_scheme = $this->Attendance_scheme_model->getData($empdata['schemeCode']);
		$emp_att_scheme = $emp_att_scheme[0];
		
		$this->fpdf->SetFont('Arial','', 8);
		$this->fpdf->Cell(27,5,'Employee Number:','TL',0,'L');
		$this->fpdf->Cell(93,5,$empid,'T',0,'L');
		$this->fpdf->Cell(20,5,'Month/Year:','T',0,'L');
		$this->fpdf->Cell(50,5,date('F', mktime(0, 0, 0, $month, 10)).', '.$yr,'TR',1,'L');

		$this->fpdf->Cell(27,5,'Employee Name:','L',0,'L');
		$this->fpdf->Cell(93,5,$empdata['surname'].', '.$empdata['firstname'].' '.$empdata['middlename'],0,0,'L');
		$this->fpdf->Cell(20,5,'Official Time:',0,0,'L');
		$this->fpdf->Cell(50,5,$emp_att_scheme['amTimeinFrom'].' - '.$emp_att_scheme['pmTimeoutTo'],'R',1,'L');

		$this->fpdf->Cell(27,5,'Position:','L',0,'L');
		$this->fpdf->Cell(163,5,$empdata['positionDesc'],'R',1,'L');

		$this->fpdf->Cell(27,5,'Group:','L',0,'L');
		$this->fpdf->Cell(163,5,office_name(employee_office($empid)),'R',1,'L');

		$this->fpdf->Cell(0,2,'','BLR',1,'L');

		# DTR Header
		$this->fpdf->SetFont('Arial','B', 8);
		$arr_header = array('DAY','IN','OUT','IN','OUT','IN','OUT','LATE','Overtime','Undertime','REMARKS');
		$header_w = array(14,12,12,12,12,12,12,12,17,17,58);
		foreach($arr_header as $hk => $colheader):
			$this->fpdf->Cell($header_w[$hk],5,$colheader,'LRB',0,'C');	
		endforeach;
		$this->fpdf->Ln();

		# DTR Content
		$this->fpdf->SetFont('Arial','', 7);
		# DTR Details
		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);

		foreach($arremp_dtr['dtr'] as $dtr):
			$row_detail = array();
			$ddate = '  '.date('d',strtotime($dtr['date'])).'  '.$dtr['day'];

			$remarks = '';
			# Remarks if holiday
			if($dtr['holiday'] != ''):
				$remarks = $dtr['holiday'];
			endif;
			# Remarks if Leave
			if($dtr['leaveremarks'] != ''):
				$leaveremarks = json_decode($dtr['leaveremarks'],true);
				$remarks = $remarks!='' ? $remarks.'; '.$leaveremarks['leaveCode'] : $leaveremarks['leaveCode'];
			endif;
			# Remarks if OB
			if($dtr['obremarks'] != ''):
				$obremarks = json_decode($dtr['obremarks'],true);
				$remarks = $remarks!='' ? $remarks.'; (OB) '.date('H:i A', strtotime($obremarks['obTimeFrom'])).' - '.date('H:i A', strtotime($obremarks['obTimeTo'])) : '(OB) '.date('H:i A', strtotime($obremarks['obTimeFrom'])).' - '.date('H:i A', strtotime($obremarks['obTimeTo']));
			endif;
			# Remarks if OB
			if($dtr['toremarks'] != ''):
				$toremarks = json_decode($dtr['toremarks'],true);
				$remarks = $remarks!='' ? $remarks.'; TO' : 'TO';
			endif;

			$row_detail = array($ddate,
								(count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['inAM'])) : ':'),
								(count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['outAM'])) : ':'),
								(count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['inPM'])) : ':'),
								(count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['outPM'])) : ':'),
								(count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['inOT'])) : ':'),
								(count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['outOT'])) : ':'),
								(count($dtr['dtrdata']) > 0 ? $dtr['late'] != '00:00' ? $dtr['late'] : ':' : ':'),
								(count($dtr['dtrdata']) > 0 ? $dtr['overtime'] != '00:00' ? $dtr['overtime'] : ':' : ':'),
								(count($dtr['dtrdata']) > 0 ? $dtr['undertime'] != '00:00' ? $dtr['undertime'] : ':' : ':'),
								$remarks);

			foreach($row_detail as $hk => $row):
				$this->fpdf->Cell($header_w[$hk],5,$row,'LRB',0,$hk==0 ? 'L' : 'C');	
			endforeach;
			$this->fpdf->Ln();

		endforeach;
		$this->fpdf->Ln(2);

		# footer
		$this->fpdf->SetFont('Arial','', 8);

		$this->fpdf->Cell(115,5,'Total Number of Working Days: '.$arremp_dtr['total_workingdays'],0,0,'L');
		$this->fpdf->Cell(75,5,'Total Days Absent: '.count($arremp_dtr['date_absents']),0,1,'L');

		$date_absents = '';
		foreach($arremp_dtr['date_absents'] as $absent):
			$date_absents.= date('d', strtotime($absent)).' ';
		endforeach;
		$this->fpdf->Cell(115,5,'Dates Absent: '.$date_absents,0,0,'L');
		$this->fpdf->Cell(75,5,'VL: '.($arremp_dtr['total_days_vl']+$arremp_dtr['total_days_fl']),0,1,'L');

		$this->fpdf->Cell(115,5,'Total Undertime: '.date('H:i', mktime(0, $arremp_dtr['total_undertime'])),0,0,'L');
		$this->fpdf->Cell(75,5,'SL: '.$arremp_dtr['total_days_sl'],0,1,'L');

		$this->fpdf->Cell(115,5,'Total Late:'.date('H:i', mktime(0, $arremp_dtr['total_late'])).'   Late/Undertime: '.date('H:i', mktime(0, $arremp_dtr['total_undertime']+$arremp_dtr['total_late'])),0,0,'L');
		$this->fpdf->Cell(75,5,'Offset Balance: ',0,1,'L');

		$this->fpdf->Cell(115,5,'Total Days Late/Undertime: '.($arremp_dtr['total_days_late'] + $arremp_dtr['total_days_ut']),0,0,'L');
		$this->fpdf->Cell(75,5,'Offset for the Month: ',0,1,'L');

		$this->fpdf->Cell(115,5,'Total Days LWOP: '.$arremp_dtr['total_days_lwop'],0,0,'L');
		$this->fpdf->Cell(75,5,'Offset Used: ',0,1,'L');

		$this->fpdf->Ln(3);
		$this->fpdf->MultiCell(190, 5, 'I HEREBY CERTIFY that the above records are true and correct report of the hours of work performed of which was made daily from the time of arrival and departure from the office.','T','J');

		$this->fpdf->SetFont('Arial','B', 8);
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(27,5,'',0,0,'L');
		$this->fpdf->Cell(63,5,'EMPLOYEE SIGNATURE','T',0,'C');
		$this->fpdf->Cell(10,5,'',0,0,'L');
		$this->fpdf->Cell(63,5,'DIVISION CHIEF / IMMEDIATE SUPERVISOR','T',0,'C');
		$this->fpdf->Cell(27,5,'',0,0,'L');

		$this->fpdf->Output();
	}



}
/* End of DTR Controller */