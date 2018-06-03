<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('load_plugin'))
{
    function load_plugin($type,$arrData)
    {
		$CI =& get_instance();
		$str='';
		if($type=="css")
		{
			foreach($arrData as $row):
				switch($row){
					case 'global': $str.='
							<link href="'.base_url('assets/css/fonts.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/plugins/font-awesome/css/font-awesome.min.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/plugins/simple-line-icons/simple-line-icons.min.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/plugins/bootstrap/css/bootstrap.min.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/plugins/uniform/css/uniform.default.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/css/components.css').'" rel="stylesheet" id="style_components" type="text/css" />
							<link href="'.base_url('assets/css/plugins.min.css').'" rel="stylesheet" type="text/css" />
							<!-- END THEME GLOBAL STYLES -->
							<!-- BEGIN PAGE LEVEL STYLES -->
							<link href="'.base_url('assets/css/profile.min.css').'" rel="stylesheet" type="text/css" />
							<!-- END PAGE LEVEL STYLES -->
							<!-- BEGIN THEME LAYOUT STYLES -->
							<link href="'.base_url('assets/css/layout.min.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/css/themes/darkblue.min.css').'" rel="stylesheet" type="text/css" id="style_color" />
							<link href="'.base_url('assets/plugins/bootstrap-toastr/toastr.min.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/css/custom.css').'" rel="stylesheet" type="text/css" />
							';
					break;
					case 'select2': $str.='
							 <link href="'.base_url('assets/plugins/select2/css/select2.min.css').'" rel="stylesheet" type="text/css" />
							<link href="'.base_url('assets/plugins/select2/css/select2-bootstrap.min.css').'" rel="stylesheet" type="text/css" />
							';
					break;
					case 'datepicker': $str .= '
							<link href="'.base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css').'" rel="stylesheet" type="text/css" />
							';

					break;

				}
			endforeach;
			echo $str;
		}
		if($type=="js")
		{
			foreach($arrData as $row):
				switch($row){
					case 'global': $str .= '
							<script src="'.base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js').'" type="text/javascript"></script>
					        <script src="'.base_url('assets/plugins/jquery.blockui.min.js').'" type="text/javascript"></script>
					        <script src="'.base_url('assets/plugins/uniform/jquery.uniform.min.js').'" type="text/javascript"></script>
					        <script src="'.base_url('assets/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.min.js').'" type="text/javascript"></script>
					        <!--script src="'.base_url('assets/js/ui-session-timeout.js').'" type="text/javascript"></script-->
					        <!--script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script-->
					        <!-- END CORE PLUGINS -->
					        <!-- BEGIN PAGE LEVEL PLUGINS -->
					        <!--script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script-->
					        <!--script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script-->
					        <!--script src="../assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script-->
					        <!-- END PAGE LEVEL PLUGINS -->
					        <!-- BEGIN THEME GLOBAL SCRIPTS -->
					       <script src="'.base_url('assets/plugins/bootstrap-toastr/toastr.min.js').'" type="text/javascript"></script>
							<script src="'.base_url('assets/js/ui-toastr.js').'" type="text/javascript"></script>
					        <!-- END THEME GLOBAL SCRIPTS -->
					        <!-- BEGIN THEME LAYOUT SCRIPTS -->
					        <script src="'.base_url('assets/js/layout.min.js').'" type="text/javascript"></script>
					        <!--script src="'.base_url('assets/layouts/layout/scripts/demo.js').'" type="text/javascript"></script-->
					        <script src="'.base_url('assets/js/quick-sidebar.min.js').'" type="text/javascript"></script>
						';
					break;
					case 'datatable': $str.='
							<script src="'.base_url('assets/js/datatable.js').'" type="text/javascript"></script>
							<script src="'.base_url('assets/plugins/datatables/datatables.min.js').'" type="text/javascript"></script>
							<script src="'.base_url('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js').'" type="text/javascript"></script>
							<script src="'.base_url('assets/js/table-datatables-libraries.js').'" type="text/javascript"></script>';
						break;
					case 'validation': $str.='
							<script src="'.base_url('assets/plugins/jquery-validation/js/jquery.validate.min.js').'" type="text/javascript"></script>
							<script src="'.base_url('assets/plugins/jquery-validation/js/additional-methods.min.js').'" type="text/javascript"></script>
							<script src="'.base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'" type="text/javascript"></script>
							';
						break;
					case 'datepicker': $str .= '<script src="'.base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js').'" type="text/javascript"></script>';
					case 'highcharts': $str .= '<script src="'.base_url('assets/plugins/highcharts/js/highcharts.js').'" type="text/javascript"></script>';

				}
			endforeach;
			echo $str;
		}
	}
}