$(document).ready(function() {
	$('#txtamount-bl').on('keyup keypress change',function() {
		check_income_amount();
	});

	$('#txttax-bl').on('keyup keypress change',function() {
		check_number('#txttax-bl','Tax must not be empty.');
	});

	$('#txtperiod1-bl').on('keyup keypress change',function() {
		check_income_amount();
	});

	$('#txtperiod2-bl').on('keyup keypress change',function() {
		check_income_amount();
	});

	$('#txtperiod3-bl').on('keyup keypress change',function() {
		check_income_amount();
	});

	$('#txtperiod4-bl').on('keyup keypress change',function() {
		check_income_amount();
	});

	$('#selstatus-bl').on('keyup keypress change',function() {
		check_number('#selstatus-bl','Status must not be empty.');
	});

    $('#btn_submit_signature').click(function(e) {
    	e.preventDefault()
    	
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

    /* Longevity */
    $('#txtlongevitydate-bl').on('changeDate keyup keypress', function(){
    	check_date('#txtlongevitydate-bl','Longevity Date must not be empty.');
    	$(this).datepicker('hide');
    });

    $('#txtsalary-bl').on('keyup keypress change',function() {
    	check_number('#txtsalary-bl','Salary must not be empty.');
    });

    $('#txtpercent-bl').on('keyup keypress change',function() {
    	check_number('#txtpercent-bl','Percent must not be empty.');
    });

    $('#btn-update-longevity').click(function(e) {
    	e.preventDefault();
    	var total_error = 0;
    	
        total_error = total_error + check_date('#txtlongevitydate-bl','Longevity Date must not be empty.');
		total_error = total_error + check_number('#txtsalary-bl','Salary must not be empty.');
		total_error = total_error + check_number('#txtpercent-bl','Percent must not be empty.');

        if(total_error < 1){
        	$('#txt_upt_longevitydate-bl').val($('#txtlongevitydate-bl').val());
			$('#txt_upt_salary-bl').val($('#txtsalary-bl').val());
			$('#txt_upt_percent-bl').val($('#txtpercent-bl').val());
            $('#update_longevity').modal('show');
        }
    });

    /* Update All Employee*/
    $('#btnupdateallemployees').click(function(e) {
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
        	}else{
        		update_employee();
        	}
        }
    });

});