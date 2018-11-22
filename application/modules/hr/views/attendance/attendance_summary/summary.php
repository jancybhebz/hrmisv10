<?php load_plugin('css',array('select'));?>
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
                            <span class="caption-subject bold uppercase"> Attendance Summary</span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div style="height: 560px;" id="div_hide"></div>
                    <div class="portlet-body"  id="employee_view" style="display: none">
                        <div class="row">
                            <div class="tabbable-line tabbable-full-width col-md-12">
                                <ul class="nav nav-tabs">
                                    <?php $this_page = $this->uri->segment(3); $tab = $this->uri->segment(4); ?>
                                    <li class="<?=$this_page == 'index' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/index/').$arrData['empNumber']?>"> Attendance Summary </a>
                                    </li>
                                    <li class="<?=$this_page == 'leave_balance' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/leave_balance/').$arrData['empNumber']?>"> Leave Balance </a>
                                    </li>
                                    <li class="<?=$this_page == 'leave_balance_update' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/leave_balance_update/').$arrData['empNumber']?>"> Update Leave Balance </a>
                                    </li>
                                    <li class="<?=$this_page == 'leave_monetization' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/leave_monetization/').$arrData['empNumber']?>"> Leave Monetization </a>
                                    </li>
                                    <li class="<?=$this_page == 'filed_request' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/filed_request/').$arrData['empNumber']?>"> Filed Request </a>
                                    </li>
                                    <li class="<?=($this_page == 'dtr') ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber']?>"> Daily Time Record </a>
                                    </li>
                                    <li class="<?=$this_page == 'override' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/override/').$arrData['empNumber']?>"> Override </a>
                                    </li>
                                    <li class="<?=$this_page == 'qr_code' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/qr_code/').$arrData['empNumber']?>"> QR Code </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab-profile">
                                        <?php
                                            if($this_page == 'index'): include('_index.php'); endif;
                                            if($this_page == 'leave_balance'): include('_leave_balance.php'); endif;
                                            if($this_page == 'leave_balance_update'): include('_leave_balance_update.php'); endif;
                                            if($this_page == 'leave_monetization'): include('_leave_monetization.php'); endif;
                                            if($this_page == 'filed_request'): include('_filed_request.php'); endif;
                                            if($this_page == 'dtr'):
                                                if($tab == 'broken_sched'):
                                                    include('_dtr/broken_sched_view.php');
                                                elseif($tab == 'broken_sched_add'):
                                                    include('_dtr/broken_sched_form.php');
                                                elseif($tab == 'local_holiday'):
                                                    include('_dtr/local_holiday_view.php');
                                                elseif($tab == 'local_holiday_add'):
                                                    include('_dtr/local_holiday_form.php');
                                                elseif($tab == 'certify_offset'):
                                                    include('_dtr/certify_offset_view.php');
                                                elseif($tab == 'ob'):
                                                    include('_dtr/ob_view.php');
                                                elseif($tab == 'ob_add'):
                                                    include('_dtr/ob_form.php');
                                                else:
                                                    include('_dtr.php');
                                                endif;
                                            endif;
                                            if($this_page == 'override'): include('_override.php'); endif;
                                            if($this_page == 'qr_code'): include('_qr_code.php'); endif;
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