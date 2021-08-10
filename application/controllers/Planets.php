<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planets extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_api');
	}

    public function getPlanets($id = null)
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST');
		
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			if ($id != null && !is_numeric($id))
			{
				http_response_code(404);
				echo "¡El ID debe ser un numero!";
				exit();
			}

			$rs = $this->Model_api->get_planets($id);

			$count = array('count' => count($rs));
			$data = array(
				'Info'   => $count,
				'Result' => $rs,
			);
			
			ob_clean();
			header_remove(); 		

			echo json_encode($data);
		}

		exit();
	}
}