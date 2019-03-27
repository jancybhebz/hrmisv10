<?php 
/** 
Purpose of file:    List page for Agency Profile Library
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
                    <span class="caption-subject bold uppercase"> AGENCY INFORMATION</span>
                </div>
            </div>
           <!--    <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/agency_profile/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New
                                    
                                </button></a>
                            </div>
                        </div>
                       </div> 
                    </div>
                </div> -->
           
            <div class="portlet-body">
            <?=form_open(base_url('libraries/agency_profile/edit'), array('method' => 'post', 'id' => 'frmAgencyProfile'))?>
                    <div class="form-body">
                    <?php //print_r($arrPost);?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">AGENCY NAME :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['agencyName'])?$arrAgency[0]['agencyName']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">AGENCY CODE :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['abbreviation'])?$arrAgency[0]['abbreviation']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">REGION :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['region'])?$arrAgency[0]['region']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">TIN NUMBER :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['agencyTin'])?$arrAgency[0]['agencyTin']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">ADDRESS :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['address'])?$arrAgency[0]['address']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">ZIP CODE :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['zipCode'])?$arrAgency[0]['zipCode']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">TELEPHONE :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['telephone'])?$arrAgency[0]['telephone']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">FACSIMILE :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['facsimile'])?$arrAgency[0]['facsimile']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">EMAIL :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['email'])?$arrAgency[0]['email']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">WEBSITE :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="strSchemeCode" value="<?=isset($arrAgency[0]['website'])?$arrAgency[0]['website']:''?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                          
                           
                            <!-- <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">SALARY SCHEDULE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['salarySchedule'])?$arrAgency[0]['salarySchedule']:''?>" disabled></strong>
                                </div>
                            </div>
                        <hr><br><br></hr>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">GSIS NUMBER :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['gsisId'])?$arrAgency[0]['gsisId']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">GSIS EMPLOYEE % SHARE :</label>
                                 </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['gsisEmpShare'])?$arrAgency[0]['gsisEmpShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">GSIS EMPLOYEER % SHARE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                   <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['gsisEmprShare'])?$arrAgency[0]['gsisEmprShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PAGIBIG NUMBER :</label>
                                 </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                   <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['pagibigId'])?$arrAgency[0]['pagibigId']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PAGIBIG EMPLOYEE PERCENTAGE SHARE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['pagibigEmpShare'])?$arrAgency[0]['pagibigEmpShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PAGIBIG EMPLOYER PERCENTAGE SHARE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['pagibigEmprShare'])?$arrAgency[0]['pagibigEmprShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PROVIDENT EMPLOYEE PERCENTAGE SHARE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                 <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['providentEmpShare'])?$arrAgency[0]['providentEmpShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PROVIDENT EMPLOYER PERCENTAGE SHARE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['providentEmprShare'])?$arrAgency[0]['providentEmprShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PHILHEALTH EMPLOYEE SHARE :</label>
                                 </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['philhealthEmpShare'])?$arrAgency[0]['philhealthEmpShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PHILHEALTH EMPLOYER SHARE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                   <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['philhealthEmprShare'])?$arrAgency[0]['philhealthEmprShare']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PHILHEALTH PERCENTAGE :</label>
                                </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                   <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['philhealthPercentage'])?$arrAgency[0]['philhealthPercentage']:''?>" disabled></strong>
                                </div>
                            </div>
                            <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">PHILHEALTH # :</label>
                                 </div>
                            </div>
                            <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                    <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['PhilhealthNum'])?$arrAgency[0]['PhilhealthNum']:''?>" disabled></strong>
                                </div>
                            </div> -->
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">MISSION :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <strong><textarea type="text" class="form-control" disabled>
                                       <?php echo $arrAgency[0]['Mission']; ?>
                                    </textarea></strong>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">VISION :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                         <strong><textarea type="text" class="form-control" disabled>
                                       <?php echo $arrAgency[0]['Vision']; ?>
                                        </textarea></strong>
                                    </div>
                                </div>
                            </div>
                            </div>
                             <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">MANDATE :</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                          <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['Mandate'])?$arrAgency[0]['Mandate']:''?>" disabled></strong>
                                    </div>
                                </div>
                            </div>
                            </div>
                          
                           <!--  <div class="col-sm-5 text-right"">
                                <div class="form-group ">
                                    <label class="control-label">BANK ACCOUNT # :</label>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-7 text-left"">
                                <div class="form-group ">
                                 <strong><input type="text" class="form-control" value="<?=isset($arrAgency[0]['AccountNum'])?$arrAgency[0]['AccountNum']:''?>" disabled></strong>
                                </div>
                            </div> -->
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                        <?php foreach($arrAgency as $agency):?>
                                        <a href="<?=base_url('libraries/agency_profile/edit/'.$agency['agencyName'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span>Edit
                                           <?php endforeach;?></button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?=form_close()?>
                    
                    
                    <?=form_open(base_url('libraries/agency_profile/edit_logo'), array('method' => 'post', 'id' => 'frmAgencyImage'))?>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <?php foreach($arrAgency as $agency):?>
                                            <a href="<?=base_url('libraries/agency_profile/edit_logo')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit_Logo"></span>Edit Logo
                                            <?php endforeach;?></button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?=form_close()?>
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
