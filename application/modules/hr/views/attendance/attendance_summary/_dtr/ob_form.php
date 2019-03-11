<?=load_plugin('css', array('datetimepicker','timepicker','datepicker'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> OB</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?php 
                        $form = $action == 'add' ? '' : 'hr/attendance_summary/dtr/ob_edit/'.$this->uri->segment(5).'?id='.$_GET['id'];
                        echo form_open($form, array('method' => 'post', 'id' => 'frmob'))?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Official Business? <span class="required"> * </span></label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radob" value="1" <?=isset($arrem_ob) ? $arrem_ob['official'] == 'Y' ? 'checked' : '' : 'checked'?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radob" value="0" <?=isset($arrem_ob) ? $arrem_ob['official'] == 'N' ? 'checked' : '' : ''?>> No </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Date From <span class="required"> * </span></label>
                                    <div class="input-group date-picker input-daterange" data-date="2003" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="dateRange">
                                        <input type="text" class="form-control form-required" name="txtob_dtfrom"
                                            value="<?=isset($arrem_ob) ? $arrem_ob['obDateFrom'] : ''?>">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control form-required" name="txtob_dtto"
                                            value="<?=isset($arrem_ob) ? $arrem_ob['obDateTo'] : ''?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Time From <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="txtob_tmin"
                                            id="dtmFtimeIn" value="<?=isset($arrem_ob) ? $arrem_ob['obTimeFrom'] : '08:00:00 AM'?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Time To <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="txtob_tmout"
                                            id="dtmFtimeIn" value="<?=isset($arrem_ob) ? $arrem_ob['obTimeTo'] : '05:00:00 PM'?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Place <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa fa-warning tooltips i-required"></i>
                                <textarea class="form-control form-required" name="txtob_place"><?=isset($arrem_ob) ? $arrem_ob['obPlace'] : ''?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">With Meal? <span class="required"> * </span></label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radob_wmeal" value="1" <?=isset($arrem_ob) ? $arrem_ob['obMeal'] == 'Y' ? 'checked' : '' : ''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radob_wmeal" value="0" <?=isset($arrem_ob) ? $arrem_ob['obMeal'] == 'N' ? 'checked' : '' : 'checked'?>> No </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Purpose <span class="required"> * </span></label>
                            <div class="input-icon right">
                                <i class="fa fa-warning tooltips i-required"></i>
                                <textarea class="form-control form-required" name="txtob_purpose"><?=isset($arrem_ob) ? $arrem_ob['purpose'] : ''?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/ob/').$arrData['empNumber']?>" class="btn blue">
                                        <i class="icon-ban"></i> Cancel</a>
                                </div>
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

<?=load_plugin('js',array('datetimepicker','timepicker','datepicker'));?>

<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm:ss A',
            disableFocus: true,
            showInputs: false,
            showSeconds: true,
            showMeridian: true,
        });
        $('.date-picker').datepicker();
    });
</script>