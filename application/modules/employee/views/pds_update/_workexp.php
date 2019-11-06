<div class="col-md-12">
	<br>
	<table class="table table-bordered table-striped" id="table-workxp">
		<thead>
			<tr>
				<th style="text-align: center;vertical-align: middle;" colspan="9" class="active">WORK EXPERIENCE (Include private employment)</th>
			</tr>
			<tr>
				<th style="vertical-align: middle;" colspan="2"> Inclusive Dates</th>
				<th style="vertical-align: middle;" rowspan="2"> Position Title</th>
				<th style="vertical-align: middle;" rowspan="2"> Department / Agency / Office</th>
				<th style="vertical-align: middle;" rowspan="2"> Monthly</th>
				<th style="vertical-align: middle;" rowspan="2"> Salary/Job <br>Pay Grade</th>
				<th style="vertical-align: middle;" rowspan="2"> Status of Appointment</th>
				<th style="vertical-align: middle;" rowspan="2"> Gov. Service <br>(Yes/No)</th>
				<th style="text-align: center;vertical-align: middle;" rowspan="2"> Action</th>
			</tr>
			<tr>
				<th style="vertical-align: middle;"> From</th>
				<th style="vertical-align: middle;"> To</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($arrExperience as $row):?>
			<tr>
				<td align="center" nowrap> <?=$row['serviceFromDate']?></td>
				<td align="center" nowrap> <?=$row['serviceToDate']?></td>
				<td> <?=$row['positionDesc']?></td>
				<td> <?=$row['stationAgency']?></td>
				<td align="center" nowrap> <?=$row['salary']?></td>
				<td align="center" nowrap> <?=$row['salaryGrade']?></td>
				<td align="center" nowrap> <?=$row['appointmentCode']?></td>
				<td align="center" nowrap> <?=$row['governService']?></td>
				<td align="center">
					<a class="btn green btn-sm" href="<?=base_url('employee/pds_update?wxp_id='.$row['serviceRecID'])?>"><i class="fa fa-edit"></i> Edit </a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>

<div class="col-md-12">
	<?=form_open('employee/pds_update/submitWorkExp', array('method' => 'post', 'id' => 'frmworkxp'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Ref">
		<input class="hidden" name="txtwxpid" value="<?=isset($_GET['wxp_id']) ? $_GET['wxp_id'] : ''?>">
		<div class="row">
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">Inclusive Date From : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="dtmExpDateFrom" value="<?=count($emp_wxp)>0?$emp_wxp['serviceFromDate']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">Inclusive Date To : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="dtmExpDateTo" value="<?=count($emp_wxp)>0?$emp_wxp['serviceToDate']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">&nbsp;</label>
		        	<div class="input-icon">
		        		<label><input type="checkbox" name="chkpresent"> Present </label>
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Position Title : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="strPosTitle" value="<?=count($emp_wxp)>0?$emp_wxp['positionDesc']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Department/Agency/Office : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="dtmVolDateTo" value="<?=count($emp_wxp)>0?$emp_wxp['stationAgency']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-4">
		        <div class="form-group">
		        	<label class="control-label">Salary : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strSalary" value="<?=count($emp_wxp)>0?$emp_wxp['salary']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		    <div class="col-sm-2">
		        <div class="form-group">
		        	<label class="control-label">&nbsp;</label>
		        	<div class="input-icon">
		        		<select name="strExpPer" id="strExpPer" type="text" class="form-control bs-select" autocomplete="off">
		        			<option value="0">--</option>
							<?php 
								foreach(array('Hour','Day','Month','Quarter','Year') as $pos):
									$select = isset($emp_wxp) ? $emp_wxp['salaryPer'] == $pos ? 'selected' : '' : '';
									echo '<option value="'.$pos.'" '.$select.'>PER '.$pos.'</option>';
								endforeach;
							 ?>
						</select>
		        	</div>
		        </div>
		    </div>
		    <div class="col-sm-2">
		        <div class="form-group">
		        	<label class="control-label">Currency : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="intVolHours" value="<?=count($emp_wxp)>0?$emp_wxp['currency']:''?>" autocomplete="off">
		        	</div>
		        	<span class="help-block small">(leave blank if PHP) /   (ex. USD for US dollars)</span>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Salary Grade & Step Incremet (Format "00-0") :  </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strExpSG" value="<?=count($emp_wxp)>0?$emp_wxp['salaryGrade']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-8">
		        <div class="form-group">
		            <label class="control-label">Status of Appointment :</label>
		            <select class="form-control select2" name="strAStatus">
		            	<option value="0">-- SELECT STATUS --</option>
		                    <?php 
								foreach($arrAppointment as $appoint):
									$select = isset($emp_wxp) ? $emp_wxp['appointmentCode'] == $appoint['appointmentCode'] ? 'selected' : '' : '';
									echo '<option value="'.$appoint['appointmentCode'].'" '.$select.'>'.$appoint['appointmentDesc'].'</option>';
								endforeach;
							 ?>
		            </select>
		        </div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-12">
			   	<div class="form-group">
			       	<label>Government Service : </label>
			       	<div class="radio-list">
			        	  	<label class="radio-inline">
			        	      	<input type="radio" name="strGovn" value="Y" <?=count($emp_wxp) > 0 ? $emp_wxp['governService']=='Yes' ? 'checked' : '' : ''?>> Yes </label>
			        	  	<label class="radio-inline">
			        	      	<input type="radio" name="strGovn" value="N" <?=count($emp_wxp) > 0 ? $emp_wxp['governService']!='Yes' ? 'checked' : '' : 'checked'?>> No </label>
			       	</div>
			   	</div>
			</div>
		</div>
		<div class="row">
		    <div class="col-sm-8">
		        <div class="form-group">
		            <label class="control-label">Branch :</label>
		            <select class="form-control bs-select" name="strBranch">
		            	<option value="0">-- SELECT BRANCH --</option>
		                    <?php 
								foreach(array('Government Corp','National','FGI') as $branch):
									$select = isset($emp_wxp) ? $emp_wxp['branch'] == $branch ? 'selected' : '' : '';
									echo '<option value="'.$branch.'" '.$select.'>'.$branch.'</option>';
								endforeach;
							 ?>
		            </select>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-8">
		        <div class="form-group">
		            <label class="control-label">Separation Cause :</label>
		            <select class="form-control bs-select" name="strSepCause">
		            	<option value="0">-- SELECT SEPARATION CAUSE --</option>
		                    <?php 
								foreach($arrSeparation as $separation):
									$select = isset($emp_wxp) ? $emp_wxp['serviceRecID'] == $separation['serviceRecID'] ? 'selected' : '' : '';
									echo '<option value="'.$separation['serviceRecID'].'" '.$select.'>'.$separation['separationCause'].'</option>';
								endforeach;
							 ?>
		            </select>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">Separation Date :</label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="strSepDate" value="<?=count($emp_wxp)>0?$emp_wxp['separationDate']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">L/V ABS W/O PAY :</label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strLV" value="<?=count($emp_wxp)>0?$emp_wxp['lwop']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row"><div class="col-sm-8"><hr></div></div>
		<div class="row">
		    <div class="col-sm-8">
		        <button type="submit" class="btn btn-success" id="btn-request-ref">
		            <i class="icon-check"></i>
		            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
		        <a href="<?=base_url('employee/pds_update')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
		    </div>
		</div>
	<?=form_close()?>
</div>
