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
                    <span class="caption-subject bold uppercase"> Generate DTR</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?=form_open('finance/libraries/deductions/edit/'.$this->uri->segment(4), array('method' => 'post', 'id' => 'frmaddsched'))?>
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

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Month <span class="required"> * </span></label>
                                    <select class="form-control form-required bs-select" name="selinc_month" id="selinc_month" placeholder="">
                                        <option value="null">Month</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>"><?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Year <span class="required"> * </span></label>
                                    <select class="form-control form-required bs-select" name="selinc_yr" id="selinc_yr" placeholder="">
                                        <option value="null">Year</option>
                                        <?php foreach (getYear() as $yr): ?>
                                            <option value="<?=$yr?>"><?=$yr?></option>
                                        <?php endforeach; ?>
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
                            <div class="col-sm-12">
                                <div class="form-actions">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance/override/generate_dtr')?>" class="btn blue">
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