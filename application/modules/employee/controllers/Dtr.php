<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/Hr_model','libraries/Attendance_scheme_model','hr/Attendance_summary_model','libraries/Agency_profile_model','libraries/Holiday_model'));
    	$this->load->helper(array('dtr_helper'));
    }
	
	public function print_preview()
	{
		// $month = isset($_GET['month']) ? $_GET['month'] : date('m');
		// $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$empid = $this->uri->segment(4);

		$total_undertime = 0;
		$total_late = 0;
		$days_late_ut = 0;
		$days_absent = 0;
		$in_am  = '';
		$out_am = '';
		$in_pm  = '';
		$out_pm = '';

		$datefrom = currdfrom();
		$dateto = currdto();
		$holidays = $this->Holiday_model->getAllHolidates($empid,$datefrom,$dateto);
		$working_days = get_workingdays('','',$holidays,$datefrom,$dateto);
		$agencyname = $this->Agency_profile_model->getData();
		$agencyname = $agencyname[0]['agencyName'];
		// echo '<pre>';
		// echo '<br>datefrom = '.$datefrom;
		// echo '<br>dateto = '.$dateto;
		// echo '<br>agencyname = '.$agencyname;
		
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
		$empdata = $this->Hr_model->getData($empid,'','all');
		$empdata = $empdata[0];
		$emp_att_scheme = $this->Attendance_scheme_model->getData($empdata['schemeCode']);
		if(count($emp_att_scheme) > 0):
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
			$header_w = array(19,12,12,12,12,12,12,12,17,17,53);
			foreach($arr_header as $hk => $colheader):
				$this->fpdf->Cell($header_w[$hk],5,$colheader,'LRB',0,'C');	
			endforeach;
			$this->fpdf->Ln();

			# DTR Content
			$this->fpdf->SetFont('Arial','', 7);
			# DTR Details
			// $arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);

			$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $datefrom, $dateto);

			foreach($arremp_dtr as $dtr):
				$ddate  = '  '.date('M-d',strtotime($dtr['dtrdate'])).'  '.$dtr['day'];
				$in_am  = count($dtr['dtr']) > 0 ? $dtr['dtr']['inAM']  == '00:00:00' || $dtr['dtr']['inAM']  == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inAM']))  : '';
				$out_am = count($dtr['dtr']) > 0 ? $dtr['dtr']['outAM'] == '00:00:00' || $dtr['dtr']['outAM'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outAM'])) : '';
				$in_pm  = count($dtr['dtr']) > 0 ? $dtr['dtr']['inPM']  == '00:00:00' || $dtr['dtr']['inPM']  == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inPM']))  : '';
				$out_pm = count($dtr['dtr']) > 0 ? $dtr['dtr']['outPM'] == '00:00:00' || $dtr['dtr']['outPM'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outPM'])) : '';
				$remarks= array();

				if(count($dtr['holiday_name']) > 0):
				    foreach($dtr['holiday_name'] as $hday): 
				    	$remarks[] = $hday;
				    endforeach;
				endif;

				if(count($dtr['emp_ws']) > 0):
				    foreach($dtr['emp_ws'] as $ws):
				    	$remarks[] = $ws['holidayName'].' - '.date('h:i A',strtotime($ws['holidayTime']));
				    endforeach;
				endif;

				if(count($dtr['obs']) > 0):
				    foreach($dtr['obs'] as $ob):
				    	$remarks[] = 'OB '.date('M.d',strtotime($ob['obDateFrom'])).' to '.date('M.d',strtotime($ob['obDateTo'])).' ('.date('h:i a',strtotime($ob['obTimeFrom'])).')';
				    endforeach;
				endif;
				if(count($dtr['tos']) > 0):
				    foreach($dtr['tos'] as $to):
				    	$remarks[] = 'TO '.date('M.d',strtotime($to['toDateFrom'])).' to '.date('M.d',strtotime($to['toDateTo']));
				    endforeach;
				endif;
				if(count($dtr['leaves']) > 0):
				    foreach($dtr['leaves'] as $leave):
				        $remarks[] = 'Leave '.date('M.d',strtotime($leave['leaveFrom'])).' to '.date('M.d',strtotime($leave['leaveTo']));
				    endforeach;
				endif;
				if(count($dtr['dtr']) > 0):
				    if($dtr['dtr']['remarks'] == 'CL'):
				        $remarks[] = 'CTO';
				    endif;
				endif;

				$total_undertime = $total_undertime + $dtr['utimes'];
				$total_late = $total_late + $dtr['lates'];
				if($dtr['lates'] + $dtr['utimes'] > 0):
				    $days_late_ut = $days_late_ut + 1;
				endif;

				if((count($dtr['leaves']) + count($dtr['dtr']) + count($dtr['obs']) + count($dtr['tos']) + count($dtr['holiday_name']) < 1) && !in_array($dtr['day'],array('Sat','Sun'))):
				    $days_absent = $days_absent + 1;
				endif;

				$row_detail = array($ddate,
									$in_am,
									$out_am,
									$in_pm,
									$out_pm,
									'', // (count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['outOT'])) : ':'),
									'', // (count($dtr['dtrdata']) > 0 ? date('H:i', strtotime($dtr['dtrdata']['outOT'])) : ':'),
									'', // (count($dtr['dtrdata']) > 0 ? $dtr['late'] != '00:00' ? $dtr['late'] : ':' : ':'),
									count($dtr['dtr']) > 0 ? $dtr['dtr']['OT'] == 1 ? $dtr['ot'] > 0 ? date('H:i', mktime(0, $dtr['ot'])) : '' : '' : '',
									$dtr['utimes'] > 0 ? date('H:i', mktime(0, $dtr['utimes'])) : '',
									implode('; ',$remarks));

				// foreach($row_detail as $hk => $row):
				// 	$this->fpdf->Cell($header_w[$hk],5,$row,'LRB',0,$hk==0 ? 'L' : 'C');	
				// endforeach;

				$align = array('C','C','C','C','C','C','C','C','C','C','C');
				$border = array(1,1,1,1,1,1,1,1,1,1,1);
				$this->fpdf->SetWidths($header_w);
				$this->fpdf->SetAligns($width);
				$this->fpdf->FancyRow_small(4,$row_detail,$border,$align);
				
				// $this->fpdf->Ln();
			endforeach;

			$this->fpdf->Ln(2);

			# footer
			$this->fpdf->SetFont('Arial','', 8);

			$this->fpdf->Cell(115,5,'Total Number of Working Days: '.count($working_days),0,0,'L');
			$this->fpdf->Cell(75,5,'Total Days Absent: '.count($arremp_dtr['date_absents']),0,1,'L');

			$date_absents = '';
			foreach($arremp_dtr['date_absents'] as $absent):
				$date_absents.= date('d', strtotime($absent)).' ';
			endforeach;
			$this->fpdf->Cell(115,5,'Dates Absent: '.$date_absents,0,0,'L');
			$this->fpdf->Cell(75,5,'VL: '.($arremp_dtr['total_days_vl']+$arremp_dtr['total_days_fl']),0,1,'L');

			$this->fpdf->Cell(115,5,'Total Undertime: '.date('H:i', mktime(0, $total_undertime)),0,0,'L');
			$this->fpdf->Cell(75,5,'SL: '.$arremp_dtr['total_days_sl'],0,1,'L');

			$this->fpdf->Cell(115,5,'Total Late:'.date('H:i', mktime(0, $total_late)).'   Late/Undertime: '.date('H:i', mktime(0, ($total_undertime + $total_late))),0,0,'L');
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
		else:
			$this->fpdf->SetTextColor(255, 85, 0);
			$this->fpdf->Ln(15);
			$this->fpdf->Cell(0, 5,"Attendance Scheme for ".getfullname($empdata['firstname'], $empdata['surname'], $empdata['middlename'])." is not yet set.", 0, 1, "C");
			$this->fpdf->Ln(2);
		endif;

		$this->fpdf->Output();
	}



}
/* End of DTR Controller */