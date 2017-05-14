<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subscriber_m extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function subId($uid){
        $this->db->where('user_id',$uid);
        $this->db->select('id');
        $query = $this->db->get('subscriber');
        return $query->row();
    }
    
    
    public function subData($subId){
        $this->db->where('id',$subId);
        $query = $this->db->get('subscriber');
        return $query->row();
    }
    
    public function updateSub($data,$id){
        $this->db->where('id',$id);
        $this->db->update('subscriber',$data);
    }
}