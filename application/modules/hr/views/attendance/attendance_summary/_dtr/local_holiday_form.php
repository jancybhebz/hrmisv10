<?php load_plugin('css',array('select2'));?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Local Holiday</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-6">
                        <?php 
                        $form = $action == 'add' ? '' : 'hr/attendance_summary/dtr/local_holiday_edit/'.$this->uri->segment(5).'?id='.$_GET['id'];
                        echo form_open($form, array('method' => 'post', 'id' => 'frmlocalholiday'))?>
                            <div class="form-group">
                                <label class="control-label">Holiday Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="select2 form-control form-required" name="selholiday" id="selholiday">
                                        <option value="null">-- SELECT HOLIDAY --</option>
                                        <?php foreach($localHolidays as $holi): ?>
                                            <option value="<?=$holi['holidayCode']?>" <?=isset($arrempholiday) ? $holi['holidayCode'] == $arrempholiday['holidayCode'] ? 'selected' : '' : ''?>>
                                                <?=$holi['holidayName']?> - <?=date("F", mktime(0, 0, 0, $holi['holidayMonth'], 10))?> <?=$holi['holidayDay']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                        <a href="<?=base_url('hr/attendance_summary/dtr/local_holiday/').$arrData['empNumber']?>" class="btn blue">
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

<?php load_plugin('js',array('select2'));?>
<?php $this->load->view('modals/_leave_monetize_modal'); ?>
