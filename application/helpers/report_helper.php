<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getSignatories'))
{
	function getSignatories($empno="")
    {
    	$CI =& get_instance();
    	$CI->db->Select('signatory,signatoryPosition,signatoryId');
    	if($empno!='')
    		$CI->db->where('signatoryId',$empno);
    	$objQuery = $CI->db->get('tblSignatory');
    	$rs = $objQuery->result_array();
		if(count($rs)>0)
		{
			return $rs;
		}
    }
}  

if ( ! function_exists('getAgencyName'))
{
	function getAgencyName()
    {
    	$CI =& get_instance();
    	$CI->db->Select('agencyName');
    	$objQuery = $CI->db->get('tblAgency');
    	$rs = $objQuery->result_array();
		if(count($rs)>0)
		{
			foreach($rs as $row):
				return $row['agencyName'];
			endforeach;
		}
		else
			return false;
    }
}  

if ( ! function_exists('getSalutation'))
{    
    function getSalutation($t_strGender)
    {
        if($t_strGender == 'F')
        {
            return "Madam";
        }
        else
        {
            return "Sir";
        }   
    }
}

if ( ! function_exists('pronoun'))
{    
    function pronoun($t_strGender)
    {
        if($t_strGender == 'F')
        {
            return "Her";
        }
        else
        {
            return"Him";
        }   
    }
}

if ( ! function_exists('pronoun2'))
{
    function pronoun2($t_strGender)
    {
        if($t_strGender == 'F')
        {
            return "Her";
        }
        else
        {
            return"His";
        }   
    }
}

if ( ! function_exists('titleOfCourtesy'))
{
    function titleOfCourtesy($t_strGender)
    {
        if($t_strGender == 'F')
        {
            return "Ms.";
        }
        else
        {
            return"Mr.";
        }
    }
}

if ( ! function_exists('numOrder'))
{    
    function numOrder($numYears)
    {
    	$arr=array(1=>"First",2=>"Second",3=>"Third",4=>"Fourth",
               5=>"Fifth",6=>"Sixth",7=>"Seventh",8=>"Eighth",
               9=>"Ninth",10=>"Tenth",11=>"Eleventh",12=>"Twelfth",
               13=>"Thirteenth",14=>"Fourteenth");
    	return $arr["$numYears"];
    }
}

if ( ! function_exists('intToBuwan'))
{    
    function intToBuwan($t_intMonth)
    {
        $arrMonths = array(1=>"Enero", 2=>"Pebrero", 3=>"Marso", 
                        4=>"Abril", 5=>"Mayo", 6=>"Hunyo", 
                        7=>"Hulyo", 8=>"Agosto", 9=>"Septembre", 
                        10=>"Oktubre", 11=>"Nobyembre", 12=>"Disyembre");
        return $arrMonths[$t_intMonth];
    }
}

if ( ! function_exists('comboYear'))
{    
    function comboYear($strName="intYear")
    {
    	$str = '<select name="'.$strName.'" class="form-control">';
    	for($i=date('Y');$i>=2003;$i--)
    	{
    		$str .= '<option value="'.$i.'">'.$i.'</option>';
    	}
    	$str .= '</select>';
    	return $str;
    }
}

if ( ! function_exists('comboMonth'))
{    
    function comboMonth($strName="intMonth")
    {
    	$str = '<select name="'.$strName.'" class="form-control">';
    	for($i=1;$i<=12;$i++)
    	{
    		$str .= '<option value="'.$i.'" '.(date('n')==$i?'selected="selected"':'').'>'.date('F',strtotime(date('Y-'.$i.'-d'))).'</option>';
    	}
    	$str .= '</select>';
    	return $str;
    }
}

if ( ! function_exists('comboDay'))
{    
    function comboDay($strName="intDay",$intMaxDay=31)
    {
    	
    	$str = '<select name="'.$strName.'" class="form-control">';
    	for($i=1;$i<=$intMaxDay;$i++)
    	{
    		$str .= '<option value="'.$i.'" '.(date('j')==$i?'selected="selected"':'').'>'.$i.'</option>';
    	}
    	$str .= '</select>';
    	return $str;
    }
}

if ( ! function_exists('comboSignatory'))
{    
    function comboSignatory($strName="intSignatory")
    {
    	
    	$str = '<select name="'.$strName.'" class="form-control">';
    	$rs = getSignatories();
    	foreach($rs as $row)
    	{
    		$str .= '<option value="'.$row['signatoryId'].'" >'.$row['signatory'].'</option>';
    	}
    	$str .= '</select>';
    	return $str;
    }
}