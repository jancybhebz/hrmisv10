<?php 
/** 
Purpose of file:    DTR Update View
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
            <span>DTR Update</span>
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
                    <span class="caption-subject bold uppercase">DTR Update</span>
                </div>
            </div>
            <div class="portlet-body">
            <?=form_open(base_url('employee/dtr_update/submit'), array('method' => 'post', 'id' => 'frmDTRupdate'))?>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input class="form-control form-control-inline input-medium date-picker" name="dtmDTRupdate" id="dtmDTRupdate" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="dateupdate"></span></font>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Old Morning In : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="strOldMorningIn" id="strOldMorningIn" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldMorningIn'))?$this->session->userdata('strOldMorningIn'):''?>"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Old Morning Out :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="strOldMorningOut" id="strOldMorningOut" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldMorningOut'))?$this->session->userdata('strOldMorningOut'):''?>"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Old Afternoon In : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="strOldAfternoonIn" id="strOldAfternoonIn" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldAfternoonIn'))?$this->session->userdata('strOldAfternoonIn'):''?>"> 
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Old Afternoon Out :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="strOldAfternoonOut" id="strOldAfternoonOut" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldAfternoonOut'))?$this->session->userdata('strOldAfternoonOut'):''?>"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Old Overtime In : </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="strOldOvertimeIn" id="strOldOvertimeIn" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldOvertimeIn'))?$this->session->userdata('strOldOvertimeIn'):''?>"> 
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Old Overtime Out :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="strOldOvertimeOut" id="strOldOvertimeOut" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldOvertimeOut'))?$this->session->userdata('strOldOvertimeOut'):''?>"> 
                            </div>
                        </div>
                    </div><br>

                    <!-- New TIME -->
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">New Morning Time In :</label>
                            </div>
                        </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningIn" id="dtmMorningIn" value="12:00:00 AM">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">New Morning Time Out :</label>
                            </div>
                        </div>
                         <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningOut" id="dtmMorningOut" value="12:00:00 PM">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">New Afternoon Time In :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonIn" id="dtmAfternoonIn" value="12:00:00 PM">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">New Afternoon Time Out :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonOut" id="dtmAfternoonOut" value="12:00:00 PM">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">New Overtime In :</label>
                            </div>
                        </div>
                         <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmOvertimeIn" id="dtmOvertimeIn" value="12:00:00 PM">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">New Afternoon Out :</label>
                            </div>
                        </div>
                         <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmOvertimeOut" id="dtmOvertimeOut" value="12:00:00 PM">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Reason :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <textarea name="strReason" id="strReason" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>"> </textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="reason"></span></font>
                            </div>
                        </div>
                    </div>
                    <br><br>
                     <div class="row">
                      <div class="col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                           <a href="<?=base_url('employee/dtr_update')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                           <button type="button" id="printreport" value="reportDTRupdate" class="btn btn-primary">Print/Preview</button>
                      </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

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
        var dtrupdate=$('#dtmDTRupdate').val();
        var oldmorin=$('#strOldMorningIn').val();
        var oldmorout=$('#strOldMorningOut').val();
        var oldafin=$('#strOldAfternoonIn').val();
        var oldaftout=$('#strOldAfternoonOut').val();
        var oldOTin=$('#strOldOvertimeIn').val();
        var oldOTout=$('#strOldOvertimeOut').val();
        var morningin=$('#dtmMorningIn').val();
        var morningout=$('#dtmMorningOut').val();
        var aftnoonin=$('#dtmAfternoonIn').val();
        var aftnoonout=$('#dtmAfternoonOut').val();
        var OTtimein=$('#dtmOvertimeIn').val();
        var OTtimeout=$('#dtmOvertimeOut').val();
        var reason=$('#strReason').val();

        // if(request=='reportDTRupdate')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportDTRupdate&dtrupdate="+dtrupdate+"&oldmorin="+oldmorin+"&oldmorout="+oldmorout+"&oldafin="+oldafin+"&oldaftout="+oldaftout+"&oldOTin="+oldOTin+"&oldOTout="+oldOTout+"&morningin="+morningin+"&morningout="+morningout+"&aftnoonin="+aftnoonin+"&aftnoonout="+aftnoonout+"&OTtimein="+OTtimein+"&OTtimeout="+OTtimeout+"&reason="+reason,'_blank'); //ok
    
    });
 });
</script>
   
  