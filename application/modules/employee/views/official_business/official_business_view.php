<?php 
/** 
Purpose of file:    Official Business View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<?=load_plugin('css', array('datepicker','timepicker'))?>
<?php 
    $emp_att_scheme = emp_att_scheme($_SESSION['sessEmpNo']);
 ?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="javascript:;">Request</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Official Business</span>
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
                    <span class="caption-subject bold uppercase"> Official Business</span>
                </div>
            </div>
            <div class="portlet-body">
                <?=form_open_multipart('employee/official_business/submit', array('method' => 'post', 'id' => 'frmOB'))?>
                    <input class="hidden" name="strStatus" value="Filed Request">
                    <input class="hidden" name="strCode" value="OB">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Official Business: <span class="required"> * </span></label>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="strOBtype" id="strOBtype" value="Official" checked> Official </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="strOBtype" id="strOBtype" value="Personal"> Personal </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Request Date :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input type="text" class="form-control date-picker" name="dtmOBrequestdate" id="dtmOBrequestdate" value="<?=date('Y-m-d')?>" data-date-format="yyyy-mm-dd" autocomplete="off">   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Date From :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input type="text" class="form-control date-picker" name="dtmOBdatefrom" id="dtmOBdatefrom" value="" data-date-format="yyyy-mm-dd" autocomplete="off">   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Date To :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input type="text" class="form-control date-picker" name="dtmOBdateto" id="dtmOBdateto" value="" data-date-format="yyyy-mm-dd" autocomplete="off">   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Time From :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input type="text" class="form-control timepicker timepicker-default" name="dtmTimeFrom" id="dtmTimeFrom" value="<?=date('h:i:s A',strtotime($emp_att_scheme['amTimeinTo']))?>"  autocomplete="off">   
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Time To :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input type="text" class="form-control timepicker timepicker-default" name="dtmTimeTo" id="dtmTimeTo" value="<?=date('h:i:s A',strtotime($emp_att_scheme['pmTimeoutTo']))?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">Destination :  <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" rows="2" name="strDestination" id="strDestination" type="text" maxlength="1000" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                               <label class="control-label">Purpose : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                               <label  class="control-label" class="mt-checkbox mt-checkbox-outline"> With Meal :
                                    <input type="checkbox" value="Meal" name="strMeal" id="strMeal" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <a class='btn blue-madison' href='javascript:;'>
                                    <i class="fa fa-upload"></i> Attach File
                                    <input type="file" name ="userfile" id= "userfile" accept="application/pdf"
                                        style='left: 16px !important;width: 108px;height: 34px;position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                                        name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row"><div class="col-sm-8"><hr></div></div>
                    <div class="row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success" id="btn-request-ob">
                                <i class="icon-check"></i>
                                <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                            <a href="<?=base_url('employee/official_business')?>" class="btn blue"> <i class="icon-ban"></i> Clear</a>
                            <button type="button" id="printreport" value="reportOB" class="btn grey-cascade pull-right"><i class="icon-magnifier"></i> Print/Preview</button>
                        </div>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- begin ob form modal -->
<div id="ob-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Personnel Travel Pass</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <embed src="" id="ob-embed" frameborder="0" width="100%" height="500px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" id="ob-embed-fullview" class="btn blue btn-sm" target="_blank"> <i class="glyphicon glyphicon-resize-full"> </i> Open in New Tab</a>
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"> <i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end ob form modal -->

<?=load_plugin('js',array('form_validation','datepicker','timepicker'));?>

<script>
$(document).ready(function() {

    $('.date-picker').datepicker();
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm:ss A',
        disableFocus: true,
        showInputs: false,
        showSeconds: true,
        showMeridian: true,
        // defaultValue: '12:00:00 a'
    });

    $('#printreport').click(function(){
        var obtype      = $('#strOBtype').val();
        var reqdate     = $('#dtmOBrequestdate').val();
        var obdatefrom  = $('#dtmOBdatefrom').val();
        var obdateto    = $('#dtmOBdateto').val();
        var obtimefrom  = $('#dtmTimeFrom').val();
        var obtimeto    = $('#dtmTimeTo').val();
        var desti       = $('#strDestination').val();
        var meal        = $('#strMeal').val();
        var purpose     = $('#strPurpose').val();

        var link = "reports/generate/?rpt=reportOB&obtype="+obtype+"&reqdate="+reqdate+"&obdatefrom="+obdatefrom+"&obdateto="+obdateto+"&obtimefrom="+obtimefrom+"&obtimeto="+obtimeto+"&desti="+desti+"&meal="+meal+"&purpose="+purpose;
        $('#ob-embed').attr('src',link);
        $('#ob-embed-fullview').attr('href',link);
        $('#ob-form').modal('show');
    });

    $('.date-picker').on('changeDate', function(){
        $(this).datepicker('hide');
    });

    $('#dtmOBrequestdate').on('keyup keypress change',function() {
        check_null('#dtmOBrequestdate','Request Date must not be empty.');
    });

    $('#dtmOBdatefrom').on('keyup keypress change',function() {
        check_null('#dtmOBdatefrom','Date From must not be empty.');
    });

    $('#dtmOBdateto').on('keyup keypress change',function() {
        check_null('#dtmOBdateto','Date To must not be empty.');
    });

    $('#dtmTimeFrom').on('keyup keypress change',function() {
        check_null('#dtmTimeFrom','Time From must not be empty.');
    });

    $('#dtmTimeTo').on('keyup keypress change',function() {
        check_null('#dtmTimeTo','Time To must not be empty.');
    });

    $('#strDestination').on('keyup keypress change',function() {
        check_null('#strDestination','Destination must not be empty.');
    });

    $('#strPurpose').on('keyup keypress change',function() {
        check_null('#strPurpose','Purpose must not be empty.');
    });

    $('#btn-request-ob').click(function(e) {
        var total_error = 0;

        total_error = total_error + check_null('#dtmOBrequestdate','Request Date must not be empty.');
        total_error = total_error + check_null('#dtmOBdatefrom','Date From must not be empty.');
        total_error = total_error + check_null('#dtmOBdateto','Date To must not be empty.');
        total_error = total_error + check_null('#dtmTimeFrom','Time From must not be empty.');
        total_error = total_error + check_null('#dtmTimeTo','Time To must not be empty.');
        total_error = total_error + check_null('#strDestination','Destination must not be empty.');
        total_error = total_error + check_null('#strPurpose','Purpose must not be empty.');

        if(total_error > 0){
            e.preventDefault();
        }
    });

});
</script>