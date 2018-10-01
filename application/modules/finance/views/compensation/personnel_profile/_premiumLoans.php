<?=load_plugin('css', array('profile-2'))?>
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
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-regDeductList" data-title="Regular Deduction">
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th style="width: 20px;"> Monthly </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;width: 10px;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrDeductions as $deduction): $isremove = isset($deduction) ? $deduction['status'] == '0' ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px; word-wrap: break-word"><b><?=$deduction['deductionDesc']?></b></td>
                                    <td><?=number_format($deduction['monthly'], 2)?></td>
                                    <td><?=number_format($deduction['period1'], 2)?></td>
                                    <td><?=number_format($deduction['period2'], 2)?></td>
                                    <td><?=getincome_status($deduction['status'])?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#regularDeductions" id="btn-modal-regDeductions"
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
<?php include('modals/_modal_loans.php'); ?>
<script>
    $(document).ready(function() {
        $('#table-regDeductList').dataTable({"pageLength": 5});

        $('#table-regDeductList').on('click', 'tbody > tr #btn-modal-regDeductions', function () {
            var el = $(this);
            $('#sub-title').html(el.closest('table').data('title'));
            $('#modal-title').html(el.parent().siblings(":first").text());
            $('#txtamount-bl').val(el.parent().siblings(":eq(1)").text());
            $('#txtperiod1-bl').val(el.parent().siblings(":eq(2)").text());
            $('#txtperiod2-bl').val(el.parent().siblings(":eq(3)").text());
            $('#selstatus-bl').val(el.data("statusval"));
            $('#txtdeductcode').val(el.data("deductcode"));
            $('#txtdeductioncode').val(el.data("deductioncode"));
            $('#txtdeductionType').val(el.closest('table').data("title"));
        });
    });
</script>