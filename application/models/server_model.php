<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class server_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getListServer(){
		$service_url = 'http://controller:8774/v2.1/servers/detail';
		$ch = curl_init($service_url);

		$token = $_SESSION['token'];
		$header = 'X-Auth-Token:'.$token;

		// return HTTP headers with response
		curl_setopt($ch, CURLOPT_HEADER, 1);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//execute the POST request
		$result = curl_exec($ch);
		list($headers, $response) = explode("\r\n\r\n", $result, 2);
		
		curl_close($ch);
		$data = json_decode($response,true);
		
		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';

		return $data;
	}

}

/* End of file server_model.php */
/* Location: ./application/models/server_model.php */