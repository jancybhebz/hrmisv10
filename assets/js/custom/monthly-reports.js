$('select.select2').select2({
    minimumResultsForSearch: -1,
    placeholder: function(){
        $(this).data('placeholder');
    }
});

$('.date-picker').datepicker( {
    format: 'yyyy',
    viewMode: 'years',
    minViewMode: 'years'
});

$(document).ready(function() {
    $('.loading-image').hide();
    $('#div-body').show();
    var getdata = '';
    $('#selyr').on('change', function(){
        processid = $('#selappt').find(':selected').attr('data-processid');
        period = $('#selappt').find(':selected').attr('data-period');
        window.open('?month='+$('#selmon').val()+'&yr='+$('#selyr').val()+'&appt='+$('#selappt').val()+'&processid='+processid+'&period='+period,'_self');
    });
    $('#selmon').on('change', function(){
        processid = $('#selappt').find(':selected').attr('data-processid');
        period = $('#selappt').find(':selected').attr('data-period');
        window.open('?month='+$('#selmon').val()+'&yr='+$('#selyr').val()+'&appt='+$('#selappt').val()+'&processid='+processid+'&period='+period,'_self');
    });
    $('#selappt').on('change', function(){
        processid = $('#selappt').find(':selected').attr('data-processid');
        period = $('#selappt').find(':selected').attr('data-period');
        window.open('?month='+$('#selmon').val()+'&yr='+$('#selyr').val()+'&appt='+$('#selappt').val()+'&processid='+processid+'&period='+period,'_self');
    });

    $('table#tblmreports').on('click','a.areport', function(){
        var link = $(this).data('link');
        var linkper = $(linkper).data('linkper');
        json = $('#selappt').find(':selected').attr('data-json');
        json_data = JSON.parse(json);
        // appt = json_data.employeeAppoint;
        // if(json_data.employeeAppoint != 'P'){
            getdata = "?appt=" + json_data.employeeAppoint + "&pprocess=" + json_data.processID + "&yr=" + json_data.processYear + "&month=" + json_data.processMonth + "&period=" + json_data.period + "&linkper=" + linkper;
        // }
        // alert(json.employeeAppoint);
        $('.modal-title').html($(this).data('title'));
        $('#print-preview-modal').modal('show');
        $('#embed-pdf,#link-fullsize').attr('src',link+getdata);
        // alert(url);
    });

    $('#link-fullsize').click(function() {
        window.open($(this).attr('src'));
    });

});