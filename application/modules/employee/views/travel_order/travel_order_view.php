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
            <?=form_open(base_url('employee/travel_order/submit'), array('method' => 'post', 'id' => 'frmTO'))?>
                    
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Destination : <span class="required"> * </span></label>
                               <textarea name="strDestination" id="strDestination" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Date From : <span class="required"> * </span></label>
                              <input class="form-control form-control-inline input-medium date-picker" name="dtmTOdatefrom" id="dtmTOdatefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Date To : <span class="required"> * </span></label>
                               <input class="form-control form-control-inline input-medium date-picker" name="dtmTOdateto" id="dtmTOdateto" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Purpose : <span class="required"> * </span></label>
                               <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"></textarea>
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
                    <div class="col-sm-8 text-right">
                            <input class="hidden" name="strStatus" value="Filed Request">
                            <input class="hidden" name="strCode" value="TO">
                            <!-- <button type="button" id="printreport" value="reportTO" class="btn blue">Print/Preview</button> -->

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

<?php load_plugin('js',array('validation'));?>
<script type="text/javascript">
    jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");
var FormValidation = function () {

    // validation using icons
    var handleValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form2 = $('#frmTO');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    strDestination: {
                        required: true,
                        noSpace: true
                    },
                    dtmTOdatefrom: {
                        required: true,
                    },
                    dtmTOdateto: {
                        required: true,
                    },
                    strPurpose: {
                        required: true,
                        noSpace: true
                    }

                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    App.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                },

                submitHandler: function (form) {
                    success2.show();
                    error2.hide();
                    form[0].submit(); // submit the form
                }
            });


    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation();

        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});
</script>
