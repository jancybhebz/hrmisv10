<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# HP Factor
if ( ! function_exists('hpfactor'))
{
    function hpfactor($days, $factor)
    {
        $amount = 0;

        if($days >=15 && $factor == 30):
            $amount = 0.30;
        elseif($days >= 15 && $factor == 23):
            $amount = 0.23;
        elseif($days >=15 && $factor == 15):
            $amount = 0.15;
        elseif($days >=15 && $factor == 12):
            $amount = 0.12;
        elseif(($days >=8 && $days <=14) && $factor ==30):
            $amount = 0.23;
        elseif(($days >=8 && $days <=14) && $factor ==23):
            $amount = 0.15;
        elseif(($days >=8 && $days <=14) && $factor ==15):
            $amount = 0.12;
        elseif($days < 8 && $factor ==30):
            $amount = 0.15;
        elseif($days < 8 && $factor ==15):
            $amount = 0.10;
        else:
            $amount = 0.00;
        endif;

        return $amount;
	}
}

# substistence
if ( ! function_exists('substistence'))
{
    function substistence($wdays_period, $wdays_process, $lb)
    {
        $subs = $wdays_period - $wdays_process;
        $subs = $subs * AMT_SUBSISTENCE;

        $ctr_8h = AMT_CTR_8H * $lb['ctr_8h'];
        $ctr_6h = AMT_CTR_6H * $lb['ctr_6h'];
        $ctr_5h = AMT_CTR_5H * $lb['ctr_5h'];
        $ctr_4h = AMT_CTR_4H * $lb['ctr_4h'];

        $total_subs = ($ctr_8h + $ctr_6h + $ctr_5h + $ctr_4h) - $lb['ctr_diem'] + $subs;
        return $total_subs >= 0 ? $total_subs : 0;
    }
}

# Laundry
if ( ! function_exists('laundry'))
{
    function laundry($ctr_laundry)
    {
        $laundry = $ctr_laundry < 0 ? 0 : $ctr_laundry;
        $laundry = AMT_LAUNDRY - (AMT_CTR_LAUNDRY * $ctr_laundry);

        return $laundry < 0 ? 0 : $laundry;
    }
}

# Rata
if ( ! function_exists('rata'))
{
    function rata($arrrata, $days, $curr_workingdays, $emprata, $emprata_vehicle)
    {
        $arrrata = array_column($arrrata,'RATAAmount','RATACode');
        $emprata = $emprata == '' ? 0 : $arrrata[$emprata];
        
        # RA
        $ra_amount = 0;
        $ra_percent = 0;
        if($emprata > 0):
            if($days >= 1 && $days <= 5):
                $ra_amount = 0.25;
            elseif($days >= 6 && $days <= 11):
                $ra_amount = 0.50;
            elseif($days >= 12 && $days <= 16):
                $ra_amount = 0.75;
            elseif($days >= 17):
                $ra_amount = 1.00;
            else:
                $ra_amount = 0;
            endif;
        endif;
        $ra_percent = $ra_amount * RATA_PERCENT;
        $total_ra = $emprata * $ra_amount;

        # TA
        $days_w_vehicle = 0;
        $ta_percent = 0;
        $ta_amount = 0;
        if($emprata > 0):
            if($emprata_vehicle == 'Y'):
                $ta_amount = 0;
                $ta_percent = 0;
                $days_w_vehicle = $curr_workingdays;
            else:
                $ta_amount = $emprata;
                $ta_percent = RATA_PERCENT;
                $days_w_vehicle = 0;
            endif;
        endif;

        return array('ra_amount' => $total_ra, 'ra_percent' => $ra_percent, 'ta_amount' => $ta_amount, 'ta_percent' => $ta_percent, 'days_w_vehicle' => $days_w_vehicle);

    }
}