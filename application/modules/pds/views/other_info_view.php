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