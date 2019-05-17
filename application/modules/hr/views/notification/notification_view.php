<?php load_plugin('css',array('datatables','select'));?>
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
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn green btn-sm dropdown-toggle" href="<?=base_url('hr/notification?=All')?>" data-toggle="dropdown">
                            <i class="fa fa-<?=$notif_icon[$active_menu]?>"></i> &nbsp;<?=$active_menu == 'All' ? 'All Requests' : $active_menu?> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php foreach($arrNotif_menu as $notif):?>
                                    <li>
                                        <a href="<?=base_url('hr/notification?status='.$notif.'&month='.currmo().'&yr='.curryr())?>">
                                            <i class="fa fa-<?=$notif_icon[$notif]?>"></i> <?=$notif == 'All' ? 'All Requests' : $notif?> </a>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <div class="col-md-12">
                            <center>
                                <?=form_open('', array('class' => 'form-inline', 'method' => 'get'))?>
                                    <input type="hidden" name="status" value="<?=isset($_GET['status']) ? $_GET['status'] : ''?>">
                                    <div class="form-group" style="display: inline-flex;">
                                        <label style="padding: 6px;">Month</label>
                                        <select class="bs-select form-control" name="month">
                                            <option value="all">All</option>
                                            <?php foreach (range(1, 12) as $m): ?>
                                                <option value="<?=sprintf('%02d', $m)?>"
                                                    <?php 
                                                        if(isset($_GET['month'])):
                                                            echo $_GET['month'] == $m ? 'selected' : '';
                                                        else:
                                                            echo $m == sprintf('%02d', date('n')) ? 'selected' : '';
                                                        endif;
                                                     ?> >
                                                    <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="display: inline-flex;margin-left: 10px;">
                                        <label style="padding: 6px;">Year</label>
                                        <select class="bs-select form-control" name="yr">
                                            <option value="all">All</option>
                                            <?php foreach (getYear() as $yr): ?>
                                                <option value="<?=$yr?>"
                                                    <?php 
                                                        if(isset($_GET['yr'])):
                                                            echo $_GET['yr'] == $yr ? 'selected' : '';
                                                        else:
                                                            echo $yr == date('Y') ? 'selected' : '';
                                                        endif;
                                                     ?> >  
                                                <?=$yr?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-top: -3px;">Search</button>
                                <?=form_close()?>
                            </center>
                        </div>

                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <div style="display: inline-flex;" class="div-legend" style="visibility: hidden;">
                            <div class="legend-def1">
                                <div class="legend-dd1" style="background-color: #ffffb0;"></div> &nbsp;<small style="margin-left: 10px;">Disapproved</small> &nbsp;&nbsp;</div>
                            <div class="legend-def1">
                                <div class="legend-dd1" style="background-color: #ffc0cb;"></div> &nbsp;<small style="margin-left: 10px;">Cancelled</small> &nbsp;&nbsp;</div>
                        </div>
                        <br><br>
                        <table class="table table-striped table-bordered table-hover" id="table-notif" style="visibility: hidden;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;width:50px;">No</th>
                                    <th style="text-align: center;width:150px;"> Request Date </th>
                                    <th style="text-align: center;width:100px;"> Request Type </th>
                                    <th style="text-align: center;width:150px;"> Request Status </th>
                                    <th style="text-align: center;"> Remarks </th>
                                    <th> Destination </th>
                                    <th style="width:50px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($arrRequest as $request): ?>
                                    <tr class="<?=strtolower($request['req_status']) == 'cancelled'? 'cancelled':''?> <?=strtolower($request['req_status']) == 'disapproved'? 'disapproved':''?>">
                                        <td align="center"><?=$no++?></td>
                                        <td align="center"><?=$request['req_date']?></td>
                                        <td align="center"><?=$request['req_type']?></td>
                                        <td align="center"><?=$request['req_status']?></td>
                                        <td align="center"><?=$request['req_remarks']?></td>
                                        <td><?=$request['req_nextsign']?></td>
                                        <td nowrap style="vertical-align: middle;text-align: left;">
                                            <a href="" class="btn btn-sm blue"> <i class="icon-magnifier"></i> View </a>
                                            <?php if(!in_array(strtolower($request['req_status']), array('cancelled', 'disapproved','certified'))): ?>
                                                <button data-id="<?=$request['req_id']?>" class="btn btn-sm red btn-cancel"> <i class="icon-close"></i> Cancel </button>
                                            <?php endif; ?>
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

<div id="modal-cancelRequest" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Cancel Request</h4>
            </div>
            <?=form_open('employee/requests/cancel_request', array('id' => 'frmcancel_request'))?>
                <div class="modal-body">
                    <div class="row form-body">
                        <div class="col-md-12">
                            <input type="hidden" name="txtreqid" id="txtreqid">
                            <div class="form-group">
                                <label>Are you sure you want to cancel this request?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsubmit-payrollDetails" class="btn btn-sm green"><i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<?php load_plugin('js',array('datatables','select'));?>
<?php include 'modal/notification_info.php' ?>

<script>
    $(document).ready(function() {
        $('#table-notif').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#table-notif, .div-legend').css('visibility', 'visible');
            }} );
        $('#table-notif').on('click', 'button.btn-cancel', function() {
            $('#txtreqid').val($(this).data('id'));
            $('#modal-cancelRequest').modal('show');
        });

    });
</script>