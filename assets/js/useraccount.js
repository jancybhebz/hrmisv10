
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
		$('#Finance1').hide();
		$('#Finance2').hide();
		$('#Finance3').hide();
		$('#Finance4').hide();
		$('#Finance5').hide();
		$('#Finance6').hide();
		$('#Finance7').hide();
		$('#Finance8').hide();
		$('#Finance9').hide();
	}
	if(select_access == '2')
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
		$('#Finance1').show();
		$('#Finance2').show();
		$('#Finance3').show();
		$('#Finance4').show();
		$('#Finance5').hide();
		$('#Finance6').show();
		$('#Finance7').show();
		$('#Finance8').show();
		$('#Finance9').show();
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
		$('#Finance1').hide();
		$('#Finance2').hide();
		$('#Finance3').hide();
		$('#Finance4').hide();
		$('#Finance5').hide();
		$('#Finance6').hide();
		$('#Finance7').hide();
		$('#Finance8').hide();
		$('#Finance9').hide();

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
			$('#Finance1').hide();
			$('#Finance2').hide();
			$('#Finance3').hide();
			$('#Finance4').hide();
			$('#Finance5').hide();
			$('#Finance6').hide();
			$('#Finance7').hide();
			$('#Finance8').hide();
			$('#Finance9').hide();
	});

	