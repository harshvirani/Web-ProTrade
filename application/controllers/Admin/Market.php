<?php

class Market extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('market_m');
        $this->load->model('symbol_m');
    }

    public function MarketView($mid) {
        if ($_SESSION['type'] == 'ADMIN') {
            $data = array(
                'title' => 'Market',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount()
            );
            $data['market_id'] = $mid;
            $data['symbols'] = $this->symbol_m->getSymbol($data['market_id']);

            $this->load->view('Admin/admin_header', $data);
            $this->load->view('Admin/market_header_nav');
            $this->load->view('Admin/admin_sidebar');
            $this->load->view('Admin/admin_market_v');
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function addMarket() {
        $mar = array(
            'name' => $this->input->post('name')
        );
        $res = $this->market_m->addMarket($mar);
       
//        print_r($res->result_array());die;
        print_r($res);
        foreach($res->result_array() as $rs){
        echo $res['id'];
        }
        die;
        redirect(base_url().NAV_MARKETS.$res['id']);
    }

    public function addSymbol() {
        $mar = array(
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
            'market_id' => $this->input->post('marketId'),
            'price_quote' => $this->input->post('price')
        );
        $res = $this->symbol_m->addSymbol($mar);
        redirect(base_url() . NAV_MARKETS);
    }

    public function removeSymbol($sid, $mid) {
        $res = $this->symbol_m->removeSymbol($sid);
        redirect(base_url() . NAV_MARKETS . '?mid=' . $mid);
    }

}
