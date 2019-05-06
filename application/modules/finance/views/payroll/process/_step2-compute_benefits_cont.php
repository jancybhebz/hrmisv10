<?=load_plugin('css', array('datatables'))?>

<?=form_open('', array('class' => 'form-horizontal', 'method' => 'post'))?>
<input type="hidden" name="txtprocess" value='<?=$_POST['txtprocess']?>'>
<input type="hidden" name="chkbenefit" value='<?=json_encode($_POST['chkbenefit'])?>'>
<div class="tab-content">
    <div class="loading-fade" style="display: none;width: 80%;height: 100%;top: 150px;">
        <center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center>
    </div>
    <div class="tab-pane active">
        <div class="block">
            <h3 style="display: inline-block;">Compute Benefits</h3>
            <a href="javascript:;" class="btn green btn-refresh pull-right" style="top: 20px;position: relative;">
                <i class="fa fa-refresh"></i> Recompute </a>
        </div>
        <div class="block" style="margin-bottom: 10px;">
            <small style="margin-left: 10px;">
                Payroll Date: <?=$payroll_date?> || Total Working days: <?=$curr_period_workingdays?> for Subsistence Allowance and RATA For Permanent Employees.
            </small>
            <small style="margin-left: 10px;">
                Use data from <?=$process_data_date?> || working days <?=$process_data_workingdays?>
            </small>
        </div>
        <div class="row">
            <div class="col-md-12 scroll">
                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                <table class="table table-striped table-bordered order-column" id="tblemployee-list" style="visibility: hidden;">
                    <thead>
                        <tr>
                            <th> Employee Name </th>
                            <th style="text-align: center"> Basic Salary </th>
                            <th style="text-align: center"> Days Present </th>
                            <th style="text-align: center"> Days Absent </th>
                            <th style="text-align: center"> Hours Late </th>
                            <th style="text-align: center"> Minutes Late </th>
                            <th style="text-align: center"> Period Salary </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center"> Total </td>
                            <td style="text-align: center"> Total </td>
                            <td style="text-align: center"> Total </td>
                            <td style="text-align: center"> Total </td>
                            <td style="text-align: center"> Total </td>
                            <td style="text-align: center"> Total </td>
                            <td style="text-align: center"> Total </td>
                        </tr>
                    </tbody>
                </table>

                <?php 
                    if($no_empty_lb > 0):
                        echo 'Employee with no leave balance = '.$no_empty_lb;
                    endif;
                 ?>
            </div>
        </div>
        <br><br>

    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="javascript:;" class="btn default btn-previous">
                <i class="fa fa-angle-left"></i> Back </a>
            <a href="<?=base_url('finance/payroll_update/process/select_deductions')?>" class="btn blue btn-submit"> Save and Continue
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<?=form_close()?>
<?=load_plugin('js', array('datatables'))?>
<script src="<?=base_url('assets/js/custom/payroll-compute_benefits.js')?>"></script>
<script>
    $(document).ready(function() {
        $('#tblemployee-list').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#tblemployee-list').css('visibility', 'visible');
            }} );
        $('a.btn-refresh').on('click', function() {
            $('.loading-fade').show();
            location.reload();
        });
    });
</script>