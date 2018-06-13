<?php 
/** 
Purpose of file:    Edit page for Plantilla Library
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
            <span>Edit Plantilla</span>
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
                    <span class="caption-subject bold uppercase"> Edit Plantilla</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('libraries/plantilla/edit/'.$this->uri->segment(4))?>" method="post" id="frmPlantilla">
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Item Number <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strItemNumber" value="<?=!empty($arrPlantilla[0]['itemNumber'])?$arrPlantilla[0]['itemNumber']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Position <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strPosition">
                                    <option value="">Select</option>
                                    <?php foreach($arrPosition as $pos)
                                        {
                                          echo '<option value="'.$pos['positionCode'].'" '.($arrPlantilla[0]['positionDesc']==$pos['positionId']?'selected':'').'>'.$pos['positionCode'].' - '.$pos['positionDesc'].'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Salary Grade <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strPosition">
                                    <option value="">Select</option>
                                      <option value="">Select</option>
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         <option>8</option>
                                         <option>9</option>
                                         <option>10</option>
                                         <option>11</option>
                                         <option>12</option>
                                         <option>13</option>
                                         <option>14</option>
                                         <option>15</option>
                                         <option>16</option>
                                         <option>17</option>
                                         <option>18</option>
                                         <option>19</option>
                                         <option>20</option>
                                         <option>21</option>
                                         <option>22</option>
                                         <option>23</option>
                                         <option>24</option>
                                         <option>25</option>
                                         <option>26</option>
                                         <option>27</option>
                                         <option>28</option>
                                         <option>29</option>
                                         <option>30</option>
                                         <option>31</option>
                                         <option>32</option>
                                         <option>33</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                   
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Area Code <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strAreaCode" value="<?=!empty($arrPlantilla[0]['areaCode'])?$arrPlantilla[0]['areaCode']:''?>">
                                </div>
                            </div>
                        </div>
                
               
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Area Type <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="strAreaType" value="<?=!empty($arrPlantilla[0]['areaType'])?$arrPlantilla[0]['areaType']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Plantilla Group  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strPlantillaGroup">
                                    <option value="">Select</option>
                                    <?php foreach($arrPlantillaGroup as $plantilla)
                                        {
                                          echo '<option value="'.$plantilla['plantillaGroupCode'].'" '.($arrPlantilla[0]['plantillaGroupCode']==$plantilla['plantillaGroupId']?'selected':'').'>'.$plantilla['plantillaGroupName'].'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Civil Service Eligibility  <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select type="text" class="form-control" name="strCSEligibility">
                                    <option value="">Select</option>
                                     <?php foreach($arrExam as $exam)
                                        {
                                          echo '<option value="'.$exam['examId'].'" '.($arrPlantilla[0]['examCode']==$exam['examId']?'selected':'').'>'.$exam['examDesc'].'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Educational Requirements <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strEducationalReq" value="<?=!empty($arrPlantilla[0]['educational'])?$arrPlantilla[0]['educational']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Training Requirements <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strTrainingReq" value="<?=!empty($arrPlantilla[0]['training'])?$arrPlantilla[0]['training']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Experience Requirements <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type="text" class="form-control" name="strExperienceReq" value="<?=!empty($arrPlantilla[0]['experience'])?$arrPlantilla[0]['experience']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="intPlantillaId" value="<?=isset($arrPlantilla[0]['plantillaID'])?$arrPlantilla[0]['plantillaID']:''?>">
                                <button class="btn btn-success" type="submit"><i class="icon-check"></i> Save</button>
                                <a href="<?=base_url('libraries/plantilla')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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

            var form2 = $('#frmPlantilla');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    strItemNumber: {
                        minlength: 1,
                        required: true
                    },
                    strPosition: {
                        minlength: 1,
                        required: true,
                    },
                    strSG: {
                        minlength: 1,
                        required: true,
                    },
                    intAreaCode: {
                        minlength: 1,
                        required: true,
                    },
                    strAreaType: {
                        minlength: 1,
                        required: true,
                    },
                    strCSEligibility: {
                        minlength: 1,
                        required: true,
                    },
                    strPlantillaGroup: {
                        minlength: 1,
                        required: true,
                    },
                    strEducationalReq: {
                        minlength: 1,
                        required: true,
                    },
                    strTrainingReq: {
                        minlength: 1,
                        required: true,
                    },
                    strExperienceReq: {
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
