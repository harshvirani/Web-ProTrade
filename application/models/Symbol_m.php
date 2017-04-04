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

    public function getSymbolDetail($code) {
        $this->db->where('code', $code);
        $query = $this->db->get('symbol');
        return $query;
    }
    
    public function updateSymbol($data){
        $this->db->where('code',$data['code']);
        $result=$this->db->update('symbol',$data);
        return $result;
    }
    
    public function updateMinMax($data,$id){
        $this->db->where('id',$id);
        $result=$this->db->update('symbol',$data);
        return $result;
    }

}
