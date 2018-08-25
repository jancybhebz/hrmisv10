<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-6">
        <!-- <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div> style="display: none"-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Regular Deduction List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-regDeductList" >
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th> Monthly </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;"> Actions </th>
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
                    <span class="caption-subject bold uppercase"> Loan List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-loanList" >
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th> Monthly </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;"> Actions </th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Contribution and Other Deductions</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-contandDeduct" >
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th> Monthly </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;"> Actions </th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('_modal.php'); ?>
<script>
    $(document).ready(function() {
        $('#table-regDeductList, #table-loanList, #table-contandDeduct').dataTable();
    });
</script>