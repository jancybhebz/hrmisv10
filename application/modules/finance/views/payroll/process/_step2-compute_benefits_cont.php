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
                Payroll Date: <?=$payroll_date?> (<?=ordinal($_POST['period'])?> Half) || For <?=$_POST['selemployment']?> Employees || Total Calendar days: <?=$curr_period_workingdays?>
            </small>
        </div>
        <div class="row">
            <div class="col-md-12 scroll">
                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                <table class="table table-striped table-bordered order-column" id="tblemployee-list" style="visibility: hidden;">
                    <thead>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;"> Employee Name </th>
                            <th style="text-align: center;vertical-align: middle;"> Employee number </th>
                            <th style="text-align: center;vertical-align: middle;"> Basic Salary </th>
                            <th style="text-align: center;vertical-align: middle;"> Days Present </th>
                            <th style="text-align: center;vertical-align: middle;"> Days Absent </th>
                            <th style="text-align: center;vertical-align: middle;"> Total <br>Late and Undertime </th>
                            <th style="text-align: center;vertical-align: middle;"> Deduction Amount </th>
                            <th style="text-align: center;vertical-align: middle;"> Period Salary </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($arrEmployees as $emp): ?>
                            <tr>
                                <td><?=getfullname($emp['emp_detail']['firstname'],$emp['emp_detail']['surname'],$emp['emp_detail']['middlename'],$emp['emp_detail']['middleInitial'])?></td>
                                <td><?=$emp['emp_detail']['empNumber']?></td>
                                <td style="text-align: center"><?=number_format($emp['emp_detail']['actualSalary'], 2)?></td>
                                <td style="text-align: center"><?=$emp['actual_days_present']?></td>
                                <td style="text-align: center"><?=$emp['actual_days_absent']?></td>
                                <td style="text-align: center"><?=date('H:i', mktime(0, $emp['total_late'] + $emp['total_ut']))?></td>
                                <td style="text-align: center"><?=number_format($emp['total_deduct'], 2)?></td>
                                <td style="text-align: center"><?=number_format($emp['period_salary'], 2)?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

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