<?php 
/** 
Purpose of file:    Leave View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/

$permonth = date("F, Y", strtotime("last day of previous month"));
$vlBalance = count($arrBalance) > 0 ? $arrBalance['vlBalance'] : 0;
$slBalance = count($arrBalance) > 0 ? $arrBalance['slBalance'] : 0;
$plBalance = count($arrBalance) > 0 ? $arrBalance['plBalance'] : 0;
$flBalance = count($arrBalance) > 0 ? $arrBalance['flBalance'] : 0;
$mtlBalance = count($arrBalance) > 0 ? $arrBalance['mtlBalance'] : 0;

$strLeavetype = '';
$action = '';
$emp_gender = employee_details($_SESSION['sessEmpNo']);
$emp_gender = count($emp_gender) > 0 ? $emp_gender[0]['sex'] : '';
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
                <?=form_open_multipart('employee/leave/add_leave', array('method' => 'post', 'id' => 'frmLeave'))?>
                <input class="hidden" name="txtempno" id="txtempno" value="<?=$_SESSION['sessEmpNo']?>">
                <input class="hidden" name="txttype" id="txttype">
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
                                <td width="11%"><?=$flBalance==""?0:number_format($arrBalance['flBalance'],3)?></td>
                                <th width="18%">Sick Leave left</th>
                                <td width="11%"><?=$slBalance==""?0:number_format($arrBalance['slBalance'],3)?></td>
                                <th width="18%">Vacation Leave left</th>
                                <td width="12%"><?=$vlBalance==""?0:number_format($arrBalance['vlBalance'],3)?></td>
                            </tr>
                            <tr>
                                <th>Maternity Leave left</th>
                                <td><?=$mtlBalance==""?0:number_format($arrBalance['mtlBalance'],3)?></td>
                                <th>Special Leave left</th>
                                <td><?=$plBalance==""?0:number_format($arrBalance['plBalance'],3)?></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           <label class="control-label"><strong>Leave Type : </strong><span class="required"> * </span></label>
                            <select name="strLeavetype" id="strLeavetype" type="text" class="form-control bs-select form-required" value="<?=!empty($this->session->userdata('strLeavetype'))?$this->session->userdata('strLeavetype'):''?>">
                                <option value="">-- SELECT LEAVE TYPE --</option>
                                <option value="FL">Forced Leave</option>
                                <option value="SPL">Special Leave</option>
                                <option value="SL">Sick Leave</option>
                                <option value="VL">Vacation Leave</option>
                                <?php if(strtolower($emp_gender) == 'm'): ?>
                                    <option value="PTL">Paternity Leave</option>
                                <?php else: ?>
                                    <option value="MTL">Maternity Leave</option>
                                <?php endif; ?>
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
                                    <input type="radio" name="strDay" id="strDayw" value="Whole day" checked> Whole day</label>
                                <label class="radio-inline">
                                    <input type="radio" name="strDay" id="strDayf" value="Half day"> Half day </label>
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
                               <input type="text" class="form-control" id="intDaysApplied" disabled>   
                               <input type="hidden" name="intDaysApplied" id="intDaysApplied_val">
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

                <div class="row div-actions"><div class="col-sm-8"><hr></div></div>
                <div class="row div-actions">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-success" id="btn-request-leave">
                            <i class="icon-check"></i>
                            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                        <a href="<?=base_url('employee/leave')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
                        <button type="button" id="printreport" value="reportOB" class="btn grey-cascade pull-right"><i class="icon-magnifier"></i> Print/Preview</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/leave.js')?>"></script>
<?=load_plugin('js',array('form_validation','datepicker','select','select2'));?>
