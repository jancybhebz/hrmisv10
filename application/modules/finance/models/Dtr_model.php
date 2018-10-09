<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dtr_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getData($empid,$yr,$mon)
	{
		$this->db->where("dtrDate like '".$yr."-".$mon."%'");
		$this->db->where("empNumber",$empid);
		$this->db->order_by("dtrDate", "asc");
		return $this->db->get_where("tblempdtr")->result_array();
	}

	function getHoliday($strday)
	{
		$this->db->join('tblholiday', 'tblholiday.holidayCode = tblholidayyear.holidayCode', 'left');
		$this->db->where("tblholidayyear.holidayDate like '".$strday."'");
		$res = $this->db->get_where('tblholidayyear')->result_array();
		return count($res) > 0 ? $res[0] : null; 
	}

	//covert time format to total minutes
	function toMinutes($time)
	{
		$t_time = explode(":",$time);
		return  ($t_time[0] * 60) + $t_time[1];
	}

	function computeLate($scheme)
	{
		if($scheme['gpLeaveCredits'] == 'Y'):
			$am_timein = $this->Dtr_model->toMinutes($scheme['amTimeinTo']);
		else:
			$am_timein = $this->Dtr_model->toMinutes($scheme['amTimeinTo']) + $scheme['gracePeriod'];
		endif;
	}
}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */