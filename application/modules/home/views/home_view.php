<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
	<h3 class="page-title"> Welcome,
	    <strong><i><?=$this->session->userdata('sessName')?></i></strong>
	</h3>
	</div>
</div>
<div class="clearfix"></div>
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-birthday-cake"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="58">0</span>
                </div>
                <div class="desc"> Birthday</div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-child"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="37">0</span> </div>
                <div class="desc"> Vacant Position </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-gift"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="1">0</span>
                </div>
                <div class="desc"> Retiree </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="11"></span> </div>
                <div class="desc"> Step Increment </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS -->
<!-- BEGIN APPOINTMENT STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-sharp">
            <div class="visual">
                <i class="fa fa-group"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="127">0</span>
                </div>
                <div class="desc"> PERMANENT</div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-pink">
            <div class="visual">
                <i class="fa fa-group"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="90">0</span> </div>
                <div class="desc"> GIA </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-meadow">
            <div class="visual">
                <i class="fa fa-group"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="34">0</span>
                </div>
                <div class="desc"> Job Order </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-group"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="0"></span> </div>
                <div class="desc"> Others </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- END APPOINTMENT STATS -->
<script src="<?=base_url('assets/plugins/counterup/jquery.waypoints.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/plugins/counterup/jquery.counterup.min.js')?>" type="text/javascript"></script>