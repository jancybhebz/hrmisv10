<?php 
/** 
Purpose of file:    Leave View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/

$permonth = date("F, Y", strtotime("last day of previous month"));
$vlBalance = $arrBalance['vlBalance'];
$slBalance = $arrBalance['slBalance'];
$plBalance = $arrBalance['plBalance'];
$flBalance = $arrBalance['flBalance'];
$mtlBalance = $arrBalance['mtlBalance'];

$strLeavetype = '';
$action = '';
?>
<?=load_plugin('css', array('datepicker','timepicker','select','select2'))?>
<!-- BEGIN PAGE BAR -->
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
            <span>Leave</span>
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
                    <span class="caption-subject bold uppercase">Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <?=form_open_multipart('', array('method' => 'post', 'id' => 'frmLeave', 'onsubmit' => 'return checkForBlank()', 'onsubmit' => 'return checkForBlank()'))?>
                <input class="hidden" name="strStatus" value="Filed Request">
                <input class="hidden" name="strCode1" value="Forced Leave">
                <input class="hidden" name="strCode3" value="Sick Leave">
                <input class="hidden" name="strCodeSPL" value="Special Leave">
                <input class="hidden" name="intVL" id="intVL" value="<?=!empty($arrBalance[0]['vlBalance'])?$arrBalance[0]['vlBalance']:''?>">
                <input class="hidden" name="intSL" id="intSL" value="<?=!empty($arrBalance[0]['slBalance'])?$arrBalance[0]['slBalance']:''?>">
                <div class="row">
                    <div class="col-sm-8">
                        <table class="table table-bordered">
                            <tr>
                                <th>LEAVE BALANCE AS OF</th>
                                <td colspan="5"><?=strtoupper($permonth)?></td>
                            </tr>
                            <tr>
                                <th width="20%">Forced Leave left</th>
                                <td width="11%"><?=$flBalance==""?0:$arrBalance['flBalance']?></td>
                                <th width="18%">Sick Leave left</th>
                                <td width="11%"><?=$slBalance==""?0:$arrBalance['slBalance']?></td>
                                <th width="18%">Vacation Leave left</th>
                                <td width="12%"><?=$vlBalance==""?0:$arrBalance['vlBalance']?></td>
                            </tr>
                            <tr>
                                <th>Maternity Leave left</th>
                                <td><?=$mtlBalance==""?0:$arrBalance['mtlBalance']?></td>
                                <th>Special Leave left</th>
                                <td><?=$plBalance==""?0:$arrBalance['plBalance']?></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           <label class="control-label"><strong>Leave Type : </strong><span class="required"> * </span></label>
                            <select name="strLeavetype" id="strLeavetype" type="text" class="form-control bs-select form-required" value="<?=!empty($this->session->userdata('strLeavetype'))?$this->session->userdata('strLeavetype'):''?>" onchange="showtextbox()">
                                <option value="">-- SELECT LEAVE TYPE --</option>
                                <option value="FL">Forced Leave</option>
                                <option value="SPL">Special Leave</option>
                                <option value="SL">Sick Leave</option>
                                <option value="VL">Vacation Leave</option>
                                <option value="MTL">Maternity Leave</option>
                                <option value="PTL">Paternity Leave</option>
                                <option value="STL">Study Leave</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="wholeday_textbox">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="strDay" id="strDay" value="Whole day" checked> Whole day</label>
                                <label class="radio-inline">
                                    <input type="radio" name="strDay" id="strDay" value="Half day"> Half day </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="leavefrom_textbox">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Leave From :  <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input type="text" class="form-control date-picker" name="dtmLeavefrom" id="dtmLeavefrom" data-date-format="yyyy-mm-dd" autocomplete="off">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="leaveto_textbox">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Leave To :  <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input type="text" class="form-control date-picker" name="dtmLeaveto" id="dtmLeaveto" data-date-format="yyyy-mm-dd" autocomplete="off">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="daysapplied_textbox">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">No. of Days Applied :  <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                               <input type="text" class="form-control" name="intDaysApplied" id="intDaysApplied" disabled>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="signatory1_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Authorized Official (1st Signatory) :</label>
                            <select name="str1stSignatory" id="str1stSignatory" type="text" class="form-control select2 form-required" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
                                <option value="0">-- SELECT SIGNATORY--</option>
                                <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="signatory2_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Authorized Official (2nd Signatory) :</label>
                            <select name="str2ndSignatory" id="str2ndSignatory" type="text" class="form-control select2 form-required" value="<?=!empty($this->session->userdata('str2ndSignatory'))?$this->session->userdata('str2ndSignatory'):''?>" >
                                <option value="0">-- SELECT SIGNATORY--</option>
                                <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="reason_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Specify Reason/s :</label>
                            <textarea name="strReason" id="strReason" type="text" class="form-control" value="<?=!empty($this->session->userdata('strReason'))?$this->session->userdata('strReason'):''?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row" id="incaseSL_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">In Case of Sick Leave : </label>
                            <select name="strIncaseSL" id="strIncaseSL" type="text" class="form-control bs-select form-required" value="<?=!empty($this->session->userdata('strIncase'))?$this->session->userdata('strIncaseSL'):''?>">
                                <option value="">-- SELECT --</option>
                                <option value="in patient">IN Patient</option>
                                <option value="out patient">OUT Patient</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="incaseVL_textbox">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">In Case of Vacation Leave : </label>
                            <select name="strIncaseVL" id="strIncaseVL" type="text" class="form-control bs-select form-required" value="<?=!empty($this->session->userdata('strIncaseVL'))?$this->session->userdata('strIncaseVL'):''?>">
                                <option value="">-- SELECT --</option>
                                <option value="within the country">Within the country</option>
                                <option value="abroad">Abroad</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" id="attachments">
                    <br>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <a class='btn blue-madison' href='javascript:;'>
                                <i class="fa fa-upload"></i> Attach File
                                <input type="file" name ="userfile" id= "userfile" accept="application/pdf"
                                    style='left: 16px !important;width: 108px;height: 34px;position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                                    name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row"><div class="col-sm-8"><hr></div></div>
                <div class="row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-success" id="btn-request-ob">
                            <i class="icon-check"></i>
                            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                        <a href="<?=base_url('employee/leave')?>" class="btn blue"> <i class="icon-ban"></i> Clear</a>
                        <button type="button" id="printreport" value="reportOB" class="btn grey-cascade pull-right"><i class="icon-magnifier"></i> Print/Preview</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/leave.js')?>">

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

        $('#strLeavetype').on('change', function() {
            strLeavetype = $(this).val();
            if($(this).val() == 'FL'){  
                $('#frmLeave').attr('action','leave/submitFL'); 
                } else if(strLeavetype == 'SPL'){ 
                $('#frmLeave').attr('action','leave/submitSPL'); 
                } else if(strLeavetype == 'SL'){ 
                $('#frmLeave').attr('action','leave/submitSL'); 
                } else if(strLeavetype == 'VL'){ 
                $('#frmLeave').attr('action','leave/submitVL'); 
                } else if(strLeavetype == 'MTL'){ 
                $('#frmLeave').attr('action','leave/submitML');
                } else if(strLeavetype == 'PTL'){ 
                $('#frmLeave').attr('action','leave/submitPL'); 
                } else if(strLeavetype == 'STL'){
                $('#frmLeave').attr('action','leave/submitSTL'); 
                }
        });


     $('#printreport').click(function(){
        var leavetype=$('#strLeavetype').val();
        var day=$('#strDay').val();
        var leavefrom=$('#dtmLeavefrom').val();
        var leaveto=$('#dtmLeaveto').val();
        var daysapplied=$('#intDaysApplied').val();
        var signatory=$('#str1stSignatory').val();
        var signatory2=$('#str2ndSignatory').val();
        var reason=$('#strReason').val();
        var incaseSL=$('#strIncaseSL').val();
        var incaseVL=$('#strIncaseVL').val();
        var intVL=$('#intVL').val();
        var intSL=$('#intSL').val();

        if(leavefrom=='')
          $('#printreport').disabled();
        else
       // var valid=false;

        // if(request=='reportLeave')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportLeave&leavetype="+leavetype+"&day="+day+"&leavefrom="+leavefrom+"&leaveto="+leaveto+"&daysapplied="+daysapplied+"&signatory="+signatory+"&signatory2="+signatory2+"&reason="+reason+"&incaseSL="+incaseSL+"&incaseVL="+incaseVL+"&intVL="+intVL+"&intSL="+intSL,'_blank'); //ok
    
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

            var form2 = $('#frmLeave');
            var error2 = $('.alert-danger', form2);
            var success2 = $('.alert-success', form2);

            form2.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {

                    dtmLeavefrom: {
                        required: true,
                    },
                    dtmLeaveto: {
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
    $('#dtmLeavefrom, #dtmLeaveto').change(function()
    {
        if($('#dtmLeavefrom').val() != '' && $('#dtmLeaveto').val() != ''){
            var startDate = parseDate($('#dtmLeavefrom').val());
            var endDate = parseDate($('#dtmLeaveto').val());
            //var days = calcDaysBetween(startDate, endDate);
            var days = showDays(startDate, endDate);
            $('#intDaysApplied').html(days + " days"); 
            calculate();
            // round($days / (60 * 60 * 24));  
        }
    })

    function calculate() 
    {
        var d1 = $('#dtmLeavefrom').datepicker('getDate');
        var d2 = $('#dtmLeaveto').datepicker('getDate');
        var oneDay = 24*60*60*1000;
        var diff = 0;

        if (d1 && d2) 
        {
          diff = Math.round(Math.abs((d2.getTime() - d1.getTime())/(oneDay)));
        }        
        diff+=1;
        $('#intDaysApplied').val(diff);
    }

    function showDays(firstDate,secondDate)
    {
        var startDay = new Date(secondDate);
        var endDay = new Date(firstDate);
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / millisecondsPerDay;
        console.log(Math.floor(days)); 
        return Math.floor(days);
    }

    function parseDate(s)
    {
        var parts = s.split('-');
        //console.log(parts); 
        return new Date(parts[0], parts[1], parts[2]);
    }

    function calcDaysBetween(startDate, endDate)
    {
        console.log('endDate'+endDate+'startDate'+startDate);
        return (endDate-startDate)/(1000*60*60*24);
    }

</script>
<script>

// function checkForBlank()
// {
//    var spaceCount = 0;
//     $dtmLeavefrom= $('#dtmLeavefrom').val();
//     $dtmLeaveto= $('#dtmLeaveto').val();

//     $('leavefrom','leaveto').html('');

//     if($dtmLeavefrom=="")
//     {
//       $('#leavefrom').html('This field is required!');
//       return false;
//     }
//     else if($dtmLeaveto=="")
//     {
//       $('#leaveto').html('This field is required!');
//       return false;
//     }
  
//     else
//     {
//       return true;
//     }

// }
</script>