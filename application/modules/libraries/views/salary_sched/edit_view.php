<?php 
/** 
Purpose of file:    Edit page for Scholarship Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<!-- BEGIN PAGE BAR -->
<?php load_plugin('css',array('datepicker','datatables'));?>

<div class="row">

    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> EDIT SALARY SCHEDULE</span>
                </div>
            </div>
            <?=form_open(base_url('libraries/salary_sched/edit'), array('method' => 'post', 'id' => 'frmSalary', 'name' => 'frmSalary','onSubmit'=>'return checkonsubmit();'))?>
            <div class="form-body">
               <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><b>Version :</b></label>
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    
                                     <select type="text" class="form-control" name="intVersion" value="<?=!empty($this->session->userdata('intVersion'))?$this->session->userdata('intVersion'):''?>" disabled>
                                         <option value="">Select</option>

                                        <?php foreach($arrVersion as $version)
                                        {
                                          echo '<option value="'.$version['version'].'" '.($version['version']==$arrSalarySched[0]['version']?'selected':'').'>'.$version['version'].'</option>';
                                        }?>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            // $version =$arrSalarysched['version'];
                                            // echo  '<input type="text" name="intActualSalary" value="'.$arrSalarySched[0]['actualSalary'].'">';
                                            
                                            echo '<input type="text" name="'.$row['salaryGradeNumber'].'::'.$column['stepNumber'].']" id="'.$row['salaryGradeNumber'].'::'.$column['stepNumber'].'" value='.$actual_salary.'>';        
                                            
                                        ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>

                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!-- <input type="hidden" name="stepNum" value="<?=$arrSalarySched[0]['stepNumber']?>">
                                <input type="hidden" name="SG" value="<?=$arrSalarySched[0]['salaryGradeNumber']?>">
                                <input type="hidden" name="ver" value="<?=$arrSalarySched[0]['version']?>"> -->
                                <button class="btn btn-success" type="submit"><i class="icon-check"></i> Save</button>
                                <a href="<?=base_url('libraries/salary_sched')?>"><button class="btn btn-primary" type="button"><i class="icon-ban"></i> Cancel</button></a>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>

            </div>
            <?=form_close();?>   
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

    
        // $('form[name="frmSalary"]').on('submit',function(e){
            
        // });
});


// function checkonsubmit()
// {
//     alert('aa');
//     $("form[name='frmSalary'] input").each(function(){
//       $this = $(this);
//       inputObj[$this.id] = $this.val();
//     });
//     console.log(inputObj);
//     alert(inputObj);
//     //e.preventDefault();
//     return false;
// }
</script>


<!--  -->