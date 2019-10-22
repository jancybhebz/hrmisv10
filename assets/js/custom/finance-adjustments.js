$(document).ready(function() {
	$('#btnaddIncome_adj').click(function() {
	    $('.modal-action').html('Add');
	    $('#txtaction').val('add');
	    $('#txtinc_id, #txtinc_amt').val('');
	    $('#selinc_type, #selinc_month, #selinc_yr').val('null');
	    $('#selincome').select2('val','null');
	    $('.form-group').removeClass('has-error');
	    $('.input-icon').find("i").hide();
	    $('#incomeAdjustments').modal('show');
	});

	$('#btnaddDeduct_adj').click(function() {
	    $('.modal-action').html('Add');
	    $('#txtded_action').val('add');
	    $('#txtded_id, #txtded_amt').val('');
	    $('#selded_type, #selded_month, #selded_yr').val('null');
	    $('#seldeduct').select2('val','null');
	    $('.form-group').removeClass('has-error');
	    $('.input-icon').find("i").hide();
	    $('#deductAdjustments').modal('show');
	});

	/* Income Adjustment */
	$('#seladjmon,#seladjyr,#seladjper').on('keyup keypress change',function() {
		var period_error = 0;
		period_error = period_error + check_null('#seladjmon','Payroll month must not be empty.');
		period_error = period_error + check_null('#seladjyr','Payroll year must not be empty.');
		period_error = period_error + check_null('#seladjper','Payroll period must not be empty.');
		if(period_error > 0){
			$('.div-payrolldate').addClass('font-red');
		}else{
			$('.div-payrolldate').removeClass('font-red');
		}
	});

	$('#selincome').on('keyup keypress change',function() {
		check_null('#selincome','Income period must not be empty.');
	});

	$('#selinc_type').on('keyup keypress change',function() {
		check_null('#selinc_type','Type must not be empty.');
	});

	$('#txtinc_amt').on('keyup keypress change',function() {
		check_number('#txtinc_amt','Income must not be empty.');
	});

	$('#selinc_month,#selinc_yr').on('keyup keypress change',function() {
		var adjdate_error = 0;
		adjdate_error = adjdate_error + check_null('#selinc_month','Adjustment month must not be empty.');
		adjdate_error = adjdate_error + check_null('#selinc_yr','Adjustment year must not be empty.');
		if(adjdate_error > 0){
			$('.div-adjdate').addClass('font-red');
		}else{
			$('.div-adjdate').removeClass('font-red');
		}
	});

	$('#btnsubmit-adj-income').click(function(e) {
		var total_error = 0;
		var period_error = 0;

		period_error = period_error + check_null('#seladjmon','Payroll month must not be empty.');
		period_error = period_error + check_null('#seladjyr','Payroll year must not be empty.');
		period_error = period_error + check_null('#seladjper','Payroll period must not be empty.');
		total_error = total_error + period_error;
		if(period_error > 0){
			$('.div-payrolldate').addClass('font-red');
		}else{
			$('.div-payrolldate').removeClass('font-red');
		}

		total_error = total_error + check_null('#selinc_type','Type must not be empty.');
		total_error = total_error + check_null('#selincome','Amount must not be empty.');
		total_error = total_error + check_number('#txtinc_amt','Income must not be empty.');
		total_error = total_error + check_null('#selinc_type','Type must not be empty.');

		var adjdate_error = 0;
		adjdate_error = adjdate_error + check_null('#selinc_month','Adjustment month must not be empty.');
		adjdate_error = adjdate_error + check_null('#selinc_yr','Adjustment year must not be empty.');
		total_error = total_error + adjdate_error;
		if(adjdate_error > 0){
			$('.div-adjdate').addClass('font-red');
		}else{
			$('.div-adjdate').removeClass('font-red');
		}

		if(total_error > 0){
		    e.preventDefault();
		}
	});


});