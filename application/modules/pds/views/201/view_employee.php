<?php
$modulename = array('','HR','Financial','Officer','Executive','Employee');
load_plugin('css',array('select'));
$this_page = $this->uri->segment(4);
$arrData = $arrData[0];?>
<!-- BEGIN PAGE BAR -->
<style>
    .tabbable-line > .nav-tabs > li > a {
        padding-left: 3px;
    }
</style>
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
                            <span class="caption-subject bold uppercase"> 201</span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div style="height: 560px;" id="div_hide"></div>
                    <div class="portlet-body"  id="employee_view" style="display: none">
                        <div class="row">
                            <div class="tab-pane active" id="tab_1_1">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <ul class="list-unstyled profile-nav">
                                            <li>
                                                <img src="<?=base_url('assets/images/logo.png')?>" class="img-responsive pic-bordered" width="200px" alt="" />
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- begin 201 profile -->
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-9 profile-info">
                                                <h1 class="font-green sbold uppercase"><?=$arrData['firstname']?> <?=$arrData['middleInitial']?>. <?=$arrData['surname']?></h1>
                                                <div class="row">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td width="25%"><b>Employee Number</b></td>
                                                                <td width="25%"><?=$arrData['empNumber']?></td>
                                                                <td width="25%"><b>Mode of Separation</b></td>
                                                                <td width="25%"><?=$arrData['statusOfAppointment']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Position </b></td>
                                                                <td><?=$arrData['positionDesc']?></td>
                                                                <td><b>Appointment </b></td>
                                                                <td><?=$arrData['appointmentDesc']?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Office</b></td>
                                                                <td colspan="3"><?=office_name(employee_office($arrData['empNumber']))?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div>
                                                        <a href="<?=base_url('employee/reports/generate/?rpt=reportPDSupdate')?>"/><button type="button" value="reportPDSupdate" class="btn blue">Print Personal Data Sheet</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="portlet sale-summary">
                                                    <div class="portlet-title">
                                                        <div class="caption font-red sbold"> DTR </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <ul class="list-unstyled" style="line-height: 15px;">
                                                            <li>
                                                                <span class="sale-info"> LOG IN </span>
                                                                <span class="sale-num"><?=$arrdtr != null ? date('H:i', strtotime($arrdtr['inAM'])) : '00:00'?></span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info"> BREAK OUT </span>
                                                                <span class="sale-num"><?=$arrdtr != null ? date('H:i', strtotime($arrdtr['outAM'])) : '00:00'?></span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info"> BREAK IN </span>
                                                                <span class="sale-num"><?=$arrdtr != null ? date('H:i', strtotime($arrdtr['inPM'])) : '00:00'?></span>
                                                            </li>
                                                            <li>
                                                                <span class="sale-info"> LOG OUT </span>
                                                                <span class="sale-num"><?=$arrdtr != null ? date('H:i', strtotime($arrdtr['outPM'])) : '00:00'?></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tabbable-line tabbable-custom-profile">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#personal_info" data-toggle="tab"> Personal Info </a>
                                                </li>
                                                <li>
                                                    <a href="#family_background" data-toggle="tab"> Family Background </a>
                                                </li>
                                                <li>
                                                    <a href="#education" data-toggle="tab"> Education </a>
                                                </li>
                                                <li>
                                                    <a href="#examination" data-toggle="tab"> Examination </a>
                                                </li>
                                                <li>
                                                    <a href="#work_experience" data-toggle="tab"> Work Experience </a>
                                                </li>
                                                <li>
                                                    <a href="#voluntary_work" data-toggle="tab"> Voluntary Work </a>
                                                </li>
                                                <li>
                                                    <a href="#trainings" data-toggle="tab"> Trainings </a>
                                                </li>
                                                <li>
                                                    <a href="#other_info" data-toggle="tab"> Other Informations </a>
                                                </li>
                                                <li>
                                                    <a href="#position_details" data-toggle="tab"> Position Details </a>
                                                </li>
                                                <li>
                                                    <a href="#duties" data-toggle="tab"> Duties and Responsibilities </a>
                                                </li>
                                                <li>
                                                    <a href="#appoint_issued" data-toggle="tab"> Appointment Issued </a>
                                                </li>
                                                <li>
                                                    <a href="#emp_number" data-toggle="tab"> Employee Number </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                
                                                <!-- begin personal info -->
                                                <div class="tab-pane active" id="personal_info" style="padding: 0 !important;position: relative;top: -20px;">
                                                    <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                                                        <div class="row">
                                                            <div class="col-md-12" style="padding: 0 30px 10px;">
                                                                <a class="btn green pull-right" data-toggle="modal" href="#editPersonal_modal">
                                                                    <i class="icon-pencil"></i> Edit Personal Info </a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="scroller" style="height:350px;" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_personal_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end personal info -->

                                                <!-- begin Family Background -->
                                                <div class="tab-pane " id="family_background">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_family_background_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end Family Background -->

                                                <!-- begin Education Bacgkround -->
                                                <div class="tab-pane " id="education">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_education_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end Education Bacgkround -->

                                                <!-- begin Examination -->
                                                <div class="tab-pane " id="examination">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_examination_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end Examination -->

                                                <!-- begin Work Experience -->
                                                <div class="tab-pane " id="work_experience">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_work_experience_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end Work Experience -->

                                                <!-- begin Voluntary Work -->
                                                <div class="tab-pane " id="voluntary_work">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_voluntary_work_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end Voluntary Work -->

                                                <!-- begin Trainings -->
                                                <div class="tab-pane " id="trainings">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_training_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end Trainings -->

                                                <!-- begin other info -->
                                                <div class="tab-pane " id="other_info">
                                                    <div class="scroller" style="height:350px;" data-always-visible="1" data-rail-visible="1" data-rail-color="red" data-handle-color="green">
                                                        <?php $this->load->view('_other_info_view.php'); ?>
                                                    </div>
                                                </div>
                                                <!-- end other info -->

                                                    <!-- begin position details -->
                                                    <div class="tab-pane" id="position_details">
                                                        position details
                                                    </div>
                                                    <!-- end position details -->

                                                    <!-- begin duties and responsibilities -->
                                                    <div class="tab-pane" id="duties">
                                                        duties and responsibilities
                                                    </div>
                                                    <!-- end duties and responsibilities -->

                                                    <!-- begin appointment issued -->
                                                    <div class="tab-pane" id="appoint_issued">
                                                        appointment issued
                                                    </div>
                                                    <!-- end appointment issued -->

                                                    <!-- begin employee number -->
                                                    <div class="tab-pane" id="emp_number">
                                                        employee number
                                                    </div>
                                                    <!-- end employee number -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end 201 profile -->
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