
function showtextbox()
{
	var select_scheme=$('#strSchemeType').val();
	//alert(select_report);
	if(select_scheme == 'Fixed')
	{
		$('#schemecode').show();
		$('#schemename').show();
		// fixed
		$('#FtimeIn').show();
		$('#FtimeOutFrom').show();
		$('#FtimeOutTo').show();
		$('#FtimeInFrom').show();
		$('#FtimeInTo').show();
		$('#FtimeOut').show();
		// sliding
		$('#StimeInFrom').hide();
		$('#StimeInTo').hide();
		$('#StimeOutFromNN').hide();
		$('#StimeOutToNN').hide();
		$('#StimeInFromNN').hide();
		$('#StimeInToNN').hide();
		$('#StimeOutFrom').hide();
		$('#StimeOutTo').hide();

	}
	else if(select_scheme == 'Sliding')
	{
		$('#schemecode').show();
		$('#schemename').show();
		// fixed
		$('#FtimeIn').hide();
		$('#FtimeOutFrom').hide();
		$('#FtimeOutTo').hide();
		$('#FtimeInFrom').hide();
		$('#FtimeInTo').hide();
		$('#FtimeOut').hide();
		// sliding
		$('#StimeInFrom').show();
		$('#StimeInTo').show();
		$('#StimeOutFromNN').show();
		$('#StimeOutToNN').show();
		$('#StimeInFromNN').show();
		$('#StimeInToNN').show();
		$('#StimeOutFrom').show();
		$('#StimeOutTo').show();
	
	}
	
	else 
	{
		$('#schemecode').show();
		$('#schemename').show();
		// fixed
		$('#FtimeIn').hide();
		$('#FtimeOutFrom').hide();
		$('#FtimeOutTo').hide();
		$('#FtimeInFrom').hide();
		$('#FtimeInTo').hide();
		$('#FtimeOut').hide();
		// sliding
		$('#StimeInFrom').hide();
		$('#StimeInTo').hide();
		$('#StimeOutFromNN').hide();
		$('#StimeOutToNN').hide();
		$('#StimeInFromNN').hide();
		$('#StimeInToNN').hide();
		$('#StimeOutFrom').hide();
		$('#StimeOutTo').hide();
	
	
	}
	
}

$(document).ready(function() 
	{ 
		$('#schemecode').hide();
		$('#schemename').hide();
		// fixed
		$('#FtimeIn').hide();
		$('#FtimeOutFrom').hide();
		$('#FtimeOutTo').hide();
		$('#FtimeInFrom').hide();
		$('#FtimeInTo').hide();
		$('#FtimeOut').hide();
		// sliding
		$('#StimeInFrom').hide();
		$('#StimeInTo').hide();
		$('#StimeOutFromNN').hide();
		$('#StimeOutToNN').hide();
		$('#StimeInFromNN').hide();
		$('#StimeInToNN').hide();
		$('#StimeOutFrom').hide();
		$('#StimeOutTo').hide();
	


});