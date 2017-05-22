<?php

class Market_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getMarketName($id){
        $query=$this->db->query("SELECT name FROM `market` WHERE id=".$id);
        return $query->result_array();
    }
    
    public function addMarket($mar) {
        $query = $this->db->insert('market', $mar);

        $query1 = $this->db->query('select id from market where name="' . $mar['name'] . '" LIMIT 1   ');
        return $query1;
    }

    public function getMarket() {
        $query = $this->db->query('select * from market');
        return $query;
    }

    public function getCount() {
        $query = $this->db->query('SELECT market_id, COUNT(*) FROM symbol GROUP BY market_id');
        return $query;
    }

    public function trendingMarket() {
        $q = 'SELECT id,name FROM `market` WHERE id=(SELECT market_id FROM symbol GROUP BY market_id ORDER BY COUNT(*) DESC LIMIT 1)';
        $query = $this->db->query($q);
        return $query->result_array();
    }

    public function countAllMarkets() {
        $this->db->from('market');
        return $this->db->count_all_results();
    }

    public function removeMarket($id) {
        $query = $this->db->delete('market', array('id' => $id));
        return $query;
    }

    public function countPrice(){
        $query=$this->db->query("SELECT market_id,SUM(price_quote) as price FROM `symbol` GROUP BY market_id");
        return $query;
    }
}
