function numberformat(num)
{
    num = parseFloat(Math.round(num * 100) / 100).toFixed(2);
    var parts = num.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if(parts.length == 1){
        parts[1] = "00";
    }
    return parts.join(".");
}

function number_to_month(num,word=0) 
{
    var array_month = ['','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
    var array_month_word = ['','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    if(word==0){
        return array_month[num];    
    }else{
        return array_month_word[num];
    }
    
}

$(document).ready(function() {
	// $('.loading-image').hide();
	// $('#div-body').show();

    $('td#tdn-or').show();
    $('td#tdor').hide();

    $('#tblleave-balance').on('click','#btn-leavebal,#btn-leavebal-override', function(e){
        $('td#tdn-or,button#btnupdate_lb').show();
        $('td#tdor').hide(); 

        var action = $(this).data('action');
        var lb_data = $(this).data('json');
        var leave_earned = $(this).data('leave_earned');

        if(action == 'override'){
            $('td#tdn-or').hide();
            $('td#tdor').show();
        }else{
            $('button#btnupdate_lb').hide();
        }

        $('#txtprev_month').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth'],1) + ' ' + lb_data['lb_detail']['periodYear']);

        /* Previous Month Balance */
        $('.prev_vl').html(lb_data['lb_detail']['vlBalance']);
        $('.prev_sl').html(lb_data['lb_detail']['slBalance']);
        /* Earned for the month */
        $('.earned_vl').html(leave_earned);
        $('.earned_sl').html(leave_earned);
        /* Abs. Und. W/ Pay */
        $('.auwp_vl').html(lb_data['lb_detail']['vlAbsUndWPay']);
        $('.auwp_sl').html(lb_data['lb_detail']['slAbsUndWPay']);
        $('#txtauwp_vl').val(lb_data['lb_detail']['vlAbsUndWPay']);
        $('#txtauwp_sl').val(lb_data['lb_detail']['slAbsUndWPay']);
        /* Month Year Balance */
        $('.period_date_bal').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth']) + ' ' + lb_data['lb_detail']['periodYear'] + '</b> Balance');
        $('.period_vl').html(lb_data['lb_detail']['vlBalance']);
        $('.period_sl').html(lb_data['lb_detail']['slBalance']);
        $('#txtperiod_vl').val(lb_data['lb_detail']['vlBalance']);
        $('#txtperiod_sl').val(lb_data['lb_detail']['slBalance']);
        /* Abs. Und. W/o Pay */
        $('.auwop_vl').html(lb_data['lb_detail']['vlAbsUndWoPay']);
        $('.auwop_sl').html(lb_data['lb_detail']['slAbsUndWoPay']);
        $('#txtauwop_vl').val(lb_data['lb_detail']['vlAbsUndWoPay']);
        $('#txtauwop_sl').val(lb_data['lb_detail']['slAbsUndWoPay']);

        /* Leave Type */
        /* Special Leave */
        $('.spe_prev').html(lb_data['lb_detail']['plPreBalance']);
        $('.spe_filed').html(lb_data['filed_leave']['filed_spe']);
        $('.spe_curr').html(lb_data['lb_detail']['plBalance']);
        $('#txtspe_curr').val(lb_data['lb_detail']['plBalance']);
        /* Force Leave */
        $('.fl_prev').html(lb_data['lb_detail']['flPreBalance']);
        $('.fl_filed').html(lb_data['filed_leave']['filed_force']);
        $('.fl_curr').html(lb_data['lb_detail']['flBalance']);
        $('#txtfl_curr').val(lb_data['lb_detail']['flBalance']);
        /* Study Leave */
        $('.sdl_prev').html(lb_data['lb_detail']['stlPreBalance']);
        $('.sdl_filed').html(lb_data['filed_leave']['filed_study']);
        $('.sdl_curr').html(lb_data['lb_detail']['stlBalance']);
        $('#txtsdl_curr').val(lb_data['lb_detail']['stlBalance']);
        /* Paternity Leave */
        $('.ptl_prev').html(lb_data['lb_detail']['ptlPreBalance']);
        $('.ptl_filed').html(lb_data['filed_leave']['filed_pater']);
        $('.ptl_curr').html(lb_data['lb_detail']['ptlBalance']);
        $('#txtptl_curr').val(lb_data['lb_detail']['ptlBalance']);
        /* Maternity Leave */
        $('.mtl_prev').html(lb_data['lb_detail']['mtlPreBalance']);
        $('.mtl_filed').html(lb_data['filed_leave']['filed_mater']);
        $('.mtl_curr').html(lb_data['lb_detail']['mtlBalance']);
        $('#txtmtl_curr').val(lb_data['lb_detail']['mtlBalance']);

        /* COC */
        $('.coc_balance').html(lb_data['lb_detail']['off_bal']);
        $('#txtbalance').val(lb_data['lb_detail']['off_bal']);
        $('.coc_gain').html(lb_data['lb_detail']['off_gain']);
        $('#txtgain').val(lb_data['lb_detail']['off_gain']);
        $('.coc_used').html(lb_data['lb_detail']['off_used']);
        $('#txtused').val(lb_data['lb_detail']['off_used']);

        /* Attendance Summary */
        $('.late_ut_days').html(lb_data['lb_detail']['trut_notimes']);
        $('.late_ut_hhmm').html(lb_data['lb_detail']['trut_totalminutes']);
        $('.days_awol').html(lb_data['lb_detail']['nodays_awol']);
        $('.days_present').html(lb_data['lb_detail']['nodays_present']);
        $('.days_absent').html(lb_data['lb_detail']['nodays_absent']);
        $('#txtlate_ut_days').val(lb_data['lb_detail']['trut_notimes']);
        $('#txtlate_ut_hhmm').val(lb_data['lb_detail']['trut_totalminutes']);
        $('#txtdays_awol').val(lb_data['lb_detail']['nodays_awol']);
        $('#txtdays_present').val(lb_data['lb_detail']['nodays_present']);
        $('#txtdays_absent').val(lb_data['lb_detail']['nodays_absent']);

        /* MC Benefits */
        $('#txtlaundry').val(lb_data['lb_detail']['ctr_laundry']);
        $('#txtsubs_8hrs').val(lb_data['lb_detail']['ctr_8h']);
        $('#txtsubs_6hrs').val(lb_data['lb_detail']['ctr_6h']);
        $('#txtsubs_5hrs').val(lb_data['lb_detail']['ctr_5h']);
        $('#txtsubs_4hrs').val(lb_data['lb_detail']['ctr_4h']);
        $('#txtwith_meal').val(lb_data['lb_detail']['ctr_wmeal']);
        $('#txtamt_training').val(lb_data['lb_detail']['ctr_diem']);
        $('.laundry').html(lb_data['lb_detail']['ctr_laundry']);
        $('.subs_8hrs').html(lb_data['lb_detail']['ctr_8h']);
        $('.subs_6hrs').html(lb_data['lb_detail']['ctr_6h']);
        $('.subs_5hrs').html(lb_data['lb_detail']['ctr_5h']);
        $('.subs_4hrs').html(lb_data['lb_detail']['ctr_4h']);
        $('.with_meal').html(lb_data['lb_detail']['ctr_wmeal']);
        $('.amt_training').html(lb_data['lb_detail']['ctr_diem']);

        $('#txtoverride_id').val(lb_data['lb_detail']['lb_id']);

        $('#frmupdate_leavebalance').attr('action','../leave_balance_override/'+$('#txtget_data').val());
        $('#modal-view-leave-balance').modal('show');

    });

    $('#btn-update-leavebal').click(function(e) {
        var lb_data = $(this).data('json');
        var leave_earned = $(this).data('leave_earned');
        var latest_lb = $(this).data('latest_lb');
        
        $('#txtprev_month').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth'],1) + ' ' + lb_data['lb_detail']['periodYear']);

        /* Previous Month Balance */
        $('.prev_vl').html(lb_data['lb_detail']['vlBalance']);
        $('.prev_sl').html(lb_data['lb_detail']['slBalance']);
        /* Earned for the month */
        $('.earned_vl').html(leave_earned);
        $('.earned_sl').html(leave_earned);
        /* Abs. Und. W/ Pay */
        $('.auwp_vl').html(lb_data['lb_detail']['vlAbsUndWPay']);
        $('.auwp_sl').html(lb_data['lb_detail']['slAbsUndWPay']);
        /* Month Year Balance */
        $('.period_date_bal').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth']) + ' ' + lb_data['lb_detail']['periodYear'] + '</b> Balance');
        $('.period_vl').html(lb_data['lb_detail']['vlBalance']);
        $('.period_sl').html(lb_data['lb_detail']['slBalance']);
        /* Abs. Und. W/o Pay */
        $('.auwop_vl').html(lb_data['lb_detail']['vlAbsUndWoPay']);
        $('.auwop_sl').html(lb_data['lb_detail']['slAbsUndWoPay']);

        /* Leave Type */
        /* Special Leave */
        $('.spe_prev').html(latest_lb['plPreBalance']);
        $('.spe_filed').html(lb_data['filed_leave']['filed_spe']);
        $('.spe_curr').html(latest_lb['plBalance']);
        /* Force Leave */
        $('.fl_prev').html(latest_lb['flPreBalance']);
        $('.fl_filed').html(lb_data['filed_leave']['filed_force']);
        $('.fl_curr').html(latest_lb['flBalance']);
        /* Study Leave */
        $('.sdl_prev').html(latest_lb['stlPreBalance']);
        $('.sdl_filed').html(lb_data['filed_leave']['filed_study']);
        $('.sdl_curr').html(latest_lb['stlBalance']);
        /* Paternity Leave */
        $('.ptl_prev').html(latest_lb['ptlPreBalance']);
        $('.ptl_filed').html(lb_data['filed_leave']['filed_pater']);
        $('.ptl_curr').html(latest_lb['ptlBalance']);
        /* Maternity Leave */
        $('.mtl_prev').html(latest_lb['mtlPreBalance']);
        $('.mtl_filed').html(lb_data['filed_leave']['filed_mater']);
        $('.mtl_curr').html(latest_lb['mtlBalance']);

        /* COC */
        $('.coc_balance').html(latest_lb['off_bal']);
        $('.coc_gain').html(latest_lb['off_gain']);
        $('.coc_used').html(latest_lb['off_used']);

        /* Attendance Summary */
        $('.late_ut_days').html(latest_lb['trut_notimes']);
        $('.late_ut_hhmm').html(latest_lb['trut_totalminutes']);
        $('.days_awol').html(latest_lb['nodays_awol']);
        $('.days_present').html(latest_lb['nodays_present']);
        $('.days_absent').html(latest_lb['nodays_absent']);

        /* MC Benefits */
        $('.laundry').html(latest_lb['ctr_laundry']);
        $('.subs_8hrs').html(latest_lb['ctr_8h']);
        $('.subs_6hrs').html(latest_lb['ctr_6h']);
        $('.subs_5hrs').html(latest_lb['ctr_5h']);
        $('.subs_4hrs').html(latest_lb['ctr_4h']);
        $('.with_meal').html(latest_lb['ctr_wmeal']);
        $('.amt_training').html(latest_lb['ctr_diem']);

        $('#frmupdate_leavebalance').attr('action',$('#txtget_data').val());
        $('#modal-view-leave-balance').modal('show');

    });
    


});