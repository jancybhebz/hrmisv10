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
            <span><?=$checkbox ? 'Edit' : 'Add'?> Payroll Group</span>
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
                            <span class="caption-subject bold uppercase"> <?=$checkbox ? 'Edit' : 'Add'?> Payroll Group</span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div class="portlet-body" id="payrollgroup" style="display: none" v-cloak>
                        <div class="table-toolbar">
                            <form action="<?=$checkbox ? base_url('finance/payrollgroup/edit/'.$this->uri->segment(4)) : ''?>" method="post">
                                <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                <div class="form-group" v-bind:class="[errpgproject ? 'has-error' : '']">
                                    <label class="control-label">Project <span class="required"> * </span></label>
                                    <select class="bs-select form-control" name="pg-project" v-model="pgproject">
                                        <option value=""></option>
                                        <?php foreach($projectcode as $code): ?>
                                            <option value="<?=$code['projectCode']?>"><?=$code['projectDesc']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="help-block" v-if="errpgproject">This field is required. </span>
                                </div>
                                <div class="form-group " v-bind:class="[errpgcode ? 'has-error' : '']">
                                    <label class="control-label">Payroll Group Code <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pg-code" v-model="pgcode" <?=$checkbox ? 'disabled' : ''?>>
                                        <span class="help-block" id="errpgcode" v-if="errpgcode"> {{ msgpgcode }} </span>
                                    </div>
                                </div>
                                <div class="form-group " v-bind:class="[errpgdesc ? 'has-error' : '']">
                                    <label class="control-label">Payroll Group Description <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pg-desc" v-model="pgdesc">
                                        <span class="help-block" id="errpgdesc" v-if="errpgdesc"> This field is required. </span>
                                    </div>
                                </div>
                                <div class="form-group " v-bind:class="[errpgorder ? 'has-error' : '']">
                                    <label class="control-label">Payroll Group Order <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pg-order" v-model="pgorder">
                                        <span class="help-block" id="errpgorder" v-if="errpgorder"> This field is required. </span>
                                    </div>
                                </div>
                                <div class="form-group " v-bind:class="[errpgrc ? 'has-error' : '']">
                                    <label class="control-label">Resposibility Center <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pg-rc" v-model="pgrc">
                                        <span class="help-block" id="errpgrc" v-if="errpgrc"> This field is required. </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit" v-bind:class="[error ? 'disabled' : '']" :disabled="error"><i class="fa fa-plus"></i> <?=$checkbox ? 'Edit' : 'Add'?> </button>
                                            <a href="<?=base_url('finance/payrollgroup')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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

<script src="<?=base_url('assets/js/axios/axios.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/vuejs/vue.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/vuejs/vuejs-payrollgroup.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('.portlet-body').show();
    });
</script>