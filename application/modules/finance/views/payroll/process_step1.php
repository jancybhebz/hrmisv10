<?=load_plugin('css', array('select','select2'))?>
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
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> Form Wizard -
                        <span class="step-title"> Step 1 of 4 </span>
                    </span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="#" class="form-horizontal" id="submit_form" method="POST">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span><br>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Payroll Period </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span><br>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Compensation Benefits </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step active">
                                        <span class="number"> 3 </span><br>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Listing of Employees </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab" class="step active">
                                        <span class="number"> 4 </span><br>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Listing of Employees </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab5" data-toggle="tab" class="step">
                                        <span class="number"> 5 </span><br>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Deduction Process </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success"> </div>
                            </div>
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
                                    <div class="form-group">
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
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default btn-previous">
                                            <i class="fa fa-angle-left"></i> Back </a>
                                        <a href="javascript:;" class="btn green btn-next"> Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="javascript:;" class="btn blue btn-submit"> Submit
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?=form_close()?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select','select2','form-wizard'))?>
<?php $this->load->view('_modal'); ?>
<script src="<?=base_url('assets/js/custom/payroll.js')?>" type="text/javascript"></script>
