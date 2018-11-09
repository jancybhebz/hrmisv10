$(document).ready(function() {
	$('.loading-image').hide();
	$('#div-body').show();
	
    // check boxes
    $('div.col-md-12 > div#div-benefit, div.col-md-12 > div#div-bonus, div.col-md-12 > div#div-income').on('click', 'div.col-md-3 > label.checkbox', function() {
    	var checker = $(this).find('div.checker > span');
    	if(checker.attr('class') == ''){
    		checker.addClass('checked');
    		return false;
    	}else{
    		checker.removeClass('checked');
    		return false;
    	}
    });

    $('#chkall-benefit').click(function() {
    	if($(this).prop('checked')){
    		$('div.col-md-12 > div#div-benefit > div.col-md-3 > label.checkbox').find('div.checker').find('span').addClass('checked');
    	}else{
    		$('div.col-md-12 > div#div-benefit > div.col-md-3 > label.checkbox').find('div.checker').find('span').removeClass('checked');
    	}
    });

    $('#chkall-bonus').click(function() {
    	if($(this).prop('checked')){
    		$('div.col-md-12 > div#div-bonus > div.col-md-3 > label.checkbox').find('div.checker').find('span').addClass('checked');
    	}else{
    		$('div.col-md-12 > div#div-bonus > div.col-md-3 > label.checkbox').find('div.checker').find('span').removeClass('checked');
    	}
    });

    $('#chkall-income').click(function() {
    	if($(this).prop('checked')){
    		$('div.col-md-12 > div#div-income > div.col-md-3 > label.checkbox').find('div.checker').find('span').addClass('checked');
    	}else{
    		$('div.col-md-12 > div#div-income > div.col-md-3 > label.checkbox').find('div.checker').find('span').removeClass('checked');
    	}
    });



});