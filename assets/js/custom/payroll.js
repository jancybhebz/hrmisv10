$(document).ready(function() {
	$('.loading-image').hide();
	$('#div-body').show();

    // check boxes
    $('div.col-md-3').on('click', 'label.checkbox', function() {
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
    		$('div#div-benefit > div.col-md-3 > label.checkbox').find('div.checker > span').addClass('checked');
    	}else{
    		$('div#div-benefit > div.col-md-3 > label.checkbox').find('div.checker > span').removeClass('checked');
    	}
    });

    $('#chkall-bonus').click(function() {
    	if($(this).prop('checked')){
    		$('div#div-bonus > div.col-md-3 > label.checkbox').find('div.checker > span').addClass('checked');
    	}else{
    		$('div#div-bonus > div.col-md-3 > label.checkbox').find('div.checker > span').removeClass('checked');
    	}
    });

    $('#chkall-income').click(function() {
    	if($(this).prop('checked')){
    		$('div#div-income > div.col-md-3 > label.checkbox').find('div.checker > span').addClass('checked');
    	}else{
    		$('div#div-income > div.col-md-3 > label.checkbox').find('div.checker > span').removeClass('checked');
    	}
    });

    $('#chkall-loan').click(function() {
    	if($(this).prop('checked')){
    		$('div#div-loan > div.portlet > div.portlet-body').find('div.col-md-6 > label.checkbox > div.checker > span').addClass('checked');
    	}else{
    		$('div#div-loan > div.portlet > div.portlet-body').find('div.col-md-6 > label.checkbox > div.checker > span').removeClass('checked');
    	}
    });

    $('#chkall-cont').click(function() {
    	if($(this).prop('checked')){
    		$('div#div-cont > div.portlet > div.portlet-body').find('div.col-md-6 > label.checkbox > div.checker > span').addClass('checked');
    	}else{
    		$('div#div-cont > div.portlet > div.portlet-body').find('div.col-md-6 > label.checkbox > div.checker > span').removeClass('checked');
    	}
    });

    $('#chkall-othr').click(function() {
    	if($(this).prop('checked')){
    		$('div#div-othr > div.portlet > div.portlet-body').find('div.col-md-6 > label.checkbox > div.checker > span').addClass('checked');
    	}else{
    		$('div#div-othr > div.portlet > div.portlet-body').find('div.col-md-6 > label.checkbox > div.checker > span').removeClass('checked');
    	}
    });


    $('div.col-md-6').on('click', 'label.checkbox', function() {
    	var checker = $(this).find('div.checker > span');
    	if(checker.attr('class') == ''){
    		checker.addClass('checked');
    		return false;
    	}else{
    		checker.removeClass('checked');
    		return false;
    	}
    });


});