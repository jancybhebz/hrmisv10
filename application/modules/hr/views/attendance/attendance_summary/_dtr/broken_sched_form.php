<?php load_plugin('css',array('datatables','datepicker'));?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Schedule</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-6">
                        <?php
                            $form = $action == 'add' ? '' : 'attendance_summary/dtr/broken_sched_edit/'.$this->uri->segment(5);
                            echo form_open($form, array('method' => 'post', 'id' => 'frmaddsched'))?>
                            <div class="form-group">
                                <label class="control-label">Date From <span class="required"> * </span></label>
                                <div class="input-group input-large date-picker input-daterange" data-date="2003" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="dateRange">
                                    <input type="text" class="form-control form-required txtdtpckr" name="from">
                                    <span class="input-group-addon"> to </span>
                                    <input type="text" class="form-control form-required txtdtpckr" name="to">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Attendance Scheme <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="bs-select form-control form-required" name="selAgency" id="selAgency">
                                        <option value="null">-- SELECT ATTENDANCE SCHEME --</option>
                                        <?php foreach($arrAttSchemes as $scheme): ?>
                                            <option value="<?=$scheme['code']?>"> <?=$scheme['label']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                        <a href="<?=base_url('hr/attendance_summary/dtr/broken_sched/').$arrData['empNumber']?>" class="btn blue">
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

<?php load_plugin('js',array('datatables','datepicker'));?>
<!-- <script src="<?=base_url('assets/js/js-validation/dtr_validation.js')?>"></script> -->

<script>
    $(document).ready(function() {
        $('#table-broken_scheds').dataTable();
        $('#dateRange').datepicker();
    });
</script>