<div id="tab_personal_info" class="tab-pane active">
    <form role="form" action="#">
        <table class="table table-bordered table-striped" class="table-responsive">
            <tr>
                <td>Date of Birth :</td>
                <td><?=$arrData['birthday']?></td>
                <td colspan="2">RESIDENTIAL ADDRESS:</td>  
            </tr>
            <tr>
                <td>Place of Birth :</td>
                <td><?=$arrData['birthPlace']?></td>
                <td>House/Block/Lot No., Street:</td>
                <td><?=$arrData['lot1'].' '.$arrData['street1']?></td>
            </tr>
            <tr>
                <td>Sex :</td>
                <td><?=$arrData['sex']?></td>
                <td>Subdivision/Village, Barangay :</td>
                <td><?=$arrData['subdivision1'].' '.$arrData['barangay1']?></td>
            </tr>
            <tr>
                <td>Civil Status :</td>
                <td><?=$arrData['civilStatus']?></td>
                <td>City/Municipality, Province :</td>
                <td><?=$arrData['city1'].' '.$arrData['province1']?></td>
            </tr>
            <tr>
                <td>Citizenship :</td>
                <td><?=$arrData['citizenship']?></td>
                <td>Zip Code :</td>
                <td><?=$arrData['zipCode1']?></td>
            </tr>
            <tr>
                <td>Height (m) :</td>
                <td><?=$arrData['height']?></td>
                <td>Telephone No. :</td>
                <td><?=$arrData['telephone1']?></td>
            </tr>
            <tr>
                <td>Weight (kg) :</td>
                <td><?=$arrData['weight']?></td>
                <td colspan="2">PERMANENT ADDRESS:</td>
            </tr>
            <tr>
                <td>Blood Type :</td>
                <td><?=$arrData['bloodType']?></td>
                <td>House/Block/Lot No., Street:</td>
                <td><?=$arrData['lot2'].' '.$arrData['street2']?></td>
            </tr>
            <tr>
                <td>GSIS Policy No. :</td>
                <td><?=$arrData['gsisNumber']?></td>
                <td>Subdivision/Village, Barangay :</td>
                <td> <?=$arrData['subdivision2'].' '.$arrData['barangay2']?></td>
            </tr>
            <tr>
                <td>Pag-ibig ID No. :</td>
                <td><?=$arrData['pagibigNumber']?></td>
                <td>City/Municipality, Province :</td>
                <td><?=$arrData['city2'].' '.$arrData['province2']?></td>
            </tr>
            <tr>
                <td>PHILHEALTH ID No. :</td>
                <td><?=$arrData['philHealthNumber']?></td>
                <td>Zip Code :</td>
                <td><?=$arrData['zipCode2']?></td>
            </tr>
            <tr>
                <td>TIN No. :</td>
                <td><?=$arrData['tin']?></td>
                <td>Telephone No. :</td>
                <td><?=$arrData['telephone2']?></td>
            </tr>
            <tr>
                <td>Email Address :</td>
                <td><?=$arrData['email']?></td>
                <td></td>
                <td></td>
            </tr>
        </table>      
         <div class="margin-top-10">
            <a class="btn green" data-toggle="modal" href="#personal_modal"> Edit </a>
        </div><br>                        
    </form>
    <div class="modal fade in" id="personal_modal" tabindex="-1" role="full" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>201 File Update</b></h4>
                </div>
                <div class="modal-body"> </div>

                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-3 text-center">
                        <div class="form-group" >
                            <label class="control-label" ><b>PROFILE </b></label>
                            <div class="input-icon right">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center">
                        <div class="form-group">
                            <label class="control-label"><b>Residential Address </b></label>
                            <div class="input-icon right">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center">
                        <div class="form-group">
                            <label class="control-label"><b>Permanent Address </b></label>
                            <div class="input-icon right">
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Salutation : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData[0]['salutation'])?$arrData[0]['salutation']:''?>">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">House/Blk/Lot No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strLot1" value="<?=isset($arrData[0]['lot1'])?$arrData[0]['lot1']:''?>">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">House/Blk/Lot No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strLot2" value="<?=isset($arrData[0]['lot2'])?$arrData[0]['lot2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                   <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Surname : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strSurname" value="<?=isset($arrData[0]['surname'])?$arrData[0]['surname']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Street : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strStreet1" value="<?=isset($arrData[0]['street1'])?$arrData[0]['street1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Street : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strStreet2" value="<?=isset($arrData[0]['street2'])?$arrData[0]['street2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                   <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Firstname : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strFirstname" value="<?=isset($arrData[0]['firstname'])?$arrData[0]['firstname']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Subd./Village : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strSubd1" value="<?=isset($arrData[0]['subdivision1'])?$arrData[0]['subdivision1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Subd./Village : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSubd2" value="<?=isset($arrData[0]['subdivision2'])?$arrData[0]['subdivision2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                   <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Middle Name : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strMidname" value="<?=isset($arrData[0]['middlename'])?$arrData[0]['middlename']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Barangay : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strBrgy1" value="<?=isset($arrData[0]['barangay1'])?$arrData[0]['barangay1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Barangay : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strBrgy2" value="<?=isset($arrData[0]['barangay2'])?$arrData[0]['barangay2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                   <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Middle Initial : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strMidInitial" value="<?=isset($arrData[0]['middleInitial'])?$arrData[0]['middleInitial']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">City/Municipality : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strCity1" value="<?=isset($arrData[0]['city1'])?$arrData[0]['city1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">City/Municipality : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strCity2" value="<?=isset($arrData[0]['city2'])?$arrData[0]['city2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Name Ext. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strNameExt" value="<?=isset($arrData[0]['nameExtension'])?$arrData[0]['nameExtension']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Province : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strProvince1" value="<?=isset($arrData[0]['province1'])?$arrData[0]['province1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Province : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strProvince2" value="<?=isset($arrData[0]['province2'])?$arrData[0]['province2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Date of Birth : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strBday" value="<?=isset($arrData[0]['birthday'])?$arrData[0]['birthday']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Zip Code : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strZip1" value="<?=isset($arrData[0]['zipCode1'])?$arrData[0]['zipCode1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Zip Code : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strZip2" value="<?=isset($arrData[0]['zipCode2'])?$arrData[0]['zipCode2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Place of Birth : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strBPlace" value="<?=isset($arrData[0]['birthPlace'])?$arrData[0]['birthPlace']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Telephone No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strTel1" value="<?=isset($arrData[0]['telephone1'])?$arrData[0]['telephone1']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Telephone No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strTel2" value="<?=isset($arrData[0]['telephone2'])?$arrData[0]['telephone2']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Sex : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strSex" value="<?=isset($arrData[0]['sex'])?$arrData[0]['sex']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Civil Status : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strCvlStatus" value="<?=isset($arrData[0]['civilStatus'])?$arrData[0]['civilStatus']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">GSIS Policy No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strGSIS" value="<?=isset($arrData[0]['gsisNumber'])?$arrData[0]['gsisNumber']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Mobile No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strMobile" value="<?=isset($arrData[0]['Mobile'])?$arrData[0]['Mobile']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Citizenship : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strCitizenship" value="<?=isset($arrData[0]['citizenship'])?$arrData[0]['citizenship']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Pag-Ibig No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strPagibig" value="<?=isset($arrData[0]['pagibigNumber'])?$arrData[0]['pagibigNumber']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Email Address : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strEmail" value="<?=isset($arrData[0]['email'])?$arrData[0]['email']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Height : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strHeight" value="<?=isset($arrData[0]['height'])?$arrData[0]['height']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Philheath No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strPHealth" value="<?=isset($arrData[0]['philHealthNumber'])?$arrData[0]['philHealthNumber']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Payroll Account No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strAccountNum" value="<?=isset($arrData[0]['AccountNum'])?$arrData[0]['AccountNum']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Weight : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strWeight" value="<?=isset($arrData[0]['weight'])?$arrData[0]['weight']:''?>">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">TIN No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                             <input type="text" class="form-control" name="strTin" value="<?=isset($arrData[0]['tin'])?$arrData[0]['tin']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">SSS No. : <span class="required"> * </span></label>
                        </div>
                    </div>
                     <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSSS" value="<?=isset($arrData[0]['sss'])?$arrData[0]['sss']:''?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-1 text-left">
                        <div class="form-group">
                            <label class="control-label">Blood Type : <span class="required"> * </span></label>
                        </div>
                    </div>
                    <div class="col-sm-2" text-left>
                        <div class="form-group">
                            <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData[0]['bloodType'])?$arrData[0]['bloodType']:''?>">
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>