<?php 
/** 
Purpose of file:    DTR Update View
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
            <span>DTR Update</span>
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
                    <span class="caption-subject bold uppercase">DTR Update</span>
                </div>
            </div>
            <div class="portlet-body">
            <?=form_open(base_url('employee/dtr_update/submit'), array('method' => 'post', 'id' => 'frmDTRupdate'))?>
            <br>
                   
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Date : <span class="required"> * </span></label>
                              <input class="form-control form-control-inline input-medium date-picker" name="dtmDTRupdate" id="dtmDTRupdate" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">For the month of : <span class="required"> * </span></label>
                              <input name="dtmMonthOf" id="dtmMonthOf" class="form-control" size="10" type="text" value="" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Morning In : </label>
                            <input name="strOldMorningIn" id="strOldMorningIn" type="text" size="20" maxlength="20" class="form-control" value="" autocomplete="off" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Morning Out :</label>
                            <input name="strOldMorningOut" id="strOldMorningOut" type="text" size="20" maxlength="20" class="form-control" value="" autocomplete="off" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Afternoon In :</label>
                             <input name="strOldAfternoonIn" id="strOldAfternoonIn" type="text" size="20" maxlength="20" class="form-control" value="" autocomplete="off" readonly>
                    </div>
                </div>
            </div>
          <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Afternoon Out :</label>
                              <input name="strOldAfternoonOut" id="strOldAfternoonOut" type="text" size="20" maxlength="20" class="form-control" value="" autocomplete="off" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Overtime In : </label>
                              <input name="strOldOvertimeIn" id="strOldOvertimeIn" type="text" size="20" maxlength="20" class="form-control" value="" autocomplete="off" readonly>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">Old Overtime Out : </label>
                               <input name="strOldOvertimeOut" id="strOldOvertimeOut" type="text" size="20" maxlength="20" class="form-control" value="" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- New TIME -->
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">New Morning Time In : </label>
                              <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningIn" id="dtmMorningIn" value="12:00:00 AM" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Morning Time Out :</label>
                               <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningOut" id="dtmMorningOut" value="12:00:00 PM" autocomplete="off">
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Afternoon Time In :</label>
                               <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonIn" id="dtmAfternoonIn" value="12:00:00 PM" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Afternoon Time Out :</label>
                                <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonOut" id="dtmAfternoonOut" value="12:00:00 PM" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Overtime In :</label>
                                 <input type="text" class="form-control timepicker timepicker-default" name="dtmOvertimeIn" id="dtmOvertimeIn" value="12:00:00 PM" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">New Overtime Out :</label>
                                 <input type="text" class="form-control timepicker timepicker-default" name="dtmOvertimeOut" id="dtmOvertimeOut" value="12:00:00 PM" autocomplete="off">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Reason :</label>
                              <textarea name="strReason" id="strReason" type="text" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Supporting Evidence :</label>
                            <textarea name="strEvidence" id="strEvidence" type="text" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>"></textarea>
                    </div>
                </div>
            </div>
             <div class="row" id="signatory1_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Authorized Official (Signatory) :</label>
                            <select name="strSignatory" id="strSignatory" type="text" class="form-control" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
                                    <option value="">Select</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                            </select>
                    </div>
                </div>
            </div>
            <br>
            <br><br>
                 <div class="row">
                  <div class="col-sm-6 text-center">
                      <button type="submit" class="btn btn-success"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                       <a href="<?=base_url('employee/dtr_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
                  </div>
                  <div class="col-sm-2 text-right">
                       <button type="button" id="printreport" value="reportDTRupdate" class="btn blue">Print/Preview</button>
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
        var dtrupdate=$('#dtmDTRupdate').val();
        var oldmorin=$('#strOldMorningIn').val();
        var oldmorout=$('#strOldMorningOut').val();
        var oldafin=$('#strOldAfternoonIn').val();
        var oldaftout=$('#strOldAfternoonOut').val();
        var oldOTin=$('#strOldOvertimeIn').val();
        var oldOTout=$('#strOldOvertimeOut').val();
        var morningin=$('#dtmMorningIn').val();
        var morningout=$('#dtmMorningOut').val();
        var aftnoonin=$('#dtmAfternoonIn').val();
        var aftnoonout=$('#dtmAfternoonOut').val();
        var OTtimein=$('#dtmOvertimeIn').val();
        var OTtimeout=$('#dtmOvertimeOut').val();
        var reason=$('#strReason').val();
        var month=$('#dtmMonthOf').val();
        var evidence=$('#strEvidence').val();
        var signatory=$('#strSignatory').val();
        
        if(dtrupdate=='')
          $('#printreport').disabled();
        else
        // if(request=='reportDTRupdate')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportDTRupdate&dtrupdate="+dtrupdate+"&oldmorin="+oldmorin+"&oldmorout="+oldmorout+"&oldafin="+oldafin+"&oldaftout="+oldaftout+"&oldOTin="+oldOTin+"&oldOTout="+oldOTout+"&morningin="+morningin+"&morningout="+morningout+"&aftnoonin="+aftnoonin+"&aftnoonout="+aftnoonout+"&OTtimein="+OTtimein+"&OTtimeout="+OTtimeout+"&month="+month+"&evidence="+evidence+"&reason="+reason+"&signatory="+signatory,'_blank'); //ok
    
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

            var form2 = $('#frmDTRupdate');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    dtmDTRupdate: {
                        required: true,
                    },
                    dtmMonthOf: {
                        required: true,
                        noSpace: true
                    },
                    strReason: {
                        required: true,
                        noSpace: true
                    },
                    strEvidence: {
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
    $(document).ready(function() {
        $('#dtmDTRupdate').change(function() {
            //alert($('input[name="dtmDTRupdate"]').val());
            //console.log( $(this).val() );
            $date=$('#dtmDTRupdate').val();
            $.ajax({
                url: "dtr_update_view.php?action=getinout&date="+$date,
            success: function(result){
                $arrTime = result.split(';');
                //alert(result);
                $('input[name="strOldMorningIn"]').val($arrTime[0]);
                $('input[name="strOldMorningOut"]').val($arrTime[1]);
                $('input[name="strOldAfternoonIn"]').val($arrTime[2]);
                $('input[name="strOldAfternoonOut"]').val($arrTime[3]);
                $('input[name="strOldOvertimeIn"]').val($arrTime[4]);
                $('input[name="strOldOvertimeOut"]').val($arrTime[5]);
                $arrInAM=$arrTime[0].split(':');
                $('select[name="dtmMorningIn"]').val($arrInAM[0]);
                $arrOutAM=$arrTime[1].split(':');
                $('select[name="dtmMorningOut"]').val($arrOutAM[0]);
                $arrInPM=$arrTime[2].split(':');
                $('select[name="dtmAfternoonIn"]').val($arrInPM[0]);
                $arrOutPM=$arrTime[3].split(':');
                $('select[name="dtmAfternoonOut"]').val($arrOutPM[0]);
                $arrInOT=$arrTime[4].split(':');
                $('select[name="dtmOvertimeIn"]').val($arrInOT[0]);
                $arrOutOT=$arrTime[5].split(':');
                $('select[name="dtmOvertimeOut"]').val($arrOutOT[0]);
                //console.log(result);
                //$("#div1").html(result);
            }});
            //console.log( $year+$month+$day );
        });
    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('#cboYearFrom,#cboMonthFrom,#cboDayFrom').change(function() {
            //alert($('input[name="cboYearFrom"]').val());
            //console.log( $(this).val() );
            $year=$('#cboYearFrom').val();
            $month=$('#cboMonthFrom').val();
            $day=$('#cboDayFrom').val();
            $.ajax({
                url: "getDTRUpdate.php?action=getinout&year="+$year+'&month='+$month+'&day='+$day,
            success: function(result){
                $arrTime = result.split(';');
                //alert(result);
                $('input[name="t_intTimeInAM"]').val($arrTime[0]);
                $('input[name="t_intTimeOutAM"]').val($arrTime[1]);
                $('input[name="t_intTimeInPM"]').val($arrTime[2]);
                $('input[name="t_intTimeOutPM"]').val($arrTime[3]);
                $('input[name="t_intTimeInOT"]').val($arrTime[4]);
                $('input[name="t_intTimeOutOT"]').val($arrTime[5]);
                $arrInAM=$arrTime[0].split(':');
                $('select[name="t_intNdtrHourInAM"]').val($arrInAM[0]);
                $('select[name="t_intNdtrMinInAM"]').val($arrInAM[1]);
                $('select[name="t_intNdtrSecInAM"]').val($arrInAM[2]);
                $arrOutAM=$arrTime[1].split(':');
                $('select[name="t_intNdtrHourOutAM"]').val($arrOutAM[0]);
                $('select[name="t_intNdtrMinOutAM"]').val($arrOutAM[1]);
                $('select[name="t_intNdtrSecOutAM"]').val($arrOutAM[2]);
                $arrInPM=$arrTime[2].split(':');
                $('select[name="t_intNdtrHourInPM"]').val($arrInPM[0]);
                $('select[name="t_intNdtrMinInPM"]').val($arrInPM[1]);
                $('select[name="t_intNdtrSecInPM"]').val($arrInPM[2]);
                $arrOutPM=$arrTime[3].split(':');
                $('select[name="t_intNdtrHourOutPM"]').val($arrOutPM[0]);
                $('select[name="t_intNdtrMinOutPM"]').val($arrOutPM[1]);
                $('select[name="t_intNdtrSecOutPM"]').val($arrOutPM[2]);
                $arrInOT=$arrTime[4].split(':');
                $('select[name="t_intNdtrHourInOT"]').val($arrInOT[0]);
                $('select[name="t_intNdtrMinInOT"]').val($arrInOT[1]);
                $('select[name="t_intNdtrSecInOT"]').val($arrInOT[2]);
                $arrOutOT=$arrTime[5].split(':');
                $('select[name="t_intNdtrHourOutOT"]').val($arrOutOT[0]);
                $('select[name="t_intNdtrMinOutOT"]').val($arrOutOT[1]);
                $('select[name="t_intNdtrSecOutOT"]').val($arrOutOT[2]);
                //console.log(result);
                //$("#div1").html(result);
            }});
            //console.log( $year+$month+$day );
        });
    });
</script> -->

<?php
// if($_GET['action']=="getinout")
// {
//     $date=$_GET['dtmDTRupdate'];
//     $sql= "SELECT inAM,outAM,inPM,outPM,inOT,outOT FROM tblEmpDTR
//                 WHERE empNumber='".$_SESSION['strEmpNo']."' AND dtrDate='".$year."-".$month."-".$day."' LIMIT 0,1";
//     $empdtr=mysql_query($sql);
    
//     while($emp=mysql_fetch_array($empdtr)){
//         echo $emp['inAM'].';'.$emp['outAM'].';'.$emp['inPM'].';'.$emp['outPM'].';'.$emp['inOT'].';'.$emp['outOT'];
//     }
    
// }
?>