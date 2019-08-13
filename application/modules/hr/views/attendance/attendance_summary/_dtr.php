<?=load_plugin('css', array('profile-2','datatables'))?>
<?php 
    $datefrom = isset($_GET['txtdtr_datefrom']) ? $_GET['txtdtr_datefrom'] : date('Y-m-d');
    $dateto = isset($_GET['txtdtr_dateto']) ? $_GET['txtdtr_dateto'] : date('Y-m-d');
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
                                <a href="<?=base_url('hr/attendance_summary/dtr/broken_sched').'/'.$arrData['empNumber']?>">Broken Sched</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/local_holiday').'/'.$arrData['empNumber']?>">Local Holiday</a></li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/ob').'/'.$arrData['empNumber']?>">OB</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/leave').'/'.$arrData['empNumber']?>">Leave</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/compensatory_leave').'/'.$arrData['empNumber']?>">Compensatory Time Off</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/time').'/'.$arrData['empNumber']?>">Time</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/flagcrmy').'/'.$arrData['empNumber']?>">Flag Ceremony</a></li>
                            <li>
                                <a href="<?=base_url('hr/attendance_summary/dtr/to').'/'.$arrData['empNumber']?>">Travel Order</a></li>
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
                    <?php foreach($arremp_dtr as $dtr): ?>
                    <tr class="odd <?=$dtr['day']?> tooltips <?=$dtr['holiday']!='' ? 'holiday' : ''?>"
                            data-original-title="<?=date('l', strtotime($dtr['date']))?> <?=count($dtr['dtrdata']) > 0 ? $dtr['holiday']!='' ? ' - '.$dtr['holiday'] : '' : ''?>">
                        
                        <td><?=date('d', strtotime($dtr['date']))?></td>
                        <?php if($dtr['holiday'] != '' && count($dtr['dtrdata']) < 1): ?>
                            <td colspan="11"><?=$dtr['holiday']?></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                        <?php else: ?>
                            <td><?=isset($dtr['dtrdata']['inAM'])  > 0 ? convert_12($dtr['dtrdata']['inAM'])  : ''?></td>
                            <td><?=isset($dtr['dtrdata']['outAM']) > 0 ? convert_12($dtr['dtrdata']['outAM']) : ''?></td>
                            <td><?=isset($dtr['dtrdata']['inPM'])  > 0 ? convert_12($dtr['dtrdata']['inPM'])  : ''?></td>
                            <td><?=isset($dtr['dtrdata']['outPM']) > 0 ? convert_12($dtr['dtrdata']['outPM']) : ''?></td>
                            <td><?=isset($dtr['dtrdata']['inOT'])  > 0 ? convert_12($dtr['dtrdata']['inOT'])  : ''?></td>
                            <td><?=isset($dtr['dtrdata']['outOT']) > 0 ? convert_12($dtr['dtrdata']['outOT']) : ''?></td>
                            <td><?php 
                                    echo count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['remarks'] : '';
                                    if($dtr['obremarks']!=''):
                                        echo '<a id="btnob" class="btn btn-xs green" data-json="'.htmlspecialchars($dtr['obremarks']).'">
                                                OB</a>';
                                    endif;

                                    if($dtr['toremarks']!=''):
                                        echo '<a id="btnto" class="btn btn-xs green-meadow" data-json="'.htmlspecialchars($dtr['toremarks']).'">
                                                TO</a>';
                                    endif;

                                    if($dtr['leaveremarks']!=''):
                                        echo '<a id="btnleave" class="btn btn-xs green-haze" data-json="'.htmlspecialchars($dtr['leaveremarks']).'">
                                                Leave</a>';
                                    endif;
                                 ?>        
                            </td>
                            <td><?=count($dtr['dtrdata']) > 0 ? $dtr['late'] != '00:00' ? $dtr['late'] : '' : ''?></td>
                            <td><?=count($dtr['dtrdata']) > 0 ? $dtr['overtime'] != '00:00' ? $dtr['overtime'] : '' : ''?></td>
                            <td><?=count($dtr['dtrdata']) > 0 ? $dtr['undertime'] != '00:00' ? $dtr['undertime'] : '' : ''?></td>
                            <td><?php 
                                $djson['empname']   = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['name'] : '';
                                $djson['ipadd']     = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['ip'] : '';
                                $djson['datetime']  = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['editdate'] : '';
                                $djson['oldval']    = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['oldValue'] : '';
                                $djson['bsremarks'] = $dtr['bsremarks'] !='' ? $dtr['bsremarks'] : '';
                                if(count($dtr['dtrdata']) > 0): ?>
                                    <a id="btnlog" class="btn btn-xs blue" data-json = "<?=htmlspecialchars(json_encode($djson))?>">
                                        <i class="fa fa-info"></i></a></td>
                                <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="well">
                <div class="row">
                    <div class="col-md-6">
                        <p>Total Number of Working Days: <?=$emp_workingdays?></p>
                        <p>Total Undertime: <?=date('H:i', mktime(0, $total_undertime))?></p>
                        <p>Total Late: <?=date('H:i', mktime(0, $total_late))?></p>
                        <p>Late/Undertime: <?=date('H:i', mktime(0, $total_undertime+$total_late))?></p>
                        <p>Total Days Late/Undertime: <?=$total_days_ut + $total_days_late?></p>
                        <p>Total Days LWOP:</p>
                    </div>
                    <div class="col-md-6">
                        <p>Total Days Absent: <?=count($date_absents)?></p>
                        <p>VL: <?=count($arrleaves) > 0 ? $arrleaves[0]['vlBalance'] : ''?></p>
                        <p>SL: <?=count($arrleaves) > 0 ? $arrleaves[0]['slBalance'] : ''?></p>
                        <p>Offset Balance:</p>
                        <p>Offset for the Month:</p>
                        <p>Offset Used:</p>
                    </div>
                    <div class="col-md-12">
                        <p>Dates Absent: 
                            <?php 
                                foreach($date_absents as $absent):
                                    echo date('d', strtotime($absent)).'; ';
                                endforeach;
                             ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row" <?=$_SESSION['sessUserLevel'] == 1 ? '' : 'hidden'?>>
                <div class="col-md-12">
                    <a href="<?=base_url('hr/attendance_summary/dtr/certify_offset').'/'.$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>" class="btn blue">Certify Offset</a>
                    <small><i>Click here to include/exclude Offset from computation.</i></small>
                    <?=str_repeat('&nbsp;', 6)?>
                    <b>Total Offset (Weekdays):</b> 00:00 <?=str_repeat('&nbsp;', 6)?>
                    <b>Total Offset (Weekends/Holiday):</b> 00:00</p>
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