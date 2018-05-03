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
            <span><?=$checkbox ? 'Edit' : 'Add'?> Signatory</span>
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
                            <span class="caption-subject bold uppercase"> <?=$checkbox ? 'Edit' : 'Add'?> Signatory</span>
                        </div>
                    </div>
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <div class="portlet-body" id="signatory" style="display: none" v-cloak>
                        <div class="table-toolbar">
                            <form action="<?=$checkbox ? base_url('finance/signatory/edit/'.$this->uri->segment(4)) : ''?>" method="post">
                                <input type="hidden" id='txtcode' value="<?=$this->uri->segment(4)?>" />
                                <div class="form-group" v-bind:class="[errsigpgcode ? 'has-error' : '']">
                                    <label class="control-label">Payroll Group Code <span class="required"> * </span></label>
                                    <select class="bs-select form-control" name="sig-pgcode" v-model="sigpgcode">
                                        <option value=""></option>
                                        <?php foreach($paryollGroup as $code): ?>
                                            <option value="<?=$code['payrollGroupCode']?>"><?=$code['payrollGroupName']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="help-block" id="errsigpgcode" v-if="errsigpgcode"> This field is required. </span>
                                </div>
                                <div class="form-group " v-bind:class="[errsigsignatory ? 'has-error' : '']">
                                    <label class="control-label">Signatory <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="sig-sign" v-model="sigsignatory">
                                        <span class="help-block" id="errsigsignatory" v-if="errsigsignatory"> This field is required. </span>
                                    </div>
                                </div>
                                <div class="form-group " v-bind:class="[errsigposition ? 'has-error' : '']">
                                    <label class="control-label">Position <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="sig-pos" v-model="sigposition">
                                        <span class="help-block" id="errsigposition" v-if="errsigposition"> This field is required. </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit" v-bind:class="[error ? 'disabled' : '']" :disabled="error"><i class="fa fa-plus"></i> <?=$checkbox ? 'Edit' : 'Add'?> </button>
                                            <a href="<?=base_url('finance/signatory')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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
<script src="<?=base_url('assets/js/vuejs/vuejs-signatory.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('.portlet-body').show();
    });
</script>