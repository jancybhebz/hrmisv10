<?=form_open('', array('class' => 'form-horizontal', 'method' => 'get'))?>
<div class="tab-content">
    <div class="tab-pane active" id="tab-payroll">
        <h3 class="block">Select Benefits</h3>
        <div class="row form-body">
            <div class="col-md-4" id="div-loan">
                <div class="portlet light bordered">
                    <div class="portlet-title" style="min-height: 37px !important;">
                     <span class="caption-subject bold"> Loan</span>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox chkall"><input type="checkbox" id="chkall-loan" value="chkall"> Check All </label>
                            </div>
                            <?php foreach($arrLoan as $loan): ?>
                            <div class="col-md-6">
                                <label class="checkbox"><input type="checkbox" id="chkloan" value="<?=$loan['deductionCode']?>"> <?=ucwords($loan['deductionDesc'])?> </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="div-cont">
                <div class="portlet light bordered">
                    <div class="portlet-title" style="min-height: 37px !important;">
                     <span class="caption-subject bold"> Contribution</span>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox chkall"><input type="checkbox" id="chkall-cont" value="chkall"> Check All </label>
                            </div>
                            <?php foreach($arrContrib as $contr): ?>
                            <div class="col-md-6">
                                <label class="checkbox"><input type="checkbox" id="chkcont" value="<?=$contr['deductionCode']?>"> <?=ucwords($contr['deductionDesc'])?> </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="div-othr">
                <div class="portlet light bordered">
                    <div class="portlet-title" style="min-height: 37px !important;">
                     <span class="caption-subject bold"> Others</span>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox chkall"><input type="checkbox" id="chkall-othr" value="chkall"> Check All </label>
                            </div>
                            <?php foreach($arrOthers as $othrs): ?>
                            <div class="col-md-6">
                                <label class="checkbox"><input type="checkbox" id="chkothrs" value="<?=$othrs['deductionCode']?>"> <?=ucwords($othrs['deductionDesc'])?> </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="javascript:;" class="btn default btn-previous">
                <i class="fa fa-angle-left"></i> Back </a>
            <a href="<?=base_url('finance/payroll_update/process/reports')?>" class="btn blue btn-submit"> Process </a>
        </div>
    </div>
</div>
<?=form_close()?>