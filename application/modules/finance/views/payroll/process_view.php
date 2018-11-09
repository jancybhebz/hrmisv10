<?=load_plugin('css', array('select'))?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Finance Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Reports</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Monthly Report</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row profile-account">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> MONTHLY REPORTS</span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="display: none">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <?=form_open('', array('class' => 'form-inline', 'method' => 'get'))?>
                            <div class="col-md-2"></div>
                            <div class="form-group">
                                <label class="control-label">Employee</label>
                                <select class="form-control bs-select" name="selemployment" id="selemployment">
                                    <option value="null">-- SELECT EMPLOYEE --</option>
                                    <?php   foreach ($arrAppointments as $appointment):
                                                if($appointment['appointmentDesc'] != ''):
                                                    if($_SESSION['strUserPermission'] == "Cashier Assistant"):
                                                        if($appointment['appointmentCode']=='GIA'): ?>
                                                            <option value="<?=$appointment['appointmentCode']?>"
                                                                <?=isset($_GET) ? $appointment['appointmentCode'] == $_GET['selemployment'] ? 'selected': '' : ''?>>
                                                                <?=$appointment['appointmentDesc']?></option><?php
                                                        endif;
                                                    else: ?>
                                                        <option value="<?=$appointment['appointmentCode']?>"
                                                            <?=isset($_GET) ? $appointment['appointmentCode'] == $_GET['selemployment'] ? 'selected': '' : ''?>>
                                                            <?=$appointment['appointmentDesc']?></option><?php
                                                    endif;
                                                endif;
                                            endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Month</label>
                                <select class="form-control bs-select" name="mon" id="selmon">
                                    <option value="null">-- SELECT MONTH --</option>
                                    <?php foreach (range(1, 12) as $m): ?>
                                        <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                            <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Year</label>
                                <select class="form-control bs-select" name="yr" id="selyr">
                                    <option value="null">-- SELECT YEAR --</option>
                                    <?php foreach (getYear() as $yr): ?>
                                        <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                            <?=$yr?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">PERIOD</label>
                                <select class="form-control bs-select" name="period" id="selperiod">
                                    <option value="null">-- SELECT PERIOD --</option>
                                    <?php foreach (periods() as $per): ?>
                                        <option value="<?=$per['val']?>" <?=isset($_GET['period']) ? $_GET['period'] == $per['val'] ? 'selected' : '' : ''?>>
                                            <?=$per['val']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <button class="btn blue" style="margin-top: 19px !important">Submit</button>
                            </div>

                        <?=form_close()?>
                        <br><br>
                    </div>
                    <div class="portlet-body">
                        <!-- <div class="loading-img-portlet"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div> -->
                        <!-- Monthly Benefits -->
                        <div class="row" id="row-benefit" <?=count($arrBenefit) > 0 ? '' : 'hidden'?>>
                            <div class="col-md-12" style="margin-left: 40px;">
                                <label class="checkbox"><input type="checkbox" id="chkall-benefit" value="chkall"> Check All </label>
                                <div class="portlet-body" id="div-benefit">
                                    <?php foreach($arrBenefit as $benefit): ?>
                                        <div class="col-md-3"><label class="checkbox"><input type="checkbox" id="chkall-benefit" value="<?=$benefit['incomeCode']?>"> <?=ucwords($benefit['incomeDesc'])?> </label></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <hr id="row-benefit" />

                        <!-- Bonus -->
                        <div class="row" id="row-bonus" <?=count($arrBonus) > 0 ? '' : 'hidden'?>>
                            <div class="col-md-12" style="margin-left: 40px;">
                                <label class="checkbox chkall"><input type="checkbox" id="chkall-bonus" value="chkall"> Check All </label>
                                <div class="portlet-body" id="div-bonus">
                                    <?php foreach($arrBonus as $bonus): ?>
                                        <div class="col-md-3"><label class="checkbox"><input type="checkbox" id="chkall-bonus" value="<?=$bonus['incomeCode']?>"> <?=ucwords($bonus['incomeDesc'])?> </label></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <hr id="row-bonus" />

                        <!-- Income -->
                        <div class="row" id="row-income" <?=count($arrIncome) > 0 ? '' : 'hidden'?>>
                            <div class="col-md-12" style="margin-left: 40px;">
                                <label class="checkbox chkall"><input type="checkbox" id="chkall-income" value="chkall"> Check All </label>
                                <div class="portlet-body" id="div-income">
                                    <?php foreach($arrIncome as $income): ?>
                                        <div class="col-md-3"><label class="checkbox"><input type="checkbox" id="chkall-bonus" value="<?=$income['incomeCode']?>"> <?=ucwords($income['incomeDesc'])?> </label></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn red pull-right" data-target="#modal-process" data-backdrop="static" data-toggle="modal" data-keyboard="false">PROCESS</button>
                <label class="pull-right" style="padding: 10px 10px;line-height: 10px;">
                    <input type="checkbox" id="chkprocess" value="process"> Check employee with netpay below 5,000</label>
                <br><br>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select','form_validation'))?>
<?php $this->load->view('_modal'); ?>
<script src="<?=base_url('assets/js/custom/payroll.js')?>" type="text/javascript"></script>
