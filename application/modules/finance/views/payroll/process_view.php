<?=load_plugin('css', array('select'))?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=base_url('home')?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Finance Module</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Reports</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Monthly Report</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
       &nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row profile-account">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> MONTHLY REPORTS</span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="display: none">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <form>
                        <div class="col-md-4">
                            <label class="label-control">Employee</label>
                            <select class="form-control bs-select" name="selpprocess">
                                <option value="null">-- SELECT EMPLOYEE --</option>
                                <?php   foreach ($arrAppointments as $appointment):
                                            if($appointment['appointmentDesc'] != ''):
                                                if($_SESSION['strUserPermission'] == "Cashier Assistant"):
                                                    if($appointment['appointmentCode']=='GIA'): ?>
                                                        <option value="<?=$appointment['appointmentCode']?>"><?=$appointment['appointmentDesc']?></option><?php
                                                    endif;
                                                else: ?>
                                                    <option value="<?=$appointment['appointmentCode']?>"><?=$appointment['appointmentDesc']?></option><?php
                                                endif;
                                            endif;
                                        endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="label-control">Month</label>
                            <select class="form-control bs-select" name="mon">
                                <option value="null">-- SELECT MONTH --</option>
                                <?php foreach (range(1, 12) as $m): ?>
                                    <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                        <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="label-control">Year</label>
                            <select class="form-control bs-select" name="yr">
                                <option value="null">-- SELECT YEAR --</option>
                                <?php foreach (getYear() as $yr): ?>
                                    <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                        <?=$yr?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="label-control">Period</label>
                            <select class="form-control bs-select" name="period">
                                <option value="null">-- SELECT PERIOD --</option>
                                <?php foreach (periods() as $period): ?>
                                    <option value="<?=$period['id']?>" <?=isset($_GET['period']) ? $_GET['period'] == $period['id'] ? 'selected' : '' : ''?>>
                                        <?=$period['val']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </form>
                        <br><br><br><br>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select','form_validation'))?>
<script>
    $(document).ready(function() {
        $('.loading-image').hide();
        $('#div-body').show();
    });
</script>