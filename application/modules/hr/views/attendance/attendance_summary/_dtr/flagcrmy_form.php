<?=load_plugin('css', array('datetimepicker','timepicker','datepicker'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Flag Ceremony</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?=form_open('', array('method' => 'post', 'id' => 'frmfc'))?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <input type="text" class="form-control form-required date-picker" data-date-format="yyyy-mm-dd" name="txtdtr_fcdate">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Time in <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control form-required timepicker-default" name="txtdtr_amtimein" id="txtdtr_amtimein"
                                            value="<?=$_ENV['FLAGCRMNY']?> AM" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/flagcrmy/').$arrData['empNumber']?>" class="btn blue">
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

<?=load_plugin('js',array('datetimepicker','datepicker'));?>

<script>
    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('.date-picker').on('changeDate', function(){
            $(this).datepicker('hide');
        });
    });
</script>