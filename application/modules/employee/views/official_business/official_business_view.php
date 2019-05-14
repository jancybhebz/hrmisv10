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
            <?=form_open(base_url('employee/official_business/submit'), array('method' => 'post', 'id' => 'frmOB'))?>
            </br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Official Business :  <span class="required"> * </span></label>
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label class="mt-radio">
                                    <input type="radio" name="strOBtype" id="strOBtype" value="Official" checked> Official
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="strOBtype" id="strOBtype" value="Personal"> Personal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Request Date : <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input class="form-control form-control-inline input-medium date-picker" name="dtmOBrequestdate" id="dtmOBrequestdate" size="20" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Date From :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input class="form-control form-control-inline input-medium date-picker" name="dtmOBdatefrom" id="dtmOBdatefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Date To :  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input class="form-control form-control-inline input-medium date-picker" name="dtmOBdateto" id="dtmOBdateto" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
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
                                   <input type="text" class="form-control timepicker timepicker-default" name="dtmTimeFrom" id="dtmTimeFrom" value="12:00:00 AM"  autocomplete="off">   
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
                                   <input type="text" class="form-control timepicker timepicker-default" name="dtmTimeTo" id="dtmTimeTo" value="12:00:00 PM">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">Destination :  <span class="required"> * </span></label>
                                    <i class="fa"></i>
                                    <textarea name="strDestination" id="strDestination" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"> </textarea>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                 <label  class="control-label" class="mt-checkbox mt-checkbox-outline"> With Meal :
                                <div class="input-icon right">
                                    <input type="checkbox" value="Meal" name="strMeal" id="strMeal" />
                                    <span></span>
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                               <label class="control-label">Purpose : <span class="required"> * </span></label>
                                    <i class="fa"></i>
                                    <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"> </textarea>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                    <div class="col-sm-8 text-right">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="OB">
                            <button type="button" id="printreport" value="reportOB" class="btn blue">Print/Preview</button>
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-success"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                            <a href="<?=base_url('employee/official_business')?>"/><button type="reset" class="btn blue">Clear</button></a>
                        </div>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>

    $('#dtmBday').datepicker({dateFormat: 'yyyy-mm-dd'});

</script>

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
        var obtype=$('#strOBtype').val();
        var reqdate=$('#dtmOBrequestdate').val();
        var obdatefrom=$('#dtmOBdatefrom').val();
        var obdateto=$('#dtmOBdateto').val();
        var obtimefrom=$('#dtmTimeFrom').val();
        var obtimeto=$('#dtmTimeTo').val();
        var desti=$('#strDestination').val();
        var meal=$('#strMeal').val();
        var purpose=$('#strPurpose').val();
       // var valid=false;

        // if(request=='reportOB')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportOB&obtype="+obtype+"&reqdate="+reqdate+"&obdatefrom="+obdatefrom+"&obdateto="+obdateto+"&obtimefrom="+obtimefrom+"&obtimeto="+obtimeto+"&desti="+desti+"&meal="+meal+"&purpose="+purpose,'_blank'); //ok
    
    });
 });
</script>
