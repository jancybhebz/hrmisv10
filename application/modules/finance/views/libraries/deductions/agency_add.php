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
            <span><?=$action?> Agency</span>
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
                    <li>
                        <a href="<?=base_url('finance/deductions')?>">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Deductions</span>
                            </div>
                        </a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#tab-agency">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Agency </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab-agency" class="tab-pane active" v-cloak>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> <?=$action?> Agency</span>
                                </div>
                            </div>
                            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                            <div class="portlet-body" style="display: none;">
                                <form action="<?=$action == 'edit' ? base_url('finance/libraries/agency/edit/'.$this->uri->segment(4)) : base_url('finance/libraries/agency/add')?>" method="post">
                                    <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group <?=isset($err) ? 'has-error': ''?>">
                                                    <label class="control-label">Agency Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips <?=isset($err) ? '' : 'i-required'?>" <?=isset($err) ? 'data-original-title="'.$err.'"' : ''?>></i>
                                                        <input type="text" class="form-control form-required" name="agency-code" id="agency-code" <?=$action == 'edit' ? 'disabled' : ''?>
                                                            value="<?=isset($arrData) ? $arrData['deductionGroupCode'] : set_value('agency-code')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Agency Description <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips i-required"></i>
                                                        <input type="text" class="form-control form-required" name="agency-desc" id="agency-desc"
                                                            value="<?=isset($arrData) ? $arrData['deductionGroupDesc'] : set_value('agency-desc')?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Account Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-warning tooltips i-required"></i>
                                                        <input type="text" class="form-control form-required" name="acct-code" id="acct-code"
                                                            value="<?=isset($arrData) ? $arrData['deductionGroupAccountCode'] : set_value('acct-code')?>">    
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-success" id="btn_add_agency" type="submit"><i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                                            <a href="<?=base_url('finance/libraries/deductions?tab=agency')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php load_plugin('js',array('form_validation'));?>