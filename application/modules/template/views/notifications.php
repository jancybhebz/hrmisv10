<ul class="nav navbar-nav pull-right">
    <!-- BEGIN NOTIFICATION DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    
    <!-- begin employee notification -->
    <?php if(in_array($_SESSION['sessUserLevel'], array(5))): ?>
        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-bell"></i>
                <span class="badge badge-default"> <?=count(pending_notif($_SESSION['sessEmpNo'],5))?> </span>
            </a>
            <ul class="dropdown-menu">
                <li class="external">
                    <h3>
                        <span class="bold"><?=count(pending_notif($_SESSION['sessEmpNo'],5))?> pending</span> requests</h3>
                    <a href="<?=base_url('employee/notification')?>">view all</a>
                </li>
                <li>
                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                        <?php foreach(pending_notif($_SESSION['sessEmpNo'],5) as $notif): ?>
                            <li>
                                <a href="javascript:;">
                                    <?php
                                        $now = time();
                                        $your_date = strtotime($notif['requestDate']);
                                        $datediff = $now - $your_date;

                                        $days = round($datediff / (60 * 60 * 24));

                                        switch ($notif['requestCode']):
                                            case 'OB':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-primary">
                                                            <span class="letter">OB</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case '201':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info">
                                                            <span class="letter">201</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Leave':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                            <span class="letter">Leave</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'TO':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                            <span class="letter">TO</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Monetization':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning">
                                                            <span class="letter">Monetization</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Trainings':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info">
                                                            <span class="letter">Trainings</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Commutation':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-default">
                                                            <span class="letter">Commutation</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'DTR':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning">
                                                            <span class="letter">DTR</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Report':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                            <span class="letter">Report</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            default:
                                                return '';
                                                break;
                                        endswitch;
                                        ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <!-- end employee notification -->

    <!-- begin hr notification -->
    <?php if(in_array($_SESSION['sessUserLevel'], array(1))): ?>
        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-bell"></i>
                <span class="badge badge-default"> <?=count(pending_notif($_SESSION['sessEmpNo'],1))?> </span>
            </a>
            <ul class="dropdown-menu">
                <li class="external">
                    <h3>
                        <span class="bold"><?=count(pending_notif($_SESSION['sessEmpNo'],1))?> pending</span> requests</h3>
                    <a href="<?=base_url('employee/notification')?>">view all</a>
                </li>
                <li>
                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                        <?php foreach(pending_notif($_SESSION['sessEmpNo'],1) as $notif): ?>
                            <li>
                                <a href="javascript:;">
                                    <?php
                                        $now = time();
                                        $your_date = strtotime($notif['requestDate']);
                                        $datediff = $now - $your_date;

                                        $days = round($datediff / (60 * 60 * 24));

                                        switch ($notif['requestCode']):
                                            case 'OB':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-primary">
                                                            <span class="letter">OB</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case '201':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info">
                                                            <span class="letter">201</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Leave':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                            <span class="letter">Leave</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'TO':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                            <span class="letter">TO</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Monetization':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning">
                                                            <span class="letter">Monetization</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Trainings':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info">
                                                            <span class="letter">Trainings</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Commutation':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-default">
                                                            <span class="letter">Commutation</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'DTR':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning">
                                                            <span class="letter">DTR</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            case 'Report':
                                                echo '<span class="time">'.$days.' days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                            <span class="letter">Report</span>
                                                            </span> '.$notif['requestStatus'].'
                                                        </span>';
                                                break;
                                            default:
                                                return '';
                                                break;
                                        endswitch;
                                        ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <!-- end HR notification -->

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
                <a href="javascript:;" data-toggle="modal" data-target="#change_password">
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