<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>HRMIS | DTR </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?=base_url('assets/css/fonts.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets/global/plugins/datatables/datatables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <link href="<?=base_url('assets/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url('assets/css/login.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/css/custom-dtr.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/bootstrap-toastr/toastr.min.css')?>" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.ico')?>" /> </head>
    
        <body class=" login">

            <style type="text/css">
                a.btn-lg {
                    border: 2px solid #d1d1d1;
                    border-radius: 20px !important;
                    margin-left: 40px;
                }
                a.btn-lg:hover {
                    border: 2px solid #fff;
                    background-color: #42638e;
                }
                h1 {
                    color: #32c5d2;
                }
                .tooltip {
                    font-size: 18px !important;
                }
                .logo {
                    margin: 0 !important;
                }
            </style>

            <div class="menu-toggler sidebar-toggler"></div>
            <div class="logo"></div>

            <!-- begin logo -->
            <div class="col-md-12" style="right: 400px;">
                <center>
                    <br><img style="height: 70px;" src="<?=base_url('assets/images/logo.png')?>" alt="" />
                    <h1 class="hrmisLogo" style="color: #fff!important;">HRMIS</h1>
                    <div class="small" style="color: #fff!important;">Human Resource Management Information System</div>
                </center>
            </div>
            <!-- end logo -->

            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="content pull-right">
                        <canvas id="canvas" width="400" height="400" style="background-color:#333"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content pull-left">
                        <div class="datenow"><?=date('F d, Y')?></div>
                        <div class="clock"></div>
                        <br><br>
                        <h4 class="form-title font-green pull-left bold">Daily Time Record</h4>
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span> Enter any username and password. </span>
                        </div>
                        <?=form_open('dtr', array('method' => 'post'))?>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Username</label>
                                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="strUsername" /> </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Password</label>
                                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="strPassword" /> </div>
                            <div class="form-actions" style="border: none;text-align: right;">
                                <button type="submit" class="btn green uppercase">Submit</button>
                            </div> 
                        <?=form_close()?>
                    </div>
                </div>
            </div>

            <div class="footer">
                <center>
                    <div class="col-md-12" style="padding-bottom: 30px;">
                        <a href="javascript:;" id="btn-present" class="btn btn-lg" data-toggle="tooltip" data-placement="top" title="List of Present Employees">
                            <h1><i class="fa fa-check"></i> <i class="fa fa-user"></i></h1>
                        </a>
                        <a href="javascript:;" id="btn-absent" class="btn btn-lg" data-toggle="tooltip" data-placement="top" title="List of Absent Employees">
                            <h1><i class="fa fa-remove"></i> <i class="fa fa-user"></i></h1>
                        </a>
                        <a href="javascript:;" id="btn-ob" class="btn btn-lg" data-toggle="tooltip" data-placement="top" title="List of On Official Business Employees">
                            <h1><i class="fa fa-subway"></i> <i class="fa fa-user"></i></h1>
                        </a>
                        <a href="javascript:;" id="btn-leave" class="btn btn-lg" data-toggle="tooltip" data-placement="top" title="List of On Leave Employees">
                            <h1><i class="fa fa-plane"></i> <i class="fa fa-user"></i></h1>
                        </a>
                    </div>
                    <?php include('_dtr_modal.php'); ?>
                </center>

                <div class="copyright"> 2018 © DOST ITD. </div>
            </div>

            <script>
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");
                var radius = canvas.height / 2;
                ctx.translate(radius, radius);
                radius = radius * 0.90
                setInterval(drawClock, 1000);

                function drawClock() {
                  drawFace(ctx, radius);
                  drawNumbers(ctx, radius);
                  drawTime(ctx, radius);
                }

                function drawFace(ctx, radius) {
                  var grad;
                  ctx.beginPath();
                  ctx.arc(0, 0, radius, 0, 2*Math.PI);
                  ctx.fillStyle = 'white';
                  ctx.fill();
                  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                  grad.addColorStop(0, '#333');
                  grad.addColorStop(0.5, 'white');
                  grad.addColorStop(1, '#333');
                  ctx.strokeStyle = grad;
                  ctx.lineWidth = radius*0.1;
                  ctx.stroke();
                  ctx.beginPath();
                  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                  ctx.fillStyle = '#333';
                  ctx.fill();
                }

                function drawNumbers(ctx, radius) {
                  var ang;
                  var num;
                  ctx.font = radius*0.15 + "px arial";
                  ctx.textBaseline="middle";
                  ctx.textAlign="center";
                  for(num = 1; num < 13; num++){
                    ang = num * Math.PI / 6;
                    ctx.rotate(ang);
                    ctx.translate(0, -radius*0.85);
                    ctx.rotate(-ang);
                    ctx.fillText(num.toString(), 0, 0);
                    ctx.rotate(ang);
                    ctx.translate(0, radius*0.85);
                    ctx.rotate(-ang);
                  }
                }

                function drawTime(ctx, radius){
                    var now = new Date();
                    var hour = now.getHours();
                    var minute = now.getMinutes();
                    var second = now.getSeconds();
                    //hour
                    hour=hour%12;
                    hour=(hour*Math.PI/6)+
                    (minute*Math.PI/(6*60))+
                    (second*Math.PI/(360*60));
                    drawHand(ctx, hour, radius*0.5, radius*0.07);
                    //minute
                    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                    drawHand(ctx, minute, radius*0.8, radius*0.07);
                    // second
                    second=(second*Math.PI/30);
                    drawHand(ctx, second, radius*0.9, radius*0.02);
                }

                function drawHand(ctx, pos, length, width) {
                    ctx.beginPath();
                    ctx.lineWidth = width;
                    ctx.lineCap = "round";
                    ctx.moveTo(0,0);
                    ctx.rotate(pos);
                    ctx.lineTo(0, -length);
                    ctx.stroke();
                    ctx.rotate(-pos);
                }

                function clock() {
                    var date = new Date(),
                    hour = date.getHours(),
                    minute = checkTime(date.getMinutes()),
                    ss = checkTime(date.getSeconds());

                    function checkTime(i) {
                        if( i < 10 ) {
                            i = "0" + i;
                        } return i;
                    }

                    if ( hour > 12 ) {
                        hour = hour - 12;
                        if ( hour == 12 ) {
                            hour = checkTime(hour);
                            document.querySelectorAll('.clock')[0].innerHTML = hour+":"+minute+":"+ss+" AM";
                        } else {
                            hour = checkTime(hour);
                            document.querySelectorAll('.clock')[0].innerHTML = hour+":"+minute+":"+ss+" PM";
                        }
                    } else {
                        document.querySelectorAll('.clock')[0].innerHTML = hour+":"+minute+":"+ss+" AM";
                    }
                }
                setInterval(clock, 1000);

            </script>
            <!-- BEGIN CORE PLUGINS -->
            <script src="<?=base_url('assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/js.cookie.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/uniform/jquery.uniform.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?=base_url('assets/global/plugins/jquery.pulsate.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/holder.js')?>" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?=base_url('assets/global/scripts/datatable.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/datatables/datatables.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')?>" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?=base_url('assets/global/scripts/app.min.js')?>" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?=base_url('assets/pages/scripts/table-datatables-scroller.min.js')?>" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?=base_url('assets/pages/scripts/ui-general.min.js')?>" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?=base_url('assets/layouts/layout/scripts/layout.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/layouts/layout/scripts/demo.min.js')?>" type="text/javascript"></script>
            <script src="<?=base_url('assets/layouts/global/scripts/quick-sidebar.min.js')?>" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <script src="<?=base_url('assets/js/custom-dtr.js')?>"></script>

        </body>

</html>