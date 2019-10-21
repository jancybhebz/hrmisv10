<?php 
/** 
Purpose of file:    Leave View
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
            <?=form_open('', array('method' => 'post', 'id' => 'frmLeave', 'onsubmit' => 'return checkForBlank()', 'onsubmit' => 'return checkForBlank()'))?>
            <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                <?php 
                    $permonth = date("F, Y", strtotime("last day of previous month"));
                    $vlBalance = $arrBalance['vlBalance'];
                    $slBalance = $arrBalance['slBalance'];
                    $plBalance = $arrBalance['plBalance'];
                    $flBalance = $arrBalance['flBalance'];
                    $mtlBalance = $arrBalance['mtlBalance'];
                ?>
                       <label class="control-label"><strong>Leave Balances as of: <?=$permonth?></strong></label>
                            <i class="fa"></i>
                                <div><label>Vacation Leave left: <?=$vlBalance==""?0:$arrBalance['vlBalance']?></label></div>
                                <div><label>Sick Leave left: <?=$slBalance==""?0:$arrBalance['slBalance']?></label></div>
                                <div><label>Special Leave left: <?=$plBalance==""?0:$arrBalance['plBalance']?></label></div>
                                <div><label>Forced Leave left: <?=$flBalance==""?0:$arrBalance['flBalance']?></label></div>
                                <div><label>Maternity Leave left: <?=$mtlBalance==""?0:$arrBalance['mtlBalance']?></label></div>
                    </div>
                </div>
            </div><br>
            <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label"><strong>Leave Type : </strong><span class="required"> * </span></label>
                            <i class="fa"></i>
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

                 
             <?php  $strLeavetype = '';
                    $action = '';
            // if($strLeavetype == 'forced'){  
            //     $action = base_url('employee/pds_update/submitFL'); 
            //     } else if($strLeavetype == 'special'){ 
            //     $action = base_url('employee/pds_update/submitSPL'); 
            //     } else if($strLeavetype == 'sick'){ 
            //     $action = base_url('employee/pds_update/submitSL'); 
            //     } else if($strLeavetype == 'vacation'){ 
            //     $action = base_url('employee/pds_update/submitVL'); 
            //     } else if($strLeavetype == 'maternity'){ 
            //     $action = base_url('employee/pds_update/submitML');
            //     } else if($strLeavetype == 'paternity'){ 
            //     $action = base_url('employee/pds_update/submitPL'); 
            //     } else if($strLeavetype == 'study'){
            //     $action = base_url('employee/pds_update/submitSTL'); 
            //     } ?>
            
            <div class="row" id="wholeday_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                        <div class="input-icon left">
                           <label class="mt-radio">
                            <input type="radio" name="strDay" id="strDay" value="Whole day" checked> Whole day
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="strDay" id="strDay" value="Half day"> Half day
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="leavefrom_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Leave From : <span class="required"> * </span></label>
                            <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input class="form-control form-control-inline input-medium date-picker" name="dtmLeavefrom" id="dtmLeavefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                            <!--     <div class="input-icon right">
                                    <font color='red'> <span id="leavefrom"></span></font>
                                </div> -->
                             </div>
                        </div>
                    </div>
                </div>
            <br>
             <div class="row" id="leaveto_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Leave To : <span class="required"> * </span></label>
                            <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input class="form-control form-control-inline input-medium date-picker" name="dtmLeaveto" id="dtmLeaveto" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                            </div>
                    </div>
                </div>
            </div>
            <br>
             <div class="row" id="daysapplied_textbox">
                <div class="col-sm-1">
                    <div class="form-group">
                     <label class="control-label">No. of Days Applied : </label>
                             <input name="intDaysApplied" id="intDaysApplied" type="number" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('intDaysApplied'))?$this->session->userdata('intDaysApplied'):''?>">
                    </div>
                </div>
            </div>
              <div class="row" id="signatory1_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Authorized Official (1st Signatory) :</label>
                            <select name="str1stSignatory" id="str1stSignatory" type="text" class="form-control select2 form-required" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
                                    <option value="">-- SELECT SIGNATORY--</option>
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
                                    <option value="">-- SELECT SIGNATORY--</option>
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
                                 <option value="">-- Select --</option>
                                 <option value="in patient">in patient</option>
                                 <option value="out patient">out patient</option>
                             </select>
                    </div>
                </div>
            </div>
            <div class="row" id="incaseVL_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">In Case of Vacation Leave : </label>
                              <select name="strIncaseVL" id="strIncaseVL" type="text" class="form-control bs-select form-required" value="<?=!empty($this->session->userdata('strIncaseVL'))?$this->session->userdata('strIncaseVL'):''?>">
                                 <option value="">-- Select --</option>
                                 <option value="within the country">within the country</option>
                                 <option value="abroad">abroad</option>
                             </select>
                    </div>
                </div>
            </div>
            <div class="row" id="upload_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">Upload Supporting document : </label>
                    </div>
                </div>
            </div>
            <br><br>
                <div class="row">
                  <div class="col-sm-8 text-right">
                      
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode1" value="Forced Leave">
                        <input class="hidden" name="strCode3" value="Sick Leave">
                        <input class="hidden" name="strCodeSPL" value="Special Leave">
                        <input class="hidden" name="intVL" id="intVL" value="<?=!empty($arrBalance[0]['vlBalance'])?$arrBalance[0]['vlBalance']:''?>">
                        <input class="hidden" name="intSL" id="intSL" value="<?=!empty($arrBalance[0]['slBalance'])?$arrBalance[0]['slBalance']:''?>">
                        <button type="button" id="printreport" value="reportLeave" class="btn blue">Print/Preview</button>

                     <div class="col-sm-10 text-center">
                        <button type="submit" id="submitFL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitSPL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitSL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitVL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitML" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitPL" class="btn btn-success">Submit</button>
                        <button type="submit" id="submitSTL" class="btn btn-success">Submit</button>
                        <a href="<?=base_url('employee/leave')?>"/><button type="reset" class="btn blue">Clear</button></a>
                            
                        </div>
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