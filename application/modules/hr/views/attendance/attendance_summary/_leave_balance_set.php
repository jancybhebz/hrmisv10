<?php $month = isset($_GET['month']) ? $_GET['month'] : date('m'); $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y'); ?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Set Starting Leave Balance</span>
                    <a data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-view-info"> <i class="icon-info"></i></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-6">
                        <?=form_open('hr/attendance_summary/leave_balance_set/'.$this->uri->segment(5), array('method' => 'post', 'id' => 'frmleavebal'))?>
                            <!-- begin vacation leave -->
                            <div class="form-group">
                                <label class="control-label bold" style="margin-bottom: 10px;">Vacation Leave</label>
                                <br>
                                <label class="control-label">Starting Balance <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="vl_start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Absent Undertime With Pay <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="vl_ut_wpay">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Absent Undertime Without Pa <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="vl_ut_wopay">
                                </div>
                            </div>
                            <!-- end vacation leave -->

                            <!-- begin sick leave -->
                            <div class="form-group">
                                <label class="control-label bold" style="margin-bottom: 10px;">Vacation Leave</label>
                                <br>
                                <label class="control-label">Starting Balance <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="sl_start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Absent Undertime With Pay <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="sl_ut_wpay">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Absent Undertime Without Pa <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="sl_ut_wopay">
                                </div>
                            </div>
                            <!-- end sick leave -->

                            <!-- begin others leave -->
                            <div class="form-group">
                                <label class="control-label bold" style="margin-bottom: 10px;">Vacation Leave</label>
                                <br>
                                <label class="control-label">Offset Balance <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="off_bal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Forced Leave Balance <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="fl_bal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Privilege Leave Balance <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="pl_bal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Include Secondment Leave <span class="required"> * </span></label>
                                <label class="radio-inline">
                                    <input type="radio" name="rad_secl" value="1" <?=isset($arrem_ob) ? $arrem_ob['official'] == 'Y' ? 'checked' : '' : 'checked'?>> Yes </label>
                                <label class="radio-inline">
                                    <input type="radio" name="rad_secl" value="0" <?=isset($arrem_ob) ? $arrem_ob['official'] == 'N' ? 'checked' : '' : ''?>> No </label>
                            </div>
                            <!-- end others leave -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-check"></i> Submit </button>
                                        <a href="<?=base_url('hr/attendance_summary/leave_balance/').$arrData['empNumber'].'?month='.$month.'&yr='.$yr?>" class="btn blue">
                                            <i class="icon-ban"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('modals/_leave_balance_modal'); ?>