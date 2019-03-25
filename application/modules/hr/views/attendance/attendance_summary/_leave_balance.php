<?php load_plugin('css',array('datatables'));?>
<?php $month = isset($_GET['month']) ? $_GET['month'] : date('m'); $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y'); ?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Leave Balance</span>&nbsp;
                    <a data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-info"> <i class="icon-info"></i></a>
                </div>
            </div>
            
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <a class="btn blue" href="<?=base_url('hr/attendance_summary/leave_balance_update/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                            <i class="fa fa-pencil"></i> Update Leave Balance</a>
                        <br><br><br>

                        <!-- begin vacation leave -->
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase"> Vacation Leave</span>
                        </div>
                        <hr>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-vl" data-title="Vacation Leave">
                            <thead>
                                <tr>
                                    <th style="width: 140px;">Date</th>
                                    <th>Earned</th>
                                    <th>Abs.Und.W/ Pay</th>
                                    <th>Current Balance</th>
                                    <th>Previous Balance</th>
                                    <th>Abs.Und.W/o Pay</th>
                                    <th style="text-align: center;"> Action </th>
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
                                    <td align="center">
                                        <button class="btn btn-sm blue" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-leave-balance" id="btn-vl">
                                            <i class="fa fa-eye"></i> View</button>
                                        <button class="btn btn-sm green" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-edit-leave-balance" id="btn-vl-update">
                                            <i class="fa fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- end vacation leave -->

                        <!-- begin sick leave -->
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase"> Sick Leave</span>
                        </div>
                        <hr>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-vl" data-title="Vacation Leave">
                            <thead>
                                <tr>
                                    <th style="width: 140px;">Date</th>
                                    <th>Earned</th>
                                    <th>Abs.Und.W/ Pay</th>
                                    <th>Current Balance</th>
                                    <th>Previous Balance</th>
                                    <th>Abs.Und.W/o Pay</th>
                                    <th style="text-align: center;"> Action </th>
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
                                    <td align="center">
                                        <button class="btn btn-sm blue" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-leave-balance" id="btn-sl">
                                            <i class="fa fa-eye"></i> View</button>
                                        <button class="btn btn-sm green" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-edit-leave-balance" id="btn-sl-update">
                                            <i class="fa fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- end sick leave -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('modals/_leave_balance_modal'); ?>