<!-- VIEW -->
<form role="form" action="#">
    <ul class="personal-info-employee">
       <b>SPOUSE INFORMATION:</b><br><br>
            <li>Name of Spouse : <?=$arrData['spouseFirstname'].' '.$arrData['spouseMiddlename'].' '.$arrData['spouseSurname']?></li><br>
            <li>Occupation : <?=$arrData['spouseWork']?></li><br>
            <li>Employer/Business Name : : <?=$arrData['spouseBusName']?></li><br>
            <li>Business Address : <?=$arrData['spouseBusAddress']?></li><br>
            <li>Telephone Number : <?=$arrData['spouseTelephone']?></li><br>
            <div class="margin-top-10">
            <a class="btn green" data-toggle="modal" href="#spouse_modal"> Edit </a>
            </div><br>
    </ul>
    <div class="modal fade bs-modal-lg"  id="spouse_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="text" class="form-control" name="strSurname" value="<?=isset($arrData[0]['spouseSurname'])?$arrData[0]['spouseSurname']:''?>">
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
                            <input type="text" class="form-control" name="strFirstname" value="<?=isset($arrData[0]['spouseFirstname'])?$arrData[0]['spouseFirstname']:''?>">
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
                            <input type="text" class="form-control" name="strMidllename" value="<?=isset($arrData[0]['spouseMiddlename'])?$arrData[0]['spouseMiddlename']:''?>">
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
                            <input type="text" class="form-control" name="strExt" value="<?=isset($arrData[0]['spousenameExtension'])?$arrData[0]['spousenameExtension']:''?>">
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
                            <input type="text" class="form-control" name="strOccupation" value="<?=isset($arrData[0]['spouseWork'])?$arrData[0]['spouseWork']:''?>">
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
                            <input type="text" class="form-control" name="strEmployer" value="<?=isset($arrData[0]['spouseBusName'])?$arrData[0]['spouseBusName']:''?>">
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
                            <input type="text" class="form-control" name="strBusAdd" value="<?=isset($arrData[0]['spouseBusAddress'])?$arrData[0]['spouseBusAddress']:''?>">
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
                            <input type="text" class="form-control" name="strTelephone" value="<?=isset($arrData[0]['spouseTelephone'])?$arrData[0]['spouseTelephone']:''?>">
                        </div>
                    </div>
                </div><br>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <ul class="personal-info-employee">
        <b>PARENT INFORMATION:</b><br><br>
            <li>Name of Father : <?=$arrData['fatherFirstname'].' '.$arrData['fatherMiddlename'].' '.$arrData['fatherSurname']?></li><br>
            <li>Name of Mother : <?=$arrData['motherFirstname'].' '.$arrData['motherMiddlename'].' '.$arrData['motherSurname']?></li><br>
            <li>Parents Address : : <?=$arrData['parentAddress']?></li><br>
             <div class="margin-top-10">
            <a class="btn green" data-toggle="modal" href="#parent_modal"> Edit </a>
            </div><br>
    </ul>
    <div class="modal fade bs-modal-lg"  id="parent_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="text" class="form-control" name="strFSurname" value="<?=isset($arrData[0]['fatherSurname'])?$arrData[0]['fatherSurname']:''?>">
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
                            <input type="text" class="form-control" name="strFFirstname" value="<?=isset($arrData[0]['fatherFirstname'])?$arrData[0]['fatherFirstname']:''?>">
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
                            <input type="text" class="form-control" name="strFMidname" value="<?=isset($arrData[0]['fatherMiddlename'])?$arrData[0]['fatherMiddlename']:''?>">
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
                            <input type="text" class="form-control" name="strFExtension" value="<?=isset($arrData[0]['fathernameExtension'])?$arrData[0]['fathernameExtension']:''?>">
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
                            <input type="text" class="form-control" name="strMSurname" value="<?=isset($arrData[0]['motherSurname'])?$arrData[0]['motherSurname']:''?>">
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
                            <input type="text" class="form-control" name="strMFirstname" value="<?=isset($arrData[0]['motherFirstname'])?$arrData[0]['motherFirstname']:''?>">
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
                            <input type="text" class="form-control" name="strMMiddlename" value="<?=isset($arrData[0]['motherMiddlename'])?$arrData[0]['motherMiddlename']:''?>">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save changes</button>
                </div>
             </div>
         </div>
     </div>

        <b>CHILDREN INFORMATION:</b><br><br>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="30%">Name of Children </th>
            <th width="30%">Date of Birth </th>
            <th width="30%">Action </th>
        </tr>
        <?php foreach($arrChild as $row):?>
        <tr>
            <td><?=$row['childName']?></td>
            <td><?=$row['childBirthDate']?></td>
            <td><a class="btn green" data-toggle="modal" href="#children_modal"> Edit </a>
            <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
        </tr>
        <?php endforeach;?>
        <br>
    </table>
     <div class="modal fade bs-modal-lg"  id="children_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="text" class="form-control" name="strCBirthdate" value="<?=isset($arrData[0]['childBirthDate'])?$arrData[0]['childBirthDate']:''?>">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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
                            <input type="text" class="form-control" name="strCBirthdate" value="<?=isset($arrData[0]['childBirthDate'])?$arrData[0]['childBirthDate']:''?>">
                        </div>
                    </div>
                </div><br>

                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>

<!-- EDIT -->

<!-- DELETE -->

