<?php $arrData = $arrData[0]; ?>
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
        <td>Business Partner No.</td>
        <td><?=$arrData['businessPartnerNumber']?></td>
    </tr>
</table>

<!-- begin modal update personal info -->
<div class="modal fade in" id="editPersonal_modal" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title uppercase"><b>Edit Personal Info</b></h4>
            </div>
            <div class="modal-body">
                <?=form_open(base_url('pds/edit_personal/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'employeeform' ,'onsubmit' => 'return checkForBlank()'))?>
                <div class="row">
                    <!-- begin profile -->
                    <div class="col-md-4">
                        <div class="portlet light" style="padding-top: 0;margin-bottom: 0 !important;">
                            <div class="portlet-title" style="padding: 0px 10px;">
                                <div class="caption font-dark">
                                    <span class="caption-subject"> Profile</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Surname : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSurname" value="<?=isset($arrData['surname'])?$arrData['surname']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Firstname : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strFirstname" value="<?=isset($arrData['firstname'])?$arrData['firstname']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Middle Name : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strMiddlename" value="<?=isset($arrData['middlename'])?$arrData['middlename']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Middle Initial : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strMidInitial" value="<?=isset($arrData['middleInitial'])?$arrData['middleInitial']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Name Ext. : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strNameExt" value="<?=isset($arrData['nameExtension'])?$arrData['nameExtension']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Date of Birth : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="dtmBday" value="<?=isset($arrData['birthday'])?$arrData['birthday']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Place of Birth : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strBirthPlace" value="<?=isset($arrData['birthPlace'])?$arrData['birthPlace']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Sex : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSex" value="<?=isset($arrData['sex'])?$arrData['sex']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Civil Status : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strCvlStatus" value="<?=isset($arrData['civilStatus'])?$arrData['civilStatus']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">GSIS Policy No. : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="intGSIS" value="<?=isset($arrData['gsisNumber'])?$arrData['gsisNumber']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Citizenship : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strCitizenship" value="<?=isset($arrData['citizenship'])?$arrData['citizenship']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Height : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strHeight" value="<?=isset($arrData['height'])?$arrData['height']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Weight : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strWeight" value="<?=isset($arrData['weight'])?$arrData['weight']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Blood Type : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strBloodType" value="<?=isset($arrData['bloodType'])?$arrData['bloodType']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile -->

                    <!-- begin Residential Address -->
                    <div class="col-md-4">
                        <div class="portlet light" style="padding-top: 0;">
                            <div class="portlet-title" style="padding: 0px 10px;">
                                <div class="caption font-dark">
                                    <span class="caption-subject"> Residential Address</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">House/Blk/Lot No. : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strLot2" value="<?=isset($arrData['lot2'])?$arrData['lot2']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Street : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strStreet1" value="<?=isset($arrData['street1'])?$arrData['street1']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Subd./Village : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSubd1" value="<?=isset($arrData['subdivision1'])?$arrData['subdivision1']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Barangay : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strBrgy1" value="<?=isset($arrData['barangay1'])?$arrData['barangay1']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Salutation : <span class="required"> * </span></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control" name="strSalutation" value="<?=isset($arrData['salutation'])?$arrData['salutation']:''?>">
                                                    <!-- <span class="help-block"> </span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Residential Address-->

                    <!-- begin Permanent Address -->
                    <div class="col-md-4">
                        <div class="portlet light" style="padding-top: 0;">
                            <div class="portlet-title" style="padding: 0px 10px;">
                                <div class="caption font-dark">
                                    <span class="caption-subject"> Permanent Address</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Permanent Address-->
                </div>
                <?=form_close()?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">a</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal update personal info -->
