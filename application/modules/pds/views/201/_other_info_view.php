<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">SKILLS / RECOGNITIONS / ORGANIZATIONS
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" id="btnedit_information" data-toggle="modal" href="#edit_information"> <i class="icon-pencil"></i> Edit Information </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <td>
                <table class="table table-striped table-bordered table-hover" id="tblskills" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th>Special Skills / Hobbies</th>
                            <th>Non-Academic Distinctions / Recognition</th>
                            <th>Membership in Association / Organization</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$arrData[0]['skills']?></td>
                            <td><?=$arrData[0]['nadr']?></td>
                            <td><?=$arrData[0]['miao']?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <a class="btn blue btn-sm" data-toggle="modal" href="#modal-legal-information" id="btnview-legal-info"> <i class="fa fa-file-text-o"></i> View Legal Information </a>
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm" data-toggle="modal" href="#modal-legal-information" id="btnedit-legal-info"> <i class="icon-pencil"></i> Edit Legal Information </a>
                <?php endif; ?>
            </td>
        </tr>
        <tr class="active">
            <th style="line-height: 2;" colspan="4">CHARACTER REFERENCES
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn blue btn-sm pull-right" id="btnadd_charrefs" data-toggle="modal" href="#add_character_refs"> <i class="fa fa-plus"></i> Add Character Reference </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <td>
                <table class="table table-striped table-bordered table-hover" id="tblchar-references" style="width: 100% !important;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name of Reference</th>
                            <th>Address</th>
                            <th>Telephone Number</th>
                            <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                                <th></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($arrReferences as $refs): ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$refs['refName']?></td>
                            <td><?=$refs['refAddress']?></td>
                            <td><?=$refs['refTelephone']?></td>
                            <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                                <td style="width: 200px;" nowrap>
                                    <center>
                                        <a class="btn green btn-xs btnedit_char_refs" data-json='<?=json_encode($refs)?>'>
                                            <i class="fa fa-pencil"></i> Edit </a>
                                        <a class="btn red btn-xs btndelete_char_refs" data-toggle="modal" href="#delete_reference" data-refid="<?=$refs['ReferenceIndex']?>">
                                            <i class="fa fa-trash"></i> Delete </a>
                                    </center>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>

<?php require 'modal/_other_info.php'; ?>

<script>
    $(document).ready(function() {
        $('#btnview-legal-info').click(function() {
            $('b.blue, b.red').show();
            $('div.radio-list, .btnlegal_info-save, #txtindigenous, #txtdisabled, #txtsoloparent').hide();
        });

        $('#btnedit-legal-info').click(function() {
            $('b.blue, b.red').hide();
            if($('#y_indi').is(':checked')) { $('#txtindigenous').show(); } else { $('#txtindigenous').hide(); }
            if($('#y_disable').is(':checked')) { $('#txtdisabled').show(); } else { $('#txtdisabled').hide(); }
            if($('#y_solo').is(':checked')) { $('#txtsoloparent').show(); } else { $('#txtsoloparent').hide(); }
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

        $('#y_indi').on('click',function() {
            $('#txtindigenous').show();
        });
        $('#n_indi').on('click',function() {
            $('#txtindigenous').hide();
        });

        $('#y_disable').on('click',function() {
            $('#txtdisabled').show();
        });
        $('#n_disable').on('click',function() {
            $('#txtdisabled').hide();
        });

        $('#y_solo').on('click',function() {
            $('#txtsoloparent').show();
        });
        $('#n_solo').on('click',function() {
            $('#txtsoloparent').hide();
        });

    });
</script>

