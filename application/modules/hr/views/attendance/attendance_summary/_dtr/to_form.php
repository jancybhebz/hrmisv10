<?=load_plugin('css', array('datetimepicker','timepicker','datepicker'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Travel Order</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?php 
                        $form = $action == 'add' ? '' : 'hr/attendance_summary/dtr/to_edit/'.$this->uri->segment(5).'?id='.$_GET['id'];
                        echo form_open($form, array('method' => 'post', 'id' => 'frmto'))?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Destination <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <input type="text" class="form-control form-required" name="txtdestination"
                                            value="<?=isset($arrempto) ? $arrempto['destination'] : ''?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Date <span class="required"> * </span></label>
                                    <div class="input-group input-daterange">
                                        <input type="text" class="form-control form-required date-picker" data-date-format="yyyy-mm-dd"
                                             name="dtfrom" value="<?=isset($arrempto) ? $arrempto['toDateFrom'] : ''?>">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" class="form-control form-required date-picker" data-date-format="yyyy-mm-dd"
                                             name="dtto" value="<?=isset($arrempto) ? $arrempto['toDateTo'] : ''?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Purpose <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <textarea class="form-control form-required" name="txtpurpose"><?=isset($arrempto) ? $arrempto['purpose'] : ''?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Source of Fund <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="selfund" id="selfund">
                                            <option value="null">-- SELECT FUND SOURCE --</option>
                                            <?php 
                                                foreach(array('Fund 101', 'Fund 102') as $fund):
                                                    $selected = isset($arrempto) ? $fund == $arrempto['fund'] ? 'selected' : '' : '';
                                                    echo '<option value="'.$fund.'" '.$selected.'>'.$fund.'</option>';
                                                endforeach;
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Transportation <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="bs-select form-control form-required" name="seltranspo" id="seltranspo">
                                            <option value="null">-- SELECT TRANSPORTATION --</option>
                                            <?php 
                                                foreach(array('Official Vehicle','Non-agency','Personal') as $transpo):
                                                    $selected = isset($arrempto) ? $transpo == $arrempto['transportation'] ? 'selected' : '' : '';
                                                    echo '<option value="'.$transpo.'" '.$selected.'>'.$transpo.'</option>';
                                                endforeach;
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">Will Claim Perdiem <span class="required"> * </span></label>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="radperdiem" id="optionsRadios25" value="Y"
                                            <?=isset($arrempto) ? $arrempto['perdiem'] == 'Y' ? 'checked' : '' : ''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radperdiem" id="optionsRadios26" value="N"
                                            <?=isset($arrempto) ? $arrempto['perdiem'] == 'N' ? 'checked' : '' : ''?>> No </label>
                                </div>
                            </div>
                            <br><br>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">With Meal <span class="required"> * </span></label>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="radwmeal" id="optionsRadios25" value="Y"
                                            <?=isset($arrempto) ? $arrempto['wmeal'] == 'Y' ? 'checked' : '' : ''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radwmeal" id="optionsRadios26" value="N"
                                            <?=isset($arrempto) ? $arrempto['wmeal'] == 'N' ? 'checked' : '' : ''?>> No </label>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance_summary/dtr/to/').$arrData['empNumber']?>" class="btn blue">
                                        <i class="icon-ban"></i> Cancel</a>
                                </div>
                            </div>
                        </div>

                        </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?=load_plugin('js',array('datetimepicker','timepicker','datepicker'));?>

<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm:ss A',
            disableFocus: true,
            showInputs: false,
            showSeconds: true,
            showMeridian: true,
        });
        $('.date-picker').datepicker();
        $('.date-picker').on('changeDate', function(){
            $(this).datepicker('hide');
        });
    });
</script>