<?php 
/** 
Purpose of file:    Leave View
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
            <?=form_open(base_url('employee/leave/submitFL'), array('method' => 'post', 'id' => 'frmLeave', 'onsubmit' => 'return checkForBlank()'))?>
            <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                <?php 
                $permonth = date("F, Y", strtotime("last day of previous month"));
                ?>
                       <label class="control-label"><strong>Leave Balances as of: <?=$permonth?></strong></label>
                            <i class="fa"></i>
                            <div><label>Vacation Leave left: <?=$arrBalance[0]['vlBalance']?></label></div>
                            <div><label>Sick Leave left: <?=$arrBalance[0]['slBalance']?></label></div>
                            <div><label>Special Leave left: <?=$arrBalance[0]['plBalance']?></label></div>
                            <div><label>Forced Leave left: <?=$arrBalance[0]['flBalance']?></label></div>
                            <div><label>Maternity Leave left: <?=$arrBalance[0]['mtlBalance']?></label></div>
                    </div>
                </div>
            </div><br>
            <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                   <label class="control-label"><strong>Leave Type : </strong><span class="required"> * </span></label>
                            <i class="fa"></i>
                             <select name="strLeavetype" id="strLeavetype" type="text" class="form-control" value="<?=!empty($this->session->userdata('strLeavetype'))?$this->session->userdata('strLeavetype'):''?>" onchange="showtextbox()">
                            <option value="">Please select</option>
                            <option value="forced">Forced Leave</option>
                            <option value="special">Special Leave</option>
                            <option value="sick">Sick Leave</option>
                            <option value="vacation">Vacation Leave</option>
                            <option value="maternity">Maternity Leave</option>
                            <option value="paternity">Paternity Leave</option>
                            <option value="study">Study Leave</option>
                            </select>
                    </div>
                </div>
            </div>

                 
             <?php  $strLeavetype = '';
                    $action = '';
            if($strLeavetype == 'forced'){  
                $action = base_url('employee/pds_update/submitFL'); 
                } else if($strLeavetype == 'special'){ 
                $action = base_url('employee/pds_update/submitSPL'); 
                } else if($strLeavetype == 'sick'){ 
                $action = base_url('employee/pds_update/submitSL'); 
                } else if($strLeavetype == 'vacation'){ 
                $action = base_url('employee/pds_update/submitVL'); 
                } else if($strLeavetype == 'maternity'){ 
                $action = base_url('employee/pds_update/submitML');
                } else if($strLeavetype == 'paternity'){ 
                $action = base_url('employee/pds_update/submitPL'); 
                } else if($strLeavetype == 'study'){
                $action = base_url('employee/pds_update/submitSTL'); 
                } ?>
            
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
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmLeavefrom" id="dtmLeavefrom" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off" onchange="showdiff()">
                    </div>
                </div>
            </div>
             <div class="row" id="leaveto_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Leave To : <span class="required"> * </span></label>
                             <input class="form-control form-control-inline input-medium date-picker" name="dtmLeaveto" id="dtmLeaveto" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off" onchange="showdiff()">
                    </div>
                </div>
            </div>
             <div class="row" id="daysapplied_textbox">
                <div class="col-sm-1">
                    <div class="form-group">
                     <label class="control-label"># of Days Applied : </label>
                             <input name="intDaysApplied" id="intDaysApplied" type="number" size="20" maxlength="100" class="form-control" value="<?=!empty($this->session->userdata('intDaysApplied'))?$this->session->userdata('intDaysApplied'):''?>">
                    </div>
                </div>
            </div>
              <div class="row" id="signatory1_textbox">
                <div class="col-sm-8">
                    <div class="form-group">
                     <label class="control-label">Authorized Official (1st Signatory) :</label>
                            <select name="str1stSignatory" id="str1stSignatory" type="text" class="form-control" value="<?=!empty($this->session->userdata('str1stSignatory'))?$this->session->userdata('str1stSignatory'):''?>">
                                    <option value="">Select</option>
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
                            <select type="text" class="form-control" name="strEmpName2" value="<?=!empty($this->session->userdata('strEmpName2'))?$this->session->userdata('strEmpName2'):''?>" >
                                    <option value="">Select</option>
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
                             <select name="strIncaseSL" id="strIncaseSL" type="text" class="form-control" value="<?=!empty($this->session->userdata('strIncase'))?$this->session->userdata('strIncaseSL'):''?>">
                                 <option value="">Select</option>
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
                              <select name="strIncaseVL" id="strIncaseVL" type="text" class="form-control" value="<?=!empty($this->session->userdata('strIncaseVL'))?$this->session->userdata('strIncaseVL'):''?>">
                                 <option value="">Select</option>
                                 <option value="within the country">within the country</option>
                                 <option value="abroad">abroad</option>
                             </select>
                    </div>
                </div>
            </div>
            <br><br>
                <div class="row">
                  <div class="col-sm-8 text-right">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode1" value="Forced Leave">
                        <input class="hidden" name="strCodeSPL" value="Special Leave">
                        <input class="hidden" name="intVL" value="<?=!empty($this->session->userdata('intVL'))?$this->session->userdata('intVL'):''?>"">
                        <input class="hidden" name="intSL" value="<?=!empty($this->session->userdata('intSL'))?$this->session->userdata('intSL'):''?>"">
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
        var leavetype=$('#strLeavetype').val();
        var day=$('#strDay').val();
        var leavefrom=$('#dtmLeavefrom').val();
        var leaveto=$('#dtmLeaveto').val();
        var daysapplied=$('#intDaysApplied').val();
        var signatory=$('#str1stSignatory').val();
        var empname=$('#strEmpName2').val();
        var reason=$('#strReason').val();
        var incaseSL=$('#strIncaseSL').val();
        var incaseVL=$('#strIncaseVL').val();

        if(leavefrom=='')
          $('#printreport').disabled();
        else
       // var valid=false;

        // if(request=='reportLeave')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportLeave&leavetype="+leavetype+"&day="+day+"&leavefrom="+leavefrom+"&leaveto="+leaveto+"&daysapplied="+daysapplied+"&signatory="+signatory+"&empname="+empname+"&reason="+reason+"&incaseSL="+incaseSL+"&incaseVL="+incaseVL,'_blank'); //ok
    
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
                    strLeavetype: {
                        required: true,
                    },
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
        if($('#dtmLeavefrom').val() && $('#dtmLeaveto').val()){
            var startDate = parseDate($('#dtmLeaveto').val())
            var endDate = parseDate($('#dtmLeavefrom').val())
            var days = calcDaysBetween(startDate, endDate)
            $('#intDaysApplied').html(days + " days")      

            echo round($days / (60 * 60 * 24));   
        }
    })

    function parseDate(s)
    {
        var parts = s.split('/')
        return new Date(parts[2], parts[0]-1, parts[1])
    }

    function calcDaysBetween(startDate, endDate)
    {
        return (endDate-startDate)/(1000*60*60*24)
    }


</script>

<!-- based from hrmisv9 -->

<!-- <script>

    function daysApplied(t_intYearFrom,t_intMonthFrom,t_intDayFrom,t_intYearTo,t_intMonthTo, t_intDayTo, t_strLeaveDay, t_cboLeaveType)
    {
            var weekday=new Array(7);
                weekday[0]="Sunday";
                weekday[1]="Monday";
                weekday[2]="Tuesday";   
                weekday[3]="Wednesday";
                weekday[4]="Thursday";
                weekday[5]="Friday";
                weekday[6]="Saturday";
            
            var holidayweekends=0,holidate=0,IncludedHolidays=0,weekdays=0,day=86400000;
            var holiDate  = new Array();
            var datefrom=new Date(t_intYearFrom,t_intMonthFrom-1,t_intDayFrom); 
            var dateto=new Date(t_intYearTo,t_intMonthTo-1,t_intDayTo); 
            var datediff = (dateto - datefrom); //combobox date unit in milliseconds...
            intDaysApp = Math.round(datediff / (1000 * 60 * 60 * 24)+1);//starting day is included in counting(kaya plus 1)...
            //  intDaysApp =  Math.round(intDaysApp / 7 * 5); //exclude sat and sun

            var dfrom = Math.round(datefrom / (1000 * 60 * 60 * 24));
            var dto = Math.round(dateto / (1000 * 60 * 60 * 24));
            dtfrom = datefrom.getTime();

            for(j=dfrom,i=0;j<=dto;j++,i++)
            {
            cmbdate = datefrom.setTime(dtfrom+(day*i));
            var inputDate = new Date(cmbdate);
            inputDate.setHours(0);
            if(weekday[inputDate.getUTCDay()] == "Sunday" || weekday[inputDate.getUTCDay()] == "Saturday") //excludes sat and sun 
            weekdays++;
                <? 
                   //$holiday = mysql_query('SELECT holidayDate FROM tblHolidayYear'); 
                   //while($arrholiday = mysql_fetch_array($holiday))
                   //{ ?>
                    var holidayDate = "<? echo //$arrholiday['holidayDate']; ?>";
                    holiDate = holidayDate.split("-");
                    var date = new Date(holiDate[0],holiDate[1]-1,holiDate[2]);
                    if(date.getTime() == inputDate.getTime())
                    {
                    if(weekday[inputDate.getUTCDay()] == "Sunday" || weekday[inputDate.getUTCDay()] == "Saturday");
                    else
                    IncludedHolidays++;
                    }
                <? //} ?>
            }
                if(t_strLeaveDay){
                    intDaysApp = intDaysApp * 0.5;  //if halfday
                    document.all.optionLeaveDay.value=true;
                    }
                if(t_cboLeaveType==2){
                    IncludedHolidays=0;
                    weekdays=0;}
                document.all.txtDaysApp.value = intDaysApp - (IncludedHolidays + weekdays);
        }

</script> -->