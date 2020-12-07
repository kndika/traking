<?php

class Systemuser extends CI_Model {

    

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    /// login
    function log($uname,$upassword) {
    $user = $this->db->select("emp_no,sys_user_id,uname,branch")->where(['uname' => $uname, 'upassword' => md5($upassword), 'status' =>'1'])->get('sys_users')->row();
  if ($user) {
            $logindata = ['userid'=>$user->sys_user_id,'uname' => $user->uname,'branch'=>$user->branch,'emp_no'=>$user->emp_no];
            $this->session->set_userdata($logindata);
            redirect(base_url('dash'));
        } else {
            redirect(base_url());
        }
    }
    
 /// new system user    
 public function new_sys_user($new) {
       $this->db->insert('sys_users',$new);
 }
 
 public function permittion($perm) {
      $this->db->insert('permission',$perm);
 }
    
 
 public function system_users() {      
        $this->db->from('sys_users as syu');      
        $this->db->join('permission as per', 'per.emp_no = syu.emp_no','LEFT');
        $query = $this->db->get();
        return $query->result();        
    }
    
    public function permission($emp_no) {
        $user = $this->db->select("emp_no,admin,add,red,edit,delet,alreport")->where(['emp_no' => $emp_no])->get('permission')->row();
  if ($user) {
            $logindata = ['admin'=>$user->admin,'add' => $user->add,'red' => $user->red,'edit'=>$user->edit,'delet'=>$user->delet,'alreport'=>$user->alreport];
            $this->session->set_userdata($logindata);
        
    }
    }
    
    //updae system user permission
    public function sys_user_update($emp_no,$perm) {
        $this->db->where('emp_no',$emp_no);
        $this->db->update('permission', $perm);
    }
    
    //updae system user permission
    public function sys_user_permition_update($sys_user_id,$perm2) {
        $this->db->where('sys_user_id',$sys_user_id);
        $this->db->update('sys_users', $perm2);
    }
    
     //updae system user permission
    public function sys_user_reset_pass($sys_user_id,$perm2) {
        $this->db->where('sys_user_id',$sys_user_id);
        $this->db->update('sys_users', $perm2);
    }
    
    
    public function one_sys_user() {
        $this->db->from('sys_users as syu');      
        $this->db->join('permission as per', 'per.emp_no = syu.emp_no','LEFT');
        $this->db->where('syu.sys_user_id',$this->session->userid);
        $query = $this->db->get();
        return $query->result(); 
        
    }
}