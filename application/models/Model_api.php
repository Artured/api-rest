<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api extends CI_Model {

    function __construct()
	{
		parent::__construct();
	}
    
    public function get_planets($id = null)
    {
        $this->db->select('*');
        $this->db->from('catalogo_planetas');

        if($id != null){
            $this->db->where('id',$id);
        }

        $this->db->order_by('id','ASC');

        $query = $this->db->get();

        return $query->result();
    }
    
    public function getSatelite($satellite_name,$distance = null)
    {
        $this->db->select('*');
        $this->db->from('catalogo_satelites');
        $this->db->like('name', ucfirst($satellite_name), 'both'); 
        
        if($distance != null){
            $this->db->where('distance',$distance);
        }
        
        $this->db->order_by('id','ASC');
        
        $query = $this->db->get();

        return $query->result();
    }
}