<?php 
/** 
Purpose of file:    Add page for User Account Library
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
            <span>Add User Account</span>
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
                    <span class="caption-subject bold uppercase"> Add User Account</span>
                </div>
                
            </div>
            <div class="portlet-body">
             <?=form_open(base_url('libraries/user_account/add'), array('method' => 'post', 'id' => 'frmUserAccount'))?>
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Access Level <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strAccessLevel" id="strAccessLevel" value="<?=!empty($this->session->userdata('strAccessLevel'))?$this->session->userdata('strAccessLevel'):''?>" onchange="showtextbox()" required>
                                    <option value="">Select Access Level</option>
                                    <?php foreach(userlevel() as $level):
                                            echo '<option value="'.$level['id'].'">'.strtoupper($level['desc']).' Officer</option>';
                                          endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start of HR Officer access-->
                    <div class="row" id="HR1">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="radio" name="radio1" class="icheck" checked> Assistant </label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row" id="HR2">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck" checked> Notification </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="HR3">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Attendance </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="HR4">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Libraries </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="HR5">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck" checked> 201 Section </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="HR6">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Reports </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="HR7">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Compensation </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="HR8">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="radio" name="radio1" class="icheck">HRMO (Access all sections) </label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row" id="HR9">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck" checked> all sections </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of HR Officer access-->
                    <!-- start of Finance Officer access-->
                    <div class="row" id="Finance1">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="radio" name="radio1" class="icheck" checked> Assistant </label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row" id="Finance2">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Notification </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="Finance3">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck" checked> Compensation </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="Finance4">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck" checked> Update </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="Finance5">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Reports </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1" id="Finance6">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck"> Library </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="Finance7">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label>Assigned Payroll Group </label>
                                     <select class="form-control select2 form-required" name="selpayrollGrp" placeholder="">
                                        <option value="null">SELECT</option>
                                        <?php foreach($pGroups as $pg): ?>
                                            <option value="<?=$pg['payrollGroupCode']?>" <?=$pg['payrollGroupCode'] == $arrData['payrollGroupCode'] ? 'selected' : ''?>>
                                                (<?=$pg['projectDesc']?>) <?=$pg['payrollGroupName']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="Finance8">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-icon left">
                                    <i class="fa"></i>
                                    <label><input type="radio" name="radio1" class="icheck">Finance Officer (Access all sections) </label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row" id="Finance9">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <label><input type="checkbox" name="icheck" class="icheck" checked> all sections </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of Finance Module access-->
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Employee Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strEmpName" value="<?=!empty($this->session->userdata('strEmpName'))?$this->session->userdata('strEmpName'):''?>" required>
                                        <option value="">Select Employee Name</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Username <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strUsername" value="<?=!empty($this->session->userdata('strUsername'))?$this->session->userdata('strUsername'):''?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Password <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" name="strPassword" maxlength="20" value="<?=!empty($this->session->userdata('strPassword'))?$this->session->userdata('strPassword'):''?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Add</button>
                                <a href="<?=base_url('libraries/user_account')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
               <?=form_close()?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/useraccount.js')?>">
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

            var form2 = $('#frmUserAccount');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    strAccessLevel: {
                        minlength: 1,
                        required: true
                    },
                    strEmpName: {
                        minlength: 1,
                        required: true,
                    },
                    strUsername: {
                        minlength: 1,
                        required: true
                    },
                    strPassword: {
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

<!-- 
<script type="text/javascript" 

</script> -->

<!-- <script>
$(document).ready(function()
{
  $('#HR1').hide();
  $('#strAccessLevel').on('change',function()
  {
    var access = $("#strAccessLevel").find("option:selected").text();
    //alert(state);
    if(access=='HR Officer')
      $('#HR1').show();
    else
      $('#HR1').hide();
  });

</script> 
 -->