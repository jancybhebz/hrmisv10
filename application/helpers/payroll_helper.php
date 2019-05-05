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


