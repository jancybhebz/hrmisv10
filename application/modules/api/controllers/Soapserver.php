<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soapserver extends MY_Controller
{
	function __construct() {
        parent::__construct();
    }

	function doAuthenticate() {
		return true;
	    // if (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])) {

	    //     if ($_SERVER['PHP_AUTH_USER'] == "fnriserver" && $_SERVER['PHP_AUTH_PW'] == "fnriserverPSWD")
	    //         return true;
	    //     else
	    //         return false;
	    // }
	}


	function getData($offset) {
	    // if (!$this->doAuthenticate()) {
	    //     return "Invalid username or password";
	    // }

	    return json_encode(array('a' => 'tst1', 'b' => 'test2'));
	}

	

	function index()
	{
		
		error_reporting(0);
		// print_r($this->getData(0));
 		$this->load->library('nusoap_lib');
		$server = new soap_server();
		$server->configureWSDL('soapserver', 'urn:details');
		$server->register("getData", array('offset' => 'xsd:string'), array('return' => 'xsd:string'), 'urn:details', 'urn:details#getData');

		$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
		// $server->service($HTTP_RAW_POST_DATA);
		$server->service(file_get_contents("php://input"));
	}
	// public function index()
	// {
	// 	$this->load->library("nuSoap_lib");
	// 	$server = new nusoap_server(); // Create a instance for nusoap server

	// 	$server->configureWSDL("Soap Demo","urn:soapdemo"); // Configure WSDL file

	// 	$server->register(
	// 		"getall_users", // name of function
	// 		// array("name"=>"xsd:string"),  // inputs
	// 		array("return"=>"xsd:string")   // outputs
	// 	);

	// 	// $server->service(file_get_contents("php://input"));

	// 	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	// 	// $server->service($HTTP_RAW_POST_DATA);
	// 	$server->service(file_get_contents("php://input"));
	// }

	// function get_users($name)
	// {
	// 	$products = [
	// 		"book"=>20,
	// 		"pen"=>10,
	// 		"pencil"=>5
	// 	];
		
	// 	foreach($products as $product=>$price)
	// 	{
	// 		if($product==$name)
	// 		{
	// 			return $price;
	// 			break;
	// 		}
	// 	}
	// }

	// function getall_users()
	// {
	// 	$products = [
	// 		"book"=>20,
	// 		"pen"=>10,
	// 		"pencil"=>5
	// 	];
		
	// 	return json_encode($products);
	// }

}