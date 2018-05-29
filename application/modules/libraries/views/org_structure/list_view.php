<?php 
/** 
Purpose of file:    List page for Org Structure Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php load_plugin('css',array('datepicker'));?>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> ORGANIZATIONAL STRUCTURE</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/org_structure/add_exec')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Executive Office </button></a>

                                <a href="<?=base_url('libraries/org_structure/add_service')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Service 
                                </button></a>

                                <a href="<?=base_url('libraries/org_structure/add_division')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Division 
                                </button></a>

                                <a href="<?=base_url('libraries/org_structure/add_section')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Section 
                                </button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_org_structure">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Executive Office Code </th>
                            <th> Executive Office Name </th>
                            <th> Executive Office Head Title </th>
                            <th> Executive Office Head </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($arrOrganization as $org):?>
                        <tr class="odd gradeX">
                            <td> <?=$i?> </td>
                            <td> <?=$org['group1Code']?> </td>
                            <td> <?=$org['group1Name']?> </td>   
                            <td> <?=$org['group1HeadTitle']?> </td>   
                            <td> <?=$org['surname'].', '.$org['firstname']?> </td>                            
                            <td>
                                <a href="<?=base_url('libraries/org_structure/edit_exec/'.$org['group1Code'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                <a href="<?=base_url('libraries/org_structure/delete_exec/'.$org['group1Code'])?>"><button class="btn btn-sm btn-danger"><span class="fa fa-edit" title="Delete"></span> Delete</button></a>
                                <a href="<?=base_url('libraries/org_structure/custodian/'.$org['group1Code'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Custodian"></span> Custodian</button></a>
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
<?php load_plugin('js',array('datatable'));?>


<script>
    $(document).ready(function() {
        Datatables.init('libraries_org_structure');
  });
</script>