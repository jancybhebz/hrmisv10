<div id="tab_training" class="tab-pane">
    <form action="#">
        <b>TRAININGS :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <label>TRAINING PROGRAMS / STUDY / SCHOLARSHIP GRANTS : </label></br></br>
                <tr>
                    <th>Title of Learning & Dev./Training Programs</th>
                    <th>Inclusive Dates of Attendance [From-To]</th>
                    <th>Number of Hours</th>
                    <th>Type of Leadership</th>
                    <th>Conducted/Sponsored By</th>
                    <th>Training Venue</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrTraining as $row):?>
                <tr>
                    <td><?=$row['trainingTitle']?></td>
                    <td><?=$row['trainingStartDate'].'-'.$row['trainingEndDate']?></td>
                    <td><?=$row['trainingHours']?></td>
                    <td><?=$row['trainingTypeofLD']?></td>
                    <td><?=$row['trainingConductedBy']?></td>
                    <td><?=$row['trainingVenue']?></td>
                    <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <?php endforeach;?>
            </table>
    </form>
</div>