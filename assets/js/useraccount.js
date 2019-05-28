
function showtextbox()
{
	
	var select_access=$('#strAccessLevel').val();
	// alert(select_access);
	if(select_access == '1')
	{
		$('#HR1').show();
		$('#HR2').show();
		$('#HR3').show();
		$('#HR4').show();
		$('#HR5').show();
		$('#HR6').show();
		$('#HR7').show();
		$('#HR8').show();
		$('#HR9').show();
	}

	else 
	{
		$('#HR1').hide();
		$('#HR2').hide();
		$('#HR3').hide();
		$('#HR4').hide();
		$('#HR5').hide();
		$('#HR6').show();
		$('#HR7').hide();
		$('#HR8').hide();
		$('#HR9').hide();

	}
	
}
$(document).ready(function() 
	{ 
			$('#HR1').hide();
			$('#HR2').hide();
			$('#HR3').hide();
			$('#HR4').hide();
			$('#HR5').hide();
			$('#HR6').hide();
			$('#HR7').hide();
			$('#HR8').hide();
			$('#HR9').hide();
	});

	