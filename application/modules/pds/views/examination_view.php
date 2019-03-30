<div id="tab_exam" class="tab-pane">
    <form action="#">
        <label><b>EXAMINATIONS :</b></label><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <label>CAREER SERVICE / RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE :</label><br></br>
                    <tr>
                        <th width="10%">Exam Description</th>
                        <th width="10%">Rating</th>
                        <th width="10%">Date of Examination/ Conferment</th>
                        <th width="10%">Place of Examination/ Conferment</th>
                        <th width="10%">License Number</th>
                        <th width="10%">Date of Validity</th>
                        <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                        <th width="10%">Action</th>
                        <?php endif;?>
                    </tr>
                    <?php foreach($arrExam as $row):?>
                    <tr>
                        <td><?=$row['examCode']?></td>
                        <td><?=$row['examRating']?></td>
                        <td><?=$row['examDate']?></td>
                        <td><?=$row['examPlace']?></td>
                        <td><?=$row['licenseNumber']?></td>
                        <td><?=$row['dateRelease']?></td>
                        <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                        <td>  <a class="btn green" data-toggle="modal" href="#exam_modal" onclick="getExam(<?=$row['ExamIndex']?>,'<?=$row['examCode']?>','<?=$row['examRating']?>','<?=$row['examDate']?>')"> Edit </a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteExam"> Delete </a></a></td>
                        <?php endif;?>
                    </tr>
                    <?php endforeach;?>
        </table>
        </form>

        <?=form_open(base_url('pds/edit_exam/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmExam'))?>
         <div class="modal fade bs-modal-lg"  id="exam_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Examinations</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Exam Description : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strExamDesc" id="strExamDesc" value="<?=isset($arrExam[0]['examCode'])?$arrExam[0]['examCode']:''?>">
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
                                        <label class="control-label">Rating : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strRating" id="strRating" value="<?=isset($arrExam[0]['examRating'])?$arrExam[0]['examRating']:''?>">
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
                                        <label class="control-label">Place of Exam/Confernment : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strExamPlace" id="strExamPlace" value="<?=isset($arrExam[0]['examPlace'])?$arrExam[0]['examPlace']:''?>">
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
                                        <label class="control-label">License : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strLicense" id="strLicense" value="<?=isset($arrExam[0]['licenseNumber'])?$arrExam[0]['licenseNumber']:''?>">
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
                                        <label class="control-label">Date of Validity : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strValidity" id="strValidity" value="<?=isset($arrExam[0]['dateRelease'])?$arrExam[0]['dateRelease']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="intExamIndex" id="intExamIndex" value="<?=isset($arrExam[0]['ExamIndex'])?$arrExam[0]['ExamIndex']:''?>">
                            <input type="hidden" name="strEmpNumber" id="strEmpNumber" value="<?=$this->uri->segment(3)?>">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" name="btnExam" class="btn green">Save Changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
        </div>
        <?=form_close()?>

        <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
        <a class="btn green" data-toggle="modal" href="#addExam_modal"> Add </a>
        <?php endif; ?>
         <div class="modal fade bs-modal-lg"  id="addExam_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Examinations</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Exam Description : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strExamDesc"></select>
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
                                        <label class="control-label">Rating : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strRating">
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
                                        <label class="control-label">Place of Exam/Confernment : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strLicense">
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
                                        <label class="control-label">License : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strLicense">
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
                                        <label class="control-label">Date of Validity : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmValidity"></select>
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
    </form>
</div>

<!-- DELETE -->
<div class="modal fade bs-modal-lg"  id="deleteExam" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Examination</b></h4>
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
    $.ajax ({type : 'GET', url: 'examination_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Examination information '+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
     });

    function getExam(intExamIndex,examCode,examRating,examDate){
        $('#intExamIndex').val(intExamIndex);
        $('#examCode').val(examCode);
        $('#examRating').val(examRating);
        $('#examDate').val(examDate);
     
    }
</script>