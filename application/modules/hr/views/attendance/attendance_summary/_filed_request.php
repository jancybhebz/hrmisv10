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
                        <div class="tab-pane" id="tab-comm">
                            <table class="table table-bordered table-hover" id="tbl-comm">
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
                        <!-- end commutation order -->

                        <!-- begin dtr -->
                        <div class="tab-pane" id="tab-dtr">
                            <table class="table table-bordered table-hover" id="tbl-dtr">
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
                        <!-- end dtr -->

                        <!-- begin leave -->
                        <div class="tab-pane" id="tab-leave">
                            <table class="table table-bordered table-hover" id="tbl-leave">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date Filed</th>
                                        <th>Leave Type</th>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end leave -->

                        <!-- begin monetization order -->
                        <div class="tab-pane" id="tab-mone">
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
                        <div class="tab-pane active" id="tab-ob">
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