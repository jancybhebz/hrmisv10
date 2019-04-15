<?=load_plugin('css',array('datatables'));?>
<?php $month = isset($_GET['month']) ? $_GET['month'] : date('m'); $yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y'); ?>
<div class="tab-pane active" id="tab_1_2">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> <i class="fa fa-file-o"></i> Filed Request</span>&nbsp;
                </div>
            </div>
            
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab-comm" data-toggle="tab"> Commutation </a>
                        </li>
                        <li>
                            <a href="#tab-dtr" data-toggle="tab"> DTR Update </a>
                        </li>
                        <li>
                            <a href="#tab-leave" data-toggle="tab"> Leave </a>
                        </li>
                        <li>
                            <a href="#tab-mone" data-toggle="tab"> Monetization </a>
                        </li>
                        <li>
                            <a href="#tab-ob" data-toggle="tab"> Official Business </a>
                        </li>
                        <li>
                            <a href="#tab-to" data-toggle="tab"> Travel Order </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- begin commutation order -->
                        <div class="tab-pane " id="tab-comm">
                            <table class="table table-bordered table-hover" id="tbl-comm">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;width: 100px;">No</th>
                                        <th style="text-align: center;">Date File</th>
                                        <th style="text-align: center;">Date Request</th>
                                        <th style="text-align: center;">Purpose</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;width: 200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($arrcomm as $commutation): if(count($commutation) > 0): $rdate = explode(';', $commutation['requestDetails']); ?>
                                    <tr>
                                        <td align="center"><?=$no++?></td>
                                        <td align="center"><?=$commutation['requestDate']?></td>
                                        <td align="center"><?=join('-',array($rdate[3],$rdate[2],$rdate[1] == '' ? $rdate[0] : $rdate[1] ))?></td>
                                        <td align="center"><?=$rdate[4]?></td>
                                        <td align="center"><?=$commutation['requestStatus']?></td>
                                        <td align="center" nowrap>
                                            <button class="btn btn-sm blue"><i class="glyphicon glyphicon-ok-circle"></i> View</button>
                                            <?php if($commutation['requestStatus'] == 'Filed Request'): ?>
                                                <button class="btn btn-sm red"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end commutation order -->

                        <!-- begin dtr -->
                        <div class="tab-pane " id="tab-dtr">
                            <table class="table table-bordered table-hover" id="tbl-dtr">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;width: 100px;">No</th>
                                        <th style="text-align: center;">Date Filed</th>
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;width: 250px;">Time</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;width: 200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($arrdtr as $rdtr): if(count($rdtr) > 0): $rdate = explode(';', $rdtr['requestDetails']); ?>
                                    <tr>
                                        <td align="center"><?=$no++?></td>
                                        <td align="center"><?=$rdtr['requestDate']?></td>
                                        <td align="center"><?=$rdate[1]?></td>
                                        <td><small>
                                            <?php
                                            echo '<b>Morning:</b> '.join(':',array($rdate[8],$rdate[9],$rdate[10])).' '.$rdate[11].' - '.join(':',array($rdate[12],$rdate[13],$rdate[14])).' '.$rdate[15].'<br>';
                                            echo '<b>Afternoon:</b> '.join(':',array($rdate[16],$rdate[17],$rdate[18])).' '.$rdate[19].' - '.join(':',array($rdate[20],$rdate[21],$rdate[22])).' PM';?></small>
                                        </td>
                                        <td align="center"><?=$rdtr['requestStatus']?></td>
                                        <td align="center" nowrap>
                                            <button class="btn btn-sm blue"><i class="glyphicon glyphicon-ok-circle"></i> View</button>
                                            <?php if($rdtr['requestStatus'] == 'Filed Request'): ?>
                                                <button class="btn btn-sm red"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end dtr -->

                        <!-- begin leave -->
                        <div class="tab-pane " id="tab-leave">
                            <table class="table table-bordered table-hover" id="tbl-leave">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;width: 100px;">No</th>
                                        <th style="text-align: center;">Date Filed</th>
                                        <th style="text-align: center;">Leave Type</th>
                                        <th style="text-align: center;">Date From</th>
                                        <th style="text-align: center;">Date To</th>
                                        <th style="text-align: center;">Reason</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;width: 200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($arrleave as $rleave): if(count($rleave) > 0): $rdate = explode(';', $rleave['requestDetails']); ?>
                                    <tr>
                                        <td align="center"><?=$no++?></td>
                                        <td align="center"><?=$rleave['requestDate']?></td>
                                        <td align="center"><?=$rdate[0]?></td>
                                        <td align="center"><?=$rdate[2]?></td>
                                        <td align="center"><?=$rdate[3]?></td>
                                        <td align="center"><?=$rdate[1]?></td>
                                        <td align="center"><?=$rleave['requestStatus']?></td>
                                        <td align="center" nowrap>
                                            <button class="btn btn-sm blue"><i class="glyphicon glyphicon-ok-circle"></i> View</button>
                                            <?php if($rleave['requestStatus'] == 'Filed Request'): ?>
                                                <button class="btn btn-sm red"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end leave -->

                        <!-- begin monetization order -->
                        <div class="tab-pane active" id="tab-mone">
                            <table class="table table-bordered table-hover" id="tbl-mone">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date Filed</th>
                                        <th>Date</th>
                                        <th>Destination</th>
                                        <th>Purpose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end monetization order -->

                        <!-- begin official business -->
                        <div class="tab-pane" id="tab-ob">
                            <table class="table table-bordered table-hover" id="tbl-ob">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date Filed</th>
                                        <th>Place</th>
                                        <th>Purpose</th>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end official business -->

                        <!-- begin travel order -->
                        <div class="tab-pane" id="tab-to">
                            <table class="table table-bordered table-hover" id="tbl-to">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date Filed</th>
                                        <th>Date</th>
                                        <th>Destination</th>
                                        <th>Purpose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end travel order -->
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?=load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#tbl-comm,#tbl-dtr,#tbl-leave,#tbl-mone,#tbl-ob,#tbl-to').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#employee_view').show();
            }} );
    });
</script>