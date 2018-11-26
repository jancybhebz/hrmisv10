<?=load_plugin('css', array('profile-2'))?>
<div class="tab-pane active" id="tab_1_1">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-unstyled profile-nav">
                <li>
                    <img src="<?=base_url('assets/images/logo.png')?>" class="img-responsive pic-bordered" width="200px" alt="" />
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 profile-info">
                    <h1 class="font-green sbold uppercase"><?=$arrData['firstname']?> <?=$arrData['middleInitial']?>. <?=$arrData['surname']?></h1>
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="25%"><b>Employee Number</b></td>
                                    <td width="25%"><?=$arrData['statusOfAppointment']?></td>
                                    <td width="25%"><b>Pay Ending</b></td>
                                    <td width="25%"><?=$arrData['tin']?></td>
                                </tr>
                                <tr>
                                    <td><b>Office</b></td>
                                    <td colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 profile-info">
                    <div class="row">
                        <br><br><br>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td><b>Date(s) Absent</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Vacation Leave Left</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Sick Leave Left</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Special Leave Left</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Forced Leave Left</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Offset Balance</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Undertime</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Late</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Overtime Weekdays</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Overtime Weekends/Holidays</b></td>
                                    <td style="width: 75%;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>