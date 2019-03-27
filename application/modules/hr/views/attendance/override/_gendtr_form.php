<style type="text/css">
    div#ms-selemps {
        width: 100% !important;
    }
</style>
<?=load_plugin('css', array('datetimepicker','timepicker','datepicker','select2','multi-select'))?>
<div class="tab-pane active" id="tab_1_3">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Generate DTR</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <?=form_open('finance/libraries/deductions/edit/'.$this->uri->segment(4), array('method' => 'post', 'id' => 'frmaddsched'))?>
                        <div class="row">
                            <div class="col-md-5 div-type">
                                <div class="form-group">
                                    <label class="control-label">Select Type <span class="required"> * </span></label>
                                    <select class="bs-select form-control" id="seltype">
                                        <option value="">&nbsp;</option>
                                        <option value="AllEmployees">All Employees</option>
                                        <?php
                                            foreach(range(1, 5) as $grpno):
                                                if($_ENV['Group'.$grpno]!=''):
                                                    echo '<option value="'.str_replace(' ','',$_ENV['Group'.$grpno]).'">Per '.$_ENV['Group'.$grpno].'</option>';
                                                endif;
                                            endforeach;
                                            ?>
                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 div-group">
                                <div class="form-group div-<?=str_replace(' ','',$_ENV['Group1'])?>" <?=$_ENV['Group1']!=''? '' : 'hidden'?>>
                                    <label class="control-label">Select <?=ucfirst($_ENV['Group1'])?> <span class="required"> * </span></label>
                                    <select class="select2 form-control selper" name="selgroup[]">
                                        <option value="">&nbsp;</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group div-<?=str_replace(' ','',$_ENV['Group2'])?>" <?=$_ENV['Group2']!=''? '' : 'hidden'?>>
                                    <label class="control-label">Select <?=ucfirst($_ENV['Group2'])?> <span class="required"> * </span></label>
                                    <select class="select2 form-control selper" name="selgroup[]">
                                        <option value="">&nbsp;</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group div-<?=str_replace(' ','',$_ENV['Group3'])?>" <?=$_ENV['Group3']!=''? '' : 'hidden'?>>
                                    <label class="control-label">Select <?=ucfirst($_ENV['Group3'])?> <span class="required"> * </span></label>
                                    <select class="select2 form-control selper" name="selgroup[]">
                                        <option value="">&nbsp;</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group div-<?=str_replace(' ','',$_ENV['Group4'])?>" <?=$_ENV['Group4']!=''? '' : 'hidden'?>>
                                    <label class="control-label">Select <?=ucfirst($_ENV['Group4'])?> <span class="required"> * </span></label>
                                    <select class="select2 form-control selper" name="selgroup[]">
                                        <option value="">&nbsp;</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group div-<?=str_replace(' ','',$_ENV['Group5'])?>" <?=$_ENV['Group5']!=''? '' : 'hidden'?>>
                                    <label class="control-label">Select <?=ucfirst($_ENV['Group5'])?> <span class="required"> * </span></label>
                                    <select class="select2 form-control selper" name="selgroup[]">
                                        <option value="">&nbsp;</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5 div-apptstatus">
                                <div class="form-group">
                                    <label class="control-label">Appointment Status <span class="required"> * </span></label>
                                    <select class="select2 form-control">
                                        <option>All Employees</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Month <span class="required"> * </span></label>
                                    <select class="form-control form-required bs-select" name="selinc_month" id="selinc_month" placeholder="">
                                        <option value="null">Month</option>
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=$m?>"><?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Year <span class="required"> * </span></label>
                                    <select class="form-control form-required bs-select" name="selinc_yr" id="selinc_yr" placeholder="">
                                        <option value="null">Year</option>
                                        <?php foreach (getYear() as $yr): ?>
                                            <option value="<?=$yr?>"><?=$yr?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="control-label">Date From <span class="required"> * </span></label>
                                    <select multiple="multiple" class="multi-select form-control" id="selemps" name="my_multi_select2[]">
                                        <optgroup label="NFC EAST">
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option>Philadelphia Eagles</option>
                                            <option>Washington Redskins</option>
                                        </optgroup>
                                        <optgroup label="NFC NORTH">
                                            <option>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                        </optgroup>
                                        <optgroup label="NFC SOUTH">
                                            <option>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                        </optgroup>
                                        <optgroup label="NFC WEST">
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-actions">
                                    <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                    <a href="<?=base_url('hr/attendance/override/generate_dtr')?>" class="btn blue">
                                        <i class="icon-ban"></i> Cancel</a>
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

<?=load_plugin('js',array('datetimepicker','timepicker','datepicker','select2','multi-select'));?>


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
        $('#selemps').multiSelect({});
        $('.selper').select2({
            placeholder: "",
            allowClear: true
        });

        // hide all the group
        $(".div-group,.div-<?=str_replace(' ','',$_ENV['Group1'])?>,.div-<?=str_replace(' ','',$_ENV['Group2'])?>,.div-<?=str_replace(' ','',$_ENV['Group3'])?>,.div-<?=str_replace(' ','',$_ENV['Group4'])?>,.div-<?=str_replace(' ','',$_ENV['Group5'])?>").hide();

        $('#seltype').change(function() {
            strgrp = $(this).val();
            $(".div-group").hide();
            $(".div-<?=str_replace(' ','',$_ENV['Group1'])?>").hide();
            $(".div-<?=str_replace(' ','',$_ENV['Group2'])?>").hide();
            $(".div-<?=str_replace(' ','',$_ENV['Group3'])?>").hide();
            $(".div-<?=str_replace(' ','',$_ENV['Group4'])?>").hide();
            $(".div-<?=str_replace(' ','',$_ENV['Group5'])?>").hide();

            // begin if select type is not empty
            if(strgrp != ''){
                // begin checking group
                if(strgrp != 'AllEmployees' && strgrp != ''){
                    $('.div-type,.div-apptstatus').removeClass('col-md-5').addClass('col-md-4');

                    $(".div-group").show();
                    $(".div-"+strgrp).show();
                }else{
                    $('.div-type,.div-apptstatus').removeClass('col-md-4').addClass('col-md-5');
                }
                // end checking group
            }
            // end if select type is not empty
        });
        
    });
</script>