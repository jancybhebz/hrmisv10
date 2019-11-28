<script>
    $(document).ready(function() {
        $('#table-ob').on('click','a#printreport',function(){
            var req_details = $(this).data('rdetails');
            var obtype      = req_details[0];
            var reqdate     = $(this).data('rdate');
            var obdatefrom  = req_details[1];
            var obdateto    = req_details[2];
            var obtimefrom  = req_details[3];
            var obtimeto    = req_details[4];
            var desti       = req_details[5];
            var meal        = req_details[6];
            var purpose     = req_details[7];
            
            var link = "<?=base_url('employee/reports/generate/?rpt=reportOB')?>"+"&obtype="+obtype+"&reqdate="+reqdate+"&obdatefrom="+obdatefrom+"&obdateto="+obdateto+"&obtimefrom="+obtimefrom+"&obtimeto="+obtimeto+"&desti="+desti+"&meal="+meal+"&purpose="+purpose;
            $('div#attachments').html('');
            var json_file = $(this).data('rattach');
            $('div#attachments').append('<ul>');
            if(json_file!=''){
                $.each( $(this).data('rattach'), function(i,file) {
                    var floc = "<?=base_url('"+ file.filepath +"')?>";
                    var fname = file.filename;
                    var ext = fname.split('.');
                    ext = ext[ext.length-1];
                    $('div#attachments').append('<li><a target="_blank" href="'+floc+'"><i class="fa fa-'+check_icon(ext)+'"> </i>&nbsp;'+ellipsisChar(fname, 30)+'</a></li>');
                });
            }
            $('div#attachments').append('</ul>');
                
            $('#ob-embed').attr('src',link);
            $('#ob-embed-fullview').attr('href',link);
            $('#ob-open-request').attr('href',"<?=base_url('employee/official_business/edit?module=hr&req_id=')?>"+$(this).data('id'));
            $('#ob-form').modal('show');
        });

        $('#table-ob').on('click', 'a#btncertify', function() {
            $('#upt-title').html('<b>Certify</b>');
            $('#frmupdate_ob').attr('action',"<?=base_url('hr/request/update_ob?req_id=')?>"+$(this).data('id'));
            $('#optstatus').val('CERTIFIED');
            $('#modal-update-ob').modal('show');
        });

        $('#table-ob').on('click', 'a#btndisapproved', function() {
            $('#upt-title').html('<b>DISAPPROVED</b>');
            $('#frmupdate_ob').attr('action',"<?=base_url('hr/request/update_ob?req_id=')?>"+$(this).data('id'));
            $('#optstatus').val('Disapproved');
            $('#modal-update-ob').modal('show');
        });
        
        // LEAVE
        $('#table-leave').on('click','a#printreport',function(){
            var req_details = $(this).data('rdetails');
            var leavetype      = req_details[0];
            var leavefrom  = req_details[1];
            var leaveto    = req_details[2];
            var day     = req_details[3];
            var signatory     = req_details[4];
            var signatory2     = req_details[5];
            var reason     = req_details[6];
            var incaseSL     = req_details[7];
            var incaseVL     = req_details[8];
            var daysapplied     = req_details[9];
            var intVL     = req_details[10];
            var intSL     = req_details[11];

            var link = "<?=base_url('employee/reports/generate/?rpt=reportLeave')?>"+"&leavetype="+leavetype+"&day="+day+"&leavefrom="+leavefrom+"&leaveto="+leaveto+"&daysapplied="+daysapplied+"&signatory="+signatory+"&signatory2="+signatory2+"&reason="+reason+"&incaseSL="+incaseSL+"&incaseVL="+incaseVL+"&intVL="+intVL+"&intSL="+intSL;

            $('div#attachments').html('');
            var json_file = $(this).data('rattach');
            $('div#attachments').append('<ul>');
            if(json_file!=''){
                $.each( $(this).data('rattach'), function(i,file) {
                    var floc = "<?=base_url('"+ file.filepath +"')?>";
                    var fname = file.filename;
                    var ext = fname.split('.');
                    ext = ext[ext.length-1];
                    $('div#attachments').append('<li><a target="_blank" href="'+floc+'"><i class="fa fa-'+check_icon(ext)+'"> </i>&nbsp;'+ellipsisChar(fname, 30)+'</a></li>');
                });
            }
            $('div#attachments').append('</ul>');
                
            $('#leave-embed').attr('src',link);
            $('#leave-embed-fullview').attr('href',link);
            $('#leave-open-request').attr('href',"<?=base_url('employee/leave/edit?module=hr&req_id=')?>"+$(this).data('id'));
            $('#leave-form').modal('show');
        });

        $('#table-leave').on('click', 'a#btncertify', function() {
            $('.div-remarks').hide();
            $('#leave-title').html('<b>Certify</b>');
            $('#lbl-leave-request').text('Are you sure you want to certify this request?');
            $('#frmupdate_leave').attr('action',"<?=base_url('hr/request/update_leave?req_id=')?>"+$(this).data('id'));
            $('#opt_leave_stat').val('CERTIFIED');
            $('#modal-update-leave').modal('show');
        });

        $('#table-leave').on('click', 'a#btndisapproved', function() {
            $('.div-remarks').show();
            $('#leave-title').html('<b>DISAPPROVED</b>');
            $('#lbl-leave-request').text('Are you sure you want to disapprove this request?');
            $('#frmupdate_leave').attr('action',"<?=base_url('hr/request/update_leave?req_id=')?>"+$(this).data('id'));
            $('#opt_leave_stat').val('Disapproved');
            $('#modal-update-leave').modal('show');
        });

        // TO
        $('#table-to').on('click','a#printreport',function(){
            var req_details = $(this).data('rdetails');
            var desti      = req_details[0];
            var todatefrom  = req_details[1];
            var todateto    = req_details[2];
            var purpose     = req_details[3];
            var meal     = req_details[4];

            var link = "<?=base_url('employee/reports/generate/?rpt=reportTO')?>"+"&desti="+desti+"&todatefrom="+todatefrom+"&todateto="+todateto+"&purpose="+purpose+"&meal="+meal;

            $('div#attachments').html('');
            var json_file = $(this).data('rattach');
            $('div#attachments').append('<ul>');
            if(json_file!=''){
                $.each( $(this).data('rattach'), function(i,file) {
                    var floc = "<?=base_url('"+ file.filepath +"')?>";
                    var fname = file.filename;
                    var ext = fname.split('.');
                    ext = ext[ext.length-1];
                    $('div#attachments').append('<li><a target="_blank" href="'+floc+'"><i class="fa fa-'+check_icon(ext)+'"> </i>&nbsp;'+ellipsisChar(fname, 30)+'</a></li>');
                });
            }
            $('div#attachments').append('</ul>');
            
            $('#to-embed').attr('src',link);
            $('#to-embed-fullview').attr('href',link);

            $('#to-open-request').attr('href',"<?=base_url('employee/travel_order/edit?module=hr&req_id=')?>"+$(this).data('id'));
            $('#to-form').modal('show');
        });

        $('#table-to').on('click', 'a#btncertify', function() {
            $('.div-remarks').hide();
            $('#to-title').html('<b>Certify</b>');
            $('#lbl-to-request').text('Are you sure you want to certify this request?');
            $('#frmupdate_to').attr('action',"<?=base_url('hr/request/update_to?req_id=')?>"+$(this).data('id'));
            $('#opt_to_stat').val('CERTIFIED');
            $('#modal-update-to').modal('show');
        });

        $('#table-to').on('click', 'a#btndisapproved', function() {
            $('.div-remarks').show();
            $('#to-title').html('<b>DISAPPROVED</b>');
            $('#lbl-to-request').text('Are you sure you want to disapprove this request?');
            $('#frmupdate_to').attr('action',"<?=base_url('hr/request/update_to?req_id=')?>"+$(this).data('id'));
            $('#opt_to_stat').val('Disapproved');
            $('#modal-update-to').modal('show');
        });

        // PDS
        $('#table-pds').on('click','a#printreport',function(){
            var req_details = $(this).data('rdetails');
            var desti      = req_details[0];
            var todatefrom  = req_details[1];
            var todateto    = req_details[2];
            var purpose     = req_details[3];
            var meal     = req_details[4];

            var link = "<?=base_url('employee/reports/generate/?rpt=reportTO')?>"+"&desti="+desti+"&todatefrom="+todatefrom+"&todateto="+todateto+"&purpose="+purpose+"&meal="+meal;

            $('div#attachments').html('');
            var json_file = $(this).data('rattach');
            $('div#attachments').append('<ul>');
            if(json_file!=''){
                $.each( $(this).data('rattach'), function(i,file) {
                    var floc = "<?=base_url('"+ file.filepath +"')?>";
                    var fname = file.filename;
                    var ext = fname.split('.');
                    ext = ext[ext.length-1];
                    $('div#attachments').append('<li><a target="_blank" href="'+floc+'"><i class="fa fa-'+check_icon(ext)+'"> </i>&nbsp;'+ellipsisChar(fname, 30)+'</a></li>');
                });
            }
            $('div#attachments').append('</ul>');
            
            $('#pds-embed').attr('src',link);
            $('#pds-embed-fullview').attr('href',link);

            $('#pds-open-request').attr('href',"<?=base_url('employee/travel_order/edit?module=hr&req_id=')?>"+$(this).data('id'));
            $('#pds-form').modal('show');
        });

        // $('#table-to').on('click', 'a#btncertify', function() {
        //     $('.div-remarks').hide();
        //     $('#to-title').html('<b>Certify</b>');
        //     $('#lbl-to-request').text('Are you sure you want to certify this request?');
        //     $('#frmupdate_to').attr('action',"<?=base_url('hr/request/update_to?req_id=')?>"+$(this).data('id'));
        //     $('#opt_to_stat').val('CERTIFIED');
        //     $('#modal-update-to').modal('show');
        // });

        // $('#table-to').on('click', 'a#btndisapproved', function() {
        //     $('.div-remarks').show();
        //     $('#to-title').html('<b>DISAPPROVED</b>');
        //     $('#lbl-to-request').text('Are you sure you want to disapprove this request?');
        //     $('#frmupdate_to').attr('action',"<?=base_url('hr/request/update_to?req_id=')?>"+$(this).data('id'));
        //     $('#opt_to_stat').val('Disapproved');
        //     $('#modal-update-to').modal('show');
        // });
        
    });
</script>