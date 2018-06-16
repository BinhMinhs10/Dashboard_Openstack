<?php 
session_start();

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class openstack extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function home(){
		$data=$_SESSION['data'];
		$this->load->view('success_view',$data);
	}
	public function Loginvalid(){
		$this->load->model('login_model');
		$username = $this->input->post('user');
		$password = $this->input->post('pass');
		$result = $this->login_model->postRequest($username,$password);


		list($headers, $response) = explode("\r\n\r\n", $result, 2);
		// $headers now has a string of the HTTP headers
		// $response is the body of the HTTP response

		$headers = explode("\n", $headers);
		$flag=0;
		foreach($headers as $header) {
			if ($flag==0) {
				$flag++;
				list($http,$code,$text)=explode(" ", $header);
				if($code!=201){
					$_SESSION['token'] = -1;
					break;
				}
				continue;
			}
			
			list($name,$token) = explode(": ", $header);
		    if($name=='X-Subject-Token'){
		    	$_SESSION['token'] = $token;
		    	break;
		    }
		    
			
		}

		$data = json_decode($response,true);
		//echo $data['token']['expires_at'];

		$data=array('json' => $data);
		$_SESSION['data']=$data;
		if($_SESSION['token']!=-1){
			$this->load->view('success_view',$data);
		}else{
			$this->load->view('error_view');
		}
		
	}

	public function listServer(){
		$this->load->model('server_model');
		$data = $this->server_model->getListServer();
		$data = array('json' => $data);

		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';
		$this->load->view('listserver_view', $data);
	}
	public function listVolumes(){
		$this->load->model('volumes_model');
		$data = $this->volumes_model->getListVolumes();

		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';
		
		$data = array('json' => $data);
		$this->load->view('listvolumes_view', $data);
	}
	public function listNetworks(){
		$this->load->model('networks_model');
		$data = $this->networks_model->getListNetworks();

		$data = array('json' => $data);
		$this->load->view('listnetworks_view', $data);
	}
	public function listImages(){
		$this->load->model('image_model');
		$data= $this->image_model->getListImages();

		$data = array('json' => $data);
		$this->load->view('listimages_view', $data);
	}
	public function listFlavors(){
		$this->load->model('flavors_model');
		$data= $this->flavors_model->getListFlavor();

		$data = array('json' => $data);
		$this->load->view('listflavors_view', $data);
	}
}

/* End of file openstack.php */
/* Location: ./application/controllers/openstack.php */