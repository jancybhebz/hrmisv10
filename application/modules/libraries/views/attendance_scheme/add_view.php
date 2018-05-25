<?php 
/** 
Purpose of file:    Add page for Attendance Scheme Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
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
            <span>Add Attendance Scheme</span>
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
                    <span class="caption-subject bold uppercase"> Add Attendance Scheme</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <form action = "<?=base_url('libraries/attendance_scheme/add')?>" method="post" id="frmAttendanceScheme">
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Scheme Type <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select name="schemetype" id="schemetype" class="form-control" onchange="showtextbox()">
                                        <option value="">Select Scheme </option>
                                        <option value="fixed">Fixed </option>
                                        <option value="sliding">Sliding </option>
                                    </select>
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
                                    <input type="text" class="form-control" name="strSchemeCode" value="<?=!empty($this->session->userdata('strSchemeCode'))?$this->session->userdata('strSchemeCode'):''?>">
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
                                    <input type="number" class="form-control" name="strSchemeName" value="<?=!empty($this->session->userdata('strSchemeName'))?$this->session->userdata('strSchemeName'):''?>">
                                </div>
                            </div>
                        </div>
                    </div>

            <form action="<?=base_url('libraries/attendance_scheme/add')?>" method="post" class="form-horizontal form-bordered">
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label ">Fixed Time-in :</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-icon">
                            <i class="fa fa-clock-o" ></i>
                            <input type="text" class="form-control timepicker timepicker-default"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label ">Time-Out From (noon) :</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-icon">
                            <i class="fa fa-clock-o" ></i>
                            <input type="text" class="form-control timepicker timepicker-default"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label ">Time-Out To (noon) :</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-icon">
                            <i class="fa fa-clock-o" ></i>
                            <input type="text" class="form-control timepicker timepicker-default"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label ">Time-In From (noon) :</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-icon">
                            <i class="fa fa-clock-o" ></i>
                            <input type="text" class="form-control timepicker timepicker-default"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label ">Time-In To (noon) :</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-icon">
                            <i class="fa fa-clock-o" ></i>
                            <input type="text" class="form-control timepicker timepicker-default"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <div class="form-group">
                            <label class="control-label ">Time Out :</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-icon">
                            <i class="fa fa-clock-o" ></i>
                            <input type="text" class="form-control timepicker timepicker-default"> </div>
                        </div>
                    </div>
                </div>
         </form>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Add</button>
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
                    strSchemeName: {
                        minlength: 1,
                        required: true,
                    },
                    strSchemeCode: {
                        minlength: 1,
                        required: true
                    },
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

<script type="text/javascript" src="<?=base_url('assets/js/validation.js')?>">
</script>