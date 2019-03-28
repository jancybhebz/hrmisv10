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
                    <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <th width="10%">Action</th>
                    <?php endif; ?>
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
                    <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <td> <a class="btn green" data-toggle="modal" href="#workExp_modal" onclick="getWork(<?=$row['serviceRecID']?>,'<?=$row['serviceFromDate']?>','<?=$row['serviceToDate']?>','<?=$row['positionDesc']?>')"> Edit </a>
                    <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteWorkExp"> Delete </a></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach;?>
            </table>
        </form>
        <?=form_open(base_url('pds/edit_workExp/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmWorkExp'))?>
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
                                        <input type="text" class="form-control" name="dtmDateFrom" id="dtmDateFrom"  value="<?=isset($arrService[0]['serviceFromDate'])?$arrService[0]['serviceFromDate']:''?>">
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
                                        <input type="text" class="form-control" name="dtmDateTo" id="dtmDateTo" value="<?=isset($arrService[0]['serviceToDate'])?$arrService[0]['serviceToDate']:''?>">
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
                                         <input type="text" class="form-control" name="strPosTitle" id="strPosTitle" value="<?=isset($arrService[0]['positionDesc'])?$arrService[0]['positionDesc']:''?>">
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
                                        <input type="text" class="form-control" name="strDept" id="strDept" value="<?=isset($arrService[0]['stationAgency'])?$arrService[0]['stationAgency']:''?>">
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
                                       <input type="text" class="form-control" name="strSG" id="strSG" value="<?=isset($arrService[0]['salaryGrade'])?$arrService[0]['salaryGrade']:''?>">
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
                                        <input type="text" class="form-control" name="strStatus" id="strStatus" value="<?=isset($arrService[0]['appointmentCode'])?$arrService[0]['appointmentCode']:''?>">
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
                                        <input type="text" class="form-control" name="strGovernment" id="strGovernment" value="<?=isset($arrService[0]['governService'])?$arrService[0]['governService']:''?>">
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
                                        <input type="text" class="form-control" name="strBranch" id="strBranch" value="<?=isset($arrService[0]['branch'])?$arrService[0]['branch']:''?>">
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
                                        <input type="text" class="form-control" name="strMode" id="strMode" value="<?=isset($arrService[0]['separationCause'])?$arrService[0]['separationCause']:''?>">
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
                                        <input type="text" class="form-control" name="strSepDate" id="strSepDate" value="<?=isset($arrService[0]['separationDate'])?$arrService[0]['separationDate']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="intServiceId" id="intServiceId" value="<?=isset($arrService['serviceRecID'])?$arrService['serviceRecID']:''?>">
                            <input type="hidden" name="strEmpNumber" id="strEmpNumber" value="<?=$this->uri->segment(3)?>">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <?=form_close()?>
            <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
            <a class="btn green" data-toggle="modal" href="#addWorkExp_modal"> Add </a>
            <?php endif; ?>
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
                                      <input type="text" class="form-control" name="dtmDateFrom" value="<?=!empty($this->session->userdata('dtmDateFrom'))?$this->session->userdata('dtmDateFrom'):''?>">
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
                                        <input type="text" class="form-control" name="dtmDateTo" value="<?=!empty($this->session->userdata('dtmDateTo'))?$this->session->userdata('dtmDateTo'):''?>">
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
                                        <input type="text" class="form-control" name="strPositionTitle" value="<?=!empty($this->session->userdata('strPositionTitle'))?$this->session->userdata('strPositionTitle'):''?>">
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
                                        <input type="text" class="form-control" name="strDept" value="<?=!empty($this->session->userdata('strDept'))?$this->session->userdata('strDept'):''?>">
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
                                        <input type="text" class="form-control" name="strSalary" value="<?=!empty($this->session->userdata('strSalary'))?$this->session->userdata('strSalary'):''?>">
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
                                        <input type="text" class="form-control" name="strStatus" value="<?=!empty($this->session->userdata('strStatus'))?$this->session->userdata('strStatus'):''?>">
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
                                        <input type="text" class="form-control" name="strGovernment" value="<?=!empty($this->session->userdata('strGovernment'))?$this->session->userdata('strGovernment'):''?>">
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
                                        <input type="text" class="form-control" name="strBranch" value="<?=!empty($this->session->userdata('strBranch'))?$this->session->userdata('strBranch'):''?>">
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
                                        <input type="text" class="form-control" name="strMode" value="<?=!empty($this->session->userdata('strMode'))?$this->session->userdata('strMode'):''?>">
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
                                        <input type="text" class="form-control" name="strSepDate" value="<?=!empty($this->session->userdata('strSepDate'))?$this->session->userdata('strSepDate'):''?>">
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
<div class="modal fade bs-modal-lg"  id="deleteWorkExp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Work Experience</b></h4>
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
    $.ajax ({type : 'GET', url: 'work_experience_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Work experience '+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
    });
    function getWork(intServiceId,dtmDateFrom,dtmDateTo,strPosTitle){
        $('#intServiceId').val(intServiceId);
        $('#dtmDateFrom').val(dtmDateFrom);
        $('#dtmDateTo').val(dtmDateTo);
        $('#strPosTitle').val(strPosTitle);
     
    }
</script>