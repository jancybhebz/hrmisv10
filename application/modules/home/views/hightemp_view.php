<?php 
/** 
Purpose of file:    Default View for 201
Author:             Francis Nikko V. Perez
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?=load_plugin('css',array('datatables'));?>
<!-- BREADCRUMB -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
      <!--   <li>
            <span>HR Module</span>
            <i class="fa fa-circle"></i>
        </li> -->
        <li>
            <span>201 File</span>
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
                    <i class="icon-user font-dark"></i>
                    <span class="caption-subject bold uppercase"> No. of Personnel w/ temperature above 37.5</span>
                </div>
                
            </div>
            <div class="caption font-dark">
                <div class="row">
                    <label class="col-form-label col-lg-1 col-sm-12">Date filter:</label>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <input type="text" class="form-control form-control-sm date-picker form-required " id="txtdate" name="txtdate" value="<?=$this->uri->segment(3)?>" data-date-format="yyyy-mm-dd">
                    </div>
                </div>
            </div>
            <div class="portlet-body">
               
                <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tblemployees"  style="display: none">
                    <thead>
                        <tr>
                            <th style="width: 75px;"> No. </th>
                            <th> Name of Employee </th>
                            <th> Office </th>
                            <th style="width: 120px;text-align: center;"> Temperature </th>
                            <th style="text-align: center;"> WFH </th>
                            <th>HCD Form</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($arrData as $row):?>
                            <tr class="odd gradeX">
                                <td> <?=$i++?> </td>
                                <td> <a href="<?=base_url('hr/profile').'/'.$row['empNumber']?>"><?=$row['fullName']?></a></td>
                                <td> <?=employee_office($row['empNumber'])?> </td>
                                <td align="center"> <?=$row['temperature']?></td>
                                <td align="center"> <input type="checkbox" <?=($row['wfh'] == 1) ? 'checked="checked"' : ''?> name="chkwfh" disabled  /></td>
                                <td align="center"><button type="button" class="btn btn-info" onclick="hcdForm('<?=$row['empNumber']?>')">Details</button></i></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<?php include('_hcd_modal.php'); ?>
<?=load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#tblemployees').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#tblemployees').show();
            }} );

        $('#txtdate').change(function() {
            var _href = "<?=base_url('home/withhightemp')?>";
            _href = _href + '/' + $('#txtdate').val();

            // window.location.href = _href, true;
            setTimeout(function(){document.location.href = _href, true},100);
        });

        var dt = $('.date-picker').datepicker({autoclose: true, });
        $("#hcd_form :input").prop("disabled", true);
    });

    function hcdForm(empNumber){
        var oldURL = window.location.toString();
        var index = 0;
        var newURL = oldURL;
        index = oldURL.indexOf('home');
        if(index == -1){
            index = oldURL.indexOf('?');
        }
        if(index != -1){
            newURL = oldURL.substring(0, index);
        }

        $.ajax({
            type: "GET",
            dataType: "json",
            data: {empNumber: empNumber, dtrDate: $('#txtdate').val()},
            url: newURL+"home/hcdform/",
            success: function (data) {
                $('#hcd-modal').modal('show');

                $("#hcd_form :input[type='text']").val("");
                
                // $('#tblhcd tr').each(function (index) {
                //     $(this).find('input[type="radio"]').parents('span').removeClass('checked');
                // });
                $("#hcd_form :input[type='radio']").parents('span').removeClass('checked');

                $('#txtempno').val(data.empNumber);
                $('#hcd_form #txtdate').val(data.dtrDate);
                $('#txttemp').val(data.temperature);
                $('#txtname').val(data.fullName);
                $('input[name=rdosex][value=' + data.sex + ']').prop('checked', true);
                $('input[name=rdosex][value=' + data.sex + ']').parents('span').addClass('checked');
                $('#txtage').val(data.age);
                $('#txtrescon').val(data.residence_contact);

                $('#txtwfh').val(data.wfh);
                if(data.wfh != 1){
                    $('.iswfh').show();
                    $('input[name=rdonvisit][value=' + data.natureVisit + ']').prop('checked', true);
                    $('input[name=rdonvisit][value=' + data.natureVisit + ']').parents('span').addClass('checked');
                    $('input[name=rdonob][value=' + data.natureOb + ']').prop('checked', true);
                    $('input[name=rdonob][value=' + data.natureOb + ']').parents('span').addClass('checked');
                }
                else{
                    $('.iswfh').hide();
                }

                $('input[name=rdoq1_1][value=' + data.q1_1 + ']').prop('checked', true);
                $('input[name=rdoq1_1][value=' + data.q1_1 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_2][value=' + data.q1_2 + ']').prop('checked', true);
                $('input[name=rdoq1_2][value=' + data.q1_2 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_3][value=' + data.q1_3 + ']').prop('checked', true);
                $('input[name=rdoq1_3][value=' + data.q1_3 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_4][value=' + data.q1_4 + ']').prop('checked', true);
                $('input[name=rdoq1_4][value=' + data.q1_4 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_5][value=' + data.q1_5 + ']').prop('checked', true);
                $('input[name=rdoq1_5][value=' + data.q1_5 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_6][value=' + data.q1_6 + ']').prop('checked', true);
                $('input[name=rdoq1_6][value=' + data.q1_6 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_7][value=' + data.q1_7 + ']').prop('checked', true);
                $('input[name=rdoq1_7][value=' + data.q1_7 + ']').parents('span').addClass('checked');
                $('input[name=rdoq2][value=' + data.q2 + ']').prop('checked', true);
                $('input[name=rdoq2][value=' + data.q2 + ']').parents('span').addClass('checked');
                $('input[name=rdoq3][value=' + data.q3 + ']').prop('checked', true);
                $('input[name=rdoq3][value=' + data.q3 + ']').parents('span').addClass('checked');
                $('input[name=rdoq4][value=' + data.q4 + ']').prop('checked', true);
                $('input[name=rdoq4][value=' + data.q4 + ']').parents('span').addClass('checked');
                $('input[name=rdoq5][value=' + data.q5 + ']').prop('checked', true);
                $('input[name=rdoq5][value=' + data.q5 + ']').parents('span').addClass('checked');
                
                $('#txtq5').val(data.q5_txt);
            }
        }).fail(function () {
            toastr.error("An error has occurred. Please try again later.");
        });
    }

    function savePDF(){
        var doc = new jsPDF();

        doc.setFontSize(10);
        doc.setFontType('bold');
        doc.text(170, 15, 'Annex A');
        doc.text(80, 20, 'Health Check Declaration Form');

        doc.setFontType('normal');
        doc.setFontSize(10);
        doc.text(20, 35, 'Date:');
        doc.text(55, 35, $('#txtdate').val());
        doc.line(55, 36, 110, 36);

        doc.text(120, 35, 'Temperature:');
        doc.text(150, 35, $('#txttemp').val());
        doc.line(150, 36, 180, 36);

        doc.text(20, 45, 'Name:');
        doc.text(55, 45, $('#txtname').val());
        doc.line(55, 46, 110, 46);

        doc.text(120, 45, 'Sex:');
        doc.text(145, 45, 'Male');
        doc.text(145, 55, 'Female');
        doc.line(139, 46, 144, 46);
        doc.line(139, 56, 144, 56);
        $("input[name='rdosex']:checked").val() == 'M' ?  doc.text(141, 45, '/') :  doc.text(141, 55, '/');

        doc.text(160, 45, 'Age:');
        doc.text(175, 45, $('#txtage').val());
        doc.line(174, 46, 180, 46);

        doc.text(20, 65, 'Residence &');
        doc.text(20, 70, 'Contact No.:');
        doc.text($('#txtrescon').val(), 55, 65, {maxWidth: 120, align: "justify"});
        doc.line(55, 71, 180, 71);

        if($("#txtwfh").val() == 0){    
            doc.text(20, 80, 'Nature of Visit:');   
            doc.text(20, 85, '(Please check one)'); 
            doc.text(65, 80, 'Official');   
            doc.text(65, 85, 'Personal');   
            doc.line(59, 81, 64, 81);   
            doc.line(59, 86, 64, 86);   
            $("input[name='rdonvisit']:checked").val() == 'Official' ? doc.text(62, 80, '/') :  doc.text(62, 85, '/');  
            
            doc.text(100, 80, 'Nature of Official Business:');  
            doc.text(100, 85, '(Please check one)');    
            doc.text(155, 80, 'Employee');  
            doc.text(155, 85, 'Client');    
            doc.line(149, 81, 154, 81); 
            doc.line(149, 86, 154, 86); 
            $("input[name='rdonob']:checked").val() == 'Employee' ? doc.text(151, 80, '/') :  doc.text(151, 85, '/');   
        }   

        doc.text($('#lblconsent').text(), 20, 265-35, {maxWidth: 170, align: "justify"});


        var table = document.getElementById('tblhcd');
        var columns = [" ", "Yes", "No"];
        var rows = [];
        var chckr = 0;

        $('#tblhcd tr').each(function (index) {
            yes = "";
            no = "";
            qsn = (table.rows[index].cells[0].textContent.trim());

            if(!$(this).find('input[type="radio"]').is(":checked")){
                yes = "";
                no = "";
                chckr++;
            } else {
                if($(this).find('input[type="radio"]:checked').val() == 1)
                    yes = '  /';
                else
                    no = ' /';

                chckr = 0;
            }

            if(qsn.charAt(0) == "*")
                qsn = '\t'+qsn;

            if(qsn.charAt(0) == "5")
                qsn = qsn + '                                   ' + $('#txtq5').val();

            rows.push([qsn,yes,no]);
        });
        
        rows = rows.slice(0);
        rows.splice(1 - 1, 1);

        doc.autoTable(
            columns, 
            rows,
            {
                theme: 'grid', 
                // margin: { left: 10 },
                startY: 125-35, 
                // tableWidth: 180,    
                styles: { textColor: [0, 0, 0], fontSize: 10, fillColor: [255, 255, 255], halign: 'justify' },
                columnStyles: {
                  0: {
                    cellWidth: 'auto'
                  }
                }
            });           

        // Save the PDF
        doc.save('hcdform_'+$('#txtempno').val()+'_'+$('#txtdate').val()+'.pdf');
    }
</script>
<link href="<?=base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')?>" rel="stylesheet" type="text/css" />
<script src="<?=base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/plugins/jspdf/jspdf.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jspdf/jspdf-autotable.js')?>"></script>

