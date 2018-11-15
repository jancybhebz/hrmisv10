<div id="modal-process" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Choose Deduction Type</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/edit_payrollDetails/'.$this->uri->segment(5), array('id' => 'frmpayrollDetails'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-4" id="div-loan">
                        	<div class="portlet light bordered">
                        	    <div class="portlet-title" style="min-height: 37px !important;">
                        	     <span class="caption-subject bold"> Loan</span>
                        	    </div>
                        	    <div class="portlet-body">
                        	    	<div class="row">
                        	    		<div class="col-md-12">
                        	    			<label class="checkbox chkall"><input type="checkbox" id="chkall-loan" value="chkall"> Check All </label>
                        	    		</div>
                        	    		<?php foreach($arrLoan as $loan): ?>
                        	    		<div class="col-md-6">
                        	    			<label class="checkbox"><input type="checkbox" id="chkloan" value="<?=$loan['deductionCode']?>"> <?=ucwords($loan['deductionDesc'])?> </label>
                        	    		</div>
                        	    		<?php endforeach; ?>
                        	    	</div>
                        	    	<br>
                        	    </div>
                        	</div>
                        </div>
                        <div class="col-md-4" id="div-cont">
                        	<div class="portlet light bordered">
                        	    <div class="portlet-title" style="min-height: 37px !important;">
                        	     <span class="caption-subject bold"> Contribution</span>
                        	    </div>
                        	    <div class="portlet-body">
                        	    	<div class="row">
                        	    		<div class="col-md-12">
                        	    			<label class="checkbox chkall"><input type="checkbox" id="chkall-cont" value="chkall"> Check All </label>
                        	    		</div>
                        	    		<?php foreach($arrContrib as $contr): ?>
                        	    		<div class="col-md-6">
                        	    			<label class="checkbox"><input type="checkbox" id="chkcont" value="<?=$contr['deductionCode']?>"> <?=ucwords($contr['deductionDesc'])?> </label>
                        	    		</div>
                        	    		<?php endforeach; ?>
                        	    	</div>
                        	    	<br>
                        	    </div>
                        	</div>
                        </div>
                        <div class="col-md-4" id="div-othr">
                        	<div class="portlet light bordered">
                        	    <div class="portlet-title" style="min-height: 37px !important;">
                        	     <span class="caption-subject bold"> Others</span>
                        	    </div>
                        	    <div class="portlet-body">
                        	    	<div class="row">
                        	    		<div class="col-md-12">
                        	    			<label class="checkbox chkall"><input type="checkbox" id="chkall-othr" value="chkall"> Check All </label>
                        	    		</div>
                        	    		<?php foreach($arrOthers as $othrs): ?>
                        	    		<div class="col-md-6">
                        	    			<label class="checkbox"><input type="checkbox" id="chkothrs" value="<?=$othrs['deductionCode']?>"> <?=ucwords($othrs['deductionDesc'])?> </label>
                        	    		</div>
                        	    		<?php endforeach; ?>
                        	    	</div>
                        	    	<br>
                        	    </div>
                        	</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green"><i class="icon-check"> </i> Process</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>


<div id="modal-computeBenefits-Monthly" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Choose Deduction Type</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/edit_payrollDetails/'.$this->uri->segment(5), array('id' => 'frmpayrollDetails'))?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Editable Table</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="tblProcessBenefit">
                                        <thead>
                                            <tr>
                                                <th> Employee Name </th>
                                                <th> Salary </th>
                                                <th> Working Days </th>
                                                <th> Actual Days Present </th>
                                                <th> Absences </th>
                                                <th> HP % </th>
                                                <th> HP </th>
                                                <th> 8 hrs </th>
                                                <th> 6 hrs </th>
                                                <th> 5 hrs </th>
                                                <th> 4 hrs </th>
                                                <th> Total per diem </th>
                                                <th> Subsistence </th>
                                                <th> Days w/o Laundry</th>
                                                <th> Laundry </th>
                                                <th> LP </th>
                                                <th> RA % </th>
                                                <th> RA </th>
                                                <th> days w/ vehicle</th>
                                                <th> TA % </th>
                                                <th> TA </th>
                                                <th> Total </th>
                                                <th> Edit </th>
                                                <th> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> alex </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td class="center"> power user </td>
                                                <td>
                                                    <a class="edit" href="javascript:;"> Edit </a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;"> Delete </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green"><i class="icon-check"> </i> Process</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>
