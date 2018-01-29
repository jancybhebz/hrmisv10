<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('load_plugin'))
{
    function load_plugin($arrData)
    {
		$CI =& get_instance();
		$str='';
		foreach($arrData as $row):
			switch($row){
				case 'datatable': $str.='
						<script src="'.base_url('assets/js/datatable.js').'" type="text/javascript"></script>
						<script src="'.base_url('assets/plugins/datatables/datatables.min.js').'" type="text/javascript"></script>
						<script src="'.base_url('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js').'" type="text/javascript"></script>';
				case 'validation': $str.='
						<script src="'.base_url('assets/plugins/jquery-validation/js/jquery.validate.min.js').'" type="text/javascript"></script>
						<script src="'.base_url('assets/plugins/jquery-validation/js/additional-methods.min.js').'" type="text/javascript"></script>
						<script src="'.base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'" type="text/javascript"></script>';
				case 'toaster': $str .= '
						<script src="'.base_url('assets/plugins/bootstrap-toastr/toastr.min.js').'" type="text/javascript"></script>
						<script src="'.base_url('assets/js/ui-toastr.js').'" type="text/javascript"></script>';

			}
		endforeach;
		echo $str;
	}
}