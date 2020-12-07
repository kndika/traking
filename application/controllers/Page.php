<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->library('session');
        $this->load->model('Systemuser');
        $this->load->model('Branch_model');
        $this->load->model('Email_model');
        $this->load->helper('security');
        $this->load->library('email');
        $this->load->library('Zend');
        $this->load->model('Package_model');
        $this->load->model('System_model');
        $this->load->model('Cal_model');
        $this->load->model('Report_model');
        
    }

    /// index and login
    public function index() {
        $this->form_validation->set_rules('uname', 'User Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('upassword', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login');
        } else {
            $upassword = $this->input->post('upassword');
            $uname = $this->input->post('uname');
            $this->Systemuser->log($uname, $upassword);
        }
    }

    /// dash bord            
    public function dash() {
        if (empty($this->session->emp_no)) {
            redirect(base_url());
        }

        $data = array(
            "page_title" => "DashBord",
            "page_content" => "sys/dash",
            "branch_name"=>  $this->Report_model->branch_name());
        $this->load->view('template/template', $data);
    }

    /// new user            
    public function newuser() {
        if (empty($this->session->admin)) {
            redirect(base_url());
        }



        $this->form_validation->set_rules('full_name', 'User Full Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('emp_no', 'Employee Number', 'trim|required|xss_clean|numeric|is_unique[sys_users.emp_no]');
        $this->form_validation->set_rules('tpno', 'Telephone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|numeric|is_unique[sys_users.tpno]');
        $this->form_validation->set_rules('uname', 'User Name', 'trim|required|xss_clean|is_unique[sys_users.uname]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('branch', 'Branch City', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                "page_title" => "New User",
                "page_content" => "users/newuser",
                "br_list" => $this->Branch_model->branch());
            $this->load->view('template/template', $data);
        } else {

            if ($this->input->post('newuser')) {

                $new = array(
                    'full_name' => $this->input->post('full_name'),
                    'emp_no' => $this->input->post('emp_no'),
                    'tpno' => $this->input->post('tpno'),
                    'uname' => $this->input->post('uname'),
                    'upassword' => md5($this->input->post('password')),
                    'branch' => $this->input->post('branch'),
                    'status' => 1,
                    'redate_time' => date('Y-m-d h:i:s a'),
                    'adby' => $this->session->userid,);

                $perm = array(
                    'emp_no' => $this->input->post('emp_no'),
                    'admin' => $this->input->post('admin'),
                    'add' => $this->input->post('add'),
                    'red' => $this->input->post('red'),
                    'edit' => $this->input->post('edit'),
                    'delet' => $this->input->post('delet'),
                    'alreport'=>$this->input->post('alreport'));

                $this->Systemuser->permittion($perm);
                $this->Systemuser->new_sys_user($new);

                $data = array(
                    "page_title" => "New User",
                    "page_content" => "users/newuser",
                    "br_list" => $this->Branch_model->branch(),
                    "errmasage" => "<div class='alert alert-success'><strong>Success!</strong> " . $this->input->post('uname') . " Register Successfully</div>",);
                $this->load->view('template/template', $data);
            }
        }
    }

    // user list

    public function userlist() {
        if (empty($this->session->admin)) {
            redirect(base_url());
        }

        $data = array(
            "page_title" => "User List",
            "page_content" => "users/userlist",
            "br_list" => $this->Branch_model->branch(),
            "user_list" => $this->Systemuser->system_users());
        $this->load->view('template/template', $data);
    }

    /// update_sys_user
    public function update_sys_user() {
        if (empty($this->session->admin)) {
            redirect(base_url());
        }


        $emp_no = $this->input->post('emp_no');
        $sys_user_id = $this->input->post('sys_user_id');
        $branch = $this->input->post('branch');

        $perm2 = array('branch' => $this->input->post('branch'));
        $perm = array(
            'admin' => $this->input->post('admin'),
            'add' => $this->input->post('add'),
            'red' => $this->input->post('red'),
            'edit' => $this->input->post('edit'),
            'delet' => $this->input->post('delet'),
            'alreport'=>$this->input->post('alreport'));
        $this->Systemuser->sys_user_update($emp_no, $perm);
        $this->Systemuser->sys_user_permition_update($sys_user_id, $perm2);
        $data = array(
            "page_title" => "User List",
            "page_content" => "users/userlist",
            "da" => '<div class="alert alert-success mt-3"><strong>Success!</strong> Permission update successfully.</div>',
            "user_list" => $this->Systemuser->system_users());
        $this->load->view('template/template', $data);
    }

    public function syspassre() {
        if (empty($this->session->admin)) {
            redirect(base_url());
        }

        $sys_user_id = $this->input->post('sys_user_id');
        $perm2 = array('upassword' => md5($this->input->post('upassword')));
        $this->Systemuser->sys_user_reset_pass($sys_user_id, $perm2);

        $data = array(
            "page_title" => "User List",
            "page_content" => "users/userlist",
            "da" => '<div class="alert alert-success mt-3"><strong>Success!</strong> Password reset successfully.</div>',
            "user_list" => $this->Systemuser->system_users());
        $this->load->view('template/template', $data);
    }

    public function sys_user_passre() {
        $sys_user_id = $this->session->userid;
        $perm2 = array('upassword' => md5($this->input->post('upassword')));
        $this->Systemuser->sys_user_reset_pass($sys_user_id, $perm2);

        $data = array(
            "page_title" => "My Profile",
            "page_content" => "users/my_pro",
            "one_user" => $this->Systemuser->one_sys_user(),
            "da" => '<div class="alert alert-success mt-3"><strong>Success!</strong> Password reset successfully.</div>',
            "user_list" => $this->Systemuser->system_users());
        $this->load->view('template/template', $data);
    }

    //my pro password change sys user 


    public function my_pro() {

        if (empty($this->session->emp_no)) {
            redirect(base_url());
        }

        $data = array(
            "page_title" => "My Profile",
            "page_content" => "users/my_pro",
            "one_user" => $this->Systemuser->one_sys_user());
        $this->load->view('template/template', $data);
    }

//add new branch




    public function addBranch() {

        if (empty($this->session->admin)) {
            redirect(base_url());
        }


        $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required|xss_clean|is_unique[branch.branch_name]');
        $this->form_validation->set_rules('branch_cord', 'Branch Cord', 'trim|required|xss_clean|numeric|is_unique[branch.branch_cord]');
        $this->form_validation->set_rules('branch_tpno', 'Telephone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|numeric|is_unique[branch.branch_tpno]');
        $this->form_validation->set_rules('branch_city', 'Branch City', 'trim|required|xss_clean|is_unique[branch.branch_city]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                "page_title" => "New Branch",
                "page_content" => "sys/addBranch",);
            $this->load->view('template/template', $data);
        } else {
            $new = array(
                'branch_name' => $this->input->post('branch_name'),
                'branch_cord' => $this->input->post('branch_cord'),
                'branch_tpno' => $this->input->post('branch_tpno'),
                'branch_city' => $this->input->post('branch_city'),
                'br_ad_by' => $this->session->userid,
                'br_ad_date' => date('Y-h-m h:i:s a'),);
            $this->Branch_model->new_branch($new);

            $data = array(
                "page_title" => "New Branch",
                "page_content" => "sys/addBranch",
                "errmasage" => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> ' . $this->input->post('branch_name') . ' Branch Add Success.</div>',);
            $this->load->view('template/template', $data);
        }
    }

    /// branch list 

    public function branchlist() {
        if (empty($this->session->admin)) {
            redirect(base_url());
        }

        $data = array(
            "page_title" => "New Branch",
            "page_content" => "sys/branchlist",
            "br_list" => $this->Branch_model->branch(),);
        $this->load->view('template/template', $data);
    }

    public function newPacage() {
        if (empty($this->session->add)) {
            redirect(base_url());
        }
        //send
        $this->form_validation->set_rules('sender_name', 'Sender Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sender_street', 'Sender Street Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sender_city', 'Sender City / Town', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sender_state', 'Sender State / Province', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sender_zip', 'Sender Zip / Postal', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('sender_country', 'Sender Country', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sender_mail', 'Sender Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('sender_contact', 'Sender Contact Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|numeric');
        $this->form_validation->set_rules('sender_nic', 'Sender NIC', 'trim|required|xss_clean');
        //recive
        $this->form_validation->set_rules('receiver_name', 'Sender Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('receiver_street', 'Sender Street Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('receiver_city', 'Sender City / Town', 'trim|required|xss_clean');
        $this->form_validation->set_rules('receiver_state', 'Sender State / Province', 'trim|required|xss_clean');
        $this->form_validation->set_rules('receiver_zip', 'Sender Zip / Postal', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('receiver_country', 'Sender Country', 'trim|required|xss_clean');
        $this->form_validation->set_rules('receiver_mail', 'Sender Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('receiver_contact', 'Sender Contact Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|numeric');
        $this->form_validation->set_rules('receiver_nic', 'Sender NIC', 'trim|required|xss_clean');
        //package
        $this->form_validation->set_rules('package_weight', 'Package Weight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_category', 'Package Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_date_finish', 'Package Sate Finish', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_date_to_recive', 'Package Date To Recive', 'trim|required|xss_clean');
        $this->form_validation->set_rules('delivery_cost', 'Cost of Delivery', 'trim|required|xss_clean');



        if ($this->form_validation->run() == FALSE) {
            $data = array(
                "page_title" => "New Package",
                "page_content" => "sys/newPacage",);
            $this->load->view('template/template', $data);
        } else {
            if (($this->input->post('adpackage'))) {
                $bar_prifix = $this->db->get_where('system_details', array('id' => '1'))->row()->bar_prifix;

                if (empty($this->db->select('sender_id,package_sn')->order_by('sender_id', "desc")->limit(1)->get('sender_details')->row()->package_sn)) {
                    $pacage_sn = $bar_prifix . '-000000001';
                } else {
                    $last_no = $this->db->select('sender_id,package_sn')->order_by('sender_id', "desc")->limit(1)->get('sender_details')->row()->package_sn;
                    $exp = explode("-", $last_no);
                    $bil = $exp[1] + 1;
                    $pacage_sn = $bar_prifix . '-' . str_pad($bil, 9, "0", STR_PAD_LEFT);
                }



                $send = array(
                    'package_sn' => $pacage_sn,
                    'sender_name' => $this->input->post('sender_name'),
                    'sender_street' => $this->input->post('sender_street'),
                    'sender_city' => $this->input->post('sender_city'),
                    'sender_state' => $this->input->post('sender_state'),
                    'sender_zip' => $this->input->post('sender_zip'),
                    'sender_country' => $this->input->post('sender_country'),
                    'sender_mail' => $this->input->post('sender_mail'),
                    'sender_contact' => $this->input->post('sender_contact'),
                    'sender_nic' => $this->input->post('sender_nic'),
                    'sender_date' => date('Y-m-d h:i:s a'),
                    'sender_details_by' => $this->session->emp_no,
                    'sender_branch' => $this->session->branch, );

                $recive = array(
                    'package_sn' => $pacage_sn,
                    'receiver_name' => $this->input->post('receiver_name'),
                    'receiver_street' => $this->input->post('receiver_street'),
                    'receiver_city' => $this->input->post('receiver_city'),
                    'receiver_state' => $this->input->post('receiver_state'),
                    'receiver_zip' => $this->input->post('receiver_zip'),
                    'receiver_country' => $this->input->post('receiver_country'),
                    'receiver_mail' => $this->input->post('receiver_mail'),
                    'receiver_contact' => $this->input->post('receiver_contact'),
                    'receiver_nic' => $this->input->post('receiver_nic'),
                    'receiver_date' => date('Y-m-d h:i:s a'),
                    'receiver_details_by' => $this->session->emp_no,);

                $package = array(
                    'package_sn' => $pacage_sn,
                    'package_weight' => $this->input->post('package_weight'),
                    'package_category' => $this->input->post('package_category'),
                    'package_start_date' => date('Y-m-d h:i:s a'),
                    'package_date_finish' => $this->input->post('package_date_finish'),
                    'package_date_to_recive' => $this->input->post('package_date_to_recive'),
                    'package_note' => $this->input->post('package_note'),
                    'delivery_cost' => $this->input->post('delivery_cost'),
                    'package_details_by' => $this->session->emp_no,
                    'status' => 1,
                    'branch' => $this->session->branch,
                    'datetime'=>date('Y-m-d h:i:s a'));



                $this->Package_model->add_package($send, $recive, $package);
                $this->Email_model->new_pakage_email($package, $send);

                $data = array(
                    "page_title" => "Print Date",
                    "page_content" => "sys/print_package",
                    "code" => $pacage_sn);
                $this->load->view('template/template', $data);
            } else {
                $data = array(
                    "page_title" => "New Package",
                    "page_content" => "sys/newPacage",);
                $this->load->view('template/template', $data);
            }
        }
    }

    //// bar cord

    public function barcord($code) {
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text' => $code, 'drawText' => TRUE));
    }

    // sucess masage 

    public function print_package() {
        $data = array(
            "page_title" => "Print",
            "page_content" => "sys/print_package",
            "errorMasage" => "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button> <strong>Success!</strong> Your package add successfully.</div>",);
        $this->load->view('template/template', $data);
    }

    public function sysdetails() {
        if (empty($this->session->admin)) {
            redirect(base_url());
        }


        $this->form_validation->set_rules('sys_name', 'Name Of Company', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sys_address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sys_tp', 'Telephone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|numeric');
        $this->form_validation->set_rules('sys_email', 'Email', 'trim|required|xss_clean');
        //  $this->form_validation->set_rules('logo', 'Sender Zip / Postal', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('bar_prifix', 'Cord for Bar', 'trim|required|xss_clean');
        $this->form_validation->set_rules('currency', 'Currency', 'trim|required|xss_clean');
        $this->form_validation->set_rules('not_for_invoice', 'Note for Invoice', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $data = array(
                "page_title" => "Print",
                "page_content" => "sys/sysdetails",);
            $this->load->view('template/template', $data);
        } else {
            if ($this->input->post('sysdetails')) {


                $infor = array(
                    'sys_name' => $this->input->post('sys_name'),
                    'sys_address' => $this->input->post('sys_address'),
                    'sys_tp' => $this->input->post('sys_tp'),
                    'sys_email' => $this->input->post('sys_email'),
                    'bar_prifix' => $this->input->post('bar_prifix'),
                    'currency' => $this->input->post('currency'),
                    'not_for_invoice' => $this->input->post('not_for_invoice'),
                );

                $this->System_model->sys_infor_update($infor);

                $data = array(
                    "page_title" => "Print",
                    "page_content" => "sys/sysdetails",
                    "error" => '<div class="alert alert-success"><strong>Success!</strong> Record Updated Successfully</div>');
                $this->load->view('template/template', $data);
            }
        }
        
    }

    /// branch_mark
    public function branch_mark() {
        if (empty($this->session->red)) {
            redirect(base_url());
        }
        $this->form_validation->set_rules('bar', 'Package Barcode', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                "page_title" => "Mark Branch",
                "page_content" => "sys/branch_mark",);
            $this->load->view('template/template', $data);
        } else {
            if ($this->input->post('barcod_update')) {
                $this->db->where('package_sn', $this->input->post('bar'));
                $query = $this->db->get('package_details');
                $count_row = $query->num_rows();
                if ($count_row > 0) {

                    $id = $this->db->get_where('package_details', array('package_sn' => $this->input->post('bar')))->row()->package_id;
                    //////
                    $details = array(
                        'package_sn' => $this->input->post('bar'),
                        'emp_no' => $this->session->emp_no,
                        'branch' => $this->session->branch,
                        'date_time' => date('Y-m-d h:i:s a'),
                        'status' => 1,
                    );

                    $this->Package_model->update_branch($id, $details);

                    $data = array(
                        "page_title" => "Mark Branch",
                        "page_content" => "sys/branch_mark",
                        "error" => '<div class="alert alert-success"><strong>Success!</strong> Record Updated Successfully</div>');
                    $this->load->view('template/template', $data);
                } else {
                    $data = array(
                        "page_title" => "Mark Branch",
                        "page_content" => "sys/branch_mark",
                        "error" => '<div class="alert alert-danger"><strong>Success!</strong>Sorry No Like This Record </div>');
                    $this->load->view('template/template', $data);
                }
            }
        }
    }

    
    public function image_up() {
        
               $newimage = strtolower(str_replace('-', '_',str_replace(' ', '_', $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name))) . '.' . pathinfo($_FILES["userfile"]['name'], PATHINFO_EXTENSION);
           
            
               $cons['upload_path'] = './uplod/';
                $cons['allowed_types'] = 'jpg|png|jpeg';
                $cons['remove_spaces'] = true;
                $cons['overwrite'] = TRUE;
                $cons['max_size'] = '2048000';
                $cons['max_height'] = '768000';
                $cons['max_width'] = '10240000';
                $cons['file_name'] = $newimage;

                $this->load->library('upload', $cons);
                if ($this->upload->do_upload()) {
                    $data = array('upload_data' => $this->upload->data());
                }

                $cons['image_library'] = 'gd2';
                $cons['source_image'] = './uplod/' . $newimage;
                $cons['maintain_ratio'] = TRUE;
                $cons['overwrite'] = TRUE;
                $cons['width'] = 500;
                $cons['height'] = 500;


                $this->load->library('image_lib', $cons);
                $this->image_lib->resize();
                
                $imag=array( 'logo'=>$newimage, );
                
                $this->db->update('system_details',$imag);
                
                 redirect(base_url('sysdetails'));
        
           
        
    }
    // package diliver finish
    public function deliver_finishing() {
        if (empty($this->session->red)) {
            redirect(base_url());
        }

        $this->form_validation->set_rules('bar', 'Package Barcode', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                "page_title" => "Mark Branch",
                "page_content" => "sys/deliver_finishing",);
            $this->load->view('template/template', $data);
        } else {
            if ($this->input->post('barcod_update')) {
                $this->db->where('package_sn', $this->input->post('bar'));
                $query = $this->db->get('package_details');
                $count_row = $query->num_rows();
                if ($count_row > 0) {

                    $id = $this->db->get_where('package_details', array('package_sn' => $this->input->post('bar')))->row()->package_id;
                    //////
                    $details = array(
                        'package_sn' => $this->input->post('bar'),
                        'emp_no' => $this->session->emp_no,
                        'branch' => $this->session->branch,
                        'date_time' => date('Y-m-d h:i:s a'),
                        'status' => 2,
                    );

                    $this->Package_model->deliver_finishing($id, $details);

                    $data = array(
                        "page_title" => "Mark Branch",
                        "page_content" => "sys/deliver_finishing",
                        "error" => '<div class="alert alert-success"><strong>Success!</strong> Record Updated Successfully</div>');
                    $this->load->view('template/template', $data);
                } else {
                    $data = array(
                        "page_title" => "Mark Branch",
                        "page_content" => "sys/deliver_finishing",
                        "error" => '<div class="alert alert-danger"><strong>Success!</strong>Sorry No Like This Record </div>');
                    $this->load->view('template/template', $data);
                }
            }
        }
    }

    public function live() {
        $sn = $_GET["q"];

        $detai = $this->Package_model->live_serach($sn);
        foreach ($detai as $de) {

            echo "<div class='fixed-top col-sm-7 text-white ml-5'><a href='" . base_url('package/' . $de->package_sn . '') . "'>" . $de->package_sn . '/' . $de->sender_name . "</a></div></br>";
        }
    }

    ///not for pacage
    public function note_package() {
        if (empty($this->session->red) or empty($this->session->add)) {
            redirect(base_url());
        }

        $data = array(
            "page_title" => "Note Package",
            "page_content" => "sys/note_package",
                //    "error"=>'<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button>  <strong>Success!</strong> Indicates a successful or positive action.</div>'
        );

        if ($this->input->post('barcod_note')) {



            $this->form_validation->set_rules('bar', 'Package Barcode', 'trim|required|xss_clean');
            $this->form_validation->set_rules('note', 'Note', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {

                $data = array(
                    "page_title" => "Note Package",
                    "page_content" => "sys/note_package",
                    "error" => '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button>  <strong>Alert!</strong> Please fill in all required fields .</div>');
                //$this->load->view('template/template', $data); 
            } else {
                $this->db->where('package_sn', $this->input->post('bar'));
                $query = $this->db->get('package_details');
                $count_row = $query->num_rows();
                if ($count_row > 0) {

                    $notdata = array(
                        'package_sn' => $this->input->post('bar'),
                        'note' => $this->input->post('note'),
                        'note_by' => $this->session->emp_no,
                        'note_date' => date('Y-m-d h:i:s a'),
                        'note_branch' => $this->session->branch,
                    );

                    $this->Package_model->note($notdata);
                    $data = array(
                        "page_title" => "Note Package",
                        "page_content" => "sys/note_package",
                        "error" => '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button>  <strong>Success!</strong> Your note ad successfully.</div>');
                    // $this->load->view('template/template', $data);
                } else {

                    $data = array(
                        "page_title" => "Note Package",
                        "page_content" => "sys/note_package",
                        "error" => '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button>  <strong>Alert !</strong> Your note not save.</div>');
                    // $this->load->view('template/template', $data);
                }
            }
        }

        $this->load->view('template/template', $data);
    }

    /// package

    public function package() {

              $package_sn= $this->uri->segment(count($this->uri->segment_array()));
              $this->db->where('package_sn', $package_sn);
                $query = $this->db->get('package_details');
                $count_row = $query->num_rows();
                if ($count_row > 0) {
                    
                    
                    $data = array(
                        "page_title" => "Package Details",
                        "page_content" => "sys/package",
                        "onePackage"=>  $this->Package_model->one_package($package_sn));
                       $this->load->view('template/template', $data);
                    
                }
                else{
                 redirect(base_url('dash'));   
                }
    }

    
    
    /// branchReport
    
    public function branchReport() {
         $data = array(
                        "page_title" => "Report",
                        "page_content" => "sys/branchReport",
                        "onePackage"=> '',
                        "br_list" => $this->Branch_model->branch(),);
         
        
            $this->form_validation->set_rules('branch_cord', 'Branch', 'trim|required|xss_clean');
            $this->form_validation->set_rules('fistDate', 'First Date:', 'trim|required|xss_clean');
            $this->form_validation->set_rules('lastDate', 'Last Date:', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                 $data = array(
                        "page_title" => "Report",
                        "page_content" => "sys/branchReport",
                        "onePackage"=> '',
                        "br_list" => $this->Branch_model->branch(),);
                
            }
            else{
                 $branch_cord= $this->input->post('branch_cord');
                 $fistDate= $this->input->post('fistDate');
                 $lastDate= $this->input->post('lastDate');
                 
                 $data = array(
                        "page_title" => "Report",
                        "page_content" => "sys/branchReport",
                        "resalt"=>  $this->Report_model->branch_resalt($branch_cord,$fistDate,$lastDate),
                        "br_list" => $this->Branch_model->branch(),);
            }
                       
                        $this->load->view('template/template', $data);
        
    }
    
    
    //pendingJob
    
    public function pendingJob() {
         $data = array(
                        "page_title" => "Report",
                        "page_content" => "sys/branchReport",
                        "onePackage"=> '',
                        "br_list" => $this->Branch_model->branch(),);
         
        
            $this->form_validation->set_rules('branch_cord', 'Branch', 'trim|required|xss_clean');
            $this->form_validation->set_rules('fistDate', 'First Date:', 'trim|required|xss_clean');
            $this->form_validation->set_rules('lastDate', 'Last Date:', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                 $data = array(
                        "page_title" => "Report",
                        "page_content" => "sys/branchReport",
                        "onePackage"=> '',
                        "br_list" => $this->Branch_model->branch(),);
                
            }
            else{
                 $branch_cord= $this->input->post('branch_cord');
                 $fistDate= $this->input->post('fistDate');
                 $lastDate= $this->input->post('lastDate');
                 
                 $data = array(
                        "page_title" => "Pending Job",
                        "page_content" => "sys/branchReport",
                        "resalt"=>  $this->Report_model->branch_pending_resalt($branch_cord,$fistDate,$lastDate),
                        "br_list" => $this->Branch_model->branch(),);
            }
                       
                        $this->load->view('template/template', $data);
        
    }
    
    ////
    
    public function branch_status() {
         $data = array(
                        "page_title" => "Status",
                        "page_content" => "sys/branch_status",                      
                        "br_list" => $this->Branch_model->branch(),);
                        $this->load->view('template/template', $data);
        
    }
    
    // log out 
    public function logout() {
        $this->session->sess_destroy($this->session->set_userdata());
        //  $this->session->sess_destroy($this->session->uname); 
        // $this->session->sess_destroy($this->session->branch); 
        redirect(base_url());
    }

}
