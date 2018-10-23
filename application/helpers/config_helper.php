<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# year start
if ( ! function_exists('getyear'))
{
    function getyear()
    {
		return 2003;
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