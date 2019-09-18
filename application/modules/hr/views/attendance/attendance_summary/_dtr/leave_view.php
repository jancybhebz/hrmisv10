<?php load_plugin('css',array('datatables'));?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <small>
                                    <div class="well">
                                        <b>Certify Leave Credits as of <?=date('F', mktime(0, 0, 0, $arrLeaveBalance['periodMonth'], 10)).' '.$arrLeaveBalance['periodYear']?></b>&nbsp;
                                        <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> view</a>
                                        <div class="collapse" id="collapseExample">
                                            <p></p>
                                            <p><b>Vacation Leave Left:</b> <?=$arrLeaveBalance['vlPreBalance'] - $arrLeaveBalance['filed_vl']?></p>
                                            <p><b>Sick Leave Left:</b> <?=$arrLeaveBalance['slPreBalance'] - $arrLeaveBalance['filed_sl']?></p>
                                            <p><b>Privilege Leave Left:</b> <?=$arrLeaveBalance['plPreBalance'] - $arrLeaveBalance['filed_pl']?></p>
                                            <b>Force Leave Left:</b> <?=$arrLeaveBalance['flPreBalance'] - $arrLeaveBalance['filed_fl']?>
                                        </div>
                                    </div>
                                </small>
                            </div>
                        </div>
                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber'].'/?datefrom='.currdfrom().'&dateto='.currdto()?>" class="btn grey-cascade">
                            <i class="icon-calendar"></i> DTR </a>
                        <a class="btn blue" href="<?=base_url('hr/attendance_summary/dtr/leave_add/').$arrData['empNumber']?>">
                            <i class="fa fa-plus"></i> Add Leave</a>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover" id="table-leave">
                            <thead>
                                <th>No</th>
                                <th>Type of Leave</th>
                                <th style="text-align: center;">Whole/Half Day</th>
                                <th style="text-align: center;">Date From</th>
                                <th style="text-align: center;">Date To</th>
                                <th style="text-align: center;">Day(s) Applied</th>
                                <th>Specify Reason</th>
                                <td></td>
                            </thead>
                             <tbody>
                                <?php $no=1;foreach($arrLeaves as $leave): ?>
                                <tr>
                                    <td align="center"><?=$no++?></td>
                                    <td><?=$leave['leaveType']?></td>
                                    <td align="center"><?=$leave['leaveCode'][0] == 'H' ? 'Yes' : ''?></td>
                                    <td align="center"><?=$leave['leaveFrom']?></td>
                                    <td align="center"><?=$leave['leaveTo']?></td>
                                    <td align="center"><?=((strtotime($leave['leaveTo']) - strtotime($leave['leaveFrom'])) / 86400) + 1?></td>
                                    <td><?=$leave['reason']?></td>
                                    <td style="white-space: nowrap !important;">
                                        <a href="<?=base_url('hr/attendance_summary/dtr/leave_edit/'.$this->uri->segment(5).'?id='.$leave['leaveID'])?>" class="btn green btn-xs"> <i class="fa fa-pencil"></i> Edit</a>
                                        <button class="btn red btn-xs btn-delete" data-id="<?=$leave['leaveID']?>">
                                            <i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="modal-deleteLeave" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Leave</h4>
            </div>
            <?=form_open('hr/attendance/dtr_delete_leave/'.$this->uri->segment(5), array('id' => 'frmdelete'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtdel_action" id="txtdel_action">
                            <div class="form-group">
                                <label>Are you sure you want to Delete this data?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-delete-leave" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js',array('datatables'));?>
<?php $this->load->view('modals/_leave_monetize_modal'); ?>

<script>
    $(document).ready(function() {
        $('#table-leave').dataTable();
        $('#table-leave').on('click', 'button.btn-delete', function() {
            $('#txtdel_action').val($(this).data('id'));
            $('#modal-deleteLeave').modal('show');
        });
    });
</script>