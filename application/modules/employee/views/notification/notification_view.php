<?php 
/** 
Purpose of file:    Notification View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Employee</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Notification</a>
            <i class="fa fa-circle"></i>
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
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Notification</span>
                </div>
            </div>
                <div class="portlet-body">
                    <form action="<?=base_url('employee/notification')?>" method="post" id="frmNotification">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_appointment_status">
                    <thead>
                        <tr>
                            <th> Request Date </th>
                            <th> Request Type </th>
                            <th> Request Status </th>
                            <th> Remarks </th>
                            <th> Destination </th>
                            <th colspan="2"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                     foreach($arrRequest as $row):?>
                        <tr> 
                            <td><?=$row['requestDate']?></td> <!-- requestDate -->
                            <td>Type of Request :
                                <br> <br>
                                Leave Date :
                                <br>
                                From :
                                <br>
                                To :
                            </td>  <!-- requestDetails -->
                            
                            <td><?=$row['requestStatus']?></td> <!-- requestStatus -->
                            <td><?=$row['remarks']?></td> <!-- remarks -->
                            <td><?=$row['signatory']?></td> <!-- signatory -->
                            <td colspan="2"> </td>
                        </tr>

                    <?php endforeach;?>
                    </tbody>

                </table>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="<?=base_url('assets/js/leave.js')?>"> -->
