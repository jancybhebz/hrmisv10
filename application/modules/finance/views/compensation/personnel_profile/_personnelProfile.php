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
                                    <th width="25%">Appointment Status</th>
                                    <td width="25%"><?=$arrData['statusOfAppointment']?></td>
                                    <th width="25%">TIN Number</th>
                                    <td width="25%"><?=$arrData['tin']?></td>
                                </tr>
                                <tr>
                                    <th>Salary</th>
                                    <td><?=number_format($arrData['actualSalary'], 2)?></td>
                                    <th>GSIS Number</th>
                                    <td><?=$arrData['gsisNumber']?></td>
                                </tr>
                                <tr>
                                    <th>Group</th>
                                    <td><?=office_name(employee_office($this->uri->segment(5)))?></td>
                                    <th>PhilHealth Number</th>
                                    <td><?=$arrData['philHealthNumber']?></td>
                                </tr>
                                <tr>
                                    <th>Position</th>
                                    <td><?=$arrData['positionDesc']?></td>
                                    <th>PAGIBIG Number</th>
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
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-briefcase"></i> Company </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-question"></i> Descrition </th>
                                        <th>
                                            <i class="fa fa-bookmark"></i> Amount </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> WaterPure Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Payment for Jan 2013 </td>
                                        <td> 610.50$
                                            <span class="label label-danger label-sm"> Overdue </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane active" id="tab-payrolldetails">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-briefcase"></i> Company </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-question"></i> Descrition </th>
                                        <th>
                                            <i class="fa fa-bookmark"></i> Amount </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> WaterPure Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Payment for Jan 2013 </td>
                                        <td> 610.50$
                                            <span class="label label-danger label-sm"> Overdue </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane active" id="tab-positiondetails">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-briefcase"></i> Company </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-question"></i> Descrition </th>
                                        <th>
                                            <i class="fa fa-bookmark"></i> Amount </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> WaterPure Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Payment for Jan 2013 </td>
                                        <td> 610.50$
                                            <span class="label label-danger label-sm"> Overdue </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Pixel Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Server hardware purchase </td>
                                        <td> 52560.10$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> Smart House </a>
                                        </td>
                                        <td class="hidden-xs"> Office furniture purchase </td>
                                        <td> 5760.00$
                                            <span class="label label-warning label-sm"> Pending </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;"> FoodMaster Ltd </a>
                                        </td>
                                        <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                        <td> 12400.00$
                                            <span class="label label-success label-sm"> Paid </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>