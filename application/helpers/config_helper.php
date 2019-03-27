<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# year start
if ( ! function_exists('getyear'))
{
    function getyear()
    {
		$arrYears = array();
        foreach(range((date('Y') + 1), 2003, -1) as $yr):
            array_push($arrYears, $yr);
        endforeach;
        return $arrYears;
	}
}

# Get the constant total working hours
if ( ! function_exists('constWorkHrs'))
{
    function constWorkHrs($break='00:00')
    {
    	$hours = (strtotime('09:00') - strtotime($break)) / 3600;
    	return sprintf('%02d', floor($hours)).':00';
	}
}

# fix monday start
if ( ! function_exists('fixMondayDate'))
{
    function fixMondayDate()
    {
		return array('amTimeinTo' => '08:00:00',
					 'nnTimeinTo' => '05:00:00',
					 'fixMonDate' => '2017-09-01');
	}
}

# hour before ot
if ( ! function_exists('hrintbeforeOT'))
{
    function hrintbeforeOT()
    {
    	return '01:00';
	}
}

if ( ! function_exists('strdate'))
{
    function strdate($time, $mer=0)
    {
    	if($mer==1):
    		return date('H:i:s a', strtotime($time));
    	else:
			return date('H:i:s', strtotime($time));
		endif;
	}
}

if ( ! function_exists('fixTime'))
{
    function fixTime($time, $med)
    {
		return date('G:i:s', strtotime($time.' '.$med));
	}
}

# restdays
if ( ! function_exists('restdays'))
{
    function restdays()
    {
		return array('Saturday', 'Sunday');
	}
}

# restdays
if ( ! function_exists('longeAppt'))
{
    function longeAppt()
    {
        return 'P';
    }
}

# salary periods
if ( ! function_exists('salaryPeriod'))
{
    function salaryPeriod()
    {
        return array('Monthly','Semimonthly','Weekly','Daily');
    }
}

# salary periods
if ( ! function_exists('setPeriods'))
{
    function setPeriods($strPeriod)
    {
        if(strtolower($strPeriod) == 'monthly'):
            return array('Period 1', 'Period 2');

        elseif(strtolower($strPeriod) == 'semimonthly'):
            return array('Period 1', 'Period 2');

        elseif(strtolower($strPeriod) == 'weekly'):
            return array('Period 1', 'Period 2','Period 3','Period 4');

        elseif(strtolower($strPeriod) == 'daily'):
            return array('Period 1', 'Period 2');
        endif;

    }
}