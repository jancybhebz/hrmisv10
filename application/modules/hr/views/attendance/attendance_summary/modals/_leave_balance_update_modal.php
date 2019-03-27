<?=load_plugin('css', array('attendance-css'))?>
<div id="modal-view-leave-balance" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Leave Balance Preview</h4>
                <small>Leave Balance Info for the Month of <?=date('F', mktime(0, 0, 0, $arrLatestBalance['periodMonth']+1, 10)).' '.$arrLatestBalance['periodYear']?></small>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-bordered tblmodal">
                                        <thead>
                                            <tr>
                                                <th style="width: 35%;">Details</th>
                                                <th style="text-align: center;">Vacation Leave</th>
                                                <th style="text-align: center;">Sick Leave</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Previous Month Balance  </td>
                                                <td align="center"><?=$arrLatestBalance['vlBalance']?></td>
                                                <td align="center"><?=$arrLatestBalance['slBalance']?></td>
                                            </tr>
                                            <tr>
                                                <td>Earned for the month</td>
                                                <td align="center"><?=$_ENV['leave_earned']?></td>
                                                <td align="center"><?=$_ENV['leave_earned']?></td>
                                            </tr>
                                            <tr>
                                                <td>Abs. Und. W/ Pay</td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                                <td id="tdn-or" align="center">(<?=$vl_abs_un_wpay?>)</td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                                <td id="tdn-or" align="center">(<?=$sl_abs_wpay?>)</td>
                                            </tr>
                                            <tr>
                                                <td><b><?=date('F', mktime(0, 0, 0, $arrLatestBalance['periodMonth']+1, 10)).' '.$arrLatestBalance['periodYear']?> Balance </b></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                                <td id="tdn-or" align="center"><b><?=$vl_month_bal?></b></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                                <td id="tdn-or" align="center"><b><?=$sl_month_bal?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Abs. Und. W/O Pay</td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                                <td id="tdn-or" align="center"><?=$vl_abs_un_wopay?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                                <td id="tdn-or" align="center"><?=$sl_abs_wopay?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered tblmodal">
                                        <thead>
                                            <tr>
                                                <th style="width: 35%;vertical-align: top;">Leave Type</th>
                                                <th style="text-align: center;">Previous Month Balance</th>
                                                <th style="text-align: center;">Filed this Month</th>
                                                <th style="text-align: center;">Current Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Special Leave</td>
                                                <td id="tdn-or" align="center"><?=($arr_oth_daysleave['PL'] - $arrprocess_days['previous']['PL'])?></td>
                                                <td align="center"><?=$arrprocess_days['current']['PL']?></td>
                                                <td id="tdn-or" align="center"><?=$arr_oth_daysleave['PL'] - ($arrprocess_days['previous']['PL'] + $arrprocess_days['current']['PL'])?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Forced Leave</td>
                                                <td id="tdn-or" align="center"><?=($arr_oth_daysleave['FL'] - $arrprocess_days['previous']['FL'])?></td>
                                                <td align="center"><?=$arrprocess_days['current']['FL']?></td>
                                                <td id="tdn-or" align="center"><?=$arr_oth_daysleave['FL'] - ($arrprocess_days['previous']['FL'] + $arrprocess_days['current']['FL'])?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Study Leave</td>
                                                <td id="tdn-or" align="center"><?=($arr_oth_daysleave['STL'] - $arrprocess_days['previous']['STL'])?></td>
                                                <td align="center"><?=$arrprocess_days['current']['STL']?></td>
                                                <td id="tdn-or" align="center"><?=$arr_oth_daysleave['STL'] - ($arrprocess_days['previous']['STL'] + $arrprocess_days['current']['STL'])?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr <?=$employeedata['sex'] == 'F' ? '' : 'hidden';?>>
                                                <td>Maternity Leave</td>
                                                <td id="tdn-or" align="center"><?=($arr_oth_daysleave['MTL'] - $arrprocess_days['previous']['MTL'])?></td>
                                                <td align="center"><?=$arrprocess_days['current']['MTL']?></td>
                                                <td id="tdn-or" align="center"><?=$arr_oth_daysleave['MTL'] - ($arrprocess_days['previous']['MTL'] + $arrprocess_days['current']['MTL'])?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr <?=$employeedata['sex'] != 'F' ? '' : 'hidden';?>>
                                                <td>Paternity Leave</td>
                                                <td id="tdn-or" align="center"><?=($arr_oth_daysleave['PTL'] - $arrprocess_days['previous']['PTL'])?></td>
                                                <td align="center"><?=$arrprocess_days['current']['PTL']?></td>
                                                <td id="tdn-or" align="center"><?=$arr_oth_daysleave['PTL'] - ($arrprocess_days['previous']['PTL'] + $arrprocess_days['current']['PTL'])?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered tblmodal">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Compensatory Overtime Credits (COC)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">Balance</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <div class="col-md-6 pull-right" style="margin-right: -4px;">
                                                        <input type="text" class="form-control input-sm" style="width: 106%" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gain</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <div class="col-md-6 pull-right" style="margin-right: -4px;">
                                                        <input type="text" class="form-control input-sm" style="width: 106%" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Used</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <div class="col-md-6 pull-right" style="margin-right: -4px;">
                                                        <input type="text" class="form-control input-sm" style="width: 106%" name="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-bordered tblmodal">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Attendance Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No. of Days Undertime/Tardiness</td>
                                                <td id="tdn-or" style="width: 80px;"><?=$att_summary['days_ut_late']?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hrs/Min/Sec Undertime/Tardiness (Format: hh:mm)</td>
                                                <td id="tdn-or"><?=date('H:i', mktime(0, $att_summary['mins_ut_late']))?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. of days AWOL</td>
                                                <td id="tdn-or"><?=$att_summary['days_lwop']?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. of days PRESENT</td>
                                                <td id="tdn-or"><?=$att_summary['days_presents']?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. of days ABSENT</td>
                                                <td id="tdn-or"><?=$att_summary['date_absents']?></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered tblmodal">
                                        <thead>
                                            <tr>
                                                <th colspan="3">For MC Benefits</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Hours of Service</td>
                                                <td>No. of days</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Laundry Allowance (day/s without)</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Subsistence Allowance</td>
                                                <td>8 hours (150 * day/s)</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>6 hrs but less than 8 hrs (125)</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5 hrs but less than 6 hrs (100)</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4 hrs but less than 5 hrs (75)</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>OB/TO with meal/s:</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td><b>Amount</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Seminar-Training Travel/Study (Subsistence - per diem)</td>
                                                <td id="tdn-or"></td>
                                                <td id="tdor">
                                                    <input type="text" class="form-control input-sm" name="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-rollback" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Rollback</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/actionLongevity/'.$this->uri->segment(5), array('id' => 'frmrollback'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtdel_action" id="txtdel_action">
                            <input type="hidden" name="txtdel_longevityid" id="txtdel_longevityid">
                            <div class="form-group">
                                <label>Are you sure you want to Rollback?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js', array('form_validation')) ?>

<script>
    $(document).ready(function() {
        $('td#tdn-or').show();
        $('td#tdor').hide();

        $('#btn-leavebal-override').click(function() {
            $('td#tdn-or').hide();
            $('td#tdor').show();            
        });

        $('#btn-leavebal,#btn-update-leavebal').click(function() {
            $('td#tdn-or').show();
            $('td#tdor').hide();            
        });
    });
</script>