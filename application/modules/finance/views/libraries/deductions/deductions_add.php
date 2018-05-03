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
            <span><?=$checkbox ? 'Edit' : 'Add'?> Deduction</span>
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
                        <a href="<?=base_url('finance/deductions?tab=agency')?>">
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
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <br>
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span class="caption-subject bold uppercase"> <?=$checkbox ? 'Edit' : 'Add'?> Deduction</span>
                                </div>
                            </div>
                            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                            <div class="portlet-body" style="display: none;">
                                <form action="<?=$checkbox ? base_url('finance/deductions/edit/'.$this->uri->segment(4)) : ''?>" method="post">
                                    <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group" v-bind:class="[erragency ? 'has-error' : '']">
                                                    <label class="control-label">Agency <span class="required"> * </span></label>
                                                    <select class="bs-select form-control" name="deduct-agency" v-model="agency">
                                                        <option value=""></option>
                                                        <?php foreach($agency as $agency): ?>
                                                            <option value="<?=$agency['deductionGroupCode']?>"><?=$agency['deductionGroupDesc']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="help-block" v-if="erragency">This field is required. </span>
                                                </div>
                                                <div class="form-group " v-bind:class="[errdeductcode ? 'has-error' : '']">
                                                    <label class="control-label">Deduction Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="deduct-code" v-model="deductcode" <?=$checkbox ? 'disabled' : ''?>>
                                                        <span class="help-block" id="errdeductcode" v-if="errdeductcode"> {{ msgdeductcode }} </span>
                                                    </div>
                                                </div>
                                                <div class="form-group" v-bind:class="[errdesc ? 'has-error' : '']">
                                                    <label class="control-label">Deduction Description <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="deduct-desc" v-model="desc">
                                                        <span class="help-block" v-if="errdesc">This field is required. </span>
                                                    </div>
                                                </div>
                                                <div class="form-group" v-bind:class="[erracctcode ? 'has-error' : '']">
                                                    <label class="control-label">Account Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="acct-code" v-model="acctcode">
                                                        <span class="help-block" v-if="erracctcode">This field is required. </span>
                                                    </div>
                                                </div>
                                                <div class="form-group" v-bind:class="[errtype ? 'has-error' : '']">
                                                    <label class="control-label">Type <span class="required"> * </span></label>
                                                    <select class="bs-select form-control" name="deduct-type" v-model="type">
                                                        <option value=""></option>
                                                        <?php foreach(deduction_type() as $type): ?>
                                                        <option value="<?=$type?>"><?=$type?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="help-block" v-if="errtype">This field is required. </span>
                                                </div>
                                                <?php if($checkbox): ?>
                                                <div class="form-group">
                                                    <input type="checkbox" name="deduct-isactive" <?=$_GET['stat'] == 1 ? 'checked' : ''?>>Inactive
                                                </div>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-success" type="submit" v-bind:class="[error ? 'disabled' : '']" :disabled="error"><i class="fa fa-plus"></i> <?=$checkbox ? 'Edit' : 'Add'?> </button>
                                                            <a href="<?=base_url('finance/deductions')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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
    <!--end col-md-9-->
</div>
<script src="<?=base_url('assets/js/axios/axios.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/vuejs/vue.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/vuejs/vuejs-deductions.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('.portlet-body').show();
    });
</script>