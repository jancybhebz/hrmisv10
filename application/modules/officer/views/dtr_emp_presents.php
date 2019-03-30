<?php load_plugin('css',array('datatables'));?>
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
            <span>Attendance</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Employees Present</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<br>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase"> Employees Present for the day</span>
                </div>
            </div>
            
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="table-employees">
                            <thead>
                                <th width="50px;">No</th>
                                <th>Employee</th>
                                <th style="text-align: center;">Time in</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($arremployees as $employee): ?>
                                <tr>
                                    <td align="center"><?=$no++?></td>
                                    <td style="width: 70%;"><?=getfullname($employee['empdetails']['firstname'], $employee['empdetails']['surname'], $employee['empdetails']['middlename'], $employee['empdetails']['middleInitial'])?></td>
                                    <td align="center"><?=$employee['dtr'][0]['inAM']?></td>
                                    <td><center>
                                    	<a href="<?=base_url('hr/attendance_summary/dtr/'.$employee['empdetails']['empNumber'])?>" class="btn btn-sm grey-cascade"> <i class="icon-calendar"></i>&nbsp; View DTR </a>
                                    </center></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php load_plugin('js',array('datatables'));?>

<script>
    $(document).ready(function() {
        $('#table-employees').dataTable();
    });
</script>