<?=load_plugin('css', array('datatables'))?>

<?=form_open('', array('class' => 'form-horizontal', 'method' => 'get'))?>
<div class="tab-content">
    <div class="tab-pane active">
        <div class="block">
            <h3 style="display: inline-block;">Compute Benefits</h3>
            <small style="margin-left: 10px;">Payroll Date: April 2019 || Total Working days: 19 for Subsistence Allowance and RATA For Permanent Employees</small>
        </div>
        <div class="row">
            <div class="col-md-12 scroll">
                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                <table class="table table-striped table-bordered order-column" id="tblemployee-list" style="visibility: hidden;">
                    <thead>
                        <tr>
                            <th> Employee Name </th>
                            <th> Salary </th>
                            <th> Working Days </th>
                            <th> Actual Days Present </th>
                            <th> Absences </th>
                            <th> HP % </th>
                            <th> HP </th>
                            <th> 8 hrs </th>
                            <th> 6 hrs </th>
                            <th> 5 hrs </th>
                            <th> 4 hrs </th>
                            <th> Total per diem </th>
                            <th> Subsistence </th>
                            <th> Days w/o Laundry</th>
                            <th> Laundry </th>
                            <th> LP </th>
                            <th> RA % </th>
                            <th> RA </th>
                            <th> days w/ vehicle</th>
                            <th> TA % </th>
                            <th> TA </th>
                            <th> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach(range(0, 100) as $i): ?>
                        <tr>
                            <td nowrap> Employee sample <?=$i?> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <?php endforeach;  ?>
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

<script>
    $(document).ready(function() {
        $('#tblemployee-list').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#tblemployee-list').css('visibility', 'visible');
            }} );
    });
</script>