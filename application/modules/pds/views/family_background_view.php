<!-- VIEW -->
<form role="form" action="#">
    <ul class="personal-info-employee">
       <b>SPOUSE INFORMATION:</b><br><br>
            <li>Name of Spouse : <?=$arrData['spouseFirstname'].' '.$arrData['spouseMiddlename'].' '.$arrData['spouseSurname']?></li><br>
            <li>Occupation : <?=$arrData['spouseWork']?></li><br>
            <li>Employer/Business Name : : <?=$arrData['spouseBusName']?></li><br>
            <li>Business Address : <?=$arrData['spouseBusAddress']?></li><br>
            <li>Telephone Number : <?=$arrData['spouseTelephone']?></li><br>
            <div class="margin-top-10">
            <a href="javascript:;" class="btn green"> Edit </a>
            </div><br> 
    </ul>
    <ul class="personal-info-employee">
        <b>PARENT INFORMATION:</b><br><br>
            <li>Name of Father : <?=$arrData['fatherFirstname'].' '.$arrData['fatherMiddlename'].' '.$arrData['fatherSurname']?></li><br>
            <li>Name of Mother : <?=$arrData['motherFirstname'].' '.$arrData['motherMiddlename'].' '.$arrData['motherSurname']?></li><br>
            <li>Parents Address : : <?=$arrData['parentAddress']?></li><br>
            <div class="margin-top-10">
            <a href="javascript:;" class="btn green"> Edit </a>
            </div><br> 
    </ul>
        <b>CHILDREN INFORMATION:</b><br><br>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="30%">Name of Children </th>
            <th width="30%">Date of Birth </th>
            <th width="30%">Action </th>
        </tr>
        <?php foreach($arrChild as $row):?>
        <tr>
            <td><?=$row['childName']?></td>
            <td><?=$row['childBirthDate']?></td>
            <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
            <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
        </tr>
        <?php endforeach;?>
        <br>
    </table>
</form>
<!-- EDIT -->

<!-- DELETE -->

