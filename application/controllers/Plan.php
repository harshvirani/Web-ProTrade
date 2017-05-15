<?php

//    Susbcribption Module Controller
class Plan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('plan_m');
        $this->load->model('symbol_m');
        $this->load->model('market_m');
        $this->load->model('subscription_m');
    }

//    View Subscription module
    public function index() {
        $this->session->userdata();
        if ($_SESSION['type'] == 'SUBSCRIBER') {
            $data = array(
                'title' => 'Subscription'
            );
            $data['markets'] = $this->plan_m->all_markets();
            $data['symbols'] = $this->plan_m->all_symbols();
            $data['plans'] = $this->plan_m->all_plans();
            $this->load->view('Default/header_v', $data);
            $this->load->view('Default/sidebar_v');
            $this->load->view('Subscription/subscription_v');
            $this->load->view('Default/footer_v');
        } else {
            redirect(base_url());
        }
    }

    public function insertPlan() {
        $data = json_decode($_POST['json']);
        $subscription = array(
            "subscriber_id" => $_SESSION["subscriber_id"],
            "plan_id" => $data->PLAN,
        );
        if ($data->TYPE == "MARKET SPECIFIC") {
            $subscription["is_script_specific"] = 0;
            $subscription["is_market_specific"] = 1;
            $id = $this->subscription_m->addSubscription($subscription);
            $this->insertSubSymbolByMarket($data->SELECTION,$id);
        } else {
            $subscription["is_script_specific"] = 1;
            $subscription["is_market_specific"] = 0;
            $id = $this->subscription_m->addSubscription($subscription);
            $this->insertSubSymbol($data->SELECTION, $id);
        }
//        echo $id->id;
    }

    public function insertSubSymbolByMarket($mar,$subId) {
        for ($i = 0; $i < sizeof($mar); $i++) {
            $sym=$this->symbol_m->getSymbolbyMId(substr($mar[$i],3));
            foreach ($sym->result_array() as $symbol) {
                $this->subscription_m->addSubSymbol($symbol['id'], $subId);
            }
        }
        
    }

    public function insertSubSymbol($sym,$subId) {
        for ($i = 0; $i < sizeof($sym); $i++) {
            $this->subscription_m->addSubSymbol($sym[$i], $subId);
        }
    }

}
