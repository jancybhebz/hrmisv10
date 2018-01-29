<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>HRMIS | User Login </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?=base_url('assets/css/fonts.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/uniform/css/uniform.default.css')?>" rel="stylesheet" type="text/css" />
        <!--link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" /-->
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!--link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" /-->
        <!--link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" /-->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url('assets/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url('assets/css/login.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/css/custom.css')?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.ico')?>" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <div class="menu-toggler sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo">
            <!-- <a href="index.html"> -->
                <!-- <img style="height: 50px;" src="../hrmis_images/logo.png" alt="" /> </a> -->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?=base_url('login')?>" method="post">
                <br><img style="height: 50px;" src="<?=base_url('assets/images/logo.png')?>" alt="" />
                <h1 class="hrmisLogo">HRMIS</h1>
                <div class="small">Human Resource Management Information System</div>
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="strUsername" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="strPassword" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <!--label class="rememberme check">
                        <input type="checkbox" name="remember" value="1" />Remember </label-->
                    <!--a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a-->
                </div>
                 <div class="create-account">
                    <p class="small"><b>The Human Resource Management Information System (HRMIS)</b> is a comprehensive and proactive human resources system designed to provide a single interface for government employees to perform the human resources management functions efficiently and effectively.</p>
                </div> 
            </form>
            <!-- END LOGIN FORM -->
            
            
        </div>
        <div class="copyright"> 2018 © DOST ITD. </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
        <!--script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script-->
        <!--script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script-->
        <script src="<?=base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/plugins/uniform/jquery.uniform.min.js')?>" type="text/javascript"></script>
        <!--script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script-->
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url('assets/plugins/jquery-validation/js/jquery.validate.min.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/plugins/jquery-validation/js/additional-methods.min.js')?>" type="text/javascript"></script>
        <!--script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script-->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url('assets/js/app.min.js')?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url('assets/js/login.min.js')?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>