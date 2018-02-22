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
            <li class="active">
                <a data-toggle="tab" href="#tab-deduction">
                    <i class="fa fa-graduation-cap"></i> Deduction </a>
                <span class="after"> </span>
            </li>
            <li>
                <a data-toggle="tab" href="#tab-agency">
                    <i class="fa fa-flag"></i> Agency </a>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div id="tab-deduction" class="tab-pane active" v-cloak>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> <?=$checkbox ? 'Edit' : 'Add'?> Deduction</span>
                                </div>
                            </div>
                            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>" width="500px"></center></div>
                            <div class="portlet-body" style="display: none;">
                                <form action="<?=$checkbox ? base_url('Finance/deductions/edit/'.$this->uri->segment(4)) : ''?>" method="post">
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
                                                    <label><input type="radio" name="deduct-isactive" value="0" v-model="ishidden"> Active</label>
                                                    &nbsp;
                                                    <label><input type="radio" name="deduct-isactive" value="1" v-model="ishidden"> Inactive</label>
                                                </div>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-success" type="submit" v-bind:class="[error ? 'disabled' : '']" :disabled="error"><i class="fa fa-plus"></i> <?=$checkbox ? 'Edit' : 'Add'?> </button>
                                                            <a href="<?=base_url('Finance/deductions')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
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
            <div id="tab-agency" class="tab-pane">
                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                    </p>
                <form action="#" role="form">
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="..."> </span>
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger"> NOTE! </span>
                            <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                        </div>
                    </div>
                    <div class="margin-top-10">
                        <a href="javascript:;" class="btn green"> Submit </a>
                        <a href="javascript:;" class="btn default"> Cancel </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end col-md-9-->
</div>
<script src="<?=base_url('assets/js/axios/axios.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/vue.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/vuejs-deductions.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('.portlet-body').show();
    });
</script>