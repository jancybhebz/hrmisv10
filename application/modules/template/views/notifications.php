<ul class="nav navbar-nav pull-right">
    <!-- BEGIN NOTIFICATION DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="icon-bell"></i>
            <span class="badge badge-default"> 7 </span>
        </a>
        <ul class="dropdown-menu">
            <li class="external">
                <h3>
                    <span class="bold">12 pensdding</span> notifications</h3>
                <a href="<?=base_url('employee/notification')?>">view all</a>
            </li>
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                    <li>
                        <a href="javascript:;">
                            <span class="time">just now</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                </span> New user registered. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">3 mins</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                </span> Server #12 overloaded. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">10 mins</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                </span> Server #2 not responding. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">14 hrs</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                </span> Application error. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">2 days</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                </span> Database overloaded 68%. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">3 days</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                </span> A user IP blocked. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">4 days</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                </span> Storage Server #4 not responding dfdfdfd. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">5 days</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                </span> System Error. </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="time">9 days</span>
                            <span class="details">
                                <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                </span> Storage server failed. </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        
    </li>

    <!-- END NOTIFICATION DROPDOWN -->


    <!-- BEGIN CONTROL PANEL -->
    <li class="dropdown dropdown-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle" src="<?=base_url('assets/images/logo.png')?>" />
            <span class="username username-hide-on-mobile"> <?=$this->session->userdata('sessName')?> </span>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-default">
            <!-- begin HR switch account -->
            <?php if($_SESSION['sessUserLevel'] == 1 && $_SESSION['sessUserPermission'] == 'HR Officer'): ?>
                <li>
                    <a href="<?=base_url('home/switch_hr_emp')?>">
                        <i class="icon-user"></i> Employee Module </a>
                </li>
            <?php endif; ?>
            <?php if($_SESSION['sessUserLevel'] == 5 && $_SESSION['sessUserPermission'] == 'HR Officer'): ?>
                <li>
                    <a href="<?=base_url('home/switch_emp_hr')?>">
                        <i class="icon-user"></i> HR Module </a>
                </li>
            <?php endif; ?>
            <!-- end HR switch account -->

            <!-- begin Finance switch account -->
            <?php if($_SESSION['sessUserLevel'] == 2 && $_SESSION['sessUserPermission'] == 'Cashier Officer'): ?>
                <li>
                    <a href="<?=base_url('home/switch_fin_emp')?>">
                        <i class="icon-user"></i> Employee Module </a>
                </li>
            <?php endif; ?>
            <?php if($_SESSION['sessUserLevel'] == 5 && $_SESSION['sessUserPermission'] == 'Cashier Officer'): ?>
                <li>
                    <a href="<?=base_url('home/switch_emp_fin')?>">
                        <i class="icon-user"></i> Finance Module </a>
                </li>
            <?php endif; ?>
            <!-- end Finance switch account -->
            <li>
                <a href="#">
                    <i class="icon-lock"></i> Change Password </a>
            </li>
            <li>
                <a href="<?=base_url('logout');?>">
                    <i class="icon-key"></i> Log Out </a>
            </li>
        </ul>
    </li>
    <!-- END CONTROL PANEL -->
    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
        <a href="javascript:;" class="dropdown-toggle">
            <i class="icon-logout"></i>
        </a>
    </li> -->
    <!-- END QUICK SIDEBAR TOGGLER -->
    </ul>

