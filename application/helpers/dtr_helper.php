<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# covert time format to total minutes
if ( ! function_exists('toMinutes'))
{
    function toMinutes($time)
    {
		$t_time = explode(":",$time);
		return ($t_time[0] * 60) + $t_time[1];
	}

}

# get all weekends in a month
if ( ! function_exists('month_weekends'))
{
    function month_weekends($month,$yr)
    {
		foreach(range(1, cal_days_in_month(CAL_GREGORIAN,$month,$yr)) as $day):
			echo '<br>';
			print_r($day);
		endforeach;
	}

}


