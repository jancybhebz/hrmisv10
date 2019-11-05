<div class="col-md-12">
	<br>
	<table class="table table-bordered table-striped" id="table-examinations">
		<thead>
			<tr>
				<th align="center">Exam Description</th>
                <th align="center">Rating</th>
                <th align="center">Date of Examination/ Conferment</th>
                <th align="center">Place of Examination/ Conferment</th>
                <th align="center">License Number</th>
                <th align="center">Date of Validity</th>
                <th align="center">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($arrExamination  as $row):?>
			<tr>
				<td align="center"> <?=$row['examCode']?> </td>
                <td align="center"> <?=$row['examRating']?> </td>
                <td align="center"> <?=$row['examDate']?> </td>
                <td align="center"> <?=$row['examPlace']?> </td>
                <td align="center"> <?=$row['licenseNumber']?> </td>
                <td align="center"> <?=$row['dateRelease']?> </td>
				<td align="center">
					<a class="btn green btn-sm" href="<?=base_url('employee/update_pds?exam_id='.$row['ExamIndex'])?>"><i class="fa fa-edit"></i> Edit </a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>

<div class="col-md-12">
	<?=form_open('employee/pds_update/submitExam', array('method' => 'post', 'id' => 'frmEduc'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Exam">
		<input class="hidden" name="txtexamid" value="<?=isset($_GET['exam_id']) ? $_GET['exam_id'] : ''?>">
		<div class="row" id="examdesc_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Exam Description :  </label>
					<div class="input-icon right">
						<select type="text" class="form-control select2" name="strExamDesc">
							<option value="0">-- SELECT EXAM --</option>
							<?php foreach($arrExamination_CMB as $exam):
									$select = count($emp_exam)>0 ? $emp_exam['examCode'] == $exam['examCode'] ? 'selected' : '' : '';
									echo '<option value="'.$exam['examCode'].'" '.$select.'>'.$exam['examDesc'].'</option>';
								  endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="rating_textbox">
			<div class="col-sm-2">
				<div class="form-group">
					<label class="control-label">Rating (%):  </label>
					<div class="input-icon right">
						<input type="text" class="form-control" name="strrating" value="<?=count($emp_exam)>0?$emp_exam['examRating']:''?>"  autocomplete="off">
					</div>
				</div>
			</div>
		</div> 
		<div class="row" id="examdate_textbox">
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Date of Exam/Conferment :  </label>
					<div class="input-icon right">
						<input class="form-control date-picker" name="dtmExamDate" id="dtmExamDate" type="text" value="<?=count($emp_exam)>0?$emp_exam['examDate']:''?>" data-date-format="yyyy-mm-dd"  autocomplete="off">
					</div>
				</div>
			</div>
		</div> 
		<div class="row" id="examplace_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Place of Exam/Conferment :  </label>
					<div class="input-icon right">
						<input type="text" class="form-control" name="strPlaceExam" value="<?=count($emp_exam)>0?$emp_exam['examPlace']:''?>"  autocomplete="off">
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="licenseNo_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">License No. (if applicable) : </label>
					<div class="input-icon right">
						<input type="text" class="form-control" name="intLicenseNo" value="<?=count($emp_exam)>0?$emp_exam['licenseNumber']:''?>"  autocomplete="off">
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="release_textbox">
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label">Date of Release :  </label>
					<div class="input-icon right">
						<input class="form-control date-picker" name="dtmRelease" id="dtmRelease" type="text" value="<?=count($emp_exam)>0?$emp_exam['dateRelease']:''?>" data-date-format="yyyy-mm-dd"  autocomplete="off">
					</div>
				</div>
			</div>
		</div> 
		<div class="row"><div class="col-sm-8"><hr></div></div>
		<div class="row">
		    <div class="col-sm-8">
		        <button type="submit" class="btn btn-success" id="btn-request-exam">
		            <i class="icon-check"></i>
		            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
		        <a href="<?=base_url('employee/update_pds')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
		    </div>
		</div>
	<?=form_close()?>
</div>
