<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('plan_m');
    }

    public function index() {
        $this->session->userdata();
//        if($this->session->has_userdata('type')==='SUBSCRIBER'){
        if (isset($_SESSION['uname'])) {
            $data = array(
                'title' => 'PRO-TRADE'
            );
            $data['symbols']=$this->plan_m->all_symbols();
            if ($_SESSION['type'] == 'SUBSCRIBER') {
                $this->load->view('Default/header_v', $data);
                $this->load->view('Default/sidebar_v');
                $this->load->view('Default/dashboard_v');
                $this->load->view('Default/footer_v');
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function error(){
        show_404();
    }
}
