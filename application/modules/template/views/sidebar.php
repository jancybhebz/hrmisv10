<?php 
//set active for menu highlight
$active=$this->uri->segment(1)!=''?$this->uri->segment(1):'home';
//set activesub for submenu highlight
$activesub=$this->uri->segment(2)!=''?$this->uri->segment(2):'';
$activetab=$this->uri->segment(3)!=''?$this->uri->segment(3):'';
?>
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- <li class="heading"><h3 class="uppercase"><?=$this->session->userdata('sessUserPermission')?></h3></li> -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <?php if($this->session->userdata('sessUserLevel')==1):?>
            <li class="sidebar-search-wrapper">
                <!-- DISPLAY MODULE -->
                
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="<?=base_url('hr/search')?>" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="strSearch" autocomplete="off">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
        <?php endif;?>
            <!-- HR MODULE -->
            <?php if($this->session->userdata('sessUserLevel')==1):?>
            <li class="nav-item start <?=$active=='home'?'active open':''?>">
                <a href="<?=base_url('home')?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow"></span>
                </a>                            
            </li>                            
            <li class="nav-item  ">
                <a href="<?=base_url('pds')?>" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">201</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Attendance</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item  ">
                 <a href="<?=base_url('hr/reports')?>" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Reports</span>
                    <span class="arrow"></span>
                </a>                            
            </li>
            <li class="nav-item <?=$active=='libraries'?'active open':''?>">
                <a href="<?=base_url('libraries')?>" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Libraries</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <?php 
                        //get library menu item from menu_helper
                        $arrMenu = get_libraries();
                        foreach($arrMenu as $i=>$menuItem){
                    ?>
                    <li class="nav-item start <?=$activesub==$i?'active':''?>">
                        <a href="<?=base_url('libraries/'.$i)?>" class="nav-link ">
                            <span class="title"><?=$menuItem?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bulb"></i>
                    <span class="title">Compensation</span>
                    <span class="arrow"></span>
                </a>
            </li>

             <li class="heading">
                <h3 class="uppercase">Employee Module</h3>
            </li>
           <!-- request -->
           <li class="nav-item <?=$active=='request'?'active open':''?>">
                <a href="<?=base_url('request')?>" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Request</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <?php 
                        //get request menu item from menu_helper
                        $arrMenu = get_request();
                        foreach($arrMenu as $i=>$menuItem){
                    ?>
                    <li class="nav-item start <?=$activesub==$i?'active':''?>">
                        <a href="<?=base_url('employee/'.$i)?>" class="nav-link ">
                            <span class="title"><?=$menuItem?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                
            </li>
             <li class="nav-item <?=$active=='employee/notification'?'active open':''?>">
                <a href="<?=base_url('employee/notification')?>" class="nav-link nav-toggle">
                    <i class="icon-bell"></i>
                    <span class="title">Notification</span>
                    <span class="arrow"></span>
                </a>
            </li>
        <?php endif;?>
             <li class="heading">
                <h3 class="uppercase">Finance Module</h3>
            </li>
            <li class="nav-item <?=strtolower($activesub)=='compensation'?'active open':''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Compensation</span>
                    <span class="arrow <?=strtolower($activesub)=='compensation'?'open':''?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?=strtolower($activetab)=='personnel_profile'?'active open':''?>">
                        <a href="<?=base_url('finance/compensation/personnel_profile')?>">
                            <span class="title">Personnel Profile</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?=strtolower($activesub)=='reports'?'active open':''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Reports</span>
                    <span class="arrow <?=strtolower($activesub)=='reports'?'open':''?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?=strtolower($activetab)=='monthly'?'active open':''?>">
                        <a href="<?=base_url('finance/reports/monthly')?>">
                            <span class="title">Monthly Reports</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='remittance'?'active open':''?>">
                        <a href="<?=base_url('finance/reports/remittance')?>">
                            <span class="title">Employee Remittances</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='loanbalance'?'active open':''?>">
                        <a href="<?=base_url('finance/reports/loanbalance')?>">
                            <span class="title">Employee Loan balance</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?=strtolower($activesub)=='libraries'?'active open':''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Libraries</span>
                    <span class="arrow <?=strtolower($activesub)=='libraries'?'open':''?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?=strtolower($activetab)=='deductions' || strtolower($activetab)=='agency'?'active open':''?>">
                        <a href="<?=base_url('finance/libraries/deductions')?>">
                            <span class="title">Deduction</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='income'?'active open':''?>">
                        <a href="<?=base_url('finance/libraries/income')?>">
                            <span class="title">Income</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='payrollprocess'?'active open':''?>">
                        <a href="<?=base_url('finance/libraries/payrollprocess')?>"">
                            <span class="title">Payroll Process</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='projectcode'?'active open':''?>">
                        <a href="<?=base_url('finance/libraries/projectcode')?>"">
                            <span class="title">Project Code</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='payrollgroup'?'active open':''?>">
                        <a href="<?=base_url('finance/libraries/payrollgroup')?>"">
                            <span class="title">Payroll Group</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='signatory'?'active open':''?>">
                        <a href="<?=base_url('finance/libraries/signatory')?>"">
                            <span class="title">Signatory</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?=strtolower($activesub)=='notifications'?'active open':''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bell"></i>
                    <span class="title">Notifications</span>
                    <span class="arrow <?=strtolower($activesub)=='notifications'?'open':''?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?=strtolower($activetab)=='npayroll'?'active open':''?>">
                        <a href="<?=base_url('finance/notifications/npayroll')?>"">
                            <span class="title">Included in Payroll</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='matureloans'?'active open':''?>">
                        <a href="<?=base_url('finance/notifications/matureloans')?>"">
                            <span class="title">Maturing Loans</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activetab)=='nlongi'?'active open':''?>">
                        <a href="<?=base_url('finance/notifications/nlongi')?>"">
                            <span class="title">Increase in Longevity Factor</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?=strtolower($activesub)=='payroll_update'?'active open':''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Update</span>
                    <span class="arrow <?=strtolower($activesub)=='payroll_update'?'open':''?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?=strtolower($activetab)=='process'?'active open':''?>">
                        <a href="<?=base_url('finance/payroll_update/process')?>"">
                            <span class="title">Process Payroll</span>
                        </a>
                    </li>
                    <li class="nav-item start <?=strtolower($activetab)=='update_or'?'active open':''?>">
                        <a href="<?=base_url('finance/payroll_update/update_or')?>"">
                            <span class="title">Update OR Remittances</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Quicklinks</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">FAQ</span>
                    <span class="arrow"></span>
                </a>                    
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Online Help</span>
                    <span class="arrow"></span>
                </a>                    
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <!-- END SIDEBAR -->