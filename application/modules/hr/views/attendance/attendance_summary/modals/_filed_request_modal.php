<div id="cancel-request" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Cancel Request</h4>
            </div>
            <?=form_open('hr/attendance_summary/cancel_request'.$this->uri->segment(5), array('id' => 'frmcancel_request'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="text" name="txtrequestid" id="txtrequestid">
                            <input type="text" name="txtrequest_code" id="txtrequest_code">
                            <div class="form-group">
                                <label>Are you sure you want to cancel this request?</label>
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