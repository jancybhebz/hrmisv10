<?php 
load_plugin('css',array('select2','select'));
$app_type = isset($request_flow) ? explode(';',$request_flow['Applicant']) : array();
$signatory1 = isset($request_flow) ? explode(';',$request_flow['Signatory1']) : array();
$signatory2 = isset($request_flow) ? explode(';',$request_flow['Signatory2']) : array();
$signatory3 = isset($request_flow) ? explode(';',$request_flow['Signatory3']) : array();
$SignatoryFin = isset($request_flow) ? explode(';',$request_flow['SignatoryFin']) : array();?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('libraries')?>">Libraries</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Add Request Signatories</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Request Signatories</span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="visibility: hidden;">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-9">
                        <?php 
                        $form = $action == 'add' ? '' : 'libraries/request/edit/'.$this->uri->segment(4);
                        echo form_open($form, array('method' => 'post', 'id' => 'frmlocalholiday', 'class' => 'form-horizontal'))?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Type of Request <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="request_type[]" id="request_type" multiple>
                                                    <?php foreach($arrRequestType as $type):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                foreach(explode(';',$request_flow['RequestType']) as $rtype):
                                                                    if($type['requestCode'] == $rtype) { $selected = 'selected'; }
                                                                endforeach;
                                                            endif;?>
                                                            <option value="<?=$type['requestCode']?>" <?=$selected?>><?=$type['requestDesc']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3"><b>APPLICANT</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Type <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="app_type" id="app_type">
                                                    <option value=""> -- SELECT TYPE OF APPLICANT -- </option>
                                                    <?php foreach($arrApplicant as $applicant):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $app_type[0] == $applicant['AppliCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$applicant['AppliCode']?>" <?=$selected?>><?=$applicant['Applicant']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Office Name </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="app_office" id="app_office">
                                                    <option value=""> -- SELECT OFFICE -- </option>
                                                    <?=getGroupOffice(isset($request_flow) ? $app_type[1] : '')?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Employee Name </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="app_employee" id="app_employee">
                                                    <option value=""> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $app_type[2] == $data['empNumber'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$data['empNumber']?>" <?=$selected?>>
                                                            <?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3"><b>First Signatory</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Action </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig1_action" id="sig1_action">
                                                    <option value=""> -- SELECT ACTION -- </option>
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']!=1):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory1[0] == $sig_action['ActionCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$sig_action['ActionCode']?>" <?=$selected?>><?=$sig_action['ActionDesc']?></option>
                                                    <?php endif; endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Signatory </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig1_signatory" id="sig1_signatory">
                                                    <option value=""> -- SELECT SIGNATORY -- </option>
                                                    <?php foreach($arrSignatory as $signatory):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory1[1] == $signatory['SignCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$signatory['SignCode']?>" <?=$selected?>><?=$signatory['Signatory']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Officer </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="sig1_officer" id="sig1_officer">
                                                    <option value="0"> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory1[2] == $data['empNumber'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$data['empNumber']?>" <?=$selected?>>
                                                            <?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3"><b>Second Signatory</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Action </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig2_action" id="sig2_action">
                                                    <option value=""> -- SELECT ACTION -- </option>
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']!=1):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory2[0] == $sig_action['ActionCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$sig_action['ActionCode']?>" <?=$selected?>><?=$sig_action['ActionDesc']?></option>
                                                    <?php endif; endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Signatory </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig2_signatory" id="sig2_signatory">
                                                    <option value=""> -- SELECT SIGNATORY -- </option>
                                                    <?php foreach($arrSignatory as $signatory):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory2[1] == $signatory['SignCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$signatory['SignCode']?>" <?=$selected?>><?=$signatory['Signatory']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Officer </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="sig2_officer" id="sig2_officer">
                                                    <option value="0"> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory2[2] == $data['empNumber'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$data['empNumber']?>" <?=$selected?>>
                                                            <?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3"><b>Third Signatory</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Action </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig3_action" id="sig3_action">
                                                    <option value=""> -- SELECT ACTION -- </option>
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']!=1):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory3[0] == $sig_action['ActionCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$sig_action['ActionCode']?>" <?=$selected?>><?=$sig_action['ActionDesc']?></option>
                                                    <?php endif; endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Signatory </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig3_signatory" id="sig3_signatory">
                                                    <option value=""> -- SELECT SIGNATORY -- </option>
                                                    <?php foreach($arrSignatory as $signatory):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory3[1] == $signatory['SignCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$signatory['SignCode']?>" <?=$selected?>><?=$signatory['Signatory']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Officer </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="sig3_officer" id="sig3_officer">
                                                    <option value="0"> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $signatory3[2] == $data['empNumber'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$data['empNumber']?>" <?=$selected?>>
                                                            <?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3"><b>Final Signatory</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Action <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sigfinal_action" id="sigfinal_action">
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']==1):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $SignatoryFin[0] == $sig_action['ActionCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$sig_action['ActionCode']?>" <?=$selected?>><?=$sig_action['ActionDesc']?></option>
                                                    <?php endif; endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Signatory </label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sigfinal_signatory" id="sigfinal_signatory">
                                                    <option value=""> -- SELECT SIGNATORY -- </option>
                                                    <?php foreach($arrSignatory as $signatory):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $SignatoryFin[1] == $signatory['SignCode'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$signatory['SignCode']?>" <?=$selected?>><?=$signatory['Signatory']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Officer <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="sigfinal_officer" id="sigfinal_officer">
                                                    <option value="0"> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data):
                                                            $selected = '';
                                                            if(isset($request_flow)):
                                                                $selected = $SignatoryFin[2] == $data['empNumber'] ? 'selected' : '';
                                                            endif;?>
                                                            <option value="<?=$data['empNumber']?>" <?=$selected?>>
                                                            <?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"><div class="col-sm-12"><hr></div></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-md-3">&nbsp;</label>
                                    <button type="submit" class="btn btn-success" id="btn_submit_signature">
                                        <i class="icon-check"></i>
                                        <?=$this->uri->segment(3) == 'edit' ? 'Save' : 'Submit'?></button>
                                    <a href="<?=base_url('libraries/request')?>" class="btn blue"> <i class="icon-ban"></i> Cancel</a>
                                </div>
                            </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php load_plugin('js',array('select2','form_validation','select'));?>
<script src="<?=base_url('assets/js/custom/libraries-request_signature.js')?>"></script>

