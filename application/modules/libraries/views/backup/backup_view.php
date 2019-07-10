<?php 
/** 
Purpose of file:    List page for Back up Library
Author:             Rose Anne Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php load_plugin('css',array('datepicker','datatables'));?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Libraries</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Back up</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="row">
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Back-up</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/backup/export_database')?>" id="btndbdownload" class="btn sbold green"> Download
                                    <i class="fa fa-download"></i>
                                    
                                </button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                    
                 <!--  <table class="table table-striped table-bordered table-checkable order-column" id="libraries_backup" style="visibility: hidden;">
                    <thead>
                        <tr>
                            <th style="width:5% !important"> No </th>
                            <th> Date Added</th>
                            <th> Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><?=$no++?></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table> -->

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<?php load_plugin('js',array('datatables'));?>


<script>
    $(document).ready(function() {
        Datatables.init('libraries_backup');
  });
</script>