<?php 
//set active for menu highlight
$active=$this->uri->segment(1)!=''?$this->uri->segment(1):'home';
//set activesub for submenu highlight
$activesub=$this->uri->segment(2)!=''?$this->uri->segment(2):'';
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
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="<?=base_url('employees/search')?>" method="POST">
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
            <li class="nav-item start <?=$active=='home'?'active open':''?>">
                <a href="<?=base_url('home')?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow"></span>
                </a>                            
            </li>                            
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
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
                <a href="javascript:;" class="nav-link nav-toggle">
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
                <h3 class="uppercase">Finance Module</h3>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">Compensation</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Personnel Profile</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Income</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Deduction Summary</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Premiums/Loans</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Remittances</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Tax Details</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">DTR</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Adjustments</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Reports</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Monthly Reports</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Employee Remittances</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Employee Loan balance</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?=strtolower($active)=='finance'?'active open':''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Libraries</span>
                    <span class="arrow <?=strtolower($active)=='finance'?'open':''?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?=strtolower($activesub)=='deductions' || strtolower($activesub)=='agency'?'active open':''?>">
                        <a href="<?=base_url('finance/deductions')?>">
                            <span class="title">Deduction</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activesub)=='income'?'active open':''?>">
                        <a href="<?=base_url('finance/income')?>">
                            <span class="title">Income</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activesub)=='payrollprocess'?'active open':''?>">
                        <a href="<?=base_url('finance/payrollprocess')?>"">
                            <span class="title">Payroll Process</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activesub)=='projectcode'?'active open':''?>">
                        <a href="<?=base_url('finance/projectcode')?>"">
                            <span class="title">Project Code</span>
                        </a>
                    </li>
                    <li class="nav-item <?=strtolower($activesub)=='payrollgroup'?'active open':''?>">
                        <a href="<?=base_url('finance/payrollgroup')?>"">
                            <span class="title">Payroll Group</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Signatory</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bell"></i>
                    <span class="title">Notification</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Included in Payroll ()</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Maturing Loans ()</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Increase in Longevity Factor ()</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Update</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
                            <span class="title">Process Payroll</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link ">
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