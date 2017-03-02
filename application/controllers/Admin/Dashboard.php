<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('market_m');
    }

    public function index() {
        if ($_SESSION['type'] == 'ADMIN') {
            $data = array(
                'title' => 'Users',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount()
            );
            

            $this->load->view('Admin/admin_header', $data);
           
            $this->load->view('Admin/admin_sidebar');
            $this->load->view('Admin/admin_dashboard');
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

}
