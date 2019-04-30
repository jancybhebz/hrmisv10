<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# HP Factor
if ( ! function_exists('hpfactor'))
{
    function hpfactor($days, $factor)
    {
        $amount = 0;

        if(days >=15 && $hpFactor == 30):
            $amount = 0.30;
        elseif(days >= 15 && $hpFactor == 23):
            $amount = 0.23;
        elseif(days >=15 && $hpFactor == 15):
            $amount = 0.15;
        elseif(days >=15 && $hpFactor == 12):
            $amount = 0.12;
        elseif((days >=8 && days <=14) && $hpFactor ==30):
            $amount = 0.23;
        elseif((days >=8 && days <=14) && $hpFactor ==23):
            $amount = 0.15;
        elseif((days >=8 && days <=14) && $hpFactor ==15):
            $amount = 0.12;
        elseif(days < 8 && $hpFactor ==30):
            $amount = 0.15;
        elseif(days < 8 && $hpFactor ==15):
            $amount = 0.10;
        else:
            $amount = 0.00;
        endif;

        return $amount;
	}
}

