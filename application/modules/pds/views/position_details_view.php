<div id="tab_position" class="tab-pane">
                                <form action="#">
                                <b>POSITION DETAILS :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <?php foreach($arrPosition as $row):?>
                                    <tr>
                                    <td colspan="4"><b>Position Details</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Service Code :</td>
                                        <td width="25%"><?=$row['serviceCode']?></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                    </tr>
                                    <tr>
                                        <td>First Day Government :</td>
                                        <td><?=$row['firstDayGov']?></td>
                                        <td>Salary Effectivity Date :</td>
                                        <td><?=$row['effectiveDate']?></td>
                                    </tr>
                                    <tr>
                                        <td>First Day Agency :</td>
                                        <td><?=$row['firstDayAgency']?></td>
                                        <td>Employment Basis :</td>
                                        <td><?=$row['employmentBasis']?></td>
                                    </tr>
                                    <tr>
                                        <td>Mode of Separation :</td>
                                        <td><?=$row['statusOfAppointment']?></td>
                                        <td>Category Service :</td>
                                        <td><?=$row['categoryService']?></td>
                                    </tr>
                                    <tr>
                                        <td>Separation Date :</td>
                                        <td><?=$row['contractEndDate']?></td>
                                        <td>Tax Status :</td>
                                        <td><?=$row['taxStatCode']?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Desc. :</td>
                                        <td><?=$row['appointmentCode']?></td>
                                        <td>No. Of Dependents :</td>
                                        <td><?=$row['dependents']?></td>
                                    </tr>
                                    <td colspan="4"><b>Payroll</b></td>
                                    </tr>
                                    <tr>
                                        <td>Payroll Group :</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Include in DTR? :</td>
                                        <td><?=$row['dtrSwitch']?></td>
                                        <td>Include in Payroll? :</td>
                                        <td><?=$row['payrollSwitch']?></td>
                                    </tr>
                                    <tr>
                                        <td>Attendance Scheme :</td>
                                        <td><?=$row['schemeCode']?></td>
                                        <td>Hazard Pay Factor :</td>
                                        <td><?=$row['hpFactor']?></td>
                                    </tr>
                                    <tr>
                                        <td>Include in PhilHealth? :</td>
                                        <td><?=$row['philhealthSwitch']?></td>
                                        <td>Include in PAGIBIG? :</td>
                                        <td><?=$row['pagibigSwitch']?></td>
                                    </tr>
                                     <tr>
                                        <td>Include in Life & Retirement? :</td>
                                        <td><?=$row['lifeRetSwitch']?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <td colspan="4"><b>Plantilla Position</b></td>
                                    <tr>
                                        <td>ItemNumber :</td>
                                        <td><?=$row['uniqueItemNumber']?></td>
                                        <td>Head of the Agency :</td>
                                        <td><?=$row['firstDayAgency']?></td>
                                    </tr>
                                    <tr>
                                        <td>Actual Salary :</td>
                                        <td><?=$row['actualSalary']?></td>
                                        <td>Salary Grade :</td>
                                        <td><?=$row['firstDayAgency']?></td>
                                    </tr>
                                    <tr>
                                        <td>Authorize Salary :</td>
                                        <td><?=$row['authorizeSalary']?></td>
                                        <td>Step Number :</td>
                                        <td><?=$row['stepNumber']?></td>
                                    </tr>
                                    <tr>
                                        <td>Position :</td>
                                        <td><?=$row['positionCode']?></td>
                                        <td>Date Increment :</td>
                                        <td><?=$row['dateIncremented']?></td>
                                    </tr>
                                    <tr>
                                        <td>Position Date :</td>
                                        <td><?=$row['positionDate']?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                   <?php endforeach; ?>
                                </table>
                                </form>
                            </div>