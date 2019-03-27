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

