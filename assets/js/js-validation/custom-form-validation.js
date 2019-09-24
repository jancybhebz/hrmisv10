function validate_bsselect(e)
{
	if(e.val() == ''){
		e.prev("i").show().attr('data-original-title', "This field is required.");
		e.closest('div.form-group').addClass('has-error');
		return 1;
	}else{
		e.prev("i").hide();
		e.closest('div.form-group').removeClass('has-error');
		return 0;
	}
	
}

function validate_text(e)
{
	if(e.val() == ''){
		e.prev("i").show().attr('data-original-title', "This field is required.");
		e.closest('div.form-group').addClass('has-error');
		return 1;
	}else{
		e.prev("i").hide();
		e.closest('div.form-group').removeClass('has-error');
		return 0;
	}
	
}

function check_null(el,msg)
{
    $(el).closest('div.form-group').find('i.fa-calendar').remove();
    if($(el).val() != ''){
        $(el).closest('div.form-group').removeClass('has-error');
        $(el).closest('div.form-group').addClass('has-success');
        $(el).closest('div.form-group').find('i.fa-warning').remove();
        $(el).closest('div.form-group').find('i.fa-check').remove();
        $('<i class="fa fa-check tooltips"></i>').insertBefore($(el));
        return 0;
    }else{
        $(el).closest('div.form-group').addClass('has-error');
        $(el).closest('div.form-group').removeClass('has-success');
        $(el).closest('div.form-group').find('i.fa-check').remove();
        $(el).closest('div.form-group').find('i.fa-warning').remove();
        $('<i class="fa fa-warning tooltips font-red" data-original-title="'+msg+'"></i>').tooltip().insertBefore($(el));
        return 1;
    }
}

function check_number(el)
{
    $(el).closest('div.form-group').find('i.fa-calendar').remove();
    if(isNaN($(el).val()) == false && $(el).val() != ''){
        $(el).closest('div.form-group').removeClass('has-error');
        $(el).closest('div.form-group').addClass('has-success');
        $(el).closest('div.form-group').find('i.fa-warning').remove();
        $(el).closest('div.form-group').find('i.fa-check').remove();
        $('<i class="fa fa-check tooltips"></i>').insertBefore($(el));
        return 0;
    }else{
        $(el).closest('div.form-group').addClass('has-error');
        $(el).closest('div.form-group').removeClass('has-success');
        $(el).closest('div.form-group').find('i.fa-check').remove();
        $(el).closest('div.form-group').find('i.fa-warning').remove();
        $('<i class="fa fa-warning tooltips font-red" data-original-title="Invalid input."></i>').tooltip().insertBefore($(el));
        return 1;
    }
}






// /* settings:
// 	if multiple form, add id;
// 	<div class="form-group">
// 		<label class="control-label">Label<span class="required"> * </span></label>
// 		<div class="input-icon right">
// 			<i class="fa fa-warning tooltips i-required"></i>
// 			<input type="text" class="form-control form-required">
// 		</div>
// 	</div>
// 	<div class="form-group">
//         <label class="control-label">Label</label>
//         <div class="radio-list radio-required">
//             <label class="radio-inline">
//                 <input type="radio" name="radgender1"> Female </label>
//         </div>
//     </div>
// **/
// function checkElement(e,obj='',value=0)
// {
// 	var res = 1;
// 	if(obj=='radio'){
// 		if(value == 1){
// 			e.parent().removeClass('has-error');
// 			res = 0;
// 		}else{
// 			e.parent().addClass('has-error');
// 			res = 1;
// 		}
// 	}else{
// 		if(obj == 'select2-multiple'){
// 			if(e.val() == null){
// 				e.parent().parent().addClass('has-error');
// 				e.prev("i").attr('data-original-title', "This field is required.");
// 				e.prev("i").show();
// 				res = 1;	
// 			}else{
// 				e.prev("i").hide();
// 				e.parent().parent().removeClass('has-error');
// 				res = 0;
// 			}
// 		}else{

// 			if(e.val() == '' || e.val() == null || e.val().toLowerCase() == 'null'){
// 				e.parent().parent().addClass('has-error');
// 				e.prev("i").attr('data-original-title', "This field is required.");
// 				e.prev("i").show();
// 				res = 1;
// 			}else{
// 				if(obj == 'text'){
// 					if(!e.val().replace(/\s/g, '').length){
// 						e.parent().parent().addClass('has-error');
// 						e.prev("i").attr('data-original-title', "Invalid input.");
// 						e.prev("i").show();
// 						res = 1;
// 					}else{
// 						e.prev("i").hide();
// 						e.parent().parent().removeClass('has-error');
// 						res = 0;
// 					}
// 				}else{
// 					e.prev("i").hide();
// 					e.parent().parent().removeClass('has-error');
// 					res = 0;
// 				}
// 			}

// 		}

// 	}
// 	return res;
// }

// $(document).ready(function() {
// 	$('.i-required').hide();
// 	if($('.loading-image').length > 0){
// 		$('.loading-image').hide();
// 	    $('.portlet-body').show();
// 	}

// 	$('form [type="text"].form-required').keyup(function(e) {
// 		checkElement($(this), 'text');
// 	});

// 	$('form select.form-required:not(select.select2-multiple)').change(function(e) {
// 		checkElement($(this));
// 	});

// 	$('form select.select2-multiple.form-required').change(function(e) {
// 		checkElement($(this),'select2-multiple');
// 	});

// 	if($('form [type="radio"]').length > 0){
// 		$('.radio-required').click(function() {
// 			checkElement($(this), 'radio', $(this).find("input:radio:checked").length);
// 		});
// 	}

// 	$('.date-picker').on('changeDate', function(ev){
// 	    checkElement($(this), 'text');
// 	    $(this).datepicker('hide');
// 	});

// 	$('form').on('submit', function (e) {
// 		frmname = typeof($(this).attr('id')) != "undefined" && $(this).attr('id') !== null ? '#'+$(this).attr('id') : '';

// 		var resval = [];
// 		$(frmname+' [type="text"].form-required').each(function() {
// 			resval.push(checkElement($(this), 'text'));
// 		});

// 		$(frmname+' select.form-required:not(select.select2-multiple)').each(function() {
// 			console.log($(this));
// 			resval.push(checkElement($(this)));
// 		});

// 		$(frmname+' select.select2-multiple.form-required').each(function() {
// 			console.log($(this));
// 			resval.push(checkElement($(this),'select2-multiple'));
// 		});

// 		$(frmname+' .radio-required').each(function() {	
// 			resval.push(checkElement($(this), 'radio', $(this).find("input:radio:checked").length));
// 		});

// 		console.log(resval);
// 		if(resval.includes(1)){
// 			e.preventDefault();
// 		}
// 	});
// });