<?php load_plugin('css', array('datepicker')) ?>
<div id="benefitList" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Income Update</h4>
                <small>
                    <b id="modal-title"></b>
                    <br><i>Income Type : </i><i id="sub-title"></i>
                </small>
            </div>
            <?=form_open('finance/compensation/personnel_profile/edit_benefits/'.$this->uri->segment(5), array('id' => 'frmBenefit'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <input type="hidden" name="txtincomecode" id="txtincomecode">
                        <input type="hidden" name="txtbenefitcode" id="txtbenefitcode">
                        <input type="hidden" name="txtbenefitType" id="txtbenefitType">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Amount<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control form-required" name="txtamount" id="txtamount-bl">
                                </div>
                            </div>
                            <div class="form-group" id="div-tax">
                                <label class="control-label">Tax<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control form-required" name="txttax" id="txttax-bl">
                                </div>
                            </div>
                            <div class="form-group" <?=in_array('Period 1', setPeriods($empPayrollProcess)) ? '' : 'hidden'?>>
                                <label class="control-label">Period 1<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" name="txtperiod1" id="txtperiod1-bl">
                                </div>
                            </div>
                            <div class="form-group" <?=in_array('Period 2', setPeriods($empPayrollProcess)) ? '' : 'hidden'?>>
                                <label class="control-label">Period 2<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" name="txtperiod2" id="txtperiod2-bl">
                                </div>
                            </div>
                            <div class="form-group" <?=in_array('Period 3', setPeriods($empPayrollProcess)) ? '' : 'hidden'?>>
                                <label class="control-label">Period 3<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" name="txtperiod3" id="txtperiod3-bl">
                                </div>
                            </div>
                            <div class="form-group" <?=in_array('Period 4', setPeriods($empPayrollProcess)) ? '' : 'hidden'?>>
                                <label class="control-label">Period 4<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input type="text" class="form-control" name="txtperiod4" id="txtperiod4-bl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status<span class="required"> * </span></label>
                                <div class="input-icon right">
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
                    <button type="button" id="btnupdateallemployees" class="btn green pull-left">
                        <i class="icon-check"> </i> Update All Employee</button>
                    <button type="submit" id="btnsubmit-deductDetails" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<!-- begin longevity pay -->
<div id="longevityModal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Longevity Update</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/actionLongevity/'.$this->uri->segment(5), array('id' => 'frmLongevity'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtaction" id="txtaction">
                            <input type="hidden" name="txtlongevityid" id="txtlongevityid">
                            <div class="form-group">
                                <label class="control-label">Longevity Date<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input class="form-control date-picker form-required" data-date="2012-03-01" data-date-format="yyyy-mm-dd" name="txtlongevitydate" id="txtlongevitydate-bl"
                                    type="text" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Salary<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtsalary" id="txtsalary-bl">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Percent<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtpercent" id="txtpercent-bl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end longevity pay -->

<!-- begin appointment list -->
<div id="appointmentList" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Select Employees to Update</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/updateAllEmployees/'.$this->uri->segment(5).'/income', array('id' => 'frmupdateEmployees'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <input type="hidden" name="txtbenefitType" id="txtallbenefittype">
                        <input type="hidden" name="txtincomecode" id="txtallincomecode">
                        <input type="hidden" name="txtamount" id="txtallamount">
                        <input type="hidden" name="txttax" id="txtalltax">
                        <input type="hidden" name="txtperiod1" id="txtallperiod1">
                        <input type="hidden" name="txtperiod2" id="txtallperiod2">
                        <input type="hidden" name="txtperiod3" id="txtallperiod3">
                        <input type="hidden" name="txtperiod4" id="txtallperiod4">
                        <input type="hidden" name="selstatus" id="selallstatus">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><input type="checkbox" id="chkall" value="all" name="chkappnt[]"> Check All</label>
                                <div class="checkbox-list">
                                    <?php foreach(array_slice($arrAppointments, 0, $arrAppointments_by2) as $chkappointment): ?>
                                        <label alt="Double click to uncheck">
                                            <!-- id="chkappnt" -->
                                            <input type="checkbox" class="check" value="<?=$chkappointment['appointmentCode']?>" name="chkappnt[]">
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
                                            <!-- id="chkappnt" -->
                                            <input type="checkbox" class="check" value="<?=$chkappointment['appointmentCode']?>" name="chkappnt[]">
                                            <?=$chkappointment['appointmentDesc']?> </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- id="btnsubmit-payrollDetails" -->
                    <button type="submit" class="btn green"><i class="icon-check"> </i> Save</button>
                    <button type="button" class="btn btn btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
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
                    <!-- id="btnsubmit-payrollDetails" -->
                    <button type="submit" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js', array('select2','datepicker')) ?>
<script src="<?=base_url('assets/js/custom/finance-income.js')?>"></script>

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
        // $('#el-1, #el-2, #el-3, #el-4').hide();

        // $("#chkall").click(function () {
        //     if($(this).is(":checked")){
        //         $('div.checker span').addClass('checked');
        //         $('input#chkappnt').prop('checked', true);
        //     }else{
        //         $('div.checker span').removeClass('checked');
        //         $('input#chkappnt').prop('checked', false);
        //     }
        // });

        // $("input#chkappnt").click(function () {
        //     if($(this).is(":checked")){
        //         $('div#uniform-chkall span').addClass('checked');
        //         $('input#chkall').prop('checked', true);
        //     }else{
        //         $('div#uniform-chkall span').removeClass('checked');
        //         $('input#chkall').prop('checked', false);
        //     }
        // });
        // $('.date-picker').datepicker();
        
        // $('#btnsubmit-deductDetails').click(function(e) {
        //     totalamt = parseFloat($('#txtamount-bl').val().replace(/[^\d\.]/g, ""));
        //     period1 = parseFloat($('#txtperiod1-bl').val().replace(/[^\d\.]/g, ""));
        //     period2 = parseFloat($('#txtperiod2-bl').val().replace(/[^\d\.]/g, ""));
        //     period3 = parseFloat($('#txtperiod3-bl').val().replace(/[^\d\.]/g, ""));
        //     period4 = parseFloat($('#txtperiod4-bl').val().replace(/[^\d\.]/g, ""));

        //     if(totalamt != (period1 + period2 + period3 + period4)){
        //         $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').parent().parent().addClass('has-error');
        //         $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').prev("i").attr('data-original-title', "Total amount should be equal to the total of period amount.");
        //         $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').prev("i").show();
        //         e.preventDefault();
        //     }else{
        //         $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').prev("i").hide();
        //         $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').parent().parent().removeClass('has-error');
        //     }

        // });

        // $('#btnupdateallemployees').click(function() {
        //     $('#txtallincomecode').val($('#txtincomecode').val());
        //     $('#txtallbenefittype').val($('#txtbenefitType').val());
        //     $('#txtallamount').val($('#txtamount-bl').val());
        //     $('#txtalltax').val($('#txttax').val());
        //     $('#txtallperiod1').val($('#txtperiod1-bl').val());
        //     $('#txtallperiod2').val($('#txtperiod2-bl').val());
        //     $('#txtallperiod3').val($('#txtperiod3-bl').val());
        //     $('#txtallperiod4').val($('#txtperiod4-bl').val());
        //     $('#selallstatus').val($('#selstatus-bl').val());
        //     $('#appointmentList').modal('show');
        // });

    });
</script>
