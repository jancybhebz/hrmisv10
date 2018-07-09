<div id="tab_otherInfo" class="tab-pane">
    <form action="#">
        <b>OTHER INFORMATION :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <label> SKILLS / RECOGNITIONS / ORGANIZATIONS : </label></br>
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
                    <td> <a class="btn green" data-toggle="modal" href="#skills_modal"> Edit </a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>
                <div class="modal fade bs-modal-lg"  id="skills_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b> SKILLS / RECOGNITIONS / ORGANIZATIONS </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Special Skills / Hobbies :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSkill" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Non-Academic Distinctions/Recognition :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strNonAcademic" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Membership in Association / Organization :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strMembership" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

                <a class="btn green" data-toggle="modal" href="#addSkills_modal"> Add </a>
                   <div class="modal fade bs-modal-lg"  id="addSkills_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b> SKILLS / RECOGNITIONS / ORGANIZATIONS </b></h4>
                        </div>
                            <div class="modal-body"> </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Special Skills / Hobbies :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strSkill" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Non-Academic Distinctions/Recognition :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strNonAcademic" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm-3 text-left">
                                    <div class="form-group">
                                        <label class="control-label">Membership in Association / Organization :<span class="required"> * </span></label>
                                    </div>
                                </div>
                                <div class="col-sm-5" text-left>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="strMembership" value="<?=isset($arrData[0]['childName'])?$arrData[0]['childName']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div><br>
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
                    <td> <a class="btn green" data-toggle="modal" href="#Legal_modal"> Edit </a>
                    <a href="<?=base_url('employees/profile/delete')?>"><button class="btn btn-sm btn-danger"><span class="fa fa-trash" title="Delete"></span> Delete</button></a></td>
                </tr>

                <div class="modal fade in" id="Legal_modal" tabindex="-1" role="full" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><b>LEGAL INFORMATION</b></h4>
                </div>
                <div class="modal-body"> </div>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of
                            bureau or office or to the person who has immediate supervision over you in the office, Bureau or Dapartment
                            where you will be appointed?<span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                    
               <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you ever been found guilty of any administrative offense ? <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you been criminally charged before any court? <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulations by any court or tribunal? <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector? <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you ever been a candidate in a national or local election held within the last year (except Barangay election)? <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate? <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Have you acquired the status of an immigrant or permanent resident of another country?<span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-sm-10 text-left">
                        <div class="form-group">
                            <label class="control-label">Pursuant to (a) indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972) <span class="required"> * </span></label>
                            <label class="control-label">*please answer the following items : <span class="required"> * </span></label>
                            <input type="radio" class="form-control" name="q1" 
                            <?php if (isset($q1) && $q1=="Yes") echo "checked";?> value="Yes">
                            <label class="labl">Yes</label>
                            <input type="radio" class="form-control" name="q1"
                            <?php if (isset($q1) && $q1=="No") echo "checked";?>  value="No">
                            <label class="labl">No</label>
                        </div>
                    </div>
                </div><br>
                
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
        </table>
    </form>
</div>