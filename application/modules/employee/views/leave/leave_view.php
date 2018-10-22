<?php 
/** 
Purpose of file:    Leave View
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
                        <form action="<?=base_url('employee/leave/submit')?>" method="post" id="frmLeave">
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
                            <option value=""></option>
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
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmLeavefrom" id="dtmLeavefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
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
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmLeaveto" id="dtmLeaveto" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
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
                                 <input name="intDaysApplied" id="intDaysApplied" type="number" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('intDaysApplied'))?$this->session->userdata('intDaysApplied'):''?>">
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
                                 <select name="str1stSignatory" id="str1stSignatory" type="text" class="form-control" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
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
                                <label class="control-label">Authorized Official (2nd Signatory) : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <select type="text" class="form-control" name="strEmpName2" value="<?=!empty($this->session->userdata('strEmpName2'))?$this->session->userdata('strEmpName2'):''?>" >
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
                                <label class="control-label">Specify Reason/s :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <textarea name="strReason" id="strReason" type="text" class="form-control" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>">
                                 </textarea>
                            </div>
                        </div>
                    </div>
                     <div class="row" id="incaseSL_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">In Case of Sick Leave : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <select name="strIncaseSL" id="strIncaseSL" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strIncase'))?$this->session->userdata('strIncaseSL'):''?>">
                                 <option value="">Select</option>
                                 <option value=""></option>
                                 <option value="in patient">in patient</option>
                                 <option value="out patient">out patient</option>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="incaseVL_textbox">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">In Case of Vacation Leave : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                 <select name="strIncaseVL" id="strIncaseVL" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strIncaseVL'))?$this->session->userdata('strIncaseVL'):''?>">
                                 <option value="">Select</option>
                                 <option value=""></option>
                                 <option value="within the country">within the country</option>
                                 <option value="abroad">abroad</option>
                                 </select>
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