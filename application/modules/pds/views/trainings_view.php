<div id="tab_training" class="tab-pane">
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
                    <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <th>Action</th>
                    <th>Attachments</th>
                    <?php endif; ?>
                </tr>
                <?php foreach($arrTraining as $row):?>
                <tr>
                    <td><?=$row['trainingTitle']?></td>
                    <td><?=$row['trainingStartDate'].'-'.$row['trainingEndDate']?></td>
                    <td><?=$row['trainingHours']?></td>
                    <td><?=$row['trainingTypeofLD']?></td>
                    <td><?=$row['trainingConductedBy']?></td>
                    <td><?=$row['trainingVenue']?></td>
                    <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <td>  <a class="btn green" data-toggle="modal" href="#editTrainings_modal" onclick="getTraining(<?=$row['TrainingIndex']?>,'<?=$row['trainingTitle']?>')"> Edit </a>
                      <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteTraining"> Delete </a></td>
                    <td>
                    <?php 
                    $folder='uploads/employees/attachments/trainings/'.$row['TrainingIndex'];
                    if(is_dir($folder))
                     {
                        $map = directory_map($folder);
                        foreach($map as $content)
                             //echo $folder.'/'.$content;
                         ?> <a href="<?=base_url('uploads/employees/attachments/trainings/'.$row['TrainingIndex'])?>">uploads/employees/attachments/trainings/</a> <?php
                    }       
                    else { ?>
                    <?=form_open(base_url('pds/pds/uploadTraining/'.$this->uri->segment(4)), array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
                        <input type="hidden" name="idTraining" id="idTraining" value="<?=$row['TrainingIndex']?>">
                        <input type="hidden" name="EmployeeId" id="EmployeeId" value="<?=$row['empNumber']?>">  
                        <input type="file" name="userfile" id="userfile"> 
                        <button type="submit" name="uploadTraining" class="btn blue start">
                              <i class="fa fa-upload"></i>
                              <span> Start upload </span>
                        </button>   
                    <?=form_close(); }?> 
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach;?>
           </table>

    <?=form_open(base_url('pds/edit_training/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmExam'))?>
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
                             <input type="hidden" name="intTrainingIndex" id="intTrainingIndex" value="<?=isset($arrTraining['TrainingIndex'])?$arrTraining['TrainingIndex']:''?>">
                            <input type="hidden" name="strEmpNumber" id="strEmpNumber" value="<?=$this->uri->segment(3)?>">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" name="btnTraining" class="btn green">Save Changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?=form_close()?>
        <br>
            <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
            <a class="btn green" data-toggle="modal" href="#addTrainings_modal"> Add </a>
            <?php endif; ?>
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
    <?=form_close()?>
</div>


<!-- DELETE -->
<div class="modal fade bs-modal-lg"  id="deleteTraining" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Trainings</b></h4>
            </div>
        
            <div class="modal-body"> Are you sure you want to delete this data? </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btndelete">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
$(document).ready(function() 
    {

    $('#btndelete').click(function() {
    $.ajax ({type : 'GET', url: 'trainings_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Training details'+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
    });

    function getTraining(intTrainingIndex,strTitle){
        $('#intTrainingIndex').val(intTrainingIndex);
        $('#strTitle').val(strTitle);
     
    }
    
</script>

