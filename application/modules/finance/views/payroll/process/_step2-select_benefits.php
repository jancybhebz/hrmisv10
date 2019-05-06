<?=form_open('finance/payroll_update/process/compute_benefits', array('class' => 'form-horizontal', 'method' => 'post', 'id' => 'frmcompute'))?>
<div class="tab-content">
    <div class="loading-fade" style="display: none;width: 80%;height: 100%;top: 150px;">
        <center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center>
    </div>
    <div class="tab-pane active" id="tab-payroll">
        <input type="hidden" name="txtprocess" value='<?=json_encode($_POST)?>'>
        <h3 class="block">Select Benefits</h3>
        <div class="portlet-body">
            <!-- Monthly Benefits -->
            <div class="row" id="row-benefit">
                <div class="col-md-11" style="margin-left: 40px;">
                    <label class="checkbox"><input type="checkbox" id="chkall-benefit" value="chkall" <?=isset($_POST['selemployment']) ? strtolower($_POST['selemployment']) == 'p' ? 'checked' : '' : ''?>> Check All </label>
                    <div class="portlet-body" id="div-benefit">
                        <?php foreach($arrBenefit as $benefit): ?>
                            <label class="checkbox col-md-3">
                                <input type="checkbox" class="chkbenefit" name="chkbenefit[]" value="<?=$benefit['incomeCode']?>" <?=isset($_POST['selemployment']) ? strtolower($_POST['selemployment']) == 'p' ? 'checked' : '' : ''?>> <?=ucwords($benefit['incomeDesc'])?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <hr id="row-benefit" />

            <!-- Bonus -->
            <div class="row" id="row-bonus">
                <div class="col-md-11" style="margin-left: 40px;">
                    <label class="checkbox chkall"><input type="checkbox" id="chkall-bonus" value="chkall"> Check All </label>
                    <div class="portlet-body" id="div-bonus">
                        <?php foreach($arrBonus as $bonus): ?>
                            <div class="col-md-3"><label class="checkbox"><input type="checkbox" name="chkbonus[]" value="<?=$bonus['incomeCode']?>"> <?=ucwords($bonus['incomeDesc'])?> </label></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <hr id="row-bonus" />

            <!-- Income -->
            <div class="row" id="row-income">
                <div class="col-md-11" style="margin-left: 40px;">
                    <label class="checkbox chkall"><input type="checkbox" id="chkall-income" value="chkall"> Check All </label>
                    <div class="portlet-body" id="div-income">
                        <?php foreach($arrIncome as $income): ?>
                            <div class="col-md-3"><label class="checkbox"><input type="checkbox" name="chkincome[]" value="<?=$income['incomeCode']?>"> <?=ucwords($income['incomeDesc'])?> </label></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <br><br>

    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="<?=base_url('finance/payroll_update/process/index?appt='.$_POST['selemployment'].'&month='.$_POST['mon'].'&yr='.$_POST['yr'].'&datefrom='.(isset($_POST['datefrom'])?$_POST['datefrom']:'').'&dateto='.(isset($_POST['dateto'])?$_POST['dateto']:''))?>" class="btn default btn-previous">
                <i class="fa fa-angle-left"></i> Back </a>
            <button type="submit" class="btn blue btn-submit" id="btncompute"> Compute </button>
        </div>
    </div>
</div>
<?=form_close()?>

<script>
    $(document).ready(function() {
        $('button#btncompute').on('click', function() {
            $('.loading-fade').show();
        });
        $('#chkall-benefit').click(function() {
            if($(this).prop('checked')){
                $('div#div-benefit > label.checkbox').find('div.checker > span').addClass('checked');
            }else{
                $('div#div-benefit > label.checkbox').find('div.checker > span').removeClass('checked');
            }
        });
        // $('input#chkall-benefit').on('click', function() {
        //     if($(this).is(":checked")){
        //         $('div#div-benefit').find('label.checkbox.col-md-3').find('input.chkbenefit').attr('checked', true);
        //         $('div#div-benefit').find('label.checkbox.col-md-3 > div.checker').addClass('focus');
        //         $('div#div-benefit').find('label.checkbox.col-md-3 > div.checker').find('span').addClass('checked');
        //     }else{
        //         $('div#div-benefit').find('label.checkbox.col-md-3').find('input.chkbenefit').attr('checked', false);
        //         $('div#div-benefit').find('label.checkbox.col-md-3 > div.checker').find('span').removeClass('checked');
        //     }
        // });
    });
</script>