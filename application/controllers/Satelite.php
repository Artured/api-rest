<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satelite extends CI_Controller 
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_api');
	}

	public function topsecret()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST')
		{
			header("Content-Type:application/json");

			$json = file_get_contents("php://input", "r");
			$data = json_decode($json, TRUE);

			if ($data == null || $data == '' )
			{
				http_response_code(404);
				echo "Missing data!";
				die;
			}

			/*Objeto JSON que recibe
			*
			*
			*	{
			*	"satellites": [
			*		{
			*			"name": "kenobi",
			*			"distance": 100.0,
			*			"message": ["este", "", "", "mensaje", ""]
			*		},
			*		{
			*			"name": "skywalker",
			*			"distance": 115.5,
			*			"message": ["", "es", "", "", "secreto"]
			*		},
			*		{
			*			"name": "sato",
			*			"distance": 142.7,
			*			"message": ["este", "", "un", "", ""]
			*		}
			*		]
			*	}
			*
			*
			*/

			$satellites = $data['satellites'];

			$arrayname = $satellites[0]['message'];

			foreach ($satellites as $satelite) 
			{
				for ($i=0; $i < count($satelite['message']); $i++) 
				{ 
					if( !in_array( $satelite['message'][$i], $arrayname ) && $satelite['message'][$i] != '' )
					{
						$arrayname[$i] = $satelite['message'][$i];
					}
				}
			}

			if(count($arrayname) != count($satellites[0]['message']))
			{
				http_response_code(404);
				echo "Missing data Message!";
				die;
			}

			$data = array(
				'position'  => array(
					"x"=> -100.0,
					"y" => 75.5
				),
				'message'=> implode(' ' ,$arrayname)
			);
			
			ob_clean();
			header_remove(); 		

			echo json_encode($data);
		}

		exit();
	}

	public function topsecret_split($satellite_name)
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST')
		{
			header("Content-Type:application/json");
	
			$json = file_get_contents("php://input", "r");
			$data = json_decode($json, TRUE);
	
			if ($data == null || $data == '' )
			{
				http_response_code(404);
				echo "Missing data!";
				die;
			}

			/*Objeto JSON que recibe
			*	{
			*		"distance": 100.0,
			*		"message": ["este", "", "", "mensaje", ""]
			*	}
			*/

			$rs = $this->Model_api->getSatelite($satellite_name,$data['distance']);
			
			$satelite = $data['message'];
			$arrayname = $data['message'];

			for ($i=0; $i < count($satelite); $i++) 
			{ 
				if( !in_array( $satelite[$i], $arrayname ) && $satelite[$i] != '' )
				{
					$arrayname[$i] = $satelite[$i];
				}
			}

			if(count($arrayname) != count($satellites[0]['message']))
			{
				$arrayname =[];
				array_push($arrayname, 'Missing data Message!');
			}

			$res = array(
				'position'  => array(
					"x"	=> $rs[0]->cor_x,
					"y" => $rs[0]->cor_y
				),
				'message'	=> implode(' ' ,$arrayname)
			);

			ob_clean();
			header_remove(); 

			echo  json_encode($res);

		}else if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			header("Content-Type:application/json");

			$rs = $this->Model_api->getSatelite($satellite_name);

			$res = array(
				'position'  => array(
					"x"	=> $rs[0]->cor_x,
					"y" => $rs[0]->cor_y
				),
				'message'	=> json_decode($rs[0]->message)
			);

			ob_clean();
			header_remove(); 
			
			echo json_encode($res);
		}

		exit();
    }
}


