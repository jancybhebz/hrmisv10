<?php load_plugin('css',array('select'));
      if($_SESSION['sessUserLevel'] != 1):?>
        <style> ul.nav.nav-tabs { display: none;} .tab-content { border-top: none !important;} </style>
<?php endif;
    $this_page = $this->uri->segment(3);
    $tab = $this->uri->segment(4);
    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <?php 
            $breadcrumbs = array();
            switch (check_module()):
                case 'officer':
                case 'executive':
                    $mode = isset($_GET['mode']) ? $_GET['mode'] == 'employee' ? 1 : 0 : 0;
                    if($mode):
                        $breadcrumbs = array('Home','Attendance','DTR',getfullname($arrData['firstname'],$arrData['surname'],$arrData['middlename'],$arrData['middleInitial'],''));
                    else:
                        $breadcrumbs = array('Home','Attendance','DTR');
                    endif;
                    break;
                case 'employee':
                    $breadcrumbs = array('Home','Attendance','DTR');
                    break;
                case 'hr':
                    $breadcrumbs = array('Home','Attendance','Attendance Summary',$this_page=='dtr'?strtoupper($this_page):$this_page,getfullname($arrData['firstname'],$arrData['surname'],$arrData['middlename'],$arrData['middleInitial'],''));
                    break;
            endswitch;

            foreach($breadcrumbs as $key => $bc):
                echo '<li><span>'.$bc.'</span>';
                if($key != count($breadcrumbs)-1):
                    echo '<i class="fa fa-circle"></i>';
                endif;    
                echo '</li>';
            endforeach;
         ?>
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
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> <?=$this_page == 'qr_code' ? 'QR Code' : 'Attendance'?></span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div style="height: 560px;" id="div_hide"></div>
                    <div class="portlet-body"  id="employee_view" style="display: none">
                        <div class="row">
                            <div class="tabbable-line tabbable-full-width col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="<?=$this_page == 'index' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/index/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                                            Attendance Summary </a>
                                    </li>
                                    <li <?=$arrData['appointmentCode']!='P' ? 'style="display: none;"' :''?> class="<?=in_array($this_page, array('leave_balance','leave_balance_update','leave_balance_set')) ? 'active' : ''?>">
                                        <?php if(check_module() == 'hr'): ?>
                                            <a href="<?=base_url('hr/attendance_summary/leave_balance_update/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                                                Leave Balance </a>
                                        <?php else: ?>
                                            <a href="<?=base_url('hr/attendance_summary/leave_balance/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                                                Leave Balance </a>
                                        <?php endif; ?>
                                    </li>
                                    <li <?=$arrData['appointmentCode']!='P' ? 'style="display: none;"' :''?> class="<?=$this_page == 'leave_monetization' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/leave_monetization/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                                            Leave Monetization </a>
                                    </li>
                                    <li class="<?=$this_page == 'filed_request' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/filed_request/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                                            Filed Request </a>
                                    </li>
                                    <li class="<?=($this_page == 'dtr') ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber'].'?month='.($month == 'all' ? date('m') : $month).'&yr='.$yr?>">
                                            Daily Time Record </a>
                                    </li>
                                    <li class="<?=$this_page == 'qr_code' ? 'active' : ''?>">
                                        <a href="<?=base_url('hr/attendance_summary/qr_code/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>">
                                            QR Code </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- BEGIN OFFICER / EXECUTIVE MODULE -->

                                    <?php if(in_array(check_module(),array('officer','executive'))): ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <?php  $strImageUrl = base_url('uploads/employees/'.$arrData['empNumber'].'.jpg');
                                                      if(file_exists($strImageUrl))
                                                        { 
                                                            $strImage = $strImageUrl;
                                                        } 
                                                        else 
                                                        {
                                                          $strImage = base_url('assets/images/logo.png');
                                                        }   
                                                        // $strImage = base_url('uploads/employees/'.$arrData['empNumber'].'.jpg');?>
                                                    <img src="<?=$strImage?>" class="img-responsive pic-bordered" width="200px" alt="" />
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- begin 201 profile -->
                                        <?php $view_officer = isset($_GET['mode']) ? $_GET['mode'] == 'officer' ? 0 : 1 : 1; ?>
                                        <?php if($view_officer): ?>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-9 profile-info">
                                                    <h1 class="font-green sbold uppercase"><?=getfullname($arrData['firstname'],$arrData['surname'],$arrData['middlename'],$arrData['middleInitial'])?></h1>
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
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <!-- END OFFICER / EXECUTIVE MODULE -->
                                    <div class="col-md-12" style="margin-bottom: 20px;" <?=($this_page == 'dtr' && !(preg_match('#[0-9]#',$tab))) || in_array($this_page,array('qr_code','index','leave_monetization')) ? 'hidden' : ''?>>
                                        <center>
                                            <?=form_open('', array('class' => 'form-inline', 'method' => 'get'))?>
                                                <input type="hidden" name="mode" value="<?=isset($_GET['mode']) ? $_GET['mode'] : check_module()?>">
                                                <div class="form-group" style="display: inline-flex;">
                                                    <label style="padding: 6px;">Month</label>
                                                    <select class="bs-select form-control" name="month">
                                                        <?php if($this_page!='dtr'): ?>
                                                            <option value="all">All</option>
                                                        <?php endif; ?>
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
                                            if($this_page == 'leave_balance_set'): $this->load->view('_leave_balance_set.php'); endif;
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