<?php 
/** 
Purpose of file:    Official Business View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
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
            <span>Official Business</span>
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
                    <span class="caption-subject bold uppercase"> Official Business</span>
                </div>
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('employee/official_business/add')?>" method="post" id="frmOB">
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Official Business : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="radio" name="strOBtype"
                                    <?php if (isset($strOBtype) && $strOBtype=="Official") echo "checked";?> value="Official">Official
                                <input type="radio" name="strOBtype"
                                    <?php if (isset($strOBtype) && $strOBtype=="Personal") echo "checked";?> value="Personal">Personal
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="ob1"></span></font>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Request Date : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="dtmOBrequestdate" id="dtmOBrequestdate" type="date" class="form-control has-datepicker" value="<?=!empty($this->session->userdata('dtmOBrequestdate'))?$this->session->userdata('dtmOBrequestdate'):''?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="datereq"></span></font>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date From : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="dtmOBdatefrom" id="dtmOBdatefrom" type="date" class="form-control has-datepicker" value="<?=!empty($this->session->userdata('dtmOBdatefrom'))?$this->session->userdata('dtmOBdatefrom'):''?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="datefrom"></span></font>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Date To : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input name="dtmOBdateto" id="dtmOBdateto" type="date" class="form-control has-datepicker" value="<?=!empty($this->session->userdata('dtmOBdateto'))?$this->session->userdata('dtmOBdateto'):''?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="dateto"></span></font>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Time From : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                  <input type="time" id="dtmTimeFrom" name="dtmTimeFrom" min="9:00" max="18:00" />                          
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="timefrom"></span></font>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Time To : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                   <input type="time" id="dtmTimeTo" name="dtmTimeTo" min="9:00" max="18:00" />         
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="timeto"></span></font>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Destination : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <textarea name="strDestination" id="strDestination" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strDestination'))?$this->session->userdata('strDestination'):''?>"> </textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="desti"></span></font>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">With Meal : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="radio" name="strMeal"
                                    <?php if (isset($strMeal) && $strMeal=="Yes") echo "checked";?> value="Yes">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="meal"></span></font>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label">Purpose : <span class="required"> * </span></label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <textarea name="strPurpose" id="strPurpose" type="text" size="20" maxlength="100" class="form-control" required="" value="<?=!empty($this->session->userdata('strPurpose'))?$this->session->userdata('strPurpose'):''?>"> </textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <font color='red'> <span id="pur"></span></font>
                            </div>
                        </div>
                    </div>

                    <br><br>
                     <div class="row">
                      <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                            <a href="<?=base_url('employee/official_business')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
                            <button type="print" class="btn btn-primary">Print/Preview</button>
                      </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>

    $('#dtmBday').datepicker({dateFormat: 'yyyy-mm-dd'});

</script>

