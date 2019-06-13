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
                    <label class="control-label">Type of Reports :  <span class="required"> * </span></label>
                </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                   <select type="text" class="form-control" name="strReports" value="<?=!empty($this->session->userdata('strReports'))?$this->session->userdata('strReports'):''?>" required>
                         <option value="">Select</option>
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
         <div class="row per-block">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Select Name Per : </label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                    <select name="strSelectPer" id="strSelectPer" type="text" class="form-control" value="<?=!empty($this->session->userdata('strSelectPer'))?$this->session->userdata('strSelectPer'):''?>">
                    <option value="">Select</option>
                    <option value="0">All Employees</option>
                    <option value="1">Per Employee</option>
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
         <div class="row employee-block">
             <div class="col-sm-3 text-right">
                <div class="form-group">
                    <label class="control-label">Employees :</label>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="form-group">
                     <select type="text" class="form-control" name="strEmpName" value="<?=!empty($this->session->userdata('strEmpName'))?$this->session->userdata('strEmpName'):''?>">
                        <option value="">Select</option>
                        <?php foreach($arrEmployees as $i=>$data): ?>
                        <option value="<?=$data['empNumber']?>"><?=(strtoupper($data['surname'].', '.$data['firstname'].' '.$data['middleInitial'].' '.$data['nameExtension']))?></option>
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
         <!-- fields -->
         <div class="row rpt-fields">
             
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
              <button type="button" class="btn btn-primary" name="btnPrint">Print/Preview</button>
          </div>
        </div>
    <br><br>
<?=form_close()?>

<script>
    $(function(){
        $('.per-block, .employee-block').hide();

        $('select[name="strReports"]').change(function(){
            $rpt = $(this).val();
            
            if($rpt=='' || $rpt=='LEEA' || $rpt=='LEAGE' || $rpt=='LEDH' || $rpt=='LEDB' || $rpt=='LEG' || $rpt=='LELS' || $rpt=='LESG' || $rpt=='LESGA' || $rpt=='LEDBA' || $rpt=='LR' || $rpt=='LVP' || $rpt=='LEA')
                $('.per-block, .employee-block').hide();
            else
                $('.per-block').show();

            $.ajax({
              url: "<?=base_url('hr/reports/getfields')?>/"+$rpt,
              async: false
            }).done(function(data) {
                //console.log(data);
              $( '.rpt-fields' ).html(data);
            });

        });

        $('select[name="strSelectPer"]').change(function(){
            $per = $(this).val();

            if($per==0)
                $('.employee-block').hide();
            else
                $('.employee-block').show();
        }); 

        $('button[name="btnPrint"]').click(function(){
            $rpt = $('select[name="strReports"]').val();
            $empno = $('select[name="strEmpName"]').val();
            $form = $('#reportform').serializeArray();
            $.each($form, function(index,item){
                //if(item.name == 'csrf_dostitd') item.value='<?=time()?>';
                if(item.name == 'csrf_dostitd') delete $form[index];
                //console.log(index+'/'+item.name);
            });
            $form = $.param($form);
            //console.log($form);
            //$form['']
            //$form += '&csrf_dostitd=<?=time()?>';
            //console.log($form);
            //console.log($rpt+$empno);
            if($rpt=='DTR')
            {
                $year=$('select[name="dtrYear"]').val();
                $month=$('select[name="dtrMonth"]').val();
                window.open('<?=base_url('employee/dtr/print_preview')?>/'+$empno+'?yr='+$year+'&month='+$month,'toolbar=0');
                return false;
            }
            if($rpt!='')
                window.open('<?=base_url('reports/generate/report')?>/?rpt='+$rpt+'&empno='+$empno+'&'+$form,'toolbar=0');
        });
    });
</script>
