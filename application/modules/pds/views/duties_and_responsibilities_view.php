 <div id="tab_duties" class="tab-pane">
    <form action="#">
        <b>DUTIES AND RESPONSIBILITIES :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <td colspan="4">EMPLOYEE DUTIES AND RESPONSIBILITIES</td>
                </tr>
                <tr>
                    <td colspan="4">-- Duties & Responsibility of Position --</td>
                </tr>
                <tr>
                    <th>Duties and Responsibilities</th>
                    <th>Percent of Working Time</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>

            </table><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <td colspan="4">-- Duties & Responsibility of Plantilla --</td>
                </tr>
                <tr>
                    <th>Duties and Responsibilities</th>
                    <th>Percent of Working Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrDuties as $row): ?>
                <tr>
                    <td></td><!--  itemDuties -->
                    <td><?=$row['percentWork']?></td>
                    <td colspan="2"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <?php endforeach; ?>
            </table><br><br>
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <td colspan="4">-- Actual Duties & Responsibilities --</td>
                </tr>
                <tr>
                    <th>Duties and Responsibilities</th>
                    <th>Percent of Working Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach($arrDuties as $row): ?>
                <tr>
                    <td><?=$row['duties']?></td>
                    <td><?=$row['percentWork']?></td>
                    <td colspan="2"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <?php endforeach; ?>
            </table><br><br>
    </form>
</div>