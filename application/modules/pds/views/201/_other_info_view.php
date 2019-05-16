<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">SKILLS / RECOGNITION / ORGANIZATIONS
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" id="btnedit_information" data-toggle="modal" href="#edit_information"> <i class="icon-pencil"></i> Edit Information </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <table class="table table-striped table-bordered table-hover" id="tbltraining" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th>Special SKills / Hobbies</th>
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
        </tr>
    </table>
    <a class="btn blue btn-sm" data-toggle="modal" href="#modal-legal-information" id="btnview-legal-info"> <i class="fa fa-file-text-o"></i> View Legal Information </a>
    <a class="btn green btn-sm" data-toggle="modal" href="#modal-legal-information" id="btnedit-legal-info"> <i class="icon-pencil"></i> Edit Legal Information </a>
</div>

<?php require 'modal/_other_info.php'; ?>

<script>
    $(document).ready(function() {
        $('#btnview-legal-info').click(function() {
            $('div.radio-list, .btnlegal_info-save').hide();
        });
        $('#btnedit-legal-info').click(function() {
            $('div.radio-list, .btnlegal_info-save').show();
        });
    });
</script>