$(document).ready(function(){
	$('#btnmigrate').click(function() {
		var host 	= $('#txthost').val();
		var port 	= $('#txtport').val();
		var dbname 	= $('#txtdbname').val();
		var uname 	= $('#txtuname').val();
		var pass 	= $('#txtpass').val();
		console.log("dbmigrate/migrate/comparing_tables?host="+host+"&port="+port+"&dbname="+dbname+"&uname="+uname+"&pass="+pass);
		$('.code').show();
		$('.code').append($("<div>").load("dbmigrate/migrate/comparing_tables?host="+host+"&port="+port+"&dbname="+dbname+"&uname="+uname+"&pass="+pass));
		$('.code').append($("<div>").load("dbmigrate/migrate/fix_datetime_fields"));
		$('.code').append($("<div>").load("dbmigrate/migrate/update_fields"));
		$('.code').append($("<div>").load("dbmigrate/migrate/create_sql", function() {
			// show confirmation modal altering database schema
			$('#confirmation-modal').modal('show');
		}));
	});
});