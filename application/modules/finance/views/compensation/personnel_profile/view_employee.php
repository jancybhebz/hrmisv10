<?php
    $modulename = array('','HR','Financial','Officer','Executive','Employee');
    load_plugin('css',array('select'));
    $this_page = $this->uri->segment(4);
    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?=$modulename[$_SESSION['sessUserLevel']]?> Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Compensation</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Personnel Profile</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?=$arrData['firstname']?> <?=$arrData['middleInitial']?>. <?=$arrData['surname']?></span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<br>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Personnel Profile</span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div style="height: 560px;" id="div_hide"></div>
                    <div class="portlet-body"  id="employee_view" style="display: none">
                        <div class="row">
                            <div class="tabbable-line tabbable-full-width col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="<?=$this_page == 'employee' ? 'active' : ''?>">
                                        <a href="<?=base_url('finance/compensation/personnel_profile/employee/').$this->uri->segment(5)?>"> Personnel Profile </a>
                                    </li>
                                    <li class="<?=$this_page == 'income' ? 'active' : ''?>">
                                        <a href="<?=base_url('finance/compensation/personnel_profile/income/').$this->uri->segment(5)?>"> Income </a>
                                    </li>
                                    <li class="<?=$this_page == 'deduction_summary' ? 'active' : ''?>">
                                        <a href="<?=base_url('finance/compensation/personnel_profile/deduction_summary/').$this->uri->segment(5)?>"> Deduction Summary </a>
                                    </li>
                                    <li class="<?=$this_page == 'premium_loan' ? 'active' : ''?>">
                                        <a href="<?=base_url('finance/compensation/personnel_profile/premium_loan/').$this->uri->segment(5)?>"> Premiums/Loans </a>
                                    </li>
                                    <li class="<?=$this_page == 'remittances' ? 'active' : ''?>">
                                        <a href="<?=base_url('finance/compensation/personnel_profile/remittances/').$this->uri->segment(5)?>"> Remittances </a>
                                    </li>
                                    <?php if($_SESSION['sessUserLevel'] == '2'): ?>
                                        <li class="<?=($this_page == 'tax_details' or $this_page == 'edit_tax_details') ? 'active' : ''?>">
                                            <a href="<?=base_url('finance/compensation/personnel_profile/tax_details/').$this->uri->segment(5)?>"> Tax Details </a>
                                        </li>
                                        <li class="<?=$this_page == 'dtr' ? 'active' : ''?>">
                                            <a href="<?=base_url('finance/compensation/personnel_profile/dtr/').$this->uri->segment(5)?>"> DTR </a>
                                        </li>
                                        <li class="<?=$this_page == 'adjustments' ? 'active' : ''?>">
                                            <a href="<?=base_url('finance/compensation/personnel_profile/adjustments/').$this->uri->segment(5)?>"> Adjustments </a>
                                        </li>
                                    <?php else: if(check_module() == 'employee'): ?>
                                        <li class="<?=$this_page == 'reports' ? 'active' : ''?>">
                                            <a href="<?=base_url('finance/compensation/personnel_profile/reports/').$this->uri->segment(5)?>"> Reports </a>
                                        </li>
                                    <?php endif; endif; ?>
                                </ul>

                                <div class="tab-content">
                                    <div class="col-md-12" style="margin-bottom: 20px;" <?=$this_page == 'dtr' ? '' : 'hidden'?>>
                                        <center>
                                            <?=form_open('', array('class' => 'form-inline', 'method' => 'get'))?>
                                                <div class="form-group" style="display: inline-flex;">
                                                    <label style="padding: 6px;">Month</label>
                                                    <select class="bs-select form-control" name="month">
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
                                                <div class="form-group" style="display: inline-flex;margin-left: 10px;">
                                                    <label style="padding: 6px;">Year</label>
                                                    <select class="bs-select form-control" name="yr">
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
                                                <button type="submit" class="btn btn-primary" style="margin-top: -3px;">Search</button>
                                            <?=form_close()?>
                                        </center>
                                    </div>

                                    <div class="tab-pane fade active in" id="tab-profile">
                                        <?php
                                            if($this_page == 'employee'): include('_personnelProfile.php'); endif;
                                            if($this_page == 'income'): include('_income.php'); endif;
                                            if($this_page == 'deduction_summary'): include('_deduction_summary.php'); endif;
                                            if($this_page == 'premium_loan'): include('_premiumLoans.php'); endif;
                                            if($this_page == 'remittances'): include('_remittances.php'); endif;
                                            if($_SESSION['sessUserLevel'] == '2'):
                                                if($this_page == 'tax_details' or $this_page == 'edit_tax_details'): include('_tax_details.php'); endif;
                                                if($this_page == 'dtr'): $this->load->view('hr/attendance/attendance_summary/_dtr'); endif;
                                                if($this_page == 'adjustments'): include('_adjustments.php'); endif;
                                            endif;
                                            if($this_page == 'reports'): include('_reports.php'); endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php load_plugin('js',array('select'));?>
<script>
    $(document).ready(function() {
        $('.loading-image, #div_hide').hide();
        $('#employee_view').show();
    });
</script>