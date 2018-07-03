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
                             <a href="<?=base_url('employees/profile/edit/')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span>EDIT
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
                            <li>
                                <a data-toggle="tab" href="#tab_workExp">
                                    <i class="fa fa-eye"></i> Work Experience </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_volWork">
                                    <i class="fa fa-eye"></i> Voluntary Work </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_training">
                                    <i class="fa fa-eye"></i> Trainings </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_otherInfo">
                                    <i class="fa fa-eye"></i> Other Information </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_position">
                                    <i class="fa fa-eye"></i> Position Details </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_duties">
                                    <i class="fa fa-eye"></i> Duties and Responsibilities </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div id="tab_personal_info" class="tab-pane active">
                                <form role="form" action="#">
                                    <table class="table table-bordered table-striped" class="table-responsive">
                                        <tr>
                                            <td>Date of Birth :</td>
                                            <td><?=$arrData['birthday']?></td>
                                            <td colspan="2">RESIDENTIAL ADDRESS:</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Place of Birth :</td>
                                            <td><?=$arrData['birthPlace']?></td>
                                            <td>House/Block/Lot No., Street:</td>
                                            <td><?=$arrData['lot1'].' '.$arrData['street1']?></td>
                                        </tr>
                                        <tr>
                                            <td>Sex :</td>
                                            <td><?=$arrData['sex']?></td>
                                            <td>Subdivision/Village, Barangay :</td>
                                            <td><?=$arrData['subdivision1'].' '.$arrData['barangay1']?></td>
                                        </tr>
                                        <tr>
                                            <td>Civil Status :</td>
                                            <td><?=$arrData['civilStatus']?></td>
                                            <td>City/Municipality, Province :</td>
                                            <td><?=$arrData['city1'].' '.$arrData['province1']?></td>
                                        </tr>
                                        <tr>
                                            <td>Citizenship :</td>
                                            <td><?=$arrData['citizenship']?></td>
                                            <td>Zip Code :</td>
                                            <td><?=$arrData['zipCode1']?></td>
                                        </tr>
                                        <tr>
                                            <td>Height (m) :</td>
                                            <td><?=$arrData['height']?></td>
                                            <td>Telephone No. :</td>
                                            <td><?=$arrData['telephone1']?></td>
                                        </tr>
                                        <tr>
                                            <td>Weight (kg) :</td>
                                            <td><?=$arrData['weight']?></td>
                                            <td colspan="2">PERMANENT ADDRESS:</td>
                                        </tr>
                                        <tr>
                                            <td>Blood Type :</td>
                                            <td><?=$arrData['bloodType']?></td>
                                            <td>House/Block/Lot No., Street:</td>
                                            <td><?=$arrData['lot2'].' '.$arrData['street2']?></td>
                                        </tr>
                                        <tr>
                                            <td>GSIS Policy No. :</td>
                                            <td><?=$arrData['gsisNumber']?></td>
                                            <td>Subdivision/Village, Barangay :</td>
                                            <td> <?=$arrData['subdivision2'].' '.$arrData['barangay2']?></td>
                                        </tr>
                                        <tr>
                                            <td>Pag-ibig ID No. :</td>
                                            <td><?=$arrData['pagibigNumber']?></td>
                                            <td>City/Municipality, Province :</td>
                                            <td><?=$arrData['city2'].' '.$arrData['province2']?></td>
                                        </tr>
                                        <tr>
                                            <td>PHILHEALTH ID No. :</td>
                                            <td><?=$arrData['pagibigNumber']?></td>
                                            <td>Zip Code :</td>
                                            <td><?=$arrData['zipCode2']?></td>
                                        </tr>
                                        <tr>
                                            <td>TIN No. :</td>
                                            <td><?=$arrData['tin']?></td>
                                            <td>Telephone No. :</td>
                                            <td><?=$arrData['telephone2']?></td>
                                        </tr>
                                        <tr>
                                            <td>Email Address :</td>
                                            <td><?=$arrData['email']?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>      
                                     <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Edit </a>
                                    </div><br>                        
                                </form>
                            </div>
                            <div id="tab_family" class="tab-pane">
                                <form role="form" action="#">
                                    <ul class="personal-info-employee">
                                       <b>SPOUSE INFORMATION:</b><br><br>
                                        <li>Name of Spouse : <?=$arrData['spouseFirstname'].' '.$arrData['spouseMiddlename'].' '.$arrData['spouseSurname']?></li><br>
                                        <li>Occupation : <?=$arrData['spouseWork']?></li><br>
                                        <li>Employer/Business Name : : <?=$arrData['spouseBusName']?></li><br>
                                        <li>Business Address : <?=$arrData['spouseBusAddress']?></li><br>
                                        <li>Telephone Number : <?=$arrData['spouseTelephone']?></li><br>
                                        <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Edit </a>
                                        </div><br> 
                                    </ul>
                                    <ul class="personal-info-employee">
                                        <b>PARENT INFORMATION:</b><br><br>
                                        <li>Name of Father : <?=$arrData['fatherFirstname'].' '.$arrData['fatherMiddlename'].' '.$arrData['fatherSurname']?></li><br>
                                        <li>Name of Mother : <?=$arrData['motherFirstname'].' '.$arrData['motherMiddlename'].' '.$arrData['motherSurname']?></li><br>
                                        <li>Parents Address : : <?=$arrData['parentAddress']?></li><br>
                                        <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Edit </a>
                                        </div><br> 
                                    </ul>
                                        <b>CHILDREN INFORMATION:</b><br><br>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th width="30%">Name of Children </th>
                                            <th width="30%">Date of Birth </th>
                                            <th width="30%">Action </th>
                                        </tr>
                                        <?php foreach($arrChild as $row):?>
                                        <tr>
                                            <td><?=$row['childName']?></td>
                                            <td><?=$row['childBirthDate']?></td>
                                            <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                            <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                        </tr>
                                        <?php endforeach;?>
                                        <br>
                                    </table>
                                </form>
                            </div>
                            <div id="tab_education" class="tab-pane" style="overflow-x:auto;">
                                <form action="#">
                                <b>EDUCATIONAL INFORMATION:</b><br><br>
                                                               
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <th width="10%">Level Code</th>
                                        <th width="10%">Name of School</th>
                                        <th width="10%">Basic Educ./ Degree/ Course</th>
                                        <th width="10%">Period of Attendance [From/To]</th>
                                        <th width="10%">Highest Level/ Units Earned</th>
                                        <th width="10%">Year Graduated</th>
                                        <th width="10%">Scholarship/ Honors Received</th>
                                        <th width="10%">Graduate</th>
                                        <th width="2%">Licensed</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    <?php foreach($arrEduc as $row):?>
                                    <tr>
                                        <td><?=$row['levelCode']?></td>
                                        <td><?=$row['schoolName']?></td>
                                        <td><?=$row['course']?></td>
                                        <td><?=$row['schoolFromDate'].'-'.$row['schoolToDate']?></td>
                                        <td><?=$row['units']?></td>
                                        <td><?=$row['yearGraduated']?></td>
                                        <td><?=$row['ScholarshipCode']?></td>
                                        <td><?=$row['graduated']?></td>
                                        <td><?=$row['licensed']?></td>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </table>
                                 <a href="<?=base_url('employees/profile/add')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Add</button></a>
                                </form>
                            </div>
                            <div id="tab_exam" class="tab-pane">
                                <form action="#">
                                    <b>EXAMINATIONS :</b><br><br>
                                    <table class="table table-bordered table-striped" class="table-responsive">
                                    <label>CAREER SERVICE / RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE :</label><br></br>
                                    <tr>
                                        <th width="10%">Exam Description</th>
                                        <th width="10%">Rating</th>
                                        <th width="10%">Date of Examination/ Conferment</th>
                                        <th width="10%">Place of Examination/ Conferment</th>
                                        <th width="10%">License Number</th>
                                        <th width="10%">Date of Validity</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    <?php foreach($arrExam as $row):?>
                                    <tr>
                                        <td><?=$row['examCode']?></td>
                                        <td><?=$row['examRating']?></td>
                                        <td><?=$row['examDate']?></td>
                                        <td><?=$row['examPlace']?></td>
                                        <td><?=$row['licenseNumber']?></td>
                                        <td><?=$row['dateRelease']?></td>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </table>
                                </form>
                            </div>
                                
                            <div id="tab_workExp" class="tab-pane">
                                <form action="#">
                                <b>WORK EXPERIENCE:</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <th width="10%">Inclusive Date [From-To]</th>
                                        <th width="10%">Position Title</th>
                                        <th width="10%">Dept./ Agency/ Office/ Company</th>
                                        <th width="10%">Monthly</th>
                                        <th width="10%">Salary/  Job Pay Grade</th>
                                        <th width="10%">Status of Appointment</th>
                                        <th width="10%">Gov. Service (Yes/No)</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    <?php foreach($arrService as $row):?>
                                    <tr>
                                        <td><?=$row['serviceFromDate'].'-'.$row['serviceToDate']?></td>
                                        <td><?=$row['positionDesc']?></td>
                                        <td><?=$row['stationAgency']?></td>
                                        <td><?=$row['salary']?></td>
                                        <td><?=$row['salaryGrade']?></td>
                                        <td><?=$row['appointmentCode']?></td>
                                        <td><?=$row['governService']?></td>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </table>
                                </form>
                            </div>
                            <div id="tab_volWork" class="tab-pane">
                                <form action="#">
                                <b>VOLUNTARY WORKS :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <label>Voluntary Work or Involvement in Civic / Non-Governement / People / Voluntary Organization :</label></br></br>
                                    <tr>
                                        <th width="10%">Name of Organization</th>
                                        <th width="10%">Address of Organization</th>
                                        <th width="10%">Inclusive Dates [From-To]</th>
                                        <th width="10%">Number of Hours</th>
                                        <th width="10%">Position/Nature of work</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    <?php foreach($arrVol as $row):?>
                                    <tr>
                                        <td><?=$row['vwName']?></td>
                                        <td><?=$row['vwAddress']?></td>
                                        <td><?=$row['vwDateFrom'].'-'.$row['vwDateTo']?></td>
                                        <td><?=$row['vwHours']?></td>
                                        <td><?=$row['vwPosition']?></td>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                </table>
                                </form>
                            </div>
                            <div id="tab_training" class="tab-pane">
                                <form action="#">
                                    <b>TRAININGS :</b><br><br>                        
                                    <table class="table table-bordered table-striped" class="table-responsive">
                                        <label>TRAINING PROGRAMS / STUDY / SCHOLARSHIP GRANTS : </label></br></br>
                                        <tr>
                                            <th>Title of Learning & Dev./Training Programs</th>
                                            <th>Inclusive Dates of Attendance [From-To]</th>
                                            <th>Number of Hours</th>
                                            <th>Type of Leadership</th>
                                            <th>Conducted/Sponsored By</th>
                                            <th>Training Venue</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach($arrTraining as $row):?>
                                        <tr>
                                            <td><?=$row['trainingTitle']?></td>
                                            <td><?=$row['trainingStartDate'].'-'.$row['trainingEndDate']?></td>
                                            <td><?=$row['trainingHours']?></td>
                                            <td><?=$row['trainingTypeofLD']?></td>
                                            <td><?=$row['trainingConductedBy']?></td>
                                            <td><?=$row['trainingVenue']?></td>
                                            <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                            <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </form>
                            </div>
                            <div id="tab_otherInfo" class="tab-pane">
                                <form action="#">
                                <b>OTHER INFORMATION :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <label> SKILLS / RECOGNITIONS / ORGANIZATIONS : </label></br></br>
                                    <tr>
                                        <th>Special Skills / Hobbies</th>
                                        <th>Non-Academic Distinctions / Recognition</th>
                                        <th>Membership in Association / Organization</th>
                                        <th>Action</th>
                                    </tr>
                                   
                                    <tr>
                                        <td><?=$arrData['skills']?></td>
                                        <td><?=$arrData['nadr']?></td>
                                        <td><?=$arrData['miao']?></td>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                </table>
                                <b>LEGAL INFORMATION :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <td>
                                        <label>Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of</label><br>
                                        <label>bureau or office or to the person who has immediate supervision over you in the office, Bureau or Dapartment </label><br>
                                        <label>where you will be appointed? </label><br>
                                        <label>a. within the third degree? </label><br>
                                        <label>b. within the fourth degree(for Local Government Unit-Career Employees) ? </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label>Have you ever been found guilty of any administrative offense ? </label><br>
                                        <label>Have you been criminally charged before any court? </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label>Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulations by any court or tribunal? </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label>Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped</label>
                                        <label>from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label>Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</label>
                                        <label>Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label>Have you acquired the status of an immigrant or permanent resident of another country? </label>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                        <label>Pursuant to (a) indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972)</label><br>
                                        <label>*please answer the following items</label><br><br>
                                        <label>a. Are you a member of any indigenous group?     If you answer is "YES", please specify</label><br>
                                        <label>b. Are you differently abled?                    If you answer is "YES", please specify</label><br>
                                        <label>c. Are you a solo parent?                        If you answer is "YES", please specify</label><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                            <div id="tab_position" class="tab-pane">
                                <form action="#">
                                <b>POSITION DETAILS :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <?php foreach($arrPosition as $row):?>
                                    <tr>
                                    <td colspan="4"><b>Position Details</b></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Service Code :</td>
                                        <td width="25%"><?=$row['serviceCode']?></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                    </tr>
                                    <tr>
                                        <td>First Day Government :</td>
                                        <td><?=$row['firstDayGov']?></td>
                                        <td>Salary Effectivity Date :</td>
                                        <td><?=$row['effectiveDate']?></td>
                                    </tr>
                                    <tr>
                                        <td>First Day Agency :</td>
                                        <td><?=$row['firstDayAgency']?></td>
                                        <td>Employment Basis :</td>
                                        <td><?=$row['employmentBasis']?></td>
                                    </tr>
                                    <tr>
                                        <td>Mode of Separation :</td>
                                        <td><?=$row['statusOfAppointment']?></td>
                                        <td>Category Service :</td>
                                        <td><?=$row['categoryService']?></td>
                                    </tr>
                                    <tr>
                                        <td>Separation Date :</td>
                                        <td><?=$row['contractEndDate']?></td>
                                        <td>Tax Status :</td>
                                        <td><?=$row['taxStatCode']?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Desc. :</td>
                                        <td><?=$row['appointmentCode']?></td>
                                        <td>No. Of Dependents :</td>
                                        <td><?=$row['dependents']?></td>
                                    </tr>
                                    <td colspan="4"><b>Payroll</b></td>
                                    </tr>
                                    <tr>
                                        <td>Payroll Group :</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Include in DTR? :</td>
                                        <td><?=$row['dtrSwitch']?></td>
                                        <td>Include in Payroll? :</td>
                                        <td><?=$row['payrollSwitch']?></td>
                                    </tr>
                                    <tr>
                                        <td>Attendance Scheme :</td>
                                        <td><?=$row['schemeCode']?></td>
                                        <td>Hazard Pay Factor :</td>
                                        <td><?=$row['hpFactor']?></td>
                                    </tr>
                                    <tr>
                                        <td>Include in PhilHealth? :</td>
                                        <td><?=$row['philhealthSwitch']?></td>
                                        <td>Include in PAGIBIG? :</td>
                                        <td><?=$row['pagibigSwitch']?></td>
                                    </tr>
                                     <tr>
                                        <td>Include in Life & Retirement? :</td>
                                        <td><?=$row['lifeRetSwitch']?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <td colspan="4"><b>Plantilla Position</b></td>
                                    <tr>
                                        <td>ItemNumber :</td>
                                        <td><?=$row['uniqueItemNumber']?></td>
                                        <td>Head of the Agency :</td>
                                        <td><?=$row['firstDayAgency']?></td>
                                    </tr>
                                    <tr>
                                        <td>Actual Salary :</td>
                                        <td><?=$row['actualSalary']?></td>
                                        <td>Salary Grade :</td>
                                        <td><?=$row['firstDayAgency']?></td>
                                    </tr>
                                    <tr>
                                        <td>Authorize Salary :</td>
                                        <td><?=$row['authorizeSalary']?></td>
                                        <td>Step Number :</td>
                                        <td><?=$row['stepNumber']?></td>
                                    </tr>
                                    <tr>
                                        <td>Position :</td>
                                        <td><?=$row['positionCode']?></td>
                                        <td>Date Increment :</td>
                                        <td><?=$row['dateIncremented']?></td>
                                    </tr>
                                    <tr>
                                        <td>Position Date :</td>
                                        <td><?=$row['positionDate']?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td> <a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                   <?php endforeach; ?>
                                </table>
                                </form>
                            </div>
                            <div id="tab_duties" class="tab-pane">
                                <form action="#">
                                <b>DUTIES AND RESPONSIBILITIES :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <td colspan="4">EMPLOYEE DUTIES AND RESPONSIBILITIES</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">-- Duties & Responsibility of Position --</td>
                                    </tr>
                                    <tr>
                                        <th>Duties and Responsibilities</th>
                                        <th>Percent of Working Time</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>

                                </table><br><br>
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <td colspan="4">-- Duties & Responsibility of Plantilla --</td>
                                    </tr>
                                    <tr>
                                        <th>Duties and Responsibilities</th>
                                        <th>Percent of Working Time</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($arrDuties as $row): ?>
                                    <tr>
                                        <td></td>
                                        <td><?=$row['percentWork']?></td>
                                        <td colspan="2"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table><br><br>
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <td colspan="4">-- Actual Duties & Responsibilities --</td>
                                    </tr>
                                    <tr>
                                        <th>Duties and Responsibilities</th>
                                        <th>Percent of Working Time</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($arrDuties as $row): ?>
                                    <tr>
                                        <td><?=$row['duties']?></td>
                                        <td><?=$row['percentWork']?></td>
                                        <td colspan="2"><a href="<?=base_url('employees/profile/edit')?>"><button class="btn btn-sm btn-success"><span class="fa fa-edit" title="Edit"></span> Edit</button></a>
                                        <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table><br><br>
                                   
                                
                                <b>LEGAL INFORMATION :</b><br><br>                        
                                <table class="table table-bordered table-striped" class="table-responsive">
                                    <tr>
                                        <td>
                                        <label>Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of</label><br>
                                        <label>bureau or office or to the person who has immediate supervision over you in the office, Bureau or Dapartment </label><br>
                                        <label>where you will be appointed? </label><br>
                                        <label>a. within the third degree? </label><br>
                                        <label>b. within the fourth degree(for Local Government Unit-Career Employees) ? </label>
                                        </td>
                                    </tr>
                                    <!--end profile-settings-->
                                    <!-- <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Save Changes </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div> -->

                                    <!-- <table class="table table-bordered table-striped">
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
                                    </table> -->


                                    <!-- <div class="form-group">
                                        <label class="control-label">Salutation</label>
                                        <input type="text" name="strSalutation" value="<?=$arrData['salutation']?>" class="form-control" disabled/> </div>
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
                                        <input type="text" name="strNameExtension" value="<?=$arrData['nameExtension']?>" class="form-control" /> </div> -->
                                   <!--  <div class="form-group">
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
                                    </div> -->
                                   <!--  <div class="form-group">
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
                                    </div> -->
                                
                               <!--  <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
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
                                    </div> -->
                            
                                   <!--  <div class="form-group">
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
                                    </div> -->
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