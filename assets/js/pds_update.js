function hide_all() {
	$('#divprof,#divfam,#diveduc,#divtra,#divexam,#divchildren,#divcomm,#divref,#divvol,#divxp').hide();
}

$(document).ready(function() {

	hide_all();
	// $('#divtra').show();
	$('#table-trainings,#table-educ').dataTable({"pageLength": 5});

	if(has_set('educ_id')){
		$('#diveduc').show();
	}
	
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

	/* Begin Profile */
	$('#strSname').on('keyup keypress change',function() {
		check_null('#strSname','Surname must not be empty.');
	});

	$('#strFname').on('keyup keypress change',function() {
		check_null('#strFname','Firstname must not be empty.');
	});

	$('#strMname').on('keyup keypress change',function() {
		check_null('#strMname','Middlename must not be empty.');
	});

	$('#strBlk1').on('keyup keypress change',function() {
		check_null('#strBlk1','House/Block/Lot No. must not be empty.');
	});

	$('#strStreet1').on('keyup keypress change',function() {
		check_null('#strStreet1','Street must not be empty.');
	});

	$('#strSubd1').on('keyup keypress change',function() {
		check_null('#strSubd1','Subdivision/Villagemust not be empty.');
	});

	$('#strBrgy1').on('keyup keypress change',function() {
		check_null('#strBrgy1','Barangay must not be empty.');
	});

	$('#strCity1').on('keyup keypress change',function() {
		check_null('#strCity1','City/Municipalitymust not be empty.');
	});

	$('#strProv1').on('keyup keypress change',function() {
		check_null('#strProv1','Province must not be empty.');
	});

	$('#strZipCode1').on('keyup keypress change',function() {
		check_null('#strZipCode1','Zip Code must not be empty.');
	});

	$('#strBlk2').on('keyup keypress change',function() {
		check_null('#strBlk2','House/Block/Lot No. must not be empty.');
	});

	$('#strStreet2').on('keyup keypress change',function() {
		check_null('#strStreet2','Street must not be empty.');
	});

	$('#strSubd2').on('keyup keypress change',function() {
		check_null('#strSubd2','Subdivision/Villagemust not be empty.');
	});

	$('#strBrgy2').on('keyup keypress change',function() {
		check_null('#strBrgy2','Barangay must not be empty.');
	});

	$('#strCity2').on('keyup keypress change',function() {
		check_null('#strCity2','City/Municipality must not be empty.');
	});

	$('#strProv2').on('keyup keypress change',function() {
		check_null('#strProv2','Province must not be empty.');
	});

	$('#strZipCode2').on('keyup keypress change',function() {
		check_null('#strZipCode2','Zip Code must not be empty.');
	});


	$('#btn-request-profile').click(function(e) {
	    var total_error = 0;

	    total_error = total_error + check_null('#strSname','Surname must not be empty.');
	    total_error = total_error + check_null('#strFname','Firstname must not be empty.');
	    total_error = total_error + check_null('#strMname','Middlename must not be empty.');

	    total_error = total_error + check_null('#strBlk1','House/Block/Lot No. must not be empty.');
	    total_error = total_error + check_null('#strStreet1','Street must not be empty.');
	    total_error = total_error + check_null('#strSubd1','Subdivision/Villagemust not be empty.');
	    total_error = total_error + check_null('#strBrgy1','Barangay must not be empty.');
	    total_error = total_error + check_null('#strCity1','City/Municipalitymust not be empty.');
	    total_error = total_error + check_null('#strProv1','Province must not be empty.');
	    total_error = total_error + check_null('#strZipCode1','Zip Code must not be empty.');

	    total_error = total_error + check_null('#strBlk2','House/Block/Lot No. must not be empty.');
	    total_error = total_error + check_null('#strStreet2','Street must not be empty.');
	    total_error = total_error + check_null('#strSubd2','Subdivision/Villagemust not be empty.');
	    total_error = total_error + check_null('#strBrgy2','Barangay must not be empty.');
	    total_error = total_error + check_null('#strCity2','City/Municipalitymust not be empty.');
	    total_error = total_error + check_null('#strProv2','Province must not be empty.');
	    total_error = total_error + check_null('#strZipCode2','Zip Code must not be empty.');

	    if(total_error > 0){
	        e.preventDefault();
	    }
	});
	/* End Profile */

});