<?php 
/** 
Purpose of file:    List page for Salary Schedule Library
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
                    <span class="caption-subject bold uppercase"> SALARY SCHEDULE</span>
                </div>
            </div>

             <div class="portlet-title">
                    <div class="btn-group">
                        <a href="<?=base_url('libraries/salary_sched/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Create New Salary Schedule Name
                        </button></a>
                        <a href="<?=base_url('libraries/salary_sched/add_existing')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Create New Salary Schedule from Existing
                        </button></a>
                        <a href="<?=base_url('libraries/salary_sched/add_sched')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New Salary Schedule
                        </button></a>
                    </div>
                    <br><br>
                </div>

            <div class="portlet-body">
               <?=form_open(base_url('libraries/salary_sched'), array('method' => 'post', 'class' => 'form-horizontal'))?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Other Version</label>
                        <div class="col-md-6">
                            <select type="text" class="form-control" name="strversion">
                                    <?php foreach($arrSalary as $sched): ?>
                                            <option value="<?=$sched['version']?>" 
                                                <?=isset($intVersion) ? $intVersion == $sched['version'] ? 'selected' : '' : ''?>>
                                                <?=$sched['title']?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" id="updateSalary" class="btn btn-primary">Activate Salary Schedule</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                <?=form_close()?>
            <br>

               
                <div class="portlet-body">
                    <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_salary_sched" style="visibility: hidden;">
                        <thead>
                            <tr>
                                <th>SG</th>
                                <?php foreach($stepNumber as $column): ?>
                                    <th>STEP <?=$column['stepNumber']?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($sggradeNumber as $row): ?>
                            <tr>
                                <td><?=$row['salaryGradeNumber']?></td>
                                <?php foreach($stepNumber as $column): ?>
                                    <td><?php
                                            $search = ["stepNumber" => $column['stepNumber'], "salaryGradeNumber" => $row['salaryGradeNumber']];
                                            $keys = array_keys(
                                                array_filter(
                                                    $arrSalarysched,
                                                    function ($v) use ($search) { return $v['stepNumber'] == $search['stepNumber'] && $v['salaryGradeNumber'] == $search['salaryGradeNumber']; }
                                                )
                                            );
                                            $actual_salary = count($keys) > 0 ? $arrSalarysched[$keys[0]]['actualSalary'] : '';
                                            echo '<a href="'.base_url('libraries/salary_sched/edit/'.$row['salaryGradeNumber'].'/'.$column['stepNumber'].'/'.$actual_salary.'/'.$intVersion).'">'.$actual_salary.'</a>';
                                        ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>   
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<?php load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#libraries_salary_sched').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#libraries_salary_sched').css('visibility', 'visible');
            }} );
        $("#updateSalary").click(function(){
           
            var x=confirm("Warning: This will update Plantilla library and salaries of employees. Do you want to continue?");
            if (!x) return;
            var vid=$("#version").val();
            $("#updatediv").html("checking <img src='../images/indicator.gif'>  ");
            $("#updatediv").load("salary_sched.php?strEmpNmbr=<? echo $strEmpNmbr;?>&mode=updatesalary&version="+vid);
        
            });

});

</script>

