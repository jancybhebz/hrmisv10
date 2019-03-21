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
                                    <li class="<?=$this_page == 'qr_code' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/qr_code/').$arrData['empNumber']?>"> QR Code </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="col-md-12" style="margin-bottom: 20px;" <?=$this_page == 'dtr' && (preg_match('#[0-9]#',$tab) || $tab == 'edit_mode') ? '' : 'hidden'?>>
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
                                            if($this_page == 'index'): $this->load->view('_index.php'); endif;
                                            if($this_page == 'leave_balance'): $this->load->view('_leave_balance.php'); endif;
                                            if($this_page == 'leave_balance_update'): $this->load->view('_leave_balance_update.php'); endif;
                                            if($this_page == 'leave_monetization'): $this->load->view('_leave_monetization.php'); endif;
                                            if($this_page == 'filed_request'): $this->load->view('_filed_request.php'); endif;
                                            if($this_page == 'dtr'):
                                                switch ($tab):
                                                    case 'edit_mode':
                                                        $this->load->view('_dtr/edit_dtr_form.php');
                                                        break;
                                                    case 'broken_sched':
                                                        $this->load->view('_dtr/broken_sched_view.php');
                                                        break;
                                                    case 'broken_sched_add':
                                                        $this->load->view('_dtr/broken_sched_form.php');
                                                        break;
                                                    case 'broken_sched_edit':
                                                        $this->load->view('_dtr/broken_sched_form.php');
                                                        break;
                                                    case 'local_holiday':
                                                        $this->load->view('_dtr/local_holiday_view.php');
                                                        break;
                                                    case 'local_holiday_add':
                                                        $this->load->view('_dtr/local_holiday_form.php');
                                                        break;
                                                    case 'local_holiday_edit':
                                                        $this->load->view('_dtr/local_holiday_form.php');
                                                        break;
                                                    case 'certify_offset':
                                                        $this->load->view('_dtr/certify_offset_view.php');
                                                        break;
                                                    case 'ob':
                                                        $this->load->view('_dtr/ob_view.php');
                                                        break;
                                                    case 'ob_add':
                                                        $this->load->view('_dtr/ob_form.php');
                                                        break;
                                                    case 'ob_edit':
                                                        $this->load->view('_dtr/ob_form.php');
                                                        break;
                                                    case 'leave':
                                                        $this->load->view('_dtr/leave_view.php');
                                                        break;
                                                    case 'leave_edit':
                                                        $this->load->view('_dtr/leave_form.php');
                                                        break;
                                                    case 'leave_add':
                                                        $this->load->view('_dtr/leave_form.php');
                                                        break;
                                                    case 'compensatory_leave':
                                                        $this->load->view('_dtr/compensatory_leave_view.php');
                                                        break;
                                                    case 'compensatory_leave_add':
                                                        $this->load->view('_dtr/compensatory_leave_form.php');
                                                        break;
                                                    case 'time':
                                                        $this->load->view('_dtr/time_view.php');
                                                        break;
                                                    case 'time_add':
                                                        $this->load->view('_dtr/time_form.php');
                                                        break;
                                                    case 'to':
                                                        $this->load->view('_dtr/to_view.php');
                                                        break;
                                                    case 'to_add':
                                                        $this->load->view('_dtr/to_form.php');
                                                        break;
                                                    case 'to_edit':
                                                        $this->load->view('_dtr/to_form.php');
                                                        break;
                                                    case 'flagcrmy':
                                                        $this->load->view('_dtr/flagcrmy_view.php');
                                                        break;
                                                    case 'flagcrmy_add':
                                                        $this->load->view('_dtr/flagcrmy_form.php');
                                                        break;
                                                    case 'flagcrmy_edit':
                                                        $this->load->view('_dtr/flagcrmy_form.php');
                                                        break;
                                                    default:
                                                        $this->load->view('_dtr.php');
                                                endswitch;

                                            endif;
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