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
        alert();
    });

});