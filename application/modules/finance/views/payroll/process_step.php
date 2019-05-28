<?=load_plugin('css', array('select','select2','datepicker'));$page = $this->uri->segment(4);?>
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
                    <span class="caption-subject font-red bold uppercase"> Process Payroll -
                        <span class="step-title"> 
                            <?php 
                                switch ($page):
                                    case 'index':
                                        echo 'STEP 1 OF 4';
                                        break;
                                    case 'select_benefits':
                                        echo 'STEP 2 OF 4';
                                        break;
                                    case 'compute_benefits':
                                    case 'save_benefits':
                                        echo 'STEP 2 OF 4';
                                        break;
                                    case 'select_deductions':
                                        echo 'STEP 3 OF 4';
                                        break;
                                    case 'reports':
                                        echo 'STEP 4 OF 4';
                                        break;
                                endswitch;
                             ?>
                        </span>
                    </span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-wizard">
                    <div class="form-body">
                        <ul class="nav nav-pills nav-justified steps">
                            <li class="<?=$page=='index'?'active':''?>">
                                <a href="#tab1" data-toggle="tab" class="step">
                                    <span class="number"> 1 </span><br>
                                    <span class="desc">
                                        <i class="fa fa-check"></i> Payroll Period </span>
                                </a>
                            </li>
                            <li class="<?=in_array($page,array('select_benefits','compute_benefits','save_benefits'))?'active':''?>">
                                <a href="#tab2" data-toggle="tab" class="step">
                                    <span class="number"> 2 </span><br>
                                    <span class="desc">
                                        <i class="fa fa-check"></i> Income </span>
                                </a>
                            </li>
                            <li class="<?=$page=='select_deductions'?'active':''?>">
                                <a href="#tab3" data-toggle="tab" class="step">
                                    <span class="number"> 3 </span><br>
                                    <span class="desc">
                                        <i class="fa fa-check"></i> Deductions </span>
                                </a>
                            </li>
                            <li class="<?=$page=='reports'?'active':''?>">
                                <a href="#tab5" data-toggle="tab" class="step">
                                    <span class="number"> 4 </span><br>
                                    <span class="desc">
                                        <i class="fa fa-check"></i> Reports </span>
                                </a>
                            </li>
                        </ul>
                        <div id="bar" class="progress progress-striped" role="progressbar">
                            <div class="progress-bar progress-bar-success"> </div>
                        </div>
                        <!-- begin form -->
                        <?php 
                            switch ($page):
                                case 'index':
                                    $this->load->view('process/_step1-payroll_period');
                                    break;
                                case 'select_benefits':
                                    $this->load->view('process/_step2-select_benefits');
                                    break;
                                case 'compute_benefits':
                                case 'save_benefits':
                                    if($employment_type == 'P'):
                                        $this->load->view('process/_step2-compute_benefits');
                                    else:
                                        $this->load->view('process/_step2-compute_benefits_cont');
                                    endif;
                                    break;
                                case 'select_deductions':
                                    $this->load->view('process/_step3-select_deductions');
                                    break;
                                case 'reports':
                                    $this->load->view('process/_step4-reports');
                                    break;
                                default:
                                    # code...
                                    break;
                            endswitch;
                            ?>
                        <!-- end form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select','select2','form-wizard','datepicker','form_validation'))?>
<?php # $this->load->view('_modal'); ?>

<!-- <script src="<?=base_url('assets/js/custom/payroll.js')?>" type="text/javascript"></script> -->