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
        
        <link href="<?=base_url('assets/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url('assets/css/login.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/css/custom-dtr.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/plugins/bootstrap-toastr/toastr.min.css')?>" rel="stylesheet" type="text/css" />
        

        <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.ico')?>" /> </head>
    
        <body class=" login">
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
                <div class="col-md-3">
                    <center>
                        <!-- <button href="javascript:;" class="icon-btn btn-lg pull-right">
                            <i class="fa fa-group"></i>
                            <div> Users </div>
                        </button> -->
                    </center>
                </div>
                <div class="col-md-3">
                    <div class="content pull-right">
                        <canvas id="canvas" width="400" height="400" style="background-color:#333"></canvas>
                    </div>
                    <div class="clock"></div>
                </div>
                <div class="col-md-6">
                    <div class="content pull-left">
                        <h3 class="form-title font-green">Log In</h3>
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span> Enter any username and password. </span>
                        </div>
                        <?=form_open(base_url('login'), array('method' => 'post'))?>
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


            <div class="copyright"> 2018 © DOST ITD. </div>

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
            <script src="<?=base_url('assets/plugins/bootstrap-toastr/toastr.min.js')?>" type="text/javascript"></script>
            <?php load_plugin('js',array('toaster'));?>
            <!--script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script-->
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?=base_url('assets/js/app.min.js')?>" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?=base_url('assets/js/login.min.js')?>" type="text/javascript"></script>
            <script>
                $(document).ready(function(){

                });  
            </script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <!-- END THEME LAYOUT SCRIPTS -->
        </body>

</html>