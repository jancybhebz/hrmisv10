<?=load_plugin('css', array('profile-2','datatables'))?>
<?php 
    $datefrom = isset($_GET['datefrom']) ? $_GET['datefrom'] : date('Y-m-d');
    $dateto = isset($_GET['dateto']) ? $_GET['dateto'] : date('Y-m-d');
    $total_undertime = 0;
    $total_late = 0;
    $days_late_ut = 0;
    $days_absent = 0;
    $in_am  = '';
    $out_am = '';
    $in_pm  = '';
    $out_pm = '';
 ?>

<div class="tab-pane active" id="tab_1_4">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Daily Time Record</span>
                </div>
                <div class="actions">
                    <?php if( $_SESSION['sessUserLevel'] == 1): ?>
                    <div class="btn-group">
                        <a class="btn green" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
                            style="font-size: 14px;padding: 5px 11px;"> Actions
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/edit_mode').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Edit Mode</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/broken_sched').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Broken Sched</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/local_holiday').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Local Holiday</a></li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/ob').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">OB</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/leave').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Leave</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/compensatory_leave').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Compensatory Time Off</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/time').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Time</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/flagcrmy').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Flag Ceremony</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/to').'/'.$arrData['empNumber'].'?datefrom='.$datefrom.'&dateto='.$dateto?>">Travel Order</a></li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;" data-toggle="modal" data-target="#print-preview-modal">Preview / Print</a>
                            </li>
                        </ul>
                    </div>
                    <?php else: ?>
                        <a class="btn blue pull-right" data-toggle="modal" data-target="#print-preview-modal">Preview / Print</a>
                    <?php endif; ?>
                </div>
            </div>
            <div style="display: inline-flex;">
                <div class="legend-def1">
                    <div class="legend-dd1" style="background-color: #acd9f7;"></div> &nbsp;<small style="margin-left: 10px;">Weekend</small> &nbsp;&nbsp;</div>
                <div class="legend-def1">
                    <div class="legend-dd1" style="background-color: #ffc0cb;"></div> &nbsp;<small style="margin-left: 10px;">Holiday</small> &nbsp;&nbsp;</div>
            </div>
            <br><br>
            <style type="text/css">th.no-sort { padding: 15px !important; }</style>
            <table class="table table-striped table-bordered order-column" id="tbldtr">
                <thead>
                    <tr>
                        <th class="no-sort">DATE</th>
                        <th class="no-sort">IN</th>
                        <th class="no-sort">OUT</th>
                        <th class="no-sort">IN</th>
                        <th class="no-sort">OUT</th>
                        <th class="no-sort">REMARKS</th>
                        <th class="no-sort">LATE</th>
                        <th class="no-sort">OT</th>
                        <th class="no-sort">UT</th>
                        <th class="no-sort">LOGS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arremp_dtr as $dtr):
                            $in_am  = count($dtr['dtr']) > 0 ? $dtr['dtr']['inAM']  == '00:00:00' || $dtr['dtr']['inAM']  == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inAM']))  : '';
                            $out_am = count($dtr['dtr']) > 0 ? $dtr['dtr']['outAM'] == '00:00:00' || $dtr['dtr']['outAM'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outAM'])) : '';
                            $in_pm  = count($dtr['dtr']) > 0 ? $dtr['dtr']['inPM']  == '00:00:00' || $dtr['dtr']['inPM']  == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inPM']))  : '';
                            $out_pm = count($dtr['dtr']) > 0 ? $dtr['dtr']['outPM'] == '00:00:00' || $dtr['dtr']['outPM'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outPM'])) : '';
                            ?>
                        <tr class="odd <?=$dtr['day']?> tooltips <?=count($dtr['holiday_name']) > 0 ? 'holiday' : ''?>"
                            data-original-title="<?=date('l', strtotime($dtr['dtrdate']))?>">
                            <td><?=date('M d', strtotime($dtr['dtrdate']))?>
                            <td><?=$in_am?></td>
                            <td><?=$out_am?></td>
                            <td><?=$in_pm?></td>
                            <td><?=$out_pm?></td>
                            <td style="text-align: left;">
                                <?php 
                                    if(count($dtr['holiday_name']) > 0):
                                        echo '<ul>';
                                        foreach($dtr['holiday_name'] as $hday): echo '<li><small>'.$hday.'</small></li>'; endforeach;
                                        echo '</ul>';
                                    endif;

                                    if(count($dtr['emp_ws']) > 0):
                                        echo '<ul>';
                                        foreach($dtr['emp_ws'] as $ws):
                                            echo '<li><small>'.$ws['holidayName'].' - '.date('h:i A',strtotime($ws['holidayTime'])).'</small></li>';
                                        endforeach;
                                        echo '</ul>';
                                    endif;
                                 ?>
                                <div style="padding-left: 30px;">
                                <?php
                                    if(count($dtr['obs']) > 0):
                                        foreach($dtr['obs'] as $ob):
                                            echo '<a id="btnob" class="btn btn-xs green" data-json="'.htmlspecialchars(json_encode($ob)).'">
                                                    OB</a>';
                                        endforeach;
                                    endif;
                                    if(count($dtr['tos']) > 0):
                                        foreach($dtr['tos'] as $to):
                                            echo '<a id="btnob" class="btn btn-xs green" data-json="'.htmlspecialchars(json_encode($to)).'">
                                                    TO</a>';
                                        endforeach;
                                    endif;
                                    if(count($dtr['leaves']) > 0):
                                        foreach($dtr['leaves'] as $leave):
                                            echo '<a id="btnob" class="btn btn-xs green" data-json="'.htmlspecialchars(json_encode($leave)).'">
                                                    Leave</a>';
                                        endforeach;
                                    endif;
                                    if(count($dtr['dtr']) > 0):
                                        if($dtr['dtr']['remarks'] == 'CL'):
                                            echo '<a id="btnob" class="btn btn-xs green" data-json="'.htmlspecialchars(json_encode($dtr['dtr'])).'">
                                                    CTO</a>';
                                        endif;
                                    endif;

                                    $total_undertime = $total_undertime + $dtr['utimes'];
                                    $total_late = $total_late + $dtr['lates'];
                                    if($dtr['lates'] + $dtr['utimes'] > 0):
                                        $days_late_ut = $days_late_ut + 1;
                                    endif;

                                    if((count($dtr['leaves']) + count($dtr['dtr']) + count($dtr['obs']) + count($dtr['tos']) + count($dtr['holiday_name']) < 1) && !in_array($dtr['day'],array('Sat','Sun'))):
                                        $days_absent = $days_absent + 1;
                                    endif;

                                 ?>
                                <div>
                            </td>
                            <td><?=$dtr['lates'] > 0 ? date('H:i', mktime(0, $dtr['lates'])) : ''?></td>
                            <td><?=$dtr['ot'] > 0 ? date('H:i', mktime(0, $dtr['ot'])) : ''?></td>
                            <td><?=$dtr['utimes'] > 0 ? date('H:i', mktime(0, $dtr['utimes'])) : ''?></td>
                            <td>
                                <?php 
                                    $djson['empname']   = count($dtr['dtr']) > 0 ? $dtr['dtr']['name'] : '';
                                    $djson['ipadd']     = count($dtr['dtr']) > 0 ? $dtr['dtr']['ip'] : '';
                                    $djson['datetime']  = count($dtr['dtr']) > 0 ? $dtr['dtr']['editdate'] : '';
                                    $djson['oldval']    = count($dtr['dtr']) > 0 ? $dtr['dtr']['oldValue'] : '';
                                    $djson['bsremarks'] = $dtr['broken_sched'] !='' ? $dtr['broken_sched'] : '';
                                    if(count($dtr['dtr']) > 0): ?>
                                        <a id="btnlog" class="btn btn-xs blue" data-json = "<?=htmlspecialchars(json_encode($djson))?>">
                                            <i class="fa fa-info"></i></a>
                                    <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table" width="100%">
                <tr>
                    <td width="25%"><b>Total Number of Working Days</b></td>
                    <td width="25%"><?=count($working_days)?></td>
                    <td width="25%"><b>Total Days Absent</b></td>
                    <td width="25%"><?=$days_absent?></td>
                </tr>
                <tr>
                    <td><b>Total Undertime</b></td>
                    <td><?=date('H:i', mktime(0, $total_undertime))?></td>
                    <td><b>VL</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Total Late</b></td>
                    <td><?=date('H:i', mktime(0, $total_late))?></td>
                    <td><b>SL</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Late / Undertime</b></td>
                    <td><?=date('H:i', mktime(0, ($total_undertime + $total_late)))?></td>
                    <td><b>Offset Balance</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Total Days Late / Undertime</b></td>
                    <td><?=$days_late_ut?></td>
                    <td><b>Offset for the Month</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Total Days LWOP</b></td>
                    <td></td>
                    <td><b>Offset Used</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Total Offset (Weekdays)</b></td>
                    <td></td>
                    <td><b>Total Offset (Weekends/Holiday)</b></td>
                    <td></td>
                </tr>
            </table>

            <div class="row" <?=$_SESSION['sessUserLevel'] == 1 ? '' : 'hidden'?>>
                <div class="col-md-12">
                    <a href="<?=base_url('hr/attendance_summary/dtr/certify_offset').'/'.$arrData['empNumber'].'?datefrom='.$_GET['datefrom'].'&dateto='.$_GET['dateto']?>" class="btn blue">Certify Offset</a>
                    <small><i>Click here to include/exclude Offset from computation.</i></small>
                    <?=str_repeat('&nbsp;', 6)?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('modals/_dtr_modal.php') ?>

<?=load_plugin('js', array('datatables','datatables-scroller'))?>
<script src="<?=base_url('assets/js/custom/dtr_view-js.js')?>"></script>

<script>
    $(document).ready(function() {
        $('td.hide').hide();
        // $('#tbldtr').dataTable({
            // "bPaginate" : false,
            // pageLength: 50
            // "scrollY": "350px",
            // "scrollCollapse": true,
            // "paging": false,
            // "bInfo": false,
            // "bSort": false
        // });
        // setTimeout(function () { $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();},200);
    });
</script>