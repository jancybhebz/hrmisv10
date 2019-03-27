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
                                            <select class="form-control select2 form-required" name="selpprocess">
                                                <option value="null">-- SELECT PAYROLL PROCESS --</option>
                                                <?php foreach ($arrProcess as $process): ?>
                                                    <option value="<?=$process['processID']?>" <?=isset($_GET['selpprocess']) ? $_GET['selpprocess'] == $process['processID'] ? 'selected' : '' : ''?>>
                                                        <?=$process['appointmentDesc']?> (<?=$process['processCode'].'.'.$process['payroll_period']?>) <?=$process['payrollgroup_name']?></option>
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
                                            <select class="bs-select form-required" name="yr">
                                                <option value="null">Year</option>
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
                                            <select class="bs-select form-required" name="mon">
                                                <option value="null">Month</option>
                                                <?php foreach (range(1, 12) as $m): ?>
                                                    <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                                        <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">&nbsp;</label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        <?=form_close();?>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <?php if(count($_GET) > 0): if($_GET['selpprocess'] != 0): ?>
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
                                <?php endif; endif; ?>
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
    });
</script>