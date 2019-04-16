<?=load_plugin('css', array('attendance-css'))?>
<div id="modal-leave-monetization-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Leave Monetization</h4>
            </div>
            <?=form_open('employee/Leave_monetization/monetized_leave/'.$this->uri->segment(4).'?month='.currmo().'&yr='.curryr(), array('id' => 'frmmonetize'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- begin input elements -->
                                            <input type="text" name="txtperiodmo" value="<?=count($arrLeaves) > 0 ? $arrLeaves[0]['periodMonth'] : ''?>">
                                            <input type="text" name="txtperiodyr" value="<?=count($arrLeaves) > 0 ? $arrLeaves[0]['periodYear'] : ''?>">
                                            <div class="form-group col-md-12" style="padding: 0 !important;">
                                                <label class="control-label col-md-12" style="padding: 0 !important;">Date<span class="required"> * </span></label>
                                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <select class="form-control form-required bs-select" name="txtadjmon" id="txtadjmon" placeholder="">
                                                        <?php foreach (range(1, 12) as $m): ?>
                                                            <option value="<?=sprintf('%02d', $m)?>"
                                                                <?php 
                                                                    if(isset($_GET['month'])):
                                                                        echo $_GET['month'] == $m ? 'selected' : '';
                                                                    else:
                                                                        echo $m == sprintf('%02d', date('n')) ? 'selected' : '';
                                                                    endif;
                                                                 ?> >
                                                                <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="input-icon right col-md-6" style="padding: 0 !important;">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <select class="form-control form-required bs-select" name="txtadjyr" id="txtadjyr" placeholder="">
                                                        <option value="null">SELECT YEAR</option>
                                                        <?php foreach (getYear() as $yr): ?>
                                                            <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                                                <?=$yr?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"># of Leave Credits to be Monetized on Vacation Leave<span class="required"> * </span></label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control form-required" name="txtvl" id="txtvl"
                                                        value="<?=count($arrLeaves) > 0 ? $arrLeaves[0]['vlBalance'] : ''?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"># of Leave Credits to be Monetized on Sick Leave<span class="required"> * </span></label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-warning tooltips i-required"></i>
                                                    <input type="text" class="form-control form-required" name="txtsl" id="txtsl"
                                                        value="<?=count($arrLeaves) > 0 ? $arrLeaves[0]['slBalance'] : ''?>">
                                                </div>
                                            </div>
                                            <!-- end input elements -->
                                        </div>
                                     </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green"><i class="icon-check"> </i> Submit</button>
                    <button type="button" class="btn blue" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<div id="modal-rollback" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Rollback</h4>
            </div>
            <?=form_open('finance/compensation/personnel_profile/actionLongevity/'.$this->uri->segment(5), array('id' => 'frmrollback'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtdel_action" id="txtdel_action">
                            <input type="hidden" name="txtdel_longevityid" id="txtdel_longevityid">
                            <div class="form-group">
                                <label>Are you sure you want to Rollback?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<!-- begin monetize form modal -->
<div id="monetize-form" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title bold">Application for Leave</h4>
            </div>
            <div class="modal-body">
                <div class="row form-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <embed src="<?=base_url('employee/dtr/print_preview/'.$arrData['empNumber'].'?month='.currmo().'&yr='.curryr())?>" frameborder="0" width="100%" height="400px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?=base_url('employee/dtr/print_preview/'.$arrData['empNumber'].'?month='.currmo().'&yr='.curryr())?>" class="btn blue btn-sm" target="_blank"> <i class="glyphicon glyphicon-resize-full"> </i> Open New Tab</a>
                <button type="button" class="btn dark btn-sm" data-dismiss="modal"> <i class="icon-ban"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end monetize form modal -->

<?php load_plugin('js', array('form_validation')) ?>