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
            <small style="margin-left: 10px;">Payroll Date: April 2019 || Total Working days: 19 for Subsistence Allowance and RATA For Permanent Employees</small>
            <a href="javascript:;" class="btn green btn-refresh pull-right" style="top: 12px;position: relative;">
                <i class="fa fa-refresh"></i> Reload </a>
        </div>
        <div class="row">
            <div class="col-md-12 scroll">
                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                <table class="table table-striped table-bordered order-column" id="tblemployee-list" style="visibility: hidden;">
                    <thead>
                        <tr>
                            <th> Employee Name </th>
                            <th style="text-align: center"> Salary </th>
                            <th style="text-align: center"> Working Days </th>
                            <th style="text-align: center"> Actual Days Present </th>
                            <th style="text-align: center"> Absences </th>
                            <th style="text-align: center"> HP % </th>
                            <th style="text-align: center"> HP </th>
                            <th style="text-align: center"> 8 hrs </th>
                            <th style="text-align: center"> 6 hrs </th>
                            <th style="text-align: center"> 5 hrs </th>
                            <th style="text-align: center"> 4 hrs </th>
                            <th style="text-align: center"> Total per diem </th>
                            <th style="text-align: center"> Subsistence </th>
                            <th style="text-align: center"> Days w/o Laundry</th>
                            <th style="text-align: center"> Laundry </th>
                            <th style="text-align: center"> LP </th>
                            <th style="text-align: center"> RA % </th>
                            <th style="text-align: center"> RA </th>
                            <th style="text-align: center"> days w/ vehicle</th>
                            <th style="text-align: center"> TA % </th>
                            <th style="text-align: center"> TA </th>
                            <th style="text-align: center"> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($arrEmployees as $emp): ?>
                            <tr>
                                <td><?=getfullname($emp['emp_detail']['firstname'],$emp['emp_detail']['surname'],$emp['emp_detail']['middlename'],$emp['emp_detail']['middleInitial'])?></td>
                                <td style="text-align: center"><?=number_format($emp['emp_detail']['authorizeSalary'], 2)?></td>
                                <td style="text-align: center"><?=$emp['working_days']?></td>
                                <td style="text-align: center"><?=$emp['working_days'] - $emp['date_absents']?></td>
                                <td style="text-align: center"><?=$emp['date_absents']?></td>
                                <td style="text-align: center"> HP % </td>
                                <td style="text-align: center"> HP </td>
                                <td style="text-align: center"> 8 hrs </td>
                                <td style="text-align: center"> 6 hrs </td>
                                <td style="text-align: center"> 5 hrs </td>
                                <td style="text-align: center"> 4 hrs </td>
                                <td style="text-align: center"> Total per diem </td>
                                <td style="text-align: center"> Subsistence </td>
                                <td style="text-align: center"> Days w/o Laundry</td>
                                <td style="text-align: center"> Laundry </td>
                                <td style="text-align: center"> LP </td>
                                <td style="text-align: center"> RA % </td>
                                <td style="text-align: center"> RA </td>
                                <td style="text-align: center"> days w/ vehicle</td>
                                <td style="text-align: center"> TA % </td>
                                <td style="text-align: center"> TA </td>
                                <td style="text-align: center"> Total </td>
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