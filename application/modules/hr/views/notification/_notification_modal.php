<!-- begin modal 201 -->
<div class="modal fade in" id="modal-201_form" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Official Business</b></h5>
            </div>
            <?=form_open('pds/edit_skill/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmedit_info'))?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Special SKills / Hobbies</label>
                    <textarea class="form-control" id="txtskills" name="txtskills"><?=$arrData[0]['skills']?></textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Non-Academic Distinctions / Recognition</label>
                    <textarea class="form-control" id="txtrecognition" name="txtrecognition"><?=$arrData[0]['nadr']?></textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Membership in Association / Organization</label>
                    <textarea class="form-control" id="txtorganization" name="txtorganization"><?=$arrData[0]['miao']?></textarea>
                    <span class="help-block"></span>
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
<!-- end modal 201 -->

<!-- begin modal OB -->
<div class="modal fade in" id="modal-ob_form" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Edit Information</b></h5>
            </div>
            <?=form_open('pds/edit_skill/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmedit_info'))?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Special SKills / Hobbies</label>
                    <textarea class="form-control" id="txtskills" name="txtskills"><?=$arrData[0]['skills']?></textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Non-Academic Distinctions / Recognition</label>
                    <textarea class="form-control" id="txtrecognition" name="txtrecognition"><?=$arrData[0]['nadr']?></textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Membership in Association / Organization</label>
                    <textarea class="form-control" id="txtorganization" name="txtorganization"><?=$arrData[0]['miao']?></textarea>
                    <span class="help-block"></span>
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
<!-- end modal OB -->

<!-- begin cance request -->
<div id="modal-cancelRequest" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Cancel Request</h4>
            </div>
            <?=form_open('employee/requests/cancel_request', array('id' => 'frmcancel_request'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtreqid" id="txtreqid">
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
<!-- end cance request -->