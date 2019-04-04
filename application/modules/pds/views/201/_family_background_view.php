<?=load_plugin('css', array('datepicker','timepicker'));$arrData = $arrData[0];?>

<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">Spouse Information
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" data-toggle="modal" href="#editSpouse_modal"> <i class="icon-pencil"></i> Edit </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <th>Name of Spouse</th>
            <td><?=$arrData['spouseFirstname'].' '.$arrData['spouseMiddlename'].' '.$arrData['spouseSurname']?></td>
            <th>Occupation</th>
            <td><?=$arrData['spouseWork']?></td>
        </tr>
        <tr>
            <th>Employer/Business Name</th>
            <td><?=$arrData['spouseBusName']?></td>
            <th>Telephone Number</th>
            <td><?=$arrData['spouseTelephone']?></td>
        </tr>
        <tr>
            <th>Business Address</th>
            <td colspan="3"><?=$arrData['spouseBusAddress']?></td>
        </tr>
    </table>
</div>

<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">Parent's Information
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" data-toggle="modal" href="#editParent_modal"> <i class="icon-pencil"></i> Edit </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <th nowrap>Name of Father</th>
            <td width="35%"><?=$arrData['fatherFirstname'].' '.$arrData['fatherMiddlename'].' '.$arrData['fatherSurname'] .' '.$arrData['fathernameExtension']?></td>
            <th nowrap>Name of Mother</th>
            <td width="35%"><?=$arrData['motherFirstname'].' '.$arrData['motherMiddlename'].' '.$arrData['motherSurname']?></td>
        </tr>
        <tr>
            <th nowrap>Parents Address</th>
            <td colspan="3"><?=$arrData['parentAddress']?></td>
        </tr>
    </table>
</div>

<div class="col-md-12">
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="active">
                <th style="line-height: 2;" colspan="4">Children Information
                    <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                        <a class="btn green btn-sm pull-right" data-toggle="modal" href="#editParent_modal"> <i class="fa fa-plus"></i> Add Child </a>
                    <?php endif; ?>
                </th>
            </tr>
            <tr>
                <th>Name of Children</th>
                <th>Date of Birth</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrChild as $row):?>
                <tr></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>