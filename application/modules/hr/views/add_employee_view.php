<?php 
/** 
Purpose of file:    Add Employee View for 201
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BREADCRUMB -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Add New Employee</a>
            <i class="fa fa-circle"></i>
        </li>
       
    </ul>
</div>
<!-- END BREADCRUMB -->

<form action="" method="post" onsubmit="return checkForBlank()" name="employeeform">
 <!-- <?php print_r($arrData) ?>  -->
 <br><br>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label"><strong>ID Number : </strong><span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strEmpID" id="strEmpID" type="text" size="20" maxlength="20" class="form-control" required="" value="<?=isset($arrData[0]['empNumber'])?$arrData[0]['empNumber']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="idnum"></span></font>
                </div>
            </div>
         </div><br><br>

         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Salutation : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strSalutation" id="strSalutation" type="text" size="20" maxlength="20" class="form-control" value="<?=isset($arrData[0]['salutation'])?$arrData[0]['salutation']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="salutation"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Surname : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strSurname" id="strSurname" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['surname'])?$arrData[0]['surname']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="sur"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Firstname : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strFirstname" id="strFirstname" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['firstname'])?$arrData[0]['firstname']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="first"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Middle Name : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strMiddlename" id="strMiddlename" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['middlename'])?$arrData[0]['middlename']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="middle"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Middle Initial : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strMidInitial" id="strMidInitial" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['middleInitial'])?$arrData[0]['middleInitial']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="mid"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Name Extension :</label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strNameExt" id="strNameExt" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['nameExtension'])?$arrData[0]['nameExtension']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="namext"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Date of Birth : <span class="required"> * </span></label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="date" id="dtmBday" name="dtmBday" class="form-control has-datepicker" value="<?=isset($arrData[0]['birthday'])?$arrData[0]['birthday']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="bday"></span></font>
                </div>
            </div>
        </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Place of Birth : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strBirthPlace" id="strBirthPlace" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['birthPlace'])?$arrData[0]['birthPlace']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="place"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Sex : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <select name="strSex" id="strSex" type="text" class="form-control">
                        <option value="">Please Select</option>
                        <option>Female</option>
                        <option>Male</option>
                    </select>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="uno"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Civil Status : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <select name="strCvlStatus" id="strCvlStatus" type="text" class="form-control" value="<?=isset($arrData[0]['civilStatus'])?$arrData[0]['civilStatus']:''?>">
                        <option value="">Please Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Separated</option>
                        <option>Widowed</option>
                        <option>Annulled</option>
                        <option>Others</option>
                    </select>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="uno"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Citizenship : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input type="radio" name="strCitizenship"
                        <?php if (isset($strCitizenship) && $strCitizenship=="Filipino") echo "checked";?> value="female">Filipino
                    <input type="radio" name="strCitizenship"
                        <?php if (isset($strCitizenship) && $strCitizenship=="Dual") echo "checked";?> value="dual">Dual Citizenship
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Height (m) : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strHeight" id="strHeight" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['height'])?$arrData[0]['height']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="height"></span></font>
                </div>
            </div>
         </div>
           <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Weight (kg) : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strWeight" id="strWeight" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['height'])?$arrData[0]['height']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="weight"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Blood Type : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strBloodType" id="strBloodType" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['bloodType'])?$arrData[0]['bloodType']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="blood"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">GSIS Policy No. :<span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intGSIS" id="intGSIS" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['gsisNumber'])?$arrData[0]['gsisNumber']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="gsis"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">PAG-IBIG ID No. :<span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intPagibig" id="intPagibig" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['pagibigNumber'])?$arrData[0]['pagibigNumber']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="pagibig"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">PHILHEALTH No. :<span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intPhilhealth" id="intPhilhealth" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['philHealthNumber'])?$arrData[0]['philHealthNumber']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="philhealth"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">TIN No. :<span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intTin" id="intTin" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['tin'])?$arrData[0]['tin']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="tin"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Email Address :<span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strEmail" id="strEmail" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['email'])?$arrData[0]['email']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="email"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">SSS Number :<span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intSSS" id="intSSS" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['sssNumber'])?$arrData[0]['sssNumber']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="sss"></span></font>
                </div>
            </div>
         </div>
         <br><br>
         <div class="row">
             <div class="col-sm-5 text-right">
                <div class="form-group">
                    <label class="control-label">TEMPORARY ADDRESS : </label>
                </div>
            </div>
        </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">House/Block/Lot No. : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strLot1" id="strLot1" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['lot1'])?$arrData[0]['lot1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="lot"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Street : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strStreet1" id="strStreet1" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['street1'])?$arrData[0]['street1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="street"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Subdivision/Village : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strSubd1" id="strSubd1" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['subdivision1'])?$arrData[0]['subdivision1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="subd"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Barangay : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strBrgy1" id="strBrgy1" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['barangay1'])?$arrData[0]['barangay1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="brgy"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">City/Municipality : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strCity1" id="strCity1" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['city1'])?$arrData[0]['city1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="city"></span></font>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Province : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strProv1" id="strProv1" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['province1'])?$arrData[0]['province1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="prov"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Zip Code : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intZipCode1" id="intZipCode1" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['zipCode1'])?$arrData[0]['zipCode1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="zip1"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Telephone Number : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intTel1" id="intTel1" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['telephone1'])?$arrData[0]['telephone1']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="tel1"></span></font>
                </div>
            </div>
         </div>
         <br><br>
          <div class="row">
             <div class="col-sm-5 text-right">
                <div class="form-group">
                    <label class="control-label">PERMANENT ADDRESS : </label>
                </div>
            </div>
        </div>
           <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">House/Block/Lot No. : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strLot2" id="strLot2" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['lot2'])?$arrData[0]['lot2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="lot2"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Street :</label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strStreet2" id="strStreet2" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['street2'])?$arrData[0]['street2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="street2"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Subdivision/Village : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strSubd2" id="strSubd2" type="text" size="20" maxlength="255" class="form-control" value="<?=isset($arrData[0]['subdivision2'])?$arrData[0]['subdivision2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="subd2"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Barangay : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strBrgy2" id="strBrgy2" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['barangay2'])?$arrData[0]['barangay2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="brgy2"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">City/Municipality : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strCity2" id="strCity2" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['city2'])?$arrData[0]['city2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="city2"></span></font>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Province : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="strProv2" id="strProv2" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['province2'])?$arrData[0]['province2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="prov2"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Zip Code : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intZipCode2" id="intZipCode2" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['zipCode2'])?$arrData[0]['zipCode2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="zip2"></span></font>
                </div>
            </div>
         </div>
          <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Telephone Number : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intTel2" id="intTel2" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['telephone2'])?$arrData[0]['telephone2']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="tel2"></span></font>
                </div>
            </div>
         </div>
           <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Mobile Number : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intMobile" id="intMobile" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['Mobile'])?$arrData[0]['Mobile']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="mobile"></span></font>
                </div>
            </div>
         </div>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Account Number : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input name="intAccount" id="intAccount" type="text" size="20" maxlength="255" class="form-control" required="" value="<?=isset($arrData[0]['AccountNum'])?$arrData[0]['AccountNum']:''?>">
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="account"></span></font>
                </div>
            </div>
         </div>
        <br><br>
       <div class="row">
          <div class="col-sm-12 text-center">
              <button type="submit" class="btn btn-primary"><?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Add'?></button>
              <a href="<?=base_url('hr/add_employee')?>"/><button type="reset" class="btn btn-primary">Clear</button></a>
          </div>
        </div>
    <br><br>
</form>

<script src="<?=base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script>

    $('#dtmBday').datepicker({dateFormat: 'yyyy-mm-dd'});

function checkForBlank()
{
    var spaceCount = 0;
 
  if((document.employeeform.strEmpID.value==0) && (document.employeeform.strSalutation.value==0) && (document.employeeform.strSurname.value==0) && (document.employeeform.strFirstname.value==0) && (document.employeeform.strMiddlename.value==0) && (document.employeeform.strMidInitial.value==0) && (document.employeeform.strNameExt.value==0) && (document.employeeform.dtmBday.value==0) && (document.employeeform.strBirthPlace.value==0) && (document.employeeform.strSex.value==0) && (document.employeeform.strHeight.value==0) && (document.employeeform.strWeight.value==0) && (document.employeeform.strBloodType.value==0) && (document.employeeform.intGSIS.value==0) && (document.employeeform.intPagibig.value==0) && (document.employeeform.strPhilhealth.value==0) && (document.employeeform.intTin.value==0) && (document.employeeform.strEmail.value==0) && (document.employeeform.intSSS.value==0) && (document.employeeform.intZipCode1.value==0) && (document.employeeform.intZipCode2.value==0) && (document.employeeform.intTelephone1.value==0)  && (document.employeeform.intTelephone2.value==0) && (document.employeeform.intMobile.value==0) && (document.employeeform.intAccount.value==0))

      { 
      document.getElementById('idnum').innerHTML = "Invalid input!";
      document.getElementById('salutation').innerHTML = "Invalid input!";
      document.getElementById('sur').innerHTML = "Invalid input!";
      document.getElementById('first').innerHTML = "Invalid input!";
      document.getElementById('middle').innerHTML = "Invalid input!";
      document.getElementById('mid').innerHTML = "Invalid input!";
      document.getElementById('namext').innerHTML = "Invalid input!";
      document.getElementById('bday').innerHTML = "Invalid input!";
      document.getElementById('place').innerHTML = "Invalid input!";
      document.getElementById('sex').innerHTML = "Invalid input!";
      document.getElementById('height').innerHTML = "Invalid input!";
      document.getElementById('weight').innerHTML = "Invalid input!";
      document.getElementById('blood').innerHTML = "Invalid input!";
      document.getElementById('gsis').innerHTML = "Invalid input!";
      document.getElementById('pagibig ').innerHTML = "Invalid input!";
      document.getElementById('philhealth ').innerHTML = "Invalid input!";
      document.getElementById('tin').innerHTML = "Invalid input!";
      document.getElementById('email').innerHTML = "Invalid input!";
      document.getElementById('sss').innerHTML = "Invalid input!";

      employeeform.strEmpID.focus();
      employeeform.strSalutation.focus();
      employeeform.strSurname.focus();
      employeeform.strFirstname.focus();
      employeeform.strMiddlename.focus();
      employeeform.strMidInitial.focus();
      employeeform.strNameExt.focus();
      employeeform.dtmBday.focus();
      employeeform.strBirthPlace.focus();
      employeeform.strSex.focus();
      employeeform.strHeight.focus();
      employeeform.strWeight.focus();
      employeeform.strBloodType.focus();
      employeeform.intGSIS.focus();
      employeeform.intPagibig.focus();
      employeeform.strPhilhealth.focus();
      employeeform.intTin.focus();
      employeeform.strEmail.focus();
      employeeform.intSSS.focus();

      return(false);
      }
}

</script>
