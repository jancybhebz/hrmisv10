<?php 
/** 
Purpose of file:    PDS Update View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Employee </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('employee')?>">Request </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>PDS Update</span>
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
                    <span class="caption-subject bold uppercase">PDS Update</span>
                </div>
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('employee/pds_update/add')?>" method="post" id="frmPDSupdate">
                 <div class="row">
                        <div class="col-sm-3 text-right">
                            <div class="form-group">
                                <label class="control-label"><strong>Type of Profile : </strong><span class="required"> * </span></label>
                            </div>
                        </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                            <select name="strProfileType" id="strProfileType" type="text" class="form-control" required="" value="<?=!empty($this->session->userdata('strProfileType'))?$this->session->userdata('strProfileType'):''?>">
                                <option value="">Select Personal Data</option>
                                <option>Profile</option>
                                <option>Family Background</option>
                                <option>Educational Attainment</option>
                                <option>Trainings</option>
                                <option>Examinations</option>
                                <option>Children</option>
                                <option>Community Tax Certification</option>
                                <option>References</option>
                                <option>Voluntary Works</option>
                                <option>Work Experience</option>

                            </select>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                             <font color='red'> <span id="idnum"></span></font>
                        </div>
                    </div>
                 </div>
         <br><br>
                </form>
            </div>
        </div>
    </div>
</div>