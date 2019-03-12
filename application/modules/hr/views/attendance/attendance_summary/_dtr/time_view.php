<?php load_plugin('css',array('datatables'));?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Time</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber']?>" class="btn grey-cascade">
                            <i class="icon-calendar"></i> DTR </a>
                        <a class="btn blue" href="<?=base_url('hr/attendance_summary/dtr/time_add/').$arrData['empNumber']?>">
                            <i class="fa fa-plus"></i> Add Time</a>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover" id="table-dtrtime">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="text-align: center;">No</th>
                                    <th rowspan="2" style="text-align: center;">Date</th>
                                    <th colspan="2" style="text-align: center;">Morning</th>
                                    <th colspan="2" style="text-align: center;">Afternoon</th>
                                    <th colspan="2" style="text-align: center;">Overtime</th>
                                </tr>
                                <tr>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                    <th>Time in</th>
                                    <th>Time out</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($arrdtrTime as $dtr): ?>
                                <tr>
                                    <td align="center"><?=$no++?></td>
                                    <td><?=$dtr['dtrDate']?></td>
                                    <td><?=$dtr['inAM']?></td>
                                    <td><?=$dtr['outAM']?></td>
                                    <td><?=$dtr['inPM']?></td>
                                    <td><?=$dtr['outPM']?></td>
                                    <td><?=$dtr['inOT']?></td>
                                    <td><?=$dtr['outOT']?></td>
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

<div id="modal-deleteTime" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Time</h4>
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
</div>

<?php load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#table-dtrtime').dataTable();
        $('#table-dtrtime').on('click', 'button.btn-delete', function() {
            $('#txtdel_action').val($(this).data('id'));
            $('#modal-deleteHoliday').modal('show');
        });
    });
</script>