<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_1">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-unstyled profile-nav">
                <li>
                    <img src="<?=base_url('assets/images/logo.png')?>" class="img-responsive pic-bordered" width="200px" alt="" />
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-9 profile-info">
                    <h1 class="font-green sbold uppercase"><?=$arrData['firstname']?> <?=$arrData['middleInitial']?>. <?=$arrData['surname']?></h1>
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="25%"><b>Appointment Status</b></td>
                                    <td width="25%"><?=$arrData['statusOfAppointment']?></td>
                                    <td width="25%"><b>TIN Number</b></td>
                                    <td width="25%"><?=$arrData['tin']?></td>
                                </tr>
                                <tr>
                                    <td><b>Salary</b></td>
                                    <td><?=number_format($arrData['actualSalary'], 2)?></td>
                                    <td><b>GSIS Number</b></td>
                                    <td><?=$arrData['gsisNumber']?></td>
                                </tr>
                                <tr>
                                    <td><b>Group</b></td>
                                    <td><?=office_name(employee_office($this->uri->segment(5)))?></td>
                                    <td><b>PhilHealth Number</b></td>
                                    <td><?=$arrData['philHealthNumber']?></td>
                                </tr>
                                <tr>
                                    <td><b>Position</b></td>
                                    <td><?=$arrData['positionDesc']?></td>
                                    <td><b>PAGIBIG Number</b></td>
                                    <td><?=$arrData['pagibigNumber']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="portlet sale-summary">
                        <div class="portlet-title">
                            <div class="caption font-red sbold"> DTR </div>
                        </div>
                        <div class="portlet-body">
                            <ul class="list-unstyled" style="line-height: 15px;">
                                <li>
                                    <span class="sale-info"> LOG IN </span>
                                    <span class="sale-num"> 23 </span>
                                </li>
                                <li>
                                    <span class="sale-info"> BREAK OUT </span>
                                    <span class="sale-num"> 87 </span>
                                </li>
                                <li>
                                    <span class="sale-info"> BREAK IN </span>
                                    <span class="sale-num"> 2377 </span>
                                </li>
                                <li>
                                    <span class="sale-info"> LOG OUT </span>
                                    <span class="sale-num"> 2377 </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tabbable-line tabbable-custom-profile">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab-payrollsummary" data-toggle="tab"> Payroll Summary </a>
                    </li>
                    <li>
                        <a href="#tab-payrolldetails" data-toggle="tab"> Payroll Details </a>
                    </li>
                    <li>
                        <a href="#tab-positiondetails" data-toggle="tab"> Position Details </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-payrollsummary">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance">
                                <thead>
                                    <tr>
                                        <th> </th>
                                        <td class="active bold right">PERIOD 1</td>
                                        <td class="active bold right">PERIOD 2</td>
                                        <td class="active bold right">TOTAL</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <b>Period Pay</b> </td>
                                        <td class="right">asdf</td>
                                        <td class="right"></td>
                                        <td class="right"></td>
                                    </tr>
                                    <tr>
                                        <td> <b>Benefits</b> </td>
                                        <td class="right"></td>
                                        <td class="right"></td>
                                        <td class="right"></td>
                                    </tr>
                                    <tr>
                                        <td> <b>Deductions</b> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="active"> <b>Net Pay</b> </th>
                                        <td class="active"></td>
                                        <td class="active"></td>
                                        <td class="active"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-payrolldetails">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance">
                                <tbody>
                                    <tr>
                                        <td><b>Payroll Group</b> </td>
                                        <td><?=$pg['payrollGroupName']?></td>
                                        <td><b>Tax Status</b></td>
                                        <td><?=$arrData['taxStatCode']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Included in Payroll </b></td>
                                        <td><?=$arrData['payrollSwitch']?></td>
                                        <td><b>No. of Dependents</b></td>
                                        <td><?=$arrData['dependents']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Attendance Scheme</b></td>
                                        <td><?=$arrData['schemeCode']?></td>
                                        <td><b>With Health Insurance Exemption?</b></td>
                                        <td><?=$arrData['healthProvider']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Account Number</b></td>
                                        <td><?=$arrData['AccountNum']?></td>
                                        <td><b>Tax Rate</b></td>
                                        <td><?=$arrData['taxRate']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Self Employed Tax Status</b></td>
                                        <td><?=$arrData['taxSwitch']?></td>
                                        <td><b>(Authorize Salary *) Hazard Pay Factor</b></td>
                                        <td><?=$arrData['hpFactor']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>With Government Vehicle?</b></td>
                                        <td><?=$arrData['RATAVehicle']?></td>
                                        <td><b>RATA Code</b></td>
                                        <td><?=isset($rata['RATACode']) ? $rata['RATACode'] : ''?> <?=isset($rata['RATAAmount']) ? '('.number_format($rata['RATAAmount'], 2).')' : ''?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn green" data-toggle="modal" href="#payrollDetails_modal"> <i class="fa fa-edit"></i> Edit</button>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-positiondetails">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance">
                                <tbody>
                                    <tr>
                                        <td><b>Appointment Desc </b></td>
                                        <td><?=$arrData['appointmentDesc']?></td>
                                        <td><b>Position Date</b></td>
                                        <td><?=$arrData['positionDate']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Item Number</b></td>
                                        <td><?=$arrData['uniqueItemNumber']?></td>
                                        <td><b>Mode of Separation</b></td>
                                        <td><?=$arrData['statusOfAppointment']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Actual Salary</b></td>
                                        <td><?=number_format($arrData['actualSalary'], 2)?></td>
                                        <td><b>Salary Grade</b></td>
                                        <td><?=$arrData['salaryGradeNumber']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Authorize Salary</b></td>
                                        <td><?=number_format($arrData['authorizeSalary'], 2)?></td>
                                        <td><b>Step Number</b></td>
                                        <td><?=$arrData['stepNumber']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Position</b></td>
                                        <td><?=$arrData['positionDesc']?></td>
                                        <td><b>Date Increment</b></td>
                                        <td><?=$arrData['dateIncremented']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn green" data-toggle="modal" href="#positionDetails_modal"> <i class="fa fa-edit"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('_modal.php'); ?>