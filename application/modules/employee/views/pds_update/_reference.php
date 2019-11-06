<div class="col-md-10">
	<br>
	<table class="table table-bordered table-striped" id="table-reference">
		<thead>
			<tr>
				<th style="vertical-align: middle;"> Name of Reference</th>
				<th style="vertical-align: middle;"> Address</th>
				<th style="text-align: center;vertical-align: middle;"> Telephone</th>
				<th style="text-align: center;vertical-align: middle;"> Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($arrReference as $row):?>
			<tr>
				<td> <?=$row['refName']?></td>
				<td> <?=$row['refAddress']?></td>
				<td align="center"> <?=$row['refTelephone']?></td>
				<td align="center">
					<a class="btn green btn-sm" href="<?=base_url('employee/update_pds?ref_id='.$row['ReferenceIndex'])?>"><i class="fa fa-edit"></i> Edit </a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>

<div class="col-md-12">
	<?=form_open('employee/pds_update/submitRef', array('method' => 'post', 'id' => 'frmEduc'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Ref">
		<input class="hidden" name="txtrefid" value="<?=isset($_GET['ref_id']) ? $_GET['ref_id'] : ''?>">
		<div class="row" id="refname_textbox">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Name : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strRefName" value="<?=count($emp_ref)>0?$emp_ref['refName']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refadd_textbox">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Address : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strRefAdd" value="<?=count($emp_ref)>0?$emp_ref['refAddress']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refcontact_textbox">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Contact Number : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="intRefContact" value="<?=count($emp_ref)>0?$emp_ref['refTelephone']:''?>" autocomplete="off">
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
		        <a href="<?=base_url('employee/update_pds')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
		    </div>
		</div>
	<?=form_close()?>
</div>
