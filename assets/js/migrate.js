function divset_bottom() {
	var objDiv = $(".code");
	var h = objDiv.get(0).scrollHeight;
	objDiv.animate({scrollTop: h});
}

$(document).ready(function(){
	$('#btnmigrate').click(function() {
		divset_bottom();
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
		$('.code').append($("<div>").load(encodeURI("dbmigrate/migrate/comparing_tables?host="+host+"&dbname="+dbname+"&uname="+uname+"&pass="+pass), function() {
			$('#update_table-modal').modal('show');
		}));
	});

	$('#btn-update-tables').click(function(e) {
		divset_bottom();
		e.preventDefault();
		$('#update_table-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/fix_datetime_fields", function() {
			$('#fix_datetime_fields-modal').modal('show');
		}));
	});

	$('#btn-fix-date-fields').click(function(e) {
		divset_bottom();
		e.preventDefault();
		$('#fix_datetime_fields-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/update_fields", function() {
			$('#update_fields-modal').modal('show');
		}));
	});

	$('#btn-update-fields').click(function(e) {
		divset_bottom();
		e.preventDefault();
		$('#update_fields-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/update_data_type", function() {
			$('#update_data_type-modal').modal('show');
		}));
	});

	$('#btn-update-data-type').click(function(e) {
		divset_bottom();
		e.preventDefault();
		$('#update_data_type-modal').modal('hide');
		$('.code').append($("<div>").load("dbmigrate/migrate/update_database", function() {
			// $('#update_data_type-modal').modal('show');
		}));
	});



});

