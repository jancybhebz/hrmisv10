
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
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').hide();
		$('#submitFL').show();
		$('#submitSPL').hide();
		$('#submitSL').hide();
		$('#submitVL').hide();
		$('#submitML').hide();
		$('#submitPL').hide();
		$('#submitSTL').hide();
		
			// $('#print_button').show();
	}
	else if(select_leavetype == 'special')
	{
	 	$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').show();
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').hide();
		$('#submitFL').hide();
		$('#submitSPL').show();
		$('#submitSL').hide();
		$('#submitVL').hide();
		$('#submitML').hide();
		$('#submitPL').hide();
		$('#submitSTL').hide();
	}
	else if(select_leavetype == 'sick')
	{
	 	$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').show();
		$('#incaseSL_textbox').show();
		$('#incaseVL_textbox').hide();
		$('#submitFL').hide();
		$('#submitSPL').hide();
		$('#submitSL').show();
		$('#submitVL').hide();
		$('#submitML').hide();
		$('#submitPL').hide();
		$('#submitSTL').hide();
	}
	else if(select_leavetype == 'vacation')
	{
	 	$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').show();
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').show();
		$('#submitFL').hide();
		$('#submitSPL').hide();
		$('#submitSL').hide();
		$('#submitVL').show();
		$('#submitML').hide();
		$('#submitPL').hide();
		$('#submitSTL').hide();
	}
	 else if(select_leavetype == 'maternity')
	{
	 	$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').show();
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').hide();
		$('#submitFL').hide();
		$('#submitSPL').hide();
		$('#submitSL').hide();
		$('#submitVL').hide();
		$('#submitML').show();
		$('#submitPL').hide();
		$('#submitSTL').hide();
	}
	else if(select_leavetype == 'paternity')
	{
	 	$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').show();
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').hide();
		$('#submitFL').hide();
		$('#submitSPL').hide();
		$('#submitSL').hide();
		$('#submitVL').hide();
		$('#submitML').hide();
		$('#submitPL').show();
		$('#submitSTL').hide();
	}
	else if(select_leavetype == 'study')
	{
	 	$('#wholeday_textbox').show();
		$('#leavefrom_textbox').show();
		$('#leaveto_textbox').show();	
		$('#daysapplied_textbox').show();
		$('#signatory1_textbox').show();
		$('#signatory2_textbox').show();
		$('#reason_textbox').show();
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').hide();
		$('#submitFL').hide();
		$('#submitSPL').hide();
		$('#submitSL').hide();
		$('#submitVL').hide();
		$('#submitML').hide();
		$('#submitPL').hide();
		$('#submitSTL').show();
	}
	
	else 
	{
		$('#wholeday_textbox"').hide();
		$('#leavefrom_textbox').hide();
		$('#leaveto_textbox').hide();
		$('#daysapplied_textbox').hide();
		$('#signatory1_textbox').hide();
		$('#signatory2_textbox').hide();
		$('#reason_textbox').hide();
		$('#incaseSL_textbox').hide();
		$('#incaseVL_textbox').hide();
		$('#submitFL').hide();
		$('#submitSPL').hide();
		$('#submitSL').hide();
		$('#submitVL').hide();
		$('#submitML').hide();
		$('#submitPL').hide();
		$('#submitSTL').hide();
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
	$('#incaseSL_textbox').hide();
	$('#incaseVL_textbox').hide();
	$('#submitFL').hide();
	$('#submitSPL').hide();
	$('#submitSL').hide();
	$('#submitVL').hide();
	$('#submitML').hide();
	$('#submitPL').hide();
	$('#submitSTL').hide();

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