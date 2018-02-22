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
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase"> Deductions</span>
                                </div>
                                
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?=base_url('Finance/deductions/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New </button></a>
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn green btn-outline dropdown-toggle" data-toggle="dropdown"> <?=$status[0][0]?> <i class="fa fa-angle-down"></i> </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li> <a href="<?=base_url('Finance/deductions/'.$status[1][1])?>"> <?=$status[1][0]?></a> </li>
                                                    <li> <a href="<?=base_url('Finance/deductions/'.$status[2][1])?>"> <?=$status[2][0]?></a> </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-deductions" style="display: none">
                                    <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th> Agency </th>
                                            <th> Code </th>
                                            <th> Description </th>
                                            <th> Account Code </th>
                                            <th> Type </th>
                                            <th> Status </th>
                                            <th style="text-align: center;"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach($deductions as $data): ?>
                                        <tr class="odd gradeX <?=$data['hidden'] == 1 ? 'inactive' : ''?>">
                                            <td><?=$no++?> </td>
                                            <td><?=$data['deductionGroupCode']?> </td>
                                            <td><?=$data['deductionCode']?> </td>
                                            <td><?=$data['deductionDesc']?> </td>
                                            <td><?=$data['deductionAccountCode']?> </td>
                                            <td><?=$data['deductionType']?> </td>
                                            <td><?=$data['hidden'] == 1 ? 'Inactive' : 'Active' ?> </td>
                                            <td align="center" nowrap>
                                                <a href="<?=base_url('Finance/deductions/edit/'.$data['deductionCode'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                                <a href="<?=base_url('')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
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
<?php load_plugin('js',array('datatable'));?>
<script>
    $(document).ready(function() {
        $('#table-deductions').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-deductions').show();
            }} );
    });
</script>
