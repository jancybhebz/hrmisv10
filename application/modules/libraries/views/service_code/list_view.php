<?php 
/** 
Purpose of file:    List page for Service Code Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php load_plugin('css',array('datepicker','datatables'));?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> SERVICE CODE</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/service_code/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New
                                    
                                </button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_service_code">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Service Code </th>
                            <th> Service Description </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($arrService as $row):?>
                        <tr class="odd gradeX">
                            <td> <?=$i?> </td>
                            <td> <?=$row['serviceCode']?> </td>
                            <td> <?=$row['serviceDesc']?> </td>
                            <td>
                                <a href="<?=base_url('libraries/service_code/edit/'.$row['serviceId'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                <a href="<?=base_url('libraries/service_code/delete/'.$row['serviceId'])?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                               
                            </td>
                        </tr>
                    <?php 
                    $i++;
                    endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<?php load_plugin('js',array('datatables'));?>


<script>
    $(document).ready(function() {
        Datatables.init('libraries_service_code');
  });
</script>