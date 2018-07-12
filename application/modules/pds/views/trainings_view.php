<div id="tab_training" class="tab-pane">
    <form action="#">
        <b>TRAININGS :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <label>TRAINING PROGRAMS / STUDY / SCHOLARSHIP GRANTS : </label></br>
                <tr>
                    <th>Title of Learning & Dev./Training Programs</th>
                    <th>Inclusive Dates of Attendance [From-To]</th>
                    <th>Number of Hours</th>
                    <th>Type of Leadership</th>
                    <th>Conducted/Sponsored By</th>
                    <th>Training Venue</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrTraining as $row):?>
                <tr>
                    <td><?=$row['trainingTitle']?></td>
                    <td><?=$row['trainingStartDate'].'-'.$row['trainingEndDate']?></td>
                    <td><?=$row['trainingHours']?></td>
                    <td><?=$row['trainingTypeofLD']?></td>
                    <td><?=$row['trainingConductedBy']?></td>
                    <td><?=$row['trainingVenue']?></td>
                    <td>  <a class="btn green" data-toggle="modal" href="#editTrainings_modal"> Edit </a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <?php endforeach;?>
                <div class="modal fade bs-modal-lg"  id="editTrainings_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Trainings </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Title of Learning and Dev./Training Programs :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strTitle" value="<?=isset($arrTraining[0]['trainingTitle'])?$arrTraining[0]['trainingTitle']:''?>">
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
                                        <label class="control-label">Number of Hours :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strHours" value="<?=isset($arrTraining[0]['trainingHours'])?$arrTraining[0]['trainingHours']:''?>">
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
                                        <label class="control-label">Venue :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strVenue" value="<?=isset($arrTraining[0]['trainingVenue'])?$arrTraining[0]['trainingVenue']:''?>">
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
                                        <label class="control-label">Type of Leadership :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strTypeofLD" value="<?=isset($arrTraining[0]['trainingTypeofLD'])?$arrTraining[0]['trainingTypeofLD']:''?>">
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
                                        <label class="control-label">Conducted/Sponsored By :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strConducted" value="<?=isset($arrTraining[0]['trainingConductedBy'])?$arrTraining[0]['trainingConductedBy']:''?>">
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
                                        <label class="control-label">Cost :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strCost" value="<?=isset($arrTraining[0]['trainingCost'])?$arrTraining[0]['trainingCost']:''?>">
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
                                        <label class="control-label">Contract Start Date :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmStartDate" value="<?=isset($arrTraining[0]['trainingStartDate'])?$arrTraining[0]['trainingStartDate']:''?>">
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
                                        <label class="control-label">Contract End Dates :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmEndDate" value="<?=isset($arrTraining[0]['trainingEndDate'])?$arrTraining[0]['trainingEndDate']:''?>">
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
            </div><br>

            <a class="btn green" data-toggle="modal" href="#addTrainings_modal"> Add </a>
                <div class="modal fade bs-modal-lg"  id="addTrainings_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Trainings </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Title of Learning and Dev./Training Programs :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strTitle">
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
                                        <label class="control-label">Number of Hours :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmHours">
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
                                        <label class="control-label">Venue :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strVenue">
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
                                        <label class="control-label">Type of Leadership :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strTypeofLD">
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
                                        <label class="control-label">Conducted/Sponsored By :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strConducted">
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
                                        <label class="control-label">Cost :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intCost">
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
                                        <label class="control-label">Contract Start Date :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmStartDate"></select>
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
                                        <label class="control-label">Contract End Dates :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmEndDate"></select>
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
            </div><br>
            </table>
    </form>
</div>