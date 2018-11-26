<?=load_plugin('css', array('datetimepicker','timepicker','datepicker'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Compensatory Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?=form_open('finance/libraries/deductions/edit/'.$this->uri->segment(4), array('method' => 'post', 'id' => 'frmaddsched'))?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-calendar"></i>
                                        <input class="form-control date-picker form-required" data-date="2012-03-01" data-date-format="yyyy-mm-dd" 
                                                name="txtdependent_bday" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label"><b>Morning</b><br>Time From <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="08:00:00 AM">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label"><br>Time in <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="05:00:00 PM">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label"><b>Afternoon</b><br>Time From <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="08:00:00 AM">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label"><br>Time in <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="05:00:00 PM">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/compensatory_leave/').$arrData['empNumber']?>" class="btn blue">
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
<?php $this->load->view('modals/_leave_monetize_modal'); ?>

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