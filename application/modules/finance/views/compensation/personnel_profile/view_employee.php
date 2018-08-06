<?php load_plugin('css',array('datatable'));?>
<!-- <pre><?php print_r($arrData); ?></pre> -->
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
<br>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Personnel Profile</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="tabbable-line tabbable-full-width col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-profile" data-toggle="tab"> Personnel Profile </a>
                                    </li>
                                    <li>
                                        <a href="#tab-income" data-toggle="tab"> Income </a>
                                    </li>
                                    <li>
                                        <a href="#tab-deduction" data-toggle="tab"> Deduction Summary </a>
                                    </li>
                                    <li>
                                        <a href="#tab-premiumLoans" data-toggle="tab"> Premiums/Loans </a>
                                    </li>
                                    <li>
                                        <a href="#tab-remittances" data-toggle="tab"> Remittances </a>
                                    </li>
                                    <li>
                                        <a href="#tab-tax" data-toggle="tab"> Tax Details </a>
                                    </li>
                                    <li>
                                        <a href="#tab-dtr" data-toggle="tab"> DTR </a>
                                    </li>
                                    <li>
                                        <a href="#tab-adjustments" data-toggle="tab"> Adjustments </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab-profile">
                                        <?php include('_personnelProfile.php') ?>
                                    </div>

                                    <div class="tab-pane fade" id="tab-income">
                                        <?php include('_income.php') ?>
                                    </div>

                                    <div class="tab-pane fade" id="tab-deduction">
                                        <?php include('_deduction_summary.php') ?>
                                    </div>

                                    <div class="tab-pane fade" id="tab-premiumLoans">
                                        <?php include('_premiumLoans.php') ?>
                                    </div>

                                    <div class="tab-pane fade" id="tab-remittances">
                                        <?php include('_remittances.php') ?>
                                    </div>

                                    <div class="tab-pane fade" id="tab-tax">
                                        <?php include('_tax_details.php') ?>
                                    </div>

                                    <div class="tab-pane fade" id="tab-dtr">
                                        <p> Food truck fixie locavore,  </p>
                                    </div>

                                    <div class="tab-pane fade" id="tab-adjustments">
                                        <?php include('_adjustments.php') ?>
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
<?php load_plugin('js',array('datatable'));?>