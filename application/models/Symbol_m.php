<?php

class Symbol_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addSymbol($sym) {
        $query = $this->db->insert('symbol', $sym);
        return $query;
    }

    public function removeSymbol($id) {
        $query = $this->db->delete('symbol', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        return $query;
    }

    public function getSymbol($sid) {
        $query = $this->db->query('select * from symbol where market_id=' . $sid);
        return $query;
    }

    public function getSymbolbySId($sid) {
        $query = $this->db->query('SELECT * FROM symbol WHERE id IN ( SELECT symbol_id FROM subscriptionsymbol WHERE subscription_id IN (SELECT id FROM subscription WHERE subscriber_id=' . $sid . '))');
        return $query;
    }

    public function getSymbolbyMId($mid) {
        $query = $this->db->query('SELECT id FROM `symbol` WHERE market_id=' . (int) $mid);
        return $query;
    }

    public function allSymbols() {
        $query = $this->db->query('select * from symbol;');
        return $query;
    }

    public function trendingSymbol(){
        $q='SELECT code FROM `symbol` WHERE id=(SELECT symbol_id FROM subscriptionsymbol GROUP BY symbol_id ORDER BY COUNT(*) DESC LIMIT 1)';
        $query = $this->db->query($q);
        return $query->result_array();
    }

    
    public function countAllSymbols() {
        $this->db->from('symbol');
        return $this->db->count_all_results();
    }

    public function getSymbolDetail($code) {
        $this->db->where('code', $code);
        $query = $this->db->get('symbol');
        return $query;
    }

    public function updateSymbol($data) {
        $this->db->where('code', $data['code']);
        $result = $this->db->update('symbol', $data);
        return $result;
    }

    public function updateMinMax($data, $id) {
        $this->db->where('id', $id);
        $result = $this->db->update('symbol', $data);
        return $result;
    }

    public function insertSubSymbol() {
        
    }

}
