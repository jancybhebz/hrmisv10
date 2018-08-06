<?php load_plugin('css', array('select2')) ?>
<div id="payrollDetails_modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Payroll Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Payroll Group</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <?php foreach($pGroups as $pg): ?>
                                    <option value="<?=$pg['payrollGroupCode']?>" <?=$pg['payrollGroupCode'] == $arrData['payrollGroupCode'] ? 'selected' : ''?>>
                                        (<?=$pg['projectDesc']?>) <?=$pg['payrollGroupName']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Included in Payroll</label>
                            <div class="radio-list" style="padding-bottom: 13px;">
                                <label class="radio-inline">
                                    <input type="radio" name="is_incPayroll" value="Yes" <?=$arrData['payrollSwitch'] == 'Y' ? 'checked' : ''?>> Yes </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_incPayroll" value="N" <?=$arrData['payrollSwitch'] == 'N' ? 'checked' : ''?>> No </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attendance Scheme</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Self Employed Tax Status</label>
                            <div class="radio-list" style="padding-bottom: 13px;">
                                <label class="radio-inline">
                                    <input type="radio" name="is_selfemployed" checked> Yes </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_selfemployed"> No </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>With Government Vehicle</label>
                            <div class="radio-list" style="padding-bottom: 13px;">
                                <label class="radio-inline">
                                    <input type="radio" name="w_govt_vehicle" checked> Yes </label>
                                <label class="radio-inline">
                                    <input type="radio" name="w_govt_vehicle"> No </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tax Status</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. of Dependents</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>With Health Insurance Exemption ?</label>
                            <div class="radio-list" style="padding-bottom: 13px;">
                                <label class="radio-inline">
                                    <input type="radio" name="is_health" checked> Yes </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_health"> No </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tax Rate</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>(Authorize Salary *) Hazard Pay Factor</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>RATA Code</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn green"><i class="icon-check"> </i> Save</button>
                <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
            </div>
        </div>
    </div>
    <pre><?php print_r($arrData); ?></pre>
</div>

<div id="positionDetails_modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Payroll Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Appointment Desc</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ItemNumber</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Actual Salary</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Authorize Salary</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position Date</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mode of Separation</label>
                            <select class="form-control select2" placeholder="">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Salary Grade</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Step Number</label>
                            <select class="form-control select2" id="selStep_number" placeholder="select step number">
                                <option value=""></option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date Increment</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn green"><i class="icon-check"> </i> Save</button>
                <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php load_plugin('js', array('select2')) ?>
<script>
    $('select.select2').select2({
        minimumResultsForSearch: -1,
        placeholder: function(){
            $(this).data('placeholder');
        }
    });
</script>