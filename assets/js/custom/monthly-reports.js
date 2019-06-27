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
        var linkper = $(this).data('linkper');
        json = $('#selappt').find(':selected').attr('data-json');
        json_data = JSON.parse(json);
        appt = json_data.employeeAppoint;
        
        if(appt == 'P'){
            if($('#selmon').val() == '06'){
                if(linkper==1){
                    $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/june1.pdf');
                }else{
                    $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/june2.pdf');
                }
            }
            if($('#selmon').val() == '05'){
                if(linkper==1){
                    $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/may1.pdf');
                }else{
                    $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/may2.pdf');
                }
            }
        }
        else if(appt == 'GIA'){
            if($('#selmon').val() == '06'){
                    if(linkper==1){
                        $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/gia-june1.pdf');
                    }else{
                        $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/gia-june2.pdf');
                    }
                }
                if($('#selmon').val() == '05'){
                    if(linkper==1){
                        $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/gia-may1.pdf');
                    }else{
                        $('#embed-pdf,#link-fullsize').attr('src','../../uploads/finance/reports/payslip/gia-may2.pdf');
                    }
                }
        }else{
            $('#embed-pdf,#link-fullsize').attr('src',link+getdata);
        }
        // // if(json_data.employeeAppoint != 'P'){
        //     getdata = "?appt=" + json_data.employeeAppoint + "&pprocess=" + json_data.processID + "&yr=" + json_data.processYear + "&month=" + json_data.processMonth + "&period=" + json_data.period + "&linkper=" + linkper;
        // // }
        // // alert(json.employeeAppoint);
        $('.modal-title').html($(this).data('title'));
        $('#print-preview-modal').modal('show');
        
        // alert(url);
    });

    $('#link-fullsize').click(function() {
        window.open($(this).attr('src'));
    });

});