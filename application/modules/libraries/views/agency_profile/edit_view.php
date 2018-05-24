<?php 
/** 
Purpose of file:    Edit page for Agency Profile Library
 Library
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
            <span>Edit Agency Profile</span>
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
                    <span class="caption-subject bold uppercase">Edit Agency Profile</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('libraries/agency_profile/edit/'.$this->uri->segment(4))?>" method="post" id="frmAgencyProfile">
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Agency Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strAgencyName" value="<?=isset($arrAgency[0]['agencyName'])?$arrAgency[0]['agencyName']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Agency Code <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strAgencyCode" value="<?=!empty($arrAgency[0]['abbreviation'])?$arrAgency[0]['abbreviation']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Region <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strRegion" value="<?=!empty($arrAgency[0]['region'])?$arrAgency[0]['region']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">TIN Number <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intTinNum" value="<?=!empty($arrAgency[0]['agencyTin'])?$arrAgency[0]['agencyTin']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Address <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strAddress" value="<?=!empty($arrAgency[0]['address'])?$arrAgency[0]['address']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Zip Code <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intZipCode" value="<?=!empty($arrAgency[0]['zipCode'])?$arrAgency[0]['zipCode']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Telephone <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intTelephone" value="<?=!empty($arrAgency[0]['telephone'])?$arrAgency[0]['telephone']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Facsimile <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intFax" value="<?=!empty($arrAgency[0]['facsimile'])?$arrAgency[0]['facsimile']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Email <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strEmail" value="<?=!empty($arrAgency[0]['email'])?$arrAgency[0]['email']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Website <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strWebsite" value="<?=!empty($arrAgency[0]['website'])?$arrAgency[0]['website']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Salary Schedule <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strSalarySched" value="<?=!empty($arrAgency[0]['salarySchedule'])?$arrAgency[0]['salarySchedule']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">GSIS Number <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intGSISNum" value="<?=!empty($arrAgency[0]['gsisId'])?$arrAgency[0]['gsisId']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">GSIS Employee Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intGSISEmpShare" value="<?=!empty($arrAgency[0]['gsisEmpShare'])?$arrAgency[0]['gsisEmpShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">GSIS Employer Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intGSISEmprShare" value="<?=!empty($arrAgency[0]['gsisEmprShare'])?$arrAgency[0]['gsisEmprShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Pagibig Number <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPagibigNum" value="<?=!empty($arrAgency[0]['pagibigId'])?$arrAgency[0]['pagibigId']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Pagibig Employee Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPagibigEmpShare" value="<?=!empty($arrAgency[0]['pagibigEmpShare'])?$arrAgency[0]['pagibigEmpShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Pagibig Employer Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPagibigEmprShare" value="<?=!empty($arrAgency[0]['pagibigEmprShare'])?$arrAgency[0]['pagibigEmprShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Provident Employee Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intProvidentEmpShare" value="<?=!empty($arrAgency[0]['providentEmpShare'])?$arrAgency[0]['providentEmpShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Provident Employer Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intProvidentEmprShare" value="<?=!empty($arrAgency[0]['providentEmprShare'])?$arrAgency[0]['providentEmprShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Philhealth Employee Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPhilhealthEmpShare" value="<?=!empty($arrAgency[0]['philhealthEmpShare'])?$arrAgency[0]['philhealthEmpShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Philhealth Employer Share <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPhilhealthEmprShare" value="<?=!empty($arrAgency[0]['philhealthEmprShare'])?$arrAgency[0]['philhealthEmprShare']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Philhealth Percentage <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPhilhealthPercentage" value="<?=!empty($arrAgency[0]['philhealthPercentage'])?$arrAgency[0]['philhealthPercentage']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Philhealth Number <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="intPhilhealthNum" value="<?=!empty($arrAgency[0]['PhilhealthNum'])?$arrAgency[0]['PhilhealthNum']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Mission <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strMission" value="<?=!empty($arrAgency[0]['Mission'])?$arrAgency[0]['Mission']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Vision <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strVision" value="<?=!empty($arrAgency[0]['Vision'])?$arrAgency[0]['Vision']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Mandate <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strMandate" value="<?=!empty($arrAgency[0]['Mandate'])?$arrAgency[0]['Mandate']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Bank Account # <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strAccountNum" value="<?=!empty($arrAgency[0]['AccountNum'])?$arrAgency[0]['AccountNum']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="intAgencyName" value="<?=isset($arrAgency[0]['agencyName'])?$arrAgency[0]['agencyName']:''?>">
                                <button class="btn btn-success" type="submit"><i class="icon-check"></i> Save</button>
                                <a href="<?=base_url('libraries/agency_profile')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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

            var form2 = $('#frmAgencyProfile');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                     strAgencyName: {
                        minlength: 1,
                        required: true
                    },
                    strAgencyCode: {
                        minlength: 1,
                        required: true,
                    }
                    strRegion: {
                        minlength: 1,
                        required: true
                    },
                    intTinNum: {
                        minlength: 1,
                        required: true,
                    }
                    strAddress: {
                        minlength: 1,
                        required: true
                    },
                    intZipCode: {
                        minlength: 1,
                        required: true,
                    }
                    intTelephone: {
                        minlength: 1,
                        required: true
                    },
                    intFax: {
                        minlength: 1,
                        required: true,
                    }
                    strEmail: {
                        minlength: 1,
                        required: true
                    },
                    strWebsite: {
                        minlength: 1,
                        required: true,
                    }
                    strSalarySched: {
                        minlength: 1,
                        required: true
                    },
                    intGSISNum: {
                        minlength: 1,
                        required: true,
                    }
                    intGSISEmpShare: {
                        minlength: 1,
                        required: true
                    },
                    intGSISEmprShare: {
                        minlength: 1,
                        required: true,
                    }
                    intPagibigNum: {
                        minlength: 1,
                        required: true
                    },
                    intPagibigEmpShare: {
                        minlength: 1,
                        required: true
                    },
                    intPagibigEmprShare: {
                        minlength: 1,
                        required: true
                    },
                    intProvidentEmpShare: {
                        minlength: 1,
                        required: true
                    },
                    intProvidentEmprShare: {
                        minlength: 1,
                        required: true
                    },
                    intPhilhealthEmpShare: {
                        minlength: 1,
                        required: true
                    },
                    intPhilhealthEmprShare: {
                        minlength: 1,
                        required: true
                    },
                    intPhilhealthPercentage: {
                        minlength: 1,
                        required: true
                    },
                    intPhilhealthNum: {
                        minlength: 1,
                        required: true
                    },
                    strMission: {
                        minlength: 1,
                        required: true
                    },
                    strVision: {
                        minlength: 1,
                        required: true
                    },
                    strMandate: {
                        minlength: 1,
                        required: true
                    },
                    strAccountNum: {
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
