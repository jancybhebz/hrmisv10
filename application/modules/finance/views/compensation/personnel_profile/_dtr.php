<?=load_plugin('css', array('profile-2','datatables','select2'))?>
<pre><?php print_r($arrDtr); ?></pre>
<div class="tab-pane active" id="tab_1_4">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="col-md-9">
                <center>
                <form class="form-inline" role="form" method="get">
                    <div class="form-group">
                        <label class="control-label">Month</label>
                        <select class="bs-select form-control" name="mon">
                            <?php foreach (range(1, 12) as $m): ?>
                                <option value="<?=$m?>" <?=isset($_GET['mon']) ? $_GET['mon'] == $m ? 'selected' : '' : date('n') == $m?>>
                                    <?=date('F', mktime(0, 0, 0, $m, 10))?></option>
                            <?php endforeach; ?>
                        </select>
                        &nbsp;&nbsp;
                        <label class="control-label">Year</label>
                        <select class="bs-select form-control" name="yr">
                            <?php foreach (range(getyear(), date('Y')) as $yr): ?>
                                <option value="<?=$yr?>" <?=isset($_GET['yr']) ? $_GET['yr'] == $yr ? 'selected' : '' : date('n') == $yr?>>
                                    <?=$yr?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                </center>
            </div>
            <?php echo $totaldays; ?>
            <table class="table table-striped table-bordered table-hover order-column" id="tbldtr">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>IN</th>
                        <th>OUT</th>
                        <th>IN</th>
                        <th>OUT</th>
                        <th>IN</th>
                        <th>OUT</th>
                        <th>REMARKS</th>
                        <th>LATE</th>
                        <th>OT</th>
                        <th>UT</th>
                        <th>LOGS</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach (range(1, $totaldays) as $day): ?>
                    <tr>
                        <td align="center"><?=$day?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=load_plugin('js', array('datatables','select2','datatables-scroller'))?>
<script>
    $(document).ready(function() {
        $('#tbldtr').dataTable({
            "scrollY": "320px",
            "scrollCollapse": true,
            "paging": false,
            "scrollX": "100%",
        });
        setTimeout(function () { $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();},200);
    });
</script>