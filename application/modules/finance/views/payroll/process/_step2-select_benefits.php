<?=form_open('finance/payroll_update/process/compute_benefits?appt='.$_GET['appt'].'&month='.$_GET['month'].'&yr='.$_GET['yr'].'&datefrom='.$_GET['datefrom'].'&dateto='.$_GET['dateto'], array('class' => 'form-horizontal', 'method' => 'post'))?>
<div class="tab-content">
    <div class="tab-pane active" id="tab-payroll">
        <h3 class="block">Select Benefits</h3>
        <div class="portlet-body">
            <!-- Monthly Benefits -->
            <div class="row" id="row-benefit" <?=count($arrBenefit) > 0 ? '' : 'hidden'?>>
                <div class="col-md-11" style="margin-left: 40px;">
                    <label class="checkbox"><input type="checkbox" id="chkall-benefit" value="chkall" <?=isset($_GET['appt']) ? strtolower($_GET['appt']) == 'p' ? 'checked' : '' : ''?>> Check All </label>
                    <div class="portlet-body" id="div-benefit">
                        <?php foreach($arrBenefit as $benefit): ?>
                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="chkbenefit[]" value="<?=$benefit['incomeCode']?>" <?=isset($_GET['appt']) ? strtolower($_GET['appt']) == 'p' ? 'checked' : '' : ''?>> <?=ucwords($benefit['incomeDesc'])?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <hr id="row-benefit" />

            <!-- Bonus -->
            <div class="row" id="row-bonus" <?=count($arrBonus) > 0 ? '' : 'hidden'?>>
                <div class="col-md-11" style="margin-left: 40px;">
                    <label class="checkbox chkall"><input type="checkbox" id="chkall-bonus" value="chkall"> Check All </label>
                    <div class="portlet-body" id="div-bonus">
                        <?php foreach($arrBonus as $bonus): ?>
                            <div class="col-md-3"><label class="checkbox"><input type="checkbox" name="chkbonus[]" value="<?=$bonus['incomeCode']?>"> <?=ucwords($bonus['incomeDesc'])?> </label></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <hr id="row-bonus" />

            <!-- Income -->
            <div class="row" id="row-income" <?=count($arrIncome) > 0 ? '' : 'hidden'?>>
                <div class="col-md-11" style="margin-left: 40px;">
                    <label class="checkbox chkall"><input type="checkbox" id="chkall-income" value="chkall"> Check All </label>
                    <div class="portlet-body" id="div-income">
                        <?php foreach($arrIncome as $income): ?>
                            <div class="col-md-3"><label class="checkbox"><input type="checkbox" name="chkincome[]" value="<?=$income['incomeCode']?>"> <?=ucwords($income['incomeDesc'])?> </label></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <br><br>

    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="<?=base_url('finance/payroll_update/process/index?appt='.$_GET['appt'].'&month='.$_GET['month'].'&yr='.$_GET['yr'].'&datefrom='.$_GET['datefrom'].'&dateto='.$_GET['dateto'])?>" class="btn default btn-previous">
                <i class="fa fa-angle-left"></i> Back </a>
            <button type="submit" class="btn blue btn-submit"> Compute </button>
        </div>
    </div>
</div>
<?=form_close()?>