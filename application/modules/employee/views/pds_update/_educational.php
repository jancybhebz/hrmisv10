<div class="col-md-8">
	<table class="table table-bordered table-striped">
		<tr>
			<th style="text-align: center;vertical-align: middle;" nowrap>Level Code</th>
			<th style="text-align: center;vertical-align: middle;"> Name of School</th>
			<th style="text-align: center;vertical-align: middle;"> Basic Educ./ Degree/ Course</th>
			<th style="text-align: center;vertical-align: middle;"> Period of Attendance [From/To]</th>
			<th style="text-align: center;vertical-align: middle;"> Highest Level/ Units Earned</th>
			<th style="text-align: center;vertical-align: middle;"> Year Graduated</th>
			<th style="text-align: center;vertical-align: middle;"> Scholarship/ Honors Received</th>
			<th style="text-align: center;vertical-align: middle;"> Graduate</th>
			<th style="text-align: center;vertical-align: middle;"> Licensed</th>
			<th style="text-align: center;vertical-align: middle;"> Action</th>
		</tr>
		<?php foreach($arrEduc as $row):?>
		<tr>
			<td align="center"> <?=$row['levelCode']?></td>
			<td> <?=$row['schoolName']?></td>
			<td> <?=$row['course']?></td>
			<td align="center"> <?=$row['schoolFromDate'].'-'.$row['schoolToDate']?></td>
			<td align="center"> <?=$row['units']?></td>
			<td align="center"> <?=$row['schoolToDate']?></td>
			<td> <?=$row['honors']?></td>
			<td align="center"> <?=$row['graduated']?></td>
			<td> <?=$row['licensed']?></td>
			<td> 
				<a class="btn green" data-toggle="modal" href="#educ_modal"> Save </a>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<div class="col-md-12">
	<?=form_open(base_url('employee/pds_update/submitEduc'), array('method' => 'post', 'id' => 'frmEduc'))?>
		<div class="row" id="educlevel_textbox">
			<div class="col-sm-8">
				<div class="form-group">
					<label class="control-label">Level Description :</label>
					<select type="text" class="form-control bs-select" name="strLevelDesc" value="<?=!empty($this->session->userdata('strLevelDesc'))?$this->session->userdata('strLevelDesc'):''?>" required>
						<option value="">Select Level</option>
						<?php foreach($arrEduc_CMB as $educ):
								echo '<option value="'.$educ['levelId'].'">'.$educ['levelDesc'].'</option>';
							  endforeach; ?>
					</select>
				</div>
			</div>
		</div>  
	        <div class="row" id="schoolname_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">School Name :  </label>
	                    <input type="text" class="form-control" name="strSchName" value="<?=isset($arrEduc[0]['strSchName'])?$arrEduc[0]['strSchName']:''?>" autocomplete="off">
	                </div>
	            </div>
	        </div> 
	        <div class="row" id="degree_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">Basic Education/Degree/Course :  </label>
	                    <select type="text" class="form-control" name="strDegree" value="<?=!empty($this->session->userdata('strDegree'))?$this->session->userdata('strDegree'):''?>">
	                             <option value="">Select</option>
	                            <?php foreach($arrCourse as $course)
	                            {
	                              echo '<option value="'.$course['courseCode'].'">'.$course['courseDesc'].'</option>';
	                            }?>
	                    </select>
	                </div>
	            </div>
	        </div> 
	        <div class="row" id="frmyr_textbox">
	            <div class="col-sm-1">
	                <div class="form-group">
	                    <label class="control-label">From Year :</label>
	                   <?php
	                        $already_selected_value = date("Y");
	                        $earliest_year = 1970;

	                        print '<select name="dtmFrmYr" id="dtmFrmYr" class="form-control">';
	                        foreach (range(date('Y'), $earliest_year) as $x) {
	                            print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
	                        }
	                        print '</select>'; ?>
	                </div>
	            </div>
	        </div>       
	         <div class="row" id="yrto_textbox">
	            <div class="col-sm-1">
	                <div class="form-group">
	                    <label class="control-label">To :</label>
	                    <?php
	                        $already_selected_value = date("Y");
	                        $earliest_year = 1970;

	                        print '<select name="dtmTo" id="dtmTo" class="form-control">';
	                        foreach (range(date('Y'), $earliest_year) as $x) {
	                            print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
	                        }
	                        print '</select>'; ?>
	                </div>
	            </div>
	        </div>           
	        <div class="row" id="units_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">Units Earned :  </label>
	                    <input type="text" class="form-control" name="intUnits" value="<?=isset($arrEduc[0]['intUnits'])?$arrEduc[0]['intUnits']:''?>" autocomplete="off"><label>* (write - if not-applicable)</label>
	                </div>
	            </div>
	        </div>       
	         <div class="row" id="scholarship_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">Scholarship :  </label>
	                    <select type="text" class="form-control" name="strScholarship" value="<?=!empty($this->session->userdata('strScholarship'))?$this->session->userdata('strScholarship'):''?>">
	                             <option value="">Select</option>
	                            <?php foreach($arrScholarship as $scholar)
	                            {
	                              echo '<option value="'.$scholar['id'].'">'.$scholar['description'].'</option>';
	                            }?>
	                    </select>
	                </div>
	            </div>
	        </div>    
	         <div class="row" id="honors_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">Honors :  </label>

	                   <input type="text" class="form-control" name="strHonors" value="<?=isset($arrEduc[0]['strHonors'])?$arrEduc[0]['strHonors']:''?>" autocomplete="off">
	                </div>
	            </div>
	        </div>
	          <div class="row" id="licensed_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                     <label class="control-label">Licensed :   </label>
	                    <select type="text" class="form-control" name="strLicensed" value="<?=!empty($this->session->userdata('strLicensed'))?$this->session->userdata('strLicensed'):''?>" required>
	                            <option value="">Select</option>
	                            <option value="Yes">Yes</option>
	                            <option value="No">No</option>
	                    </select>    
	                </div>
	            </div>
	        </div>
	         <div class="row" id="graduated_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">Graudated :   </label>
	                    <select type="text" class="form-control" name="strGraduated" value="<?=!empty($this->session->userdata('strGraduated'))?$this->session->userdata('strGraduated'):''?>" required>
	                            <option value="">Select</option>
	                            <option value="Yes">Yes</option>
	                            <option value="No">No</option>
	                    </select>      
	                </div>
	            </div>
	        </div>      
	        <div class="row" id="yrgraduated_textbox">
	            <div class="col-sm-8">
	                <div class="form-group">
	                    <label class="control-label">Year Graduated :   </label>
	                   <input type="number" class="form-control" name="strYrGraduated" maxlength="4" value="<?=isset($arrEduc[0]['strYrGraduated'])?$arrEduc[0]['strYrGraduated']:''?>" autocomplete="off">
	                </div>
	            </div>
	        </div>

	        <div class="row" id="submitEduc">
	                    <div class="col-sm-8 text-center">
	                        <input class="hidden" name="strStatus" value="Filed Request">
	                        <input class="hidden" name="strCode" value="201 Educ">

	                        <button type="submit" name="submitEduc" id="submitEduc" class="btn btn-success">Submit</button>
	                        <a href="<?=base_url('employee/pds_update')?>"/><button type="reset" class="btn blue">Clear</button></a>
	                    </div>
	        </div>
	        <?=form_close()?>
	</div>
</div>