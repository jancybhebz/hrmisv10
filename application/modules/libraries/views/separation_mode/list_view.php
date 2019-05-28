<?php 
/** 
Purpose of file:    List page for Separtion Mode Library
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
                    <span class="caption-subject bold uppercase"> SEPARATION MODE</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/separation_mode/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New
                                    
                                </button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_separation_mode">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Separation Mode </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($arrSeparation as $row):?>
                        <tr class="odd gradeX">
                            <td> <?=$i?> </td>
                            <td> <?=$row['separationCause']?> </td>
                            <td>
                                <?php if ($row['system'] != 1) 
                                { ?>
                                <a href="<?=base_url('libraries/separation_mode/edit/'.$row['separationCause'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                <a href="<?=base_url('libraries/separation_mode/delete/'.$row['separationCause'])?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                                <?php  
                                } 
                                else
                                {
                                   echo " <button class='btn btn-sm btn-info disabled'><span class='fa fa-info' title='Edit'></span> System</button>";
                                }    

                                ?>

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
        Datatables.init('libraries_separation_mode');
  });
</script>