<?=load_plugin('css', array('select','select2','datepicker'))?>
<!-- begin modal update/add child info -->
<div class="modal fade in" id="add_work_xp" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog" style="width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b><span class="action"></span> Work Experience Information</b></h5>
            </div>
            <?=form_open('', array('method' => 'post', 'id' => 'frmxp','class' => 'form-horizontal'))?>
            <input type="hidden" name="txtxpid" id="txtxpid">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Inclusive Date From</label>
                                <div class="col-md-6">
                                    <input type="text" name="txtdfrom" id="txtdfrom" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Inclusive Date To</label>
                                <div class="col-md-6">
                                    <input type="text" name="txtdto" id="txtdto" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-2" style="margin-top: 7px;">
                                    <div class="checkbox-list">
                                        <label><input type="checkbox"> Present </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Position Title</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtposition" id="txtposition" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Department / Agency / Office</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtoffice" id="txtoffice" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Salary</label>
                                <div class="col-md-3">
                                    <input type="text" name="txtsalary" id="txtsalary" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control bs-select" id="selperiod" name="selperiod">
                                        <option value="">PER</option>
                                        <?php foreach(salary_period() as $per):
                                                echo '<option value="'.$per.'">Per '.$per.'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="txtcurrency" id="txtcurrency" class="form-control" placeholder="CURR">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Salary / Job Pay Grade</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtgrade" id="txtgrade" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status of Appointment</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="selappointment" id="selappointment">
                                        <option value=""> </option>
                                        <?php foreach($arrExamType as $type):
                                                echo '<option value="'.$type['examCode'].'">'.$type['examDesc'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Government Service</label>
                                <div class="col-md-8">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optgov_srvc" id="optgov_srvc_y" value="Y"> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optgov_srvc" id="optgov_srvc_n" value="N"> No </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Branch</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="selbranch" id="selbranch">
                                        <option value=""> </option>
                                        <?php foreach($arrExamType as $type):
                                                echo '<option value="'.$type['examCode'].'">'.$type['examDesc'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mode of Separation</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="selmode_separation" id="selmode_separation">
                                        <option value=""> </option>
                                        <?php foreach($arrExamType as $type):
                                                echo '<option value="'.$type['examCode'].'">'.$type['examDesc'].'</option>';
                                              endforeach; ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Separation Date</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtseparation_date" id="txtseparation_date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">L/V ABS W/O PAY</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtabs" id="txtabs" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Remarks</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtremarks" id="txtremarks" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Processor</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtprocessor" id="txtprocessor" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Signing Official</label>
                                <div class="col-md-8">
                                    <input type="text" name="txtofficial" id="txtofficial" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end modal update/add child info -->

<!-- begin delete child -->
<div class="modal fade" id="delete_exam" tabindex="-1" role="basic" aria-hidden="true"> 
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <?=form_open('pds/delete_exam/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmdelexam','class' => 'form-horizontal'))?>
                <input type="hidden" name="txtdel_exam" id="txtdel_exam">
                <div class="modal-body"> Are you sure you want to delete this data? </div>
                <div class="modal-footer">
                    <button type="submit" id="btndelete" class="btn btn-sm green">
                        <i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
                        <i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end delete child -->
<?=load_plugin('js',array('select','select2','datepicker'));?>

<script>
    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('.select2').select2({placeholder: "",allowClear: true});
    });
</script>