<?php 
/** 
Purpose of file:    Delete page for Holiday Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('libraries')?>">Libraries</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Delete Local Holiday</span>
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
                    <i class="icon-trash font-dark"></i>
                    <span class="caption-subject bold uppercase"> Delete Local Holiday</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <form action="<?=base_url('libraries/holiday/delete_local/'.$this->uri->segment(4))?>" method="post" id="frmLocalHoliday">
                <div class="form-body">
                    <?php //print_r($arrPost);?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Local Holiday Name <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="<?=isset($arrData[0]['holidayName'])?$arrData[0]['holidayName']:''?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Local Holiday Date <span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="<?=isset($arrData[0]['holidayDate'])?$arrData[0]['holidayDate']:''?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                   <!--  <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Year<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="<?=isset($arrLocHoliday[0]['holidayYear'])?$arrLocHoliday[0]['holidayYear']:''?>" disabled>
                                </div>
                                 <label class="control-label">Month<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="<?=isset($arrLocHoliday[0]['holidayMonth'])?$arrLocHoliday[0]['holidayMonth']:''?>" disabled>
                                </div>
                                 <label class="control-label">Day<span class="required"> * </span></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" value="<?=isset($arrLocHoliday[0]['holidayDay'])?$arrLocHoliday[0]['holidayDay']:''?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                    
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="strCode" value="<?=isset($arrData[0]['holidayName'])?$arrData[0]['holidayName']:''?>">
                                <button class="btn btn-danger" type="submit"><i class="icon-trash"></i> Confirm Delete</button>
                                <a href="<?=base_url('libraries/holiday/add_local')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php load_plugin('js',array('validation'));?>

