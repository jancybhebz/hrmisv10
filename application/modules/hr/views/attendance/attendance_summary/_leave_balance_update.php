<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Leave Balance for the Month of [DECEMBER 2018]</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-vl" data-title="Vacation Leave">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="text-align: center;vertical-align: middle;">Earned</th>
                                    <th colspan="3" style="text-align: center;">Vacation Leave</th>
                                    <th colspan="3" style="text-align: center;">Sick Leave</th>
                                    <th rowspan="2" style="text-align: center;vertical-align: middle;"> Action </th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">WP</th>
                                    <th style="text-align: center;">BAL</th>
                                    <th style="text-align: center;">WOP</th>
                                    <th style="text-align: center;">WP</th>
                                    <th style="text-align: center;">BAL</th>
                                    <th style="text-align: center;">WOP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="center" style="width: 16%;">
                                        <button class="btn btn-sm blue" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-leave-balance" id="btn-leavebal">
                                            <i class="fa fa-eye"></i> View</button>
                                        <button class="btn btn-sm green" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-leave-balance" id="btn-leavebal-override">
                                            <i class="fa fa-edit"></i> Override</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Leave Balance for the Month of [JANUARY 2018]</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <small>"If the employee reach the compulsory retirement age of 65 but the service has been extended, the employee will NO LONGER EARN leave credits."</small><br>
                        <small class="bold" style="color: red;">WARNING:  You are about to update the LEAVE BALANCE for the month of January 2019. Please check that all Leaves, OBs, Flag Ceremonies, Time-in and Time-out has been overriden correctly. Blank attendance records shall be considered Vacation Leaves.</small><br>
                        <br>
                        <p style="text-align: center;">
                            <button class="btn red" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-leave-balance" id="btn-update-leavebal">
                                <i class="fa fa-pencil"></i> &nbsp;Update Leave Balance</button>
                            <button class="btn blue" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-rollback" id="btn-rollback">
                                <i class="fa fa-refresh"></i> &nbsp;Rollback</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modals/_leave_balance_update_modal'); ?>