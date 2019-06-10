<?php 
/** 
Purpose of file:    PDS Update View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?=load_plugin('css', array('datepicker','timepicker'))?>
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
                <?=form_open(base_url('employee/pds_update/'), array('method' => 'post', 'id' => 'frmPDSupdate', 'onsubmit' => 'return checkForBlank()'))?>
                  <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           <label class="control-label"><strong>Type of Profile : </strong><span class="required"> * </span></label>
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
                </div>

            <?=form_close()?>
         <br><br>

<!-- Profile -->
        <?=form_open(base_url('employee/pds_update/submitProfile'), array('method' => 'post', 'id' => 'frmFam'))?>
                <div class="row" id="surname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Surname : <span class="required"> * </span></label>
                        <input type="text" class="form-control" name="strSname" value="<?=isset($arrData[0]['surname'])?$arrData[0]['surname']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="firstname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Firstname : <span class="required"> * </span></label>
                       <input type="text" class="form-control" name="strFname" value="<?=isset($arrData[0]['firstname'])?$arrData[0]['firstname']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="midname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Middle Name : <span class="required"> * </span></label>
                       <input type="text" class="form-control" name="strMname" value="<?=isset($arrData[0]['middlename'])?$arrData[0]['middlename']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="extension_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Name Extension: <span class="required"> * </span></label>
                       <input type="text" class="form-control" name="strExtension" value="<?=isset($arrData[0]['nameExtension'])?$arrData[0]['nameExtension']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="bdate_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Date of Birth : <span class="required"> * </span></label>
                       <input class="form-control form-control-inline input-medium date-picker" name="dtmBirthdate" id="dtmBirthdate" size="20" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?=isset($arrData[0]['birthday'])?$arrData[0]['birthday']:''?>" >
                </div>
            </div>
        </div>
        <div class="row" id="birthplace_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label">Place of Birth : <span class="required"> * </span></label>
                       <input type="text" class="form-control" name="strBirthplace" value="<?=isset($arrData[0]['birthPlace'])?$arrData[0]['birthPlace']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="cs_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Civil Status : </label>
                       <input type="text" class="form-control" name="strCS" value="<?=isset($arrData[0]['civilStatus'])?$arrData[0]['civilStatus']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="weight_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Weight(kg) : </label>
                       <input type="text" class="form-control" name="intWeight" value="<?=isset($arrData[0]['weight'])?$arrData[0]['weight']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="height_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Height(m) : </label>
                      <input type="text" class="form-control" name="intHeight" value="<?=isset($arrData[0]['height'])?$arrData[0]['height']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="blood_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Blood : </label>
                    <input type="text" class="form-control" name="strBlood" value="<?=isset($arrData[0]['bloodType'])?$arrData[0]['bloodType']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="gsis_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">GSIS Policy No. : </label>
                       <input type="text" class="form-control" name="intGSIS" value="<?=isset($arrData[0]['gsisNumber'])?$arrData[0]['gsisNumber']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
          <div class="row" id="bp_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">Business Partner No. : </label>
                       <input type="text" class="form-control"  name="strBP" value="<?=isset($arrData[0]['businessPartnerNumber'])?$arrData[0]['businessPartnerNumber']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="pagibig_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">PAG-IBIG ID No. : </label>
                       <input type="text" class="form-control"  name="intPagibig" value="<?=isset($arrData[0]['pagibigNumber'])?$arrData[0]['pagibigNumber']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="philhealth_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">PHILHEALTH No. :  </label>
                       <input type="text" class="form-control" name="intPhilhealth" value="<?=isset($arrData[0]['philHealthNumber'])?$arrData[0]['philHealthNumber']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="tin_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">TIN No. :  </label>
                       <input type="text" class="form-control" name="intTin" value="<?=isset($arrData[0]['tin'])?$arrData[0]['tin']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="label1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">RESIDENTIAL ADDRESS :  </label>
                </div>
            </div>
        </div>
        <div class="row" id="block1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">House/Block/Lot No. : </label>
                      <input type="text" class="form-control" name="strBlk1" value="<?=isset($arrData[0]['lot1'])?$arrData[0]['lot1']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="street1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                      <label class="control-label">Street : </label>
                      <input type="text" class="form-control" name="strStreet1" value="<?=isset($arrData[0]['street1'])?$arrData[0]['street1']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="subd1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">Subdivision/Village : </label>
                       <input type="text" class="form-control" name="strSubd1" value="<?=isset($arrData[0]['subdivision1'])?$arrData[0]['subdivision1']:''?>" autocomplete="off">
               </div>
            </div>
        </div>
         <div class="row" id="brgy1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">Barangay : </label>
                       <input type="text" class="form-control" name="strBrgy1" value="<?=isset($arrData[0]['barangay1'])?$arrData[0]['barangay1']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="city1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">City/Municipality : </label>
                      <input type="text" class="form-control" name="strCity1" value="<?=isset($arrData[0]['city1'])?$arrData[0]['city1']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="prov1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Province : </label>
                    <input type="text" class="form-control" name="strProv1" value="<?=isset($arrData[0]['province1'])?$arrData[0]['province1']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>   
         <div class="row" id="zip1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">Zip Code : </label>
                     <input type="text" class="form-control" name="strZipCode1" value="<?=isset($arrData[0]['zipCode1'])?$arrData[0]['zipCode1']:''?>" autocomplete="off">
                </div>
            </div>
        </div>  
         <div class="row" id="tel1_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Telephone No. : </label>
                    <input type="text" class="form-control" name="strTel1" value="<?=isset($arrData[0]['telephone1'])?$arrData[0]['telephone1']:''?>" autocomplete="off">
                </div>
            </div>
        </div>  
        <div class="row" id="label2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                      <label class="control-label">PERMANENT ADDRESS : </label>
                </div>
            </div>
        </div>
       <div class="row" id="block2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">House/Block/Lot No. : </label>
                    <input type="text" class="form-control" name="strBlk2" value="<?=isset($arrData[0]['lot2'])?$arrData[0]['lot2']:''?>"  autocomplete="off">
                </div>
            </div>
        </div> 
        <div class="row" id="street2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Street : </label>
                    <input type="text" class="form-control" name="strStreet2" value="<?=isset($arrData[0]['street2'])?$arrData[0]['street2']:''?>"" autocomplete="off">
                </div>
            </div>
        </div> 
        <div class="row" id="subd2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Subdivision/Village : </label>
                     <input type="text" class="form-control" name="strSubd2" value="<?=isset($arrData[0]['subdivision2'])?$arrData[0]['subdivision2']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
        <div class="row" id="brgy2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Barangay : </label>
                    <input type="text" class="form-control" name="strBrgy2" value="<?=isset($arrData[0]['barangay2'])?$arrData[0]['barangay2']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
         <div class="row" id="city2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">City/Municipality : </label>
                    <input type="text" class="form-control" name="strCity2" value="<?=isset($arrData[0]['city2'])?$arrData[0]['city2']:''?>" autocomplete="off">
                </div>
            </div>
        </div>  
         <div class="row" id="prov2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Province : </label>
                    <input type="text" class="form-control" name="strProv2" value="<?=isset($arrData[0]['province2'])?$arrData[0]['province2']:''?>" autocomplete="off">
                </div>
            </div>
        </div>   
         <div class="row" id="zip2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Zip Code : </label>
                    <input type="text" class="form-control" name="strZipCode2" value="<?=isset($arrData[0]['zipCode2'])?$arrData[0]['zipCode2']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
        <div class="row" id="tel2_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Telephone No.: </label>
                    <input type="text" class="form-control" name="intTel2" value="<?=isset($arrData[0]['telephone2'])?$arrData[0]['telephone2']:''?>" autocomplete="off">
                </div>
            </div>
        </div>  
        <div class="row" id="email_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Email Address (if any) : </label>
                    <input type="text" class="form-control" name="strEmail" value="<?=isset($arrData[0]['email'])?$arrData[0]['email']:''?>" autocomplete="off">
                </div>
            </div>
        </div>    
        <div class="row" id="cp_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Cellphone No. : </label>
                     <input type="text" class="form-control" name="strCP" value="<?=isset($arrData[0]['mobile'])?$arrData[0]['mobile']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
          <div class="row" id="submitProfile">
            <div class="col-sm-8">
                <div class="form-group">
                    <div class="input-icon left">
                    <input class="hidden" name="strStatus" value="Filed Request">
                    <input class="hidden" name="strCode" value="201 Profile">
                    <!-- <button type="button" id="printreport" value="reportPDSupdate" class="btn blue">Print/Preview</button> -->
                    <button type="submit" name="submitProfile" id="submitProfile" class="btn blue">Submit</button>
                    <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                </div>
            </div>
        </div> 
    </div>
 <?=form_close()?>
<!-- Family Background -->
 <?=form_open(base_url('employee/pds_update/submitFam'), array('method' => 'post', 'id' => 'frmSpouse'))?>
            
        <div class="row" id="spouse_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">NAME OF SPOUSE : </label>
                </div>
            </div>
        </div> 
        <div class="row" id="ssurname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Surname :  </label>
                      <input type="text" class="form-control" name="strSSurname" value="<?=isset($arrData[0]['spouseSurname'])?$arrData[0]['spouseSurname']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
         <div class="row" id="sfirstname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Firstname :  </label>
                       <input type="text" class="form-control" name="strSFirstname" value="<?=isset($arrData[0]['spouseFirstname'])?$arrData[0]['spouseFirstname']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
         <div class="row" id="smidname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">Middlename : </label>
                      <input type="text" class="form-control" name="strSMidname" value="<?=isset($arrData[0]['strSMidname'])?$arrData[0]['strSMidname']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
        <div class="row" id="spouseExt_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                  <label class="control-label">Name Extension : </label>
                      <input type="text" class="form-control" name="strSNameExt" value="<?=isset($arrData[0]['spousenameExtension'])?$arrData[0]['spousenameExtension']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>       
        <div class="row" id="occu_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label">Occupation  : </label>
                    <input type="text" class="form-control" name="strSOccupation" value="<?=isset($arrData[0]['spouseWork'])?$arrData[0]['spouseWork']:''?>" autocomplete="off">
                </div>
            </div>
        </div>     
         <div class="row" id="busname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label">Employer/Business Name : </label>
                    <input type="text" class="form-control" name="strSBusname" value="<?=isset($arrData[0]['spouseBusName'])?$arrData[0]['spouseBusName']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>       
         <div class="row" id="busadd_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label">Business Address : </label>
                    <input type="text" class="form-control" name="strSBusadd" value="<?=isset($arrData[0]['spouseBusAddress'])?$arrData[0]['spouseBusAddress']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>       
         <div class="row" id="tel_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Telephone No. :</label>
                      <input type="text" class="form-control" name="strSTel" value="<?=isset($arrData[0]['spouseTelephone'])?$arrData[0]['spouseTelephone']:''?>" autocomplete="off">
                </div>
            </div>
        </div>         
        <div class="row" id="father_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label">NAME OF FATHER : </label>
                </div>
            </div>
        </div>          
          <div class="row" id="fsurname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Surname :</label>
                      <input type="text" class="form-control" name="strFSurname" value="<?=isset($arrData[0]['fatherSurname'])?$arrData[0]['fatherSurname']:''?>" autocomplete="off">
                </div>
            </div>
        </div>         
         <div class="row" id="ffirstname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Firstname :</label>
                       <input type="text" class="form-control" name="strFFirstname" value="<?=isset($arrData[0]['fatherFirstname'])?$arrData[0]['fatherFirstname']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row" id="fmidname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Middle name :</label>
                       <input type="text" class="form-control" name="strFMidname" value="<?=isset($arrData[0]['fatherMiddlename'])?$arrData[0]['fatherMiddlename']:''?>"  autocomplete="off">
                </div>
            </div>
        </div>
         <div class="row" id="fextension_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Name Extension :</label>
                       <input type="text" class="form-control" name="strFExtension" value="<?=isset($arrData[0]['fathernameExtension'])?$arrData[0]['fathernameExtension']:''?>" autocomplete="off">
                </div>
            </div>
        </div>      
        <div class="row" id="mother_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">NAME OF MOTHER :</label>
                </div>
            </div>
        </div>          
        <div class="row" id="msurname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Surname :</label>
                         <input type="text" class="form-control" name="strMSurname" value="<?=isset($arrData[0]['motherSurname'])?$arrData[0]['motherSurname']:''?>" autocomplete="off">
                </div>
            </div>
        </div>         
         <div class="row" id="mfirstname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Firstname :</label>
                        <input type="text" class="form-control" name="strMFirstname" value="<?=isset($arrData[0]['motherFirstname'])?$arrData[0]['motherFirstname']:''?>" autocomplete="off">
                </div>
            </div>
        </div>       
          <div class="row" id="mmidname_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Middle name :</label>
                       <input type="text" class="form-control" name="strMMidname" value="<?=isset($arrData[0]['motherMiddlename'])?$arrData[0]['motherMiddlename']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
          <div class="row" id="paddress_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Parents Address :</label>
                        <input type="text" class="form-control" name="strPaddress" value="<?=isset($arrData[0]['parentAddress'])?$arrData[0]['parentAddress']:''?>" autocomplete="off">
                </div>
            </div>
        </div>        
          <div class="row" id="submitFam">
                <div class="col-sm-8 text-right">
                    <input class="hidden" name="strStatus" value="Filed Request">
                    <input class="hidden" name="strCode" value="201 Family">

                    <button type="submit" name="submitFam" id="submitFam" class="btn btn-success">Submit</button>
                    <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                </div>
        </div>
        <?=form_close()?>
<!-- Educational Attainment -->
<div id="tab_education" class="tab-pane" style="overflow-x:auto;">
    <?=form_open(base_url('employee/pds_update/submitEduc'), array('method' => 'post', 'id' => 'frmDegree'))?>
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

        <?=form_open(base_url('employee/pds_update/submitEduc'), array('method' => 'post', 'id' => 'frmEduc'))?>
                
        <div class="row" id="educlevel_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Level Description :</label>
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
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">School Name :  </label>
                    <input type="text" class="form-control" name="strSchName" value="<?=isset($arrEduc[0]['strSchName'])?$arrEduc[0]['strSchName']:''?>" autocomplete="off">
                </div>
            </div>
        </div> 
        <div class="row" id="degree_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Basic Education/Degree/Course :  </label>
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
            <div class="col-sm-1">
                <div class="form-group">
                    <label class="control-label">From Year :</label>
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
            <div class="col-sm-1">
                <div class="form-group">
                    <label class="control-label">To :</label>
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
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Units Earned :  </label>
                    <input type="text" class="form-control" name="intUnits" value="<?=isset($arrEduc[0]['intUnits'])?$arrEduc[0]['intUnits']:''?>" autocomplete="off"><label>* (write - if not-applicable)</label>
                </div>
            </div>
        </div>       
         <div class="row" id="scholarship_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Scholarship :  </label>
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
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Honors :  </label>

                   <input type="text" class="form-control" name="strHonors" value="<?=isset($arrEduc[0]['strHonors'])?$arrEduc[0]['strHonors']:''?>" autocomplete="off">
                </div>
            </div>
        </div>
          <div class="row" id="licensed_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                     <label class="control-label">Licensed :   </label>
                    <select type="text" class="form-control" name="strLicensed" value="<?=!empty($this->session->userdata('strLicensed'))?$this->session->userdata('strLicensed'):''?>" required>
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                    </select>    
                </div>
            </div>
        </div>
         <div class="row" id="graduated_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Graudated :   </label>

                    <select type="text" class="form-control" name="strGraduated" value="<?=!empty($this->session->userdata('strGraduated'))?$this->session->userdata('strGraduated'):''?>" required>
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                    </select>      
                </div>
            </div>
        </div>      
        <div class="row" id="yrgraduated_textbox">
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label">Year Graduated :   </label>
                   <input type="number" class="form-control" name="strYrGraduated" maxlength="4" value="<?=isset($arrEduc[0]['strYrGraduated'])?$arrEduc[0]['strYrGraduated']:''?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="row" id="submitEduc">
                    <div class="col-sm-8 text-center">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="201 Educ">

                        <button type="submit" name="submitEduc" id="submitEduc" class="btn btn-success">Submit</button>
                        <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                    </div>
        </div>
        <?=form_close()?>
</div>

<!-- Trainings -->
<div id="tab_training" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitTraining'), array('method' => 'post', 'id' => 'frmTraining'))?>
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
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Training Title : </label>
                        <input type="text" class="form-control" name="strTrainTitle" value="<?=isset($arrTraining[0]['strTrainTitle'])?$arrTraining[0]['strTrainTitle']:''?>" autocomplete="off">
                     </div>
                </div>
            </div>
            <div class="row" id="startdate_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Start Date : </label>
                         <input class="form-control form-control-inline input-medium date-picker" name="dtmStartDate" id="dtmStartDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="enddate_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">End Date : </label>
                         <input class="form-control form-control-inline input-medium date-picker" name="dtmEndDate" id="dtmEndDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd"  autocomplete="off">
                    </div>
                </div>
            </div>
             <div class="row" id="number_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Number of Hours : </label>
                          <input type="number" class="form-control" name="dtmHours" value="<?=isset($arrTraining[0]['dtmHours'])?$arrTraining[0]['dtmHours']:''?>"  autocomplete="off">
                     </div>
                </div>
            </div>   
              <div class="row" id="typeLD_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Type of LD : </label>
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
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Conducted By : </label>
                        <input type="text" class="form-control" name="strConduct" value="<?=isset($arrTraining[0]['strConduct'])?$arrTraining[0]['strConduct']:''?>" autocomplete="off">
                    </div>
                </div>
            </div>      
             <div class="row" id="venue_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Venue : </label>
                        <input type="text" class="form-control" name="strVenue" value="<?=isset($arrTraining[0]['strVenue'])?$arrTraining[0]['strVenue']:''?>" autocomplete="off">
                    </div>
                </div>
            </div> 
            <div class="row" id="cost_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Cost : </label>
                         <input type="text" class="form-control" name="intCost" value="<?=isset($arrTraining[0]['intCost'])?$arrTraining[0]['intCost']:''?>" autocomplete="off">
                    </div>
                </div>
            </div>    
            <div class="row" id="contract_textbox">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Contract Dates : </label>
                          <input class="form-control form-control-inline input-medium date-picker" name="dtmContract" id="dtmContract" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>  
            <div class="row" id="submitTraining">
                        <div class="col-sm-8   text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Training">

                            <button type="submit" name="submitTraining" id="submitTraining" class="btn btn-success">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                        </div>
                </div>
        
        <?=form_close()?>
    </div>
<!-- Examinations -->
<div id="tab_exam" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitExam'), array('method' => 'post', 'id' => 'frmExam'))?>
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
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Exam Description :  </label>
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
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Rating (%):  </label>
                         <input type="text" class="form-control" name="strChildName" value="<?=isset($arrExam[0]['strChildName'])?$arrExam[0]['strChildName']:''?>"  autocomplete="off">
                    </div>
                </div>
            </div> 
             <div class="row" id="examdate_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Date of Exam/Conferment :  </label>
                        <input class="form-control form-control-inline input-medium date-picker" name="dtmExamDate" id="dtmExamDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd"  autocomplete="off">
                    </div>
                </div>
            </div> 
            <div class="row" id="examplace_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Place of Exam/Conferment :  </label>
                        <input type="text" class="form-control" name="strPlaceExam" value="<?=isset($arrExam[0]['strPlaceExam'])?$arrExam[0]['strPlaceExam']:''?>"  autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="licenseNo_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                         <label class="control-label">License No. (if applicable) : </label>
                         <input type="text" class="form-control" name="intLicenseNo" value="<?=isset($arrExam[0]['intLicenseNo'])?$arrExam[0]['intLicenseNo']:''?>"  autocomplete="off">
                    </div>
                </div>
            </div>
             <div class="row" id="release_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                         <label class="control-label">Date of Release : </label>
                        <input class="form-control form-control-inline input-medium date-picker" name="dtmRelease" id="dtmRelease" size="16" type="text" value="" data-date-format="yyyy-mm-dd"  autocomplete="off">
                    </div>
                </div>
            </div>   
                <div class="row" id="submitExam">
                    <div class="col-sm-8 text-center">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="201 Exam">

                        <button type="submit" name="submitExam" id="submitExam" class="btn btn-success">Submit</button>
                         <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                    </div>
                </div>
        <?=form_close()?>
</div>
<!-- Children -->
<?=form_open(base_url('employee/pds_update/submitChild'), array('method' => 'post', 'id' => 'frmChild'))?>
            <div class="row" id="childname_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Name of Children :  </label>
                         <input type="text" class="form-control" name="strChildName" value="<?=isset($arrChild[0]['strChildName'])?$arrChild[0]['strChildName']:''?>"  autocomplete="off">
                     </div>
                </div>
            </div> 
            <div class="row" id="childbdate_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Date of Birth :  </label>
                          <input class="form-control form-control-inline input-medium date-picker" name="dtmChildBdate" id="dtmChildBdate" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div> 
             <div class="row" id="submitChild">
                        <div class="col-sm-8 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Child">

                            <button type="submit" name="submitChild" id="submitChild" class="btn btn-success">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                        </div>
                    </div>
            <?=form_close()?>
<!-- Community Tax Certification -->
<?=form_open(base_url('employee/pds_update/submitTax'), array('method' => 'post', 'id' => 'frmTax'))?>
            <div class="row" id="taxcert_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Tax Certificate Number :  </label>
                        <input type="text" class="form-control" name="intTaxCert" value="<?=isset($arrCommunity[0]['intTaxCert'])?$arrCommunity[0]['intTaxCert']:''?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="issuedAt_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Issued At :  </label> 
                        <input type="text" class="form-control" name="strIssuedAt" value="<?=isset($arrCommunity[0]['strIssuedAt'])?$arrCommunity[0]['strIssuedAt']:''?>" autocomplete="off">
                    </div>
                </div>
            </div>
              <div class="row" id="issuedOn_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Issued On :  </label>
                       <input class="form-control form-control-inline input-medium date-picker" name="dtmIssuedOn" id="dtmIssuedOn" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>
                 
             <div class="row" id="submitTax">
                    <div class="col-sm-8 text-center">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="201 Tax">

                        <button type="submit" name="submitTax" id="submitTax" class="btn btn-success">Submit</button>
                        <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                    </div>
            </div>
        <?=form_close()?>
<!-- References -->
<div id="tab_ref" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitRef'), array('method' => 'post', 'id' => 'frmRef'))?>
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
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Name :  </label>
                            <input type="text" class="form-control" name="strRefName" value="<?=isset($arrRef[0]['strRefName'])?$arrRef[0]['strRefName']:''?>"  autocomplete="off">
                        </div>
                    </div>
                </div>
                 <div class="row" id="refadd_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Address :  </label>
                            <input type="text" class="form-control" name="strRefAdd" value="<?=isset($arrRef[0]['strRefAdd'])?$arrRef[0]['strRefAdd']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                 <div class="row" id="refcontact_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Contract Number :  </label>
                            <input type="text" class="form-control" name="intRefContact" value="<?=isset($arrRef[0]['intRefContact'])?$arrRef[0]['intRefContact']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                 <div class="row" id="refcontact_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Contract Number :  </label>
                            <input type="text" class="form-control" name="intRefContact" value="<?=isset($arrRef[0]['intRefContact'])?$arrRef[0]['intRefContact']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row" id="submitRef">
                        <div class="col-sm-8 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Ref">

                            <button type="submit" name="submitRef" id="submitRef" class="btn btn-success">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
</div>
<!-- Voluntary Works -->
<div id="tab_volWork" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitVol'), array('method' => 'post', 'id' => 'frmOrg'))?>  
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
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Name of Organization : </label>
                            <input type="text" class="form-control" name="strVolName" value="<?=isset($arrRef[0]['strVolName'])?$arrRef[0]['strVolName']:''?>"  autocomplete="off">
                        </div>
                    </div>
                </div>
                  <div class="row" id="voladd_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Address : </label>
                            <input type="text" class="form-control" name="strVolAdd" value="<?=isset($arrRef[0]['strVolAdd'])?$arrRef[0]['strVolAdd']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                  <div class="row" id="voldatefrom_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Inclusive Date From :  </label>
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmVolDateFrom" id="dtmVolDateFrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>
                </div>
                 <div class="row" id="voldateto_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Inclusive Date To :  </label>
                                 <input class="form-control form-control-inline input-medium date-picker" name="dtmVolDateTo" id="dtmVolDateTo" size="16" type="text" value="" data-date-format="yyyy-mm-dd"  autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row" id="volhours_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                             <label class="control-label">Number of Hours :  </label>
                               <input type="text" class="form-control" name="intVolHours" value="<?=isset($arrVoluntary[0]['intVolHours'])?$arrVoluntary[0]['intVolHours']:''?>" autocomplete="off">
                          </div>
                    </div>
                </div>
                 <div class="row" id="worknature_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Position / Nature of Work :  </label>
                            <input type="text" class="form-control" name="strNature" value="<?=isset($arrVoluntary[0]['strNature'])?$arrVoluntary[0]['strNature']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row" id="submitVol">
                        <div class="col-sm-8 text-center">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="201 Voluntary">

                            <button type="submit" name="submitVol" id="submitVol" class="btn btn-success">Submit</button>
                            <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                        </div>
                </div>
        <?=form_close()?>
</div>
<!-- Work Experience -->
<div id="tab_workExp" class="tab-pane">
<?=form_open(base_url('employee/pds_update/submitWorkExp'), array('method' => 'post', 'id' => 'frmWorkExp'))?>   
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
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Inclusive Date From : </label>
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmExpDateFrom" id="dtmExpDateFrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>  
            <div class="row" id="expdateto_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Inclusive Date To : </label>
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmExpDateTo" id="dtmExpDateTo" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
             </div>
             <div class="row" id="exptitle_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                             <label class="control-label">Position Title : </label>
                              <input type="text" class="form-control" name="strPosTitle" value="<?=isset($arrExperience[0]['strPosTitle'])?$arrExperience[0]['strPosTitle']:''?>" autocomplete="off">
                    </div>
                </div>
             </div>
             <div class="row" id="expdept_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                             <label class="control-label">Department/Agency/Office : </label>
                             <input type="text" class="form-control" name="strExpDept" value="<?=isset($arrExperience[0]['strExpDept'])?$arrExperience[0]['strExpDept']:''?>" autocomplete="off">
                    </div>
                </div>
             </div>
             <div class="row" id="expdept_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Salary : </label>
                            <input type="text" class="form-control" name="strSalary" value="<?=isset($arrExperience[0]['strSalary'])?$arrExperience[0]['strSalary']:''?>" autocomplete="off">
                    </div>
                </div>
             </div>
            <div class="row" id="expper_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Per : </label>
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
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Currency : </label>
                            <input type="text" class="form-control" name="strCurrency" value="<?=isset($arrExperience[0]['strCurrency'])?$arrExperience[0]['strCurrency']:''?>">
                            <label>(leave blank if PHP) /   (ex. USD for US dollars)</label>
                    </div>
                </div>
             </div>
            <div class="row" id="expsg_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Salary Grade & Step Incremet (Format "00-0") : </label>
                             <input type="text" class="form-control" name="strExpSG" value="<?=isset($arrExperience[0]['strExpSG'])?$arrExperience[0]['strExpSG']:''?>" autocomplete="off">
                    </div>
                </div>
             </div>   
             <div class="row" id="expstatus_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Status of Appointment :  </label>
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
                <div class="col-sm-8">
                    <div class="form-group">
                            <label class="control-label">Government Service : </label>
                           <input type="text" class="form-control" name="strGovn" value="<?=isset($arrExperience[0]['strGovn'])?$arrExperience[0]['strGovn']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div> 
            <div class="row" id="expbranch_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                           <label class="control-label">Branch : </label>
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
                <div class="col-sm-8">
                    <div class="form-group">
                           <label class="control-label">Separation Cause : </label>
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
                <div class="col-sm-8">
                    <div class="form-group">
                           <label class="control-label">Separation Date :  </label>
                            <input class="form-control form-control-inline input-medium date-picker" name="strSepDate" id="strSepDate" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>
                </div> 
             <div class="row" id="expleave_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                           <label class="control-label">L/V ABS W/O PAY :  </label>
                            <input type="text" class="form-control" name="strLV" value="<?=isset($arrExperience[0]['strLV'])?$arrExperience[0]['strLV']:''?>" autocomplete="off">
                        </div>
                    </div>
                </div> 
                <div class="row" id="submitWorkExp">
                    <div class="col-sm-8 text-center">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="201 WorkExp">

                        <button type="submit" name="submitWorkExp" id="submitWorkExp" class="btn btn-success">Submit</button>
                        <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
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

        $('#printreport').click(function(){
        var profile=$('#strProfileType').val();
        var surname=$('#strSname').val();
        // var obdatefrom=$('#dtmOBdatefrom').val();
        // var obdateto=$('#dtmOBdateto').val();
        // var obtimefrom=$('#dtmTimeFrom').val();
        // var obtimeto=$('#dtmTimeTo').val();
        // var desti=$('#strDestination').val();
        // var meal=$('#strMeal').val();
        // var purpose=$('#strPurpose').val();
       // var valid=false;

        // if(request=='reportOB')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportPDSupdate&profile="+profile+"&surname="+surname,'_blank'); //ok
    
    });
});
</script>
