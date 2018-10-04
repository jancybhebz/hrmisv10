<?=load_plugin('css', array('profile-2','datepicker','datatables','select2'))?>
<div class="tab-pane active" id="tab_1_4">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="col-md-9">
                <form class="form-horizontal" action="<?=base_url('finance/compensation/personnel_profile/remittances/'.$this->uri->segment(5))?>" method="post">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Select remittance</label>
                        <div class="col-md-9">
                            <select class="form-control select2 form-required" name="selpayrollGrp" placeholder="">
                                <option value="null">SELECT REMITTANCE</option>
                                <?php foreach($arrDeductions as $deduct): ?>
                                    <option value="<?=$deduct['deductionCode']?>" <?=set_value('selpayrollGrp') == $deduct['deductionCode'] ? 'selected' : ''?>><?=$deduct['deductionDesc']?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Year</label>
                        <div class="col-md-9">
                            <div class="input-group input-large date-picker input-daterange" data-date="2003" data-date-format="yyyy" data-date-viewmode="years" id="dateRange">
                                <input type="text" class="form-control" name="from" value="<?=set_value('from')?>">
                                <span class="input-group-addon"> to </span>
                                <input type="text" class="form-control" name="to" value="<?=set_value('to')?>">
                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>

            <div class="portlet-title"></div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-hazards" >
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Deduction </th>
                                    <th> OR </th>
                                    <th> Month </th>
                                    <th> Year </th>
                                    <th> Amount </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; $totalRemittance = 0;
                                if(isset($arrRemittances)): foreach($arrRemittances as $remit): $totalRemittance = $totalRemittance + $remit['deductAmount']; ?>
                                <tr class="odd gradeX">
                                    <td><?=$no++?></td>
                                    <td><?=$remit['deductionDesc']?></td>
                                    <td><?=$remit['orNumber']?></td>
                                    <td><?=date('F', mktime(0, 0, 0, $remit['deductMonth'], 10));?></td>
                                    <td><?=$remit['deductYear']?></td>
                                    <td><?=$remit['deductAmount']?></td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align:right">Grand Total: &nbsp;</td>
                                    <td style="padding-left: 6px;"><?=number_format($totalRemittance, 2)?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('_modal.php'); ?>
<?=load_plugin('js', array('datepicker','datatables','select2'))?>
<script>
    $(document).ready(function() {
        $('#table-hazards').dataTable();
        $('#dateRange').datepicker( {
            format: ' yyyy',
            viewMode: 'years',
            minViewMode: 'years'
          });
    });
</script>