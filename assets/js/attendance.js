$(document).ready(function(){
	$('div#div-fixed,div#div-sliding,div#scheme_desc,div#checkbox').hide();

	$('#strSchemeType').on('keyup keypress change',function() {
		$('div#scheme_desc,div#checkbox').show();
		var type = $(this).val().toLowerCase();
		if(type == 'fixed'){
			$('div#div-fixed').show();
			$('div#div-sliding').hide();
		}else if(type == 'sliding'){
			$('div#div-sliding').show();
			$('div#div-fixed').hide();
		}else{
			$('div#div-fixed,div#div-sliding,div#scheme_desc,div#checkbox').hide();
		}
	});

	$('#strSchemeCode').on('keyup keypress change',function() {
		check_null('#strSchemeCode','Scheme Code must not be empty.');
	});

	$('#btn-add-attscheme').click(function(e) {
		e.preventDefault(); // Remove if done
	    var total_error = 0;

	    total_error = total_error + check_null('#strSchemeType','Scheme Type must not be empty.');
	    total_error = total_error + check_null('#strSchemeCode','Scheme Code must not be empty.');
	    // total_error = total_error + check_null('#strMname','Middlename must not be empty.');

	    // total_error = total_error + check_null('#strBlk1','House/Block/Lot No. must not be empty.');
	    // total_error = total_error + check_null('#strStreet1','Street must not be empty.');
	    // total_error = total_error + check_null('#strSubd1','Subdivision/Villagemust not be empty.');
	    // total_error = total_error + check_null('#strBrgy1','Barangay must not be empty.');
	    // total_error = total_error + check_null('#strCity1','City/Municipalitymust not be empty.');
	    // total_error = total_error + check_null('#strProv1','Province must not be empty.');
	    // total_error = total_error + check_null('#strZipCode1','Zip Code must not be empty.');

	    // total_error = total_error + check_null('#strBlk2','House/Block/Lot No. must not be empty.');
	    // total_error = total_error + check_null('#strStreet2','Street must not be empty.');
	    // total_error = total_error + check_null('#strSubd2','Subdivision/Villagemust not be empty.');
	    // total_error = total_error + check_null('#strBrgy2','Barangay must not be empty.');
	    // total_error = total_error + check_null('#strCity2','City/Municipalitymust not be empty.');
	    // total_error = total_error + check_null('#strProv2','Province must not be empty.');
	    // total_error = total_error + check_null('#strZipCode2','Zip Code must not be empty.');

	    if(total_error > 0){
	        e.preventDefault();
	    }
	});

});