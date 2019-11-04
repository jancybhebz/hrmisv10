<div class="col-md-12">
	<br>
	<table class="table table-bordered table-striped" id="table-trainings">
		<thead>
			<tr>
				<th style="text-align: center;vertical-align: middle;" nowrap> Title of Learning & <br> Dev./Training Programs</th>
				<th style="text-align: center;vertical-align: middle;"> Inclusive Dates of Attendance [From-To]</th>
				<th style="text-align: center;vertical-align: middle;"> Number of Hours</th>
				<th style="text-align: center;vertical-align: middle;"> Type of Leadership</th>
				<th style="text-align: center;vertical-align: middle;"> Conducted/Sponsored By</th>
				<th style="text-align: center;vertical-align: middle;"> Training Venue</th>
				<th style="text-align: center;vertical-align: middle;"> Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($arrTraining as $row):?>
			<tr>
				<td align="center"> <?=$row['trainingTitle']?></td>
				<td> <?=$row['trainingStartDate']?></td>
				<td> <?=$row['trainingHours']?></td>
				<td align="center"> <?=$row['trainingTypeofLD']?></td>
				<td align="center"> <?=$row['trainingConductedBy']?></td>
				<td align="center"> <?=$row['trainingVenue']?></td>
				<td>
					<a class="btn green btn-sm" href="<?=base_url('employee/update_pds?tra_id='.$row['TrainingIndex'])?>"><i class="fa fa-edit"></i> Edit </a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>

<div class="col-md-12">
	<?=form_open('employee/pds_update/submitTraining', array('method' => 'post', 'id' => 'frmEduc'))?>
	<?=form_close()?>
</div>
