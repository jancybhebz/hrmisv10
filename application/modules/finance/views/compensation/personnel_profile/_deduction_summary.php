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
                            <td align="center"><?=number_format($lifeRetirement['empShare'], 2)?></td>
                            <td align="center"><?=number_format($lifeRetirement['emprShare'], 2)?></td>
                        </tr>
                        <tr>
                            <td><b>PAG-IBIG Premium</b></td>
                            <td align="center"><?=number_format($pagibig['empShare'], 2)?></td>
                            <td align="center"><?=number_format($pagibig['emprShare'], 2)?></td>
                        </tr>
                        <tr>
                            <td><b>PhilHealth Premium</b></td>
                            <td align="center"><?=number_format($philhealth['empShare'], 2)?></td>
                            <td align="center"><?=number_format($philhealth['emprShare'], 2)?></td>
                        </tr>
                        <tr>
                            <td><b>ITW</b></td>
                            <td align="center"><?=number_format($itw, 2)?></td>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrLoans as $loans): ?>
                                <tr class="odd gradeX">
                                    <td style="text-align: left !important; padding-left: 15px;"><?=$loans['deductionCode']?></td>
                                    <td align="center"><?=$loans['deductionDesc']?></td>
                                    <td align="center"><?=number_format($loans['amountGranted'], 2)?></td>
                                    <td align="center"><?=number_format($loans['deductAmount'], 2)?></td>
                                    <td align="center"><?=number_format($loans['total_remit'], 2)?></td>
                                    <td align="center"><?=date('M', mktime(0, 0, 0, $loans['actualEndMonth'], 10));?> <?=$loans['actualEndYear']?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrContributions as $contri): ?>
                                <tr class="odd gradeX">
                                    <td style="text-align: left !important; padding-left: 15px;"><?=$contri['deductionCode']?></td>
                                    <td align="center"><?=$contri['deductionDesc']?></td>
                                    <td align="center"><?=number_format($contri['deductAmount'], 2)?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrFinishedLoans as $fLoan): ?>
                                <tr class="odd gradeX">
                                    <td align="center"><?=$fLoan['deductCode']?></td>
                                    <td align="center"><?=$fLoan['deductionCode']?></td>
                                    <td align="center"><?=$fLoan['deductionDesc']?></td>
                                    <td align="center"><?=number_format($fLoan['amountGranted'],2)?></td>
                                    <td align="center"><?=number_format($fLoan['deductAmount'],2)?></td>
                                </tr>
                                <?php endforeach; ?>
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
        $('#table-loans, #table-contributions, #table-finishedLoans').dataTable({"pageLength": 5});
    });
</script>