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
            <a href="<?=base_url('home')?>">Employee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Request</a>
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
            <?=form_open(base_url('employee/travel_order/submit'), array('method' => 'post', 'id' => 'frmTO'))?>
                    
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Destination : <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <textarea name="strDestination" id="strDestination" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Date From : <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                              <input class="form-control form-control-inline input-medium date-picker" name="dtmTOdatefrom" id="dtmTOdatefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Date To : <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input class="form-control form-control-inline input-medium date-picker" name="dtmTOdateto" id="dtmTOdateto" size="16" type="text" value="" data-date-format="yyyy-mm-dd">
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
                               <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           <label  class="control-label" class="mt-checkbox mt-checkbox-outline"> With Meal :
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="checkbox" value="Meal" name="strMeal" id="strMeal" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 text-right">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="TO">
                            <button type="print" value="reportTO" class="btn blue">Print/Preview</button>

                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-success"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                            <a href="<?=base_url('employee/travel_order')?>"/><button type="reset" class="btn blue">Clear</button></a>
                        </div>
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
        var desti=$('#strDestination').val();
        var todatefrom=$('#dtmTOdatefrom').val();
        var todateto=$('#dtmTOdateto').val();
        var purpose=$('#strPurpose').val();
        var meal=$('#strMeal').val();

        // if(request=='reportTO')
        //     valid=true;
        // if(valid)
            window.open("reports/generate/?rpt=reportTO&desti="+desti+"&todatefrom="+todatefrom+"&todateto="+todateto+"&purpose="+purpose+"&meal="+meal,'_blank'); //ok
            
    });
});
</script>
