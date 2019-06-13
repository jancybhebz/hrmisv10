$(document).ready(function() {
	$('.loading-image').hide();
	$('#div-body').show();
    $('.i-required').hide();
    $('.div-date').hide();

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
        var computation = $(this).find(':selected').data('comp').toLowerCase();

        // switch(computation) {
        //     case 'monthly':
        //         $('#frmprocess').attr('action', 'compute_benefits_perm');
        //         break;
        //     case 'daily':
        //         if(employment == 'JO'){
        //             $('#frmprocess').attr('action', 'compute_benefits_nonperm_jo');
        //         }else{
        //             $('#frmprocess').attr('action', 'compute_benefits_nonperm_trc');
        //         }
        //         break;
        //     default:
        //         $('#frmprocess').attr('action', 'compute_benefits_nonperm');
        //         break;
        // }

        if(employment != 'p'){
            // $('#frmprocess').attr('action', 'compute_benefits');
            $('.div-datause').hide();
            $('.div-date').show();
        }else{
            $('#frmprocess').attr('action', 'select_benefits_perm');
            $('.div-datause').show();
            $('.div-date').hide();
        }
    });

    $('select#selmon').on('changed.bs.select', function (e) {
        var selmonth = e.target.value;
        var selyr = $('select#selyr').val();
        if(selmonth == 1){
            selmonth = 13;
            $('select#data_fr_yr').selectpicker('val',(selyr-1));
        }else{
            $('select#data_fr_yr').selectpicker('val',(selyr));
        }
        $('select#data_fr_mon').selectpicker('val',(selmonth-1));
    });

    $('.date-picker').datepicker({autoclose: true});
    /* END PROCESSS 1 */

});