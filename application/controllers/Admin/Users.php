<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller {

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
            $data['users'] = $this->user_m->all_user();

            $this->load->view('Admin/admin_header', $data);
//            $this->load->view('Admin/admin_header_nav');
            $this->load->view('Admin/admin_sidebar');
            $this->load->view('Admin/admin_user_v');
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function removeUser($uid) {
        $res = $this->user_m->removeUser($uid);
        redirect(base_url() . NAV_USERS);
    }

}
