<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subscription_m extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function addSubscription($data){
        $query=$this->db->insert('subscription',$data);
        $insert_id = $this->db->insert_id();
//        $this->db->select('id');
//        $query1 = $this->db->get_where('subscription',$data);
        return $insert_id;
    }
    public function addSubSymbol($sym,$subId) {
        $query="INSERT INTO `subscriptionsymbol` (`id`, `subscription_id`, `symbol_id`) VALUES (NULL, '".(int)$subId."', '".(int)$sym."')";
//        $query = $this->db->insert('subscriptionsymbol', array("subscription_id"=>(int)$subId,"symbol_id"=>(int)$sym));
        $this->db->query($query);
        return $query;
    }
}