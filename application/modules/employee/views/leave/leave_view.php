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
            <?=form_open(base_url('employee/leave/submitFL'), array('method' => 'post', 'id' => 'frmLeave'))?>
                                <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label"><strong>Leave Type : </strong><span class="required"> * </span></label>
                            <i class="fa"></i>
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
            </div>

                 
             <?php  $strLeavetype = '';
                    $action = '';
            if($strLeavetype == 'forced'){  ?>
                    <?php $action = base_url('employee/pds_update/submitFL'); ?>
                <?php } else if($strLeavetype == 'special'){ ?>
                    <?php $action = base_url('employee/pds_update/submitSPL'); ?>
                <?php } else if($strLeavetype == 'sick'){ ?>
                    <?php $action = base_url('employee/pds_update/submitSL'); ?>
                <?php } else if($strLeavetype == 'vacation'){ ?>
                    <?php $action = base_url('employee/pds_update/submitVL'); ?>
                <?php } else if($strLeavetype == 'maternity'){ ?>
                    <?php $action = base_url('employee/pds_update/submitML'); ?>
                <?php } else if($strLeavetype == 'paternity'){ ?>
                    <?php $action = base_url('employee/pds_update/submitPL'); ?>
                <?php } else if($strLeavetype == 'study'){ ?>
                    <?php $action = base_url('employee/pds_update/submitSTL'); ?>
            <?php } ?>
            
            <div class="row" id="wholeday_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="input-icon left">
                           <label class="mt-radio">
                            <input type="radio" name="strDay" id="strDay" value="Whole day" checked> Whole day
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="strDay" id="strDay" value="Half day"> Half day
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="leavefrom_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Leave From : <span class="required"> * </span></label>
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmLeavefrom" id="dtmLeavefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>
             <div class="row" id="leaveto_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Leave To : <span class="required"> * </span></label>
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmLeaveto" id="dtmLeaveto" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>
             <div class="row" id="daysapplied_textbox">
                <div class="col-sm-1">
                    <div class="form-group">
                     <label class="control-label"># of Days Applied : </label>
                             <input name="intDaysApplied" id="intDaysApplied" type="number" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('intDaysApplied'))?$this->session->userdata('intDaysApplied'):''?>">
                    </div>
                </div>
            </div>
              <div class="row" id="signatory1_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Authorized Official (1st Signatory) :</label>
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
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Authorized Official (2nd Signatory) :</label>
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
                <div class="col-sm-8">
                    <div class="form-group">
                      <label class="control-label">Specify Reason/s :</label>
                             <textarea name="strReason" id="strReason" type="text" class="form-control" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>">
                             </textarea>
                    </div>
                </div>
            </div>
             <div class="row" id="incaseSL_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                      <label class="control-label">In Case of Sick Leave : </label>
                             <select name="strIncaseSL" id="strIncaseSL" type="text" class="form-control" value="<?=!empty($this->session->userdata('strIncase'))?$this->session->userdata('strIncaseSL'):''?>">
                                 <option value="">Select</option>
                                 <option value="in patient">in patient</option>
                                 <option value="out patient">out patient</option>
                             </select>
                    </div>
                </div>
            </div>
            <div class="row" id="incaseVL_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">In Case of Vacation Leave : </label>
                              <select name="strIncaseVL" id="strIncaseVL" type="text" class="form-control" value="<?=!empty($this->session->userdata('strIncaseVL'))?$this->session->userdata('strIncaseVL'):''?>">
                                 <option value="">Select</option>
                                 <option value="within the country">within the country</option>
                                 <option value="abroad">abroad</option>
                             </select>
                    </div>
                </div>
            </div>
            <br><br>
                <div class="row">
                  <div class="col-sm-8 text-right">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode1" value="Forced Leave">
                        <input class="hidden" name="strCodeSPL" value="Special Leave">
                        <button type="button" id="printreport" value="reportLeave" class="btn blue">Print/Preview</button>

                     <div class="col-sm-10 text-center">
                        <button type="submit" id="submitFL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitSPL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitSL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitVL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitML" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitPL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitSTL" class="btn btn-success">Submit</button>
                        <a href="<?=base_url('employee/leave')?>"/><button type="reset" class="btn blue">Clear</button></a>
                            
                        </div>
                   </div>
                </div>
                <?=form_close()?>
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

     $('#printreport').click(function(){
        var leavetype=$('#strLeavetype').val();
        var day=$('#strDay').val();
        var leavefrom=$('#dtmLeavefrom').val();
        var leaveto=$('#dtmLeaveto').val();
        var daysapplied=$('#intDaysApplied').val();
        var signatory=$('#str1stSignatory').val();
        var empname=$('#strEmpName2').val();
        var reason=$('#strReason').val();
        var incaseSL=$('#strIncaseSL').val();
        var incaseVL=$('#strIncaseVL').val();
       // var valid=false;

        // if(request=='reportLeave')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportLeave&leavetype="+leavetype+"&day="+day+"&leavefrom="+leavefrom+"&leaveto="+leaveto+"&daysapplied="+daysapplied+"&signatory="+signatory+"&empname="+empname+"&reason="+reason+"&incaseSL="+incaseSL+"&incaseVL="+incaseVL,'_blank'); //ok
    
    });
 });
</script>

