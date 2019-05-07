<?php load_plugin('css',array('select'));?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Finance Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Libraries</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?=$action?> Deduction</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
	   &nbsp;
	</div>
</div>
<div class="clearfix"></div>
<div class="row profile-account">
    <div class="col-md-12">
        <div class="tab-content portlet light bordered">
            <div class="tabbable tabbable-tabdrop">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab-deduction" data-toggle="tab">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Deductions</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('finance/libraries/deductions?tab=agency')?>">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Agency </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab-deduction" class="tab-pane active" v-cloak>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> <?=$action?> Deduction</span>
                                </div>
                            </div>
                            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                            <div class="portlet-body" style="display: none;">
                                <?=form_open($action == 'edit' ? 'finance/libraries/deductions/edit/'.$this->uri->segment(4) : '', array('method' => 'post'))?>
                                    <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Agency <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips i-required"></i>
                                                        <select class="bs-select form-control form-required" name="selAgency" id="selAgency">
                                                            <option value="null">-- SELECT AGENCY --</option>
                                                            <?php foreach($agency as $agency): ?>
                                                                <option value="<?=$agency['deductionGroupCode']?>"
                                                                    <?=isset($data) ? $agency['deductionGroupCode'] == $data['deductionGroupCode'] ? 'selected' : '' : $agency['deductionGroupCode'] == set_value('selAgency') ? 'selected' : ''?>>
                                                                    <?=$agency['deductionGroupDesc']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group <?=isset($err) ? 'has-error': ''?>">
                                                    <label class="control-label">Deduction Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips <?=isset($err) ? '' : 'i-required'?>" <?=isset($err) ? 'data-original-title="'.$err.'"' : ''?>></i>
                                                        <input type="text" class="form-control form-required" name="txtddcode" id="txtddcode" value="<?=isset($data) ? $data['deductionCode'] : set_value('txtddcode')?>" <?=$action == 'edit' ? 'disabled' : ''?>>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Deduction Description <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips i-required"></i>
                                                        <input type="text" class="form-control form-required" name="txtdesc" id="txtdesc" value="<?=isset($data) ? $data['deductionDesc'] : set_value('txtdesc')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Account Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips i-required"></i>
                                                        <input type="text" class="form-control form-required" name="txtacctcode" id="txtacctcode" value="<?=isset($data) ? $data['deductionAccountCode'] : set_value('txtacctcode')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Type <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips i-required"></i>
                                                        <select class="bs-select form-control form-required" name="seltype" id="seltype">
                                                            <option value="null">-- SELECT TYPE --</option>
                                                            <?php foreach(deduction_type() as $type): ?>
                                                                <option value="<?=$type?>" <?=isset($data) ? $type == $data['deductionType'] ? 'selected' : '' : $type == set_value('seltype') ? 'selected' : ''?>>
                                                                    <?=$type?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php if($action == 'edit'): ?>
                                                <div class="form-group">
                                                    <label><input type="checkbox" name="chkisactive" <?=isset($data) ? $data['hidden'] == 1 ? 'checked' : '' : ''?>>Inactive</label>
                                                </div>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn green" type="submit" id="btn_add_deduction"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                                            <a href="<?=base_url('finance/libraries/deductions')?>"><button class="btn blue" type="button"><i class="icon-ban"></i> Cancel</button></a>
                                                        </div>
                                                    </div>
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
    </div>
</div>
<?php load_plugin('js',array('select','form_validation'));?>