<?php

class Market extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('market_m');
        $this->load->model('symbol_m');
        $this->load->model('user_m');
    }

    public function MarketView($mid) {
        if ($_SESSION['type'] == 'ADMIN') {
            $data = array(
                'title' => 'Market',
                'markets' => $this->market_m->getMarket(),
                'count' => $this->market_m->getCount(),
                'sub_cnt' => $this->user_m->count('SUBSCRIBER'),
                'staff_cnt' => $this->user_m->count('STAFF')
            );
            $data['market_id'] = $mid;
            $data["market_name"]=$this->market_m->getMarketName($mid);
            $data['symbols'] = $this->symbol_m->getSymbol($data['market_id']);

            $this->load->view('Admin/admin_header', $data);
//            $this->load->view('Admin/market_header_nav');
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
        foreach ($res->result_array() as $res) {
            echo $res['id'];
        }

        redirect(base_url() . NAV_MARKETS . $res['id']);
    }

    public function removeMarket($mid) {
        $res = $this->market_m->removeMarket($mid);
        redirect(base_url());
    }

    public function importCSV($mid) {
        echo $filename = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($filename, "r");
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $sym = array(
                    'market_id' => $mid,
                    'code' => $emapData[0],
                    'name' => $emapData[1],
                    'category' => $emapData[2],
                    'lot_size' => $emapData[3],
                    'tick_size' => $emapData[4],
                    'margin' => $emapData[5],
                    'price_quote' => $emapData[6]
                );
                $query = $this->symbol_m->getSymbolDetail($sym['code']);
                if ($query->num_rows() > 0) {
                    $res= $this->symbol_m->updateSymbol($sym);
                } else {
                    $res = $this->symbol_m->addSymbol($sym);
                }
                print_r($res);
            }
            fclose($file);
        }
        redirect(base_url() . NAV_MARKETS . $mid);
    }

    public function addSymbol() {
        $mar = array(
            'name' => $this->input->post('name'),
            'code' => $this->input->post('code'),
            'market_id' => $this->input->post('marketId'),
            'price_quote' => $this->input->post('price')
        );
        $res = $this->symbol_m->addSymbol($mar);
        redirect(base_url() . NAV_MARKETS . $mar['market_id']);
    }

    public function getSymbolDetail() {
        $this->symbol_m->getSymbolDetail($code);
    }

    public function removeSymbol($sid, $mid) {
        $res = $this->symbol_m->removeSymbol($sid);
        redirect(base_url() . NAV_MARKETS . $mid);
    }

}
