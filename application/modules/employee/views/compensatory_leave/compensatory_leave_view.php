<?php 
/** 
Purpose of file:    Compensaroy Leave View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<?=load_plugin('css', array('datepicker','timepicker','select','select2'))?>
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
            <span>Compensatory Time off</span>
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
                    <span class="caption-subject bold uppercase">Compensatory Time off</span>
                </div>
            </div>
            <div class="portlet-body">
            <?=form_open(base_url('employee/compensatory_leave/submit'), array('method' => 'post', 'id' => 'frmCompensatoryLeave', 'onsubmit' => 'return checkForBlank()'))?>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Date : <span class="required"> * </span></label>
                        <div class="input-icon right">
                                <i class="fa"></i>
                              <input class="form-control form-control-inline input-medium date-picker" name="dtmComLeave" id="dtmComLeave" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                          <!-- <font color='red'> <span id="errordate"></span></font> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Offset balance:</label> 
                             <?php echo $arrLB[0]['off_bal']; ?>
                    </div>
                </div>
            </div>  
            <br>  
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Morning Time In :</label>
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningIn" id="dtmMorningIn" value="12:00:00" autocomplete="off">
                    </div>
                </div>
            </div>      
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Morning Time Out :</label>
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningOut" id="dtmMorningOut" value="12:00:00" autocomplete="off">
                    </div>
                </div>
            </div>  
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Afternoon Time In :</label>
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonIn" id="dtmAfternoonIn" value="12:00:00 PM" autocomplete="off">
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Afternoon Time Out :</label>
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonOut" id="dtmAfternoonOut" value="12:00:00 PM" autocomplete="off">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Purpose/Target Deliverables :</label>
                            <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"></textarea>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">Recommending Approval : </label>
                             <select name="strRecommend" id="strRecommend" type="text" class="form-control select2 form-required" value="<?=!empty($this->session->userdata('strRecommend'))?$this->session->userdata('strRecommend'):''?>">
                                    <option value="">-- SELECT --</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                            </select>
                    </div>
                </div>
            </div>      
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">Approval / Disapproval : </label>
                             <select name="strApproval" id="strApproval" type="text" class="form-control select2 form-required" value="<?=!empty($this->session->userdata('strApproval'))?$this->session->userdata('strApproval'):''?>">
                                    <option value="">-- SELECT --</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                </select>
                    </div>
                </div>
            </div>    
            <br><br>
            <div class="row">
                    <div class="col-sm-8 text-right">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="CL">
                        <button type="button" id="printreport" value="reportCL" class="btn blue">Print/Preview</button>
                    <div class="col-sm-8 text-center">
                        <button type="submit" class="btn btn-success"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                        <a href="<?=base_url('employee/compensatory_leave')?>"/><button type="reset" class="btn blue">Clear</button></a>
                  </div>
                </div>
            </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js',array('validation','datepicker','select','select2'));?>
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
        var comleave=$('#dtmComLeave').val();
        var oldmorin=$('#dtmOldMorningIn').val();
        var oldmorout=$('#dtmOldMorningOut').val();
        var oldafin=$('#dtmOldAfternoonIn').val();
        var oldafout=$('#dtmOldAfternoonOut').val();
        var morningin=$('#dtmMorningIn').val();
        var morningout=$('#dtmMorningOut').val();
        var aftrnoonin=$('#dtmAfternoonIn').val();
        var aftrnoonout=$('#dtmAfternoonOut').val();
        var purpose=$('#strPurpose').val();
        var reco=$('#strRecommend').val();
        var approval=$('#strApproval').val();

         if(comleave=='')
          $('#printreport').disabled();
        else 

            window.open("reports/generate/?rpt=reportCL&comleave="+comleave+"&oldmorin="+oldmorin+"&oldmorout="+oldmorout+"&oldafin="+oldafin+"&oldafout="+oldafout+"&morningin="+morningin+"&morningout="+morningout+"&aftrnoonin="+aftrnoonin+"&aftrnoonout="+aftrnoonout+"&purpose="+purpose+"&reco="+reco+"&approval="+approval,'_blank'); //ok
    
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

            var form2 = $('#frmCompensatoryLeave');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    dtmComLeave: {
                        required: true,
                    }
                    // strPurpose: {
                    //     required: true,
                    //     noSpace: true
                    // }

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

// function checkForBlank()
// {
//    var spaceCount = 0;

//     $comleave= $('#dtmComLeave').val();

//     $('#errordate').html('');

//     if($comleave=="")
//     {
//       $('#errordate').html('This field is required!');
//       return false;
//     }
//     else
//     {
//       return true;
//     }

// }
</script>