<?=load_plugin('css', array('profile-2','datepicker','select2'))?>
<div class="tab-pane active" id="tab_1_4">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title col-md-9">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Select remittance</label>
                        <div class="col-md-9">
                            <select class="form-control select2 form-required" name="selpayrollGrp" placeholder="">
                                <option value="null">SELECT REMITTANCE</option>
                                <?php foreach($arrDeductions as $deduct): ?>
                                    <option value="<?=$deduct['deductionCode']?>"><?=$deduct['deductionDesc']?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Year</label>
                        <div class="col-md-9">
                            <div class="input-group input-large date-picker input-daterange" data-date="2003" data-date-format="mm/dd/yyyy" id="dateRange">
                                <input type="text" class="form-control" name="from">
                                <span class="input-group-addon"> to </span>
                                <input type="text" class="form-control" name="to">
                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="tabbable-line tabbable-full-width col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table-hazards" >
                            <thead>
                                <tr>
                                    <th> Deduction </th>
                                    <th> OR </th>
                                    <th> Month </th>
                                    <th> Year </th>
                                    <th> Amount </th>
                                    <th style="text-align: center;"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('_modal.php'); ?>
<?=load_plugin('js', array('datepicker','select2'))?>
<script>
    $(document).ready(function() {
        $('#table-hazards').dataTable();
        $('#dateRange').datepicker();
    });
</script>