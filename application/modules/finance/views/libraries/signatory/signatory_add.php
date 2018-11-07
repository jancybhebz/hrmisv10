<?php load_plugin('css',array('select2'));?>
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
            <span><?=ucfirst($action)?> Signatory</span>
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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> <?=$action?> Signatory</span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div class="portlet-body" id="signatory" style="display: none" v-cloak>
                        <div class="table-toolbar">
                            <?=form_open($action == 'edit' ? 'finance/libraries/signatory/edit/'.$this->uri->segment(4) : '', array('method' => 'post'))?>
                                <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                <div class="form-group">
                                    <label class="control-label">Payroll Group Code <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <select class="select2 form-control form-required" name="txtpgcode">
                                            <option value="null">-- SELECT PAYROLL GROUP CODE --</option>
                                            <?php foreach($paryollGroup as $code): ?>
                                                <option value="<?=$code['payrollGroupCode']?>"
                                                    <?=isset($data) ? $code['payrollGroupCode'] == $data['payrollGroupCode'] ? 'selected' : '' : ''?>><?=$code['payrollGroupName']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Signatory <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <input type="text" class="form-control form-required" name="txtsignatory"
                                            value="<?=isset($data) ? $data['signatory'] : set_value('txtsignatory')?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Position <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa fa-warning tooltips i-required"></i>
                                        <input type="text" class="form-control form-required" name="txtposition"
                                            value="<?=isset($data) ? $data['signatoryPosition'] : set_value('txtposition')?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn green" type="submit" v-bind:class="[error ? 'disabled' : '']" :disabled="error">
                                                <i class="fa fa-plus"></i> <?=ucfirst($action)?> </button>
                                            <a href="<?=base_url('finance/libraries/signatory')?>"><button class="btn blue" type="button">
                                                <i class="icon-ban"></i> Cancel</button></a>
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
<?php load_plugin('js',array('select2','form_validation'));?>