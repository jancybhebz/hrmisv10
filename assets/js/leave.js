
function showtextbox()
{
	var select_leavetype=$('#strLeavetype').val();
	//alert(select_report);
	if(select_leavetype == 'forced')
	{
		$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').hide();
			// $('#print_button').show();
	}
	// else if(select_leavetype == 'special')
	// {
	// 	$('#agency_textbox').show();
	// 	$('#year_textbox').show();
	// 	$('#quarter_textbox').show();	
	// 	$('#person_textbox').hide();
	// 	$('#sponsor_textbox').hide();
	// 	$('#print_button').show();
	// }
	
	// else if(select_leavetype == 'sick')
	// {
	// 	$('#year_textbox').show();
	// 	$('#quarter_textbox').show();
	// 	$('#person_textbox').hide();
	// 	$('#agency_textbox').hide();
	// 	$('#sponsor_textbox').hide();
	// 	$('#print_button').show();
	
	// }
	// else if(select_leavetype == 'vacation')
	// {
	// 	$('#year_textbox').show();
	// 	$('#quarter_textbox').show();
	// 	$('#person_textbox').hide();
	// 	$('#agency_textbox').hide();
	// 	$('#sponsor_textbox').hide();
	// 	$('#print_button').show();
	
	// }
	// else if(select_leavetype == 'maternity')
	// {
	// 	$('#year_textbox').show();
	// 	$('#quarter_textbox').show();
	// 	$('#person_textbox').hide();
	// 	$('#agency_textbox').hide();
	// 	$('#sponsor_textbox').hide();
	// 	$('#print_button').show();
	
	// }
	// else if(select_leavetype == 'paternity')
	// {
	// 	$('#year_textbox').show();
	// 	$('#quarter_textbox').show();
	// 	$('#person_textbox').show();
	// 	$('#agency_textbox').hide();
	// 	$('#sponsor_textbox').hide();
	// 	$('#print_button').show();
	
	// }
	// else if(select_leavetype == 'study')
	// {
	// 	$('#year_textbox').show();
	// 	$('#quarter_textbox').show();
	// 	$('#person_textbox').hide();
	// 	$('#agency_textbox').hide();
	// 	$('#sponsor_textbox').hide();
	// 	$('#print_button').show();
	// }
	
	else 
	{
		$('#wholeday_textbox"').hide();
		$('#leavefrom_textbox').hide();
		$('#leaveto_textbox').hide();
		$('#daysapplied_textbox').hide();
		$('#signatory1_textbox').hide();
		$('#signatory2_textbox').hide();
		$('#reason_textbox').hide();
	}
	
}

$(document).ready(function() 
{ 
	$('#wholeday_textbox').hide();
	$('#leavefrom_textbox').hide();
	$('#leaveto_textbox').hide();
	$('#daysapplied_textbox').hide();
	$('#signatory1_textbox').hide();
	$('#signatory2_textbox').hide();
	$('#reason_textbox').hide();


	// $('#printreport').click(function(){
	// 	var leave=$('#strLeavetype').val();
		
	// 	var person=$('#strperson').val();
	// 	var year=$('#txtYear').val();
	// 	var agency=$('#stragency').val();
	// 	var quarter=$('#intQuarter').val();
	// 	var sponsor=$('#strSponsor').val();
	// 	var valid = false;
	// 	if(leave=='reportperson' && person!='')
	// 		valid=true;
	// 	else
	// 		document.getElementById('errorPerson').innerHTML = "This field is required!";
	// 	if(leave=='reportagency' && agency!='')
	// 		valid=true;
	// 	else
	// 		document.getElementById('errorAgency').innerHTML = "This field is required!";
	// 	if(leave=='forced' || leave=='special' || leave=='sick' || leave=='vacation' ||  leave=='maternity' ||  leave=='paternity' || leave=='study' )
	// 		valid=true;
	// 	if(valid)
	// 		window.open("reports/generate?leave="+leave+"&person="+person+"&year="+year+"&quarter="+quarter+"&agency="+agency,'_blank'); //ok
	
	// // window.open("reports/generate?rpt="+rpt+"&year="+year,'_blank');
	
	
	// });


});