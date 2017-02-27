<?php
//    Susbcribption Module Controller
class Plan extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('plan_m');
    }

//    View Subscription module
    public function index() {
        $this->session->userdata();
        if($_SESSION['type']=='SUBSCRIBER'){
            $data=array(
                'title' =>  'Subscription'
            );
            $data['markets']=$this->plan_m->all_markets();
            $data['symbols']=$this->plan_m->all_symbols();
            $data['plans']=$this->plan_m->all_plans();
            $this->load->view('Default/header_v',$data);
            $this->load->view('Default/sidebar_v');
            $this->load->view('Subscription/subscription_v');
            $this->load->view('Default/footer_v');
        }
        else{
            redirect(base_url());
        }
    }
}