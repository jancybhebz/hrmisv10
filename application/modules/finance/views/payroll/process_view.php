<?=load_plugin('css', array('select','select2','datepicker'))?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
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
                    <span class="caption-subject bold uppercase"> Update OR Remittances </span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="display: none">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?=form_open('', array('method' => 'post', 'id' => 'frmto'))?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Process Date <span class="required"> * </span></label>
                                        <div class="input-icon right">
                                            <i class="fa fa-warning tooltips i-required"></i>
                                            <select class="bs-select form-control form-required" name="selproc_mon" id="selproc_mon">
                                                <option value="all">All</option>
                                                <?php foreach (range(1, 12) as $m): ?>
                                                    <option value="<?=sprintf('%02d', $m)?>"
                                                        <?php 
                                                            if(isset($_GET['month'])):
                                                                echo $_GET['month'] == $m ? 'selected' : '';
                                                            else:
                                                                echo $m == sprintf('%02d', date('n')) ? 'selected' : '';
                                                            endif;
                                                            ?> >
                                                        <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">&nbsp;</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-warning tooltips i-required"></i>
                                            <select class="bs-select form-control form-required" name="selproc_yr" id="selproc_yr">
                                                <?php foreach (getYear() as $yr): ?>
                                                    <option value="<?=$yr?>"
                                                        <?php 
                                                            if(isset($_GET['yr'])):
                                                                echo $_GET['yr'] == $yr ? 'selected' : '';
                                                            else:
                                                                echo $yr == date('Y') ? 'selected' : '';
                                                            endif;
                                                            ?> >  
                                                    <?=$yr?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Payroll Salary <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="selproc_sal" id="selproc_sal">
                                            <option value=""> </option>
                                            <?php 
                                                foreach($arrpayroll as $payroll):
                                                    $period = $payroll['employeeAppoint'] != 'P' ? ' - Period '.$payroll['period'] : '';
                                                    echo '<option value="'.$payroll['processID'].'">'.$payroll['processCode'].$period.' ('.$payroll['employeeAppoint'].')'.'</option>';
                                                endforeach;
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Employee name <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="select2 form-control form-required" name="selproc_emp" id="selproc_emp">
                                            <option value="">  </option>
                                            <?php 
                                                foreach($arremployees as $emp):
                                                    echo '<option value="'.$emp['empNumber'].'">'.getfullname($emp['firstname'],$emp['surname'],$emp['middlename'],$emp['middleInitial'],$emp['nameExtension']).'</option>';
                                                endforeach;
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <pre><?php print_r($deduction_list) ?></pre>
                                    <label class="control-label">Deduction List <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="select2 form-control form-required" name="selproc_deduction" id="selproc_deduction">
                                            <option value="null">-- SELECT FUND SOURCE --</option>
                                            <?php 
                                                foreach(array('Fund 101', 'Fund 102') as $fund):
                                                    $selected = isset($arrempto) ? $fund == $arrempto['fund'] ? 'selected' : '' : '';
                                                    echo '<option value="'.$fund.'" '.$selected.'>'.$fund.'</option>';
                                                endforeach;
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">OR No. / TRA <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">OR Date <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <input class="form-control date-picker form-required" data-date-format="yyyy-mm-dd" 
                                                name="txtcompen_date" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-check"></i> Update OR Remittance </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/to/')?>" class="btn blue">
                                        <i class="icon-ban"></i> Cancel</a>
                                </div>
                            </div>
                        </div>

                        </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select','select2','datepicker','form_validation'))?>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('#div-body').show();

        $('.date-picker').datepicker();
        $('.date-picker').on('changeDate', function(){
            $(this).datepicker('hide');
        });
    });
</script>