<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends MY_Controller {
	var $arrData;
	function __construct() {
        parent::__construct();
        $this->load->model(array('Hr_model'));
    }

	public function generate()
	{
		$this->load->library('ciqrcode');
		$rs = $this->Hr_model->getData();
		//print_r($rs);
		
		foreach($rs as $row):
			$qr_image=$row['empNumber'].'.png';
			echo $qr_image."<br>";
			$strData = $row['empNumber'];
			$params['data'] = $strData;
			$params['level'] = 'H';
			$params['size'] = 8;
			$params['savename'] =FCPATH."uploads/qr/".$qr_image;
			if($this->ciqrcode->generate($params))
			{
				//$this->arrTemplateData['img_url']=$qr_image;
				//Set QR Code value in DB
				//$arrData = array('reg_qr_code'=>$qr_image);
				echo '<img src="'.base_url('uploads/qr/'.$qr_image).'">';
			}
		endforeach;
	}

	public function print()
	{
		//$this->fpdf->AddPage('P','A4');
		require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';
		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$this->fpdf = $pdf;
		
		$rs=$this->Hr_model->getData();
		
		$this->fpdf->SetFont('Arial','',10);
		$x=8;$y=8;
		$w=30;
		$arrAligns = array('C');
		$arrWidth = array(30);
		$this->fpdf->SetWidths($arrWidth);
		$this->fpdf->SetAligns($arrAligns);
		
		$height=30;$i=0;$ctr=0;
		foreach($rs as $row):
			$strQRCode = $row['empNumber'].'.png';
			if(@getimagesize(base_url('uploads/qr/'.$strQRCode))!='')
			{
				$img = base_url('uploads/qr/'.$strQRCode);
				
				//print qr code
				$qrcode_img = $this->fpdf->Image($img,$this->fpdf->GetX(),$this->fpdf->GetY(),$w,$height);
				$this->fpdf->Cell($arrWidth[0],$height,$qrcode_img,1,0,'C');
				
				//print employee number
				$this->fpdf->SetFont('Arial','',7);
				$this->fpdf->setXY($this->fpdf->GetX()-$w,$this->fpdf->GetY()+($height));
				$this->fpdf->Cell($arrWidth[0],7,$row['empNumber'],1,0,'C');
				
				//$this->fpdf->Cell($arrWidth[0],5,'x='.$this->fpdf->GetX().'|y='.$this->fpdf->GetY(),1,0,'C');
				$this->fpdf->setXY($this->fpdf->GetX(),$this->fpdf->GetY()-30);
				
				$ctr++;$i++;
				if($ctr==6)
				{
					$this->fpdf->Ln(37);$ctr=0;
					//$this->fpdf->setXY(10.00125+$w,30.00125);
				}
				if($i==42)
				{
					$this->fpdf->AddPage();$i=0;
				}
			}
			//$this->fpdf->Cell(0,5,$row['prf_lastname'],0,1,'C');
		endforeach;
		
		//$pdf->Image(base_url('uploads/qr_image/.png',10,10,-300);
		echo $this->fpdf->Output();
	}
}
