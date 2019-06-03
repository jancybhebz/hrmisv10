<div id="modal-viewRequest" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <?=form_open('employee/requests/cancel_request', array('class' => 'form-horizontal'))?>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Request ID</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreqid" name="txtreqid" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Employee Number</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_empno" name="txtreq_empno" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Employee Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_empname" name="txtreq_empname" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Type of Leave</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_leave_type" name="txtreq_leave_type" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label">Specific Leave</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_spe_leave" name="txtreq_spe_leave" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date From</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_dfrom" name="txtreq_dfrom" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date To</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_dto" name="txtreq_dto" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Reason</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="txtreq_reason" name="txtreq_reason" disabled></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Out/In Patient</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_patient" name="txtreq_patient">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Location</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_location" name="txtreq_location">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Commutation</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="txtreq_comm" name="txtreq_comm">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status of Request</label>
                            <div class="col-md-8">
                                <select class="bs-select form-control" name="selreq_stat" id="selreq_stat"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Remarks</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="txtreq_remarks" name="txtreq_remarks"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btncertify" class="btn btn-sm green"><i class="icon-check"> </i> Certify</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>