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
    
        
    });
</script>