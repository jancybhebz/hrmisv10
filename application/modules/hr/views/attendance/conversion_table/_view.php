<?=load_plugin('js', array('datatables'))?>
<style>
    table, tr, td, th {
        text-align: center;
    }
</style>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Finance Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Libraries</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>List of Employees</span>
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
<div class="row profile-account">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> List of Employees</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <div class="portlet-body"  id="conversion_view" style="display: none">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $this_page = $this->uri->segment(4);?>
                                    <div class="tabbable-line tabbable-full-width col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#conv-tbl1" data-toggle="tab">Conversion Table 1</a>
                                            </li>
                                            <li>
                                                <a href="#conv-tbl2" data-toggle="tab">Conversion Table 2</a>
                                            </li>
                                            <li>
                                                <a href="#conv-tbl3" data-toggle="tab">Conversion Table 3</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="conv-tbl1">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-8">
                                                        <h5 class="bold">VACATION AND SICK LEAVE CREDITS EARNED ON A DAILY BASIS</h5>
                                                        <table class="table table-striped table-bordered order-column" id="table-convii">
                                                            <thead>
                                                                <tr>
                                                                    <th class="no-sort">Number of Days</th>
                                                                    <th class="no-sort">Vacation Leave Earned</th>
                                                                    <th class="no-sort">Sick Leave Earned</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($convii as $i): ?>
                                                                <tr>
                                                                    <td><?=$i['days']?></td>
                                                                    <td><?=$i['vl']?></td>
                                                                    <td><?=$i['sl']?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="conv-tbl2">
                                                <h5 class="bold">CONVERSION OF WORKING HOURS/MINUTES INTO FRACTIONS OF A DAY</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-striped table-bordered order-column" id="table-8hrs">
                                                            <thead>
                                                                <tr><th colspan="3">Based on 8-Hour Workday</th></tr>
                                                                <tr>
                                                                    <th class="no-sort">Hours</th>
                                                                    <th class="no-sort">Equivalent Day</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($conv8hrs as $i): ?>
                                                                <tr>
                                                                    <td><?=$i['hrs']?></td>
                                                                    <td><?=$i['days']?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table table-striped table-bordered order-column" id="table-conviii">
                                                            <thead>
                                                                <tr>
                                                                    <th class="no-sort">Minutes</th>
                                                                    <th class="no-sort">Equivalent Day</th>
                                                                    <th class="no-sort">Minutes</th>
                                                                    <th class="no-sort">Equivalent Day</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($conviii as $i): ?>
                                                                <tr>
                                                                    <td><?=$i['mins1']?></td>
                                                                    <td><?=$i['day1']?></td>
                                                                    <td><?=$i['mins2']?></td>
                                                                    <td><?=$i['day2']?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="conv-tbl3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="bold">VACATION AND SICK LEAVE CREDITS EARNED ON A DAILY BASIS</h5>
                                                        <table class="table table-striped table-bordered order-column" id="table-convii">
                                                            <thead>
                                                                <tr>
                                                                    <th class="no-sort">Number of Days Present</th>
                                                                    <th class="no-sort">Number of Days On Leave Without Pay</th>
                                                                    <th class="no-sort">Leave Credits Earned</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($conviv1 as $i): ?>
                                                                <tr>
                                                                    <td><?=number_format($i['daysp1'], 2)?></td>
                                                                    <td><?=number_format($i['dayslwop1'], 2)?></td>
                                                                    <td><?=number_format($i['dayscredit1'], 2)?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>&nbsp;</h5>
                                                        <table class="table table-striped table-bordered order-column" id="table-convii">
                                                            <thead>
                                                                <tr>
                                                                    <th class="no-sort">Number of Days Present</th>
                                                                    <th class="no-sort">Number of Days On Leave Without Pay</th>
                                                                    <th class="no-sort">Leave Credits Earned</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($conviv2 as $i): ?>
                                                                <tr>
                                                                    <td><?=number_format($i['daysp2'], 2)?></td>
                                                                    <td><?=number_format($i['dayslwop2'], 2)?></td>
                                                                    <td><?=number_format($i['dayscredit2'], 2)?></td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('#conversion_view').show();
    });
</script>