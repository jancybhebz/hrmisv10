<div id="tab_modify" class="tab-pane" style="overflow-x:auto;">
    <form action="#">
        <b>MODIFY EMPLOYEE NUMBER </b><br><br>                 
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <td><b>Enter Employee Number</b></td>
                    <td><input type="text" name="strFromNumber" value="<?=!empty($arrData[0]['empNumber'])?$arrData[0]['empNumber']:''?>" disabled></td>
                    <td><input type="text" name="strToNumber"></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Update</button></a></td>
                </tr>
            </table>
    </form>
</div>