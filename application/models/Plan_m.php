<?php


class Plan_m extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function all_markets(){
        $query=$this->db->query('select * from market;');
        return $query;
    }
    
     public function all_symbols(){
        $query=$this->db->query('select * from symbol;');
        return $query;
    }
    public function all_plans(){
        $query=$this->db->query('select * from plan;');
        return $query;
    }
    
    public function insertSubscription(){
        
    }
}