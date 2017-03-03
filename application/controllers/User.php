<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('market_m');
        $this->load->model('symbol_m');
    }

//    Login Page View 
    public function index() {

        if ($this->session->has_userdata('uname')) {
            if ($_SESSION['type'] === 'SUBSCRIBER' || $_SESSION['type'] === 'STAFF') {
                redirect(base_url() . NAV_HOME);
            } else {
                redirect(base_url() . NAV_USERS);
            }
        }
        $this->load->view('Login/login_v');
    }

//    Validate User and Nevigate user to appropriate Webpage
    public function validate_user() {
        $data = array(
            'uname' => $this->input->post('uname'),
            'pass' => $this->input->post('password')
        );
        $result = $this->user_m->user_details($data);
        if (isset($result)) {
            $ses = json_decode(json_encode($result), True);
            $this->session->set_userdata($ses);
            if ($ses['type'] == 'ADMIN') {
                redirect(base_url() . NAV_USERS);
            } else if ($ses['type'] == 'SUBSCRIBER') {
                redirect(base_url() . NAV_HOME);
            } else if ($ses['type'] == 'STAFF') {
                redirect(base_url() . NAV_HOME);
            }
        } else {
            redirect(base_url());
        }
    }

    public function logout() {
//        $ses=array(
//            'id','uname','password','email','cotactNo','type','status','is_deleted'
//        );
//        $this->session->unset_userdata($ses);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function profile() {
        if (isset($_SESSION['type'])) {
            $data = array(
                'title' => 'Profile',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount()
            );
//
            if ($_SESSION['type'] == 'ADMIN') {
                $this->load->view('Admin/admin_header', $data);
                $this->load->view('Admin/admin_sidebar');
                $this->load->view('User/sub_profile_v');
            } else if ($_SESSION['type'] == 'SUBSCRIBER') {
                $this->load->view('Default/header_v', $data);
                $this->load->view('Default/sidebar_v');
                $this->load->view('User/sub_profile_v');
            }
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function upload_picture(){
        if (isset($_SESSION['type'])) {
            $data = array(
                'title' => 'Profile',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount()
            );
//
            if ($_SESSION['type'] == 'ADMIN') {
                $this->load->view('Admin/admin_header', $data);
                $this->load->view('Admin/admin_sidebar');
                $this->load->view('User/uploader');
            } else if ($_SESSION['type'] == 'SUBSCRIBER') {
                $this->load->view('Default/header_v', $data);
                $this->load->view('Default/sidebar_v');
                $this->load->view('User/uploader');
            }
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function Register() {


        $data = array(
            'uname' => $this->input->post('name'),
            'password' => $this->input->post('pass'),
            'email' => $this->input->post('email'),
            'contactNo' => $this->input->post('mob'),
            'type' => 'SUBSCRIBER',
            'status' => 'ACTIVE',
            'is_deleted' => 0
        );

        $res = $this->user_m->addUser($data);
        if ($res) {
            $data = array(
                'uname' => $this->input->post('name'),
                'pass' => $this->input->post('pass')
            );
            $result = $this->user_m->user_details($data);
            if (isset($result)) {
                $ses = json_decode(json_encode($result), True);
                $this->session->set_userdata($ses);
                redirect(base_url() . NAV_PLAN);
            }
        } else {
            redirect(base_url() . NAV_LOGIN);
        }
    }

    public function addStaff() {
        $data = array(
            'uname' => $this->input->post('name'),
            'password' => $this->input->post('pass'),
            'type' => 'STAFF'
        );
        $res = $this->user_m->addUser($data);
        print_r($res);
        redirect(base_url() . NAV_ADMIN);
    }

}
