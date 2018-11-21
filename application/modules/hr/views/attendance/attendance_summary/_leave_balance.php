<?=load_plugin('css', array('profile-2','datatables'))?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Vacation Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
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
                                        <button class="btn btn-sm blue"><i class="fa fa-eye"></i> View</button>
                                        <button class="btn btn-sm green"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-sm red"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Sick Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
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
                                        <button class="btn btn-sm blue"><i class="fa fa-eye"></i> View</button>
                                        <button class="btn btn-sm green"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-sm red"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <small>"If the employee reach the compulsory retirement age of 65 but the service has been extended, the employee will NO LONGER EARN leave credits."</small>
    </div>

</div>

<?php load_plugin('js',array('datatables'));?>
<script>
    $(document).ready(function() {
        $('#table-vl, #table-sl').dataTable();
    });
</script>