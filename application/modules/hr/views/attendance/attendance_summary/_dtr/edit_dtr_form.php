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
                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber']?>" class="btn grey-cascade">
                            <i class="icon-calendar"></i> DTR </a>
                        <br><br>
                        <table class="table table-bordered dtr-edit" id="tbldtr">
                            <thead>
                                <tr>
                                    <td hidden></td>
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
                                    <td hidden></td>
                                    <td hidden></td>
                                    <td hidden></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arremp_dtr['dtr'] as $dtr): ?>
                                <tr class="odd <?=$dtr['day']?> <?=$dtr['holiday']!='' ? 'holiday' : ''?>"
                                        title="<?=date('l', strtotime($dtr['date']))?> <?=count($dtr['dtrdata']) > 0 ? $dtr['holiday']!='' ? ' - '.$dtr['holiday'] : '' : ''?>">
                                    <td hidden><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['id'] : ''?></td>
                                    <td><?=date('d', strtotime($dtr['date']))?></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['inAM'] : '00:00:00'?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['outAM'] : '00:00:00'?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['inPM'] : '00:00:00'?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['outPM'] : '00:00:00'?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['inOT'] : '00:00:00'?></div></td>
                                        <td>
                                            <div class="tdedit" contenteditable><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['outOT'] : '00:00:00'?></div></td>
                                        <td>
                                            <?php
                                                echo count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['remarks'] : '';
                                                echo $dtr['holiday']!='' ? $dtr['holiday'] : '';
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
                                        <td><?php 
                                            $djson['empname']   = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['name'] : '';
                                            $djson['ipadd']     = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['ip'] : '';
                                            $djson['datetime']  = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['editdate'] : '';
                                            $djson['oldval']    = count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['oldValue'] : '';
                                            $djson['bsremarks'] = $dtr['bsremarks'] !='' ? $dtr['bsremarks'] : '';
                                            if(count($dtr['dtrdata']) > 0): ?>
                                                <a id="btnlog" class="btn btn-xs blue" data-json = "<?=htmlspecialchars(json_encode($djson))?>">
                                                    <i class="fa fa-info"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td hidden><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['name'] : ''?></td>
                                        <td hidden><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['ip'] : ''?></td>
                                        <td hidden><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['editdate'] : ''?></td>
                                        <td hidden><?=count($dtr['dtrdata']) > 0 ? $dtr['dtrdata']['oldValue'].';inAM='.$dtr['dtrdata']['inAM'].', outAM='.$dtr['dtrdata']['outAM'].', inPM='.$dtr['dtrdata']['inPM'].', outPM='.$dtr['dtrdata']['outPM'].', inOT='.$dtr['dtrdata']['inOT'].', outOT='.$dtr['dtrdata']['outOT'] : ''?></td>
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
                                    <input type="hidden" name="month" value="<?=$_GET['month']?>">
                                    <input type="hidden" name="yr" value="<?=$_GET['yr']?>">

                                    <textarea name="txtjson" id="txtjson" hidden></textarea>
                                    <button class="btn green" type="submit" id="btn_edit_dtr"><i class="fa fa-plus"></i> Edit </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/edit_mode').'/'.$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>" class="btn grey-cascade">
                                        <i class="icon-ban"></i> Clear</a>
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