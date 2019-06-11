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
            <?=form_open(base_url('employee/official_business/submit'), array('method' => 'post', 'id' => 'frmOB', 'onsubmit' => 'return checkForBlank()'))?>
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
                                   <input class="form-control form-control-inline input-medium date-picker" name="dtmOBrequestdate" id="dtmOBrequestdate" size="20" type="text"  autocomplete="off">
                                </div>
                                <div class="input-icon left">
                                   <font color='red'> <span id="errorreq"></span></font>
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
                                <div class="input-icon left">
                                   <font color='red'> <span id="errorfrom"></span></font>
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
                                    <div class="input-icon left">
                                   <font color='red'> <span id="errorto"></span></font>
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
                                <div>
                                     <textarea class="form-control" rows="2" name="strDestination" id="strDestination" type="text" maxlength="1000" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"></textarea>
                                    </div>
                                </div>
                                     <div class="input-icon left">
                                   <font color='red'> <span id="errordesti"></span></font>
                                </div>
                            </div>
                        </div>
                    
                    <br>
                     <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                               <label class="control-label">Purpose : <span class="required"> * </span></label>
                                    <i class="fa"></i>
                                    <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"></textarea>
                                    </div>
                                     <div class="input-icon left">
                                   <font color='red'> <span id="errorpur"></span></font>
                                </div>
                            </div>
                        </div>
                    <br>
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

   
    // $('#printreport').click(function(){
    //     var dtmOBrequestdate = $("#dtmOBrequestdate").val();
    //     //alert(dtmOBrequestdate);
    //     if(dtmOBrequestdate=='')
    //       $('#printreport').enabled();
    //     else
    //       $('#printreport').disabled();
    //   });

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

        if(reqdate=='')
          $('#printreport').disabled();
        else
        
       // var valid=false;

        // if(request=='reportOB')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportOB&obtype="+obtype+"&reqdate="+reqdate+"&obdatefrom="+obdatefrom+"&obdateto="+obdateto+"&obtimefrom="+obtimefrom+"&obtimeto="+obtimeto+"&desti="+desti+"&meal="+meal+"&purpose="+purpose,'_blank'); //ok
    
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

            var form2 = $('#frmOB');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    dtmOBrequestdate: {
                        required: true,
                    },
                    dtmOBdatefrom: {
                        required: true,
                    },
                    dtmOBdateto: {
                        required: true,
                    },
                    dtmTimeFrom: {
                        required: true,
                    },
                    dtmTimeTo: {
                        required: true,
                    },
                    strDestination: {
                        required: true,
                        noSpace: true
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


<script>

function checkForBlank()
{
   var spaceCount = 0;

//     $dtmOBrequestdate= $('#dtmOBrequestdate').val();
//     $dtmOBdatefrom= $('#dtmOBdatefrom').val();
//     $dtmOBdateto= $('#dtmOBdateto').val();
    $strDestination= $('#strDestination').val();
    $strPurpose= $('#strPurpose').val();

    $('errordesti','errorpur').html('');

    if($strDestination=="")
    {
      $('#errordesti').html('This field is required!');
      return false;
    }
    else if($strDestination==0)
    {
      $('#errordesti').html('Invalid input!');
      return false;
    }
    else if($strPurpose=="")
    {
      $('#errorpur').html('This field is required!');
      return false;
    }
    else if($strPurpose==0)
    {
      $('#errorpur').html('Invalid input!');
      return false;
    }

    if($strDestination=="" && $strPurpose=="")
    {
        $('#errordesti').html('This field is required!');
        $('#errorpur').html('This field is required!');
        return false;
    }

    else
    {
      return true;
    }

}
</script>

<script>
    $(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#dtmOBrequestdate').val(today);
});
</script>