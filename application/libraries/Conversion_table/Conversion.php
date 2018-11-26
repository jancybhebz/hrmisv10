<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conversion {

	protected $CI;

	public function __construct() 
	{
		$this->CI =& get_instance();
    }

	public function conversion_ii()
	{
  		return array(array('days'=>1, 'vl'=>'0.042', 'sl' => '0.042'),
					 array('days'=>2, 'vl'=>'0.083', 'sl' => '0.083'),
					 array('days'=>3, 'vl'=>'0.125', 'sl' => '0.125'),
					 array('days'=>4,  'vl'=>'0.167', 'sl' => '0.167'),
					 array('days'=>5,  'vl'=>'0.208', 'sl' => '0.208'),
					 array('days'=>6,  'vl'=>'0.25',  'sl' => '0.25'),	
					 array('days'=>7,  'vl'=>'0.292', 'sl' => '0.292'),
					 array('days'=>8,  'vl'=>'0.333', 'sl' => '0.333'),
					 array('days'=>9,  'vl'=>'0.375', 'sl' => '0.375'),
					 array('days'=>10, 'vl'=>'0.417', 'sl' => '0.417'),
					 array('days'=>11, 'vl'=>'0.458', 'sl' => '0.458'),
					 array('days'=>12, 'vl'=>'0.500', 'sl' => '0.500'),
					 array('days'=>13, 'vl'=>'0.542', 'sl' => '0.542'),
					 array('days'=>14, 'vl'=>'0.583', 'sl' => '0.583'),
					 array('days'=>15, 'vl'=>'0.625', 'sl' => '0.625'),
					 array('days'=>16, 'vl'=>'0.667', 'sl' => '0.667'),
					 array('days'=>17, 'vl'=>'0.708', 'sl' => '0.708'),
					 array('days'=>18, 'vl'=> '0.75', 'sl' => '0.75'),
					 array('days'=>19, 'vl'=>'0.792', 'sl' => '0.792'),
					 array('days'=>20, 'vl'=>'0.833', 'sl' => '0.833'),
					 array('days'=>21, 'vl'=>'0.875', 'sl' => '0.875'),
					 array('days'=>22, 'vl'=>'0.917', 'sl' => '0.917'),
					 array('days'=>23, 'vl'=>'0.958', 'sl' => '0.958'),
					 array('days'=>24, 'vl'=>'1.000', 'sl' => '1.000'),
					 array('days'=>25, 'vl'=>'1.042', 'sl' => '1.042'),
					 array('days'=>26, 'vl'=>'1.083', 'sl' => '1.083'),
					 array('days'=>27, 'vl'=>'1.125', 'sl' => '1.125'),
					 array('days'=>28, 'vl'=>'1.167', 'sl' => '1.167'),
					 array('days'=>29, 'vl'=>'1.208', 'sl' => '1.208'),
					 array('days'=>30, 'vl'=> '1.25', 'sl' => '1.25'));
	}

	public function conversion_based8hrs()
	{
  		return array(array('hrs'=>1, 'days' => '0.125'),
					 array('hrs'=>2, 'days' => '0.250'),
					 array('hrs'=>3, 'days' => '0.375'),
					 array('hrs'=>4, 'days' => '0.500'),
					 array('hrs'=>5, 'days' => '0.625'),
					 array('hrs'=>6, 'days' => '0.750'),	
					 array('hrs'=>7, 'days' => '0.875'),
					 array('hrs'=>8, 'days' => '1.000'));
	}

	public function conversion_iii()
	{
  		return array(array('mins1' => 1, 'day1' => 0.002, 'mins2' => 31, 'day2' => 0.065),
					 array('mins1' => 2, 'day1' => 0.004, 'mins2' => 32, 'day2' => 0.067),
					 array('mins1' => 3, 'day1' => 0.006, 'mins2' => 33, 'day2' => 0.069),
					 array('mins1' => 4, 'day1' => 0.008, 'mins2' => 34, 'day2' => 0.071),
					 array('mins1' => 5, 'day1' => 0.01,  'mins2' => 35, 'day2' => 0.073),
					 array('mins1' => 6, 'day1' => 0.012, 'mins2' => 36, 'day2' => 0.075),
					 array('mins1' => 7, 'day1' => 0.015, 'mins2' => 37, 'day2' => 0.077),
					 array('mins1' => 8, 'day1' => 0.017, 'mins2' => 38, 'day2' => 0.079),
					 array('mins1' => 9, 'day1' => 0.019, 'mins2' => 39, 'day2' => 0.081),
					 array('mins1' => 10, 'day1' => 0.021, 'mins2' => 40, 'day2' => 0.083),
					 array('mins1' => 11, 'day1' => 0.023, 'mins2' => 41, 'day2' => 0.085),
					 array('mins1' => 12, 'day1' => 0.025, 'mins2' => 42, 'day2' => 0.087),
					 array('mins1' => 13, 'day1' => 0.027, 'mins2' => 43, 'day2' => 0.09),
					 array('mins1' => 14, 'day1' => 0.029, 'mins2' => 44, 'day2' => 0.092),
					 array('mins1' => 15, 'day1' => 0.031, 'mins2' => 45, 'day2' => 0.094),
					 array('mins1' => 16, 'day1' => 0.033, 'mins2' => 46, 'day2' => 0.096),
					 array('mins1' => 17, 'day1' => 0.035, 'mins2' => 47, 'day2' => 0.098),
					 array('mins1' => 18, 'day1' => 0.037, 'mins2' => 48, 'day2' => 0.1),
					 array('mins1' => 19, 'day1' => 0.04,  'mins2' => 49, 'day2' => 0.102),
					 array('mins1' => 20, 'day1' => 0.042, 'mins2' => 50, 'day2' => 0.104),
					 array('mins1' => 21, 'day1' => 0.044, 'mins2' => 51, 'day2' => 0.106),
					 array('mins1' => 22, 'day1' => 0.046, 'mins2' => 52, 'day2' => 0.108),
					 array('mins1' => 23, 'day1' => 0.048, 'mins2' => 53, 'day2' => 0.11),
					 array('mins1' => 24, 'day1' => 0.05,  'mins2' => 54, 'day2' => 0.112),
					 array('mins1' => 25, 'day1' => 0.052, 'mins2' => 55, 'day2' => 0.115),
					 array('mins1' => 26, 'day1' => 0.054, 'mins2' => 56, 'day2' => 0.117),
					 array('mins1' => 27, 'day1' => 0.056, 'mins2' => 57, 'day2' => 0.119),
					 array('mins1' => 28, 'day1' => 0.058, 'mins2' => 58, 'day2' => 0.121),
					 array('mins1' => 29, 'day1' => 0.06,  'mins2' => 59, 'day2' => 0.123),
					 array('mins1' => 30, 'day1' => 0.062, 'mins2' => 60, 'day2' => 0.125)
					);
	}

	public function conversion_iv($p=0)
	{
  		if($p == 1):
  			return array(array('daysp1' =>	30.00, 'dayslwop1' =>	0.00, 'dayscredit1' =>	1.25),
						 array('daysp1' =>	29.50, 'dayslwop1' =>	0.50, 'dayscredit1' =>	1.23),
						 array('daysp1' =>	29.00, 'dayslwop1' =>	1.00, 'dayscredit1' =>	1.21),
						 array('daysp1' =>	28.50, 'dayslwop1' =>	1.50, 'dayscredit1' =>	1.19),
						 array('daysp1' =>	28.00, 'dayslwop1' =>	2.00, 'dayscredit1' =>	1.17),
						 array('daysp1' =>	27.50, 'dayslwop1' =>	2.50, 'dayscredit1' =>	1.15),
						 array('daysp1' =>	27.00, 'dayslwop1' =>	3.00, 'dayscredit1' =>	1.13),
						 array('daysp1' =>	26.50, 'dayslwop1' =>	3.50, 'dayscredit1' =>	1.10),
						 array('daysp1' =>	26.00, 'dayslwop1' =>	4.00, 'dayscredit1' =>	1.08),
						 array('daysp1' =>	25.50, 'dayslwop1' =>	4.50, 'dayscredit1' =>	1.06),
						 array('daysp1' =>	25.00, 'dayslwop1' =>	5.00, 'dayscredit1' =>	1.04),
						 array('daysp1' =>	24.50, 'dayslwop1' =>	5.50, 'dayscredit1' =>	1.02),
						 array('daysp1' =>	24.00, 'dayslwop1' =>	6.00, 'dayscredit1' =>	1.00),
						 array('daysp1' =>	23.50, 'dayslwop1' =>	6.50, 'dayscredit1' =>	0.98),
						 array('daysp1' =>	23.00, 'dayslwop1' =>	7.00, 'dayscredit1' =>	0.96),
						 array('daysp1' =>	22.50, 'dayslwop1' =>	7.50, 'dayscredit1' =>	0.94),
						 array('daysp1' =>	22.00, 'dayslwop1' =>	8.00, 'dayscredit1' =>	0.92),
						 array('daysp1' =>	21.50, 'dayslwop1' =>	8.50, 'dayscredit1' =>	0.90),
						 array('daysp1' =>	21.00, 'dayslwop1' =>	9.00, 'dayscredit1' =>	0.88),
						 array('daysp1' =>	20.50, 'dayslwop1' =>	9.50, 'dayscredit1' =>	0.85),
						 array('daysp1' =>	20.00, 'dayslwop1' =>	10.00, 'dayscredit1' =>	0.83),
						 array('daysp1' =>	19.50, 'dayslwop1' =>	10.50, 'dayscredit1' =>	0.81),
						 array('daysp1' =>	19.00, 'dayslwop1' =>	11.00, 'dayscredit1' =>	0.79),
						 array('daysp1' =>	18.50, 'dayslwop1' =>	11.50, 'dayscredit1' =>	0.77),
						 array('daysp1' =>	18.00, 'dayslwop1' =>	12.00, 'dayscredit1' =>	0.75),
						 array('daysp1' =>	17.50, 'dayslwop1' =>	12.50, 'dayscredit1' =>	0.73),
						 array('daysp1' =>	17.00, 'dayslwop1' =>	13.00, 'dayscredit1' =>	0.71),
						 array('daysp1' =>	16.50, 'dayslwop1' =>	13.50, 'dayscredit1' =>	0.69),
						 array('daysp1' =>	16.00, 'dayslwop1' =>	14.00, 'dayscredit1' =>	0.67),
						 array('daysp1' =>	15.50, 'dayslwop1' =>	14.50, 'dayscredit1' =>	0.65),
						 array('daysp1' =>	15.00, 'dayslwop1' =>	15.00, 'dayscredit1' =>	0.63));
  		else:
  			return array(array('daysp2' =>	14.50, 'dayslwop2' => 15.50, 'dayscredit2' => 0.60),
						 array('daysp2' =>	14.00, 'dayslwop2' => 16.00, 'dayscredit2' => 0.58),
						 array('daysp2' =>	13.50, 'dayslwop2' => 16.50, 'dayscredit2' => 0.56),
						 array('daysp2' =>	13.00, 'dayslwop2' => 17.00, 'dayscredit2' => 0.54),
						 array('daysp2' =>	12.50, 'dayslwop2' => 17.50, 'dayscredit2' => 0.52),
						 array('daysp2' =>	12.00, 'dayslwop2' => 18.00, 'dayscredit2' => 0.50),
						 array('daysp2' =>	11.50, 'dayslwop2' => 18.50, 'dayscredit2' => 0.48),
						 array('daysp2' =>	11.00, 'dayslwop2' => 19.00, 'dayscredit2' => 0.46),
						 array('daysp2' =>	10.50, 'dayslwop2' => 19.50, 'dayscredit2' => 0.44),
						 array('daysp2' =>	10.00, 'dayslwop2' => 20.00, 'dayscredit2' => 0.42),
						 array('daysp2' =>	9.50, 'dayslwop2' => 20.50, 'dayscredit2' => 0.40),
						 array('daysp2' =>	9.00, 'dayslwop2' => 21.00, 'dayscredit2' => 0.38),
						 array('daysp2' =>	8.50, 'dayslwop2' => 21.50, 'dayscredit2' => 0.35),
						 array('daysp2' =>	8.00, 'dayslwop2' => 22.00, 'dayscredit2' => 0.33),
						 array('daysp2' =>	7.50, 'dayslwop2' => 22.50, 'dayscredit2' => 0.31),
						 array('daysp2' =>	7.00, 'dayslwop2' => 23.00, 'dayscredit2' => 0.29),
						 array('daysp2' =>	6.50, 'dayslwop2' => 23.50, 'dayscredit2' => 0.27),
						 array('daysp2' =>	6.00, 'dayslwop2' => 24.00, 'dayscredit2' => 0.25),
						 array('daysp2' =>	5.50, 'dayslwop2' => 24.50, 'dayscredit2' => 0.23),
						 array('daysp2' =>	5.00, 'dayslwop2' => 25.00, 'dayscredit2' => 0.21),
						 array('daysp2' =>	4.50, 'dayslwop2' => 25.50, 'dayscredit2' => 0.19),
						 array('daysp2' =>	4.00, 'dayslwop2' => 26.00, 'dayscredit2' => 0.17),
						 array('daysp2' =>	3.50, 'dayslwop2' => 26.50, 'dayscredit2' => 0.15),
						 array('daysp2' =>	3.00, 'dayslwop2' => 27.00, 'dayscredit2' => 0.13),
						 array('daysp2' =>	2.50, 'dayslwop2' => 27.50, 'dayscredit2' => 0.10),
						 array('daysp2' =>	2.00, 'dayslwop2' => 28.00, 'dayscredit2' => 0.08),
						 array('daysp2' =>	1.50, 'dayslwop2' => 28.50, 'dayscredit2' => 0.06),
						 array('daysp2' =>	1.00, 'dayslwop2' => 29.00, 'dayscredit2' => 0.04),
						 array('daysp2' =>	0.50, 'dayslwop2' => 29.50, 'dayscredit2' => 0.02),
						 array('daysp2' =>	0.00, 'dayslwop2' => 0.00, 'dayscredit2' =>	0.00));
  		endif;
	}



}

