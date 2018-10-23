<?=load_plugin('css', array('datatables','select2'))?>
<div class="tab-pane active" id="tab_1_4">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title col-md-9">
                <center>
                    <form class="form-inline" role="form" method="get" action="" id="frmadjsearch">
                        <div class="col-md-3"></div>
                        <div class="form-group">
                            <label class="label-control">Payroll Date &nbsp;</label>
                            <select class="bs-select form-control" name="mon">
                                <option value="0">Month</option>
                                <?php foreach (range(1, 12) as $m): ?>
                                    <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                        <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                <?php endforeach; ?>
                            </select>
                            &nbsp;&nbsp;
                            <select class="bs-select form-control" name="yr">
                                <option value="0">Year</option>
                                <?php foreach (range(getyear(), date('Y')) as $yr): ?>
                                    <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                        <?=$yr?></option>
                                <?php endforeach; ?>
                            </select> 
                            &nbsp;&nbsp;
                            <select class="bs-select form-control" name="period">
                                <option value="">Period</option>
                                <?php foreach (periods() as $period): ?>
                                    <option value="<?=$period['id']?>" <?=isset($_GET['period']) ? $_GET['period'] == $period['id'] ? 'selected' : '' : ''?>>
                                        <?=$period['val']?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                        &nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </center>
                <br>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> Income</span>
                                </div>
                                <button class="btn btn-sm blue pull-right" id="btnaddIncome_adj"><i class="fa fa-plus"></i> Add</button>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="tabbable-line tabbable-full-width col-md-12">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-adj-income" >
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;"> Income </th>
                                                    <th style="text-align: center;"> Amount </th>
                                                    <th style="text-align: center;"> Type </th>
                                                    <th style="text-align: center;"> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($arrDataIncome as $adjincome): ?>
                                                <tr class="odd gradeX">
                                                    <td align="center"><?=$adjincome['incomeDesc']?></td>
                                                    <td align="center"><?=$adjincome['incomeAmount']?></td>
                                                    <td align="center"><?=adjustmentType($adjincome['type'])?></td>
                                                    <td align="center" style="width: 170px;">
                                                        <button class="btn btn-sm green" data-toggle="modal" href="#incomeAdjustments" id="btneditIncome_adj" data-json='<?=json_encode($adjincome)?>'>
                                                            <i class="fa fa-edit"></i> Edit</button>
                                                        <button class="btn btn-sm red" data-toggle="modal" href="#delete_adjustment" id="btndeleteIncome_adj" data-id='<?=$adjincome['code']?>'>
                                                            <i class="fa fa-trash"></i> Delete</button>
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
                                    <span class="caption-subject bold uppercase"> Deduction </span>
                                </div>
                                <button class="btn btn-sm blue pull-right" id="btnaddDeduct_adj"> <i class="fa fa-plus"></i> Add</button>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="tabbable-line tabbable-full-width col-md-12">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-adj-deductions" >
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;"> Deduction </th>
                                                    <th style="text-align: center;"> Amount </th>
                                                    <th style="text-align: center;"> Type </th>
                                                    <th style="text-align: center;"> Adjustment Date </th>
                                                    <th style="text-align: center;"> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($arrDataDeduct as $adjdeduct): ?>
                                                <tr class="odd gradeX">
                                                    <td align="center"><?=$adjdeduct['deductionDesc']?></td>
                                                    <td align="center"><?=$adjdeduct['deductAmount']?></td>
                                                    <td align="center"><?=adjustmentType($adjdeduct['type'])?></td>
                                                    <td align="center"><?=date('F', mktime(0, 0, 0, $adjdeduct['deductMonth'], 10))?> <?=$adjdeduct['deductYear']?></td>
                                                    <td align="center" style="width: 170px;">
                                                        <button class="btn btn-sm green" data-toggle="modal" href="#deductAdjustments" id="btneditdeduct_adj" data-json='<?=json_encode($adjdeduct)?>'>
                                                            <i class="fa fa-edit"></i> Edit</button>
                                                        <button class="btn btn-sm red" data-toggle="modal" href="#delete_adjustment" id="btndeletededuct_adj" data-id='<?=$adjdeduct['code']?>'>
                                                            <i class="fa fa-trash"></i> Delete</button>
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
            </div>
        </div>
    </div>
</div>
<?php include('modals/_modal_adjustments.php'); ?>
<?=load_plugin('js', array('datatables','form_validation','select2'))?>

<script>
    $(document).ready(function() {
        $('#table-adj-deductions, #table-adj-income').dataTable({"pageLength": 5});

        $('#table-adj-income').on('click', 'tbody > tr #btneditIncome_adj', function () {
            $('.modal-action').html('Update');
            $('#txtaction').val('edit');
            var data = $(this).data('json');
            $('#txtinc_id').val(data.code);
            $('#txtadjmon').val(data.adjustMonth);
            $('#txtadjyr').val(data.adjustYear);
            $('#txtadjper').val(data.adjustPeriod);
            $('#selincome').select2("val", data.incomeCode);
            $('#txtinc_amt').val(data.incomeAmount);
            $('#selinc_type').val(data.type);
            $('#selinc_month').val(data.incomeMonth);
            $('#selinc_yr').val(data.incomeYear);
        });

        $('#table-adj-income').on('click', 'tbody > tr #btndeleteIncome_adj', function () {
            $('#txtdel_action').val('income');
            $('#txtdel_id').val($(this).data('id'));
        });

        $('#table-adj-deductions').on('click', 'tbody > tr #btneditdeduct_adj', function () {
            $('.modal-action').html('Update');
            $('#txtded_action').val('edit');
            var data = $(this).data('json');
            $('#txtded_id').val(data.code);
            $('#txtadjmon').val(data.adjustMonth);
            $('#txtadjyr').val(data.adjustYear);
            $('#txtadjper').val(data.adjustPeriod);
            $('#seldeduct').select2("val", data.deductionCode);
            $('#txtded_amt').val(data.deductAmount);
            $('#selded_type').val(data.type);
            $('#selded_month').val(data.deductMonth);
            $('#selded_yr').val(data.deductYear);
        });

        $('#table-adj-deductions').on('click', 'tbody > tr #btndeletededuct_adj', function () {
            $('#txtdel_action').val('deduction');
            $('#txtdel_id').val($(this).data('id'));
        });

    });
</script>