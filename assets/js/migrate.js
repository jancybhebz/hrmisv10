function divset_bottom() {
	var objDiv = $(".code");
	$('div#loading-text').remove();
	var h = objDiv.get(0).scrollHeight;
	objDiv.animate({scrollTop: h});
}


$(document).ready(function(){

	$('#btnmigrate').click(function() {
		divset_bottom();
		$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
		var host 	= $('#txthost').val();
		var dbname 	= $('#txtdbname').val();
		var uname 	= $('#txtuname').val();
		var pass 	= $('#txtpass').val();
		pass = pass.replace(/\&/g,'^amp;');
		pass = pass.replace(/\*/g,'^atrsk;');
		pass = pass.replace(/\+/g,'^pls;');
		pass = pass.replace(/\+/g,'^pls;');
		pass = pass.replace(/\#/g,'^hash;');
		// check "" and ''
		
		$('.code').show();

		/* STEP 1*/
		$('.code').append($("<div>").load(encodeURI("dbmigrate/migrate/comparing_tables?host="+host+"&dbname="+dbname+"&uname="+uname+"&pass="+pass), function() {
			$('#update_table-modal').modal({'backdrop':'static','keyboard':'false'});
			$('#update_table-modal').modal({},'show');
		}));
	});

	$('#btn-update-tables').click(function(e) {
		divset_bottom();
		$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
		e.preventDefault();
		$('#update_table-modal').modal('hide');

		/* STEP 2; Fix Date*/
		$('.code').append($("<div>").load("dbmigrate/migrate/fix_datetime_fields", function() { 
			divset_bottom();
			$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
			/* STEP 3; Fix Time*/
			$('.code').append($("<div>").load("dbmigrate/migrate/fix_time", function() { 
				divset_bottom();
				$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
				/* STEP 4; fix DateTime field in table tblEmpDTR*/
				$('.code').append($("<div>").load("dbmigrate/migrate/fix_dtr_datetime_field", function() {
					divset_bottom();
					$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
					$('#fix_datetime_fields-modal').modal({'backdrop':'static','keyboard':'false'});
					$('#fix_datetime_fields-modal').modal('show');
				}));
			}));
		}));
	});

	/* STEP */
	$('#btn-fix-date-fields').click(function(e) {
		divset_bottom();
		$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
		e.preventDefault();
		$('#fix_datetime_fields-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/update_fields", function() { 
			divset_bottom();
			$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
			/* STEP 5; Change inPM to Military Time*/
			$('.code').append($("<div>").load("dbmigrate/migrate/fix_dtr_inpm_military_time", function() {
				divset_bottom();
				$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
				/* STEP 6; Change outPM to Military Time*/
				$('.code').append($("<div>").load("dbmigrate/migrate/fix_dtr_outpm_military_time", function() {
					divset_bottom();
					$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
					// /* STEP 7; Change inOT to Military Time*/
					$('.code').append($("<div>").load("dbmigrate/migrate/fix_dtr_inot_military_time", function() {
						divset_bottom();
						$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
						/* STEP 8; Change outOT to Military Time*/
						$('.code').append($("<div>").load("dbmigrate/migrate/fix_dtr_outot_military_time", function() {
							divset_bottom();
							$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
							/* STEP 9; Drop old field with old data */
							$('.code').append($("<div>").load("dbmigrate/migrate/fix_dtr_drop_old_field", function() {
								divset_bottom();
								$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
								$('#update_fields-modal').modal({'backdrop':'static','keyboard':'false'});
								$('#update_fields-modal').modal('show');
							}));
						}));
					}));
				}));
			}));
		}));
	});

	$('#btn-update-fields').click(function(e) {
		divset_bottom();
		$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
		e.preventDefault();
		$('#update_fields-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/update_data_type", function() {
			divset_bottom();
			$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
			$('#update_data_type-modal').modal({'backdrop':'static','keyboard':'false'});
			$('#update_data_type-modal').modal('show');
		}));
	});

	$('#btn-update-data-type').click(function(e) {
		divset_bottom();
		$(".code").append('<div id="loading-text"><b>Loading</b> <img src="assets/images/loading-text.gif" width="35px"/></div>');
		e.preventDefault();
		$('#update_data_type-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/update_database", function() {
			divset_bottom();
		}));
	});



});

