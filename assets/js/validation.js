
function showtextbox()
{
	var select_report=$('#reporttype').val();
	//alert(select_report);
	if(select_report == 'reportperson')
	{
		$('#person_textbox').show();
		$('#year_textbox').show();
		$('#quarter_textbox').show();	
		$('#agency_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').show();
	}
	else if(select_report == 'reportagency')
	{
		$('#agency_textbox').show();
		$('#year_textbox').show();
		$('#quarter_textbox').show();	
		$('#person_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').show();
	}
	
	else if(select_report == 'reportsum')
	{
		$('#year_textbox').show();
		$('#quarter_textbox').show();
		$('#person_textbox').hide();
		$('#agency_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').show();
	
	}
	else if(select_report == 'reportlist')
	{
		$('#year_textbox').show();
		$('#quarter_textbox').show();
		$('#person_textbox').hide();
		$('#agency_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').show();
	
	}
	else if(select_report == 'reportexpenses')
	{
		$('#year_textbox').show();
		$('#quarter_textbox').show();
		$('#person_textbox').hide();
		$('#agency_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').show();
	
	}
	else if(select_report == 'reporttar')
	{
		$('#year_textbox').show();
		$('#quarter_textbox').show();
		$('#person_textbox').show();
		$('#agency_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').show();
	
	}
	else 
	{
		$('#person_textbox').hide();
		$('#agency_textbox').hide();
		$('#quarter_textbox').hide();
		$('#year_textbox').hide();
		$('#sponsor_textbox').hide();
		$('#print_button').hide();
	}
	
}

$(document).ready(function() { 
	$('#person_textbox').hide();
	$('#agency_textbox').hide();
	$('#quarter_textbox').hide();
	$('#year_textbox').hide();
	$('#sponsor_textbox').hide();
	$('#print_button').hide();

	$('#printreport').click(function(){
		var rpt=$('#reporttype').val();
		var person=$('#strperson').val();
		var year=$('#txtYear').val();
		var agency=$('#strAgency').val();
		var quarter=$('#intQuarter').val();
		var sponsor=$('#strSponsor').val();
	window.open("reports/generate?rpt="+rpt+"&person="+person+"&year="+year+"&quarter="+quarter+"&agency="+agency,'_blank'); //ok
	
	// window.open("reports/generate?rpt="+rpt+"&year="+year,'_blank');
	
	
	});


});