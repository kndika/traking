<?php

class Branch_model extends CI_Model {

    

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
   
    
 /// new system user    
 public function new_branch($new) {
       $this->db->insert('branch',$new);
 }
 
 
    
    public function branch() {
        $this->db->from('branch');      
        $query = $this->db->get();
        return $query->result(); 
    }
    
    
}