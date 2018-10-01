<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_6">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <button class="btn btn-primary" data-toggle="modal" href="#payrollDetails_modal"> <i class="fa fa-edit"></i> Edit</button>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th class="active bold" colspan=4> Other Dependent of the Family</th>
                                </tr>
                                <tr>
                                    <td><b> Name of Dependent</b></td>
                                    <td><?=$arrTaxDetails['otherDependent']?></td>
                                    <td><b> Date of Birth</b></td>
                                    <td><?=$arrTaxDetails['dBirthDate']?></td>
                                </tr>
                                <tr>
                                    <td><b> Relationship</b></td>
                                    <td><?=$arrTaxDetails['dRelationship']?></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th class="active bold" colspan=4> Previous Employer Information (1)</th>
                                </tr>
                                <tr>
                                    <td><b> TIN Number</b></td>
                                    <td><?=$arrTaxDetails['pTin']?></td>
                                    <td><b> Registered Address</b></td>
                                    <td><?=$arrTaxDetails['pAddress']?></td>
                                </tr>
                                <tr>
                                    <td><b> Employer's Name</b></td>
                                    <td><?=$arrTaxDetails['pEmployer']?></td>
                                    <td><b> Zip Code</b></td>
                                    <td><?=$arrTaxDetails['pZipCode']?></td>
                                </tr>

                                <tr>
                                    <th class="active bold" colspan=4> Previous Employer Information (2)</th>
                                </tr>
                                <tr>
                                    <td><b> TIN Number</b></td>
                                    <td><?=$arrTaxDetails['pTin1']?></td>
                                    <td><b> Registered Address</b></td>
                                    <td><?=$arrTaxDetails['pAddress1']?></td>
                                </tr>
                                <tr>
                                    <td><b> Employer's Name</b></td>
                                    <td><?=$arrTaxDetails['pEmployer1']?></td>
                                    <td><b> Zip Code</b></td>
                                    <td><?=$arrTaxDetails['pZipCode1']?></td>
                                </tr>

                                <tr>
                                    <th class="active bold" colspan=4> Previous Employer Information (3)</th>
                                </tr>
                                <tr>
                                    <td><b> TIN Number</b></td>
                                    <td><?=$arrTaxDetails['pTin2']?></td>
                                    <td><b> Registered Address</b></td>
                                    <td><?=$arrTaxDetails['pAddress2']?></td>
                                </tr>
                                <tr>
                                    <td><b> Employer's Name</b></td>
                                    <td><?=$arrTaxDetails['pEmployer2']?></td>
                                    <td><b> Zip Code</b></td>
                                    <td><?=$arrTaxDetails['pZipCode2']?></td>
                                </tr>

                                <tr>
                                    <th class="active bold" colspan=4> Summary from previous employer</th>
                                </tr>
                                <tr>
                                    <td><b> Taxable Compensation</b></td>
                                    <td><?=number_format($arrTaxDetails['pTaxComp'], 2)?></td>
                                    <td><b> Amount of Taxes withheld    </b></td>
                                    <td><?=number_format($arrTaxDetails['pTaxWheld'], 2)?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('_modal.php'); ?>
