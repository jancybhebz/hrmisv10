<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Benefit List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-benefitList" >
                            <thead>
                                <tr>
                                    <th> Benefit </th>
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
                    <span class="caption-subject bold uppercase"> Longevity Pay</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-longevityPay" >
                            <thead>
                                <tr>
                                    <th> Longevity Date </th>
                                    <th> Salary </th>
                                    <th> Percent </th>
                                    <th> LP </th>
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
                    <span class="caption-subject bold uppercase"> Bonus List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-bonusList" >
                            <thead>
                                <tr>
                                    <th> Benefit </th>
                                    <th> Monthly </th>
                                    <th> Tax </th>
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
                    <span class="caption-subject bold uppercase"> Additional Income List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-incomeList" >
                            <thead>
                                <tr>
                                    <th> Benefit </th>
                                    <th> Monthly </th>
                                    <th> Tax </th>
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
                                    <td></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td></td>
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
        $('#table-benefitList, #table-bonusList, #table-longevityPay, #table-incomeList').dataTable();
    });
</script>