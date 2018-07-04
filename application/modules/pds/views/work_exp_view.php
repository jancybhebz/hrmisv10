 <div id="tab_workExp" class="tab-pane">
    <form action="#">
        <b>WORK EXPERIENCE:</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th width="10%">Inclusive Date [From-To]</th>
                    <th width="10%">Position Title</th>
                    <th width="10%">Dept./ Agency/ Office/ Company</th>
                    <th width="10%">Monthly</th>
                    <th width="10%">Salary/  Job Pay Grade</th>
                    <th width="10%">Status of Appointment</th>
                    <th width="10%">Gov. Service (Yes/No)</th>
                    <th width="10%">Action</th>
                </tr>
                <?php foreach($arrService as $row):?>
                <tr>
                    <td><?=$row['serviceFromDate'].'-'.$row['serviceToDate']?></td>
                    <td><?=$row['positionDesc']?></td>
                    <td><?=$row['stationAgency']?></td>
                    <td><?=$row['salary']?></td>
                    <td><?=$row['salaryGrade']?></td>
                    <td><?=$row['appointmentCode']?></td>
                    <td><?=$row['governService']?></td>
                    <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <?php endforeach;?>
            </table>
    </form>
</div>