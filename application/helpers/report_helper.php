<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if ( ! function_exists('log_action'))
// {
//     function log_action($strEmpNo,$strModule,$strTableName,$strDescription,$strData,$strData2)
//     {
// 		$CI =& get_instance();
// 		$arrLogData = array(
// 			'empNumber' 	=> $strEmpNo,
// 			'module'		=> $strModule,
// 			'tablename' 	=> $strTableName,
// 			'date_time' 	=> date('Y-m-d H:i:s'),
// 			'description'	=> $strDescription,
// 			'data'			=> $strData,
// 			'data2'			=> $strData2,
// 			'ip'			=> $CI->input->ip_address()
// 			);
// 		$CI->db->insert('tblChangeLog', $arrLogData);
// 		return $CI->db->insert_id();	
// 	}
// }

if ( ! function_exists('getAgencyName'))
{
	function getAgencyName()
    {
        // $obj=new General;
        // $sql = "SELECT agencyName FROM tblAgency";
        // $result = mysql_query($sql);    
        // $row=mysql_fetch_array($result);
        // return $row['agencyName'];
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