<?php load_plugin('css',array('datatable'));?>
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
    <div class="col-md-12">
        <div class="tab-content portlet light bordered">
            <div class="tabbable tabbable-tabdrop">
                <ul class="nav nav-tabs">
                    <li class="<?=isset($_GET['tab']) ? '' : 'active'?>">
                        <a href="#tab-deduction" data-toggle="tab">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Deductions</span>
                            </div>
                        </a>
                    </li>
                    <li class="<?=isset($_GET['tab']) ? 'active' : ''?>">
                        <a href="#tab-agency" data-toggle="tab">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Agency </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab-deduction" class="tab-pane <?=isset($_GET['tab']) ? '' : 'active'?>" v-cloak>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet">
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?=base_url('finance/deductions/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New </button></a>
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn green btn-outline dropdown-toggle" data-toggle="dropdown"> <?=$status[0][0]?> <i class="fa fa-angle-down"></i> </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li> <a href="<?=base_url('finance/deductions/'.$status[1][1])?>"> <?=$status[1][0]?></a> </li>
                                                    <li> <a href="<?=base_url('finance/deductions/'.$status[2][1])?>"> <?=$status[2][0]?></a> </li>
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
                                                <a href="<?=base_url('finance/deductions/edit/'.$data['deductionCode'].'?stat='.$data['hidden'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                                <a class="btn btn-sm btn-danger" id="btnDelDeduction" data-tab="1" data-code="<?=$data['deductionCode']?>"><span class="fa fa-trash" title="Delete"></span> Delete</a>
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
            <div id="tab-agency" class="tab-pane <?=isset($_GET['tab']) == 'agency' ? 'active' : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet">
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="<?=base_url('finance/agency/add?tab=agency')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New </button></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-agency" style="display: none">
                                    <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th> Agency Code </th>
                                            <th> Agency Description </th>
                                            <th> Account Code </th>
                                            <th style="text-align: center;"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach($agency as $data): ?>
                                        <tr class="odd gradeX ">
                                            <td><?=$no++?> </td>
                                            <td><?=$data['deductionGroupCode']?> </td>
                                            <td><?=$data['deductionGroupDesc']?> </td>
                                            <td><?=$data['deductionGroupAccountCode']?> </td>
                                            <td align="center" nowrap>
                                                <a href="<?=base_url('finance/agency/edit/'.$data['deductionGroupCode'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                                <a class="btn btn-sm btn-danger" id="btnDelDeduction" data-tab="0" data-code="<?=$data['deductionGroupCode']?>"><span class="fa fa-trash" title="Delete"></span> Delete</a>
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
        </div>
    </div>
    <!--end col-md-9-->
</div>

<div class="modal fade" id="delete" tabindex="-1" role="basic" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body"> Are you sure you want to delete this data? </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btndelete">Yes</button>
            </div>
        </div>
    </div>
</div>

<?php load_plugin('js',array('datatable'));?>

<script>
    $(document).ready(function() {
        $('#table-deductions').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-deductions').show();
            }} );

        $('#table-agency').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-agency').show();
            }} );

        var code = '';
        $('#table-agency, #table-deductions').on('click', 'tr > td > a#btnDelDeduction', function () {
            code = $(this).data('code');
            tab = $(this).data('tab');
            $('.modal-title').html((tab == 1) ? 'Delete Deduction' : 'Delete Agency');
            $('#delete').modal('show');
        });

        $('#btndelete').click(function() {
            $.ajax ({type : 'GET', url: 'deductions/delete?tab='+tab+'&code='+code,
                success: function(){
                    toastr.success('Deduction '+code+' successfully deleted.','Success');
                    $('#delete').modal('hide');
                    $('[data-code="' + code + '"]').closest('tr').hide(); }});
        });
    });
</script>
