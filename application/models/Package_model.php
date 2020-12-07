<?php

class Package_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function add_package($send, $recive, $package) {
        $this->db->insert('sender_details', $send);
        $this->db->insert('receiver_details', $recive);
        $this->db->insert('package_details', $package);
    }

    public function update_branch($id, $details) {

        $this->db->insert('update_branch', $details);

        $pacage = array(
            'status' => 1,
            'branch' => $this->session->branch,
            'datetime' => date('Y-m-d h:i:s a'),
        );
        $this->db->where('package_id', $id);
        $this->db->update('package_details', $pacage);
    }

    public function deliver_finishing($id, $details) {
        $this->db->insert('update_branch', $details);

        $pacage = array(
            'status' => 2,
            'branch' => $this->session->branch,
            'datetime' => date('Y-m-d h:i:s a'),
            'package_date' => date('Y-m-d h:i:s a'),
        );
        $this->db->where('package_id', $id);
        $this->db->update('package_details', $pacage);
    }

    public function live_serach($sn) {
        $this->db->from('sender_details as sd');
        $this->db->limit(10);        
        $this->db->like('sd.package_sn', $sn);
        $query = $this->db->get();
        return $query->result();
    }

    // one pacage details
    public function one_package($package_sn) {
        $this->db->from('package_details as pa');
        $this->db->join('receiver_details as re', 're.package_sn = pa.package_sn', 'LEFT');
        $this->db->join('sender_details as se', 'se.package_sn = pa.package_sn', 'LEFT');
        $this->db->join('note as no', 'no.package_sn = pa.package_sn', 'LEFT');
        //  $this->db->join('note as no', 'no.package_sn = pa.package_sn','LEFT');
        $this->db->join('sys_users as sys', 'sys.emp_no = pa.package_details_by', 'LEFT');
        $this->db->like('pa.package_sn', $package_sn);
        $this->db->like('pa.branch', $this->session->branch);
        $query = $this->db->get();
        $query = $query->result_array();
       if ($query) {
            return $query[0];
        } else {
            return array();
        }
       
    }

    //note data 
    public function note($notdata) {
        $this->db->insert('note', $notdata);
    }
    
    public function note_one($package_sn) {
        $this->db->from('note as no');       
        $this->db->like('no.package_sn',$package_sn);
         $this->db->join('sys_users as sys', 'sys.emp_no = no.note_by', 'LEFT');
         $this->db->join('branch as br', 'br.branch_cord = no.note_branch', 'LEFT');
         
         
        $query = $this->db->get();
        return $query->result();
        
    }

}
