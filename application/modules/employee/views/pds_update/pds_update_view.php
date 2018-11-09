<?php 
/** 
Purpose of file:    PDS Update View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<?=load_plugin('css', array('datepicker','timepicker'))?>

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
                <?=form_open(base_url('employee/pds_update/'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
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
            <?=form_close()?>
         <br><br>

<!-- Profile -->
        <?=form_open(base_url('employee/pds_update/submitProfile'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
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
                        <div class="row" id="submitProfile">
                            <div class="col-sm-12 text-center">
                                <input class="hidden" name="strStatus" value="Filed Request">
                                <input class="hidden" name="strCode" value="201 Profile">

                                <button type="submit" name="submitProfile" id="submitProfile" class="btn btn-primary">Submit</button>
                                <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                            </div>
                        </div>
                </div>
            </form>
<!-- Family Background -->
            <form action="<?=base_url('employee/pds_update/submitFam')?>" method="post" id="frmPDSupdate">
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
                                 <input type="text" class="form-control" name="strMSurname" value="<?=isset($arrFamily[0]['strFSurname'])?$arrFamily[0]['strFSurname']:''?>">
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
                  <div class="row" id="submitFam">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Family">

                            <button type="submit" name="submitFam" id="submitFam" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
            <?=form_close()?>
<!-- Educational Attainment -->
<div id="tab_education" class="tab-pane" style="overflow-x:auto;">
    <?=form_open(base_url('employee/pds_update/submitEduc'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
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
                <?php foreach($arrEduc as $row):?>
                <tr>
                    <td><?=$row['levelCode']?></td><!-- levelCode -->
                    <td><?=$row['schoolName']?></td><!-- schoolName -->
                    <td><?=$row['course']?></td><!-- course -->
                    <td><?=$row['schoolFromDate'].'-'.$row['schoolToDate']?></td><!-- schoolFromDate/schoolToDate -->
                    <td><?=$row['units']?></td><!-- units -->
                    <td><?=$row['schoolToDate']?></td><!-- yearGraduated -->
                    <td><?=$row['honors']?></td><!-- honors -->
                    <td><?=$row['graduated']?></td><!-- graduated -->
                    <td><?=$row['licensed']?></td><!-- licensed -->
                    <td> 
                    <a class="btn green" data-toggle="modal" href="#educ_modal"> Edit </a>
                     
                    </td>
                </tr>
                <?php endforeach;?>
            </table>

        <?=form_open(base_url('employee/pds_update/submitEduc'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
                <div class="row" id="educlevel_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Level Description :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select type="text" class="form-control" name="strLevelDesc" value="<?=!empty($this->session->userdata('strLevelDesc'))?$this->session->userdata('strLevelDesc'):''?>" required>
                                         <option value="">Select</option>
                                        <?php foreach($arrEduc_CMB as $educ)
                                        {
                                          echo '<option value="'.$educ['levelId'].'">'.$educ['levelDesc'].'</option>';
                                        }?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row" id="schoolname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">School Name :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSchName" value="<?=isset($arrEduc[0]['strSchName'])?$arrEduc[0]['strSchName']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="degree_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Basic Education/Degree/Course :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select type="text" class="form-control" name="strDegree" value="<?=!empty($this->session->userdata('strDegree'))?$this->session->userdata('strDegree'):''?>" required>
                                         <option value="">Select</option>
                                        <?php foreach($arrCourse as $course)
                                        {
                                          echo '<option value="'.$course['courseCode'].'">'.$course['courseDesc'].'</option>';
                                        }?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row" id="frmyr_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">From Year :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <?php
                                $already_selected_value = date("Y");
                                $earliest_year = 1970;

                                print '<select name="dtmFrmYr" id="dtmFrmYr" class="form-control">';
                                foreach (range(date('Y'), $earliest_year) as $x) {
                                    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
                                }
                                print '</select>'; ?>
                            </div>
                        </div>
                </div>
                <div class="row" id="yrto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">To :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                             <?php
                                $already_selected_value = date("Y");
                                $earliest_year = 1970;

                                print '<select name="dtmTo" id="dtmTo" class="form-control">';
                                foreach (range(date('Y'), $earliest_year) as $x) {
                                    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
                                }
                                print '</select>'; ?>
                            </div>
                        </div>
                </div>
                <div class="row" id="units_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Units Earned :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="intUnits" value="<?=isset($arrEduc[0]['intUnits'])?$arrEduc[0]['intUnits']:''?>"><label>* (write - if not-applicable)</label>
                            </div>
                        </div>
                </div>
                 <div class="row" id="scholarship_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Scholarship :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                  <select type="text" class="form-control" name="strScholarship" value="<?=!empty($this->session->userdata('strScholarship'))?$this->session->userdata('strScholarship'):''?>" required>
                                         <option value="">Select</option>
                                        <?php foreach($arrScholarship as $scholar)
                                        {
                                          echo '<option value="'.$scholar['id'].'">'.$scholar['description'].'</option>';
                                        }?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row" id="honors_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Honors :   </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strHonors" value="<?=isset($arrEduc[0]['strHonors'])?$arrEduc[0]['strHonors']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="licensed_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Licensed :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select type="text" class="form-control" name="strLicensed" value="<?=!empty($this->session->userdata('strLicensed'))?$this->session->userdata('strLicensed'):''?>" required>
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>    
                            </div>
                        </div>
                </div>
                 <div class="row" id="graduated_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Graudated :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select type="text" class="form-control" name="strGraduated" value="<?=!empty($this->session->userdata('strGraduated'))?$this->session->userdata('strGraduated'):''?>" required>
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>       
                            </div>
                        </div>
                </div>
                 <div class="row" id="yrgraduated_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Year Graduated :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="number" class="form-control" name="strYrGraduated" maxlength="4" value="<?=isset($arrEduc[0]['strYrGraduated'])?$arrEduc[0]['strYrGraduated']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="submitEduc">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Educ">

                            <button type="submit" name="submitEduc" id="submitEduc" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
</div>

<!-- Trainings -->
<div id="tab_training" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitTraining'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th>Title of Learning & Dev./Training Programs</th>
                    <th>Inclusive Dates of Attendance [From-To]</th>
                    <th>Number of Hours</th>
                    <th>Type of Leadership</th>
                    <th>Conducted/Sponsored By</th>
                    <th>Training Venue</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrTraining as $row):?>
                <tr>
                    <td><?=$row['trainingTitle']?></td><!-- trainingTitle -->
                    <td><?=$row['trainingStartDate'].'/'.$row['trainingEndDate']?></td><!-- trainingStartDate trainingEndDate -->
                    <td><?=$row['trainingHours']?></td><!-- trainingHours -->
                    <td><?=$row['trainingTypeofLD']?></td><!-- trainingTypeofLD -->
                    <td><?=$row['trainingConductedBy']?></td><!-- trainingConductedBy -->
                    <td><?=$row['trainingVenue']?></td><!-- trainingVenue -->
                    <td>  <a class="btn green" data-toggle="modal" href="#editTrainings_modal"> Edit </a>
                      
                </tr>
            <?php endforeach; ?>
            </table>
            <div class="row" id="traintitle_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Training Title : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strTrainTitle" value="<?=isset($arrTraining[0]['strTrainTitle'])?$arrTraining[0]['strTrainTitle']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="startdate_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Start Date : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input class="form-control form-control-inline input-medium date-picker" name="dtmStartDate" id="dtmStartDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                <div class="row" id="enddate_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">End Date : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmEndDate" id="dtmEndDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                <div class="row" id="number_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Number of Hours: </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="number" class="form-control" name="dtmHours" value="<?=isset($arrTraining[0]['dtmHours'])?$arrTraining[0]['dtmHours']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="typeLD_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Type of LD : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <select type="text" class="form-control" name="strTypeLD" value="<?=isset($arrTraining[0]['strTypeLD'])?$arrTraining[0]['strTypeLD']:''?>">
                                 <option value="">Select</option>
                                 <option value="">Managerial</option>
                                 <option value="">Supervisory</option>
                                 <option value="">Technical</option>
                                 </select>
                            </div>
                        </div>
                </div>
                 <div class="row" id="conduct_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Conducted By :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strConduct" value="<?=isset($arrTraining[0]['strConduct'])?$arrTraining[0]['strConduct']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="venue_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Venue : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strVenue" value="<?=isset($arrTraining[0]['strVenue'])?$arrTraining[0]['strVenue']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="cost_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Cost :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="intCost" value="<?=isset($arrTraining[0]['intCost'])?$arrTraining[0]['intCost']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="contract_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Contract Dates :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmContract" id="dtmContract" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                <div class="row" id="submitTraining">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Training">

                            <button type="submit" name="submitTraining" id="submitTraining" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
    </div>
<!-- Examinations -->
<div id="tab_exam" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitExam'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
            <table class="table table-bordered table-striped" class="table-responsive">
                    <tr>
                        <th width="10%">Exam Description</th>
                        <th width="10%">Rating</th>
                        <th width="10%">Date of Examination/ Conferment</th>
                        <th width="10%">Place of Examination/ Conferment</th>
                        <th width="10%">License Number</th>
                        <th width="10%">Date of Validity</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php foreach($arrExamination as $row):?>
                    <tr>
                        <td><?=$row['examCode']?></td><!-- examCode -->
                        <td><?=$row['examRating']?></td><!-- examRating -->
                        <td><?=$row['examDate']?></td><!-- examDate -->
                        <td><?=$row['examPlace']?></td><!-- examPlace -->
                        <td><?=$row['licenseNumber']?></td><!-- licenseNumber -->
                        <td><?=$row['dateRelease']?></td><!-- dateRelease -->
                        <td>  <a class="btn green" data-toggle="modal" href="#exam_modal"> Edit </a>
                    </tr>
                    <?php endforeach;?>
                </table>
                <div class="row" id="examdesc_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Exam Description :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select type="text" class="form-control" name="strExamDesc" value="<?=!empty($this->session->userdata('strExamDesc'))?$this->session->userdata('strExamDesc'):''?>" required>
                                         <option value="">Select</option>
                                        <?php foreach($arrExamination_CMB as $exam)
                                        {
                                          echo '<option value="'.$exam['examId'].'">'.$exam['examDesc'].'</option>';
                                        }?>
                                </select>
                            </div>
                        </div>
                </div>
                 <div class="row" id="rating_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Rating (%):  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strChildName" value="<?=isset($arrExam[0]['strChildName'])?$arrExam[0]['strChildName']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="examdate_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date of Exam/Conferment :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmExamDate" id="dtmExamDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                 <div class="row" id="examplace_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Place of Exam/Conferment :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strPlaceExam" value="<?=isset($arrExam[0]['strPlaceExam'])?$arrExam[0]['strPlaceExam']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="licenseNo_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">License No. (if applicable) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="intLicenseNo" value="<?=isset($arrExam[0]['intLicenseNo'])?$arrExam[0]['intLicenseNo']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="release_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date of Release : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmRelease" id="dtmRelease" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                <div class="row" id="submitExam">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Exam">

                            <button type="submit" name="submitExam" id="submitExam" class="btn btn-primary">Submit</button>
                             <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
</div>
<!-- Children -->
<?=form_open(base_url('employee/pds_update/submitChild'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
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
                              <input class="form-control form-control-inline input-medium date-picker" name="dtmChildBdate" id="dtmChildBdate" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                 <div class="row" id="submitChild">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Child">

                            <button type="submit" name="submitChild" id="submitChild" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                    </div>
            <?=form_close()?>
<!-- Community Tax Certification -->
<?=form_open(base_url('employee/pds_update/submitTax'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
                <div class="row" id="taxcert_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Tax Certificate Number :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="intTaxCert" value="<?=isset($arrCommunity[0]['intTaxCert'])?$arrCommunity[0]['intTaxCert']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="issuedAt_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Issued At :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="strIssuedAt" value="<?=isset($arrCommunity[0]['strIssuedAt'])?$arrCommunity[0]['strIssuedAt']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="issuedOn_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Issued On :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmIssuedOn" id="dtmIssuedOn" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>

                </div>
                 <div class="row" id="submitTax">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Tax">

                            <button type="submit" name="submitTax" id="submitTax" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
<!-- References -->
<div id="tab_ref" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitRef'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>
            <table class="table table-bordered table-striped" class="table-responsive">
                    <tr>
                        <th>Name of Reference</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($arrReference as $row):?>
                    <tr>
                        <td><?=$row['refName']?></td><!-- examCode -->
                        <td><?=$row['refAddress']?></td><!-- examRating -->
                        <td><?=$row['refTelephone']?></td><!-- examDate -->
                        <td>  <a class="btn green" data-toggle="modal" href="#exam_modal"> Edit </a>
                    </tr>
                    <?php endforeach;?>
                </table>
                <div class="row" id="refname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strRefName" value="<?=isset($arrRef[0]['strRefName'])?$arrRef[0]['strRefName']:''?>">
                            </div>
                        </div>
                </div>
                  <div class="row" id="refadd_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Address : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strRefAdd" value="<?=isset($arrRef[0]['strRefAdd'])?$arrRef[0]['strRefAdd']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="refcontact_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Contract Number : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intRefContact" value="<?=isset($arrRef[0]['intRefContact'])?$arrRef[0]['intRefContact']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="submitRef">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Ref">

                            <button type="submit" name="submitRef" id="submitRef" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
</div>
<!-- Voluntary Works -->
<div id="tab_volWork" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitVol'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>  
            <table class="table table-bordered table-striped" class="table-responsive">
                    <tr>
                        <th width="10%">Name of Organization</th>
                        <th width="10%">Address of Organization</th>
                        <th width="10%">Inclusive Dates [From-To]</th>
                        <th width="10%">Number of Hours</th>
                        <th width="10%">Position/Nature of work</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php foreach($arrVoluntary as $row):?>
                    <tr>
                        <td><?=$row['vwName']?></td><!-- vwName -->
                        <td><?=$row['vwAddress']?></td><!-- vwAddress -->
                        <td><?=$row['vwDateFrom'].'/'.$row['vwDateTo']?></td><!-- vwDateFrom vwDateTo -->
                        <td><?=$row['vwHours']?></td><!-- vwHours -->
                        <td><?=$row['vwPosition']?></td><!-- vwPosition -->
                        <td> <a class="btn green" data-toggle="modal" href="#editVolWorks_modal"> Edit </a></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                 <div class="row" id="volname_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name of Organization : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strVolName" value="<?=isset($arrRef[0]['strVolName'])?$arrRef[0]['strVolName']:''?>">
                            </div>
                        </div>
                </div>
                 <div class="row" id="voladd_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Address : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strVolAdd" value="<?=isset($arrRef[0]['strVolAdd'])?$arrRef[0]['strVolAdd']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="voldatefrom_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Inclusive Date From :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmVolDateFrom" id="dtmVolDateFrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                <div class="row" id="voldateto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Inclusive Date To :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmVolDateTo" id="dtmVolDateTo" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div>
                <div class="row" id="volhours_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Number of Hours :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intVolHours" value="<?=isset($arrVoluntary[0]['intVolHours'])?$arrVoluntary[0]['intVolHours']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="worknature_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Position / Nature of Work :  </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strNature" value="<?=isset($arrVoluntary[0]['strNature'])?$arrVoluntary[0]['strNature']:''?>">
                            </div>
                        </div>
                </div>
                <div class="row" id="submitVol">
                        <div class="col-sm-12 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Voluntary">

                            <button type="submit" name="submitVol" id="submitVol" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
</div>
<!-- Work Experience -->
<div id="tab_workExp" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitWorkExp'), array('method' => 'post', 'id' => 'frmPDSupdate'))?>   
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th width="10%">Inclusive Date [From-To]</th>
                    <th width="10%">Position Title</th>
                    <th width="10%">Dept./ Agency/ Office/ Company</th>
                    <th width="10%">Monthly</th>
                    <th width="10%">Salary/  Job Pay Grade</th>
                    <th width="10%">Status of Appointment</th>
                    <th width="10%">Gov. Service (Yes/No)</th>
                    <th width="10%">Action</th>
                </tr>
                <?php foreach($arrExperience as $row):?>
                <tr>
                    <td><?=$row['serviceFromDate'].'/'.$row['serviceToDate']?></td><!-- serviceFromDate serviceToDate -->
                    <td><?=$row['positionDesc']?></td><!-- positionDesc -->
                    <td><?=$row['stationAgency']?></td><!-- stationAgency -->
                    <td><?=$row['salary']?></td><!-- salary -->
                    <td><?=$row['salaryGrade']?></td><!-- salaryGrade -->
                    <td><?=$row['appointmentCode']?></td><!-- appointmentCode -->
                    <td><?=$row['governService']?></td><!-- governService -->
                    <td> <a class="btn green" data-toggle="modal" href="#workExp_modal"> Edit </a></td>
                </tr>
                <?php endforeach;?>
            </table>
            
             <div class="row" id="expdatefrom_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Inclusive Date From : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control form-control-inline input-medium date-picker" name="dtmExpDateFrom" id="dtmExpDateFrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
            </div>
             <div class="row" id="expdateto_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Inclusive Date To : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control form-control-inline input-medium date-picker" name="dtmExpDateTo" id="dtmExpDateTo" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
            </div>
             <div class="row" id="exptitle_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Position Title : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strPosTitle" value="<?=isset($arrExperience[0]['strPosTitle'])?$arrExperience[0]['strPosTitle']:''?>">
                        </div>
                    </div>
            </div>
            <div class="row" id="expdept_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Department/Agency/Office : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strExpDept" value="<?=isset($arrExperience[0]['strExpDept'])?$arrExperience[0]['strExpDept']:''?>">
                        </div>
                    </div>
            </div>
            <div class="row" id="expsalary_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Salary : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSalary" value="<?=isset($arrExperience[0]['strSalary'])?$arrExperience[0]['strSalary']:''?>">
                        </div>
                    </div>
            </div>       
            <div class="row" id="expper_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Per : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select type="text" class="form-control" name="strExpPer" value="<?=isset($arrExperience[0]['strExpPer'])?$arrExperience[0]['strExpPer']:''?>">
                            <option value="">Select</option>
                            <option value="Hour">Hour</option>
                            <option value="Day">Day</option>
                            <option value="Month">Month</option>
                            <option value="Quarter">Quarter</option>
                            <option value="Year">Year</option>
                            </select>
                        </div>
                    </div>
            </div>        
            <div class="row" id="expcurrency_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Currency : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strCurrency" value="<?=isset($arrExperience[0]['strCurrency'])?$arrExperience[0]['strCurrency']:''?>">
                            <label>(leave blank if PHP) /   (ex. USD for US dollars)</label>
                        </div>
                    </div>
            </div>        
            <div class="row" id="expsg_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Salary Grade & Step Incremet (Format "00-0") : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strExpSG" value="<?=isset($arrExperience[0]['strExpSG'])?$arrExperience[0]['strExpSG']:''?>">
                        </div>
                    </div>
            </div>    
             <div class="row" id="expstatus_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Status of Appointment :  </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select type="text" class="form-control" name="strAStatus" value="<?=!empty($this->session->userdata('strStatus'))?$this->session->userdata('strStatus'):''?>" required>
                                <option value="">Select</option>
                                <?php foreach($arrAppointment as $appoint)
                                {
                                echo '<option value="'.$appoint['appointmentId'].'">'.$appoint['appointmentDesc'].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
            </div>   
            <div class="row" id="expgov_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Government Service : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strGovn" value="<?=isset($arrExperience[0]['strGovn'])?$arrExperience[0]['strGovn']:''?>">
                        </div>
                    </div>
            </div>    
             <div class="row" id="expbranch_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Branch : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select type="text" class="form-control" name="strBranch" value="<?=!empty($this->session->userdata('strBranch'))?$this->session->userdata('strBranch'):''?>" required>
                            <option value="">Select</option>
                            <option value="Government Corp">Government Corp.</option>
                            <option value="National">National</option>
                            <option value="FGI">FGI</option>
                            </select>
                        </div>
                    </div>
            </div>       
             <div class="row" id="expsepcause_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Separation Cause : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select type="text" class="form-control" name="strSepCause" value="<?=!empty($this->session->userdata('strSepCause'))?$this->session->userdata('strSepCause'):''?>" required>
                                <option value="">Select</option>
                                <?php foreach($arrSeparation as $separation)
                                {
                                echo '<option value="'.$separation['serviceRecID'].'">'.$separation['separationCause'].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
            </div>   
             <div class="row" id="expsepdate_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">Separation Date :  </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control form-control-inline input-medium date-picker" name="strSepDate" id="strSepDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
            </div>  
             <div class="row" id="expleave_textbox">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label">L/V ABS W/O PAY : </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="strLV" value="<?=isset($arrExperience[0]['strLV'])?$arrExperience[0]['strLV']:''?>">
                        </div>
                    </div>
            </div>     

                <div class="row" id="submitWorkExp">
                    <div class="col-sm-12 text-center">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="201 WorkExp">

                        <button type="submit" name="submitWorkExp" id="submitWorkExp" class="btn btn-primary">Submit</button>
                        <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                    </div>
                </div>
        <?=form_close()?>
</div>
<!-- closing -->
                    <!-- <div class="row" id="submit">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?=base_url('assets/js/pds_update.js')?>">

<?=load_plugin('js',array('validation','datepicker'));?>
<script>
    $(document).ready(function() 
    {
        $('.date-picker').datepicker();
    });
 
</script>

<?=load_plugin('js',array('timepicker'));?>
<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({
                timeFormat: 'HH:mm:ss A',
                disableFocus: true,
                showInputs: false,
                showSeconds: true,
                showMeridian: true,
                // defaultValue: '12:00:00 a'
            });
    });
</script>
