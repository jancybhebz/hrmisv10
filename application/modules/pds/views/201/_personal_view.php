<?php $arrData = $arrData[0]; ?>
<table class="table table-bordered table-striped" class="table-responsive">
    <tr>
        <th nowrap style="width: 10%;">Date of Birth </th>
        <td style="width: 25%;"><?=$arrData['birthday']?></td>
        <td colspan="2" class="active" align="center"><b>RESIDENTIAL ADDRESS</b></td>  
    </tr>
    <tr>
        <th nowrap>Place of Birth </th>
        <td><?=$arrData['birthPlace']?></td>
        <th nowrap style="width: 15%;">House/Block/Lot No., Street:</th>
        <td style="width: 35%;"><?=$arrData['lot1'].' '.$arrData['street1']?></td>
    </tr>
    <tr>
        <th nowrap>Sex </th>
        <td><?=$arrData['sex']?></td>
        <th nowrap>Subdivision/Village, Barangay </th>
        <td><?=$arrData['subdivision1'].' '.$arrData['barangay1']?></td>
    </tr>
    <tr>
        <th nowrap>Civil Status </th>
        <td><?=$arrData['civilStatus']?></td>
        <th nowrap>City/Municipality, Province </th>
        <td><?=$arrData['city1'].' '.$arrData['province1']?></td>
    </tr>
    <tr>
        <th nowrap>Citizenship </th>
        <td><?=$arrData['citizenship']?></td>
        <th nowrap>Zip Code </th>
        <td><?=$arrData['zipCode1']?></td>
    </tr>
    <tr>
        <th nowrap>Height (m) </th>
        <td><?=$arrData['height']?></td>
        <th nowrap>Telephone No. </th>
        <td><?=$arrData['telephone1']?></td>
    </tr>
    <tr>
        <th nowrap>Weight (kg) </th>
        <td><?=$arrData['weight']?></td>
        <td colspan="2" class="active" align="center"><b>PERMANENT ADDRESS</b></td>
    </tr>
    <tr>
        <th nowrap>Blood Type </th>
        <td><?=$arrData['bloodType']?></td>
        <th nowrap>House/Block/Lot No., Street:</th>
        <td><?=$arrData['lot2'].' '.$arrData['street2']?></td>
    </tr>
    <tr>
        <th nowrap>GSIS Policy No. </th>
        <td><?=$arrData['gsisNumber']?></td>
        <th nowrap>Subdivision/Village, Barangay </th>
        <td><?=$arrData['subdivision2'].' '.$arrData['barangay2']?></td>
    </tr>
    <tr>
        <th nowrap>Pag-ibig ID No. </th>
        <td><?=$arrData['pagibigNumber']?></td>
        <th nowrap>City/Municipality, Province </th>
        <td><?=$arrData['city2'].' '.$arrData['province2']?></td>
    </tr>
    <tr>
        <th nowrap>PHILHEALTH ID No. </th>
        <td><?=$arrData['philHealthNumber']?></td>
        <th nowrap>Zip Code </th>
        <td><?=$arrData['zipCode2']?></td>
    </tr>
    <tr>
        <th nowrap>TIN No. </th>
        <td><?=$arrData['tin']?></td>
        <th nowrap>Telephone No. </th>
        <td><?=$arrData['telephone2']?></td>
    </tr>
    <tr>
        <th nowrap>Email Address </th>
        <td><?=$arrData['email']?></td>
        <th nowrap>Business Partner No.</th>
        <td><?=$arrData['businessPartnerNumber']?></td>
    </tr>
</table>

<?php require 'modal/_personal_info.php';?>