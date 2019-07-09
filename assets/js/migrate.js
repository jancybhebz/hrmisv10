$(document).ready(function(){
	$('#btnmigrate').click(function() {
		var host 	= $('#txthost').val();
		var port 	= $('#txtport').val();
		var dbname 	= $('#txtdbname').val();
		var uname 	= $('#txtuname').val();
		var pass 	= $('#txtpass').val();
		$('.code').show();
		$('.code').append($("<div>").load("dbmigrate/migrate/comparing_tables?host="+host+"&port="+port+"&dbname="+dbname+"&uname="+uname+"&pass="+pass, function() {
			$('#update_table-modal').modal('show');
		}));
		// $('.code').append($("<div>").load("dbmigrate/migrate/fix_datetime_fields"));
		// $('.code').append($("<div>").load("dbmigrate/migrate/update_fields"));
		// $('.code').append($("<div>").load("dbmigrate/migrate/update_sql", function() {
		// 	// show confirmation modal altering database schema
		// 	$('#confirmation-modal').modal('show');
		// }));
	});

	$('#btn-update-tables').click(function(e) {
		e.preventDefault();
		$('.code').append($("<div>").load("dbmigrate/migrate/fix_datetime_fields", function() {
			$('#update_table-modal').modal('hide');
			$('#fix_datetime_fields-modal').modal('show');
		}));
	});

	$('#btn-fix-date-fields').click(function(e) {
		e.preventDefault();
		$('.code').append($("<div>").load("dbmigrate/migrate/update_fields", function() {
			$('#fix_datetime_fields-modal').modal('hide');
			// $('#fix_datetime_fields-modal').modal('show');
		}));
	});



});

