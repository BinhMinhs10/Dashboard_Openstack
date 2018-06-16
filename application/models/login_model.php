<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function list(){
		
	}
	public function postRequest($username,$password)
	{
		// new conversation example
		$service_url = 'http://25.20.51.178:5000/v3/auth/tokens';
		$ch = curl_init($service_url);
		
		// $uid = 'a71206637ac1443ea2850996db89aba7';
		// $pid = 'de1934a8bc5c4a2f8576501877f5fc72';

		$payload = '
			{
			    "auth": {
			        "identity": {
			            "methods": [
			                "password"
			            ],
			            "password": {
			                "user": {
			                    "name": "'. $username .'",
			                    "domain": {
			                    	"name": "Default"
			                    },
			                    "password": "'.$password.'"
			                }
			            }
			        },
			        "scope": {
			            "project": {
			            	"name": "'. $username .'",
			                "domain": {
								"name": "Default"
			                }
			            }
			        }
			    }
			}';
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// return HTTP headers with response
		curl_setopt($ch, CURLOPT_HEADER, 1);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//execute the POST request
		$result = curl_exec($ch);

		//close cURL resource
		curl_close($ch);

		return $result;
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */