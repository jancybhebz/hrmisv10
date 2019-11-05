<div class="col-md-10">
	<br>
	<table class="table table-bordered table-striped" id="table-children">
		<thead>
			<tr>
				<th style="vertical-align: middle;"> Name of Children</th>
				<th style="text-align: center;vertical-align: middle;"> Date of Birth</th>
				<th style="text-align: center;vertical-align: middle;"> Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($arrChild as $row):?>
			<tr>
				<td> <?=$row['childName']?></td>
				<td align="center"> <?=$row['childBirthDate']?></td>
				<td align="center">
					<a class="btn green btn-sm" href="<?=base_url('employee/update_pds?child_id='.$row['childCode'])?>"><i class="fa fa-edit"></i> Edit </a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>

<div class="col-md-12">
	<?=form_open('employee/pds_update/submitChild', array('method' => 'post', 'id' => 'frmEduc'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Child">
		<input class="hidden" name="txtchildid" value="<?=isset($_GET['child_id']) ? $_GET['child_id'] : ''?>">
		<div class="row" id="traintitle_textbox">
		    <div class="col-sm-10">
		        <div class="form-group">
		        	<label class="control-label">Name of Children : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strChildName" value="<?=count($emp_child)>0?$emp_child['childName']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="startdate_textbox">
		    <div class="col-sm-4">
		        <div class="form-group">
		            <label class="control-label">Date of Birth : </label>
		            <div class="input-icon right">
		            	<input class="form-control date-picker" name="dtmChildBdate" id="dtmChildBdate" type="text" value="<?=count($emp_child)>0?$emp_child['childBirthDate']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		            </div>
		        </div>
		    </div>
		</div>
		<div class="row"><div class="col-sm-8"><hr></div></div>
		<div class="row">
		    <div class="col-sm-8">
		        <button type="submit" class="btn btn-success" id="btn-request-children">
		            <i class="icon-check"></i>
		            <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
		        <a href="<?=base_url('employee/update_pds')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
		    </div>
		</div>
	<?=form_close()?>
</div>
