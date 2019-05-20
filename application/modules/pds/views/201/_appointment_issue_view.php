<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">APPOINTMENT ISSUE
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn blue btn-sm pull-right" id="btnadd_charrefs" data-toggle="modal" href="#add_character_refs"> <i class="fa fa-plus"></i> Add Appointment Issue </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <td>
                <table class="table table-striped table-bordered table-hover" id="tblappointment" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Position</th>
                            <th>Date Issued Add</th>
                            <th>Date Publication</th>
                            <th>Relevant Experience</th>
                            <th>Relevant Training</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php $no=1; foreach($arrReferences as $refs): ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$refs['refName']?></td>
                            <td><?=$refs['refAddress']?></td>
                            <td><?=$refs['refTelephone']?></td>
                            <td style="width: 200px;" nowrap>
                                <center>
                                    <a class="btn green btn-xs btnedit_char_refs" data-json='<?=json_encode($refs)?>'>
                                        <i class="fa fa-pencil"></i> Edit </a>
                                    <a class="btn red btn-xs btndelete_char_refs" data-toggle="modal" href="#delete_reference" data-refid="<?=$refs['ReferenceIndex']?>">
                                        <i class="fa fa-trash"></i> Delete </a>
                                </center>
                            </td>
                        </tr>
                        <?php endforeach; ?> -->
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>

<?php require 'modal/_appointment_issue_info.php'; ?>

<script>
    $(document).ready(function() {
        $('#btnview-legal-info').click(function() {
            $('div.radio-list, .btnlegal_info-save').hide();
        });

        $('#btnedit-legal-info').click(function() {
            $('div.radio-list, .btnlegal_info-save').show();
        });

        $('a#btnadd_charrefs').click(function() {
            $('#frm_charrefs').attr("action","<?=base_url('pds/add_char_reference/').$this->uri->segment(3)?>");
            $('span.action').html('Add ');
            
            $('#txtref_name').val('');
            $('#txtref_address').val('');
            $('#txtref_telno').val('');
            
            $('#txtrefid').val('');
        });

        $('#tblchar-references').on('click','a.btnedit_char_refs',function() {
            var jsondata = $(this).data('json');
            $('#frm_charrefs').attr("action","<?=base_url('pds/edit_char_reference/').$this->uri->segment(3)?>");
            $('span.action').html('Edit ');
            $('#add_character_refs').modal('show');
            
            $('#txtref_name').val(jsondata.refName);
            $('#txtref_address').val(jsondata.refAddress);
            $('#txtref_telno').val(jsondata.refTelephone);

            $('#txtrefid').val(jsondata.ReferenceIndex);
        });

        $('#tblchar-references').on('click','a.btndelete_char_refs',function() {
            $('#txtdel_char_ref').val($(this).data('refid'));
        });

    });
</script>

