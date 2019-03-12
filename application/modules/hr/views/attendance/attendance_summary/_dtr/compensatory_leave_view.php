<?php load_plugin('css',array('datatables'));?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Compensatory Leave</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber']?>" class="btn grey-cascade">
                            <i class="icon-calendar"></i> DTR </a>
                        <a class="btn blue" href="<?=base_url('hr/attendance_summary/dtr/compensatory_leave_add/').$arrData['empNumber']?>">
                            <i class="fa fa-plus"></i> Add Compensatory Leave</a>
                        <br><br>
                        
                        <table class="table table-striped table-bordered table-hover" id="table-comp_leaves">
                            <thead>
                                <th style="width: 50px;">No</th>
                                <th>Date</th>
                                <th>Morning Time</th>
                                <th>Afternoon Time</th>
                                <!-- <td></td> -->
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($arrCompLeaves as $compleave): ?>
                                <tr>
                                    <td align="center"><?=$no++?></td>
                                    <td><?=$compleave['dtrDate']?></td>
                                    <td><?=$compleave['inAM']?> - <?=$compleave['outAM']?></td>
                                    <td><?=$compleave['inPM']?> - <?=$compleave['outPM']?></td>
                                    <!-- TODO:: Edit and Delete for confirmation; what if user decided to undo the compensatory leave? -->
                                    <!-- <td align="center"> -->
                                        <!-- <a href="<?=base_url('hr/attendance_summary/dtr/local_holiday_edit/'.$this->uri->segment(5).'?id='.$compleave['id'])?>" class="btn green btn-sm"> <i class="fa fa-pencil"></i> Edit</a>
                                        <button class="btn red btn-sm btn-delete" data-id="<?=$compleave['id']?>">
                                            <i class="fa fa-trash"></i> Delete</button> -->
                                    <!-- </td> -->
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

<!-- <div id="modal-deleteLeave" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Compensatory Leave</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/actionLongevity/'.$this->uri->segment(5), array('id' => 'frmrollback'))?>
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
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div> -->

<?php load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#table-comp_leaves').dataTable();
    });
</script>