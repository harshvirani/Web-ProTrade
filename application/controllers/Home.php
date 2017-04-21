<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('symbol_m');
        $this->load->model('subscriber_m'); 
        $this->load->model('user_m');
    }

    public function index() {
        $this->session->userdata();
//        if($this->session->has_userdata('type')==='SUBSCRIBER'){
        if (isset($_SESSION['uname'])) {
            $data = array(
                'title' => 'PRO-TRADE'
            );
            
            if ($_SESSION['type'] == 'SUBSCRIBER') {
                
                $id= $this->subscriber_m->subId($_SESSION['id']);
                $_SESSION['subscriber_id']=$id->id;
                $data['symbols']=$this->symbol_m->getSymbolbySId($_SESSION['subscriber_id']);
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
