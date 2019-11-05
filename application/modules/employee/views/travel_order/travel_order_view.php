<?php 
/** 
Purpose of file:    Travel Order View
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
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="javascript:;">Request</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Travel Order</span>
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
                    <span class="caption-subject bold uppercase">Travel Order</span>
                </div>
            </div>
            <div class="portlet-body">
                <?=form_open_multipart('employee/travel_order/submit', array('method' => 'post', 'id' => 'frmTO'))?>
                <input class="hidden" name="strStatus" value="Filed Request">
                <input class="hidden" name="strCode" value="TO">
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
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Date From :  <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input type="text" class="form-control date-picker" name="dtmTOdatefrom" id="dtmTOdatefrom" value="" data-date-format="yyyy-mm-dd" autocomplete="off">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Date To :  <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input type="text" class="form-control date-picker" name="dtmTOdateto" id="dtmTOdateto" value="" data-date-format="yyyy-mm-dd" autocomplete="off">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Purpose :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <textarea class="form-control" rows="2" name="strPurpose" id="strPurpose" type="text" maxlength="1000" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
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
                        <button type="submit" class="btn btn-success" id="btn-request-to">
                            <i class="icon-check"></i>
                            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                        <a href="<?=base_url('employee/travel_order')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
                        <button type="button" id="printreport" value="reportOB" class="btn grey-cascade pull-right"><i class="icon-magnifier"></i> Print/Preview</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<!-- begin to form modal -->
<div id="to-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Travel Order</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <embed src="" id="to-embed" frameborder="0" width="100%" height="500px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" id="to-embed-fullview" class="btn blue btn-sm" target="_blank"> <i class="glyphicon glyphicon-resize-full"> </i> Open in New Tab</a>
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"> <i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end to form modal -->

<?=load_plugin('js',array('form_validation','datepicker'));?>

<script>
$(document).ready(function() {
    $('.date-picker').datepicker();
    $('.date-picker').on('changeDate', function(){
        $(this).datepicker('hide');
    });

    $('#strDestination').on('keyup keypress change',function() {
        check_null('#strDestination','Destination must not be empty.');
    });

    $('#dtmTOdatefrom').on('keyup keypress change',function() {
        check_null('#dtmTOdatefrom','Date From must not be empty.');
    });

    $('#dtmTOdateto').on('keyup keypress change',function() {
        check_null('#dtmTOdateto','Date To must not be empty.');
    });

    $('#strPurpose').on('keyup keypress change',function() {
        check_null('#strPurpose','Purpose must not be empty.');
    });

    $('#btn-request-to').click(function(e) {
        var total_error = 0;

        total_error = total_error + check_null('#strDestination','Destination must not be empty.');
        total_error = total_error + check_null('#dtmTOdatefrom','Date From must not be empty.');
        total_error = total_error + check_null('#dtmTOdateto','Date To must not be empty.');
        total_error = total_error + check_null('#strPurpose','Purpose must not be empty.');

        if(total_error > 0){
            e.preventDefault();
        }
    });

    $('#printreport').click(function() {
        var desti       = $('#strDestination').val();
        var todatefrom  = $('#dtmTOdatefrom').val();
        var todateto    = $('#dtmTOdateto').val();
        var purpose     = $('#strPurpose').val();
        var meal        = $('#strMeal').val();

        var link = "reports/generate/?rpt=reportTO&desti="+desti+"&todatefrom="+todatefrom+"&todateto="+todateto+"&purpose="+purpose+"&meal="+meal;
        $('#to-embed').attr('src',link);
        $('#to-embed-fullview').attr('href',link);
        $('#to-form').modal('show');
        
    });
});
</script>
