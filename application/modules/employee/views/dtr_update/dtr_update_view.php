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
            <br>
                   
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Date : <span class="required"> * </span></label>
                        <div class="input-icon left">
                              <input class="form-control form-control-inline input-medium date-picker" name="dtmDTRupdate" id="dtmDTRupdate" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">For the month of : <span class="required"> * </span></label>
                        <div class="input-icon left">
                              <input name="dtmMonthOf" id="dtmMonthOf" class="form-control" size="10" type="text" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Morning In : </label>
                        <div class="input-icon left">
                            <input name="strOldMorningIn" id="strOldMorningIn" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldMorningIn'))?$this->session->userdata('strOldMorningIn'):''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Morning Out :</label>
                        <div class="input-icon left">
                            <input name="strOldMorningOut" id="strOldMorningOut" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldMorningOut'))?$this->session->userdata('strOldMorningOut'):''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Afternoon In :</label>
                        <div class="input-icon left">
                             <input name="strOldAfternoonIn" id="strOldAfternoonIn" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldAfternoonIn'))?$this->session->userdata('strOldAfternoonIn'):''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Afternoon Out :</label>
                        <div class="input-icon left">
                              <input name="strOldAfternoonOut" id="strOldAfternoonOut" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldAfternoonOut'))?$this->session->userdata('strOldAfternoonOut'):''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Overtime In : </label>
                        <div class="input-icon left">
                              <input name="strOldOvertimeIn" id="strOldOvertimeIn" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldOvertimeIn'))?$this->session->userdata('strOldOvertimeIn'):''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Overtime Out : </label>
                        <div class="input-icon left">
                               <input name="strOldOvertimeOut" id="strOldOvertimeOut" type="text" size="20" maxlength="20" class="form-control" value="<?=!empty($this->session->userdata('strOldOvertimeOut'))?$this->session->userdata('strOldOvertimeOut'):''?>" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
                    <!-- New TIME -->
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">New Morning Time In : </label>
                        <div class="input-icon left">
                              <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningIn" id="dtmMorningIn" value="12:00:00 AM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Morning Time Out :</label>
                        <div class="input-icon left">
                               <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningOut" id="dtmMorningOut" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Afternoon Time In :</label>
                        <div class="input-icon left">
                               <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonIn" id="dtmAfternoonIn" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Afternoon Time Out :</label>
                        <div class="input-icon left">
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonOut" id="dtmAfternoonOut" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Overtime In :</label>
                        <div class="input-icon left">
                                 <input type="text" class="form-control timepicker timepicker-default" name="dtmOvertimeIn" id="dtmOvertimeIn" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Overtime Out :</label>
                        <div class="input-icon left">
                                 <input type="text" class="form-control timepicker timepicker-default" name="dtmOvertimeOut" id="dtmOvertimeOut" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Reason :</label>
                        <div class="input-icon left">
                              <textarea name="strReason" id="strReason" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Supporting Evidence :</label>
                        <div class="input-icon left">
                              <textarea name="strEvidence" id="strEvidence" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row" id="signatory1_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Authorized Official (Signatory) :</label>
                        <div class="input-icon left">
                            <select name="strSignatory" id="strSignatory" type="text" class="form-control" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
                                    <option value="">Select</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br><br>
                 <div class="row">
                  <div class="col-sm-6 text-center">
                      <button type="submit" class="btn btn-success"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                       <a href="<?=base_url('employee/dtr_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                  </div>
                  <div class="col-sm-2 text-right">
                       <button type="button" id="printreport" value="reportDTRupdate" class="btn blue">Print/Preview</button>
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
        var month=$('#dtmMonthOf').val();
        var evidence=$('#strEvidence').val();
        var signatory=$('#strSignatory').val();
        

        // if(request=='reportDTRupdate')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportDTRupdate&dtrupdate="+dtrupdate+"&oldmorin="+oldmorin+"&oldmorout="+oldmorout+"&oldafin="+oldafin+"&oldaftout="+oldaftout+"&oldOTin="+oldOTin+"&oldOTout="+oldOTout+"&morningin="+morningin+"&morningout="+morningout+"&aftnoonin="+aftnoonin+"&aftnoonout="+aftnoonout+"&OTtimein="+OTtimein+"&OTtimeout="+OTtimeout+"&month="+month+"&evidence="+evidence+"&reason="+reason+"&signatory="+signatory,'_blank'); //ok
    
    });
 });
</script>
   
  