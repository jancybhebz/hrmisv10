<?php 
/** 
Purpose of file:    Leave View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Employee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Request</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Leave</span>
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
                    <span class="caption-subject bold uppercase">Leave</span>
                </div>
            </div>
                    <div class="portlet-body">
                        <form action="<?=base_url('employee/leave/add')?>" method="post" id="frmLeave">
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label"><strong>Leave Type : </strong><span class="required"> * </span></label>
                            </div>
                        </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                            <select name="strLeavetype" id="strLeavetype" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strLeavetype'))?$this->session->userdata('strLeavetype'):''?>" onchange="showtextbox()">
                            <option value="">Please select</option>
                            <option value="forced">Forced Leave</option>
                            <option value="special">Special Leave</option>
                            <option value="sick">Sick Leave</option>
                            <option value="vacation">Vacation Leave</option>
                            <option value="maternity">Maternity Leave</option>
                            <option value="paternity">Paternity Leave</option>
                            <option value="study">Study Leave</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                             <font color='red'> <span id="idnum"></span></font>
                        </div>
                    </div>
                 </div><br>
                <div class="row" id="wholeday_textbox">
                       <div class="col-sm-5 text-right">
                            <div class="form-group">
                                <input type="radio" name="strDay"
                                    <?php if (isset($strDay) && $strDay=="Whole day") echo "checked";?> value="Whole day">Whole day
                                <input type="radio" name="strDay"
                                    <?php if (isset($strDay) && $strDay=="Half day") echo "checked";?> value="Half day">Half day
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="ob1"></span></font>
                            </div>
                        </div>
                    </div><br>
                     <div class="row" id="leavefrom_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Leave From : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="dtmLeavefrom" id="dtmLeavefrom" type="date" class="form-control has-datepicker" value="<?=!empty($this->session->userdata('dtmLeavefrom'))?$this->session->userdata('dtmLeavefrom'):''?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="leavefrom"></span></font>
                            </div>
                        </div>
                    </div>
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
                    <div class="row" id="daysapplied_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label"># of Days Applied : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <input name="intDaysApplied" id="intDaysApplied" type="number" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('intDaysApplied'))?$this->session->userdata('intDaysApplied'):''?>">
                            </div>
                        </div>
                    </div>
                     <div class="row" id="signatory1_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Authorized Official (1st Signatory) : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <select name="str1stSignatory" id="str1stSignatory" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
                                    <option value="">Select</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                     <div class="row" id="signatory2_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Authorized Official (2nd Signatory) : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <select name="str2ndSignatory" id="str2ndSignatory" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('str2ndSignatory'))?$this->session->userdata('str2ndSignatory'):''?>">
                                 <option value="">Select</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="reason_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Specify Reason/s : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <textarea name="strReason" id="strReason" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>">
                                 </textarea>
                            </div>
                        </div>
                    </div>

                <br><br>
                    <div class="row">
                      <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                            <a href="<?=base_url('employee/leave')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                            <button type="print" class="btn btn-primary">Print/Preview</button>
                      </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/leave.js')?>">
