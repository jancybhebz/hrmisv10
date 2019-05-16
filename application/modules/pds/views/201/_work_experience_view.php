<?=load_plugin('css',array('datatables'));?>
<!-- begin education information -->
<style>th {vertical-align: middle !important;text-align: center;}</style>

<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">WORK EXPERIENCE (Include Private Employment)
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn blue btn-sm pull-right" href="javascript:;" id="btnadd_workxp"> <i class="icon-pencil"></i> Add Work Experience </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <table class="table table-striped table-bordered table-hover" id="tblworkxp" style="width: 50% !important;">
                <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th colspan="2">Inclusive Dates</th>
                        <th rowspan="2">Position Title</th>
                        <th rowspan="2">Department / Agency /<br> Office Company</th>
                        <th rowspan="2">Monthly</th>
                        <th rowspan="2">Salary / <br>Job Pay Grade</th>
                        <th rowspan="2">Status of<br> Appointment</th>
                        <th rowspan="2">Gov. Service <br>(<i>Yes / No</i>)</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th>From</th>
                        <th>To</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($arrService as $srvc):?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td style="text-align: center;" nowrap><?=$srvc['serviceFromDate']?></td>
                            <td style="text-align: center;" nowrap><?=$srvc['serviceToDate']?></td>
                            <td style="text-align: center;"><?=$srvc['positionDesc']?></td>
                            <td style="text-align: center;"><?=$srvc['stationAgency']?></td>
                            <td style="text-align: center;"><?=number_format($srvc['salary'],2)?></td>
                            <td style="text-align: center;"><?=$srvc['salaryGrade']?></td>
                            <td style="text-align: center;"><?=$srvc['appointmentCode']?></td>
                            <td style="text-align: center;"><?=$srvc['governService']?></td>
                            <td style="width: 150px;" nowrap>
                                <center>
                                    <a class="btn green btn-xs btnedit_srvc" data-json='<?=json_encode($srvc)?>'>
                                        <i class="fa fa-pencil"></i> Edit </a>
                                    <a class="btn red btn-xs btndelete_srvc" data-toggle="modal" href="#delete_srvc" data-examid="<?=$srvc['serviceRecID']?>">
                                        <i class="fa fa-trash"></i> Delete </a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </tr>
    </table>
</div>
<?php require 'modal/_workxp_info.php'; ?>
<!-- end education information -->
<?=load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#tblworkxp').dataTable( {pageLength: 5} );

        $('a#btnadd_workxp').click(function() {
            $('#frmxp').attr("action","<?=base_url('pds/add_work_xp/').$this->uri->segment(3)?>");
            $('span.action').html('Add ');
            $('#add_work_xp').modal('show');
            // $('#exam_desc').select2('val', '');
            // $('#txtrating').val('');
            // $('#txtplace_exam').val('');
            // $('#txtdate_exam').val('');
            // $('#txtlicense').val('');
            // $('#txtvalidity').val('');
            // $('#txtverifier').val('');
            // $('#txtreviewer').val('');

            // $('#txtexamid').val('');
        });

        $('#tblworkxp').on('click','a.btnedit_exam',function() {
            var jsondata = $(this).data('json');
            $('#frmxp').attr("action","<?=base_url('pds/edit_exam/').$this->uri->segment(3)?>");
            $('span.action').html('Edit ');
            $('#add_work_xp').modal('show');
            // $('#exam_desc').select2('val', jsondata.examCode);
            // $('#txtrating').val(jsondata.examRating);
            // $('#txtplace_exam').val(jsondata.examPlace);
            // $('#txtdate_exam').val(jsondata.examDate);
            // $('#txtlicense').val(jsondata.licenseNumber);
            // $('#txtvalidity').val(jsondata.dateRelease);
            // $('#txtverifier').val(jsondata.verifier);
            // $('#txtreviewer').val(jsondata.reviewer);

            // $('#txtexamid').val(jsondata.ExamIndex);
        });

        $('#tblworkxp').on('click','a.btndelete_exam',function() {
            $('#txtdel_exam').val($(this).data('examid'));
        });
    });
</script>