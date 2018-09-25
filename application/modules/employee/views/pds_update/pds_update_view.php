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
                            <select name="strProfileType" id="strProfileType" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strProfileType'))?$this->session->userdata('strProfileType'):''?>">
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
                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Surname : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input type="text" class="form-control" name="strSname" value="<?=!empty($this->session->userdata('strSname'))?$this->session->userdata('strSname'):''?>" required>
                            </div>
                        </div>
                </div>
                 <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Firstname : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strFname" value="<?=!empty($this->session->userdata('strFname'))?$this->session->userdata('strFname'):''?>" required>
                            </div>
                        </div>
                </div>
                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Middle Name : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strMname" value="<?=!empty($this->session->userdata('strMname'))?$this->session->userdata('strMname'):''?>" required>
                            </div>
                        </div>
                </div>
                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Name Extension: </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strNameExt" value="<?=!empty($this->session->userdata('strNameExt'))?$this->session->userdata('strNameExt'):''?>" required>
                            </div>
                        </div>
                </div>
                 <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date of Birth : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strNameExt" value="<?=!empty($this->session->userdata('strNameExt'))?$this->session->userdata('strNameExt'):''?>" required>
                            </div>
                        </div>
                </div>
                 <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Place of Birth : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBirthplace" value="<?=!empty($this->session->userdata('strBirthplace'))?$this->session->userdata('strBirthplace'):''?>" required>
                            </div>
                        </div>
                </div>
                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Civil Status : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strCS" value="<?=!empty($this->session->userdata('strCS'))?$this->session->userdata('strCS'):''?>" required>
                            </div>
                        </div>
                </div>
                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Weight(kg) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intWeight" value="<?=!empty($this->session->userdata('intWeight'))?$this->session->userdata('intWeight'):''?>" required>
                            </div>
                        </div>
                </div>
                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Height(m) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intHeight" value="<?=!empty($this->session->userdata('intHeight'))?$this->session->userdata('intHeight'):''?>" required>
                            </div>
                        </div>
                </div>
                 <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Blood : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="strBlood" value="<?=!empty($this->session->userdata('strBlood'))?$this->session->userdata('strBlood'):''?>" required>
                            </div>
                        </div>
                </div>
<!-- Family Background -->
<!-- Educational Attainment -->
<!-- Trainings -->
<!-- Examinations -->
<!-- Children -->
<!-- Community Tax Certification -->
<!-- References -->
<!-- Voluntary Works -->
<!-- Work Experience -->

                <div class="row" id="leaveto_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Leave To : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="dtmLeaveto" id="dtmLeaveto" type="date" class="form-control has-datepicker" value="<?=!empty($this->session->userdata('dtmLeaveto'))?$this->session->userdata('dtmLeaveto'):''?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="leavefrom"></span></font>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>