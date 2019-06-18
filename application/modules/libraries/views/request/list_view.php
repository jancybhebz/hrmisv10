<?php 
/** 
Purpose of file:    List page for Request Signatories Library
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
                    <span class="caption-subject bold uppercase"> REQUEST SIGNATORIES</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?=base_url('libraries/request/add')?>"><button id="sample_editable_1_new" class="btn sbold btn-primary"> <i class="fa fa-plus"></i> Add New
                                    
                                </button></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="libraries_request">
                    <thead>
                        <tr>
                            <th> No. </th>  
                            <th> Type of Request </th>
                            <th> Applicant </th>
                            <th> 1st Signatory </th>
                            <th> 2nd Signatory </th>
                            <th> 3rd Signatory </th>
                            <th> Final Signatory </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;foreach($arrRequest as $request): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$request['RequestType']?></td>
                                <td><?=$request['Applicant']?></td>
                                <td><?=$request['Signatory1']?></td>
                                <td><?=$request['Signatory2']?></td>
                                <td><?=$request['Signatory3']?></td>
                                <td><?=$request['SignatoryFin']?></td>
                                <!-- <td>
                                    
                                        // $signfin = explode(';',$request['SignatoryFin']);
                                        // if(count($signfin) == 3):
                                        //     echo $signfin[0].' - ';
                                        //     echo employee_name($signfin[2]);
                                        // endif;

                                        // if(count($signfin) == 2):
                                        //     echo $signfin[0].' - ';
                                        //     echo employee_name($signfin[1]);
                                        // endif;
                                    
                                </td> -->
                                <td>
                                <a href="<?=base_url('libraries/request/edit/'.$request['reqID'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                <a href="<?=base_url('libraries/request/delete/'.$request['reqID'])?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                               
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <tbody>
                    <?php 
                    $i=1;
                    foreach($arrRequest as $request):?>
                        <tr class="odd gradeX">
                            <td> <?=$i?> </td>
                            <td> <?=$request['RequestType']?> </td>
                            <td> <?=$request['Applicant']?> </td>
                            <?php $arrSig1 = explode(';', $request['Signatory1']);?>
                            <td> <?php 
                                if (count($arrSig1)>2)
                                { 
                                    echo $arrSig1[0].' - '.employee_name($arrSig1[2]);
                                } 
                                else if (count($arrSig1)==0)
                                { 
                                    echo employee_name($arrSig1[0]);
                                } ?>
                            <?php $arrSig2 = explode(';', $request['Signatory2']);?>
                            <td> <?php 
                                if (count($arrSig2)>2)
                                { 
                                    echo $arrSig2[0].' - '.employee_name($arrSig2[2]);
                                } 
                                else if (count($arrSig2)==1)
                                { 
                                    echo employee_name($arrSig2[0]);
                                } ?>
                            <?php $arrSig3 = explode(';', $request['Signatory3']);?>
                            <td> <?php 
                                if (count($arrSig3)>2)
                                { 
                                    echo $arrSig3[0].' - '.employee_name($arrSig3[2]);
                                } 
                                else if (count($arrSig3)==1)
                                { 
                                    echo employee_name($arrSig3[0]);
                                } ?>
                                <?php $arrSigFin = explode(';', $request['SignatoryFin']);?>
                                <td> <?php 
                                if (count($arrSigFin)>2)
                                { 
                                    echo $arrSigFin[0].' - '.employee_name($arrSigFin[2]);
                                } 
                                else if (count($arrSigFin)==1)
                                { 
                                    echo employee_name($arrSigFin[0]);
                                } ?>
                            </td> 
                            <td>
                                <a href="<?=base_url('libraries/request/edit/'.$request['reqID'])?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                <a href="<?=base_url('libraries/request/delete/'.$request['reqID'])?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a>
                               
                            </td>
                        </tr>
                    <?php 
                    $i++;
                    endforeach;?>
                    </tbody> -->
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<?php load_plugin('js',array('datatables'));?>


<script>
    $(document).ready(function() {
        Datatables.init('libraries_request');
  });
</script>