 <div id="tab_workExp" class="tab-pane">
    <form action="#">
        <b>WORK EXPERIENCE:</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th width="10%">Inclusive Date [From-To]</th>
                    <th width="10%">Position Title</th>
                    <th width="10%">Dept./ Agency/ Office/ Company</th>
                    <th width="10%">Monthly</th>
                    <th width="10%">Salary/  Job Pay Grade</th>
                    <th width="10%">Status of Appointment</th>
                    <th width="10%">Gov. Service (Yes/No)</th>
                    <th width="10%">Action</th>
                </tr>
                <?php foreach($arrService as $row):?>
                <tr>
                    <td><?=$row['serviceFromDate'].'-'.$row['serviceToDate']?></td>
                    <td><?=$row['positionDesc']?></td>
                    <td><?=$row['stationAgency']?></td>
                    <td><?=$row['salary']?></td>
                    <td><?=$row['salaryGrade']?></td>
                    <td><?=$row['appointmentCode']?></td>
                    <td><?=$row['governService']?></td>
                    <td> <a class="btn green" data-toggle="modal" href="#workExp_modal"> Edit </a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <?php endforeach;?>
                <div class="modal fade bs-modal-lg"  id="workExp_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Work Experience </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Inclusive Date From : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateFrom" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Inclusive Date To : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateTo" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Position Title : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateFrom" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Department/Agency/Office : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strDept" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Salary/Jobpay Grade : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSG" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Status of Appointment : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strStatus" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Government Service : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strGovernment" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Branch : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strBranch" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Mode of Separation : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strMode" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Separation Date :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSalary" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Separation Date :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSalary" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </table>
        
            <a class="btn green" data-toggle="modal" href="#addWorkExp_modal"> Add </a>
            <div class="modal fade bs-modal-lg"  id="addWorkExp_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Work Experience </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Inclusive Date From : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateFrom" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Inclusive Date To : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateTo" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Position Title : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateFrom" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Department/Agency/Office : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strDept" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Salary/Jobpay Grade : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSG" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Status of Appointment : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strStatus" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Government Service : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strGovernment" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Branch : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strBranch" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Mode of Separation : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strMode" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Separation Date :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSalary" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Separation Date :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSalary" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    </form>
</div>