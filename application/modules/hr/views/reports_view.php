<?php 
/** 
Purpose of file:    Add Report View for 201
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BREADCRUMB -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Reports</a>
            <i class="fa fa-circle"></i>
        </li>
       
    </ul>
</div>
<!-- END BREADCRUMB -->
<?=form_open(base_url('hr/reports/reports'), array('method' => 'post', 'id' => 'reportform' , 'onsubmit' => 'return checkForBlank()'))?>
 <!-- <?php print_r($arrData) ?>  -->
 <br><br><br><br>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label"><strong>Type of Reports :  </strong><span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                   <select type="text" class="form-control" name="strReports" value="<?=!empty($this->session->userdata('strReports'))?$this->session->userdata('strReports'):''?>" required>
                         <option value="">Select</option>
                         <option value=""></option>
                        <?php foreach($arrReports as $report)
                        {
                          echo '<option value="'.$report['reportCode'].'">'.$report['reportDesc'].'</option>';
                        }?>
                  </select>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="idnum"></span></font>
                </div>
            </div>
         </div>
         <br>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Select Name Per : <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <select name="strSelectPer" id="strSelectPer" type="text" class="form-control" value="<?=!empty($this->session->userdata('strSelectPer'))?$this->session->userdata('strSelectPer'):''?>">
                    <option value="">Select</option>
                    <option value=""></option>
                    <option value="All Employees">All Employees</option>
                    <option value="Per Employee">Per Employee</option>
                    </select>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="salutation"></span></font>
                </div>
            </div>
         </div>   
         <br>
         <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Employees :</label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <select type="text" class="form-control" name="strEmpName" value="<?=!empty($this->session->userdata('strEmpName'))?$this->session->userdata('strEmpName'):''?>" required>
                        <option value="">Select</option>
                        <?php foreach($arrEmployees as $i=>$data): ?>
                        <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname']).', '.($data['firstname']).' '.($data['middleInitial']).' '.($data['nameExtension']))?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="salutation"></span></font>
                </div>
            </div>
         </div>   
         <br><br>
           <div class="row">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <input type="checkbox" checked="checked" value="Letterhead" name="ch1"/><label for="latest-events">Letterhead</label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <font color='red'> <span id="salutation"></span></font>
                </div>
            </div>
         </div>
         
        <br><br>
       <div class="row">
          <div class="col-sm-12 text-center">
              <button type="print" class="btn btn-primary">Print/Preview</button>
          </div>
        </div>
    <br><br>
<?=form_close()?>
