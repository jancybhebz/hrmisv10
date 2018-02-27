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
            <span>Deduction</span>
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
    <div class="col-md-3">
        <ul class="ver-inline-menu tabbable margin-bottom-10">
            <li>
                <a href="<?=base_url('Finance/Deductions/index')?>">
                    <i class="fa fa-gear"></i> Deduction </a>
                <span class="after"> </span>
            </li>
            <li class="active">
                <a data-toggle="tab" href="#tab-agency">
                    <i class="fa fa-gear"></i> Agency </a>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div id="tab-agency" class="tab-pane active">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> <?=$edit ? 'Edit' : 'Add'?> Agency</span>
                                </div>
                            </div>
                            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                            <div class="portlet-body" style="display: none;">
                                <form action="<?=$edit ? base_url('Finance/Deductions/edit_agency/'.$this->uri->segment(4)) : ''?>" method="post">
                                    <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group " v-bind:class="[erragencycode ? 'has-error' : '']">
                                                    <label class="control-label">Agency Code <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="agency-code" v-model="agencycode" <?=$edit ? 'disabled' : ''?>>
                                                        <span class="help-block" id="erragencycode" v-if="erragencycode"> {{ msgagencycode }} </span>
                                                    </div>
                                                </div>
                                                <div class="form-group" v-bind:class="[erragencydesc ? 'has-error' : '']">
                                                    <label class="control-label">Agency Description <span class="required"> * </span></label>
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input type="text" class="form-control" name="agency-desc" v-model="agencydesc">
                                                        <span class="help-block" v-if="erragencydesc">This field is required. </span>
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
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-success" type="submit" v-bind:class="[error ? 'disabled' : '']" :disabled="error"><i class="fa fa-plus"></i> <?=$edit ? 'Edit' : 'Add'?> </button>
                                                            <a href="<?=base_url('Finance/Deductions?tab=agency')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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
<script src="<?=base_url('assets/js/vuejs/vuejs-agency.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('.portlet-body').show();
    });
</script>