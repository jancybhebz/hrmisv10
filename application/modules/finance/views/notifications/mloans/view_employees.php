<?php load_plugin('css',array('datatables','select2','datepicker'));?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Notifications</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Maturing Loans</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row profile-account">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Employees with Maturing Loan(s) for the month of <?=date('F')?></span>
                        </div>
                    </div>
                
                    <div class="portlet-body">
                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-mloans" style="display: none">
                            <thead>
                                <tr>
                                    <tr>
                                        <th style="text-align: center; width: 50px;"> No. </th>
                                        <th> Employee Number </th>
                                        <th> Name </th>
                                        <th style="text-align: center;"> Loan </th>
                                        <th style="text-align: center;"> Amount </th>
                                        <th style="text-align: center;"> Monthly Deduction </th>
                                        <th style="text-align: center;"> Total Remittance </th>
                                        <th style="text-align: center;"> Balance </th>
                                        <th style="text-align: center;"> Due Date </th>
                                        <th style="text-align: center;"> Actions </th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($arrEmployees as $employee): ?>
                                    <tr>
                                        <td> <?=$no++?> </td>
                                        <td> <?=$employee['empNumber']?> </td>
                                        <td> <?=getfullname($employee['surname'], $employee['firstname'], $employee['middlename'], $employee['middleInitial'])?> </td>
                                        <td> <?=$employee['deductionDesc']?> </td>
                                        <td> <?=number_format($employee['amountGranted'],2)?> </td>
                                        <td> <?=number_format($employee['monthly'],2)?> </td>
                                        <td> <?=number_format($employee['total_remit'],2)?> </td>
                                        <td> <?=number_format(($employee['amountGranted'] - $employee['total_remit']),2)?> </td>
                                        <td> <?=date("F", mktime(0, 0, 0, $employee['actualEndMonth'], 10)).' '.$employee['actualEndYear']?> </td>
                                        <td style="text-align: center;">
                                            <a href="<?=base_url('finance/compensation/personnel_profile/employee').'/'.$employee['empNumber']?>" class="btn btn-sm blue">
                                                <i class="fa fa-eye"></i>  View</a>
                                            <a data-toggle="modal" href="#editmaturingLoan" id="btnupdatemloans" class="btn btn-sm green"
                                                data-params=<?="'".json_encode($employee)."'"?>>
                                                <i class="fa fa-edit"></i>  Edit</a>
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

<div id="editmaturingLoan" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Deduction update</h4>
                <label class="control-label" id="loan-title"></label>
            </div>
            <?=form_open('finance/notifications/notifications/updatematuringLoans', array('id' => 'frmmloans', 'method' => 'post'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="text" name="txtid" id="txtid">
                            <h4>Loan Details</h4>
                            <div class="form-group">
                                <label class="control-label">Date Granted<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <input class="form-control date-picker form-required" data-date="2012-03-01" data-date-format="yyyy-mm-dd"
                                        id="txtdateGranted" name="txtdateGranted" type="text" >
                                </div>
                            </div>
                            <div class="form-group col-md-6" style="margin-left: -13px;">
                                <label class="control-label">Start Date<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="bs-select form-control" name="selsdate_mon" id="selsdate_mon">
                                        <option value="0">Month</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                                <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">&nbsp;</label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="txtsdate_yr" id="txtsdate_yr">
                                </div>
                            </div>
                            <div class="form-group col-md-6" style="margin-left: -13px;">
                                <label class="control-label">End Date<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="bs-select form-control" name="seledate_mon" id="seledate_mon">
                                        <option value="0">Month</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                                <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">&nbsp;</label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control" name="txtedate_yr" id="txtedate_yr">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Amount Granted<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtamtGranted" id="txtamtGranted">
                                </div>
                            </div>

                            <hr/>
                            <div class="form-group">
                                <label class="control-label">Monthly<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtmonthly" id="txtmonthly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Period 1<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtperiod1" id="txtperiod1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Period 2<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <input type="text" class="form-control form-required" name="txtperiod2" id="txtperiod2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa fa-warning tooltips i-required"></i>
                                    <select class="form-control bs-select form-required" name="selstatus" id="selstatus">
                                        <option value="">SELECT STATUS</option>
                                        <?php foreach(array('1' => 'On-going','2' => 'Paused','0' => 'Finished') as $id=>$desc): ?>
                                            <option value="<?=$id?>">
                                                <?=$desc?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js', array('datatables','select2','datepicker','form_validation')) ?>
<script>
    function numberformat(num) {
        var parts = num.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        if(parts.length == 1){
            parts[1] = "00";
        }
        return parts.join(".");
    }

    $(document).ready(function() {
        $('.date-picker').datepicker();

        $('#table-mloans').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-mloans').show();
            }} );

        $('#table-mloans').on('click','tbody > tr > td > a#btnupdatemloans', function() {
            console.log($(this).data('params'));
            data = $(this).data('params');
            $('#loan-title').html(data['deductionCode']);
            $('#txtid').val(data['deductCode']);
            $('#txtdateGranted').val(data['dateGranted']);
            $('#selsdate_mon').val(data['actualStartMonth']);
            $('#txtsdate_yr').val(data['actualStartYear']);
            $('#seledate_mon').val(data['actualEndMonth']);
            $('#txtedate_yr').val(data['actualEndYear']);
            $('#txtamtGranted').val(numberformat(data['amountGranted']));
            $('#txtmonthly').val(numberformat(data['monthly']));
            $('#txtperiod1').val(numberformat(data['period1']));
            $('#txtperiod2').val(numberformat(data['period2']));
            $('#selstatus').val(data['status']);
        });

        var totalamt = 0;
        $('#txtmonthly').keyup(function() {
            totalamt = $(this).val().replace(/[^\d\.]/g, "");
            $('#txtperiod1').val(numberformat(totalamt));
            $('#txtperiod2').val(numberformat(0));
        });

        $('#txtperiod1').keyup(function() {
            totalamt = $('#txtmonthly').val().replace(/[^\d\.]/g, "");
            period1 = $(this).val().replace(/[^\d\.]/g, "");
            totalamt = totalamt - period1;
            $('#txtperiod2').val(numberformat(totalamt));
        })

        $('#txtperiod2').keyup(function() {
            totalamt = $('#txtmonthly').val().replace(/[^\d\.]/g, "");
            period2 = $(this).val().replace(/[^\d\.]/g, "");
            totalamt = totalamt - period2;
            $('#txtperiod1').val(numberformat(totalamt));
        })

    });
</script>