<?=load_plugin('css', array('select2','select'))?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Finance Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Reports</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Monthly Report</span>
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
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> MONTHLY REPORTS</span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="display: none">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <?=form_open('', array('id' => 'frmpprocess', 'class'=>'form-horizontal', 'method'=>'get'))?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Payroll Process</label>
                                    <div class="col-md-6">
                                        <div class="input-icon right">
                                            <i class="fa fa-warning tooltips i-required"></i>
                                            <select class="form-control select2 form-required" name="appt" id="selappt">
                                                <option value="">-- SELECT PAYROLL PROCESS --</option>
                                                <?php foreach ($arrProcess as $process): ?>
                                                    <option value="<?=$process['employeeAppoint']?>" <?=isset($_GET['appt']) ? $_GET['appt'] == $process['employeeAppoint'] ? 'selected' : '' : ''?> data-processid="<?=$process['processID']?>">
                                                        <?=$process['appointmentDesc']?> - (<?=$process['processCode']?> <?=$process['employeeAppoint'] != 'P' ? '-'.$process['period'] : ''?>)</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Payroll Process</label>
                                    <div class="col-md-2">
                                        <div class="input-icon right">
                                            <i class="fa fa-warning tooltips i-required"></i>
                                            <select class="bs-select form-required" name="yr" id="selyr">
                                                <option value="">Year</option>
                                                <?php foreach (getYear() as $yr): ?>
                                                    <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                                        <?=$yr?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-icon right">
                                            <i class="fa fa-warning tooltips i-required"></i>
                                            <select class="bs-select form-required" name="mon" id="selmon">
                                                <option value="">Month</option>
                                                <?php foreach (range(1, 12) as $m): ?>
                                                    <option value="<?=$m?>" <?=isset($_GET['month']) ? $_GET['month'] == $m ? 'selected' : '' : date('n') == $m?>>
                                                        <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?=form_close();?>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <?php if(isset($_GET['appt'])): ?>
                                <table class="table table-bordered" id="tblmreports" >
                                    <tr>
                                        <th>Payslip</th>
                                        <td style="text-align: center;">
                                            <a href="<?=base_url('finance/reports/MonthlyReports/payslip')?>" target="_blank" class="btn green btn-sm btn-circle">
                                                <i class="fa fa-money"></i> First Half</a>
                                        </td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Payroll Register</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Funding Requirements</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Monthly</button></td>
                                        <td style="text-align: center;"></td>
                                    </tr>
                                    <tr>
                                        <th>MC Benefit Register</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Deduction Register</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Summary of Deductions</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Lates/Abs Deductions</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Overtime -> Payroll Register</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                     <tr>
                                        <th><?=str_repeat('&nbsp;', 10)?>Funding Requirements</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Generate PACS</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                    <tr>
                                        <th>Generate FINDES</th>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> First Half</button></td>
                                        <td style="text-align: center;"><button type="button" class="btn green btn-sm btn-circle"><i class="fa fa-money"></i> Second Half</button></td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select2','select','form_validation'))?>
<script>
    $('select.select2').select2({
        minimumResultsForSearch: -1,
        placeholder: function(){
            $(this).data('placeholder');
        }
    });
    $(document).ready(function() {
        $('.loading-image').hide();
        $('#div-body').show();

        $('#selyr').on('change', function(){
            processid = $('#selappt').find(':selected').attr('data-processid');
            window.open('?month='+$('#selmon').val()+'&yr='+$('#selyr').val()+'&appt='+$('#selappt').val()+'&processid='+processid,'_self');
        });
        $('#selmon').on('change', function(){
            processid = $('#selappt').find(':selected').attr('data-processid');
            window.open('?month='+$('#selmon').val()+'&yr='+$('#selyr').val()+'&appt='+$('#selappt').val()+'&processid='+processid,'_self');
        });
        $('#selappt').on('change', function(){
            processid = $('#selappt').find(':selected').attr('data-processid');
            window.open('?month='+$('#selmon').val()+'&yr='+$('#selyr').val()+'&appt='+$('#selappt').val()+'&processid='+processid,'_self');
        });

    });
</script>