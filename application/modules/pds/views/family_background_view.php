
<!-- VIEW -->
<?=load_plugin('css', array('datepicker','timepicker'))?>

  <b>SPOUSE INFORMATION:</b>
      <table class="table table-bordered table-striped" id="table-child">
            <tr>
                <th width="19%">Name of Spouse </th>
                <th width="15%">Occupation </th>
                <th width="15%">Employer/Business Name </th>
                <th width="20%">Business Address </th>
                <th width="5%">Telephone Number </th>
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                <th width="10%">Action </th>
                <?php endif; ?>
            </tr>

            <?php //foreach($arrData as $row):?>
            <tr>
                <td><?=$arrData['spouseFirstname'].' '.$arrData['spouseMiddlename'].' '.$arrData['spouseSurname']?></td>
                <td><?=$arrData['spouseWork']?></td>
                <td><?=$arrData['spouseBusName']?></td>
                <td><?=$arrData['spouseBusAddress']?></td>
                <td><?=$arrData['spouseTelephone']?></td>
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                <td><a class="btn green" data-toggle="modal" href="#editSpouse_modal"> Edit </a>
                <?php endif;?>
                 
            </tr>
            <?php //endforeach;?>
    </table>
    
    <?=form_open(base_url('pds/edit_spouse/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmSpouse'))?>
    <div class="modal fade bs-modal-lg"  id="editSpouse_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>Spouse's Information</b></h4>
                </div>
                <div class="modal-body">  </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-left">
                        <div class="form-group">
                            <label class="control-label">Surname : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSSurname" value="<?=isset($arrData['spouseSurname'])?$arrData['spouseSurname']:''?>">
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
                            <label class="control-label">Firstname : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSFirstname" value="<?=isset($arrData['spouseFirstname'])?$arrData['spouseFirstname']:''?>">
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
                            <label class="control-label">Middle Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSMidllename" value="<?=isset($arrData['spouseMiddlename'])?$arrData['spouseMiddlename']:''?>">
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
                            <label class="control-label">Name Extension : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSExt" value="<?=isset($arrData['spousenameExtension'])?$arrData['spousenameExtension']:''?>">
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
                            <label class="control-label">Occupation : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSOccupation" value="<?=isset($arrData['spouseWork'])?$arrData['spouseWork']:''?>">
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
                            <label class="control-label">Employer/Bus.Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSEmployer" value="<?=isset($arrData['spouseBusName'])?$arrData['spouseBusName']:''?>">
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
                            <label class="control-label">Business Address : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSBusAdd" value="<?=isset($arrData['spouseBusAddress'])?$arrData['spouseBusAddress']:''?>">
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
                            <label class="control-label">Telephone No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSTelephone" value="<?=isset($arrData['spouseTelephone'])?$arrData['spouseTelephone']:''?>">
                        </div>
                    </div>
                </div><br>
                <div class="modal-footer">
                 <input type="hidden" name="strEmpNumber" value="<?=isset($arrData['empNumber'])?$arrData['empNumber']:''?>">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Save</button>                                
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?=form_close()?>
 <b>PARENT'S INFORMATION:</b>
    <table class="table table-bordered table-striped" id="table-child">
            <tr>
                <th width="19%">Name of Father </th>
                <th width="16%">Name of Mother </th>
                <th width="30%">Parents Address </th>
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                <th width="20%">Action </th>
                <?php endif; ?>
            </tr>

            <?php //foreach($arrData as $row):?>
            <tr>
                <td><?=$arrData['fatherFirstname'].' '.$arrData['fatherMiddlename'].' '.$arrData['fatherSurname'] .' '.$arrData['fathernameExtension']?></td>
                <td><?=$arrData['motherFirstname'].' '.$arrData['motherMiddlename'].' '.$arrData['motherSurname']?></td>
                <td><?=$arrData['parentAddress']?></td>
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                <td><a class="btn green" data-toggle="modal" href="#editParent_modal"> Edit </a>
                <?php endif; ?>
                 
            </tr>
            <?php //endforeach;?>
    </table>

<?=form_open(base_url('pds/edit_parents/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmParents'))?>
    <div class="modal fade bs-modal-lg"  id="editParent_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>Parent's Information</b></h4>
                </div>
                <div class="modal-body"> </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-left">
                        <div class="form-group">
                            <label class="control-label">Father's Information</label>
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
                            <label class="control-label">Surname : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strFSurname" value="<?=isset($arrData['fatherSurname'])?$arrData['fatherSurname']:''?>">
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
                            <label class="control-label">First Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strFFirstname" value="<?=isset($arrData['fatherFirstname'])?$arrData['fatherFirstname']:''?>">
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
                            <label class="control-label">Middle Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strFMidname" value="<?=isset($arrData['fatherMiddlename'])?$arrData['fatherMiddlename']:''?>">
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
                            <label class="control-label">Name Extension : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strFExtension" value="<?=isset($arrData['fathernameExtension'])?$arrData['fathernameExtension']:''?>">
                        </div>
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-left">
                        <div class="form-group">
                            <label class="control-label">Mother's Information</label>
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
                            <label class="control-label">Surname : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strMSurname" value="<?=isset($arrData['motherSurname'])?$arrData['motherSurname']:''?>">
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
                            <label class="control-label">First Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strMFirstname" value="<?=isset($arrData['motherFirstname'])?$arrData['motherFirstname']:''?>">
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
                            <label class="control-label">Middle Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strMMiddlename" value="<?=isset($arrData['motherMiddlename'])?$arrData['motherMiddlename']:''?>">
                        </div>
                    </div>
                </div><br>

                 <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-left">
                        <div class="form-group">
                            <label class="control-label">Parent's Address: <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strPAddress" value="<?=isset($arrData['parentAddress'])?$arrData['parentAddress']:''?>">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                    <input type="hidden" name="strEmpNumber" value="<?=isset($arrData['empNumber'])?$arrData['empNumber']:''?>">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnParents" class="btn green">Save</button>
                </div>
             </div>
         </div>
     </div>
<?=form_close()?>

        <b>CHILDREN INFORMATION:</b><br><br>
    <table class="table table-bordered table-striped" id="table-child">
        <tr>
            <th width="30%">Name of Children </th>
            <th width="30%">Date of Birth </th>
            <th width="30%">Action </th>
        </tr>
        <?php foreach($arrChild as $row):?>
        <tr>
            <td><?=$row['childName']?></td>
            <td><?=$row['childBirthDate']?></td>
            <td>
            <a class="btn green" data-toggle="modal" href="#editChildren_modal" onclick="getChild(<?=$row['childCode']?>,'<?=$row['childName']?>','<?=$row['childBirthDate']?>')"> Edit </a>
            <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteChild"> Delete </a>
        </tr>
        <?php endforeach;?>
    </table>

<?=form_open(base_url('pds/edit_child/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmChild'))?>
     <div class="modal fade bs-modal-lg"  id="editChildren_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>Children's Information</b></h4>
                </div>
                <div class="modal-body"> </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-left">
                        <div class="form-group">
                            <label class="control-label">Children's Information</label>
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
                            <label class="control-label">Full Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strCName" id="strCName" value="<?=isset($arrChild[0]['childName'])?$arrChild[0]['childName']:''?>">
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
                            <label class="control-label">Date of Birth : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <i class="fa"></i>
                            <input id="dtmCBirthdate" name="dtmCBirthdate" type="text" class="form-control form-control-inline input-medium date-picker" size="16" value="<?=isset($arrChild[0]['childBirthDate'])?$arrChild[0]['childBirthDate']:''?>">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                    <input type="hidden" name="intChildCode" id="intChildCode" value="<?=isset($arrChild['childCode'])?$arrChild['childCode']:''?>">
                    <input type="hidden" name="strEmpNumber" id="strEmpNumber" value="<?=$this->uri->segment(3)?>">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnChild" class="btn green">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?=form_close()?>

<?=form_open(base_url('pds/add_child/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmChild'))?>
    <div class="margin-top-10">
    <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
    <a class="btn green" data-toggle="modal" href="#addChildren_modal"> Add Child</a>
    <?php endif; ?>
    </div>

    <div class="modal fade bs-modal-lg"  id="addChildren_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>Children's Information</b></h4>
                </div>
                <div class="modal-body"> </div>

                 <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-left">
                        <div class="form-group">
                            <label class="control-label">Full Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strCNname" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
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
                            <label class="control-label">Date of Birth : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-5" text-left>
                        <div class="form-group">
                        <i class="fa"></i>
                            <input id="strCBirthdate" name="dtmCBirthdate" type="text" class="form-control form-control-inline input-medium date-picker" size="16">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                  <input type="hidden" name="strEmpNumber" value="<?=isset($arrData['empNumber'])?$arrData['empNumber']:''?>">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?=form_close()?>



<!-- DELETE -->
<div class="modal fade bs-modal-lg"  id="deleteChild" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Children's Information</b></h4>
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

    $('#btndelete').click(function() {
    $.ajax ({type : 'GET', url: 'family_background_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Name of Child '+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
</script>

<?=load_plugin('js',array('validation','datepicker'));?>
<script>
    $(document).ready(function() 
    {
        $('.date-picker').datepicker();
    });

    function getChild(intChildCode,strChildName,dtmCBirthdate){
        $('#intChildCode').val(intChildCode);
        $('#strCName').val(strChildName);
        $('#dtmCBirthdate').val(dtmCBirthdate);
        // $.ajax ({type : 'GET', url: '<?=base_url("pds/pds/getchild")?>/'+intChildCode,
        // success: function(val){
        //     console.log(val);
            
        //     }});
    }

</script>

