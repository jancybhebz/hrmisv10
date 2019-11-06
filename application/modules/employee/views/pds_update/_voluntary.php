<div class="col-md-12">
	<br>
	<table class="table table-bordered table-striped" id="table-voluntary">
		<thead>
			<tr>
				<th style="text-align: center;vertical-align: middle;" colspan="7" class="active">Voluntary Work or Involvement in Civic/Non-Governement/People/Voluntary Organization</th>
			</tr>
			<tr>
				<th style="vertical-align: middle;" rowspan="2"> Name of Organization</th>
				<th style="vertical-align: middle;" rowspan="2"> Address of Organization</th>
				<th style="vertical-align: middle;" colspan="2"> Inclusive Dates</th>
				<th style="vertical-align: middle;" rowspan="2"> Number of Hours</th>
				<th style="vertical-align: middle;" rowspan="2"> Position/Nature of work</th>
				<th style="text-align: center;vertical-align: middle;" rowspan="2"> Action</th>
			</tr>
			<tr>
				<th style="vertical-align: middle;"> From</th>
				<th style="vertical-align: middle;"> To</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($arrVoluntary as $row):?>
			<tr>
				<td> <?=$row['vwName']?></td>
				<td> <?=$row['vwAddress']?></td>
				<td align="center" nowrap> <?=$row['vwDateFrom']?></td>
				<td align="center" nowrap> <?=$row['vwDateTo']?></td>
				<td align="center" nowrap> <?=$row['vwHours']?></td>
				<td> <?=$row['vwPosition']?></td>
				<td align="center">
					<a class="btn green btn-sm" href="<?=base_url('employee/pds_update?vol_id='.$row['VoluntaryIndex'])?>"><i class="fa fa-edit"></i> Edit </a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>

<div class="col-md-12">
	<?=form_open('employee/pds_update/submitVol', array('method' => 'post', 'id' => 'frmvoluntary'))?>
		<input class="hidden" name="strStatus" value="Filed Request">
		<input class="hidden" name="strCode" value="201 Ref">
		<input class="hidden" name="txtvolid" value="<?=isset($_GET['vol_id']) ? $_GET['vol_id'] : ''?>">
		<div class="row" id="refname_textbox">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Name of Organization : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strVolName" value="<?=count($emp_vol)>0?$emp_vol['vwName']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refadd_textbox">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Address : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strVolAdd" value="<?=count($emp_vol)>0?$emp_vol['vwAddress']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refcontact_textbox">
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">Inclusive Date From : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="dtmVolDateFrom" value="<?=count($emp_vol)>0?$emp_vol['vwDateFrom']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refname_textbox">
		    <div class="col-sm-3">
		        <div class="form-group">
		        	<label class="control-label">Inclusive Date To : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control date-picker" name="dtmVolDateTo" value="<?=count($emp_vol)>0?$emp_vol['vwDateTo']:''?>" data-date-format="yyyy-mm-dd" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refname_textbox">
		    <div class="col-sm-4">
		        <div class="form-group">
		        	<label class="control-label">Number of Hours : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="intVolHours" value="<?=count($emp_vol)>0?$emp_vol['vwHours']:''?>" autocomplete="off">
		        	</div>
		        </div>
		    </div>
		</div>
		<div class="row" id="refname_textbox">
		    <div class="col-sm-8">
		        <div class="form-group">
		        	<label class="control-label">Position / Nature of Work : </label>
		        	<div class="input-icon right">
		        		<input type="text" class="form-control" name="strNature" value="<?=count($emp_vol)>0?$emp_vol['vwPosition']:''?>" autocomplete="off">
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
