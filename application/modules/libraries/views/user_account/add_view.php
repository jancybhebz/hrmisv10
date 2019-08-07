<?php 
/** 
Purpose of file:    Add page for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
load_plugin('css',array('select','select2'));?>
<!-- BEGIN PAGE BAR -->
<style type="text/css">
    select.bs-select-hidden, select.selectpicker { display: block !important; }
    select#strAccessLevel { position: absolute; }
</style>
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
            <span>Add User Account</span>
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
                    <span class="caption-subject bold uppercase"> Add User Account</span>
                </div>
                
            </div>
            <div class="portlet-body">
             <?=form_open(base_url('libraries/user_account/add'), array('method' => 'post', 'id' => 'frmUserAccount'))?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Access Level<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <select class="form-control form-required bs-select" name="strAccessLevel" id="strAccessLevel" required>
                                        <option value=""> </option>
                                        <?php foreach(userlevel() as $level):
                                                echo '<option value="'.$level['id'].'">'.strtoupper($level['desc']).' Account User</option>';
                                              endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- start of HR Officer access-->
                    <div class="hr-officer">
                        <div class="row" id="HR1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><input type="radio" name="hrmodule" id="chkassistant" value="1"> Assistant</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="HR2">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkNotif" value="2"> Notification </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkAttdnce" value="3"> Attendance </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkLib" value="4"> Libraries </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chk201" value="5"> 201 Section </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkReports" value="6"> Reports </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkCompen" value="7"> Compensation </label>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <div class="row" id="HR8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><input type="radio" name="hrmodule" id="chkhrmo" value="8"> HR Officer (Access all sections)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of HR Officer access-->
                    <!-- start of Finance Officer access-->
                    <div class="finance-officer">
                        <div class="row" id="Finance1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><input type="radio" name="financemodule" id="chkfoass" value="1"> Assistant</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance2">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkNotif2" value="2"> Notification </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkCompen2" value="3"> Compensation </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkUpdate" value="4"> Update </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkReports2" value="5"> Reports </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkLib2" value="6"> Library </label>
                                    </div>
                                    <div class="col-md-3">&nbsp;</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <label>Assigned Payroll Group </label>
                                        <select class="form-control select2 form-required" name="selpayrollGrp" placeholder="" value="7">
                                            <option value="">Select</option>
                                            <?php foreach($arrGroups as $group)
                                            {
                                               echo '<option value="'.$group['payrollGroupId'].'" '.($arrData[0]['payrollGroupId']==$group['payrollGroupId']?'selected':'').'>'.$group['payrollGroupName'].'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" id="Finance8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><input type="radio" name="financemodule" id="chkfoall" value="8"> Finance Officer (Access all sections)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of Finance Module access-->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Employee Name<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <select class="form-control form-required select2" name="strEmpName" id="strEmpName" required>
                                        <option value="">Select Employee Name</option>
                                        <?php foreach($arrEmployees as $i=>$data): ?>
                                        <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Username<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="strUsername" id="strUsername" value="<?=!empty($this->session->userdata('strUsername'))?$this->session->userdata('strUsername'):''?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Password<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="password" class="form-control" name="strPassword" id="strPassword" maxlength="20" value="<?=!empty($this->session->userdata('strPassword'))?$this->session->userdata('strPassword'):''?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" id="btn-add-user"><i class="fa fa-plus"></i> Add</button>
                                <a href="<?=base_url('libraries/user_account')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
               <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/useraccount.js')?>"></script>
<?=load_plugin('js',array('select','select2'));?>