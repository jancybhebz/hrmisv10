<?=load_plugin('css', array('datetimepicker','timepicker','datepicker'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Travel Order</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?=form_open('finance/libraries/deductions/edit/'.$this->uri->segment(4), array('method' => 'post', 'id' => 'frmaddsched'))?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Destination <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <input type="text" class="form-control form-required" name="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date <span class="required"> * </span></label>
                                    <div class="input-group date-picker input-daterange" data-date="2003" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="dateRange">
                                        <input type="text" class="form-control form-required" name="from">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control form-required" name="to">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Purpose <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <textarea class="form-control form-required"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Source of Fund <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="selAgency" id="selAgency">
                                            <option value="null">-- SELECT FUND SOURCE --</option>
                                            <option value="Fund 101">Fund 101</option>
                                            <option value="Fund 202">Fund 202</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Transportation <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="selAgency" id="selAgency">
                                            <option value="null">-- SELECT TRANSPORTATION --</option>
                                            <option value="Official Vehicle">Official Vehicle</option>
                                            <option value="Non-agency">Non-agency</option>
                                            <option value="Personal">Personal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label col-md-3">Will Claim Perdiem <span class="required"> * </span></label>
                                <div class="radio-list col-md-5">
                                    <input type="radio" class="radio-inline" name="">Yes
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="radio-inline" name="">No
                                </div>
                            </div>
                            <br><br>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label col-md-3">With Meal <span class="required"> * </span></label>
                                <div class="radio-list col-md-5">
                                    <input type="radio" class="radio-inline" name="">Yes
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="radio-inline" name="">No
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/to/').$arrData['empNumber']?>" class="btn blue">
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