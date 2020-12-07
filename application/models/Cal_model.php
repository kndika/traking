<?php

class Cal_model extends CI_Model {

    

    function __construct() {
        parent::__construct();
       
    }
    

    public function ccc() {
        $this->db->from('system_details'); 
        $this->db->where('id',1);
        $query = $this->db->get();
        return $query->result(); 
    }
    
    
}