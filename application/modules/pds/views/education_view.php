<div id="tab_education" class="tab-pane" style="overflow-x:auto;">
        <b>EDUCATIONAL INFORMATION:</b><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th width="10%">Level Code</th>
                    <th width="10%">Name of School</th>
                    <th width="10%">Basic Educ./ Degree/ Course</th>
                    <th width="10%">Period of Attendance [From/To]</th>
                    <th width="10%">Highest Level/ Units Earned</th>
                    <th width="10%">Year Graduated</th>
                    <th width="10%">Scholarship/ Honors Received</th>
                    <th width="10%">Graduate</th>
                    <th width="2%">Licensed</th>
                    <th width="10%">Action</th>
                </tr>
                <?php foreach($arrEduc as $row):?>
                <tr>
                    <td><?=$row['levelCode'].$row['SchoolIndex']?></td>
                    <td><?=$row['schoolName']?></td>
                    <td><?=$row['course']?></td>
                    <td><?=$row['schoolFromDate'].'-'.$row['schoolToDate']?></td>
                    <td><?=$row['units']?></td>
                    <td><?=$row['yearGraduated']?></td>
                    <td><?=$row['ScholarshipCode']?></td>
                    <td><?=$row['graduated']?></td>
                    <td><?=$row['licensed']?></td>
                    <td> 
                    <a class="btn green" data-toggle="modal" href="#educ_modal" onclick="getEduc(<?=$row['SchoolIndex']?>,'<?=$row['levelCode']?>','<?=$row['schoolName']?>','<?=$row['course']?>')"> Edit </a>
                     <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteEduc"> Delete </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>

        <?=form_open(base_url('pds/edit_educ/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmEduc'))?>
            <div class="modal fade bs-modal-lg"  id="educ_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Educational Information</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Level Description : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strLvlDesc" id="strLvlDesc" value="<?=isset($arrEduc[0]['levelCode'])?$arrEduc[0]['levelCode']:''?>">
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
                                        <label class="control-label">Name of School : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSchoolname" id="strSchoolname" value="<?=isset($arrEduc[0]['schoolName'])?$arrEduc[0]['schoolName']:''?>">
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
                                        <label class="control-label">Basic Education/Degree : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strDegree" id="strDegree" value="<?=isset($arrEduc[0]['course'])?$arrEduc[0]['course']:''?>">
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
                                        <label class="control-label">Period of Attendance : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmPeriod" id="dtmPeriod" value="<?=isset($arrEduc[0]['schoolFromDate'])?$arrEduc[0]['schoolToDate']:''?>">
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
                                        <label class="control-label">Units Earned : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intUnits"  id="intUnits" value="<?=isset($arrEduc[0]['units'])?$arrEduc[0]['units']:''?>">
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
                                        <label class="control-label">Year Graduated : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmYearGrad" id="dtmYearGrad" value="<?=isset($arrEduc[0]['yearGraduated'])?$arrEduc[0]['yearGraduated']:''?>">
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
                                        <label class="control-label">Scholarship : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strScholarsip" id="strScholarsip" value="<?=isset($arrEduc[0]['ScholarshipCode'])?$arrEduc[0]['ScholarshipCode']:''?>">
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
                                        <label class="control-label">Honors : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strHonors" id="strHonors" value="<?=isset($arrEduc[0]['honors'])?$arrEduc[0]['honors']:''?>">
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
                                        <input type="text" class="form-control" name="strLicense" id="strLicense" value="<?=isset($arrEduc[0]['licensed'])?$arrEduc[0]['licensed']:''?>">
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                        <input type="hidden" name="intSchoolIndex" id="intSchoolIndex" value="<?=isset($arrEduc['SchoolIndex'])?$arrEduc['SchoolIndex']:''?>">
                        <input type="hidden" name="strEmpNumber" id="strEmpNumber" value="<?=$this->uri->segment(3)?>">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="submit" name="btnEduc" class="btn green">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
        </div>
        <?=form_close()?>

            <a class="btn green" data-toggle="modal" href="#addEduc_modal"> Add </a>
            <div class="modal fade bs-modal-lg"  id="addEduc_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Educational Information</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Level Description : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strLvlDesc"></select>
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
                                        <label class="control-label">Name of School : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSchoolname">
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
                                        <label class="control-label">Degree/Course : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strDegree"></select>
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
                                        <label class="control-label">Period of Attendance : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmPeriod"></select> 
                                    </div>
                                </div>
                                <div class="col-sm-1" text-left>
                                    <div class="form-group">
                                        <label class="control-label">To : </label>
                                    </div>
                                </div>
                                <div class="col-sm-2" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmPeriod"></select> </label>
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
                                        <label class="control-label">Units Earned : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intUnits">
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
                                        <label class="control-label">Year Graduated : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmYearGrad"></select>
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
                                        <label class="control-label">Scholarship : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="strScholarsip"></select>
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
                                        <label class="control-label">Honors : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strHonors">
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
                                        <input type="text" class="form-control" name="strLicense" >
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
<div class="modal fade bs-modal-lg"  id="deleteEduc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Educational Information</b></h4>
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
    $.ajax ({type : 'GET', url: 'education_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Educational information '+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
    });
    function getEduc(intSchoolIndex,strLvlDesc,strSchoolname,strDegree){
        $('#intSchoolIndex').val(intSchoolIndex);
        $('#strLvlDesc').val(strLvlDesc);
        $('#strSchoolname').val(strSchoolname);
        $('#strDegree').val(strDegree);
     
    }
</script>