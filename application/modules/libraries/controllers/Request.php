<?php 
/** 
Purpose of file:    Controller for Request Signatories Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/request_model','hr/hr_model'));
    }

	public function index()
	{
		$this->arrData['arrRequest'] = $this->request_model->getData();
		$this->arrData['arrEmployees'] = $this->hr_model->getData();
		//$this->arrData['arrEmp'] = $this->request_model->getEmpDetails();
		$this->template->load('template/template_view', 'libraries/request/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrRequestType'] = $this->request_model->getRequestType();
			$this->arrData['arrApplicant'] = $this->request_model->getApplicant();
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			$this->arrData['arrAction'] = $this->request_model->getAction();
			$this->arrData['arrSignatory'] = $this->request_model->getSignatory();


			$this->template->load('template/template_view','libraries/request/add_view',$this->arrData);	
		}
		else
		{	
			$strReqType = $arrPost['strReqType'];
			$strGenApplicant = $arrPost['strGenApplicant'];
			$strOfficeName = $arrPost['strOfficeName'];
			$strName = $arrPost['strName'];
			$str1stSigAction = $arrPost['str1stSigAction'];
			$str1stSignatory = $arrPost['str1stSignatory'];
			$str1stOfficer = $arrPost['str1stOfficer'];
			$str2ndSigAction = $arrPost['str2ndSigAction'];
			$str2ndSignatory = $arrPost['str2ndSignatory'];
			$str2ndOfficer = $arrPost['str2ndOfficer'];
			$str3rdSigAction = $arrPost['str3rdSigAction'];
			$str3rdSignatory = $arrPost['str3rdSignatory'];
			$str3rdOfficer = $arrPost['str3rdOfficer'];
			$str4thSigAction = $arrPost['str4thSigAction'];
			$str4thSignatory = $arrPost['str4thSignatory'];
			$str4thOfficer = $arrPost['str4thOfficer'];
			// print_r($arrPost);
			// exit(1);
			if(!empty($strReqType))
			{	
				if(count($this->request_model->checkExist($strReqType, $strGenApplicant, $str1stOfficer, $str2ndOfficer, $str3rdOfficer, $str4thOfficer))==0)
				{
					// print_r($arrPost);
					// exit(1);
					$arrData = array(
						'RequestType'=>$strReqType,
						'Applicant'=>$strGenApplicant,
						// 'Applicant'=>$strOfficeName, 
						// 'Applicant'=>$strName, 
						'Signatory1'=>$str1stSigAction.' : '.$str1stSignatory.' : '.$str1stOfficer,
						'Signatory2'=>$str2ndSigAction.' : '.$str2ndSignatory.' : '.$str2ndOfficer,
						'Signatory3'=>$str3rdSigAction.' : '.$str3rdSignatory.' : '.$str3rdOfficer,
						'SignatoryFin'=>$str4thSigAction.' : '.$str4thSignatory.' : '.$str4thOfficer
					
					);
					
					$blnReturn  = $this->request_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblRequestflow','Added '.$strReqType.' Request',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Request signatory added successfully.'); 
					}
					redirect('libraries/request');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request signatory already exists.');
					$this->session->set_flashdata('strReqType',$strReqType);
					// $this->session->set_flashdata('strGenApplicant',$strGenApplicant);	
					// $this->session->set_flashdata('str1stOfficer',$str1stOfficer);	
					// $this->session->set_flashdata('str2ndOfficer',$str2ndOfficer);	
					// $this->session->set_flashdata('str3rdOfficer',$str3rdOfficer);	
					// $this->session->set_flashdata('str4thOfficer',$str4thOfficer);	
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/request/add');
				}
			}
		}
    }

    public function edit()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$intReqId = urldecode($this->uri->segment(4));
			$this->arrData['arrRequest']= $this->request_model->getData($intReqId); 
			$this->arrData['arrRequestType'] = $this->request_model->getRequestType();
			$this->arrData['arrApplicant'] = $this->request_model->getApplicant();
			$arrOfficeName = array();
			for($i=1,$j=0;$i<=5;$i++)
			{
				$arrOffice = $this->request_model->getOfficeName($i);
				//print_r($arrOffice);
				foreach($arrOffice as $row):
					if($row['group'.$i.'Code']!='')
					{
						$arrOfficeName[$j]['groupCode']=$row['group'.$i.'Code'];
						$arrOfficeName[$j]['groupName']=$row['group'.$i.'Name'];
						$j++;
					}
				endforeach;				
			}
			$this->arrData['arrOfficeName'] = $arrOfficeName;
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			$this->arrData['arrAction'] = $this->request_model->getAction();
			$this->arrData['arrSignatory'] = $this->request_model->getSignatory();
			$this->template->load('template/template_view','libraries/request/edit_view', $this->arrData);
		}
		else
		{
			$intReqId = $arrPost['intReqId'];
			$strReqType = $arrPost['strReqType'];
			$strGenApplicant = $arrPost['strGenApplicant'];
			$strOfficeName = $arrPost['strOfficeName'];
			$strName = $arrPost['strName'];
			$str1stSigAction = $arrPost['str1stSigAction'];
			$str1stSignatory = $arrPost['str1stSignatory'];
			$str1stOfficer = $arrPost['str1stOfficer'];
			$str2ndSigAction = $arrPost['str2ndSigAction'];
			$str2ndSignatory = $arrPost['str2ndSignatory'];
			$str2ndOfficer = $arrPost['str2ndOfficer'];
			$str3rdSigAction = $arrPost['str3rdSigAction'];
			$str3rdSignatory = $arrPost['str3rdSignatory'];
			$str3rdOfficer = $arrPost['str3rdOfficer'];
			$str4thSigAction = $arrPost['str4thSigAction'];
			$str4thSignatory = $arrPost['str4thSignatory'];
			$str4thOfficer = $arrPost['str4thOfficer'];
			//print_r($arrPost);
		
			if(!empty($strReqType) && !empty($strGenApplicant) && !empty($str1stOfficer) && !empty($str4thOfficer))
			{
				$arrData = array(
						'RequestType'=>$strReqType,
						'Applicant'=>$strGenApplicant,
						// 'Applicant'=>$strOfficeName, 
						// 'Applicant'=>$strName, 
						'Signatory1'=>$str1stSigAction.' : '.$str1stSignatory.' : '.$str1stOfficer,
						'Signatory2'=>$str2ndSigAction.' : '.$str2ndSignatory.' : '.$str2ndOfficer,
						'Signatory3'=>$str3rdSigAction.' : '.$str3rdSignatory.' : '.$str3rdOfficer,
						'SignatoryFin'=>$str4thSigAction.' : '.$str4thSignatory.' : '.$str4thOfficer,
				);
				$blnReturn = $this->request_model->save($arrData, $intReqId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblrequestflow','Edited '.$strReqType.' Request',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Request signatory updated successfully.');
				}
				redirect('libraries/request');
			}
		}
	}

	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intReqId = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->request_model->getData($intReqId);
			$this->template->load('template/template_view','libraries/request/delete_view',$this->arrData);
		}
		else
		{
			$intReqId = $arrPost['intReqId'];
			//add condition for checking dependencies from other tables
			if(!empty($intReqId))
			{
				$arrRequest = $this->request_model->getData($intReqId);
				$strReqType = $arrRequest[0]['strReqType'];	
				$blnReturn = $this->request_model->delete($intReqId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblrequestflow','Deleted '.$strReqType.' Request',implode(';',$arrRequest[0]),'');
	
					$this->session->set_flashdata('strMsg','Request signatory deleted successfully.');
				}
				redirect('libraries/request');
			}
		}
		
	}
}
