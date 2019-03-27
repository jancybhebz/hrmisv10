<?php 
/** 
Purpose of file:    Edit page for Scholarship Library
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
            <span>Edit Salary Schedule</span>
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
                    <span class="caption-subject bold uppercase"> Edit Salary Schedule</span>
                </div>
                
            </div>
            <div class="portlet-body">
            <?=form_open(base_url('libraries/salary_sched/edit'), array('method' => 'post', 'id' => 'frmSalary'))?>
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Version<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    
                                     <select type="text" class="form-control" name="intVersion" value="<?=!empty($this->session->userdata('intVersion'))?$this->session->userdata('intVersion'):''?>" disabled>
                                         <option value="">Select</option>

                                        <?php foreach($arrVersion as $version)
                                        {
                                          echo '<option value="'.$version['version'].'" '.($version['version']==$arrSalarySched[0]['version']?'selected':'').'>'.$version['version'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Salary Grade Number<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <select type="text" class="form-control" name="strSG" value="<?=!empty($this->session->userdata('strSG'))?$this->session->userdata('strSG'):''?>" disabled>
                                         <option value="">Select</option>
                                         
                                        <?php foreach($arrSG as $sg)
                                        {
                                          echo '<option value="'.$sg['salaryGradeNumber'].'" '.($sg['salaryGradeNumber']==$arrSalarySched[0]['salaryGradeNumber']?'selected':'').'>'.$sg['salaryGradeNumber'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Step Number<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="intStepNum" value="<?=!empty($this->session->userdata('intStepNum'))?$this->session->userdata('intStepNum'):''?>" disabled>
                                         <option value="">Select</option>
                                        <?php foreach($arrStep as $step)
                                        {
                                          echo '<option value="'.$step['stepNumber'].'" '.($step['stepNumber']==$arrSalarySched[0]['stepNumber']?'selected':'').' >'.$step['stepNumber'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Actual Salary<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="intActualSalary"  maxlength="10" value="<?=$arrSalarySched[0]['actualSalary']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="stepNum" value="<?=$arrSalarySched[0]['stepNumber']?>">
                                <input type="hidden" name="SG" value="<?=$arrSalarySched[0]['salaryGradeNumber']?>">
                                <input type="hidden" name="ver" value="<?=$arrSalarySched[0]['version']?>">
                                <button class="btn btn-success" type="submit"><i class="icon-check"></i> Save</button>
                                <a href="<?=base_url('libraries/salary_sched')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                   <?=form_close()?>
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

            var form2 = $('#frmSalary');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    strSG: {
                        minLength: 1,
                        required: true
                    },
                    intStepNum: {
                        minLength: 1,
                        required: true
                    },
                    intActualSalary: {
                        minLength: 1,
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
