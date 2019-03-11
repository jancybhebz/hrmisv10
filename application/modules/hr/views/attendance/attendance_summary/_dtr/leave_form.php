<?=load_plugin('css', array('datetimepicker','timepicker','datepicker'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?php 
                        $form = $action == 'add' ? '' : 'hr/attendance_summary/dtr/leave_edit/'.$this->uri->segment(5).'?id='.$_GET['id'];
                        echo form_open($form, array('method' => 'post', 'id' => 'frmleave'))?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Type of Leave <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="sel_leavetype" id="sel_leavetype">
                                            <option value="null">-- SELECT LEAVE TYPE --</option>
                                            <?php foreach($arrleaveTypes as $leave): ?>
                                                <option value="<?=$leave['leaveCode']?>" <?=isset($arremp_leave) ? $leave['leaveCode'] == $arremp_leave['leaveCode'] ? 'selected' : '' : ''?>>
                                                    <?=$leave['leaveType']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row specific-leave">
                            <div class="col-md-4">
                                <div class="loading-image-small"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                                <div class="form-group">
                                    <label class="control-label">Specific Type of Leave <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="sel_spe_leave" id="sel_spe_leave">
                                            <option value="null">--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-left: -22px;">
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="radleave" value="1" <?=isset($arrem_ob) ? $arrem_ob['official'] == 'Y' ? 'checked' : '' : 'checked'?>> Whole Day </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radleave" value="0" <?=isset($arrem_ob) ? $arrem_ob['official'] == 'N' ? 'checked' : '' : ''?>> Half Day </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date From <span class="required"> * </span></label>
                                    <div class="input-group input-daterange">
                                        <input type="text" class="form-control form-required date-picker" data-date-format="yyyy-mm-dd"
                                            name="txtleave_dtfrom" id="txtleave_dtfrom" value="<?=date('Y-m-d')?>">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control form-required date-picker" data-date-format="yyyy-mm-dd"
                                            name="txtleave_dtto" id="txtleave_dtto" value="<?=date('Y-m-d')?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">No of Day(s) applied <span class="required"> * <small><i>Weekends and holidays not included</i></small></span></label>
                                    <div class="input-icon right">
                                        <input type="text" class="form-control form-required" value="<?=isset($arremp_leave) ? $noofdays : ''?>" id="txtleave_noofdays" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Specific Reason <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <textarea class="form-control form-required" name="txtleave_reason"><?=isset($arremp_leave) ? $arremp_leave['reason'] : ''?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/leave/').$arrData['empNumber']?>" class="btn blue">
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

        // begin setting specific leave
        $('.loading-image-small,.specific-leave').hide();
        $('#sel_leavetype').change(function() {
            leavetype = $(this).val();
            $('.loading-image-small').show();
            $.get("<?=base_url('hr/attendance/dtr_specific_leave')?>", {type: leavetype}, function(data) {
                data = data.trim();
                // console.log(data);
                if(data != 'empty'){
                    $('#sel_spe_leave').empty();
                    var opts = '';
                    $.each(JSON.parse(data), function(i, opt) { opts = opts + '<option value="'+opt.specifyLeave+'">'+opt.specifyLeave+'</option>';});
                    $('#sel_spe_leave').append(opts);
                    $('.specific-leave').show();
                }else{
                    $('.specific-leave').hide();
                }
                $('#sel_spe_leave').selectpicker('refresh');
                $('.loading-image-small').hide();
            });
        });
        // end setting specific leave

        // begin getting number of days
        var leavefrom = $('#txtleave_dtfrom').val();
        var leaveto   = $('#txtleave_dtto').val();
        $('#txtleave_dtfrom').on('changeDate', function(ev){
            $(this).datepicker('hide');
            leavefrom = $('#txtleave_dtfrom').val();
            $.get("<?=base_url('hr/attendance/dtr_no_ofdays')?>", {leavefrom: leavefrom, leaveto: leaveto}, function(data) {
                data = data.trim();
                $('#txtleave_noofdays').val(data);
            });
        });

        $('#txtleave_dtto').on('changeDate', function(ev){
            $(this).datepicker('hide');
            leaveto   = $('#txtleave_dtto').val();
            $.get("<?=base_url('hr/attendance/dtr_no_ofdays')?>", {leavefrom: leavefrom, leaveto: leaveto}, function(data) {
                data = data.trim();
                $('#txtleave_noofdays').val(data);
            });
        });
        // end getting number of days

    });
</script>