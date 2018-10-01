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
            <span>Income</span>
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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Income</span>
                        </div>
                    </div>
                
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?=base_url('finance/libraries/income/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New </button></a>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-primary btn-outline dropdown-toggle" data-toggle="dropdown"> <?=$status[0][0]?> <i class="fa fa-angle-down"></i> </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li> <a href="<?=base_url('finance/libraries/income/'.$status[1][1])?>"> <?=$status[1][0]?></a> </li>
                                            <li> <a href="<?=base_url('finance/libraries/income/'.$status[2][1])?>"> <?=$status[2][0]?></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-income" style="display: none">
                            <thead>
                                <tr>
                                    <tr>
                                        <th> No. </th>
                                        <th> Income Code </th>
                                        <th> Income Description </th>
                                        <th> Income Type </th>
                                        <th> Status </th>
                                        <th style="text-align: center;"> Actions </th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($income as $data): ?>
                                    <tr class="odd gradeX <?=$data['hidden'] == 1 ? 'inactive' : ''?>">
                                        <td><?=$no++?> </td>
                                        <td><?=$data['incomeCode']?> </td>
                                        <td><?=$data['incomeDesc']?> </td>
                                        <td><?=$data['incomeType']?> </td>
                                        <td><?=$data['hidden'] == 1 ? 'Inactive' : 'Active' ?> </td>
                                        <td align="center" nowrap>
                                            <a href="<?=base_url('finance/libraries/income/edit/'.$data['incomeCode'].'?stat='.$data['hidden'])?>"><button class="btn btn-sm btn-primary"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                            <a class="btn btn-sm btn-danger" id="btnDelIncome" data-code="<?=$data['incomeCode']?>"><span class="fa fa-trash" title="Delete"></span> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <button type="button" class="btn btn-primary" id="btndelete">Yes</button>
            </div>
        </div>
    </div>
</div>

<?php load_plugin('js',array('datatable'));?>

<script>
    $(document).ready(function() {
        $('#table-income').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-income').show();
            }} );

        var code = '';
        $('#table-income').on('click', 'tr > td > a#btnDelIncome', function () {
            code = $(this).data('code');
            $('.modal-title').html('Delete Income');
            $('#delete').modal('show');
        });

        $('#btndelete').click(function() {
            $.ajax ({type : 'GET', url: 'income/delete?code='+code,
                success: function(){
                    toastr.success('Income '+code+' successfully deleted.','Success');
                    $('#delete').modal('hide');
                    $('[data-code="' + code + '"]').closest('tr').hide(); }});
        });
    });
</script>