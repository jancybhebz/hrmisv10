<?=load_plugin('css', array('select','datatables'))?>
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
            <span>Process History</span>
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
                    <span class="caption-subject bold uppercase"> Process History</span>
                </div>
            </div>
            <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
            <div class="portlet-body" id="div-body" style="display: none">
                <div class="portlet light bordered">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <center>
                            <?=form_open('', array('class' => 'form-inline', 'method' => 'get'))?>
                                <div class="form-group" style="display: inline-flex;">
                                    <label style="padding: 6px;">Month</label>
                                    <select class="bs-select form-control" name="month">
                                        <?php foreach (range(1, 12) as $m): ?>
                                            <option value="<?=sprintf('%02d', $m)?>"
                                                <?php 
                                                    if(isset($_GET['month'])):
                                                        echo $_GET['month'] == $m ? 'selected' : '';
                                                    else:
                                                        echo $m == sprintf('%02d', date('n')) ? 'selected' : '';
                                                    endif;
                                                    ?> >
                                                <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group" style="display: inline-flex;margin-left: 10px;">
                                    <label style="padding: 6px;">Year</label>
                                    <select class="bs-select form-control" name="yr">
                                        <?php foreach (getYear() as $yr): ?>
                                            <option value="<?=$yr?>"
                                                <?php 
                                                    if(isset($_GET['yr'])):
                                                        echo $_GET['yr'] == $yr ? 'selected' : '';
                                                    else:
                                                        echo $yr == date('Y') ? 'selected' : '';
                                                    endif;
                                                    ?> >  
                                            <?=$yr?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: -3px;">Search</button>
                            <?=form_close()?>
                        </center>
                    </div>
                    <div class="portlet-body">
                        <div class="loading-image"><center><img src="<?=base_url('assets/images/spinner-blue.gif')?>"></center></div>
                        <table class="table table-striped table-bordered order-column" id="tblprocess-history" style="visibility: hidden;">
                            <thead>
                                <tr>
                                    <th> Employee Name </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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

<?=load_plugin('js', array('select','datatables'))?>

<script>
    $(document).ready(function() {
        $('#tblprocess-history').dataTable( {
            "initComplete": function(settings, json) {
                $('.loading-image').hide();
                $('#tblprocess-history').css('visibility', 'visible');
            }} );
    });
</script>
