function check_income_amount()
{
	var total_error = 0;
	total_error = total_error + check_number('#txtamount-bl');
	total_error = total_error + check_number('#txtperiod1-bl');
	total_error = total_error + check_number('#txtperiod2-bl');
	total_error = total_error + check_number('#txtperiod3-bl');
	total_error = total_error + check_number('#txtperiod4-bl');

	if(total_error < 1)
	{
		totalamt = parseFloat($('#txtamount-bl').val().replace(/[^\d\.]/g, ""));
		period1 = parseFloat($('#txtperiod1-bl').val().replace(/[^\d\.]/g, ""));
		period2 = parseFloat($('#txtperiod2-bl').val().replace(/[^\d\.]/g, ""));
		period3 = parseFloat($('#txtperiod3-bl').val().replace(/[^\d\.]/g, ""));
		period4 = parseFloat($('#txtperiod4-bl').val().replace(/[^\d\.]/g, ""));

		if(totalamt != (period1 + period2 + period3 + period4))
		{
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
}

function update_employee()
{
	$('#txtallincomecode').val($('#txtincomecode').val());
	$('#txtallbenefittype').val($('#txtbenefitType').val());
	$('#txtallamount').val($('#txtamount-bl').val());
	$('#txtalltax').val($('#txttax').val());
	$('#txtallperiod1').val($('#txtperiod1-bl').val());
	$('#txtallperiod2').val($('#txtperiod2-bl').val());
	$('#txtallperiod3').val($('#txtperiod3-bl').val());
	$('#txtallperiod4').val($('#txtperiod4-bl').val());
	$('#selallstatus').val($('#selstatus-bl').val());
	$('#appointmentList').modal('show');
}

$(document).ready(function() {
	$('#el-1, #el-2, #el-3, #el-4').hide();

	$('#table-benefitList, #table-bonusList, #table-longevityPay, #table-incomeList').dataTable({"pageLength": 5});

	$('#table-benefitList, #table-bonusList, #table-incomeList').on('click', 'tbody > tr #btn-modal-benefitList', function () {
	    $('#txtamount-bl,#txtperiod1-bl,#txtperiod2-bl,#txtperiod3-bl,#txtperiod4-bl,#selstatus-bl,#txtincomecode,#txtbenefitcode,#txttax-bl,#txtbenefitType').closest('div.form-group').removeClass('has-error');
	    $('#txtamount-bl,#txtperiod1-bl,#txtperiod2-bl,#txtperiod3-bl,#txtperiod4-bl,#selstatus-bl,#txtincomecode,#txtbenefitcode,#txttax-bl,#txtbenefitType').closest('div.form-group').removeClass('has-success');
	    $('#txtamount-bl,#txtperiod1-bl,#txtperiod2-bl,#txtperiod3-bl,#txtperiod4-bl,#selstatus-bl,#txtincomecode,#txtbenefitcode,#txttax-bl,#txtbenefitType').closest('div.form-group').find('i.fa-check').remove();
	    $('#txtamount-bl,#txtperiod1-bl,#txtperiod2-bl,#txtperiod3-bl,#txtperiod4-bl,#selstatus-bl,#txtincomecode,#txtbenefitcode,#txttax-bl,#txtbenefitType').closest('div.form-group').find('i.fa-warning').remove();

	    var el = $(this);
	    $('#div-tax').hide();
	    $('#sub-title').html(el.closest('table').data('title'));
	    $('#modal-title').html(el.parent().siblings(":first").text());
	    $('#txtamount-bl').val(el.parent().siblings(":eq(1)").text());
	    $('#txtperiod1-bl').val(el.data('period1').toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
	    $('#txtperiod2-bl').val(el.data('period2').toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
	    $('#txtperiod3-bl').val(el.data('period3').toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
	    $('#txtperiod4-bl').val(el.data('period4').toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
	    $('#selstatus-bl').val(el.data("statusval"));
	    $('#selstatus-bl').selectpicker('refresh');

	    $('#txtincomecode').val(el.data("incomecode"));
	    $('#txtbenefitcode').val(el.data("benefitcode"));
	    $('#txttax-bl').val(el.data("tax"));
	    $('#txtbenefitType').val(el.closest('table').data("title"));
	    if(el.data("stat") == 'bonus') { $('#div-tax').show(); }
	});

	$('#table-longevityPay').on('click', 'tbody > tr #btn-modal-longevity', function () {
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').removeClass('has-error');
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').removeClass('has-success');
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').find('i.fa-check').remove();
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').find('i.fa-warning').remove();

	    $('#sub-title').html($(this).closest('table').data('title'));
	    $('#txtlongevitydate-bl').val($(this).parent().siblings(":first").text());
	    $('#txtsalary-bl').val($(this).parent().siblings(":eq(1)").text());
	    $('#txtpercent-bl').val($(this).parent().siblings(":eq(2)").text());
	    $('#txtaction').val('edit');
	    $('#txtlongevityid').val($(this).data("longeid"));
	});

	$('#btn-add-longevity').on('click', function () {
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').removeClass('has-error');
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').removeClass('has-success');
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').find('i.fa-check').remove();
	    $('#txtlongevitydate-bl,#txtsalary-bl,#txtpercent-bl').closest('div.form-group').find('i.fa-warning').remove();
	    
	    $('#txtaction').val('add');
	    $('#txtlongevitydate-bl').val('');
	    $('#txtsalary-bl').val('');
	    $('#txtpercent-bl').val('');
	});

	$('#table-longevityPay').on('click', 'tbody > tr #btn-del-longevity', function () {
	    $('#txtdel_action').val('del');
	    $('#txtdel_longevityid').val($(this).data("longeid"));
	});

	$("#chkall").click(function () {
	    if($(this).is(":checked")){
	        $('div.checker span').addClass('checked');
	        $('input.chkappnt').prop('checked', true);
	    }else{
	        $('div.checker span').removeClass('checked');
	        $('input.chkappnt').prop('checked', false);
	    }
	});

	$("input.chkappnt").click(function () {
	    if($(this).is(":checked")){
	        $('div#uniform-chkall span').addClass('checked');
	        $('input#chkall').prop('checked', true);
	    }else{
	        $('div#uniform-chkall span').removeClass('checked');
	        $('input#chkall').prop('checked', false);
	    }
	});
	$('.date-picker').datepicker();

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
    	var total_error = 0;

        total_error = total_error + check_date('#txtlongevitydate-bl','Longevity Date must not be empty.');
		total_error = total_error + check_number('#txtsalary-bl','Salary must not be empty.');
		total_error = total_error + check_number('#txtpercent-bl','Percent must not be empty.');

        if(total_error > 0){
            e.preventDefault();
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