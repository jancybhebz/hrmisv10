<?=load_plugin('css', array('datatables'))?>

<?=form_open('', array('class' => 'form-horizontal', 'method' => 'post'))?>
<span id="txtprocess"><?=$_POST['txtprocess']?></span>
<span id="chkbenefit"><?=json_encode($_POST['chkbenefit'])?></span>
<div class="tab-content">
    <div class="tab-pane active">
        <div class="block">
            <h3 style="display: inline-block;">Compute Benefits</h3>
            <small style="margin-left: 10px;">Payroll Date: April 2019 || Total Working days: 19 for Subsistence Allowance and RATA For Permanent Employees</small>
        </div>
        <div class="row">
            <div class="col-md-12 scroll">
                <div></div>
                <pre><?=print_r($_POST)?></pre>
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
    });
</script>