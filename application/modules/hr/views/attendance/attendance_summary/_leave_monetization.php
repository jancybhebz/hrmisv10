<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Leave Credits Available as of [<?=count($arrLeaves) > 0 ? date('F', mktime(0, 0, 0, $arrLeaves[0]['periodMonth'], 10)).' '.$arrLeaves[0]['periodYear'] : date('F Y')?>]</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Actual Vacation Leave</td>
                                    <td style="width: 25%;"><?=number_format($vl_monetized,3)?></td>
                                    <td style="width: 25%;">Projected Vacation Leave</td>
                                    <td style="width: 25%;"></td>
                                </tr>
                                <tr>
                                    <td>Actual Sick Leave</td>
                                    <td><?=number_format($sl_monetized,3)?></td>
                                    <td>Projected Sick Leaves</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Total Leave Credits</td>
                                    <td colspan="3"><?=number_format(($vl_monetized + $sl_monetized), 3)?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="m-heading-1 border-blue m-bordered small" style="position: static;display: block;line-height: 1.8;">
                    Projected Leave = Actual Leave - Approved Leave <br>
                    <b>Approved Leaves from Jan to Nov</b><br>
                        "Monetization of 50% or more of all your accumulated leave credit may be allowable for valid and justifiable reasons subject to the discretion of the agency head and the availability of funds." <br>
                        "Sick leave credits may be monetized if an employee has no available vacation leave credits. Vacation leave credits must be exhausted first before sick leave credits maybe used." <br>
                        Five (5) days must be left at Vacation Leaves credits after monetization. <br>
                </div>
            </div>
        </div>
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn blue" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-leave-monetization-form" id="btn-monetize-leave">
                            <i class="fa fa-money"></i> &nbsp;Monetize Leave</button>&nbsp;
                        <button class="btn blue" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#monetize-form">
                            <i class="fa fa-money"></i> &nbsp;Monetize Form</button>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">LB Period</th>
                                    <th style="text-align: center;">Process Period</th>
                                    <th style="text-align: center;">VL</th>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Monetized Amount</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                                <?php foreach($arrMonetize as $montz): ?>
                                    <tr>
                                        <td><?=date('F', mktime(0, 0, 0, $montz['monetizeMonth'], 10))?> <?=$montz['monetizeYear']?></td>
                                        <td align="center"><?=date('F', mktime(0, 0, 0, $montz['processMonth'], 10))?> <?=$montz['processYear']?></td>
                                        <td align="center"><?=$montz['vlMonetize']?></td>
                                        <td align="center"><?=$montz['slMonetize']?></td>
                                        <td align="center"><?=$montz['monetizeAmount']?></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-sm blue" data-toggle="modal" id="btn-monetize-rollback" data-id="<?=$montz['mon_id']?>">
                                                <i class="fa fa-refresh"></i> &nbsp;Rollback</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modals/_leave_monetize_modal'); ?>
<script>
    $(document).ready(function() {
        $('button#btn-monetize-rollback').click(function() {
            $('#txt_monid').val($(this).data('id'));
            $('#modal-rollback').modal('show');
        });
    });
</script>