function checkElement(e, obj = '') {
	var res = 1;
	if(e.val() == ''){
		e.parent().parent().addClass('has-error');
		e.prev("i").attr('data-original-title', "This field is required.");
		e.prev("i").show();
		res = 1;
	}else{
		if(obj == 'text'){
	        if(!e.val().replace(/\s/g, '').length){
	            e.parent().parent().addClass('has-error');
				e.prev("i").attr('data-original-title', "Invalid input.");
				e.prev("i").show();
				res = 1;
	        }else{
	        	e.prev("i").hide();
				e.parent().parent().removeClass('has-error');
				res = 0;
	        }
	    }else{
	    	e.prev("i").hide();
			e.parent().parent().removeClass('has-error');
			res = 0;
	    }
	}
	return res;
}

$(document).ready(function() {

	if($('.loading-image').length > 0){
		$('.loading-image').hide();
	    $('.portlet-body').show();
	}

	$('form [type="text"]').keyup(function(e) {
		checkElement($(this), 'text');
	});

	$('form select').change(function(e) {
		checkElement($(this));
	});

	// if($('form [type="radio"]').length > 0){
	// 	$('form [type="radio"]').click(function(e) {
	// 		$('.radio-list').parent().parent().removeClass('has-error');
	// 		$('.radio-list').parent().parent().find('.help-block').html('');
	// 	});
	// }

	$('form').submit(function(e) {
		var resval = [];
		$('[type="text"]').each(function() {
			resval.push(checkElement($(this), 'text'));
		});

		$('select').each(function() {
			resval.push(checkElement($(this)));
		});


		// if($('form [type="radio"]').length > 0){
		// 	radchoice = [];
		// 	$('[type="radio"]').each(function() {
		// 		if($(this).is(':checked')){
		// 			radchoice.push($(this).val());
		// 		}
		// 	});
		// 	if(radchoice.length < 1){
		// 		$('[type="radio"]').each(function() {
		// 			$('.radio-list').parent().parent().addClass('has-error');
		// 			$('.radio-list').parent().parent().find('.help-block').html('This field is required.');
		// 		});
		// 	}
		// 	resval.push(radchoice.length > 0 ? 0 : 1);
		// }

		resval = resval.slice(1);
		if(resval.includes(1)){
			console.log(resval);
			e.preventDefault();
		}
	});
});