<div class="col-md-12">
	<?=form_open('employee/pds_update/submitProfile', array('method' => 'post', 'id' => 'frmprofile'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Profile">
		<div class="row" id="surname_textbox">
	        <div class="col-sm-8">
	            <div class="form-group">
	              <label class="control-label">Surname : <span class="required"> * </span></label>
	              <input type="text" class="form-control" name="strSname" maxlength="50" value="<?=isset($arrData[0]['surname'])?$arrData[0]['surname']:''?>" autocomplete="off">
	            </div>
	        </div>
	    </div>
		<div class="row" id="firstname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Firstname : <span class="required"> * </span></label>
					<input type="text" class="form-control" name="strFname" maxlength="50" value="<?=isset($arrData[0]['firstname'])?$arrData[0]['firstname']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="midname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Middle Name : <span class="required"> * </span></label>
					<input type="text" class="form-control" name="strMname" maxlength="50" value="<?=isset($arrData[0]['middlename'])?$arrData[0]['middlename']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="extension_textbox">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">Name Extension: <span class="required"> * </span></label>
					<input type="text" class="form-control" name="strExtension" maxlength="10" value="<?=isset($arrData[0]['nameExtension'])?$arrData[0]['nameExtension']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="bdate_textbox">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">Date of Birth : <span class="required"> * </span></label>
					<input class="form-control date-picker" name="dtmBirthdate" id="dtmBirthdate" type="text" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?=isset($arrData[0]['birthday'])?$arrData[0]['birthday']:''?>" >
				</div>
			</div>
		</div>
		<div class="row" id="birthplace_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Place of Birth : <span class="required"> * </span></label>
					<input type="text" class="form-control" name="strBirthplace" maxlength="80" value="<?=isset($arrData[0]['birthPlace'])?$arrData[0]['birthPlace']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="cs_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Civil Status : </label>
					<select name="strCS" id="strCS" type="text" class="form-control bs-select" autocomplete="off" value="<?=isset($arrData[0]['civilStatus'])?$arrData[0]['civilStatus']:''?>">
						<option value="">Please Select</option>
						<?php 
							foreach(array('Single','Married','Separated','Widowed','Annulled','Others') as $cs):
								$select = isset($arrData) ? $arrData[0]['civilStatus'] == $cs ? 'selected' : '' : '';
								echo '<option value="'.$cs.'" '.$select.'>'.$cs.'</option>';
							endforeach;
						 ?>
					</select>
				</div>
			</div>
		</div>
		<hr>

		<div class="row" id="weight_textbox">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">Weight(kg) : </label>
					<input type="text" class="form-control" name="intWeight" maxlength="5" value="<?=isset($arrData[0]['weight'])?$arrData[0]['weight']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="height_textbox">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">Height(m) : </label>
					<input type="text" class="form-control" name="intHeight" maxlength="5" value="<?=isset($arrData[0]['height'])?$arrData[0]['height']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="blood_textbox">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">Blood Type: </label>
					<input type="text" class="form-control" name="strBlood" maxlength="6" value="<?=isset($arrData[0]['bloodType'])?$arrData[0]['bloodType']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="gsis_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">GSIS Policy No. : </label>
					<input type="text" class="form-control" name="intGSIS" maxlength="25" value="<?=isset($arrData[0]['gsisNumber'])?$arrData[0]['gsisNumber']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="bp_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Business Partner No. : </label>
					<input type="text" class="form-control"  name="strBP" maxlength="25" value="<?=isset($arrData[0]['businessPartnerNumber'])?$arrData[0]['businessPartnerNumber']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="pagibig_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">PAG-IBIG ID No. : </label>
					<input type="text" class="form-control"  name="intPagibig" maxlength="14" value="<?=isset($arrData[0]['pagibigNumber'])?$arrData[0]['pagibigNumber']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="philhealth_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">PHILHEALTH No. :  </label>
					<input type="text" class="form-control" name="intPhilhealth" maxlength="14" value="<?=isset($arrData[0]['philHealthNumber'])?$arrData[0]['philHealthNumber']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="tin_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">TIN :  </label>
					<input type="text" class="form-control" name="intTin" maxlength="20" value="<?=isset($arrData[0]['tin'])?$arrData[0]['tin']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>
		<hr>

		<div class="row" id="block1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label"> <b>RESIDENTIAL ADDRESS :</b> <br> House/Block/Lot No. : </label>
					<input type="text" class="form-control" name="strBlk1" maxlength="10" value="<?=isset($arrData[0]['lot1'])?$arrData[0]['lot1']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="street1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Street : </label>
					<input type="text" class="form-control" name="strStreet1" maxlength="50" value="<?=isset($arrData[0]['street1'])?$arrData[0]['street1']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="subd1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Subdivision/Village : </label>
					<input type="text" class="form-control" name="strSubd1" maxlength="50" value="<?=isset($arrData[0]['subdivision1'])?$arrData[0]['subdivision1']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="brgy1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Barangay : </label>
					<input type="text" class="form-control" name="strBrgy1" maxlength="50" value="<?=isset($arrData[0]['barangay1'])?$arrData[0]['barangay1']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="city1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">City/Municipality : </label>
					<input type="text" class="form-control" name="strCity1" maxlength="50" value="<?=isset($arrData[0]['city1'])?$arrData[0]['city1']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="prov1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Province : </label>
					<input type="text" class="form-control" name="strProv1" maxlength="50" value="<?=isset($arrData[0]['province1'])?$arrData[0]['province1']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>   
		<div class="row" id="zip1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Zip Code : </label>
					<input type="text" class="form-control" name="strZipCode1" maxlength="4" value="<?=isset($arrData[0]['zipCode1'])?$arrData[0]['zipCode1']:''?>" autocomplete="off">
				</div>
			</div>
		</div>  
		<div class="row" id="tel1_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Telephone No. : </label>
					<input type="text" class="form-control" name="strTel1" maxlength="20" value="<?=isset($arrData[0]['telephone1'])?$arrData[0]['telephone1']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="block2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label"> <b>PERMANENT ADDRESS :</b> <br> House/Block/Lot No. : </label>
					<input type="text" class="form-control" name="strBlk2" maxlength="10" value="<?=isset($arrData[0]['lot2'])?$arrData[0]['lot2']:''?>"  autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="street2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Street : </label>
					<input type="text" class="form-control" name="strStreet2" maxlength="50" value="<?=isset($arrData[0]['street2'])?$arrData[0]['street2']:''?>"" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="subd2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Subdivision/Village : </label>
					<input type="text" class="form-control" name="strSubd2" maxlength="50" value="<?=isset($arrData[0]['subdivision2'])?$arrData[0]['subdivision2']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="brgy2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Barangay : </label>
					<input type="text" class="form-control" name="strBrgy2" maxlength="50" value="<?=isset($arrData[0]['barangay2'])?$arrData[0]['barangay2']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="city2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">City/Municipality : </label>
					<input type="text" class="form-control" name="strCity2" maxlength="50" value="<?=isset($arrData[0]['city2'])?$arrData[0]['city2']:''?>" autocomplete="off">
				</div>
			</div>
		</div>  
		<div class="row" id="prov2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Province : </label>
					<input type="text" class="form-control" name="strProv2" maxlength="50" value="<?=isset($arrData[0]['province2'])?$arrData[0]['province2']:''?>" autocomplete="off">
				</div>
			</div>
		</div>   
		<div class="row" id="zip2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Zip Code : </label>
					<input type="text" class="form-control" name="strZipCode2" maxlength="4" value="<?=isset($arrData[0]['zipCode2'])?$arrData[0]['zipCode2']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="tel2_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Telephone No.: </label>
					<input type="text" class="form-control" name="intTel2" maxlength="20" value="<?=isset($arrData[0]['telephone2'])?$arrData[0]['telephone2']:''?>" autocomplete="off">
				</div>
			</div>
		</div>  
		<div class="row" id="email_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Email Address (if any) : </label>
					<input type="text" class="form-control" name="strEmail" maxlength="30" value="<?=isset($arrData[0]['email'])?$arrData[0]['email']:''?>" autocomplete="off">
				</div>
			</div>
		</div>    
		<div class="row" id="cp_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Cellphone No. : </label>
					<input type="text" class="form-control" name="strCP" maxlength="15" value="<?=isset($arrData[0]['mobile'])?$arrData[0]['mobile']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row"><div class="col-sm-8"><hr></div></div>
		<div class="row">
		    <div class="col-sm-8">
		        <button type="submit" class="btn btn-success" id="btn-request-profile">
		            <i class="icon-check"></i>
		            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
		        <a href="<?=base_url('employee/pds_update')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
		    </div>
		</div>
	<?=form_close()?>
</div>