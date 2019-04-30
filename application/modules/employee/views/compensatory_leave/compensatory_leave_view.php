<?php 
/** 
Purpose of file:    Compensaroy Leave View
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
            <a href="<?=base_url('home')?>">Employee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Request</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Compensatory Leave</span>
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
                    <span class="caption-subject bold uppercase">Compensatory Leave</span>
                </div>
            </div>
            <div class="portlet-body">
            <?=form_open(base_url('employee/compensatory_leave/submit'), array('method' => 'post', 'id' => 'frmCompensatoryLeave'))?>
             <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                         <label class="control-label">Date : <span class="required"> * </span></label>
                            <div class="input-icon left">
                         <input class="form-control form-control-inline input-medium date-picker" name="dtmComLeave" id="dtmComLeave" size="16" type="text" value="" data-date-format="yyyy-mm-dd" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">Old Morning In : </label>
                            <div class="input-icon left">
                            <input type="text" class="form-control timepicker timepicker-default" name="dtmOldMorningIn" id="dtmOldMorningIn" value="12:00:00" autocomplete="off"> </div>
                            </div>
                    </div>
                </div>
           
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">Old Morning Out : </label>
                            <div class="input-icon left">
                         <input type="text" class="form-control timepicker timepicker-default" name="dtmOldMorningOut" id="dtmOldMorningOut" value="12:00:00 PM" autocomplete="off"> </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">Old Afternoon In : </label>
                        <div class="input-icon left">
                            <input type="text" class="form-control timepicker timepicker-default" name="dtmOldAfternoonIn" id="dtmOldAfternoonIn" value="12:00:00 PM" autocomplete="off"> </div>
                        </div>
                    </div>
                </div>
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                         <label class="control-label">Old Afternoon Out : </label>
                        <div class="input-icon left">
                            <input type="text" class="form-control timepicker timepicker-default" name="dtmOldAfternoonOut" id="dtmOldAfternoonOut" value="12:00:00 PM" autocomplete="off"> </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">New Morning Time In :</label>
                        <div class="input-icon left">
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningIn" id="dtmMorningIn" value="12:00:00" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>      
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">New Morning Time Out :</label>
                        <div class="input-icon left">
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmMorningOut" id="dtmMorningOut" value="12:00:00" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>  
             <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">New Afternoon Time In :</label>
                        <div class="input-icon left">
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonIn" id="dtmAfternoonIn" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="control-label">New Afternoon Time Out :</label>
                        <div class="input-icon left">
                             <input type="text" class="form-control timepicker timepicker-default" name="dtmAfternoonOut" id="dtmAfternoonOut" value="12:00:00 PM" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="control-label">Purpose/Target Deliverables :</label>
                        <div class="input-icon left">
                            <textarea name="strReason" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">Recommending Approval : </label>
                        <div class="input-icon left">
                             <select name="strRecommend" id="strRecommend" type="text" class="form-control" value="<?=!empty($this->session->userdata('strRecommend'))?$this->session->userdata('strRecommend'):''?>">
                                    <option value="">Select</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                </select>
                        </div>
                    </div>
                </div>
            </div>      
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                       <label class="control-label">Approval / Disapproval : </label>
                        <div class="input-icon left">
                             <select name="strApproval" id="strApproval" type="text" class="form-control" value="<?=!empty($this->session->userdata('strApproval'))?$this->session->userdata('strApproval'):''?>">
                                    <option value="">Select</option>
                                    <?php foreach($arrEmployees as $i=>$data): ?>
                                    <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                </select>
                        </div>
                    </div>
                </div>
            </div>    
            <br><br>
            <div class="row">
                    <div class="col-sm-8 text-right">
                        <input class="hidden" name="strStatus" value="Filed Request">
                        <input class="hidden" name="strCode" value="COC">
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
       // var valid=false;

        // if(request=='reportCL')
        //     valid=true;
        // if(valid)

            window.open("reports/generate/?rpt=reportCL&comleave="+comleave+"&oldmorin="+oldmorin+"&oldmorout="+oldmorout+"&oldafin="+oldafin+"&oldafout="+oldafout+"&morningin="+morningin+"&morningout="+morningout+"&aftrnoonin="+aftrnoonin+"&aftrnoonout="+aftrnoonout+"&purpose="+purpose+"&reco="+reco+"&approval="+approval,'_blank'); //ok
    
    });
 });
</script>
