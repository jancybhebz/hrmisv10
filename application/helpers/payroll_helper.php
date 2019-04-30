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

