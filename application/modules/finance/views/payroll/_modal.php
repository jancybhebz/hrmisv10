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