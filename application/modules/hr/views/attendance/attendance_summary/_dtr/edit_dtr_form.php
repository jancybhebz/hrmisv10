<style type="text/css">
    th { text-align: center; }
    tr td { vertical-align: middle !important; }
    .tdedit { border: 1px solid #acd9f7 !important; width: 100% !important; padding: 3px 0px; }
</style>
<?php 
    $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
 ?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Daily Time Record</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <div class="alert alert-danger alert-dismissable" >
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>Error!</strong> Invalid input. </div>
                        <a href="<?=base_url('hr/attendance_summary/dtr/'.$arrData['empNumber'].'?datefrom='.currdfrom().'&dateto='.currdto())?>" class="btn grey-cascade">
                            <i class="icon-calendar"></i> DTR </a>
                        <br><br>
                        <table class="table table-bordered dtr-edit" id="tbldtr">
                            <thead>
                                <tr>
                                    <th>DATE</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>REMARKS</th>
                                    <th>LOGS</th>
                                    <td hidden></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arremp_dtr as $dtr):
                                        $in_am  = count($dtr['dtr']) > 0 ? $dtr['dtr']['inAM']  == '00:00:00' || $dtr['dtr']['inAM']  == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inAM']))  : '00:00';
                                        $out_am = count($dtr['dtr']) > 0 ? $dtr['dtr']['outAM'] == '00:00:00' || $dtr['dtr']['outAM'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outAM'])) : '00:00';
                                        $in_pm  = count($dtr['dtr']) > 0 ? $dtr['dtr']['inPM']  == '00:00:00' || $dtr['dtr']['inPM']  == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inPM']))  : '00:00';
                                        $out_pm = count($dtr['dtr']) > 0 ? $dtr['dtr']['outPM'] == '00:00:00' || $dtr['dtr']['outPM'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outPM'])) : '00:00';
                                        $in_ot = count($dtr['dtr']) > 0 ? $dtr['dtr']['inOT'] == '00:00:00' || $dtr['dtr']['inOT'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['inOT'])) : '00:00';
                                        $out_ot = count($dtr['dtr']) > 0 ? $dtr['dtr']['outOT'] == '00:00:00' || $dtr['dtr']['outOT'] == '' ? '00:00' : date('h:i',strtotime($dtr['dtr']['outOT'])) : '00:00';
                                        $dtr_id = count($dtr['dtr']) > 0 ? $dtr['dtr']['id'] : '';
                                        $name = count($dtr['dtr']) > 0 ? $dtr['dtr']['name'] : '';
                                        $ip = count($dtr['dtr']) > 0 ? $dtr['dtr']['ip'] : '';
                                        $editdate = count($dtr['dtr']) > 0 ? $dtr['dtr']['editdate'] : '';
                                        $oldValue = count($dtr['dtr']) > 0 ? $dtr['dtr']['oldValue'] : '';
                                        ?>
                                    <tr class="odd <?=$dtr['day']?> tooltips <?=count($dtr['holiday_name']) > 0 ? 'holiday' : ''?>"
                                        data-original-title="<?=date('l', strtotime($dtr['dtrdate']))?>">
                                        <td><?=date('M d', strtotime($dtr['dtrdate']))?>
                                        <td>
                                            <div class="tdedit" contenteditable><?=$in_am?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=$out_am?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=$in_pm?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=$out_pm?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=$in_ot?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=$out_ot?></div></td>
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
                                             ?>
                                            <div>
                                        </td>
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
                                        <td hidden><?=json_encode(array($dtr['dtrdate'],$dtr_id,$name,$ip,$editdate,$oldValue))?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="portlet-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <center>
                                <?=form_open('hr/attendance/dtr_edit', array('method' => 'post'))?>
                                    <input type="hidden" name="empnum" value="<?=$this->uri->segment(5)?>">
                                    <input type="hidden" name="datefrom" value="<?=$_GET['datefrom']?>">
                                    <input type="hidden" name="dateto" value="<?=$_GET['dateto']?>">

                                    <textarea name="txtjson" id="txtjson" hidden></textarea>
                                    <button class="btn green" type="submit" id="btn_edit_dtr"><i class="fa fa-plus"></i> Save </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/edit_mode').'/'.$arrData['empNumber'].'?datefrom='.$_GET['datefrom'].'&dateto='.$_GET['dateto']?>" class="btn grey-cascade">
                                        <i class="icon-ban"></i> Cancel</a>
                                <?=form_close()?>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?=$this->load->view('modals/_dtr_modal.php')?>
<script src="<?=base_url('assets/js/custom/dtr_view-js.js')?>"></script>