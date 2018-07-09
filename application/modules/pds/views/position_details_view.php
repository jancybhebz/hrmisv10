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
                    <td>  <a class="btn green" data-toggle="modal" href="#position_modal"> Edit </a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
               <?php endforeach; ?>
               <div class="modal fade in" id="position_modal" tabindex="-1" role="full" aria-hidden="true">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title"><b>POSITION DETAILS</b></h4>
                            </div>
                            <div class="modal-body"> </div>
                             <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <div class="form-group" >
                                        <label class="control-label" ><b>Position Details </b></label>
                                        <div class="input-icon right">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <div class="form-group">
                                        <label class="control-label"><b>Payroll </b></label>
                                        <div class="input-icon right">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <div class="form-group">
                                        <label class="control-label"><b>Plantilla Position : </b></label>
                                        <div class="input-icon right">
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Service Code :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strServiceCode" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Payroll Group :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strPayroll" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Item Number :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strItemNum" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">First Day Gov't :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmGovnDay" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Include in DTR? : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strIncludeDTR" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Head of the Agency :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strHead" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">First Day Agency :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmAgencyDay" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Include in Payroll? : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strIncludePayroll" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Actual Salary :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strActual" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Salary Effectivity Date :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="intSalaryDate" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Attendance Scheme : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strAttendance" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Salary Grade :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strSG" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Employment Basis :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strEmpBasis" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Hazard Pay Factor :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strHP" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Authorize Salary :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strAuthorize" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Mode of Separation :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strEmpBasis" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Include in PhilHealth? :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strIncPHealth" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Step Number :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strStepNum" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Separation Date :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmSepDate" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Include in PAGIBIG? :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strIncPagibig" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Position :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strPosition" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Category Service :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strCatService" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Include in Life & Retirement? :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strIncLife" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Date Increment :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmDateInc" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Tax Status :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strTaxStatus" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label"></label>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Position Date :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmPosDate" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Appointment Desc. :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strAppointmentDesc" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">No. of Dependents :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="intDependents" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Executive Office :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strExecOffice" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Personnel Action : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strPersonnel" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Service : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strService" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Division : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strDivision" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Section : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strSection" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-1 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Place of Assignment :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strAssignment" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

        </table>
    </form>
</div>