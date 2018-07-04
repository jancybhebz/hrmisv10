<div id="tab_education" class="tab-pane" style="overflow-x:auto;">
    <form action="#">
        <b>EDUCATIONAL INFORMATION:</b><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <th width="10%">Level Code</th>
                    <th width="10%">Name of School</th>
                    <th width="10%">Basic Educ./ Degree/ Course</th>
                    <th width="10%">Period of Attendance [From/To]</th>
                    <th width="10%">Highest Level/ Units Earned</th>
                    <th width="10%">Year Graduated</th>
                    <th width="10%">Scholarship/ Honors Received</th>
                    <th width="10%">Graduate</th>
                    <th width="2%">Licensed</th>
                    <th width="10%">Action</th>
                </tr>
                <?php foreach($arrEduc as $row):?>
                <tr>
                    <td><?=$row['levelCode']?></td>
                    <td><?=$row['schoolName']?></td>
                    <td><?=$row['course']?></td>
                    <td><?=$row['schoolFromDate'].'-'.$row['schoolToDate']?></td>
                    <td><?=$row['units']?></td>
                    <td><?=$row['yearGraduated']?></td>
                    <td><?=$row['ScholarshipCode']?></td>
                    <td><?=$row['graduated']?></td>
                    <td><?=$row['licensed']?></td>
                    <td> 
                        <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
            <a href="<?=base_url('employees/profile/add')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Add</button></a>
    </form>
</div>