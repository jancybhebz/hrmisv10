<style type="text/css">
    div#ms-selemps {
        width: 100% !important;
    }
</style>
<?=load_plugin('css', array('datetimepicker','timepicker','datepicker','select2','multi-select'))?>
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
                        <?=form_open('finance/libraries/deductions/edit/'.$this->uri->segment(4), array('method' => 'post', 'id' => 'frmaddsched'))?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Official Business <span class="required"> * </span></label>
                                    <label><input type="radio" name="isob"> Yes</label>
                                    <label><input type="radio" name="isob"> No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Select Employees <span class="required"> * </span></label>
                                    <select class="bs-select form-control">
                                        <option>All Employees</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Appointment Status <span class="required"> * </span></label>
                                    <select class="select2 form-control">
                                        <option>All Employees</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="control-label">Date From <span class="required"> * </span></label>
                                    <select multiple="multiple" class="multi-select form-control" id="selemps" name="my_multi_select2[]">
                                        <optgroup label="NFC EAST">
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option>Philadelphia Eagles</option>
                                            <option>Washington Redskins</option>
                                        </optgroup>
                                        <optgroup label="NFC NORTH">
                                            <option>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                        </optgroup>
                                        <optgroup label="NFC SOUTH">
                                            <option>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                        </optgroup>
                                        <optgroup label="NFC WEST">
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Date From <span class="required"> * </span></label>
                                    <div class="input-group date-picker input-daterange" data-date="2003" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="dateRange">
                                        <input type="text" class="form-control form-required" name="from">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control form-required" name="to">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Time From <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="08:00:00 AM">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Time To <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-clock-o"></i>
                                        <input type="text" class="form-control timepicker form-required timepicker-default" name="dtmFtimeIn" id="dtmFtimeIn" value="05:00:00 PM">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Place <span class="required"> * </span></label>
                                    <input type="text" class="form-control" name="">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                    <br>
                                    <label><input type="checkbox" name=""> With Meal</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Purpose <span class="required"> * </span></label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-actions">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance/override/ob')?>" class="btn blue">
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

<?=load_plugin('js',array('datetimepicker','timepicker','datepicker','select2','multi-select'));?>


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
        $('#selemps').multiSelect({});
    });
</script>