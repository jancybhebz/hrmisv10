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
    num = Number(num);
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

        // var action = $(this).data('action');
        // var lb_data = $(this).data('json');
        // var leave_earned = $(this).data('leave_earned');

        // if(action == 'override'){
        //     $('td#tdn-or').hide();
        //     $('td#tdor').show();
        // }else{
        //     $('button#btnupdate_lb').hide();
        // }

        // $('#txtprev_month').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth'],1) + ' ' + lb_data['lb_detail']['periodYear']);

        // /* Previous Month Balance */
        // $('.prev_vl').html(lb_data['lb_detail']['vlBalance']);
        // $('.prev_sl').html(lb_data['lb_detail']['slBalance']);
        // /* Earned for the month */
        // $('.earned_vl').html(leave_earned);
        // $('.earned_sl').html(leave_earned);
        // /* Abs. Und. W/ Pay */
        // $('.auwp_vl').html(lb_data['lb_detail']['vlAbsUndWPay']);
        // $('.auwp_sl').html(lb_data['lb_detail']['slAbsUndWPay']);
        // $('#txtauwp_vl').val(lb_data['lb_detail']['vlAbsUndWPay']);
        // $('#txtauwp_sl').val(lb_data['lb_detail']['slAbsUndWPay']);
        // /* Month Year Balance */
        // $('.period_date_bal').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth']) + ' ' + lb_data['lb_detail']['periodYear'] + '</b> Balance');
        // $('.period_vl').html(lb_data['lb_detail']['vlBalance']);
        // $('.period_sl').html(lb_data['lb_detail']['slBalance']);
        // $('#txtperiod_vl').val(lb_data['lb_detail']['vlBalance']);
        // $('#txtperiod_sl').val(lb_data['lb_detail']['slBalance']);
        // /* Abs. Und. W/o Pay */
        // $('.auwop_vl').html(lb_data['lb_detail']['vlAbsUndWoPay']);
        // $('.auwop_sl').html(lb_data['lb_detail']['slAbsUndWoPay']);
        // $('#txtauwop_vl').val(lb_data['lb_detail']['vlAbsUndWoPay']);
        // $('#txtauwop_sl').val(lb_data['lb_detail']['slAbsUndWoPay']);

        // /* Leave Type */
        // /* Special Leave */
        // $('.spe_prev').html(lb_data['lb_detail']['plPreBalance']);
        // $('.spe_filed').html(lb_data['filed_leave']['filed_spe']);
        // $('.spe_curr').html(lb_data['lb_detail']['plBalance']);
        // $('#txtspe_curr').val(lb_data['lb_detail']['plBalance']);
        // /* Force Leave */
        // $('.fl_prev').html(lb_data['lb_detail']['flPreBalance']);
        // $('.fl_filed').html(lb_data['filed_leave']['filed_force']);
        // $('.fl_curr').html(lb_data['lb_detail']['flBalance']);
        // $('#txtfl_curr').val(lb_data['lb_detail']['flBalance']);
        // /* Study Leave */
        // $('.sdl_prev').html(lb_data['lb_detail']['stlPreBalance']);
        // $('.sdl_filed').html(lb_data['filed_leave']['filed_study']);
        // $('.sdl_curr').html(lb_data['lb_detail']['stlBalance']);
        // $('#txtsdl_curr').val(lb_data['lb_detail']['stlBalance']);
        // /* Paternity Leave */
        // $('.ptl_prev').html(lb_data['lb_detail']['ptlPreBalance']);
        // $('.ptl_filed').html(lb_data['filed_leave']['filed_pater']);
        // $('.ptl_curr').html(lb_data['lb_detail']['ptlBalance']);
        // $('#txtptl_curr').val(lb_data['lb_detail']['ptlBalance']);
        // /* Maternity Leave */
        // $('.mtl_prev').html(lb_data['lb_detail']['mtlPreBalance']);
        // $('.mtl_filed').html(lb_data['filed_leave']['filed_mater']);
        // $('.mtl_curr').html(lb_data['lb_detail']['mtlBalance']);
        // $('#txtmtl_curr').val(lb_data['lb_detail']['mtlBalance']);

        // /* COC */
        // $('.coc_balance').html(lb_data['lb_detail']['off_bal']);
        // $('#txtbalance').val(lb_data['lb_detail']['off_bal']);
        // $('.coc_gain').html(lb_data['lb_detail']['off_gain']);
        // $('#txtgain').val(lb_data['lb_detail']['off_gain']);
        // $('.coc_used').html(lb_data['lb_detail']['off_used']);
        // $('#txtused').val(lb_data['lb_detail']['off_used']);

        // /* Attendance Summary */
        // $('.late_ut_days').html(lb_data['lb_detail']['trut_notimes']);
        // $('.late_ut_hhmm').html(lb_data['lb_detail']['trut_totalminutes']);
        // $('.days_awol').html(lb_data['lb_detail']['nodays_awol']);
        // $('.days_present').html(lb_data['lb_detail']['nodays_present']);
        // $('.days_absent').html(lb_data['lb_detail']['nodays_absent']);
        // $('#txtlate_ut_days').val(lb_data['lb_detail']['trut_notimes']);
        // $('#txtlate_ut_hhmm').val(lb_data['lb_detail']['trut_totalminutes']);
        // $('#txtdays_awol').val(lb_data['lb_detail']['nodays_awol']);
        // $('#txtdays_present').val(lb_data['lb_detail']['nodays_present']);
        // $('#txtdays_absent').val(lb_data['lb_detail']['nodays_absent']);

        // /* MC Benefits */
        // $('#txtlaundry').val(lb_data['lb_detail']['ctr_laundry']);
        // $('#txtsubs_8hrs').val(lb_data['lb_detail']['ctr_8h']);
        // $('#txtsubs_6hrs').val(lb_data['lb_detail']['ctr_6h']);
        // $('#txtsubs_5hrs').val(lb_data['lb_detail']['ctr_5h']);
        // $('#txtsubs_4hrs').val(lb_data['lb_detail']['ctr_4h']);
        // $('#txtwith_meal').val(lb_data['lb_detail']['ctr_wmeal']);
        // $('#txtamt_training').val(lb_data['lb_detail']['ctr_diem']);
        // $('.laundry').html(lb_data['lb_detail']['ctr_laundry']);
        // $('.subs_8hrs').html(lb_data['lb_detail']['ctr_8h']);
        // $('.subs_6hrs').html(lb_data['lb_detail']['ctr_6h']);
        // $('.subs_5hrs').html(lb_data['lb_detail']['ctr_5h']);
        // $('.subs_4hrs').html(lb_data['lb_detail']['ctr_4h']);
        // $('.with_meal').html(lb_data['lb_detail']['ctr_wmeal']);
        // $('.amt_training').html(lb_data['lb_detail']['ctr_diem']);

        // $('#txtoverride_id').val(lb_data['lb_detail']['lb_id']);

        // $('#frmupdate_leavebalance').attr('action','../leave_balance_override/'+$('#txtget_data').val());
        $('#modal-view-leave-balance').modal('show');

    });

    $('#btn-update-leavebal').click(function(e) {
        // var lb_data = $(this).data('json');
        var leave_earned = $(this).data('leave_earned');
        var latest_lb = $(this).data('latest_lb');
        var att_summ = $(this).data('att_summ');
        console.log(latest_lb);
        console.log(att_summ);
        // $('#txtprev_month').html('<b>'+ number_to_month(lb_data['lb_detail']['periodMonth'],1) + ' ' + lb_data['lb_detail']['periodYear']);

        /* Previous Month Balance */
        $('.prev_vl').html(latest_lb['lb']['vlBalance']);
        $('.prev_sl').html(latest_lb['lb']['slBalance']);
        /* Earned for the month */
        $('.earned_vl').html(leave_earned);
        $('.earned_sl').html(leave_earned);
        /* Abs. Und. W/ Pay */
        $('.auwp_vl').html(latest_lb['vl_abswpay']);
        $('.auwp_sl').html(latest_lb['filed_sl']);
        // /* Month Year Balance */
        $('.period_date_bal').html('<b>'+ number_to_month(latest_lb['lb']['periodMonth']) + ' ' + latest_lb['lb']['periodYear'] + '</b> Balance');
        $('.period_vl').html(latest_lb['curr_vl']);
        $('.period_sl').html(latest_lb['curr_sl']);
        /* Abs. Und. W/o Pay */
        $('.auwop_vl').html(latest_lb['vl_abswopay']);
        $('.auwop_sl').html(latest_lb['sl_abswopay']);

        /* Leave Type */
        /* Special Leave */
        $('.spe_prev').html(latest_lb['lb']['plBalance']);
        $('.spe_filed').html(latest_lb['filed_spl']);
        $('.spe_curr').html(parseFloat(latest_lb['lb']['plBalance']) - parseFloat(latest_lb['filed_spl']));

        /* Force Leave */
        $('.fl_prev').html(latest_lb['lb']['flBalance']);
        $('.fl_filed').html(latest_lb['filed_fl']);
        $('.fl_curr').html(parseFloat(latest_lb['lb']['flBalance']) - parseFloat(latest_lb['filed_fl']));

        /* Study Leave */
        $('.sdl_prev').html(latest_lb['lb']['stlBalance']);
        $('.sdl_filed').html(latest_lb['filed_stl']);
        $('.sdl_curr').html(parseFloat(latest_lb['lb']['stlBalance']) - parseFloat(latest_lb['filed_stl']));

        /* Paternity Leave */
        $('.ptl_prev').html(latest_lb['lb']['ptlBalance']);
        $('.ptl_filed').html(latest_lb['filed_ptl']);
        $('.ptl_curr').html(parseFloat(latest_lb['lb']['ptlBalance']) - parseFloat(latest_lb['filed_ptl']));

        /* Maternity Leave */
        $('.mtl_prev').html(latest_lb['lb']['mtlBalance']);
        $('.mtl_filed').html(latest_lb['filed_mtl']);
        $('.mtl_curr').html(parseFloat(latest_lb['lb']['mtlBalance']) - parseFloat(latest_lb['filed_mtl']));

        // /* COC */
        // $('.coc_balance').html(latest_lb['off_bal']);
        // $('.coc_gain').html(latest_lb['off_gain']);
        // $('.coc_used').html(latest_lb['off_used']);

        /* Attendance Summary */
        $('.late_ut_days').html(att_summ['dates_ut_lates']);
        $('.late_ut_hhmm').html(att_summ['total_late_ut']);
        $('.days_awol').html(att_summ['days_awol']);
        $('.days_present').html(att_summ['working_days'] - (att_summ['days_awol'] + att_summ['days_leave']));
        $('.days_absent').html(att_summ['days_awol'] + att_summ['days_leave']);

        // /* MC Benefits */
        console.log('days_awol = ' + att_summ['days_awol']);
        console.log('days_leave = ' + att_summ['days_leave']);
        console.log('working_days = ' + att_summ['working_days']);
        $('.laundry').html(att_summ['days_awol'] + att_summ['days_leave']);
        $('.subs_8hrs').html(latest_lb['arr_subs_allowance']['ctr_8h']);
        $('.subs_6hrs').html(latest_lb['arr_subs_allowance']['ctr_6h']);
        $('.subs_5hrs').html(latest_lb['arr_subs_allowance']['ctr_5h']);
        $('.subs_4hrs').html(latest_lb['arr_subs_allowance']['ctr_4h']);
        $('.with_meal').html(att_summ['total_wmeal']);
        $('.amt_training').html(att_summ['total_perdiem']);
        // $('.with_meal').html(latest_lb['ctr_wmeal']);
        // $('.amt_training').html(latest_lb['ctr_diem']);

        // $('#frmupdate_leavebalance').attr('action',$('#txtget_data').val());
        $('#modal-view-leave-balance').modal('show');

    });
    


});