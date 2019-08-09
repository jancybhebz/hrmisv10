<?php 
/** 
Purpose of file:    Add page for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/

$flash_data = count($this->session->flashdata()) > 1 ? $this->session->flashdata() : array();
$action = $this->uri->segment(3);
if(isset($arrUser)):
    if(count($arrUser) > 0):
        $flash_data = $arrUser[0];
        $flash_data['userPermission'] = ucfirst(userlevel($flash_data['userLevel']));
        $flash_data['is_assistant'] = $flash_data['is_assistant'];
    endif;
endif;

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
            <span><?=ucfirst($action)?> User Account</span>
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
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" style="display: none">
             <?=form_open(base_url($action == 'add' ? 'libraries/user_account/add' : 'libraries/user_account/edit/'.$this->uri->segment(4)), array('method' => 'post', 'id' => 'frmUserAccount'))?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Access Level<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <select class="form-control form-required bs-select" name="strAccessLevel" id="strAccessLevel" required>
                                        <option value=""> </option>
                                        <?php foreach(userlevel() as $level):
                                                $selected = count($flash_data) > 0 ? $level['id'] == $flash_data['userLevel'] ? 'selected' : '' : '';
                                                echo '<option value="'.$level['id'].'" '.$selected.'>'.strtoupper($level['desc']).' Account User</option>';
                                              endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- start of HR Officer access-->
                    <div class="hr-officer" <?=count($flash_data) > 0 ? $flash_data['userPermission'] == 'Hr' ? '' : 'style="display:none;"' : 'style="display:none;"'?>>
                        <div class="row" id="HR1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><input type="radio" name="hrmodule" id="chkassistant" value="hrassistant"
                                                <?=count($flash_data) > 0 ? $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Assistant</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="HR2" <?=count($flash_data) > 0 ? $flash_data['is_assistant'] == '1' ? '' : 'style="display:none;"' : ''?>>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkNotif" value="1"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '1') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Notification </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkAttdnce" value="3"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '3') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Attendance </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkLib" value="5"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '5') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Libraries </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chk201" value="2"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '2') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> 201 Section </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkReports" value="4"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '4') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Reports </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkCompen" value="6"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '6') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Compensation </label>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <div class="row" id="HR8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><input type="radio" name="hrmodule" id="chkhrmo" value="hr"
                                                <?=count($flash_data) > 0 ? $flash_data['is_assistant'] == 0 ? 'checked' : '' : ''?>> HR Officer (Access all sections)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of HR Officer access-->
                    <!-- start of Finance Officer access-->
                    <div class="finance-officer" <?=count($flash_data) > 0 ? $flash_data['userPermission'] == 'Finance' ? '' : 'style="display:none;"' : 'style="display:none;"'?>>
                        <div class="row" id="Finance1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><input type="radio" name="financemodule" id="chkfoass" value="fassistant"
                                                <?=count($flash_data) > 0 ? $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Assistant</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance2" <?=count($flash_data) > 0 ? $flash_data['is_assistant'] == '1' ? '' : 'style="display:none;"' : ''?>>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkNotif2" value="0"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '0') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Notification </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkCompen2" value="1"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '1') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Compensation </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkUpdate" value="2"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '2') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Update </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkReports2" value="3"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '3') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Reports </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="chkLib2" value="4"
                                                <?=count($flash_data) > 0 ? (strpos($flash_data['accessPermission'], '4') !== false) && $flash_data['is_assistant'] == '1' ? 'checked' : '' : ''?>> Library </label>
                                    </div>
                                    <div class="col-md-3">&nbsp;</div>
                                </div>
                            </div>
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
                                    <label><input type="radio" name="financemodule" id="chkfoall" value="f"
                                                <?=count($flash_data) > 0 ? $flash_data['is_assistant'] == 0 ? 'checked' : '' : ''?>> Finance Officer (Access all sections)</label>
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
                                    <select class="form-control form-required select2" name="strEmpName" id="strEmpName" <?=$action=='edit' ? 'disabled' : 'required'?>>
                                        <option value="">Select Employee Name</option>
                                        <?php foreach($arrEmployees as $i=>$data):
                                                $selected = count($flash_data) > 0 ? $data['empNumber'] == $flash_data['empNumber'] ? 'selected' : '' : '';?>
                                                <option value="<?=$data['empNumber']?>" <?=$selected?>><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
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
                                    <input type="text" class="form-control" name="strUsername" id="strUsername"
                                        value="<?=count($flash_data) > 0 ? $flash_data['userName'] : ''?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" <?=$action == 'edit' ? '' : 'style="display:none;"'?>>
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label><input type="checkbox" name="chkchangePassword" id="chkchangePassword">Change Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="divchangePassword" <?=$action == 'add' ? '' : 'style="display:none;"'?>>
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Password<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <input type="password" class="form-control" name="strPassword" id="strPassword" maxlength="20" <?=$action == 'add' ? 'required' : ''?>>
                                    <br>
                                    <small><label><input type="checkbox" onclick="showPassword()">Show Password</label></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" id="btn-add-user"><i class="fa fa-<?=$action == 'add' ? 'plus' : 'check'?>"></i> <?=ucfirst($action)?></button>
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

<script>
    $(document).ready(function() { 
        $('.portlet-body').show();
        $('.loading-image').hide();
    });
    function showPassword() {
        var p = document.getElementById("strPassword");
        if (p.type === "password") {
            p.type = "text";
        } else {
            p.type = "password";
        }
    }
</script>