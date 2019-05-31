<!-- begin log modal -->
<div id="log-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">DTR Log</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>IP Address</th>
                                        <th>Date and Time</th>
                                        <th>Old Values</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td id="td-empname" align="center"></td>
                                    <td id="td-ipadd" align="center"></td>
                                    <td id="td-datetime" align="center"></td>
                                    <td id="td-oldval" align="center"></td>
                                </tbody>
                            </table>
                            <div>
                                <small id="span-bsremarks"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"><i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end log modal -->

<!-- begin ob modal -->
<div id="ob-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">OB Details</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-bordered table-striped" id="tblob-details">
                                <tr>
                                    <th width="30%">Date Filed</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Official</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>OB Date</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Place</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>With Meal</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Purpose</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"><i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end ob modal -->

<!-- begin to modal -->
<div id="to-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Travel Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-bordered table-striped" id="tblto-details">
                                <tr>
                                    <th width="30%">Date Filed</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Travel Order Date</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Purpose</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Destination</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>With Meal</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Transportation</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>With per diem</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"><i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end to modal -->


<!-- begin leave modal -->
<div id="leave-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Leave Details</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-bordered table-striped" id="tblleave-details">
                                <tr>
                                    <th width="30%">Date Filed</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Leave Type</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Reason</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"><i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end leave modal -->

<!-- begin print-preview modal -->
<div id="print-preview-modal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Daily Time Record</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <embed src="<?=base_url('employee/dtr/print_preview/'.$arrData['empNumber'].'?month='.$month.'&yr='.$yr)?>" frameborder="0" width="100%" height="400px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?=base_url('employee/dtr/print_preview/'.$arrData['empNumber'].'?month='.$month.'&yr='.$yr)?>" class="btn blue btn-sm" target="_blank"> <i class="glyphicon glyphicon-resize-full"> </i> Open in New Tab</a>
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"> <i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end print-preview modal -->