<?php 
/** 
Purpose of file:    Default View for 201
Author:             Louie Carl R. Mandapat
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
            <a href="#">201</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END BREADCRUMB -->

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> List of Employees</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('hr/add_employee')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Employee</a>&nbsp
                                
                            </div>
                            <div class="btn-group">
                                <a href="<?=base_url('pds/print')?>" class="btn btn-primary"><i class="fa fa-print"></i> Print PDS</a>
                            </div>
                        </div>  
                    </div>

                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tblemployees">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Employee Number </th>
                            <th> Name </th>
                            <th> Office </th>
                            <th> Position </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($arrEmployees as $row):?>
                        <tr class="odd gradeX">
                            <td> <?=$i?> </td>
                            <td> <a href="<?=base_url('hr/profile/').$row['empNumber']?>"><?=$row['empNumber']?></a> </td>
                            <td> <?=$row['surname'].', '.$row['firstname'].' '.$row['middleInitial'].'.'?> </td>
                            <td> <?=employee_office($row['empNumber'])?> </td>
                            <td> <?=$row['positionDesc']?></td>
                            <td>     
                                <a href="<?=base_url('pds/hr/delete/'.$row['empNumber'])?>"><button class="btn btn-sm btn-danger" onclick="return confirmdelete()"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                               
                            </td>
                        </tr>
                    <?php 
                    $i++;
                    endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Plantilla Positions</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chart_plantilla"></div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Gender</span>                
                </div>
            </div>
            <div class="portlet-body">
                <?php //print_r($arrGenderChart);
                //echo "<br><br>";
                //print_r($arrAS);
                //echo "<br><br>";
                $str = 'data: [';$i=0;//$intTotalMale=0;
                foreach($arrASFull as $row):
                    $strAppCode = $arrGenderChart[$row]['M']['appCode'];
                    $arrGenderAS[$strAppCode]['M'] = 0;
                    $arrGenderAS[$strAppCode]['F'] = 0;
                endforeach;
                foreach($arrASFull as $row):
                    $intTotalMale = $arrGenderChart[$row]['M'][0]['total'];
                    $intTotalFemale = $arrGenderChart[$row]['F'][0]['total'];
                    $strAppCode = $arrGenderChart[$row]['M']['appCode'];
                    //echo $row."<br>";
                    //echo $row.'=>'.$strAppCode.'=>M('.$intTotalMale.") F(".$intTotalFemale.")<br><br>";
                   // echo $arrGenderChart[]
                    $arrGenderAS[$strAppCode]['M']+=$intTotalMale;
                    $arrGenderAS[$strAppCode]['F']+=$intTotalFemale;
                        //$intTotalMale += $arrGenderChart[$row]['M'][0]['total'];
                        //echo $arrGenderChart[$row]['M'][0]['total']."<br>";
                        $str .= $i>0?',':'';
                        $str .= 'data: ['.$arrGenderAS[$strAppCode]['M'].', 105, 85, 70]';
                endforeach;

                $str .= ']';
                //echo $intTotalMale;
                //echo $str;
                //print_r($arrGenderAS);
                //echo "<br>";
                ?>
                <div id="chart_gender">
                    
                </div>
                
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<?php load_plugin('js',array('datatable','highcharts'));?>


<script>
    $(document).ready(function() {
        Datatables.init('tblemployees');

        // Build the chart
        $('#chart_plantilla').highcharts({
            chart: {
                height:250,
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>';//: '+ this.percentage +' %
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Plantilla Positions',
                data: [
                    ['Filled',   <?=$intFilled?>],
                    ['Vacant',   <?=$intVacant?>]
                ]
            }]
        });

        $('#chart_gender').highcharts({       
            chart: {                
                height:250
            },
            title: {
                text: ''
            },
            xAxis: {
                <?php 
                $str = "categories: [";$i=0;
                foreach($arrAS as $row):
                    $str .= ($i>0?',':'')."'".appstatus_name($row)."'";
                    $i++;
                endforeach;
                $str .= "]";
                echo $str;
                ?>
                // categories: ['Contractual','Job Order','Permanent']
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' ';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            yAxis: {
                title: {
                    text: 'Employees'
                }
            },
            labels: {
                items: [{
                    html: ' ',
                    style: {
                        left: '40px',
                        top: '8px',
                        color: 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                name: 'Male',
                /*data: [<? for($i=0;$i<count($categories);$i++){
                        echo ($maledata[$i]=="")?0:$maledata[$i];
                        $totalmale+=$maledata[$i];
                        if($i<count($categories)-1) echo ",";
                    }?>]
                    */
                <?php 
                    $str = 'data: [';
                    $i=0;
                    foreach($arrAS as $row):
                        $strAppCode = $arrGenderChart[$row]['M']['appCode'];
                        $arrGenderAS[$strAppCode]['M']+=$intTotalMale;
                        $arrGenderAS[$strAppCode]['F']+=$intTotalFemale;
                        $str .= $i>0?',':'';
                        $str .= $arrGenderAS[$strAppCode]['M'];
                        $i++;
                    endforeach; 
                    $str .= ']';
                    echo $str;
                ?>
                // data: [0,0,0,0] 
                //data: [110, 105, 85, 93, 80]
            }, {
                type: 'column',
                name: 'Female',
                /*data: [<? for($i=0;$i<count($categories);$i++){
                        echo ($femaledata[$i]=="")?0:$femaledata[$i];
                        $totalfemale+=$femaledata[$i];
                        if($i<count($categories)-1) echo ",";
                    }?>]
                    */
                <?php 
                    $str = 'data: [';
                    $i=0;
                    foreach($arrAS as $row):
                        $strAppCode = $arrGenderChart[$row]['F']['appCode'];

                        $arrGenderAS[$strAppCode]['F']+=$intTotalFemale;
                        $str .= $i>0?',':'';
                        $str .= $arrGenderAS[$strAppCode]['F'];
                        $i++;
                    endforeach; 
                    $str .= ']';
                    echo $str;
                ?>
                // data: [0,0,0,0]     
                //data: [145, 122, 90, 106, 98]
            }, //{
                //type: 'spline',
                //name: 'Average',
                /*
                data: [<? for($i=0;$i<count($categories);$i++){
                        echo number_format((($maledata[$i]+$femaledata[$i])/2),2);
                        if($i<count($categories)-1) echo ",";
                    }?>]
                */
                       
                //data: [127.5, 113.5, 87.5, 99.5, 89]
            //}, 
        {
                type: 'pie',
                name: 'Total',
                data: [{
                    name: 'Male',
                    y: <?=$arrGender['intTotalMale']?>,
                    color: Highcharts.getOptions().colors[0]  // Male color
                }, {
                    name: 'Female',
                    y: <?=$arrGender['intTotalFemale']?>,
                    color: Highcharts.getOptions().colors[1] // Female color
                }],
                center: [50, 30],
                size: 75,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
  });//end document ready
</script>

<script>
 function confirmdelete()
  {
    var answer=confirm('Are you sure you want to delete this item?');
    if(!answer) return false;
  }

</script>