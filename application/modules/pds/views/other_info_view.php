<div id="tab_otherInfo" class="tab-pane">

        <b>OTHER INFORMATION :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <label> SKILLS / RECOGNITIONS / ORGANIZATIONS : </label></br>
                <tr>
                    <th>Special Skills / Hobbies</th>
                    <th>Non-Academic Distinctions / Recognition</th>
                    <th>Membership in Association / Organization</th>
                    <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <th>Action</th>
                    <?php endif;?>
                </tr>
               
                <tr>
                    <td><?=$arrData['skills']?></td>
                    <td><?=$arrData['nadr']?></td>
                    <td><?=$arrData['miao']?></td>
                    <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <td> <a class="btn green" data-toggle="modal" href="#editSkills_modal"> Edit </a>
                   <a class="btn btn-sm btn-danger" data-toggle="modal" href="#deleteSkills"> Delete </a></td>
                   <?php endif;?>
                </tr>
            </table>

    <?=form_open(base_url('pds/edit_skill/'.$this->uri->segment(4)), array('method' => 'post', 'name' => 'frmSkill'))?>
                <div class="modal fade bs-modal-lg"  id="editSkills_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <input type="text" class="form-control" name="strSkill" id="strSkill" value="<?=isset($arrData['skills'])?$arrData['skills']:''?>">
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
                                        <input type="text" class="form-control" name="strNonAcademic" id="strNonAcademic" value="<?=isset($arrData['nadr'])?$arrData['nadr']:''?>">
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
                                        <input type="text" class="form-control" name="strMembership" id="strMembership" value="<?=isset($arrData['miao'])?$arrData['miao']:''?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="strEmpNumber" id="strEmpNumber" value="<?=isset($arrData['empNumber'])?$arrData['empNumber']:''?>">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn green">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <?=form_close()?>
            <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                <a class="btn green" data-toggle="modal" href="#addSkills_modal"> Add </a>
            <?php endif;?>
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
                                        <input type="text" class="form-control" name="strSkill">
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
                                        <input type="text" class="form-control" name="strNonAcademic">
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
                                        <input type="text" class="form-control" name="strMembership">
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
            </form>

            <!-- DELETE -->
            <div class="modal fade bs-modal-lg"  id="deleteSkills" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><b>Skills</b></h4>
                        </div>
                    
                        <div class="modal-body"> Are you sure you want to delete this data? </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <button type="button" class="btn green" id="btndelete">Yes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



        <b>LEGAL INFORMATION :</b><br><br>                        
            <table class="table table-bordered table-striped" class="table-responsive">
                <tr>
                    <td>
                    <label>Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of</label><br>
                    <label>bureau or office or to the person who has immediate supervision over you in the office, Bureau or Dapartment </label><br>
                    <label>where you will be appointed? </label><br>
                    <label>a. within the third degree? </label>  <b><font color="red"><?=$arrData['relatedThird']?></b><br></font>
                    <label>b. within the fourth degree(for Local Government Unit-Career Employees) ? </label>  <b><font color="red"><?=$arrData['relatedFourth']?></b></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Have you ever been found guilty of any administrative offense ? </label> <b><font color="red"><?=$arrData['adminCase']?></b><br></font>
                    <label>Have you been criminally charged before any court? </label> <b><font color="red"><?=$arrData['formallyCharged']?></b></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulations by any court or tribunal? </label> <b><font color="red"><?=$arrData['violateLaw']?></b></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped</label> <b><font color="red"><?=$arrData['forcedResign']?></b></font>
                    <label>from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</label> <b><font color="red"><?=$arrData['forcedResign']?></b></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</label> <b><font color="red"><?=$arrData['candidate']?></b></font>
                    <label>Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</label> <b><font color="red"><?=$arrData['campaign']?></b></font>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label>Have you acquired the status of an immigrant or permanent resident of another country? </label> <b><font color="red"><?=$arrData['immigrant']?></b></font>
                    </td>
                </tr>
                 <tr>
                    <td>
                    <label>Pursuant to (a) indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972)</label><br> 
                    <label>*please answer the following items</label><br><br>
                    <label>a. Are you a member of any indigenous group?     If you answer is "YES", please specify</label> <b><font color="red"><?=$arrData['indigenous']?></b></font><br>
                    <label>b. Are you differently abled?                    If you answer is "YES", please specify</label> <b><font color="red"><?=$arrData['disabled']?></b></font><br>
                    <label>c. Are you a solo parent?                        If you answer is "YES", please specify</label> <b><font color="red"><?=$arrData['soloParent']?></b></font><br>
                    </td>
                </tr>
                <tr>
                <?php if($this->session->userdata('sessAccessLevel') == 'System Administrator'): ?>
                    <td> <a class="btn green" data-toggle="modal" href="#Legal_modal"> Edit </a>
                <?php endif;?>
                    
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



<script>

$(document).ready(function() 
    {

    $('#btndelete').click(function() {
    $.ajax ({type : 'GET', url: 'other_info_view/delete?tab='+tab+'&code='+code,
        success: function(){
            toastr.success('Skills'+code+' successfully deleted.','Success');
            $('#delete').modal('hide');
            $('[data-code="' + code + '"]').closest('tr').hide(); }});
     });

    
</script>