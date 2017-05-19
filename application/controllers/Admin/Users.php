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

    public function view($type) {
        if ($_SESSION['type'] == 'ADMIN') {
            $data = array(
                'title' => 'Users',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount(),
                'sub_cnt'=>$this->user_m->count('SUBSCRIBER'),
                'staff_cnt'=>$this->user_m->count('STAFF')
            );
            $data['users'] = $this->user_m->user_data($type);
            
            $this->load->view('Admin/admin_header', $data);
//            $this->load->view('Admin/admin_header_nav');
            $this->load->view('Admin/admin_sidebar');
            $this->load->view('Admin/admin_user_v');
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }
    
    
    public function blockUser($uid,$type){
        $res = $this->user_m->blockUser($uid);
        redirect(base_url() . NAV_USERS.$type);
    }
    
    public function unblockUser($uid,$type){
        $res = $this->user_m->unblockUser($uid);
        redirect(base_url() . NAV_USERS.$type);
    }
    
    public function removeUser($uid,$type) {
        $res = $this->user_m->removeUser($uid);
        redirect(base_url() . NAV_USERS.$type);
    }

}