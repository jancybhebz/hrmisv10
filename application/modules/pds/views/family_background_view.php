
<!-- VIEW -->
<?=load_plugin('css', array('datepicker','timepicker'))?>

 <form action="<?=base_url('pds/edit_spouse/'.$this->uri->segment(4))?>" method="post" id="frmSpouse">
    <ul class="personal-info-employee">
       <b>SPOUSE INFORMATION:</b><br><br>
            <li>Name of Spouse : <?=$arrData['spouseFirstname'].' '.$arrData['spouseMiddlename'].' '.$arrData['spouseSurname']?></li><br>
            <li>Occupation : <?=$arrData['spouseWork']?></li><br>
            <li>Employer/Business Name : <?=$arrData['spouseBusName']?></li><br>
            <li>Business Address : <?=$arrData['spouseBusAddress']?></li><br>
            <li>Telephone Number : <?=$arrData['spouseTelephone']?></li><br>
            <div class="margin-top-10">
            <a class="btn green" data-toggle="modal" href="#editSpouse_modal"> Edit </a>
            </div><br>
    </ul>
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
</form>

    <ul class="personal-info-employee">
        <b>PARENT INFORMATION:</b><br><br>
            <li>Name of Father : <?=$arrData['fatherFirstname'].' '.$arrData['fatherMiddlename'].' '.$arrData['fatherSurname']?></li><br>
            <li>Name of Mother : <?=$arrData['motherFirstname'].' '.$arrData['motherMiddlename'].' '.$arrData['motherSurname']?></li><br>
            <li>Parents Address : <?=$arrData['parentAddress']?></li><br>
             <div class="margin-top-10">
            <a class="btn green" data-toggle="modal" href="#editParent_modal"> Edit </a>
            </div><br>
    </ul>
 <form action="<?=base_url('pds/edit_parents/'.$this->uri->segment(4))?>" method="post" id="frmParents">
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
</form>

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
            <td><a class="btn green" data-toggle="modal" href="#editChildren_modal"> Edit </a>
            <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteChild"> Delete </a>
             
        </tr>
        <?php endforeach;?>
        <br>
 <form action="<?=base_url('pds/edit_child/'.$this->uri->segment(4))?>" method="post" id="frmChild">
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
                            <input type="text" class="form-control" name="strCNname" value="<?=isset($arrData['childName'])?$arrData['childName']:''?>">
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
                            <input id="strCBirthdate" name="dtmCBirthdate" type="text" class="form-control form-control-inline input-medium date-picker" size="16" value="<?=isset($arrData['childBirthDate'])?$arrData['childBirthDate']:''?>">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                    <input type="hidden" name="strEmpNumber" value="<?=isset($arrData['empNumber'])?$arrData['empNumber']:''?>">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnParents" class="btn green">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>
    <div class="margin-top-10">
    <a class="btn green" data-toggle="modal" href="#addChildren_modal"> Add </a>
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
                            <input type="text" class="form-control" name="strCFirstname" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
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
                            <input id="strCBirthdate" name="strCBirthdate" type="text" class="form-control form-control-inline input-medium date-picker" size="16">
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
    </table>
</form>



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
 
</script>

