<?php
switch (strtolower($this->uri->segment(3))) {
       case 'select_deductions_nonperm':
           $form = 'finance/payroll_update/save_computation_nonperm'; break;
       default:
           $form = 'finance/payroll_update/complete_process_perm'; break;
   }   
echo form_open($form, array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'frmdeductions'));?>
<div class="tab-content">
    <div class="tab-pane active" id="tab-payroll">
        <h3 class="block">Select Benefits</h3>
        <input type="text" name="txtprocess" value='<?=$_POST['txtprocess']?>'>
        <div class="row form-body">
            <div class="col-md-4" id="div-loan">
                <div class="portlet light bordered">
                    <div class="portlet-title" style="min-height: 37px !important;">
                     <span class="caption-subject bold"> Loan</span>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox"><input type="checkbox" id="chkall-loan" value="chkall"> Check All </label>
                                <div id="div-loan">
                                    <?php foreach($arrLoan as $loan): ?>
                                        <label class="checkbox col-md-6">
                                            <input type="checkbox" name="chkloan[]" class="chkloan" value="<?=$loan['deductionCode']?>"> <?=ucwords($loan['deductionDesc'])?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3" id="div-cont">
                <div class="portlet light bordered">
                    <div class="portlet-title" style="min-height: 37px !important;">
                        <span class="caption-subject bold"> Contribution</span>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox"><input type="checkbox" id="chkall-cont" value="chkall"> Check All </label>
                                <div id="div-cont">
                                    <?php foreach($arrContrib as $contr): ?>
                                        <label class="checkbox col-md-12">
                                            <input type="checkbox" name="chkcont[]" class="chkcont" value="<?=$contr['deductionCode']?>"> <?=ucwords($contr['deductionDesc'])?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="div-othr">
                <div class="portlet light bordered">
                    <div class="portlet-title" style="min-height: 37px !important;">
                     <span class="caption-subject bold"> Others</span>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox"><input type="checkbox" id="chkall-othr" value="chkall"> Check All </label>
                                <div id="div-othr">
                                    <?php foreach($arrOthers as $othrs): ?>
                                        <label class="checkbox col-md-<?=strlen($othrs['deductionDesc']) > 32 ? 12 : 6?>">
                                            <input type="checkbox" name="chkothrs[]" class="chkothrs" value="<?=$othrs['deductionCode']?>"> <?=ucwords($othrs['deductionDesc'])?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <pre><?php print_r($arrEmployees) ?></pre>
            <textarea id="txtjson" name="txtjson"><?=fixJson($arrEmployees)?></textarea>
            <input type="text" name="chksalary" value='<?=isset($_POST['chksalary']) ? fixJson($_POST['chksalary']) : ''?>'>
            <input type="text" name="chkbenefit" value='<?=isset($_POST['chkbenefit']) ? fixJson($_POST['chkbenefit']) : ''?>'>
            <input type="text" name="chkbonus" value='<?=isset($_POST['chkbonus']) ? fixJson($_POST['chkbonus']) : ''?>'>
            <input type="text" name="chkincome" value='<?=isset($_POST['chkincome']) ? fixJson($_POST['chkincome']) : ''?>'>
            <input type="text" name="working_days" value='<?=isset($curr_period_workingdays) ? $curr_period_workingdays : ''?>'>

            <textarea name="txtjson_computations"><?=isset($_POST['txtjson_computations']) ? fixJson($_POST['txtjson_computations']) : ''?></textarea>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="javascript:;" class="btn default btn-previous">
                <i class="fa fa-angle-left"></i> Back </a>
            <button type="submit" class="btn blue btn-submit"> Process </button>
        </div>
    </div>
</div>
<?=form_close()?>

<script>
    $(document).ready(function() {
        // $('button#btncompute').on('click', function() {
        //     $('.loading-fade').show();
        // });
        // Loan
        $('#chkall-loan').click(function() {
            if($(this).prop('checked')){
                $('div#div-loan > label.checkbox').find('div.checker > span').addClass('checked');
                $('div#div-loan').find('input.chkloan').prop('checked', true);
            }else{
                $('div#div-loan > label.checkbox').find('div.checker > span').removeClass('checked');
                $('div#div-loan').find('input.chkloan').prop('checked', false);
            }
        });
        // Contribution
        $('#chkall-cont').click(function() {
            if($(this).prop('checked')){
                $('div#div-cont > label.checkbox').find('div.checker > span').addClass('checked');
                $('div#div-cont').find('input.chkcont').prop('checked', true);
            }else{
                $('div#div-cont > label.checkbox').find('div.checker > span').removeClass('checked');
                $('div#div-cont').find('input.chkcont').prop('checked', false);
            }
        });
        // others
        $('#chkall-othr').click(function() {
            if($(this).prop('checked')){
                $('div#div-othr > label.checkbox').find('div.checker > span').addClass('checked');
                $('div#div-othr').find('input.chkothrs').prop('checked', true);
            }else{
                $('div#div-othr > label.checkbox').find('div.checker > span').removeClass('checked');
                $('div#div-othr').find('input.chkothrs').prop('checked', false);
            }
        });
    });
</script>