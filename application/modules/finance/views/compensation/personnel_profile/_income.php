<?=load_plugin('css', array('profile-2','datatables'))?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-6">
        <div class="portlet light bordered" style="height: 514px;">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Benefit List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-benefitList" data-title="Benefit">
                            <thead>
                                <tr>
                                    <th style="width: 140px;"> Benefit </th>
                                    <th> Monthly </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($benefitList as $benefit): $isremove = isset($benefit['arrbenefits']) ? $benefit['arrbenefits']['status'] == 0 ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px;"><b><?=$benefit['incomeDesc']?></b></td>
                                    <td><?=isset($benefit['arrbenefits']) ? 
                                            number_format($benefit['arrbenefits']['incomeAmount'], 2) : '0.00'?></td>
                                    <td><?=isset($benefit['arrbenefits']) ? 
                                            number_format($benefit['arrbenefits']['period1'], 2) : '0.00'?></td>
                                    <td><?=isset($benefit['arrbenefits']) ? 
                                            number_format($benefit['arrbenefits']['period2'], 2) : '0.00'?></td>
                                    <td><?=isset($benefit['arrbenefits']) ? 
                                            getincome_status($benefit['arrbenefits']['status']) : ''?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#benefitList" id="btn-modal-benefitList"
                                                data-incomecode="<?=$benefit['incomeCode']?>" data-stat="benefit"
                                                data-benefitcode="<?=isset($benefit['arrbenefits']) ? $benefit['arrbenefits']['benefitCode'] : ''?>"
                                                data-tax="<?=isset($benefit['arrbenefits']) ? $benefit['arrbenefits']['ITW'] : '0.00'?>"
                                                data-statusval="<?=isset($benefit['arrbenefits']) ? $benefit['arrbenefits']['status'] : "null"?>">

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
                    <span class="caption-subject bold uppercase"> Longevity Pay</span>
                </div>
                <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" href="#longevityModal" id="btn-add-longevity" data-title="Longevity Pay">
                    <i class="fa fa-plus"></i> Add New</button>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-longevityPay" >
                            <thead>
                                <tr>
                                    <th style="width: 120px;"> Longevity Date </th>
                                    <th> Salary </th>
                                    <th> Percent </th>
                                    <th> LP </th>
                                    <th style="text-align: center;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalLP = 0; foreach($arrLongevity as $longe): $totalLP = $totalLP + $longe['longiPay']; ?>
                                <tr class="odd gradeX">
                                    <td><?=$longe['longiDate']?></td>
                                    <td><?=number_format($longe['longiAmount'], 2)?></td>
                                    <td><?=$longe['longiPercent']?></td>
                                    <td><?=number_format($longe['longiPay'], 2)?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#longevityModal" id="btn-modal-longevity"
                                            data-longeid="<?=$longe['id']?>" >
                                            <i class="fa fa-edit"></i> Edit</button>
                                        <button data-toggle="modal" href="#deleteLongevity" class="btn btn-sm red" id="btn-del-longevity"
                                            data-longeid="<?=$longe['id']?>" >
                                            <i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" style="text-align:right">Longevity Pay: &nbsp;</td>
                                    <td style="padding-left: 6px;"><?=number_format($totalLP, 2)?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="portlet light bordered" style="height: 514px;">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Bonus List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-bonusList" data-title="Bonus">
                            <thead>
                                <tr>
                                    <th style="width:120px;"> Benefit </th>
                                    <th> Monthly </th>
                                    <th> Tax </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrBonuslist as $bonus): $isremove = isset($bonus['arrbenefits']) ? $bonus['arrbenefits']['status'] == 0 ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px;"><b><?=$bonus['incomeDesc']?></b></td>
                                    <td><?=isset($bonus['arrbenefits']) ? 
                                            number_format($bonus['arrbenefits']['incomeAmount'], 2) : '0.00'?></td>
                                    <td><?=isset($bonus['arrbenefits']) ? 
                                            number_format($bonus['arrbenefits']['ITW'], 2) : '0.00'?></td>
                                    <td><?=isset($bonus['arrbenefits']) ? 
                                            number_format($bonus['arrbenefits']['period1'], 2) : '0.00'?></td>
                                    <td><?=isset($bonus['arrbenefits']) ? 
                                            number_format($bonus['arrbenefits']['period2'], 2) : '0.00'?></td>
                                    <td><?=isset($bonus['arrbenefits']) ? 
                                            getincome_status($bonus['arrbenefits']['status']) : ''?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#benefitList" id="btn-modal-benefitList"
                                                data-incomecode="<?=$bonus['incomeCode']?>" data-stat="bonus"
                                                data-benefitcode="<?=isset($bonus['arrbenefits']) ? $bonus['arrbenefits']['benefitCode'] : ''?>"
                                                data-tax="<?=isset($bonus['arrbenefits']) ? $bonus['arrbenefits']['ITW'] : '0.00'?>"
                                                data-statusval="<?=isset($bonus['arrbenefits']) ? $bonus['arrbenefits']['status'] : "null"?>">
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
                    <span class="caption-subject bold uppercase"> Additional Income List</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-incomeList" data-title="Additional Income" >
                            <thead>
                                <tr>
                                    <th style="width:120px;"> Benefit </th>
                                    <th> Monthly </th>
                                    <th> Tax </th>
                                    <th> Period 1 </th>
                                    <th> Period 2 </th>
                                    <th> Status </th>
                                    <th style="text-align: center;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arrAddtlIncome as $addtl): $isremove = isset($addtl['arrbenefits']) ? $addtl['arrbenefits']['status'] == 0 ? True : False : '';?>
                                <tr class="odd gradeX <?=$isremove ? 'danger' : ''?>">
                                    <td style="text-align: left; padding-left: 7px;"><b><?=$addtl['incomeDesc']?></b></td>
                                    <td><?=isset($addtl['arrbenefits']) ? 
                                            number_format($addtl['arrbenefits']['incomeAmount'], 2) : '0.00'?></td>
                                    <td><?=isset($addtl['arrbenefits']) ? 
                                            number_format($addtl['arrbenefits']['ITW'], 2) : '0.00'?></td>
                                    <td><?=isset($addtl['arrbenefits']) ? 
                                            number_format($addtl['arrbenefits']['period1'], 2) : '0.00'?></td>
                                    <td><?=isset($addtl['arrbenefits']) ? 
                                            number_format($addtl['arrbenefits']['period2'], 2) : '0.00'?></td>
                                    <td><?=isset($addtl['arrbenefits']) ? 
                                            getincome_status($addtl['arrbenefits']['status']) : ''?></td>
                                    <td align="center">
                                        <button class="btn btn-sm green" data-toggle="modal" href="#benefitList" id="btn-modal-benefitList"
                                            data-incomecode="<?=$addtl['incomeCode']?>" data-stat="addtl"
                                            data-benefitcode="<?=isset($addtl['arrbenefits']) ? $addtl['arrbenefits']['benefitCode'] : ''?>"
                                            data-tax="<?=isset($addtl['arrbenefits']) ? $addtl['arrbenefits']['ITW'] : '0.00'?>"
                                            data-statusval="<?=isset($addtl['arrbenefits']) ? $addtl['arrbenefits']['status'] : ""?>">
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
<?php include('modals/_modal_income.php'); ?>
<?php load_plugin('js',array('datatables'));?>
<script>
    $(document).ready(function() {
        $('#table-benefitList, #table-bonusList, #table-longevityPay, #table-incomeList').dataTable({"pageLength": 5});

        $('#table-benefitList, #table-bonusList, #table-incomeList').on('click', 'tbody > tr #btn-modal-benefitList', function () {
            var el = $(this);
            $('#div-tax').hide();
            $('#sub-title').html(el.closest('table').data('title'));
            $('#modal-title').html(el.parent().siblings(":first").text());
            $('#txtamount-bl').val(el.parent().siblings(":eq(1)").text());
            $('#txtperiod1-bl').val(el.parent().siblings(":eq(2)").text());
            $('#txtperiod2-bl').val(el.parent().siblings(":eq(3)").text());
            $('#selstatus-bl').val(el.data("statusval"));
            $('#txtincomecode').val(el.data("incomecode"));
            $('#txtbenefitcode').val(el.data("benefitcode"));
            $('#txttax-bl').val(el.data("tax"));
            $('#txtbenefitType').val(el.closest('table').data("title"));
            if(el.data("stat") == 'bonus') { $('#div-tax').show(); }
        });

        $('#table-longevityPay').on('click', 'tbody > tr #btn-modal-longevity', function () {
            $('#sub-title').html($(this).closest('table').data('title'));
            $('#txtlongevitydate-bl').val($(this).parent().siblings(":first").text());
            $('#txtsalary-bl').val($(this).parent().siblings(":eq(1)").text());
            $('#txtpercent-bl').val($(this).parent().siblings(":eq(2)").text());
            $('#txtaction').val('edit');
            $('#txtlongevityid').val($(this).data("longeid"));
        });

        $('#btn-add-longevity').on('click', function () {
            $('#txtaction').val('add');
            $('#txtlongevitydate-bl').val('');
            $('#txtsalary-bl').val('');
            $('#txtpercent-bl').val('');
        });

        $('#table-longevityPay').on('click', 'tbody > tr #btn-del-longevity', function () {
            $('#txtdel_action').val('del');
            $('#txtdel_longevityid').val($(this).data("longeid"));
        });

    });
</script>