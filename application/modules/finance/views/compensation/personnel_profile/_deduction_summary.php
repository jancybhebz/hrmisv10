<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="row">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th></th>
                            <th style="width: 30%">EMPLOYEE SHARE</th>
                            <th style="width: 30%">GOVERNMENT SHARE</th>
                        </tr>
                        <tr>
                            <td><b>Life and Retirement</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>PAG-IBIG Premium</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>PhilHealth Premium</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>ITW</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tabbable-line tabbable-custom-profile">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab-loans" data-toggle="tab"> Loans </a>
                </li>
                <li>
                    <a href="#tab-contributions" data-toggle="tab"> Contributions and Other Deducations </a>
                </li>
                <li>
                    <a href="#tab-finishedLoans" data-toggle="tab"> Finished Loans </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-loans">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-loans" >
                            <thead>
                                <tr>
                                    <th> Deduction Code </th>
                                    <th> Loan </th>
                                    <th> Amount </th>
                                    <th> Monthly Due </th>
                                    <th> Balance </th>
                                    <th> Due Date </th>
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
                        <button class="btn green" data-toggle="modal" href="#payrollDetails_modal"> <i class="fa fa-edit"></i> Edit</button>
                    </div>
                </div>

                <div class="tab-pane" id="tab-contributions">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-contributions" >
                            <thead>
                                <tr>
                                    <th> Deduction Code </th>
                                    <th> Description </th>
                                    <th> Amount </th>
                                    <th style="text-align: center;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn green" data-toggle="modal" href="#payrollDetails_modal"> <i class="fa fa-edit"></i> Edit</button>
                    </div>
                </div>

                <div class="tab-pane" id="tab-finishedLoans">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-finishedLoans" >
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Deduction Code </th>
                                    <th> Loan </th>
                                    <th> Amount </th>
                                    <th> Monthly Due </th>
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
                        <button class="btn green" data-toggle="modal" href="#positionDetails_modal"> <i class="fa fa-edit"></i> Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('_modal.php'); ?>
<script>
    $(document).ready(function() {
        $('#table-loans, #table-contributions, #table-finishedLoans').dataTable();
    });
</script>