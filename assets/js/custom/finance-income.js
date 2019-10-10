/*Begin Compensation - Income - Benefit List*/
function check_income_amount() {
	totalamt = parseFloat($('#txtamount-bl').val().replace(/[^\d\.]/g, ""));
	period1 = parseFloat($('#txtperiod1-bl').val().replace(/[^\d\.]/g, ""));
	period2 = parseFloat($('#txtperiod2-bl').val().replace(/[^\d\.]/g, ""));
	period3 = parseFloat($('#txtperiod3-bl').val().replace(/[^\d\.]/g, ""));
	period4 = parseFloat($('#txtperiod4-bl').val().replace(/[^\d\.]/g, ""));

	if(totalamt != (period1 + period2 + period3 + period4)){
		$('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').addClass('has-error');
		$('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').removeClass('has-success');
		$('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').find('i.fa-check').remove();
		$('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').find('i.fa-warning').remove();
		$('<i class="fa fa-warning tooltips font-red" data-original-title="Total amount should be equal to the total of period amount."></i>').tooltip().insertBefore($('#txtamount-bl'));
		$('<i class="fa fa-warning tooltips font-red" data-original-title="Total amount should be equal to the total of period amount."></i>').tooltip().insertBefore($('#txtperiod1-bl'));
		$('<i class="fa fa-warning tooltips font-red" data-original-title="Total amount should be equal to the total of period amount."></i>').tooltip().insertBefore($('#txtperiod2-bl'));
		$('<i class="fa fa-warning tooltips font-red" data-original-title="Total amount should be equal to the total of period amount."></i>').tooltip().insertBefore($('#txtperiod3-bl'));
		$('<i class="fa fa-warning tooltips font-red" data-original-title="Total amount should be equal to the total of period amount."></i>').tooltip().insertBefore($('#txtperiod4-bl'));
		return 1;
	}else{
	    $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').removeClass('has-error');
	    $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').addClass('has-success');
	    $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').find('i.fa-warning').remove();
	    $('#txtamount-bl, #txtperiod1-bl, #txtperiod2-bl, #txtperiod3-bl, #txtperiod4-bl').closest('div.form-group').find('i.fa-check').remove();
	    $('<i class="fa fa-check tooltips"></i>').insertBefore($('#txtamount-bl'));
	    $('<i class="fa fa-check tooltips"></i>').insertBefore($('#txtperiod1-bl'));
	    $('<i class="fa fa-check tooltips"></i>').insertBefore($('#txtperiod2-bl'));
	    $('<i class="fa fa-check tooltips"></i>').insertBefore($('#txtperiod3-bl'));
	    $('<i class="fa fa-check tooltips"></i>').insertBefore($('#txtperiod4-bl'));
	    return 0;
	}
}
/*End Compensation - Income - Benefit List*/

$(document).ready(function() {
	/*Begin Compensation - Income - Benefit List*/
	$('#txtamount-bl').on('keyup keypress change',function() {
		check_number('#txtamount-bl');
		check_income_amount();
	});

	$('#txttax-bl').on('keyup keypress change',function() {
		check_number('#txttax-bl');	
	});

	$('#txtperiod1-bl').on('keyup keypress change',function() {
		check_number('#txtperiod1-bl');
		check_income_amount();
	});

	$('#txtperiod2-bl').on('keyup keypress change',function() {
		check_number('#txtperiod2-bl');
		check_income_amount();
	});

	$('#txtperiod3-bl').on('keyup keypress change',function() {
		check_number('#txtperiod3-bl');
		check_income_amount();
	});

	$('#txtperiod4-bl').on('keyup keypress change',function() {
		check_number('#txtperiod4-bl');
		check_income_amount();
	});

	$('#selstatus-bl').on('keyup keypress change',function() {
		check_number('#selstatus-bl');	
	});

    $('#btnsubmit-deductDetails').click(function(e) {
        var total_error = 0;

        total_error = total_error + check_number('#txtamount-bl','Amount must not be empty.');
		total_error = total_error + check_number('#txttax-bl','Tax must not be empty.');
		total_error = total_error + check_number('#txtperiod1-bl','Period 1 must not be empty.');
		total_error = total_error + check_number('#txtperiod2-bl','Period 2 must not be empty.');
		total_error = total_error + check_number('#txtperiod3-bl','Period 3 must not be empty.');
		total_error = total_error + check_number('#txtperiod4-bl','Period 4 must not be empty.');
		total_error = total_error + check_number('#selstatus-bl','Status must not be empty.');

        if(total_error > 0){
            e.preventDefault();
        }else{
        	if(check_income_amount() > 0){
        		e.preventDefault()
        	}
        }
    });
    /*End Compensation - Income - Benefit List*/


});