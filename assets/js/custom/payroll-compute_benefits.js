$(document).ready(function() {
	$('.loading-image').hide();
	$('#div-body').show();

    $.ajax({
        url: 'compute_benefits',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    });

});