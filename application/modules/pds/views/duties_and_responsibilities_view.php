 <div id="tab_duties" class="tab-pane">
    <form action="#">
        <b>DUTIES AND RESPONSIBILITIES :</b><br><br>    
        <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
        <a class="btn green" data-toggle="modal" href="#addDuties_position_modal"> Add </a>
        <?php endif;?>                    
        <div class="modal fade bs-modal-lg"  id="addDuties_position_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>-- Duties & Responsibility of Position --</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Duties and Responsibilities : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strPosDuties" value="<?=isset($arrData[0]['duties'])?$arrData[0]['duties']:''?>">
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
                                        <label class="control-label">Percent of Working Time : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intPosPercent" value="<?=isset($arrData[0]['percentWork'])?$arrData[0]['percentWork']:''?>">
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
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <td colspan="4">EMPLOYEE DUTIES AND RESPONSIBILITIES</td>
                </tr>
                <tr>
                    <td colspan="4">-- Duties & Responsibility of Position --</td>
                </tr>
                <tr>
                    <th>Duties and Responsibilities</th>
                    <th>Percent of Working Time</th>
                    <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <th>Action</th>
                    <?php endif;?>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <td colspan="2"> <a class="btn green" data-toggle="modal" href="#editDuties_position_modal"> Edit </a>
                      <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteDutiesPosition"> Delete </a></td>
                    <?php endif;?>
                </tr>
             </table>
        <?=form_open(base_url('pds/edit_duties/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmDuties'))?>
                <div class="modal fade bs-modal-lg"  id="editDuties_position_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Duties & Responsibility of Position</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                             <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Duties and Responsibilities : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strPosDuties" value="<?=isset($arrData[0]['duties'])?$arrData[0]['duties']:''?>">
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
                                        <label class="control-label">Percent of Working Time : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intPosPercent" value="<?=isset($arrData[0]['percentWork'])?$arrData[0]['percentWork']:''?>">
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

           <br><br>
            <?=form_close()?>
            <!-- DELETE -->
            <div class="modal fade bs-modal-lg"  id="deleteDutiesPosition" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>-- Duties & Responsibility of Position --</b></h4>
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
                
            <table class="table table-bordered table-striped" class="table-responsive">
            <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
            <a class="btn green" data-toggle="modal" href="#addDuties_plantilla_modal"> Add </a>
            <?php endif;?>                    
            <div class="modal fade bs-modal-lg"  id="addDuties_plantilla_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b> Duties & Responsibility of Position</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                             <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Duties and Responsibilities : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strPlantillaDuties" value="<?=isset($arrData[0]['itemDuties'])?$arrData[0]['itemDuties']:''?>">
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
                                        <label class="control-label">Percent of Working Time : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intPlantillaPercent" value="<?=isset($arrData[0]['percentWork'])?$arrData[0]['percentWork']:''?>">
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
                <tr>
                    <td colspan="4">-- Duties & Responsibility of Plantilla --</td>
                </tr>
                <tr>
                    <th>Duties and Responsibilities</th>
                    <th>Percent of Working Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrPlantillaDuties as $row): ?>
                <tr>
                    <td><?=$row['itemDuties']?></td>
                    <td><?=$row['percentWork']?></td>
                    <td colspan="2"> <a class="btn green" data-toggle="modal" href="#editDuties_plantilla_modal"> Edit </a>
                       <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteDutiesPlantilla"> Delete </a></td>
                </tr>
                <?php endforeach; ?>
                <div class="modal fade bs-modal-lg"  id="editDuties_plantilla_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b> Duties & Responsibility of Plantilla </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Duties and Responsibilities : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strPlantillaDuties" value="<?=isset($arrData[0]['itemDuties'])?$arrData[0]['itemDuties']:''?>">
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
                                        <label class="control-label">Percent of Working Time : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intPlantillaPercent" value="<?=isset($arrData[0]['percentWork'])?$arrData[0]['percentWork']:''?>">
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
            </table><br><br>
            <!-- DELETE -->
            <div class="modal fade bs-modal-lg"  id="deleteDutiesPlantilla" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>-- Duties & Responsibility of Plantilla --</b></h4>
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

            <table class="table table-bordered table-striped" class="table-responsive">
            <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
            <a class="btn green" data-toggle="modal" href="#addActual_modal"> Add </a>         
            <?php endif;?>           
            <div class="modal fade bs-modal-lg"  id="addActual_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b> Duties & Responsibility of Position </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                              <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Duties and Responsibilities : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strActualDuties" value="<?=isset($arrData[0]['duties'])?$arrData[0]['duties']:''?>">
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
                                        <label class="control-label">Percent of Working Time : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intActualPercent" value="<?=isset($arrData[0]['percentWork'])?$arrData[0]['percentWork']:''?>">
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
                <tr>
                    <td colspan="4">-- Actual Duties & Responsibilities --</td>
                </tr>
                <tr>
                    <th>Duties and Responsibilities</th>
                    <th>Percent of Working Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrDuties as $row): ?>
                <tr>
                    <td><?=$row['duties']?></td>
                    <td><?=$row['percentWork']?></td>
                    <td colspan="2"><a class="btn green" data-toggle="modal" href="#editActual_modal"> Edit </a>  
                    <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteActualDuties"> Delete </a></td>
                </tr>
                <?php endforeach; ?>
                <div class="modal fade bs-modal-lg"  id="editActual_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>-- Duties & Responsibility of Position --</b></h4>
                        </div>
                            <div class="modal-body"> </div>
                             <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Duties and Responsibilities : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strActualDuties" value="<?=isset($arrData[0]['duties'])?$arrData[0]['duties']:''?>">
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
                                        <label class="control-label">Percent of Working Time : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="intActualPercent" value="<?=isset($arrData[0]['percentWork'])?$arrData[0]['percentWork']:''?>">
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
            </table><br><br>
            <!-- DELETE -->
            <div class="modal fade bs-modal-lg"  id="deleteActualDuties" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>-- Actual Duties & Responsibilities --</b></h4>
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
    </form>
</div>

<script>

    $('#btndelete').click(function() {
    $.ajax ({type : 'GET', url: 'duties_and_responsibilities_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Duty'+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
    
</script>