<?php

class System_model extends CI_Model {

    

    function __construct() {
        parent::__construct();
       
    }
    

    public function system_details() {
        $this->db->from('system_details'); 
        $this->db->where('id',1);
        $query = $this->db->get();
        return $query->result(); 
    }
    
     public function sys_infor_update($infor) {
        $this->db->where('id',1);
        $this->db->update('system_details', $infor);
    }
    
}