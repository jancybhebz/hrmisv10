function getrequest_status(stat)
{
    if(stat.toLowerCase() == "recommended"){
        return "Recommend";
    }
}

$(document).ready(function() {
    $('#table-notif').dataTable( {
        "initComplete": function(settings, json) {
            $('.loading-image').hide();
            $('#table-notif').css('visibility', 'visible');
        },"columnDefs": [{ "orderable":false, "targets":'no-sort' }]} );

    $('#table-notif').on('click', 'a#btnview-details', function() {
        var data = $(this).data('json');
        var status = data['req_nextsign'].split(';');
        var details = data['req_details'].split(';');
        
        console.log(details);
        console.log(data);
        $('.modal-title').html('<b>'+data['req_code']+'</b>');

        $('#txtreqid').val(data['req_id']);
        $('#txtreq_empno').val(data['req_emp']);
        $('#txtreq_empname').val(data['req_empname']);
        $('#txtreq_leave_type').val(details[0]);
        $('#txtreq_dfrom').val(details[2]);
        $('#txtreq_dto').val(details[3]);
        $('#txtreq_reason').val(details[4]);
        $('#txtreq_patient').val((details[8] == 1 ? 'Out' : 'In') + ' Patient');

        $('select#selreq_stat').append('<option value="'+status[0]+'">'+getrequest_status(status[0])+'</option>');
        $('select#selreq_stat').append('<option value="Disapproved">Disapprove</option>');
        $('select#selreq_stat').selectpicker('refresh');
        
        if(data['req_status'] == 'Cancelled'){
            $('#btncertify').hide();
            $('select#selreq_stat,#txtreq_location,#txtreq_comm,#txtreq_remarks').attr('disabled','disabled');
        }else{
            $('#btncertify').show();
        }

        $('#modal-viewRequest').modal('show');
    });

});