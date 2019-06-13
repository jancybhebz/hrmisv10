<?=load_plugin('css', array('select','select2','datepicker'))?>
<!-- begin modal update position details info -->
<div class="modal fade in" id="edit_position_details" aria-hidden="true">
    <div class="modal-dialog-lg" style="width: 75%;margin: 5% auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Edit Position Details</b></h5>
            </div>
            <?=form_open('pds/edit_position_details/'.$this->uri->segment(3), array('method' => 'post', 'name' => 'frmemp_posdetails','class' => 'form-horizontal'))?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Service Code</label>
                                <div class="col-md-8">
                                    <select class="form-control bs-select" name="sel_srvcode">
                                        <option value=""> </option>
                                        <?php foreach($service_code as $srv):
                                                $selected = $srv['serviceCode'] == $arrPosition[0]['serviceCode'] ? 'selected' : '';
                                                echo '<option value="'.$srv['serviceCode'].'" '.$selected.'>'.$srv['serviceDesc'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Day Government</label>
                                <div class="col-md-8">
                                    <input type="text" name="txt_fday_govt" class="form-control date-picker"
                                        value="<?=$arrPosition[0]['firstDayGov']?>" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Day Agency</label>
                                <div class="col-md-8">
                                    <input type="text" name="txt_fday_agency" class="form-control date-picker"
                                        value="<?=$arrPosition[0]['firstDayAgency']?>" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mode of Separation<span class="required"> * </span></label>
                                <div class="col-md-8">
                                    <select class="form-control bs-select" name="selmode_separation">
                                        <option value=""> </option>
                                        <?php foreach($mode_separation as $mode):
                                                $selected = $mode['statusOfAppointment'] == $arrPosition[0]['statusOfAppointment'] ? 'selected' : '';
                                                echo '<option value="'.$mode['statusOfAppointment'].'" '.$selected.'>'.$mode['statusOfAppointment'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Separation Date</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtseparation_date" class="form-control date-picker"
                                        value="<?=$arrPosition[0]['contractEndDate']?>" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Appointment Desc</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="selappt_desc">
                                        <option value=""> </option>
                                        <?php foreach($arrAppointments as $appt):
                                                $selected = $appt['appointmentCode'] == $arrPosition[0]['appointmentCode'] ? 'selected' : '';
                                                echo '<option value="'.$appt['appointmentCode'].'" '.$selected.'>'.$appt['appointmentDesc'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Executive Office</label>
                                <div class="col-md-8">
                                    <input type="text" name="" class="form-control" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Service</label>
                                <div class="col-md-8">
                                    <input type="text" name="" class="form-control" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Division</label>
                                <div class="col-md-8">
                                    <input type="text" name="" class="form-control" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Section</label>
                                <div class="col-md-8">
                                    <input type="text" name="" class="form-control" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Personnel Action</label>
                                <div class="col-md-8">
                                    <select class="form-control bs-select" name="selper_action">
                                        <option value=""> </option>
                                        <?php foreach($personnel_action as $action):
                                                $selected = $action['personnelAction'] == $arrPosition[0]['personnelAction'] ? 'selected' : '';
                                                echo '<option value="'.$action['personnelAction'].'" '.$selected.'>'.$action['personnelAction'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Place of Assignment</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtassign_place" value="<?=$arrPosition[0]['assignPlace']?>" class="form-control" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Salary Effectivity Date</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtsalary_eff_date" class="form-control date-picker"
                                        value="<?=$arrPosition[0]['effectiveDate']?>" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Employment Basis</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optemp_basis" value="FullTime"
                                                <?=$arrPosition[0]['employmentBasis'] == 'FullTime' ? 'checked' : ''?>> Full Time </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optemp_basis" value="PartTime"
                                                <?=$arrPosition[0]['employmentBasis'] == 'PartTime' ? 'checked' : ''?>> Part Time </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Service</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optcateg_srv" value="Career"
                                                <?=$arrPosition[0]['categoryService'] == 'Career' ? 'checked' : ''?>> Career </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optcateg_srv" value="Non-Career"
                                                <?=$arrPosition[0]['categoryService'] == 'Non-Career' ? 'checked' : ''?>> Non-Career </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tax Status</label>
                                <div class="col-md-8">
                                    <select class="form-control bs-select" name="sel_tax_stat">
                                        <option value=""> </option>
                                        <?php foreach($tax_stat as $stat):
                                                $selected = $stat['taxStatus'] == $arrPosition[0]['taxStatCode'] ? 'selected' : '';
                                                echo '<option value="'.$stat['taxStatus'].'" '.$selected.'>'.$stat['taxStatus'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">No. of Dependents</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtno_dependents" class="form-control" value="<?=isset($arrPosition) ? $arrPosition[0]['dependents'] : ''?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end modal update position details info -->

<!-- begin modal update payroll details info -->
<div class="modal fade in" id="edit_payroll_details" aria-hidden="true">
    <div class="modal-dialog-lg" style="width: 75%;margin: 5% auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Edit Payroll Details</b></h5>
            </div>
            <?=form_open('pds/edit_payroll_details/'.$this->uri->segment(3), array('method' => 'post', 'name' => 'employeeform','class' => 'form-horizontal'))?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Payroll Group</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="selpayrollGrp" placeholder="">
                                        <option value=""></option>
                                        <?php foreach($pGroups as $pg): ?>
                                            <option value="<?=$pg['payrollGroupCode']?>" <?=$pg['payrollGroupCode'] == $arrData[0]['payrollGroupCode'] ? 'selected' : ''?>>
                                                (<?=$pg['payrollGroupCode']?>) <?=$pg['payrollGroupName']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Include in DTR?</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_dtr" value="Y"
                                                <?=$arrPosition[0]['dtrSwitch'] == 'Y' ? 'checked' : ''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_dtr" value="N"
                                                <?=$arrPosition[0]['dtrSwitch'] == 'N' ? 'checked' : ''?>> No </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Attendance Scheme</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="selattScheme" placeholder="">
                                        <option value=""></option>
                                        <?php foreach($arrAttSchemes as $as): ?>
                                            <option value="<?=$as['code']?>" <?=$as['code'] == $arrData[0]['schemeCode'] ? 'selected' : ''?>>
                                                <?=$as['label']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Include in PhilHealth?</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_phealth" value="Y"
                                                <?=$arrPosition[0]['philhealthSwitch'] == 'Y' ? 'checked' : ''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_phealth" value="N"
                                                <?=$arrPosition[0]['philhealthSwitch'] == 'N' ? 'checked' : ''?>> No </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Include in Life & Retirement?</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_liferet" value="Y"
                                                <?=$arrPosition[0]['lifeRetSwitch'] == 'Y' ? 'checked' : ''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_liferet" value="N"
                                                <?=$arrPosition[0]['lifeRetSwitch'] == 'N' ? 'checked' : ''?>> No </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Include in Payroll?</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_payroll" value="Y"
                                                <?=$arrPosition[0]['payrollSwitch'] == 'Y' ? 'checked' : ''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_payroll" value="N"
                                                <?=$arrPosition[0]['payrollSwitch'] == 'N' ? 'checked' : ''?>> No </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Hazard Pay Factor</label>
                                <div class="col-md-8">
                                    <input type="text" name="txthazard" value="<?=$arrPosition[0]['hpFactor']?>" class="form-control" value="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Include in PAGIBIG?</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_pagibig" value="Y"
                                                <?=$arrPosition[0]['pagibigSwitch'] == 'Y' ? 'checked' : ''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="inc_pagibig" value="N"
                                                <?=$arrPosition[0]['pagibigSwitch'] == 'N' ? 'checked' : ''?>> No </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end modal update payroll details info -->

<!-- begin modal update plantilla details info -->
<div class="modal fade in" id="edit_plantilla_details" aria-hidden="true">
    <div class="modal-dialog-lg" style="width: 75%;margin: 5% auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Edit Plantilla Position Details</b></h5>
            </div>
            <?=form_open('pds/edit_plantilla_details/'.$this->uri->segment(3), array('method' => 'post', 'name' => 'employeeform','class' => 'form-horizontal'))?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Item Number</label>
                                <input type="hidden" id="txtunique_itemno" name="txtunique_itemno" value="<?=$arrPosition[0]['uniqueItemNumber']?>">
                                <div class="col-md-8">
                                    <select class="form-control select2" id="sel_plantilla" name="sel_plantilla">
                                        <option value=""> </option>
                                        <?php foreach($arrplantilla as $plantilla):
                                                $selected = $plantilla['itemNumber'] == $arrPosition[0]['itemNumber'] ? 'selected' : '';
                                                echo '<option id="'.$plantilla['uniqueItemNumber'].'" value="'.$plantilla['itemNumber'].'" '.$selected.'>'.$plantilla['itemNumber'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Actual Salary</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtactual_salary" class="form-control" 
                                        value="<?=isset($arrPosition) ? number_format($arrPosition[0]['actualSalary'],2) : ''?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Authorize Salary</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtauthorized_salary" class="form-control" 
                                        value="<?=isset($arrPosition) ? number_format($arrPosition[0]['authorizeSalary'],2) : ''?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Position</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtplant_pos" class="form-control" value="<?=$arrData[0]['positionDesc']?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Position Date</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtposition_date" class="form-control date-picker"
                                        value="<?=$arrPosition[0]['positionDate']?>" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Salary Grade</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtsalary_grade" class="form-control" value="<?=$arrPosition[0]['salaryGradeNumber']?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Step Number</label>
                                <div class="col-md-8">
                                    <select class="form-control bs-select" name="selStep_number" placeholder="">
                                        <option value=""></option>
                                        <?php foreach (range(1, 8) as $step): ?>
                                            <option value="<?=$step?>" <?=$step == $arrPosition[0]['stepNumber'] ? 'selected' : ''?>>
                                                <?=$step?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date Increment</label>
                                <div class="col-md-8">
                                    <input type="text" name="txt_date_inc" class="form-control date-picker" 
                                        value="<?=$arrPosition[0]['dateIncremented']?>" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end modal update plantilla details info -->

<?=load_plugin('js', array('select2','datepicker'))?>

<script>
    $(document).ready(function() {
        $('#sel_plantilla').on('select2:select',function(e) {
            dataid = $(this).find('option:selected').attr('id');
            $('#txtunique_itemno').val(dataid);
        });
    });
</script>