<div id="incomeAdjustments" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold"><span class="modal-action"></span> Income</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/income_adjustment/'.$this->uri->segment(5), array('id' => 'frmInc_Adjustment'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <input type="hidden" name="txtaction" id="txtaction">
                        <input type="hidden" name="txtinc_id" id="txtinc_id">
                        <div class="col-md-12">
                            <label class="control-label col-md-12 div-payrolldate" style="padding: 0 !important;">Payroll Date<span class="required"> * </span></label>
                            <div class="form-group col-md-4" style="padding: 0 !important;">
                                <div class="input-icon right" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required bs-select" name="txtadjmon" id="seladjmon" placeholder="">
                                        <option value="">SELECT MONTH</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                                <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4" style="padding: 0 !important;">
                                <div class="input-icon right" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required bs-select" name="txtadjyr" id="seladjyr" placeholder="">
                                        <option value="">SELECT YEAR</option>
                                        <?php foreach (getYear() as $yr): ?>
                                            <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                                <?=$yr?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4" style="padding: 0 !important;">
                                <div class="input-icon right" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required bs-select" name="txtadjper" id="seladjper" placeholder="">
                                        <option value="">SELECT PERIOD</option>
                                        <?php $ctr = 1;
                                                foreach(setPeriods($empPayrollProcess) as $period): ?>
                                                <option value="<?=$ctr++?>" <?=isset($_GET['period']) ? $_GET['period'] == $ctr ? 'selected' : '' : ''?>>
                                                <?=$period?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="div-income">
                                <label class="control-label">Income<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control select2 form-required" name="selincome" id="selincome" placeholder="">
                                        <option value="">SELECT INCOME</option>
                                        <?php foreach($arrIncomes as $income): ?>
                                            <option value="<?=$income['incomeCode']?>"><?=$income['incomeDesc']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Amount<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtinc_amt" id="txtinc_amt">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Type<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control bs-select form-required" name="selinc_type" id="selinc_type">
                                        <option value="">SELECT TYPE</option>
                                        <?php foreach(adjustmentType() as $type): ?>
                                            <option value="<?=$type['id']?>"><?=$type['val']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <label class="control-label col-md-12 div-adjdate" style="padding: 0 !important;">Adjustment Date<span class="required"> * </span></label>
                            <div class="form-group col-md-6" style="padding: 0 !important;">
                                <div class="input-icon right col-md-12" style="padding: 0 !important;">
                                    <select class="form-control form-required bs-select" name="selinc_month" id="selinc_month" placeholder="">
                                        <option value="">Month</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>"><?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6" style="padding: 0 !important;">
                                <div class="input-icon right col-md-12" style="padding: 0 !important;">
                                    <select class="form-control form-required bs-select" name="selinc_yr" id="selinc_yr" placeholder="">
                                        <option value="">Year</option>
                                        <?php foreach (getYear() as $yr): ?>
                                            <option value="<?=$yr?>"><?=$yr?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-adj-income" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<div id="deductAdjustments" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Deduction <span class="modal-action"></span></h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/deduction_adjustment/'.$this->uri->segment(5), array('id' => 'frmDeduct_Adjustment'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <input type="hidden" name="txtded_action" id="txtded_action">
                        <input type="hidden" name="txtded_id" id="txtded_id">
                        <div class="col-md-12">
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Payroll Date<span class="required"> * </span></label>
                                <div class="input-icon right col-md-4" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required" name="txtadjmon" id="txtadjmon" placeholder="">
                                        <option value="null">SELECT MONTH</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                                <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-icon right col-md-4" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required" name="txtadjyr" id="txtadjyr" placeholder="">
                                        <option value="null">SELECT YEAR</option>
                                        <?php foreach(range((date('Y')-3), (date('Y')+3), +1) as $yr): ?>
                                            <option value="<?=$yr?>">
                                                <?=$yr?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-icon right col-md-4" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required" name="txtadjper" id="txtadjper" placeholder="">
                                        <option value="null">SELECT PERIOD</option>
                                        <?php foreach (periods() as $period): ?>
                                            <option value="<?=$period['id']?>" <?=isset($_GET['period']) ? $_GET['period'] == $period['id'] ? 'selected' : '' : ''?>>
                                                <?=$period['val']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="div-deduction">
                                <label class="control-label">Deduction<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control select2 form-required" name="seldeduct" id="seldeduct" placeholder="">
                                        <option value="null">SELECT DEDUCTION</option>
                                        <?php foreach($arrDeductions as $deduction): ?>
                                            <option value="<?=$deduction['deductionCode']?>"><?=$deduction['deductionDesc']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Amount<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtded_amt" id="txtded_amt">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control bs-select form-required" name="selded_type" id="selded_type">
                                        <option value="null">SELECT TYPE</option>
                                        <?php foreach(adjustmentType() as $type): ?>
                                            <option value="<?=$type['id']?>"><?=$type['val']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                <label class="control-label col-md-12" style="padding: 0 !important;">Adjustment Date<span class="required"> * </span></label>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required" name="selded_month" id="selded_month" placeholder="">
                                        <option value="null">Month</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>"><?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control form-required" name="selded_yr" id="selded_yr" placeholder="">
                                        <option value="null">Year</option>
                                        <?php foreach (getYear() as $yr): ?>
                                            <option value="<?=$yr?>"><?=$yr?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-adj-deduction" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<div id="delete_adjustment" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Adjustment</h4>
            </div>
            <?php 
                $mon = isset($_GET['mon']) ? $_GET['mon'] : '0';
                $yr  = isset($_GET['yr']) ? $_GET['yr'] : '0';
                $per = isset($_GET['period']) ? $_GET['period'] : '';
             ?>
            <?=form_open('finance/compensation/personnel_profile/delete_adjustment/'.$this->uri->segment(5).'?mon='.$mon.'&yr='.$yr.'&period='.$per, array('id' => 'frmdeleteAdj'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtdel_action" id="txtdel_action">
                            <input type="hidden" name="txtdel_id" id="txtdel_id">
                            <div class="form-group">
                                <label>Are you sure you want to delete this data?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-adj-delete" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<script src="<?=base_url('assets/js/custom/finance-adjustments.js')?>"></script>