<?php

class Email_model extends CI_Model {
    
      function __construct() {
        parent::__construct();
        
    }
    
    var $url='http://www.goole.com';
    
    public function email_setup($message,$titel,$tomail,$subject) {
          $config = Array(
               'protocol' =>'smtp',
               'smtp_host' =>'smtp.gmail.com',
               'smtp_port' => 587 ,
               'smtp_user' => 'kindika144@hmail.com', // change it to yours
               'smtp_pass' =>'Indika@1989', // change it to yours
               'mailtype' =>'html',
               'charset' => 'utf-8',
               'wordwrap' => TRUE );
               $this->load->library('email', $config);              
               $this->email->set_newline("\r\n");
               $this->email->from('infor@lankahall.com',$titel); // change it to yours
               $this->email->to($tomail);// change it to yours
               $this->email->subject($subject);
               $this->email->message($message);
           //    $this->email->set_header('Content-Type', 'text/html');
               $this->email->send();
        
    }
    
    
    
    public function new_pakage_email($package,$send) {
        $tomail='kindika144@gmail.com';
        $subject='test';
        $titel='Go';
        $message=$package['package_sn'];
        
        
        $this->email_setup($message, $titel,$tomail,$subject);
       
        
    }
    

}