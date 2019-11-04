function hide_all() {
	$('#divprof,#divfam,#diveduc,#divtra,#divexam,#divchildren,#divcomm,#divref,#divvol,#divxp').hide();
}

$(document).ready(function() {

	hide_all();
	$('#diveduc').show();
	$('#strProfileType').on('keyup keypress change',function() {
		hide_all();

		switch($(this).val().toLowerCase()) {
		    case 'profile':
				$('#divprof').show();
				break;
			case 'family':
				$('#divfam').show();
				break;
			case 'educational':
				$('#diveduc').show();
				break;
			case 'trainings':
				$('#divtra').show();
				break;
			case 'examinations':
				$('#divexam').show();
				break;
			case 'children':
				$('#divchildren').show();
				break;
			case 'community':
				$('#divcomm').show();
				break;
			case 'references':
				$('#divref').show();
				break;
			case 'voluntary':
				$('#divvol').show();
				break;
			case 'workexp':
				$('#divxp').show();
				break;
		}

	});

});