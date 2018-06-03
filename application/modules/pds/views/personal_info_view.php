<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=base_url('pds')?>">201</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Personal Information</span>
        </li>
    </ul>
    
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Personal Information</h3>
<?php //employee_details($strEmpNo) 
    $arrData=$arrData[0];
?>   
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="profile">
    <div class="tabbable-line tabbable-full-width">
        <div class="row">
            <div class="col-md-2">
                <ul class="list-unstyled profile-nav">
                    <li>
                        <img src="<?=base_url('assets/images/logo.png')?>" width="200" class="img-responsive pic-bordered" alt="" />
                        <a href="javascript:;" class="profile-edit"> edit </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8 profile-info">
                        <h1 class="font-green sbold uppercase"><?=strtoupper($arrData['surname'].', '.$arrData['firstname'].' '.$arrData['middleInitial'])?></h1>
                            <ul class="profile-info-employee">
                                <li><b>Employee Number : </b><?=$arrData['empNumber']?></li>
                                <li><b>Office : </b><?=employee_office($arrData['empNumber'])?></li>
                                <li><b>Position : </b><?=$arrData['positionDesc']?></li>
                                <li><b>Appointment : </b><?=$arrData['appointmentDesc']?></li>
                                <li><b>Mode of Separation : </b><?=$arrData['statusOfAppointment']?></li>
                            </ul>
                    </div>
                    <!--end col-md-8-->
                    <div class="col-md-4">
                        <div class="portlet sale-summary">
                            <div class="portlet-title">
                                <div class="caption font-red sbold"> DTR </div>
                                <!-- <div class="tools">
                                    <a class="reload" href="javascript:;"> </a>
                                </div> -->
                            </div>
                            <div class="portlet-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="sale-info"> LOG IN
                                            <i class="fa fa-img-up"></i>
                                        </span>
                                        <span class="sale-num"> 07:54 </span>
                                    </li>
                                    <li>
                                        <span class="sale-info"> BREAK OUT
                                            <i class="fa fa-img-down"></i>
                                        </span>
                                        <span class="sale-num"> 12:15 </span>
                                    </li>
                                    <li>
                                        <span class="sale-info"> BREAK IN </span>
                                        <span class="sale-num"> 12:15 </span>
                                    </li>
                                    <li>
                                        <span class="sale-info"> LOG OUT </span>
                                        <span class="sale-num"> 20:37 </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-md-4-->
                </div>
            </div>
                <!--end row-->
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <div class="form-group">
                            <button class="btn btn-primary">EDIT</button>
                        </div>
                    </div>
                </div>
                <div class="row profile-account">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_personal_info">
                                    <i class="fa fa-cog"></i> Personal info </a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_family">
                                    <i class="fa fa-picture-o"></i> Family Background </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_education">
                                    <i class="fa fa-lock"></i> Education </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_exam">
                                    <i class="fa fa-eye"></i> Examination </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div id="tab_personal_info" class="tab-pane active">
                                <form role="form" action="#">
                                    <div class="form-group">
                                        <label class="control-label">Salutation</label>
                                        <input type="text" name="strSalutation" value="<?=$arrData['salutation']?>" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input type="text" name="strFirstName" class="form-control" value="<?=$arrData['firstname']?>" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" name="strLastName" class="form-control" value="<?=$arrData['surname']?>" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Middle Name</label>
                                        <input type="text" name="strMiddleName" class="form-control" value="<?=$arrData['middlename']?>" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Middle Initial</label>
                                        <input type="text" name="strMiddleInitial" class="form-control" value="<?=$arrData['middleInitial']?>" maxlength="2" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Name Extension</label>
                                        <input type="text" name="strNameExtension" value="<?=$arrData['nameExtension']?>" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Sex</label>
                                        <div class="input-group">
                                            <div class="icheck-inline">                                                
                                                <label>
                                                    <div class="iradio_minimal_grey"><input type="radio" class="icheck" name="strSex" value="M" /> Male</div></label>
                                                <label><div class="iradio_minimal_grey"><input type="radio" class="icheck" name="strSex" value="F" /> Female</div></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Civil Status</label>
                                        <select class="form-control" name="strCivilStatus">
                                            <?php 
                                                foreach(json_decode(CIVIL_STATUS) as $row):?>
                                                    <option value="<?=$row?>"><?=$row?></option>
                                            <?php endforeach;?>                                    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <?php 
                                            $objDate = DateTime::createFromFormat('Y-m-d', $arrData['birthday']);
                                        ?>
                                        <input type="text" name="strBirthday" value="<?=$objDate->format('m/d/Y')?>" class="form-control date-picker" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Place of Birth</label>
                                        <input type="text" name="strBirthPlace" value="<?=$arrData['birthPlace']?>" class="form-control" /> </div>
                                    <div class="margiv-top-10">
                                        <a href="javascript:;" class="btn green"> Save Changes </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_family" class="tab-pane">
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                <form action="#" role="form">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="..."> </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger"> NOTE! </span>
                                            <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                        </div>
                                    </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Submit </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_education" class="tab-pane">
                                <form action="#">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input type="password" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Re-type New Password</label>
                                        <input type="password" class="form-control" /> </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Change Password </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_exam" class="tab-pane">
                                <form action="#">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                            <td>
                                                <label class="uniform-inline">
                                                    <input type="radio" name="optionsRadios1" value="option1" /> Yes </label>
                                                <label class="uniform-inline">
                                                    <input type="radio" name="optionsRadios1" value="option2" checked/> No </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                            <td>
                                                <label class="uniform-inline">
                                                    <input type="checkbox" value="" /> Yes </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                            <td>
                                                <label class="uniform-inline">
                                                    <input type="checkbox" value="" /> Yes </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                            <td>
                                                <label class="uniform-inline">
                                                    <input type="checkbox" value="" /> Yes </label>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--end profile-settings-->
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Save Changes </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end col-md-9-->
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
<?php load_plugin('css',array('datepicker'));?>
<?php load_plugin('js',array('datepicker'));?>
<script>
    $(document).ready(function(){
        $('input[name="strBirthday"]').datepicker();
    });
</script>