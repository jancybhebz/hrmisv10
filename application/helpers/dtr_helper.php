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
if ( ! function_exists('get_workingdays'))
{
    function get_workingdays($month,$yr,$holidays=null,$sdate='',$edate='')
    {
    	$arrworking_days = array();
    	$holidays = array_column($holidays, 'holidayDate');
        if($sdate == '' && $edate == ''):
        	foreach(range(1, cal_days_in_month(CAL_GREGORIAN,$month,$yr)) as $day):
        		$ddate = date('Y-m-d',strtotime(implode('-',array($yr,$month,$day))));
        		if(!in_array(date('D',strtotime($ddate)),array('Sat','Sun')) && !in_array($ddate,$holidays)):
        			array_push($arrworking_days,$ddate);
        		endif;
        	endforeach;
        else:
            $date = $sdate;
            while (strtotime($date) <= strtotime($edate))
            {
                $ddate = date('Y-m-d',strtotime($date));
                if(!in_array(date('D',strtotime($ddate)),array('Sat','Sun')) && !in_array($ddate,$holidays)):
                    array_push($arrworking_days,$ddate);
                endif;
                $date = date('Y-m-d', strtotime($date . ' +1 day'));
            }
        endif;
    	return $arrworking_days;
	}

}


