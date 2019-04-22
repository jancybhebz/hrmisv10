<?=form_open('', array('class' => 'form-horizontal', 'method' => 'get'))?>
<div class="tab-content">
    <div class="tab-pane active" id="tab-payroll">
        <h3 class="block">Process Payroll</h3>
        <div class="form-group">
            <label class="control-label col-md-3">Employee
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <select class="form-control bs-select" name="selemployment" id="selemployment">
                    <option value="null">-- SELECT EMPLOYEE --</option>
                    <?php   foreach ($arrAppointments as $appointment):
                                if($appointment['appointmentDesc'] != ''):
                                    if(isset($_SESSION['strUserPermission'])):
                                        if($_SESSION['strUserPermission'] == "Cashier Assistant"):
                                            if($appointment['appointmentCode']=='GIA'): ?>
                                                <option value="<?=$appointment['appointmentCode']?>"><?=$appointment['appointmentDesc']?></option><?php
                                            endif;
                                        endif;
                                    else: ?>
                                        <option value="<?=$appointment['appointmentCode']?>"><?=$appointment['appointmentDesc']?></option><?php
                                    endif;
                                endif;
                            endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Month
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <select class="form-control bs-select" name="mon" id="selmon">
                    <option value="null">-- SELECT MONTH --</option>
                    <?php foreach (range(1, 12) as $m): ?>
                        <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                            <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Year
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <select class="form-control bs-select" name="yr" id="selyr">
                    <option value="null">-- SELECT YEAR --</option>
                    <?php foreach (getYear() as $yr): ?>
                        <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('Y') == $yr?>>
                            <?=$yr?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group div-period">
            <label class="control-label col-md-3">Period
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <select class="form-control bs-select" name="period" id="selperiod">
                    <option value="null">-- SELECT PERIOD --</option>
                    <?php foreach (periods() as $per): ?>
                        <option value="<?=$per['val']?>" <?=isset($_GET['period']) ? $_GET['period'] == $per['val'] ? 'selected' : '' : ''?>>
                            <?=$per['val']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group div-date">
            <label class="control-label col-md-3">Date
                <span class="required"> * </span>
            </label>
            <div class="col-md-4">
                <div class="input-group date-picker input-daterange" data-date="2003" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="dateRange">
                    <input type="text" class="form-control form-required" id="txt_dtfrom"
                        value="<?=isset($arrem_ob) ? $arrem_ob['obDateFrom'] : ''?>">
                    <span class="input-group-addon"> to </span>
                    <input type="text" class="form-control form-required" id="txt_dtto"
                        value="<?=isset($arrem_ob) ? $arrem_ob['obDateTo'] : ''?>">
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
            <a href="javascript:;" id="btn_step1" class="btn blue btn-submit"> Save and Continue
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<?=form_close()?>