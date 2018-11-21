<?=load_plugin('css', array('attendance-css','datepicker'))?>
<div id="modal-view-leave-balance" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Leave Balance Preview</h4>
                <small>Leave Balance Info for the Month of October 2018</small>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 35%;">Details</th>
                                                <th>Vacation Leave</th>
                                                <th>Sick Leave</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Previous Month Balance  </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Earned for the month    </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Abs. Und. W/ Pay    </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Abs. Und. W/O Pay   </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><b>October 2018 Balance </b></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 35%;">Leave Type</th>
                                                <th>Previous Month Balance</th>
                                                <th>Current Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Special Leave</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Forced Leave</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Study Leave</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Maternity Leave</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Attendance Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">Balance</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Gain</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Used</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Attendance Summary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No. of Days Undertime/Tardiness</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Hrs/Min/Sec Undertime/Tardiness (Format: hh:mm)</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>No. of days AWOL</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>No. of days PRESENT</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>No. of days ABSENT</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">
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
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Subsistence Allowance</td>
                                                <td>8 hours (150 * day/s)</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>6 hrs but less than 8 hrs (125)</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5 hrs but less than 6 hrs (100)</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4 hrs but less than 5 hrs (75)</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>OB/TO with meal/s:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td><b>Amount</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Seminar-Training Travel/Study (Subsistence - per diem)</td>
                                                <td></td>
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

<div id="modal-edit-leave-balance" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit [Vacation] Leave</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/edit_payrollDetails/'.$this->uri->segment(5), array('id' => 'frmedit-vl'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- begin input elements -->
                                            <div class="form-group">
                                                <label class="control-label">Date</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" id="txtvl-date" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Earned<span class="required"> * </span></label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control form-required" name="txtvl-earned" id="txtvl-earned">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Abs.Und.W/Pay<span class="required"> * </span></label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control form-required" name="txtvl-wpay" id="txtvl-wpay">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Current Balance</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" id="txtvl-currbal" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Previous Balance</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" id="txtvl-prevbal" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Abs.Und.W/o Pay<span class="required"> * </span></label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control form-required" name="txtvl-wopay" id="txtvl-wopay">
                                                </div>
                                            </div>
                                            <!-- end input elements -->
                                        </div>
                                     </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green"><i class="icon-check"> </i> Submit</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js', array('datepicker','form_validation')) ?>