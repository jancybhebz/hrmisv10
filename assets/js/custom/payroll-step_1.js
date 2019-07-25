function check_default_process(employment,selcode,selmonth,selyr)
{
    console.log('employment = ' + employment);
    console.log('selcode = ' + selcode);
    console.log('selmonth = ' + selmonth);
    console.log('selyr = ' + selyr);

    var process_default = $('#txtdefault').val();
    var disabled_button = 0;
    $.each(JSON.parse(process_default), function(index,item) {
        if(item.employeeAppoint == employment.toUpperCase() && item.processCode == selcode.toUpperCase() && item.processMonth == selmonth && item.processYear == selyr){
            disabled_button = 1;
            return false;
        }
    });
    
    if(disabled_button){
        $('#btn_step1').attr('disabled',true);
    }else{
        $('#btn_step1').attr('disabled',false);
    }
}

$(document).ready(function() {
	$('.loading-image').hide();
	$('#div-body').show();
    $('.i-required').hide();
    $('.div-date').hide();
    $('#btn_step1').attr('disabled',true);
    /* BEGIN PROCESSS 1 */
    $('button#btn_step1').on('click', function(e) {
        var step2 = 0;
        if(validate_bsselect($('select#selemployment'))){
            step2 = 1;
        }else{
            if(validate_bsselect($('select#selmon')) || validate_bsselect($('select#selyr')) || validate_bsselect($('select#selperiod'))){
                step2 = 1;
            }else{
                if($('select#selemployment').val() == 'P'){
                    if(validate_bsselect($('select#data_fr_mon')) ||validate_bsselect($('select#data_fr_yr'))){
                        step2 = 1;
                    }else{
                        step2 = 0;
                    }
                }else{
                    if(validate_text($('#txt_dtfrom')) || validate_text($('#txt_dtto'))){
                        step2 = 1;
                    }else{
                        step2 = 0;
                    }
                }
            }
        }

        if(step2){
            e.preventDefault();
        }else{
            $('.loading-fade').show();
        }
    });

    $('select#selemployment').on('changed.bs.select', function (e) {
        var employment = e.target.value.toLowerCase();
        var selcode = $('select#selcode').val();
        var selmonth = $('select#selmon').val();
        var selyr = $('select#selyr').val();
        var computation = $(this).find(':selected').data('comp').toLowerCase();
        switch(computation) {
            case 'monthly':
                $('#frmprocess').attr('action', 'select_benefits_perm');
                break;
            case 'daily':
                $('#frmprocess').attr('action', 'select_benefits_nonperm_trc');
                break;
            default:
                $('#frmprocess').attr('action', 'select_benefits_nonperm');
                break;
        }
        // console.log("payrollupdate/check_processed_payroll?selemployment="+employment+"&selcode="+selcode+"&selmonth="+selmonth+"&selyr="+selyr);
        $.get("payrollupdate/check_processed_payroll?selemployment="+employment+"&selmonth="+selmonth+"&selyr="+selyr, function( data ) {
          $('#txtprocess_details').val(data);
        });

        $('#txtcomputation').val(computation);
        if(employment != 'p'){
            $('.div-datause').hide();
            $('.div-date').show();
        }else{
            $('.div-datause').show();
            $('.div-date,.div-period').hide();
        }

        var process_data = $('#txtprocess_details').val();

        check_default_process(employment,selcode,selmonth,selyr);

    });

    $('select#selmon').on('changed.bs.select', function (e) {
        var employment = $('select#selemployment').val();
        var selcode = $('select#selcode').val();
        var selmonth = e.target.value;
        var selyr = $('select#selyr').val();

        if(selmonth == 1){
            selmonth = 13;
            $('select#data_fr_yr').selectpicker('val',(selyr-1));
        }else{
            $('select#data_fr_yr').selectpicker('val',(selyr));
        }
        $('select#data_fr_mon').selectpicker('val',(selmonth-1));

        check_default_process(employment,selcode,selmonth,selyr);
    });

    $('select#selyr').on('changed.bs.select', function (e) {
        var employment = $('select#selemployment').val();
        var selcode = $('select#selcode').val();
        var selmonth = $('select#selmon').val();
        var selyr = e.target.value;

        check_default_process(employment,selcode,selmonth,selyr);
    });

    $('select#selcode').on('changed.bs.select', function (e) {
        var employment = $('select#selemployment').val();
        var selcode = e.target.value;
        var selmonth = $('select#selmon').val();
        var selyr = $('select#selyr').val();

        check_default_process(employment,selcode,selmonth,selyr);
    });

    $('.date-picker').datepicker({autoclose: true});
    /* END PROCESSS 1 */

});