<?=load_plugin('css',array('datatables'));?>
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
            <span>Project Code</span>
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
                            <span class="caption-subject bold uppercase"> Payroll Process</span>
                        </div>
                    </div>
                
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?=base_url('finance/libraries/projectcode/add')?>" class="btn sbold blue">
                                        <i class="fa fa-plus"></i> Add New </a>
                                </div>
                            </div>
                        </div>
                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-project" style="display: none">
                            <thead>
                                <tr>
                                    <tr>
                                        <th> Order </th>
                                        <th> Project Code </th>
                                        <th> Project Description </th>
                                        <th style="text-align: center;width:170px;"> Actions </th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($projectcodes as $data): ?>
                                    <tr class="odd gradeX">
                                        <td><?=$data['projectOrder']?></td>
                                        <td><?=$data['projectCode']?></td>
                                        <td><?=$data['projectDesc']?></td>
                                        <td align="center" nowrap>
                                            <a href="<?=base_url('finance/libraries/projectcode/edit/'.$data['projectCode'])?>" class="btn btn-sm green">
                                                <span class="fa fa-edit" title="Edit"></span> Edit</a>
                                            <a class="btn btn-sm btn-danger" id="btnDelDeduction" data-code="<?=$data['projectCode']?>">
                                                <span class="fa fa-trash" title="Delete"></span> Delete</a>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body"> Are you sure you want to delete this data? </div>
            <div class="modal-footer">
                <button type="submit" id="btndelete" class="btn btn-sm green">
                    <i class="icon-check"> </i> Yes</button>
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
                    <i class="icon-ban"> </i> Cancel</button>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#table-project').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-project').show();
            }} );

        var code = '';
        $('#table-project').on('click', 'tr > td > a#btnDelDeduction', function () {
            code = $(this).data('code');
            $('.modal-title').html('Delete Project Code');
            $('#delete').modal('show');
        });

        $('#btndelete').click(function() {
            $.ajax ({type : 'GET', url: 'ProjectCode/delete?code='+code,
                success: function(){
                    toastr.success('Project Code '+code+' successfully deleted.','Success');
                    $('#delete').modal('hide');
                    $('[data-code="' + code + '"]').closest('tr').hide(); }});
        });
    });
</script>