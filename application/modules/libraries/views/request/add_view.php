<?php load_plugin('css',array('select2','select'));?>
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
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <?=$action?> Request Signatories</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-9">
                        <?php 
                        $form = $action == 'add' ? '' : 'hr/attendance_summary/dtr/local_holiday_edit/'.$this->uri->segment(5).'?id='.$_GET['id'];
                        echo form_open($form, array('method' => 'post', 'id' => 'frmlocalholiday', 'class' => 'form-horizontal'))?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Type of Request <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="request_type" id="request_type">
                                                    <option value="">-- SELECT TYPE OF REQUEST --</option>
                                                    <?php foreach($arrRequestType as $type): ?>
                                                        <option value="<?=$type['requestCode']?>"><?=$type['requestDesc']?></option>
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
                                                    <?php foreach($arrApplicant as $applicant): ?>
                                                        <option value="<?=$applicant['AppliCode']?>"><?=$applicant['Applicant']?></option>
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
                                        <label class="control-label col-md-3">Office Name <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="app_office" id="app_office">
                                                    <option value=""> -- SELECT OFFICE -- </option>
                                                    <?=getGroupOffice()?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">Employee Name <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="select2 form-control form-required" name="app_employee" id="app_employee">
                                                    <option value=""> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data): ?>
                                                        <option value="<?=$data['empNumber']?>"><?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
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
                                        <label class="control-label col-md-3">Action <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig1_action" id="sig1_action">
                                                    <option value=""> -- SELECT ACTION -- </option>
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']!=1):?>
                                                        <option value="<?=$sig_action['ActionCode']?>"><?=$sig_action['ActionDesc']?></option>
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
                                                    <?php foreach($arrSignatory as $signatory): ?>
                                                        <option value="<?=$signatory['SignCode']?>"><?=$signatory['Signatory']?></option>
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
                                                <select class="select2 form-control form-required" name="sig1_officer" id="sig1_officer">
                                                    <option value=""> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data): ?>
                                                        <option value="<?=$data['empNumber']?>"><?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
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
                                        <label class="control-label col-md-3">Action <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig2_action" id="sig2_action">
                                                    <option value=""> -- SELECT ACTION -- </option>
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']!=1):?>
                                                        <option value="<?=$sig_action['ActionCode']?>"><?=$sig_action['ActionDesc']?></option>
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
                                                    <?php foreach($arrSignatory as $signatory): ?>
                                                        <option value="<?=$signatory['SignCode']?>"><?=$signatory['Signatory']?></option>
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
                                                <select class="select2 form-control form-required" name="sig2_officer" id="sig2_officer">
                                                    <option value=""> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data): ?>
                                                        <option value="<?=$data['empNumber']?>"><?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
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
                                        <label class="control-label col-md-3">Action <span class="required"> * </span></label>
                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control form-required" name="sig3_action" id="sig3_action">
                                                    <option value=""> -- SELECT ACTION -- </option>
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']!=1):?>
                                                        <option value="<?=$sig_action['ActionCode']?>"><?=$sig_action['ActionDesc']?></option>
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
                                                    <?php foreach($arrSignatory as $signatory): ?>
                                                        <option value="<?=$signatory['SignCode']?>"><?=$signatory['Signatory']?></option>
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
                                                <select class="select2 form-control form-required" name="sig3_officer" id="sig3_officer">
                                                    <option value=""> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data): ?>
                                                        <option value="<?=$data['empNumber']?>"><?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
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
                                                    <?php foreach($arrAction as $sig_action): if($sig_action['ID']==1):?>
                                                        <option value="<?=$sig_action['ActionCode']?>"><?=$sig_action['ActionDesc']?></option>
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
                                                    <?php foreach($arrSignatory as $signatory): ?>
                                                        <option value="<?=$signatory['SignCode']?>"><?=$signatory['Signatory']?></option>
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
                                                    <option value=""> -- SELECT EMPLOYEE -- </option>
                                                    <?php foreach($arrEmployees as $data): ?>
                                                        <option value="<?=$data['empNumber']?>"><?=getfullname($data['firstname'],$data['surname'],$data['middlename'],$data['middleInitial'],$data['nameExtension'])?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="control-label col-md-3">&nbsp;</label>
                                        <div class="col-md-9">
                                            <button class="btn green" type="submit" id="btn_submit_signature"><i class="fa fa-plus"></i> <?=strtolower($action)=='add'?'Add':'Save'?> </button>
                                            <a href="<?=base_url('libraries/request')?>" class="btn blue"><i class="icon-ban"></i> Cancel</a>
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

<?php load_plugin('js',array('select2','form_validation','select'));?>
<script src="<?=base_url('assets/js/custom/libraries-request_signature.js')?>"></script>

