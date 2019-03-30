<?php load_plugin('css',array('datatables'));?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?=strtolower($this->uri->segment(1)) == 'employee' ? 'Employee' : 'HR' ?> Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Notification</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<br>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <i class="icon-bell"></i> Notification</span>
                </div>
            </div>
            
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <table class="table table-striped table-bordered table-hover" id="table-notif" style="visibility: hidden;">
                            <thead>
                                <th style="text-align: center;width:50px;">No</th>
                                <th style="text-align: center;width:150px;"> Request Date </th>
                                <th style="text-align: center;width:100px;"> Request Type </th>
                                <th style="text-align: center;width:150px;"> Request Status </th>
                                <th style="text-align: center;"> Remarks </th>
                                <th> Destination </th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($arrRequest as $request): ?>
                                    <tr class="<?=$request['requestStatus'] == 'Cancelled'? 'cancelled':''?>">
                                        <td align="center"><?=$no++?></td>
                                        <td align="center"><?=$request['requestDate']?></td>
                                        <td align="center"><?=$request['requestCode']?></td>
                                        <td align="center"><?=$request['requestStatus']?></td>
                                        <td align="center"><?=$request['remarks']?></td>
                                        <td></td>
                                        <td nowrap>
                                            <center>
                                                <a href="" class="btn btn-sm blue"> <i class="icon-magnifier"></i> View </a>
                                                <?php if($request['requestStatus'] != 'Cancelled'): ?>
                                                    <a href="" class="btn btn-sm red"> <i class="icon-close"></i> Cancel </a>
                                                <?php endif; ?>
                                            </center>
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

<?php load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#table-notif').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-notif').css('visibility', 'visible');
            }} );
    });
</script>