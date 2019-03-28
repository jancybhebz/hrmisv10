
<div id="tab_volWork" class="tab-pane">
    <form action="#">
        <b>VOLUNTARY WORKS :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <label>Voluntary Work or Involvement in Civic / Non-Governement / People / Voluntary Organization :</label></br></br>
                    <tr>
                        <th width="10%">Name of Organization</th>
                        <th width="10%">Address of Organization</th>
                        <th width="10%">Inclusive Dates [From-To]</th>
                        <th width="10%">Number of Hours</th>
                        <th width="10%">Position/Nature of work</th>
                        <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                        <th width="10%">Action</th>
                        <?php endif; ?>
                    </tr>
                    <?php foreach($arrVol as $row):?>
                    <tr>
                        <td><?=$row['vwName']?></td>
                        <td><?=$row['vwAddress']?></td>
                        <td><?=$row['vwDateFrom'].'-'.$row['vwDateTo']?></td>
                        <td><?=$row['vwHours']?></td>
                        <td><?=$row['vwPosition']?></td>
                        <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                        <td> <a class="btn green" data-toggle="modal" href="#editVolWorks_modal" onclick="getWorks(<?=$row['VoluntaryIndex']?>,'<?=$row['vwName']?>','<?=$row['vwAddress']?>','<?=$row['vwPosition']?>')"> Edit </a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteVolWork"> Delete </a></td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach;?>
                </table>
            </form>
            <?=form_open(base_url('pds/edit_volWorks/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmVolWorks'))?>
                    <div class="modal fade bs-modal-lg"  id="editVolWorks_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Voluntary Works </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Name of Organization : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strOrgName" value="<?=isset($arrVol[0]['vwName'])?$arrVol[0]['vwName']:''?>">
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
                                        <label class="control-label">Address : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strAddress" value="<?=isset($arrVol[0]['vwAddress'])?$arrVol[0]['vwAddress']:''?>">
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
                                        <label class="control-label">Inclusive Date From :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateFrom" value="<?=isset($arrVol[0]['vwDateFrom'])?$arrVol[0]['vwDateFrom']:''?>">
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
                                        <label class="control-label">Inclusive Date To :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmDateTo" value="<?=isset($arrVol[0]['vwDateTo'])?$arrVol[0]['vwDateTo']:''?>">
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
                                        <label class="control-label">Number of Hours :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dtmHours" value="<?=isset($arrVol[0]['vwHours'])?$arrVol[0]['vwHours']:''?>">
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
                                        <label class="control-label">Position / Nature of Work :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strNature" value="<?=isset($arrVol[0]['vwPosition'])?$arrVol[0]['vwPosition']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="intVolIndex" id="intVolIndex" value="<?=isset($arrVol['VoluntaryIndex'])?$arrVol['VoluntaryIndex']:''?>">
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
                    <a class="btn green" data-toggle="modal" href="#addVolWorks_modal"> Add </a>
                    <?php endif; ?>
                    <div class="modal fade bs-modal-lg"  id="addVolWorks_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Voluntary Works  </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Name of Organization : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strOrgName">
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
                                        <label class="control-label">Address : <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strAddress">
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
                                        <label class="control-label">Inclusive Date From :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmDateFrom"></select>
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
                                        <label class="control-label">Inclusive Date To :  <span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="dtmDateTo"></select>
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
                                        <label class="control-label">Number of Hours :  <span class="required"> * </span></label>
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
                                        <label class="control-label">Position / Nature of Work :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strNature">
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

<!-- DELETE -->
<div class="modal fade bs-modal-lg"  id="deleteVolWork" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Voluntary Works</b></h4>
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
    $.ajax ({type : 'GET', url: 'voluntary_works_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Voluntary work information '+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
    
       });

    function getWorks(intVolIndex,vwName,vwAddress,vwPosition){
        $('#intServiceId').val(intServiceId);
        $('#vwName').val(vwName);
        $('#vwAddress').val(vwAddress);
        $('#vwPosition').val(vwPosition);
     
    }
</script>