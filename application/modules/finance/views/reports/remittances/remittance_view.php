<?=load_plugin('css', array('select2','select'))?>
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
            <span>Employee Remittances</span>
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
                    <span class="caption-subject bold uppercase"> Employee Remittances</span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="display: none">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Remittances</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="mon">
                                            <option value="0">-- SELECT REMITTANCE --</option>
                                            <option value="ALLGSIS">ALL GSIS Deduction(exc. Life and Ret. Prem.)</option>
                                            <?php foreach ($arrRemittances as $remittance): ?>
                                                <option value="<?=$remittance['deductionCode']?>"> <?=$remittance['deductionDesc']?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Show</label>
                                    <div class="col-md-6">
                                        <select class="form-control bs-select" name="mon" id="selshow">
                                            <option value="0">-- SELECT SHOW --</option>
                                            <option value="1"> All Employees</option>
                                            <option value="2">Per Employee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- All employees -->
                            <div class="form-body" id="div-all_emp">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Appointment</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="mon">
                                            <option value="0">-- SELECT APPOINTMENT --</option>
                                            <?php foreach ($arrAppointments as $appt): ?>
                                                <option value="<?=$appt['appointmentCode']?>"> <?=$appt['appointmentDesc']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- per employee -->
                            <div class="form-body" id="div-per_emp">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="mon">
                                            <option value="0">-- SELECT EMPLOYEE --</option>
                                            <?php foreach ($arrEmployees as $emp): ?>
                                                <option value="<?=$emp['empNumber']?>">
                                                    <?=getfullname($emp['surname'], $emp['firstname'], $emp['middlename'], $emp['middleInitial'])?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">YEAR</label>
                                    <div class="col-md-9">
                                        <select class="form-control bs-select input-inline input-medium" name="yr">
                                            <option value="0">FROM</option>
                                            <?php foreach (getYear() as $yr): ?>
                                                <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                                    <?=$yr?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <select class="form-control bs-select input-inline input-medium" name="yr">
                                            <option value="0">TO</option>
                                            <?php foreach (getYear() as $yr): ?>
                                                <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                                    <?=$yr?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Generate</label>
                                    <div class="col-md-6">
                                        <select class="form-control bs-select" name="mon">
                                            <option value="0">-- SELECT FORMAT --</option>
                                            <option value="PDF">PDF</option>
                                            <option value="Excel">Excel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">&nbsp;</label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=load_plugin('js', array('select2','select'))?>
<script>
    $('select.select2').select2({
        minimumResultsForSearch: -1,
        placeholder: function(){
            $(this).data('placeholder');
        }
    });
    $(document).ready(function() {
        $('.loading-image, #div-all_emp, #div-per_emp').hide();
        $('#div-body').show();
        $('#selshow').change(function() {
            if($(this).val() == 1){
                $('#div-all_emp').show();
                $('#div-per_emp').hide();
            }else if($(this).val() == 2){
                $('#div-all_emp').hide();
                $('#div-per_emp').show();
            }else{
                $('#div-per_emp').hide();
                $('#div-all_emp').hide();
            }
        });
    });
</script>