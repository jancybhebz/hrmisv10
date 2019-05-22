<?=load_plugin('css', array('datatables'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Official Business</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <a class="btn blue" href="<?=base_url('hr/attendance/override/ob_add')?>">
                            <i class="fa fa-plus"></i> Add OB</a>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover" id="tbloverride_ob">
                            <thead>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Date Filed</th>
                                <th>Place</th>
                                <th>Purpose</th>
                                <th style="text-align: center;">Date From</th>
                                <th style="text-align: center;">Date To</th>
                                <td></td>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach($arr_ob as $ob): ?>
                                <tr>
                                    <td align="center"><?=$no++?></td>
                                    <td align="center"><?=$ob['dateFiled']?></td>
                                    <td><?=$ob['obPlace']?></td>
                                    <td><?=$ob['purpose']?></td>
                                    <td align="center"><?=$ob['obDateFrom']?> <?=date('g:i A', strtotime($ob['obTimeFrom']))?></td>
                                    <td align="center"><?=$ob['obDateTo']?> <?=date('g:i A', strtotime($ob['obTimeTo']))?></td>
                                    <td width="150px" nowrap>
                                        <center>
                                            <a href="<?=base_url('hr/attendance/override/ob_edit/'.$ob['override_id'])?>" class="btn green btn-xs" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-deleteOB">
                                                <i class="fa fa-pencil"></i> Edit</a>
                                            <button class="btn red btn-xs" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#modal-deleteOB">
                                                <i class="fa fa-trash"></i> Delete</button>
                                        </center>
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
<?=load_plugin('js', array('datatables'))?>

<script>
    $(document).ready(function() {
        $('#tbloverride_ob').dataTable( {pageLength: 5} );

        // $('a#btnadd_training').click(function() {
        //     $('#frmtraining').attr("action","<?=base_url('pds/add_training/').$this->uri->segment(3)?>");
        //     $('span.action').html('Add ');
        //     $('#add_training').modal('show');
            
        //     $('#txttra_name').val('');
        //     $('#txttra_hrs').val('');
        //     $('#txttra_venue').val('');
        //     $('#seltra_typeld').selectpicker('val', '');
        //     $('#txttra_sponsored').val('');
        //     $('#txttra_cost').val('');
        //     $('#txttra_contract').val('');
        //     $('#txttra_sdate').val('');
        //     $('#txttra_edate').val('');

        //     $('#txttraid').val('');
        // });

        // $('#tbltraining').on('click','a.btnedit_srvc',function() {
        //     var jsondata = $(this).data('json');
        //     $('#frmtraining').attr("action","<?=base_url('pds/edit_training/').$this->uri->segment(3)?>");
        //     $('span.action').html('Edit ');
        //     $('#add_training').modal('show');
            
        //     $('#txttra_name').val(jsondata.trainingTitle);
        //     $('#txttra_hrs').val(jsondata.trainingHours);
        //     $('#txttra_venue').val(jsondata.trainingVenue);
        //     $('#seltra_typeld').selectpicker('val', jsondata.trainingTypeofLD);
        //     $('#txttra_sponsored').val(jsondata.trainingConductedBy);
        //     $('#txttra_cost').val(jsondata.trainingCost);
        //     $('#txttra_contract').val(jsondata.trainingContractDate);
        //     $('#txttra_sdate').val(jsondata.trainingStartDate);
        //     $('#txttra_edate').val(jsondata.trainingEndDate);

        //     $('#txttraid').val(jsondata.TrainingIndex);
        // });

        // $('#tbltraining').on('click','a.btndelete_tra',function() {
        //     $('#txtdel_tra').val($(this).data('traid'));
        // });
    });
</script>