<?php

class Report_model extends CI_Model {
    
      function __construct() {
        parent::__construct();
        
    }
 
    
    
    public function branch_name() {
         $this->db->from('branch');
         $this->db->order_by('branch_name', 'DESC');
         $query = $this->db->get();
         return $query->result(); 
        
    }
    
    public function total_of_dilavary_cost($branch_cord,$dat) {
         $this->db->from('package_details');
         $this->db->where('branch', $branch_cord);
         $this->db->where('status','2');         
         $this->db->like('datetime',$dat);
         $this->db->select_sum('delivery_cost');
         $query = $this->db->get();
         return $query->result(); 
      }
      
      
      public function branch_resalt($branch_cord,$fistDate,$lastDate) {
          
         $this->db->from('package_details as pa');
         $this->db->where('branch', $branch_cord);
         $this->db->where('status','2'); 
         $this->db->where('datetime >=', $fistDate);
         $this->db->where('datetime <=', $lastDate);
         $this->db->join('branch as br', 'br.branch_cord = pa.branch','LEFT');      
         $query = $this->db->get();
         return $query->result(); 
          
      }
      
      
         public function branch_pending_resalt($branch_cord,$fistDate,$lastDate) {          
         $this->db->from('package_details as pa');
         $this->db->where('branch', $branch_cord);
         $this->db->where('status','1'); 
         $this->db->where('datetime >=', $fistDate);
         $this->db->where('datetime <=', $lastDate);
         $this->db->join('branch as br', 'br.branch_cord = pa.branch','LEFT');      
         $query = $this->db->get();
         return $query->result();          
      }
      
      public function count_job() {
          
      }
      
    
}
