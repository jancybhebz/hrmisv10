<?php 
/** 
Purpose of file:    Edit page for Attendance Scheme Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<?=load_plugin('css', array('datetimepicker','timepicker'))?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('libraries')?>">Libraries</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Attendance Scheme</span>
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
                    <i class="icon-pencil font-dark"></i>
                    <span class="caption-subject bold uppercase"> Edit Attendance Scheme</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('libraries/attendance_scheme/edit/'.$this->uri->segment(4))?>" method="post" id="frmAttendanceScheme">
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Scheme Type<span class="required"> * </span></label>
                                <div class="input-icon right">
                                   <i class="fa"></i>
                                     <?php if($arrAttendance['schemeType'])=='Fixed') ?>
                                      <input name="strSchemeType" id="strSchemeType" type="hidden" class="form-control" value="<?=isset($arrAttendance['schemeType']) ? $arrAttendance['schemeType'] : ''?>">
                                    <?php else ?>
                                      <select name="strSchemeType" id="strSchemeType" class="form-control" onchange="showtextbox()">
                                            <option value="">Select Scheme </option>
                                            <option value=""></option>
                                            <option value="Fixed">Fixed </option>
                                            <option value="Sliding">Sliding </option>
                                        </select>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Scheme Code <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strSchemeCode" value="<?=!empty($arrAttendance[0]['schemeCode'])?$arrAttendance[0]['schemeCode']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Scheme Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strSchemeName" value="<?=!empty($arrAttendance[0]['schemeName'])?$arrAttendance[0]['schemeName']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?=!empty($arrAttendance[0]['schemeType'])=='Fixed'?>

                    <div class="row" id="FtimeIn">
                        <div class="col-sm-12">
                            <div class="form-group fixed">
                                    <label class="control-label" id="FtimeIn">Fixed Time In : <span class="required"> * </span></label>
                                <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="<?=!empty($arrAttendance[0]['amTimeinFrom'])?$arrAttendance[0]['amTimeinFrom']:'12:00:00 PM'?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row" id="FtimeOutFrom">
                            <div class="col-sm-12">
                                <div class="form-group fixed">
                                    <label class="control-label">Time-Out From (noon) :  <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" name="dtmFtimeOutFrom" id="dtmFtimeOutFrom" value="<?=!empty($arrAttendance[0]['nnTimeoutFrom'])?$arrAttendance[0]['nnTimeoutFrom']:''?>">
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row" id="FtimeOutTo">
                            <div class="col-sm-12">
                                <div class="form-group fixed">
                                    <label class="control-label">Time-Out To (noon) :  <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" name="dtmFtimeOutTo" id="dtmFtimeOutTo" value="<?=!empty($arrAttendance[0]['nnTimeoutTo'])?$arrAttendance[0]['nnTimeoutTo']:''?>"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="row" id="FtimeInFrom">
                            <div class="col-sm-12">
                                <div class="form-group fixed">
                                    <label class="control-label">Time-In From (noon) :   <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" name="dtmFtimeInFrom" id="dtmFtimeInFrom" value="<?=!empty($arrAttendance[0]['nnTimeinFrom'])?$arrAttendance[0]['nnTimeinFrom']:''?>">  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="FtimeInTo">
                            <div class="col-sm-12">
                                <div class="form-group fixed">
                                    <label class="control-label">Time-In To (noon) : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" name="dtmFtimeInTo" id="dtmFtimeInTo" value="<?=!empty($arrAttendance[0]['nnTimeinTo'])?$arrAttendance[0]['nnTimeinTo']:''?>">   
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="row" id="FtimeOut">
                            <div class="col-sm-12">
                                <div class="form-group fixed">
                                    <label class="control-label">Time Out : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" name="dtmFtimeOut" id="dtmFtimeOut" value="<?=!empty($arrAttendance[0]['pmTimeoutTo'])?$arrAttendance[0]['pmTimeoutTo']:''?>">    
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        </br>
                        <!-- Sliding -->
                        <div class="row" id="StimeInFrom">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Sliding Time In From :  <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeInFrom" id="dtmStimeInFrom" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row" id="StimeInTo">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time In To : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeInTo" id="dtmStimeInTo" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="StimeOutFromNN">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time-Out From (noon) : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeOutFromNN" id="dtmStimeOutFromNN" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="StimeOutToNN">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time-Out To (noon) :  <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeOutToNN" id="dtmStimeOutToNN" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row" id="StimeInFromNN">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time-In From (noon) :  <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeInFromNN" id="dtmStimeInFromNN" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="StimeInToNN">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time-In To (noon) : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeInToNN" id="dtmStimeInToNN" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="StimeOutFrom">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time Out From : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeOutFrom" id="dtmStimeOutFrom" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="row" id="StimeOutTo">
                            <div class="col-sm-12">
                                <div class="form-group sliding">
                                    <label class="control-label">Time Out To : <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker timepicker-default" type="hidden" name="dtmStimeOutTo" id="dtmStimeOutTo" value="12:00:00 PM"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="strCode" value="<?=isset($arrScheme[0]['schemeCode'])?$arrScheme[0]['schemeCode']:''?>">
                                <button class="btn btn-success" type="submit"><i class="icon-check"></i> Save</button>
                                <a href="<?=base_url('libraries/attendance_scheme')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

            var form2 = $('#frmAttendanceScheme');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    strSchemeType: {
                        minlength: 1,
                        required: true
                    },
                    strSchemeCode: {
                        minlength: 1,
                        required: true,
                    }
                    strSchemeName: {
                        minlength: 1,
                        required: true,
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
$(document).ready(function()
{
    $('.fixed').hide();   
    $('.sliding').hide();   
    $('#strSchemeType').on('change',function()
    {
    var scheme = $("#strSchemeType").find("option:selected").text();
     if(scheme=='Fixed')
      $('.fixed').show();
    else
      $('.sliding').hide();

}); 
</script>

<?=load_plugin('js',array('validation','datetimepicker','timepicker'));?>
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

<script type="text/javascript" src="<?=base_url('assets/js/attendance.js')?>"></script>
