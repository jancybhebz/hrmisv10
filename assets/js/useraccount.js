$(document).ready(function() {
    // FormValidation.init();
    $('#HR1,#HR2,#HR3,#HR4,#HR5,#HR6,#HR7,#HR8,#HR9').css('display','none');
    $('#Finance1,#Finance2,#Finance3,#Finance4,#Finance5,#Finance6,#Finance7,#Finance8,#Finance9').css('display','none');

    $('#strAccessLevel').on('change',function() {
    	var select_access = $(this).val();

    	if(select_access == 1){
    		$('#HR1 ,#HR2 ,#HR3 ,#HR4 ,#HR5 ,#HR6 ,#HR7 ,#HR8 ,#HR9').show();
    		$('#Finance1,#Finance2,#Finance3,#Finance4,#Finance5,#Finance6,#Finance7,#Finance8,#Finance9').hide();
    	}else if(select_access == 2){
    		$('#Finance1,#Finance2,#Finance3,#Finance4,#Finance5,#Finance6,#Finance7,#Finance8,#Finance9').show();
    		$('#HR1,#HR2,#HR3,#HR4,#HR5,#HR6,#HR7,#HR8,#HR9').hide();
    	}else if(select_access == 3){
    		$('#HR1,#HR2,#HR3,#HR4,#HR5,#HR6,#HR7,#HR8,#HR9').hide();
    		$('#Finance1,#Finance2,#Finance3,#Finance4,#Finance5,#Finance6,#Finance7,#Finance8,#Finance9').hide();
    	}else{
    		$('#Finance1,#Finance2,#Finance3,#Finance4,#Finance5,#Finance6,#Finance7,#Finance8,#Finance9').hide();
    	}

    });
});