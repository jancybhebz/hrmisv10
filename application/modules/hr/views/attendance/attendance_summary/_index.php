<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_1">
    <div class="row">
        <div class="col-md-12" style="border-top:1px solid #eef1f5;margin-bottom: 10px;"></div>
        <div class="col-md-2">
            <ul class="list-unstyled profile-nav">
                <li>
                    <img src="<?=base_url('assets/images/logo.png')?>" class="img-responsive pic-bordered" width="200px" alt="" />
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 profile-info">
                    <h1 class="font-green sbold uppercase"><?=$arrData['firstname']?> <?=$arrData['middleInitial']?>. <?=$arrData['surname']?></h1>
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="25%"><b>Employee Number</b></td>
                                    <td width="25%"><?=$arrData['empNumber']?></td>
                                    <td width="25%"><b>Pay Ending</b></td>
                                    <td width="25%"><?=isset($_GET['yr']) && isset($_GET['month']) ? date('F', mktime(0, 0, 0, $_GET['month'], 10)).' '.$_GET['yr'] : date('F Y')?></td>
                                </tr>
                                <tr>
                                    <td><b>Office</b></td>
                                    <td colspan="3"><?=office_name(employee_office($arrData['empNumber']))?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 profile-info">
                    <div class="row">
                        <br><br><br>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td><b>Date(s) Absent</b></td>
                                    <td style="width: 75%;">
                                        <?php
                                            foreach($arremp_dtr['date_absents'] as $absent):
                                                echo date('d', strtotime($absent)).' ';
                                            endforeach;
                                            if(count($arremp_dtr['date_absents']) > 0):
                                                echo '&nbsp;<a class="btn btn-xs default" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#absents-modal"> ...</a>';
                                            endif;
                                        ?>
                                    </td>
                                </tr>
                                <?php if($arrData['appointmentCode']=='P'): ?>
                                <tr>
                                    <td><b>Vacation Leave Left</b></td>
                                    <td style="width: 75%;"><?=count($arrleaves) > 0 ? $arrleaves[0]['vlBalance'] : ''?></td>
                                </tr>
                                <tr>
                                    <td><b>Sick Leave Left</b></td>
                                    <td style="width: 75%;"><?=count($arrleaves) > 0 ? $arrleaves[0]['slBalance'] : ''?></td>
                                </tr>
                                <tr>
                                    <td><b>Special Leave Left</b></td>
                                    <td style="width: 75%;"><?=$arrspe_leave?></td>
                                </tr>
                                <tr>
                                    <td><b>Forced Leave Left</b></td>
                                    <td style="width: 75%;"><?=$fl_left?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td><b>Offset Balance</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Undertime</b></td>
                                    <td style="width: 75%;"><?=date('H:i', mktime(0, $arremp_dtr['total_undertime']))?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Late</b></td>
                                    <td style="width: 75%;"><?=date('H:i', mktime(0, $arremp_dtr['total_late']))?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Overtime Weekdays</b></td>
                                    <td style="width: 75%;"><?=date('H:i', mktime(0, $arremp_dtr['total_ot_wkdays']))?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Overtime Weekends/Holidays</b></td>
                                    <td style="width: 75%;"><?=date('H:i', mktime(0, $arremp_dtr['total_ot_wkendsholi']))?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('modals/_att_summary_modal'); ?>