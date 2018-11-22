<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Certify Offsets</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <a href="<?=base_url('hr/attendance_summary/dtr/').$arrData['empNumber']?>" class="btn grey-cascade">
                            <i class="icon-calendar"></i> DTR </a>
                        <a class="btn green pull-right" href="<?=base_url('hr/attendance_summary/dtr/broken_sched_add/').$arrData['empNumber']?>">
                            <i class="fa fa-check"></i> Update Offset</a>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover" id="table-offsets">
                            <thead>
                                <th></th>
                                <th>Date</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>Rem</th>
                                <th>OT</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name=""></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('modals/_leave_monetize_modal'); ?>
