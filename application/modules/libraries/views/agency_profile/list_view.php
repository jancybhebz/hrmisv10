<?php 
/** 
Purpose of file:    List page for Agency Profile Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?=load_plugin('css',array('datepicker'));?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>HR Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Libraries</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Agency Information</span>
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

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> AGENCY INFORMATION</span>
                </div>
                <div class="action pull-right">
                    <a href="<?=base_url('libraries/agency_profile/edit/'.$arrAgency[0]['agencyName'])?>" class="btn green" title="Edit">
                        <i class="fa fa-pencil"></i> Edit </a> &nbsp;
                    <a href="<?=base_url('libraries/agency_profile/edit_logo')?>" class="btn blue-hoki" title="Edit_Logo">
                        <i class="fa fa-edit"></i> Edit Logo </a>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="row">
                    <div class="col-md-12">
                        <!-- begin form -->
                        <div class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Agency name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['agencyName'])?$arrAgency[0]['agencyName']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Agency Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['abbreviation'])?$arrAgency[0]['abbreviation']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Region</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['region'])?$arrAgency[0]['region']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tin Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['agencyTin'])?$arrAgency[0]['agencyTin']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['address'])?$arrAgency[0]['address']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Zip Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['zipCode'])?$arrAgency[0]['zipCode']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Telephone</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['telephone'])?$arrAgency[0]['telephone']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Facsimile</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['facsimile'])?$arrAgency[0]['facsimile']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['email'])?$arrAgency[0]['email']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Website</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['website'])?$arrAgency[0]['website']:''?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Mission</label>
                                    <div class="col-md-9">
                                        <b>
                                            <textarea type="text" class="form-control" disabled><?=$arrAgency[0]['Mission']; ?></textarea>
                                        </b>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Vision</label>
                                    <div class="col-md-9">
                                        <b>
                                            <textarea type="text" class="form-control" disabled><?=$arrAgency[0]['Vision']; ?></textarea>
                                        </b>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Mandate</label>
                                    <div class="col-md-9">
                                        <b>
                                            <input type="text" class="form-control" value="<?=isset($arrAgency[0]['Mandate'])?$arrAgency[0]['Mandate']:''?>" disabled>
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end form -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
        

<?php load_plugin('js',array('datatable'));?>


<script>

    $(document).ready(function() {
        Datatables.init('libraries_agency_profile');
  });
</script>
