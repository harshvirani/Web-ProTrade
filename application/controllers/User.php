<?php

error_reporting(E_ERROR | E_PARSE);

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('subscriber_m');
        $this->load->model('market_m');
        $this->load->model('symbol_m');
    }

//    Login Page View 
    public function login($data = "") {
        if ($this->session->has_userdata('uname')) {
            if ($_SESSION['status'] == 'BLOCKED') {
                $this->session->sess_destroy();
            } else if ($_SESSION['type'] === 'SUBSCRIBER' || $_SESSION['type'] === 'STAFF') {
                redirect(base_url() . NAV_HOME);
            } else {
                redirect(base_url() . NAV_DASHBOARD);
            }
        }
        $this->load->view('Login/login_v', $data);
    }

//    Validate User and Nevigate user to appropriate Webpage
    public function validateUser() {
        $data = array('uname' => $this->input->post('uname'), 'pass' => $this->input->post('password'));
        $result = $this->user_m->user_details($data);
        if (isset($result)) {
            $this->validate_details($result, $data);
            $this->redirect_user();
        } else {
            $data["error"] = "Username or Password is Wrong.";
            $this->login($data);
//            $this->load->view('Login/login_v', $data);
        }
    }

    public function redirect_user() {
        if ($_SESSION['status'] == 'BLOCKED') {
            $this->session->sess_destroy();
            $data["error"] = "This User is Blocked";
            $this->login($data);
        } else {
            if ($_SESSION['type'] == 'ADMIN') {
                redirect(base_url() . NAV_DASHBOARD);
            } else if ($_SESSION['type'] == 'SUBSCRIBER') {
                redirect(base_url() . NAV_HOME);
            } else if ($_SESSION['type'] == 'STAFF') {
                redirect(base_url() . NAV_HOME);
            }
        }
    }

    public function validate_details($result, $data) {
        if ($result->uname == $data['uname'] && $result->password == $data['pass']) {
            $ses = json_decode(json_encode($result), True);
            $this->session->set_userdata($ses);
            $this->redirect_user();
        } else {
            redirect(base_url());
        }
    }

    public function forgetPassword($data = "") {

        $this->load->view('Login/forget_v', $data);
    }

    public function resetPassword() {
        $email = $this->input->post('email');
        $res = $this->user_m->checkEmail($email);
        if ($res == TRUE) {
            $data = array(
                'email' => $email,
                'pass' => $this->randomPassword(12)
            );
            $this->user_m->resetPass($data);
            $this->sendMail($data);
            $this->login();
        } else {
            $data['error'] = 'Invalid Email Address';
            $this->forgetPassword($data);
        }
    }

    public function sendMail($data) {
        $this->load->library('email');
        $this->email->from('ProTrade', 'ProTrade');
        $this->email->to($data['email']);
        $this->email->subject('Reset Password');
        $this->email->message('Your New Password for your Email:' . $data['email'] . 'New Password:' . $data['pass']);
        $this->email->send();
    }

    public function randomPassword($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function updateProfile() {
        $data = array(
            'name' => $_POST["name"],
            'contactNo' => $_POST["contactNo"],
            'email' => $_POST["email"]
        );
        $this->subscriber_m->updateSub($data, $_SESSION['subscriber_id']);
        unset($data["name"]);
        $this->user_m->updateUser($data,$_SESSION["id"]);
        redirect(base_url() . "profile");
    }

    public function profile() {
        if (isset($_SESSION['type'])) {
            $data = array(
                'title' => 'Profile',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount(),
               
            );
//  
//            $my=$this->user_m->user_profile($_SESSION["id"]);
//            echo 'Hi';
//            print_r($my);die;
            if ($_SESSION['type'] == 'ADMIN') {
                $this->load->view('Admin/admin_header', $data);
                $this->load->view('Admin/admin_sidebar');
                $this->load->view('User/sub_profile_v');
            } else if ($_SESSION['type'] == 'SUBSCRIBER') {
                $data['profile'] = $this->subscriber_m->subData($_SESSION['subscriber_id']);
                $this->load->view('Default/header_v', $data);
                $this->load->view('Default/sidebar_v');
                $this->load->view('User/sub_profile_v');
            }else if($_SESSION['type'] == 'STAFF'){
                $this->load->view('Default/header_v', $data);
                $this->load->view('Default/sidebar_v');
                $this->load->view('User/sub_profile_v');
            }
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function upload_picture() {
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
            }else if ($_SESSION['type'] == 'STAFF') {
                $this->load->view('Default/header_v', $data);
                $this->load->view('Default/sidebar_v');
                $this->load->view('User/uploader');
            }
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function save_image() {
        $data = $_POST["image-data"];
        $fname = $_SESSION["id"] . 'profile.png';
        echo $fname;
// echo $encodedString;
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $dir = 'upload_pic/' . $fname;
        echo $dir;
        file_put_contents($dir, $data);
//        die;
        redirect(base_url() . NAV_PROFILE);
    }

    public function Register() {

        $data = array(
            'uname' => $this->input->post('uname'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'contactNo' => $this->input->post('mobileno'),
            'type' => 'SUBSCRIBER',
            'status' => 'ACTIVE',
            'is_deleted' => 0,
            'profile' => $_SESSION["id"] . 'profile.png'
        );
        $res = $this->user_m->addUser($data);
        if ($res) {
            $data = array(
                'uname' => $this->input->post('uname'),
                'pass' => $this->input->post('password')
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

    public function registerView() {
        if ($this->session->has_userdata('uname')) {
            if ($_SESSION['status'] == 'BLOCKED') {
                $this->session->sess_destroy();
            } else if ($_SESSION['type'] === 'SUBSCRIBER' || $_SESSION['type'] === 'STAFF') {
                redirect(base_url() . NAV_HOME);
            } else {
                redirect(base_url() . NAV_DASHBOARD);
            }
        }
        $this->load->view('Login/register_v', $data);
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
