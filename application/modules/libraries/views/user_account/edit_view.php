<?php 
/** 
Purpose of file:    Add page for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
load_plugin('css',array('select','select2'));?>
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
            <span>Edit User Account</span>
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
                    <span class="caption-subject bold uppercase"> Edit User Account</span>
                </div>
                
            </div>
            <div class="portlet-body">
             <?=form_open(base_url('libraries/user_account/edit'), array('method' => 'post', 'id' => 'frmUserAccount'))?>
                <div class="form-body">
                   <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <?php //echo $arrUser[0]['userLevel'];
                            //print_r($arrUser);?>
                                <label class="control-label">Access Level <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <select type="text" class="form-control" name="strAccessLevel" id="strAccessLevel" value="<?=isset($arrUser[0]['userlevel'])?$arrUser[0]['userlevel']:''?>">
                                    <option value="">Select Access Level</option>
                                    <?php $arrAccessLevel = userlevel();foreach( $arrAccessLevel as $level):
                                            echo '<option value="'.$level['id'].'" '.($arrUser[0]['userLevel']==$level['id']?'selected':'').'>'.(strtoupper($level['desc'])). ' Account User</option>';
                                          endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start of HR Officer access-->
                    <div class="hr-officer">
                        <div class="row" id="HR1">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="radio" name="radioAsst" class="icheck" value="Assistant" checked> Assistant </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="HR2">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkNotif" class="icheck" value="Notification" checked> Notification </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="HR3">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkAttdnce" class="icheck" value="Attendance"> Attendance </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="HR4">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkLib" class="icheck" value="Libraries"> Libraries </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="HR5">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chk201" class="icheck" value="201" checked> 201 Section </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="HR6">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkReports" class="icheck" value="Reports" > Reports </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="HR7">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkCompen" class="icheck" value="Compensation"> Compensation </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="HR8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="radio" name="radioHRMO" class="icheck" value="HRMO">HRMO (Access all sections) </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="HR9">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkALL" class="icheck" value="All" checked> all sections </label>
                                    </div>
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
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="radio" name="radioAsst2" class="icheck" value="Assistant" checked> Assistant </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance2">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkNotif2" class="icheck" value="Notification" > Notification </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="Finance3">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkCompen2" class="icheck" value="Compensation" checked> Compensation </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="Finance4">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkUpdate" class="icheck" value="Update" checked> Update </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance5">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkReports2" class="icheck" value="Reports"> Reports </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" id="Finance6">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkLib2" class="icheck" value="Library"> Library </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance7">
                            <div class="col-sm-12">
                                <div class="form-group">
                                        <i class="fa"></i>
                                        <label>Assigned Payroll Group </label>
                                         <select class="form-control select2 form-required" name="selpayrollGrp" placeholder="">
                                            <option value="">Select</option>
                                            <?php foreach($arrGroups as $group)
                                            {
                                               echo '<option value="'.$group['payrollGroupId'].'" '.($arrData[0]['payrollGroupId']==$group['payrollGroupId']?'selected':'').'>'.$group['payrollGroupName'].'</option>';
                                            } ?>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance8">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <label><input type="radio" name="radioFinance" class="icheck" value="ALL Access">Finance Officer (Access all sections) </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="Finance9">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <label><input type="checkbox" name="chkAll2" class="icheck" checked> all sections </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of Finance Module access-->
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Employee Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <select type="text" class="form-control" name="strEmpName" id="strEmpName"  value="<?=isset($arrUser[0]['empNumber'])?$arrUser[0]['empNumber']:''?>">
                                     <option value="">Select</option>

                                     <?php foreach($arrEmployees as $i=>$data)
                                        {
                                          echo '<option value="'.$data['empNumber'].'" '.($arrUser[0]['empNumber']==$data['empNumber']?'selected':'').'>'.(strtoupper($data['surname']).', '.(strtoupper($data['firstname']))).'</option>';
                                        }?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Username <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                   <input type="text" class="form-control" name="strUsername" value="<?=!empty($arrUser[0]['userName'])?$arrUser[0]['userName']:''?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Add</button>
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