<?php load_plugin('css', array('datepicker')) ?>
<div id="regularDeductions" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Deduction Update</h4>
                <small>
                    <b id="modal-title"></b>
                    <br><i>Income Type : </i><i id="sub-title"></i>
                </small>
            </div>
            <?=form_open('finance/compensation/personnel_profile/edit_deduction/'.$this->uri->segment(5), array('id' => 'frmBenefit'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <input type="text" name="txtdeductcode" id="txtdeductcode">
                        <input type="text" name="txtdeductioncode" id="txtdeductioncode">
                        <input type="text" name="txtdeductionType" id="txtdeductionType">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Monthly<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtamount" id="txtamount-bl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Period 1 (1-15)<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtperiod1" id="txtperiod1-bl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Period 2 (16-30)<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtperiod2" id="txtperiod2-bl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control bs-select form-required" name="selstatus" id="selstatus-bl">
                                        <option value="">SELECT STATUS</option>
                                        <?php foreach($arrStatus as $id=>$desc): ?>
                                            <option value="<?=$id?>">
                                                <?=$desc?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnupdateallemployee" class="btn green pull-left">
                        <i class="icon-check"> </i> Update All Employee</button>
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<div id="deleteLongevity" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Longevity</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/actionLongevity/'.$this->uri->segment(5), array('id' => 'frmdellongevity'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtdel_action" id="txtdel_action">
                            <input type="hidden" name="txtdel_longevityid" id="txtdel_longevityid">
                            <div class="form-group">
                                <label>Are you sure you want to delete this data?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<!-- begin appointment list -->
<div id="appointmentList" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Select Employees to Update</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/updateAllEmployees/'.$this->uri->segment(5).'/loan', array('id' => 'frmupdateEmployees'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <input type="text" name="txtdeductcode" id="txtalldeductcode">
                        <input type="text" name="txtdeductioncode" id="txtalldeductioncode">
                        <input type="text" name="txtdeductionType" id="txtalldeductionType">
                        <input type="text" name="txtamount" id="txtallamount">
                        <input type="text" name="txtperiod1" id="txtallperiod1">
                        <input type="text" name="txtperiod2" id="txtallperiod2">
                        <input type="text" name="selstatus" id="selallstatus">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><input type="checkbox" id="chkall" value="all" name="chkappnt[]"> Check All</label>
                                <div class="checkbox-list">
                                    <?php foreach(array_slice($arrAppointments, 0, $arrAppointments_by2) as $chkappointment): ?>
                                        <label alt="Double click to uncheck">
                                            <input type="checkbox" class="check" id="chkappnt" value="<?=$chkappointment['appointmentCode']?>" name="chkappnt[]">
                                            <?=$chkappointment['appointmentDesc']?> </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="checkbox-list">
                                    <?php foreach(array_slice($arrAppointments, $arrAppointments_by2, count($arrAppointments)) as $chkappointment): ?>
                                        <label alt="Double click to uncheck">
                                            <input type="checkbox" class="check" id="chkappnt" value="<?=$chkappointment['appointmentCode']?>" name="chkappnt[]">
                                            <?=$chkappointment['appointmentDesc']?> </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn btn btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js', array('select2','datepicker','form_validation')) ?>
<script>
    function numberformat(num) {
        var parts = num.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        if(parts.length == 1){
            parts[1] = "00";
        }
        return parts.join(".");
    }
    $(document).ready(function() {
        $("#chkall").click(function () {
            if($(this).is(":checked")){
                $('div.checker span').addClass('checked');
                $('input#chkappnt').prop('checked', true);
            }else{
                $('div.checker span').removeClass('checked');
                $('input#chkappnt').prop('checked', false);
            }
        });

        $("input#chkappnt").click(function () {
            if($(this).is(":checked")){
                $('div#uniform-chkall span').addClass('checked');
                $('input#chkall').prop('checked', true);
            }else{
                $('div#uniform-chkall span').removeClass('checked');
                $('input#chkall').prop('checked', false);
            }
        });
        $('.date-picker').datepicker();

        var totalamt = 0;
        $('#txtamount-bl').keyup(function() {
            totalamt = $(this).val();
            totalamt = totalamt.replace(/[^\d\.]/g, "");
            $('#txtperiod1-bl').val(numberformat(totalamt));
            console.log(totalamt);
        });

        $('#txtperiod1-bl').keyup(function() {
            totalamt = $('#txtamount-bl').val().replace(/[^\d\.]/g, "");
            period1 = $(this).val().replace(/[^\d\.]/g, "");
            totalamt = totalamt - period1;
            $('#txtperiod2-bl').val(numberformat(totalamt));
            console.log(totalamt);
        });

        $('#txtperiod2-bl').keyup(function() {
            totalamt = $('#txtamount-bl').val().replace(/[^\d\.]/g, "");
            period2 = $(this).val().replace(/[^\d\.]/g, "");
            totalamt = totalamt - period2;
            $('#txtperiod1-bl').val(numberformat(totalamt));
            console.log(totalamt);
        });

        $('#btnupdateallemployee').click(function() {
            $('#appointmentList').modal('show');
            $('#txtalldeductcode').val($('#txtdeductcode').val());
            $('#txtalldeductioncode').val($('#txtdeductioncode').val());
            $('#txtalldeductionType').val($('#txtdeductionType').val());
            $('#txtallamount').val($('#txtamount-bl').val());
            $('#txtallperiod1').val($('#txtperiod1-bl').val());
            $('#txtallperiod2').val($('#txtperiod2-bl').val());
            $('#selallstatus').val($('#selstatus-bl').val());
        });

    });
</script>
