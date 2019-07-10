<?php 
/** 
Purpose of file:    List page for User Account Library
Author:             Rose Anne L. Grefaldeo
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
            <span>User Account</span>
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
  <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> USER ACCOUNT</span>
                </div>
                
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-useraccount" style="display: none">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/user_account/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_user_account">
                    <thead>
                        <tr>
                            <th style="width: 100px;text-align:center;"> No. </th>
                            <th> Employee Number </th>
                            <th> Employee Name </th>
                            <th> Username </th>
                            <th> Access Level </th>
                            <th> User Permission </th>
                            <th class="no-sort" style="text-align: center;"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($arrUser as $row):?>
                        <tr class="odd gradeX">
                            <td> <?=$i?> </td>
                            <td> <?=$row['empNumber']?> </td>
                            <td> <?=$row['surname'].', '.$row['firstname'].' '.$row['middlename']?> </td>
                            <td> <?=$row['userName']?> </td>
                            <td> <?=$row['userLevel']?> </td>
                            <td> 
                            <?php if ($row['userLevel'] == 1) 
                                { 
                                 echo 'HR';
                                } 
                                else if ($row['userLevel'] == 2) 
                                { 
                                 echo 'Finance';
                                } 
                                else if ($row['userLevel'] == 3) 
                                { 
                                 echo 'Officer';
                                }
                                else if ($row['userLevel'] == 4) 
                                { 
                                 echo 'Executive';
                                }
                                else if ($row['userLevel'] == 5) 
                                { 
                                 echo 'Employee';
                                }
                                else
                                {  echo '';
                                }
                            ?>
                            </td>
                            <td width="150px" style="white-space: nowrap;">
                                <a href="<?=base_url('libraries/user_account/edit/'.$row['empNumber'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                <a href="<?=base_url('libraries/user_account/delete/'.$row['empNumber'])?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                                <a href="<?=base_url('libraries/user_account/reset/'.$row['empNumber'])?>"><button class="btn btn-sm btn-blue"><span class="fa fa-refresh" title="Reset"></span> Reset Password</button></a>
                               
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
        $('#libraries_user_account').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#div-useraccount').show();
            }} );
    });
</script>