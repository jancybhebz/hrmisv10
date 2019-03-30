<?=load_plugin('css', array('profile-2','datatables'))?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-6">
        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Regular Deduction List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-checkable order-column" id="table-regDeductList" data-title="Regular Deduction">
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th style="width: 20px;"> Monthly </th>
                                    <?php 
                                        foreach(setPeriods($empPayrollProcess) as $period):
                                            echo '<th> '.$period.' </th>';
                                        endforeach; ?>
                                    <th> Status </th>
                                    <th style="text-align: center;width: 10px;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrDeductions as $deduction): $isremove = isset($deduction) ? $deduction['status'] == '0' ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px; word-wrap: break-word"><b><?=$deduction['deductionDesc']?></b></td>
                                    <td><?=number_format($deduction['monthly'], 2)?></td>
                                    <?php 
                                        foreach(range(1, count(setPeriods($empPayrollProcess))) as $p):
                                            echo '<td> '.number_format($deduction['period'.$p], 2).' </td>';
                                        endforeach; ?>
                                    <td><?=getincome_status($deduction['status'])?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#regularDeductions" id="btn-modal-premloans"
                                                data-period1="<?=$deduction['period1'] == '' ? '0.00' : $deduction['period1']?>"
                                                data-period2="<?=$deduction['period2'] == '' ? '0.00' : $deduction['period2']?>"
                                                data-period3="<?=$deduction['period3'] == '' ? '0.00' : $deduction['period3']?>"
                                                data-period4="<?=$deduction['period4'] == '' ? '0.00' : $deduction['period4']?>"

                                                data-deductioncode="<?=$deduction['deductionCode']?>" data-stat="deduction"
                                                data-deductcode="<?=$deduction['deductCode']?>"
                                                data-statusval="<?=$deduction['status']?>">
                                            <i class="fa fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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
                        <table class="table table-striped table-bordered table-checkable order-column" id="table-loanList" data-title="Loan List">
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th style="width: 20px;"> Monthly </th>
                                    <?php 
                                        foreach(setPeriods($empPayrollProcess) as $period):
                                            echo '<th> '.$period.' </th>';
                                        endforeach; ?>
                                    <th> Status </th>
                                    <th style="text-align: center;width: 10px;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrLoans as $loan): $isremove = isset($loan) ? $loan['status'] == '0' ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px; word-wrap: break-word"><b><?=$loan['deductionDesc']?></b></td>
                                    <td><?=number_format($loan['monthly'], 2)?></td>
                                     <?php 
                                        foreach(range(1, count(setPeriods($empPayrollProcess))) as $p):
                                            echo '<td> '.number_format($loan['period'.$p], 2).' </td>';
                                        endforeach; ?>
                                    <td><?=getincome_status($loan['status'])?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#regularDeductions" id="btn-modal-premloans"
                                                data-period1="<?=$loan['period1'] == '' ? '0.00' : $loan['period1']?>"
                                                data-period2="<?=$loan['period2'] == '' ? '0.00' : $loan['period2']?>"
                                                data-period3="<?=$loan['period3'] == '' ? '0.00' : $loan['period3']?>"
                                                data-period4="<?=$loan['period4'] == '' ? '0.00' : $loan['period4']?>"

                                                data-deductioncode="<?=$loan['deductionCode']?>" data-stat="loan"
                                                data-deductcode="<?=$loan['deductCode']?>"
                                                data-statusval="<?=$loan['status']?>">

                                            <i class="fa fa-edit"></i> Edit</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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
                        <table class="table table-striped table-bordered table-checkable order-column" id="table-contandDeduct" data-title="Contribution and Other Deductions">
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th style="width: 20px;"> Monthly </th>
                                    <?php 
                                        foreach(setPeriods($empPayrollProcess) as $period):
                                            echo '<th> '.$period.' </th>';
                                        endforeach; ?>
                                    <th> Status </th>
                                    <th style="text-align: center;width: 10px;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrContributions as $contri): $isremove = isset($contri) ? $contri['status'] == '0' ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px; word-wrap: break-word"><b><?=$contri['deductionDesc']?></b></td>
                                    <td><?=number_format($contri['monthly'], 2)?></td>
                                    <?php 
                                        foreach(range(1, count(setPeriods($empPayrollProcess))) as $p):
                                            echo '<td> '.number_format($contri['period'.$p], 2).' </td>';
                                        endforeach; ?>
                                    <td><?=getincome_status($contri['status'])?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#regularDeductions" id="btn-modal-premloans"
                                                data-period1="<?=$contri['period1'] == '' ? '0.00' : $contri['period1']?>"
                                                data-period2="<?=$contri['period2'] == '' ? '0.00' : $contri['period2']?>"
                                                data-period3="<?=$contri['period3'] == '' ? '0.00' : $contri['period3']?>"
                                                data-period4="<?=$contri['period4'] == '' ? '0.00' : $contri['period4']?>"

                                                data-deductioncode="<?=$contri['deductionCode']?>" data-stat="loan"
                                                data-deductcode="<?=$contri['deductCode']?>"
                                                data-statusval="<?=$contri['status']?>">

                                            <i class="fa fa-edit"></i> Edit</button>
                                    </td>
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
<?php include('modals/_modal_loans.php'); ?>
<?=load_plugin('js', array('datatables'))?>
<script>
    $(document).ready(function() {
        $('#table-regDeductList, #table-loanList, #table-contandDeduct').dataTable({"pageLength": 5});

        $('#table-regDeductList, #table-loanList, #table-contandDeduct').on('click', 'tbody > tr #btn-modal-premloans', function () {
            var el = $(this);
            $('#sub-title').html(el.closest('table').data('title'));
            $('#modal-title').html(el.parent().siblings(":first").text());
            $('#txtamount-bl').val(el.parent().siblings(":eq(1)").text());
            $('#txtperiod1-bl').val(el.data('period1'));
            $('#txtperiod2-bl').val(el.data('period2'));
            $('#txtperiod3-bl').val(el.data('period3'));
            $('#txtperiod4-bl').val(el.data('period4'));
            $('#selstatus-bl').val(el.data("statusval"));
            $('#selstatus-bl').selectpicker('refresh');
            $('#txtdeductcode').val(el.data("deductcode"));
            $('#txtdeductioncode').val(el.data("deductioncode"));
            $('#txtdeductionType').val(el.closest('table').data("title"));

            $('#txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').prev("i").hide();
            $('#txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').parent().parent().removeClass('has-error');
        });
    });
</script>