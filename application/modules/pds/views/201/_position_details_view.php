<div class="col-md-12">
    <table class="table table-bordered">
        <tr class="active">
            <th style="line-height: 2;" colspan="4">POSITION DETAILS
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" id="btnedit_information" data-toggle="modal" href="#edit_position_details"> <i class="icon-pencil"></i> Edit Position Details </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <th width="25%" style="text-align: right;">Service Code :</th>
            <td width="25%"><?=$arrPosition[0]['serviceCode']?></td>
            <th width="25%" style="text-align: right;"></th>
            <td width="25%"></td>
        </tr>
        <tr>
            <th style="text-align: right;">First Day Government :</th>
            <td><?=$arrPosition[0]['firstDayGov']?></td>
            <th style="text-align: right;">Salary Effectivity Date :</th>
            <td><?=$arrPosition[0]['effectiveDate']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">First Day Agency :</th>
            <td><?=$arrPosition[0]['firstDayAgency']?></td>
            <th style="text-align: right;">Employment Basis :</th>
            <td><?=$arrPosition[0]['employmentBasis']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Mode of Separation :</th>
            <td><?=$arrPosition[0]['statusOfAppointment']?></td>
            <th style="text-align: right;">Category Service :</th>
            <td><?=$arrPosition[0]['categoryService']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Separation Date :</th>
            <td><?=$arrPosition[0]['contractEndDate']?></td>
            <th style="text-align: right;">Tax Status</th>
            <td><?=$arrPosition[0]['taxStatCode']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Appointment Desc:</th>
            <td><?=$arrPosition[0]['appointmentCode']?></td>
            <th style="text-align: right;">No. of Dependents :</th>
            <td><?=$arrPosition[0]['dependents']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Executive Office :</th>
            <td><?=$arrPosition[0]['officecode']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr>
            <th style="text-align: right;">Service :</th>
            <td><?=$arrPosition[0]['service']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr>
            <th style="text-align: right;">Division :</th>
            <td><?=$arrPosition[0]['divisionCode']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr>
            <th style="text-align: right;">Section :</th>
            <td><?=$arrPosition[0]['sectionCode']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr>
            <th style="text-align: right;">Personnel Action :</th>
            <td><?=$arrPosition[0]['personnelAction']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr>
            <th style="text-align: right;">Place of Assignment :</th>
            <td><?=$arrPosition[0]['assignPlace']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr class="active">
            <th style="line-height: 2;" colspan="4">PAYROLL DETAILS
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" id="btnedit_information" data-toggle="modal" href="#edit_payroll_details"> <i class="icon-pencil"></i> Edit Payroll Details </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <th style="text-align: right;">Payroll Group :</th>
            <td><?=$arrPosition[0]['payrollGroupCode']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr>
            <th style="text-align: right;">Include in DTR? :</th>
            <td><?=$arrPosition[0]['dtrSwitch']?></td>
            <th style="text-align: right;">Include in Payroll? :</th>
            <td><?=$arrPosition[0]['payrollSwitch']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Attendance Scheme :</th>
            <td><?=$arrPosition[0]['schemeCode']?></td>
            <th style="text-align: right;">Hazard Pay Factor :</th>
            <td><?=$arrPosition[0]['hpFactor']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Include in PhilHealth? :</th>
            <td><?=$arrPosition[0]['philhealthSwitch']?></td>
            <th style="text-align: right;">Include in PAGIBIG? :</th>
            <td><?=$arrPosition[0]['pagibigSwitch']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Include in Life & Retirement? :</th>
            <td><?=$arrPosition[0]['lifeRetSwitch']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
        <tr class="active">
            <th style="line-height: 2;" colspan="4">PLANTILLA POSITION DETAILS
                <?php if($this->session->userdata('sessUserLevel') == '1'): ?>
                    <a class="btn green btn-sm pull-right" id="btnedit_information" data-toggle="modal" href="#edit_plantilla_details"> <i class="icon-pencil"></i> Edit Plantilla Position Details </a>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <th style="text-align: right;">Item Number :</th>
            <td><?=$arrPosition[0]['itemNumber']?></td>
            <th style="text-align: right;">Head of the Agency :</th>
            <td><?=count($agencyHead) > 0 ? $agencyHead['agencyHead'] == 1 ? 'Y' : 'N' : ''?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Actual Salary :</th>
            <td><?=$arrPosition[0]['actualSalary']?></td>
            <th style="text-align: right;">Salary Grade :</th>
            <td><?=$arrPosition[0]['salaryGradeNumber']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Authorize Salary :</th>
            <td><?=$arrPosition[0]['authorizeSalary']?></td>
            <th style="text-align: right;">Step Number :</th>
            <td><?=$arrPosition[0]['stepNumber']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Position :</th>
            <td><?=$arrData[0]['positionDesc']?></td>
            <th style="text-align: right;">Date Increment :</th>
            <td><?=$arrPosition[0]['dateIncremented']?></td>
        </tr>
        <tr>
            <th style="text-align: right;">Position Date :</th>
            <td><?=$arrPosition[0]['positionDate']?></td>
            <th style="text-align: right;"></th>
            <td></td>
        </tr>
    </table>
</div>

<?php require 'modal/_position_details_info.php'; ?>