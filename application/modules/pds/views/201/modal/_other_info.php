<!-- begin modal update/add other info -->
<div class="modal fade in" id="edit_information" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Edit Information</b></h5>
            </div>
            <?=form_open('pds/edit_skill/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmedit_info'))?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Special SKills / Hobbies</label>
                    <textarea class="form-control" id="txtskills" name="txtskills"><?=$arrData[0]['skills']?></textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Non-Academic Distinctions / Recognition</label>
                    <textarea class="form-control" id="txtrecognition" name="txtrecognition"><?=$arrData[0]['nadr']?></textarea>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Membership in Association / Organization</label>
                    <textarea class="form-control" id="txtorganization" name="txtorganization"><?=$arrData[0]['miao']?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end modal update/add other info -->

<div class="modal fade in" id="modal-legal-information" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b>Legal Information</b></h5>
            </div>
            <?=form_open('pds/edit_legal_info/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmedit_legal_info'))?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col info">
                            Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the office, Bureau or Dapartment where you will be appointed?
                            <ol type="a">
                                <li>within the third degree? 
                                    <b class="red"><?=$arrData[0]['relatedThird']?></b>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optrelated_third" value="Y" <?=$arrData[0]['relatedThird']=='Y'?'checked':''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optrelated_third" value="N" <?=$arrData[0]['relatedThird']=='N'?'checked':''?>> No </label>
                                    </div>
                                </li>
                                <li>within the fourth degree(for Local Government Unit-Career Employees) ? 
                                    <b class="red"><?=$arrData[0]['relatedFourth']?></b>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optrelated_fourth" value="Y" <?=$arrData[0]['relatedFourth']=='Y'?'checked':''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optrelated_fourth" value="N" <?=$arrData[0]['relatedFourth']=='N'?'checked':''?>> No </label>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="col info">
                            <span>Have you ever been found guilty of any administrative offense ? 
                                <b class="red"><?=$arrData[0]['adminCase']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optadmincase" value="Y" <?=$arrData[0]['adminCase']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optadmincase" value="N" <?=$arrData[0]['adminCase']=='N'?'checked':''?>> No </label>
                                </div>
                            <span>Have you been criminally charged before any court? 
                                <b class="red"><?=$arrData[0]['formallyCharged']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optformally_charged" value="Y" <?=$arrData[0]['formallyCharged']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optformally_charged" value="N" <?=$arrData[0]['formallyCharged']=='N'?'checked':''?>> No </label>
                                </div>
                        </div>
                        <div class="col info">
                            <span>Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulations by any court or tribunal?
                                <b class="red"><?=$arrData[0]['violateLaw']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optviolate_law" value="Y" <?=$arrData[0]['violateLaw']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optviolate_law" value="N" <?=$arrData[0]['violateLaw']=='N'?'checked':''?>> No </label>
                                </div>
                        </div>
                        <div class="col info">
                            <span>Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?
                                <b class="red"><?=$arrData[0]['forcedResign']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optforced_resign" value="Y" <?=$arrData[0]['forcedResign']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optforced_resign" value="N" <?=$arrData[0]['forcedResign']=='N'?'checked':''?>> No </label>
                                </div>
                        </div>
                        <div class="col info">
                            <span>Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
                                <b class="red"><?=$arrData[0]['candidate']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optcandidate" value="Y" <?=$arrData[0]['candidate']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optcandidate" value="N" <?=$arrData[0]['candidate']=='N'?'checked':''?>> No </label>
                                </div>
                            <span>Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate? 
                                <b class="red"><?=$arrData[0]['campaign']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optcampaign" value="Y" <?=$arrData[0]['campaign']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optcampaign" value="N" <?=$arrData[0]['campaign']=='N'?'checked':''?>> No </label>
                                </div>
                        </div>
                        <div class="col info">
                            <span>Have you acquired the status of an immigrant or permanent resident of another country? 
                                <b class="red"><?=$arrData[0]['immigrant']?></b></span>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="optimmigrant" value="Y" <?=$arrData[0]['immigrant']=='Y'?'checked':''?>> Yes </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optimmigrant" value="N" <?=$arrData[0]['immigrant']=='N'?'checked':''?>> No </label>
                                </div>
                        </div>
                        <div class="col" style="line-height: 1.7;padding: 5px 0;">
                            Pursuant to (a) indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972) *please answer the following items
                            <ol type="a">
                                <li>Are you a member of any indigenous group? <i>If your answer is "YES", please specify</i>
                                    <b class="red"><?=$arrData[0]['indigenous']?></b>
                                    <b class="blue"><?=ucfirst($arrData[0]['indigenousParticulars'])?></b>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optindigenous" id="y_indi" value="Y" <?=$arrData[0]['indigenous']=='Y'?'checked':''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optindigenous" id="n_indi" value="N" <?=$arrData[0]['indigenous']=='N'?'checked':''?>> No </label>
                                    </div>
                                    <input type="text" class="input-sm" name="txtindigenous" id="txtindigenous" 
                                        value="<?=$arrData[0]['indigenousParticulars']?>" <?=$arrData[0]['indigenous']=='Y'?'':'hidden'?>>
                                </li>
                                <li>Are you differently abled? <i>If you answer is "YES", please specify</i>
                                    <b class="red"><?=$arrData[0]['disabled']?></b>
                                    <b class="blue"><?=ucfirst($arrData[0]['disabledParticulars'])?></b>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optdisabled" id="y_disable" value="Y" <?=$arrData[0]['disabled']=='Y'?'checked':''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optdisabled" id="n_disable" value="N" <?=$arrData[0]['disabled']=='N'?'checked':''?>> No </label>
                                    </div>
                                    <input type="text" class="input-sm" name="txtdisabled" id="txtdisabled"
                                        value="<?=$arrData[0]['disabledParticulars']?>" <?=$arrData[0]['disabled']=='Y'?'':'hidden'?>>
                                </li>
                                <li>Are you a solo parent? <i>If your answer is "YES", please specify</i>
                                    <b class="red"><?=$arrData[0]['soloParent']?></b>
                                    <b class="blue"><?=ucfirst($arrData[0]['soloParentParticulars'])?></b>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="optsolo_parent" id="y_solo" value="Y" <?=$arrData[0]['soloParent']=='Y'?'checked':''?>> Yes </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optsolo_parent" id="n_solo" value="N" <?=$arrData[0]['soloParent']=='N'?'checked':''?>> No </label>
                                    </div>
                                    <input type="text" class="input-sm" name="txtsoloparent" id="txtsoloparent"
                                        value="<?=$arrData[0]['soloParentParticulars']?>" <?=$arrData[0]['soloParent']=='Y'?'':'hidden'?>>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green btnlegal_info-save">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<!-- begin modal update/add character references -->
<div class="modal fade in" id="add_character_refs" tabindex="-1" role="full" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h5 class="modal-title uppercase"><b><span class="action"></span> Character Reference</b></h5>
            </div>
            <?=form_open(''.$this->uri->segment(3), array('method' => 'post', 'id' => 'frm_charrefs'))?>
            <input type="hidden" id="txtrefid" name="txtrefid">
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="txtref_name" name="txtref_name">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="txtref_address" name="txtref_address">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Telephone Number</label>
                    <input type="text" class="form-control" id="txtref_telno" name="txtref_telno">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Save</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end modal update/add character references -->

<!-- begin delete character reference -->
<div class="modal fade" id="delete_reference" tabindex="-1" role="basic" aria-hidden="true"> 
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <?=form_open('pds/del_char_reference/'.$this->uri->segment(3), array('method' => 'post', 'id' => 'frmdeltra','class' => 'form-horizontal'))?>
                <input type="hidden" name="txtdel_char_ref" id="txtdel_char_ref">
                <div class="modal-body"> Are you sure you want to delete this data? </div>
                <div class="modal-footer">
                    <button type="submit" id="btndelete" class="btn btn-sm green">
                        <i class="icon-check"> </i> Yes</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
                        <i class="icon-ban"> </i> Cancel</button>
                </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<!-- end delete character reference -->