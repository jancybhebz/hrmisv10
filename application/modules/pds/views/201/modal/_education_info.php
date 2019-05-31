<?=load_plugin('css', array('select','select2','datepicker'))?>
<!-- begin modal update/add child info -->
<div class="modal fade in" id="add_education" aria-hidden="true">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b><span class="action"></span> Education Information</b></h5>
            </div>
            <?=form_open('', array('method' => 'post', 'id' => 'frmeduc','class' => 'form-horizontal'))?>
            <input type="hidden" name="txteducid" id="txteducid">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Level Description</label>
                    <div class="col-md-8">
                        <select class="form-control bs-select" name="sellevel" id="sellevel">
                            <option value=""> </option>
                            <?php foreach($arrLevel as $level):
                                    echo '<option value="'.$level['levelCode'].'">'.$level['levelDesc'].'</option>';
                                  endforeach; ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Name of School</label>
                    <div class="col-md-8">
                        <input type="text" name="txtschool" id="txtschool" class="form-control">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Degree / Course</label>
                    <div class="col-md-8">
                        <select class="form-control select2" name="seldegree" id="seldegree" placeholder="">
                            <option value=""></option>
                            <?php foreach($arrCourses as $course):
                                    echo '<option value="'.$course['courseCode'].'">'.$course['courseDesc'].'</option>';
                                  endforeach; ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Scholarship</label>
                    <div class="col-md-8">
                        <select class="form-control select2" id="selscholarship" name="selscholarship" placeholder="">
                            <option value=""></option>
                            <?php foreach($arrScholarships as $scholarship):
                                    echo '<option value="'.$scholarship['id'].'">'.$scholarship['description'].'</option>';
                                  endforeach; ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Honors</label>
                    <div class="col-md-8">
                        <input type="text" name="txthonors" id="txthonors" class="form-control">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Year Graduated</label>
                    <div class="col-md-8">
                        <input type="type" maxlength="4" name="txtyrgraduate" id="txtyrgraduate" class="form-control">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Period of Attendance</label>
                    <div class="col-md-9">
                        <div class="input-group input-large input-daterange" id="attperiod" style="width: 88% !important;">
                            <input type="type" maxlength="4" class="form-control" name="txtperiodatt_from" id="txtperiodatt_from" placeholder="YYYY">
                            <span class="input-group-addon"> to </span>
                            <input type="type" maxlength="4" class="form-control" name="txtperiodatt_to" id="txtperiodatt_to" placeholder="YYYY">
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Highest Level/Units Earned</label>
                    <div class="col-md-8">
                        <input type="number" name="txtunits" id="txtunits" class="form-control">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Licensed</label>
                    <div class="col-md-8">
                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="optlicense" id="optlicense_y" value="Y"> Yes </label>
                            <label class="radio-inline">
                                <input type="radio" name="optlicense" id="optlicense_n" value="N"> No </label>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Graduated</label>
                    <div class="col-md-8">
                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="optgraduate" id="optgraduate_y" value="Y"> Yes </label>
                            <label class="radio-inline">
                                <input type="radio" name="optgraduate" id="optgraduate_n" value="N"> No </label>
                        </div>
                        <span class="help-block"></span>
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
<div class="modal fade" id="delete_education" tabindex="-1" role="basic" aria-hidden="true"> 
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <?=form_open('pds/delete_educ/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmchild','class' => 'form-horizontal'))?>
                <input type="hidden" name="txtdeleduc" id="txtdeleduc">
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
    $('select.select2').select2({
        minimumResultsForSearch: -1,
        placeholder: function(){
            $(this).data('placeholder');
        }
    });
    $(document).ready(function() {
        $('#attperiod,#txtyrgraduate').datepicker( {
            format: ' yyyy',
            viewMode: 'years',
            minViewMode: 'years'
        });
        $('#txtperiodatt_from,#txtperiodatt_to,#txtyrgraduate').on('changeDate', function(){
            $(this).datepicker('hide');
        });

    });
</script>