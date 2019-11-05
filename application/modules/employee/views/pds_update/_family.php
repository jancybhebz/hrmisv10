<div class="col-md-12">
	<?=form_open('employee/pds_update/submitFam', array('method' => 'post', 'id' => 'frmfamily'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Family">
		<div class="row" id="ssurname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label"><b>NAME OF SPOUSE :</b> <br> Surname :  </label>
					<input type="text" class="form-control" name="strSSurname" maxlength="80" value="<?=isset($arrData[0]['spouseSurname'])?$arrData[0]['spouseSurname']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="sfirstname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Firstname :  </label>
					<input type="text" class="form-control" name="strSFirstname" maxlength="80" value="<?=isset($arrData[0]['spouseFirstname'])?$arrData[0]['spouseFirstname']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="smidname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Middlename : </label>
					<input type="text" class="form-control" name="strSMidname" maxlength="80" value="<?=isset($arrData[0]['strSMidname'])?$arrData[0]['strSMidname']:''?>" autocomplete="off">
				</div>
			</div>
		</div> 
		<div class="row" id="spouseExt_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Name Extension : </label>
					<input type="text" class="form-control" name="strSNameExt" maxlength="80" value="<?=isset($arrData[0]['spousenameExtension'])?$arrData[0]['spousenameExtension']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>       
		<div class="row" id="occu_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Occupation  : </label>
					<input type="text" class="form-control" name="strSOccupation" maxlength="50" value="<?=isset($arrData[0]['spouseWork'])?$arrData[0]['spouseWork']:''?>" autocomplete="off">
				</div>
			</div>
		</div>     
		<div class="row" id="busname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Employer/Business Name : </label>
					<input type="text" class="form-control" name="strSBusname" maxlength="70" value="<?=isset($arrData[0]['spouseBusName'])?$arrData[0]['spouseBusName']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>       
		<div class="row" id="busadd_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Business Address : </label>
					<input type="text" class="form-control" name="strSBusadd" value="<?=isset($arrData[0]['spouseBusAddress'])?$arrData[0]['spouseBusAddress']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>       
		<div class="row" id="tel_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Telephone No. :</label>
					<input type="text" class="form-control" name="strSTel" maxlength="10" value="<?=isset($arrData[0]['spouseTelephone'])?$arrData[0]['spouseTelephone']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<hr>
		<div class="row" id="fsurname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label"> <b>NAME OF FATHER :</b> <br> Surname :</label>
					<input type="text" class="form-control" name="strFSurname" maxlength="80" value="<?=isset($arrData[0]['fatherSurname'])?$arrData[0]['fatherSurname']:''?>" autocomplete="off">
				</div>
			</div>
		</div>         
		<div class="row" id="ffirstname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Firstname :</label>
					<input type="text" class="form-control" name="strFFirstname" maxlength="80" value="<?=isset($arrData[0]['fatherFirstname'])?$arrData[0]['fatherFirstname']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="fmidname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Middle name :</label>
					<input type="text" class="form-control" name="strFMidname" maxlength="80" value="<?=isset($arrData[0]['fatherMiddlename'])?$arrData[0]['fatherMiddlename']:''?>"  autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="fextension_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Name Extension :</label>
					<input type="text" class="form-control" name="strFExtension" maxlength="80" value="<?=isset($arrData[0]['fathernameExtension'])?$arrData[0]['fathernameExtension']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<hr>
		<div class="row" id="msurname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label"> <b>NAME OF MOTHER :</b> <br> Surname :</label>
					<input type="text" class="form-control" name="strMSurname" maxlength="80" value="<?=isset($arrData[0]['motherSurname'])?$arrData[0]['motherSurname']:''?>" autocomplete="off">
				</div>
			</div>
		</div>         
		<div class="row" id="mfirstname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Firstname :</label>
					<input type="text" class="form-control" name="strMFirstname" maxlength="80" value="<?=isset($arrData[0]['motherFirstname'])?$arrData[0]['motherFirstname']:''?>" autocomplete="off">
				</div>
			</div>
		</div>       
		<div class="row" id="mmidname_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Middle name :</label>
					<input type="text" class="form-control" name="strMMidname" maxlength="80" value="<?=isset($arrData[0]['motherMiddlename'])?$arrData[0]['motherMiddlename']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row" id="paddress_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Parents Address :</label>
					<input type="text" class="form-control" name="strPaddress" value="<?=isset($arrData[0]['parentAddress'])?$arrData[0]['parentAddress']:''?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row"><div class="col-sm-8"><hr></div></div>
		<div class="row">
		    <div class="col-sm-8">
		        <button type="submit" class="btn btn-success" id="btn-request-family">
		            <i class="icon-check"></i>
		            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
		        <a href="<?=base_url('employee/update_pds')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
		    </div>
		</div>
	<?=form_close()?>
</div>