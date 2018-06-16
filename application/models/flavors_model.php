<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class flavors_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getListFlavor(){
		$token = $_SESSION['token'];
		$token = trim($token);

		$request_headers = array();
		$request_headers[] = 'X-Auth-Token: '. $token;
		$request_headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';

		$curl = curl_init();
		curl_setopt_array($curl, array(
    		CURLOPT_RETURNTRANSFER => 1,
    		CURLOPT_URL => 'http://controller:8774/v2.1/flavors/detail',
    		CURLOPT_HTTPHEADER => $request_headers
		));

		//execute the POST request
		$result_body = curl_exec($curl);
		curl_close($curl);

		
		$data = json_decode($result_body,true);

		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';

		 return $data;
	}

}

/* End of file flavors_model.php */
/* Location: ./application/models/flavors_model.php */