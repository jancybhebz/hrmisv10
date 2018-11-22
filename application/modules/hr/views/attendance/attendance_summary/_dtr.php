<?=load_plugin('css', array('profile-2','datatables','select2'))?>
<div class="tab-pane active" id="tab_1_4">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=form_open('', array('class' => 'form-inline', 'method' => 'get'))?>
                <center>
                    <a href="#" class="btn blue">Edit Mode</a>
                    <a href="<?=base_url('hr/attendance_summary/dtr/broken_sched').'/'.$arrData['empNumber']?>" class="btn blue">Broken Sched</a>
                    <a href="<?=base_url('hr/attendance_summary/dtr/local_holiday').'/'.$arrData['empNumber']?>" class="btn blue">Local Holiday</a>
                </center>
            <?=form_close()?>
            
            <table class="table table-striped table-bordered order-column" id="tbldtr">
                <thead>
                    <tr>
                        <th class="no-sort">DATE</th>
                        <th class="no-sort">IN</th>
                        <th class="no-sort">OUT</th>
                        <th class="no-sort">IN</th>
                        <th class="no-sort">OUT</th>
                        <th class="no-sort">IN</th>
                        <th class="no-sort">OUT</th>
                        <th class="no-sort">REMARKS</th>
                        <th class="no-sort">LATE</th>
                        <th class="no-sort">OT</th>
                        <th class="no-sort">UT</th>
                        <th class="no-sort">LOGS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(range(1, 31) as $t): ?>
                    <tr class="odd">
                        <td>03</td>
                        <td>08:38</td>
                        <td>12:19</td>
                        <td>12:19</td>
                        <td>05:40</td>
                        <td>00:00</td>
                        <td>00:00</td>
                        <td></td>
                        <td>00:38</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="well">
                <div class="row">
                    <div class="col-md-6">
                        <p>Total Number of Working Days: 22</p>
                        <p>Dates Absent: 02</p>
                        <p>Total Undertime: 00:00</p>
                        <p>Total Late: 00:00</p>
                        <p>Late/Undertime:</p>
                        <p>Total Days Late/Undertime: 0</p>
                        <p>Total Days LWOP:</p>
                    </div>
                    <div class="col-md-6">
                        <p>Total Days Absent: 1</p>
                        <p>VL: 44.156</p>
                        <p>SL: 78.500</p>
                        <p>Offset Balance:  00:00</p>
                        <p>Offset for the Month:  0</p>
                        <p>Offset Used:  00:00</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="<?=base_url('hr/attendance_summary/dtr/certify_offset').'/'.$arrData['empNumber']?>" class="btn blue">Certify Offset</a>
                    <small><i>Click here to include/exclude Offset from computation.</i></small>
                    <?=str_repeat('&nbsp;', 6)?>
                    <b>Total Offset (Weekdays):</b> 00:00 <?=str_repeat('&nbsp;', 6)?>
                    <b>Total Offset (Weekends/Holiday):</b> 00:00</p>
                </div>
                <hr>
                <center>
                    <a href="<?=base_url('hr/attendance_summary/dtr/ob').'/'.$arrData['empNumber']?>" class="btn blue">OB</a>
                    <a href="<?=base_url('hr/attendance_summary/dtr/leave').'/'.$arrData['empNumber']?>" class="btn blue">Leave</a>
                    <a href="#" class="btn blue">Compensatory Leave</a>
                    <a href="<?=base_url('hr/attendance_summary/dtr/time').'/'.$arrData['empNumber']?>" class="btn blue">Time</a>
                    <a href="#" class="btn blue">Flag Ceremony</a>
                    <a href="<?=base_url('hr/attendance_summary/dtr/to').'/'.$arrData['empNumber']?>" class="btn blue">Travel Order</a>
                    <a href="#" class="btn blue">Preview / Print</a>
                </center>
            </div>
        </div>
    </div>
</div>
<?=load_plugin('js', array('datatables','select2','datatables-scroller'))?>
<script>
    $(document).ready(function() {
        $('td.hide').hide();
        $('#tbldtr').dataTable({
            "scrollY": "350px",
            "scrollCollapse": true,
            "paging": false,
            "bInfo": false,
            "bSort": false
        });
        setTimeout(function () { $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();},200);
    });
</script>