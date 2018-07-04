
<div id="tab_volWork" class="tab-pane">
    <form action="#">
        <b>VOLUNTARY WORKS :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <label>Voluntary Work or Involvement in Civic / Non-Governement / People / Voluntary Organization :</label></br></br>
                    <tr>
                        <th width="10%">Name of Organization</th>
                        <th width="10%">Address of Organization</th>
                        <th width="10%">Inclusive Dates [From-To]</th>
                        <th width="10%">Number of Hours</th>
                        <th width="10%">Position/Nature of work</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php foreach($arrVol as $row):?>
                    <tr>
                        <td><?=$row['vwName']?></td>
                        <td><?=$row['vwAddress']?></td>
                        <td><?=$row['vwDateFrom'].'-'.$row['vwDateTo']?></td>
                        <td><?=$row['vwHours']?></td>
                        <td><?=$row['vwPosition']?></td>
                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                    </tr>
                    <?php endforeach;?>
            </table>
    </form>
</div>
