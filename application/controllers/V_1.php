<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_1 extends CI_Controller {
	
    function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST');
		header("Content-type: application/json; charset=utf-8");

		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$data = array(
				'Planets' 	=> 'http://localhost/API/Planets/getPlanets',
				'Ship'		=> 'http://localhost/API/Satelite/topsecret/',
				'Satelite'	=> 'http://localhost/API/Satelite/topsecret_split/{satelite_name}'
			);
			
			ob_clean();

			echo json_encode($data);
		}
		
		exit();
	}

}
