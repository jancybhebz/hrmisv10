<div id="tab_exam" class="tab-pane">
    <form action="#">
        <label><b>EXAMINATIONS :</b></label><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <label>CAREER SERVICE / RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE :</label><br></br>
                    <tr>
                        <th width="10%">Exam Description</th>
                        <th width="10%">Rating</th>
                        <th width="10%">Date of Examination/ Conferment</th>
                        <th width="10%">Place of Examination/ Conferment</th>
                        <th width="10%">License Number</th>
                        <th width="10%">Date of Validity</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php foreach($arrExam as $row):?>
                    <tr>
                        <td><?=$row['examCode']?></td>
                        <td><?=$row['examRating']?></td>
                        <td><?=$row['examDate']?></td>
                        <td><?=$row['examPlace']?></td>
                        <td><?=$row['licenseNumber']?></td>
                        <td><?=$row['dateRelease']?></td>
                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                    </tr>
                    <?php endforeach;?>
            </table>
    </form>
</div>