<div class="form-horizontal">
    <div class="loading-fade" style="display: none;width: 80%;height: 50%;">
        <center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center>
    </div>
    <?=form_open('finance/payroll_update/process/select_benefits', array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'frmprocess'))?>
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
                                                    <option value="<?=$appointment['appointmentCode']?>"
                                                        <?=isset($_GET['appt']) ? $_GET['appt'] == $appointment['appointmentCode'] ? 'selected' : '' : ''?>>
                                                        <?=$appointment['appointmentDesc']?></option><?php
                                                endif;
                                            endif;
                                        else: ?>
                                            <option value="<?=$appointment['appointmentCode']?>"
                                                <?=isset($_GET['appt']) ? $_GET['appt'] == $appointment['appointmentCode'] ? 'selected' : '' : ''?>>
                                                <?=$appointment['appointmentDesc']?></option><?php
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
                            <option value="<?=$m?>" <?=isset($_GET['month']) ? $_GET['month'] == $m ? 'selected' : '' : date('n') == $m ? 'selected' : ''?>>
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
            <div class="form-group div-period" <?=isset($_GET['appt']) ? strtolower($_GET['appt']) == 'p' ? 'hidden' : '' : ''?>>
                <label class="control-label col-md-3">Period
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <select class="form-control bs-select" name="period" id="selperiod">
                        <option value="null">-- SELECT PERIOD --</option>
                        <?php foreach (periods() as $per): ?>
                            <option value="<?=$per['id']?>" <?=isset($_GET['period']) ? $_GET['period'] == $per['val'] ? 'selected' : '' : ''?>>
                                <?=$per['val']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group div-date" <?=isset($_GET['appt']) ? strtolower($_GET['appt']) == 'p' ? 'hidden' : '' : ''?>>
                <label class="control-label col-md-3">Date
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-group date-picker input-daterange" data-date="2003" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="dateRange">
                        <input type="text" class="form-control form-required" id="txt_dtfrom">
                        <span class="input-group-addon"> to </span>
                        <input type="text" class="form-control form-required" id="txt_dtto">
                    </div>
                </div>
            </div>
            <div class="div-datause" style="display: none;">
                <div class="row">
                    <label class="control-label col-md-3"></label>
                    <label class="control-label col-md-4">
                        <div class="caption">
                            <span class="caption-subject font-black bold uppercase pull-left" style="padding-bottom: 5px;">Data Use</span>
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Month
                        <span class="required"> * </span>
                    </label>
                    <div class="col-md-4">
                        <select class="form-control bs-select" name="data_fr_mon" id="data_fr_mon">
                            <option value="null">-- SELECT MONTH --</option>
                            <?php foreach (range(1, 12) as $m): ?>
                                <option value="<?=$m?>" <?=isset($_GET['month']) ? $_GET['month']-1 == $m ? 'selected' : '' : date('n')-1 == $m ? 'selected' : ''?>>
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
                        <select class="form-control bs-select" name="data_fr_yr" id="data_fr_yr">
                            <option value="null">-- SELECT YEAR --</option>
                            <?php foreach (getYear() as $yr): ?>
                                <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('Y') == $yr?>>
                                    <?=$yr?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" id="btn_step1" class="btn blue btn-submit"> Save and Continue
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?=form_close()?>

<script>
    $(document).ready(function() {
        $('button#btn_step1').on('click', function() {
            $('.loading-fade').show();
        });
    });
</script>