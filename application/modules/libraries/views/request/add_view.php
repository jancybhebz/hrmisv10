<?php 
/** 
Purpose of file:    Add page for Request Signatories Library
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
            <span>Add Request Signatories</span>
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
                    <span class="caption-subject bold uppercase"> Add Request Signatories</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <form action = "<?=base_url('libraries/request/add')?>" method="post" id="frmRequest">
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Type of Request <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i><?php //print_r($arrProject)?>
                                    <select type="text" class="form-control" name="strReqType" value="<?=!empty($this->session->userdata('strReqType'))?$this->session->userdata('strReqType'):''?>" required>
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrRequestType as $type)
                                        {
                                          echo '<option value="'.$type['requestCode'].'">'.$type['requestDesc'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><strong>APPLICANT </strong> <span class="required"> * </span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="form-group">
                                <label class="control-label">General <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strGenApplicant" value="<?=!empty($this->session->userdata('strGenApplicant'))?$this->session->userdata('strGenApplicant'):''?>" required>
                                        
                                         <option value="">Select</option>
                                         <!-- <option value="ALLEMP">All Employees</option> -->
                                        <?php foreach($arrApplicant as $applicant)
                                        {
                                          echo '<option value="'.$applicant['AppliCode'].'">'.$applicant['Applicant'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Office Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <select type="text" class="form-control" name="strOfficeName" value="<?=!empty($this->session->userdata('strOfficeName'))?$this->session->userdata('strOfficeName'):''?>" required>
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrOfficeName as $office)
                                        {
                                          echo '<option value="'.$office['group1Code'].'">'.$office['group1Name'].'</option>';
                                          echo '<option value="'.$office['group2Code'].'">'.$office['group2Name'].'</option>';
                                          echo '<option value="'.$office['group3Code'].'">'.$office['group3Name'].'</option>';
                                          echo '<option value="'.$office['group4Code'].'">'.$office['group4Name'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Employee Name<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <select type="text" class="form-control" name="strName" value="<?=!empty($this->session->userdata('strName'))?$this->session->userdata('strName'):''?>" required>
                                        <option value="">Select</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=$data['surname'].', '.$data['firstname'].' '.$data['middleInitial'].' '.$data['nameExtension']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><strong>1ST SIGNATORY </strong> <span class="required"> * </span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Action <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="str1stSigAction" value="<?=!empty($this->session->userdata('str1stSigAction'))?$this->session->userdata('str1stSigAction'):''?>" required>
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrAction as $action)
                                        {
                                          echo '<option value="'.$action['ActionCode'].'">'.$action['ActionDesc'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Signatory <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                  <select type="text" class="form-control" name="str1stSignatory" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>" required>
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrSignatory as $signatory)
                                        {
                                          echo '<option value="'.$signatory['SignCode'].'">'.$signatory['Signatory'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Officer<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <select type="text" class="form-control" name="str1stOfficer" value="<?=!empty($this->session->userdata('str1stOfficer'))?$this->session->userdata('str1stOfficer'):''?>" required>
                                        <option value="">Select</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=$data['surname'].', '.$data['firstname'].' '.$data['middleInitial'].' '.$data['nameExtension']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><strong>2ND SIGNATORY </strong> <span class="required"> * </span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Action </label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="str2ndSigAction" value="<?=!empty($this->session->userdata('str2ndSigAction'))?$this->session->userdata('str2ndSigAction'):''?>" >
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrAction as $action)
                                        {
                                          echo '<option value="'.$action['ActionCode'].'">'.$action['ActionDesc'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Signatory</label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                  <select type="text" class="form-control" name="str2ndSignatory" value="<?=!empty($this->session->userdata('str2ndSignatory'))?$this->session->userdata('str2ndSignatory'):''?>" >
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrSignatory as $signatory)
                                        {
                                          echo '<option value="'.$signatory['SignCode'].'">'.$signatory['Signatory'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Officer</label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <select type="text" class="form-control" name="str2ndOfficer" value="<?=!empty($this->session->userdata('str2ndOfficer'))?$this->session->userdata('str2ndOfficer'):''?>" >
                                        <option value="">Select</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=$data['surname'].', '.$data['firstname'].' '.$data['middleInitial'].' '.$data['nameExtension']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><strong>3RD SIGNATORY </strong> <span class="required"> * </span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Action </label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="str3rdSigAction" value="<?=!empty($this->session->userdata('str3rdSigAction'))?$this->session->userdata('str3rdSigAction'):''?>" >
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrAction as $action)
                                        {
                                          echo '<option value="'.$action['ActionCode'].'">'.$action['ActionDesc'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Signatory </label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                  <select type="text" class="form-control" name="str3rdSignatory" value="<?=!empty($this->session->userdata('str3rdSignatory'))?$this->session->userdata('str3rdSignatory'):''?>" >
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrSignatory as $signatory)
                                        {
                                          echo '<option value="'.$signatory['SignCode'].'">'.$signatory['Signatory'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Officer </label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <select type="text" class="form-control" name="str3rdOfficer" value="<?=!empty($this->session->userdata('str3rdOfficer'))?$this->session->userdata('str3rdOfficer'):''?>" >
                                        <option value="">Select</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=$data['surname'].', '.$data['firstname'].' '.$data['middleInitial'].' '.$data['nameExtension']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><strong>FINAL SIGNATORY </strong> <span class="required"> * </span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Action <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="str4thSigAction" value="<?=!empty($this->session->userdata('str4thSigAction'))?$this->session->userdata('str4thSigAction'):''?>" required>
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrAction as $action)
                                        {
                                          echo '<option value="'.$action['ActionCode'].'">'.$action['ActionDesc'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Signatory <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                  <select type="text" class="form-control" name="str4thSignatory" value="<?=!empty($this->session->userdata('str4thSignatory'))?$this->session->userdata('str4thSignatory'):''?>" required>
                                        
                                         <option value="">Select</option>
                                        <?php foreach($arrSignatory as $signatory)
                                        {
                                          echo '<option value="'.$signatory['SignCode'].'">'.$signatory['Signatory'].'</option>';
            
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Officer<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <select type="text" class="form-control" name="str4thOfficer" value="<?=!empty($this->session->userdata('str4thOfficer'))?$this->session->userdata('str4thOfficer'):''?>" required>
                                        <option value="">Select</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=$data['surname'].', '.$data['firstname'].' '.$data['middleInitial'].' '.$data['nameExtension']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Add</button>
                                <a href="<?=base_url('libraries/request')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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

            var form2 = $('#frmRequest');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    strReqType: {
                        minlength: 1,
                        required: true
                    },
                    strGenApplicant: {
                        minlength: 1,
                        required: true,
                    },
                    strOfficeName: {
                        minlength: 1,
                        required: true,
                    },
                    strName: {
                        minlength: 1,
                        required: true,
                    },
                    str1stSigAction: {
                        minlength: 1,
                        required: true,
                    },
                    str1stSignatory: {
                        minlength: 1,
                        required: true,
                    },
                    str1stOfficer: {
                        minlength: 1,
                        required: true,
                    // },
                    // str2ndSigAction: {
                    //     minlength: 1,
                    //     required: true,
                    // },
                    // str2ndSignatory: {
                    //     minlength: 1,
                    //     required: true,
                    // },
                    // str2ndOfficer: {
                    //     minlength: 1,
                    //     required: true,
                    // },
                    // str3rdSigAction: {
                    //     minlength: 1,
                    //     required: true,
                    // },
                    // str3rdSignatory: {
                    //     minlength: 1,
                    //     required: true,
                    // },
                    // str3rdOfficer: {
                    //     minlength: 1,
                    //     required: true,
                    },
                    str4thSigAction: {
                        minlength: 1,
                        required: true,
                    },
                    str4thSigAction: {
                        minlength: 1,
                        required: true,
                    },
                    str4thOfficer: {
                        minlength: 1,
                        required: true,
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
