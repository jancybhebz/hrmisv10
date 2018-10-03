<?php 
/** 
Purpose of file:    PDS Update View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Employee </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Request </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>PDS Update</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">PDS Update</span>
                </div>
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('employee/pds_update/add')?>" method="post" id="frmPDSupdate">
                 <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label"><strong>Type of Profile : </strong><span class="required"> * </span></label>
                            </div>
                        </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                            <select name="strProfileType" id="strProfileType" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strProfileType'))?$this->session->userdata('strProfileType'):''?>" onchange="showtextbox()">
                                <option value="">Select Personal Data</option>
                                <option value=""></option>
                                <option value="Profile">Profile</option>
                                <option value="Family">Family Background</option>
                                <option value="Educational">Educational Attainment</option>
                                <option value="Trainings">Trainings</option>
                                <option value="Examinations">Examinations</option>
                                <option value="Children">Children</option>
                                <option value="Community">Community Tax Certification</option>
                                <option value="References">References</option>
                                <option value="Voluntary">Voluntary Works</option>
                                <option value="WorkExp">Work Experience</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                             <font color='red'> <span id="idnum"></span></font>
                        </div>
                    </div>
                 </div>
         <br><br>

<!-- Profile -->
                <div class="row" id="surname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Surname : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSname" value="<?=isset($arrData[0]['strSname'])?$arrData[0]['strSname']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="firstname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Firstname : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strFname" value="<?=isset($arrData[0]['strFname'])?$arrData[0]['strFname']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="midname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Middle Name : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strMname" value="<?=isset($arrData[0]['strMname'])?$arrData[0]['strMname']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="extension_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name Extension: <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strExtension" value="<?=isset($arrData[0]['strExtension'])?$arrData[0]['strExtension']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="bdate_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date of Birth : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="dtmBirthdate" value="<?=isset($arrData[0]['dtmBirthdate'])?$arrData[0]['dtmBirthdate']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="birthplace_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Place of Birth : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBirthplace" value="<?=isset($arrData[0]['strBirthplace'])?$arrData[0]['strBirthplace']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="cs_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Civil Status : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strCS" value="<?=isset($arrData[0]['strCS'])?$arrData[0]['strCS']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="weight_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Weight(kg) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intWeight" value="<?=isset($arrData[0]['intWeight'])?$arrData[0]['intWeight']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="height_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Height(m) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intHeight" value="<?=isset($arrData[0]['intHeight'])?$arrData[0]['intHeight']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="blood_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Blood : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBlood" value="<?=isset($arrData[0]['strBlood'])?$arrData[0]['strBlood']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="gsis_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">GSIS Policy No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intGSIS" value="<?=isset($arrData[0]['intGSIS'])?$arrData[0]['intGSIS']:''?>" >
                            </div>
                        </div>
                </div>
                <!-- Business Partner No. :   -->
                 <div class="row" id="pagibig_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">PAG-IBIG ID No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control"  name="intPagibig" value="<?=isset($arrData[0]['intPagibig'])?$arrData[0]['intPagibig']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="philhealth_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">PHILHEALTH No. :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intPhilhealth" value="<?=isset($arrData[0]['intPhilhealth'])?$arrData[0]['intPhilhealth']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="tin_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">TIN No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intTin" value="<?=isset($arrData[0]['intTin'])?$arrData[0]['intTin']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="label1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">RESIDENTIAL ADDRESS : </label>
                            </div>
                        </div>
                </div>
                <div class="row" id="block1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">House/Block/Lot No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBlk1" value="<?=isset($arrData[0]['strBlk1'])?$arrData[0]['strBlk1']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="street1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Street : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strStreet1" value="<?=isset($arrData[0]['strStreet1'])?$arrData[0]['strStreet1']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="subd1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Subdivision/Village : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strSubd1" value="<?=isset($arrData[0]['strSubd1'])?$arrData[0]['strSubd1']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="brgy1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Barangay : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBrgy1" value="<?=isset($arrData[0]['strBrgy1'])?$arrData[0]['strBrgy1']:''?>" >
                            </div>
                        </div>
                </div>
                  <div class="row" id="city1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">City/Municipality : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strCity1" value="<?=isset($arrData[0]['strCity1'])?$arrData[0]['strCity1']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="prov1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Province : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strProv1" value="<?=isset($arrData[0]['strProv1'])?$arrData[0]['strProv1']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="zip1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Zip Code : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strZipCode1" value="<?=isset($arrData[0]['strZipCode1'])?$arrData[0]['strZipCode1']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="tel1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Telephone No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strTel1" value="<?=isset($arrData[0]['strTel1'])?$arrData[0]['strTel1']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="label2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">PERMANENT ADDRESS : </label>
                            </div>
                        </div>
                </div>
                   <div class="row" id="block2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">House/Block/Lot No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBlk2" value="<?=isset($arrData[0]['strBlk2'])?$arrData[0]['strBlk2']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="street2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Street : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strStreet2" value="<?=isset($arrData[0]['strStreet2'])?$arrData[0]['strStreet2']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="subd2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Subdivision/Village : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strSubd2" value="<?=isset($arrData[0]['strSubd2'])?$arrData[0]['strSubd2']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="brgy2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Barangay : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBrgy2" value="<?=isset($arrData[0]['strBrgy2'])?$arrData[0]['strBrgy2']:''?>">
                            </div>
                        </div>
                </div>
                  <div class="row" id="city2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">City/Municipality : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strCity2" value="<?=isset($arrData[0]['strCity2'])?$arrData[0]['strCity2']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="prov2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Province : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strProv2" value="<?=isset($arrData[0]['strProv2'])?$arrData[0]['strProv2']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="zip2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Zip Code : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strZipCode2" value="<?=isset($arrData[0]['strZipCode2'])?$arrData[0]['strZipCode2']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="tel2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Telephone No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="intTel2" value="<?=isset($arrData[0]['intTel2'])?$arrData[0]['intTel2']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="email_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Email Address (if any) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <input type="text" class="form-control" name="strEmail" value="<?=isset($arrData[0]['strEmail'])?$arrData[0]['strEmail']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="cp_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Cellphone No. : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <input type="text" class="form-control" name="strCP" value="<?=isset($arrData[0]['strCP'])?$arrData[0]['strCP']:''?>">
                            </div>
                        </div>
                </div>
<!-- Family Background -->
                <div class="row" id="spouse_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">NAME OF SPOUSE : </label>
                            </div>
                        </div>
                </div>
                <div class="row" id="ssurname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Surname :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSSurname" value="<?=isset($arrFamily[0]['strSSurname'])?$arrFamily[0]['strSSurname']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="sfirstname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Firstname : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSFirstname" value="<?=isset($arrFamily[0]['strSFirstname'])?$arrFamily[0]['strSFirstname']:''?>" >
                            </div>
                        </div>
                </div>
                <div class="row" id="smidname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Middlename : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSMidname" value="<?=isset($arrFamily[0]['strSMidname'])?$arrFamily[0]['strSMidname']:''?>">
                            </div>
                        </div>
                </div>
                  <div class="row" id="spouseExt_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name Extension : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSNameExt" value="<?=isset($arrFamily[0]['strSNameExt'])?$arrFamily[0]['strSNameExt']:''?>" >
                            </div>
                        </div>
                </div>
                 <div class="row" id="occu_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Occupation  : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSOccupation" value="<?=isset($arrFamily[0]['strSOccupation'])?$arrFamily[0]['strSOccupation']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="busname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Employer/Business Name : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSBusname" value="<?=isset($arrFamily[0]['strSBusname'])?$arrFamily[0]['strSBusname']:''?>">
                            </div>
                        </div>
                </div>
                  <div class="row" id="busadd_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Business Address : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSBusadd" value="<?=isset($arrFamily[0]['strSBusadd'])?$arrFamily[0]['strSBusadd']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="tel_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Telephone No. :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strSTel" value="<?=isset($arrFamily[0]['strSTel'])?$arrFamily[0]['strSTel']:''?>">
                            </div>
                        </div>
                </div>
                <br>
                <div class="row" id="father_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">NAME OF FATHER : </label>
                            </div>
                        </div>
                </div>
                <div class="row" id="fsurname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Surname :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strFSurname" value="<?=isset($arrFamily[0]['strFSurname'])?$arrFamily[0]['strFSurname']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="ffirstname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Firstname :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strFFirstname" value="<?=isset($arrFamily[0]['strFFirstname'])?$arrFamily[0]['strFFirstname']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="fmidname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Middle name :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strFMidname" value="<?=isset($arrFamily[0]['strFMidname'])?$arrFamily[0]['strFMidname']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="fextension_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name Extension :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strFExtension" value="<?=isset($arrFamily[0]['strFExtension'])?$arrFamily[0]['strFExtension']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="mother_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">NAME OF MOTHER : </label>
                            </div>
                        </div>
                </div>
                 <div class="row" id="msurname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Surname :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strFSurname" value="<?=isset($arrFamily[0]['strFSurname'])?$arrFamily[0]['strFSurname']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="mfirstname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Firstname :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strMFirstname" value="<?=isset($arrFamily[0]['strMFirstname'])?$arrFamily[0]['strMFirstname']:''?>">
                            </div>
                        </div>
                </div>
                  <div class="row" id="mmidname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Middle name :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strMMidname" value="<?=isset($arrFamily[0]['strMMidname'])?$arrFamily[0]['strMMidname']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="paddress_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Parents Address :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strPaddress" value="<?=isset($arrFamily[0]['strPaddress'])?$arrFamily[0]['strPaddress']:''?>">
                            </div>
                        </div>
                </div>
<!-- Educational Attainment -->
<div id="tab_education" class="tab-pane" style="overflow-x:auto;">
    <form action="#">
        <b>EDUCATIONAL INFORMATION:</b><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th width="10%">Level Code</th>
                    <th width="10%">Name of School</th>
                    <th width="10%">Basic Educ./ Degree/ Course</th>
                    <th width="10%">Period of Attendance [From/To]</th>
                    <th width="10%">Highest Level/ Units Earned</th>
                    <th width="10%">Year Graduated</th>
                    <th width="10%">Scholarship/ Honors Received</th>
                    <th width="10%">Graduate</th>
                    <th width="2%">Licensed</th>
                    <th width="10%">Action</th>
                </tr>
                <?php //foreach($arrEduc as $row):?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> 
                    <a class="btn green" data-toggle="modal" href="#educ_modal"> Edit </a>
                     <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteEduc"> Delete </a>
                    </td>
                </tr>

<!-- Trainings -->
<!-- Examinations -->
<!-- Children -->
                <div class="row" id="childname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name of Children :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strChildName" value="<?=isset($arrChild[0]['strChildName'])?$arrChild[0]['strChildName']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="childbdate_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date of Birth :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="dtmChildBdate" value="<?=isset($arrChild[0]['dtmChildBdate'])?$arrChild[0]['dtmChildBdate']:''?>">
                            </div>
                        </div>
                </div>
<!-- Community Tax Certification -->
<!-- References -->
<!-- Voluntary Works -->
<!-- Work Experience -->
                    <div class="row" id="submit">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="<?=base_url('assets/js/pds_update.js')?>">