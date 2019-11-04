<?php 
/** 
Purpose of file:    PDS Update View
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?=load_plugin('css', array('datepicker','datatables','timepicker','select','select2'))?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="javascript:;">Request</a>
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
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">PDS Update</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           <label class="control-label bold">Type of Profile : <span class="required"> * </span></label>
                                <select name="strProfileType" id="strProfileType" type="text" class="form-control bs-select form-required">
                                <option value="">-- SELECT PERSONAL DATA --</option>
                                <option value="Profile">Profile</option>
                                <option value="Family">Family Background (Parents/Spouse)</option>
                                <option value="Educational" <?=$this->uri->segment(3)=='education'?'selected':''?>>Educational Attainment</option>
                                <option value="Trainings">Trainings</option>
                                <!-- <option value="Examinations">Eligibility</option> -->
                                <!-- <option value="Children">Family Background (Children)</option> -->
                                <!-- <option value="Community">Community Tax Certification</option> -->
                                <!-- <option value="References">References</option> -->
                                <!-- <option value="Voluntary">Voluntary Works</option> -->
                                <!-- <option value="WorkExp">Work Experience</option> -->
                            </select>
                        </div>
                    </div>

                    <!-- Begin Profile -->
                    <div id="divprof">
                        <?=$this->load->view('_profile.php')?>
                    </div>
                    <!-- End Profile -->

                    <!-- Begin Family -->
                    <div id="divfam">
                        <?=$this->load->view('_family.php')?>
                    </div>
                    <!-- End Family -->

                    <!-- Begin Educational -->
                    <div id="diveduc">
                        <?=$this->load->view('_educational.php')?>
                    </div>
                    <!-- End Educational -->

                    <!-- Begin Training -->
                    <div class="row" id="divtra">
                        <?=$this->load->view('_training.php')?>
                    </div>
                    <!-- End Training -->

                    <!-- Begin Examinations -->
                    <div class="row" id="divexam">
                        Examinations
                    </div>
                    <!-- End Examinations -->

                    <!-- Begin Children -->
                    <div class="row" id="divchildren">
                        Children
                    </div>
                    <!-- End Children -->

                    <!-- Begin Community -->
                    <div class="row" id="divcomm">
                        Community
                    </div>
                    <!-- End Community -->

                    <!-- Begin References -->
                    <div class="row" id="divref">
                        References
                    </div>
                    <!-- End References -->

                    <!-- Begin Voluntary -->
                    <div class="row" id="divvol">
                        Voluntary
                    </div>
                    <!-- End Voluntary -->

                    <!-- Begin WorkExp -->
                    <div class="row" id="divxp">
                        WorkExp
                    </div>
                    <!-- End WorkExp -->


                </div>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js',array('form_validation','datatables','datepicker','select','select2'));?>
<script type="text/javascript" src="<?=base_url('assets/js/pds_update.js')?>">
