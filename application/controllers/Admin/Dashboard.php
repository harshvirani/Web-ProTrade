<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('market_m');
    }

    public function index() {
        $data = array(
            'title' => 'Market',
            'markets' => $this->market_m->getMarket(),
            'count' => $this->market_m->getCount()
        );
    }

}
