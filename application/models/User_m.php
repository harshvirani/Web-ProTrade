<?php

class User_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function user_details($data) {
        $this->db->where('uname', $data['uname']);
        $this->db->where('password', $data['pass']);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function user_data($type) {
        $query = $this->db->query('select * from user where type="' . $type . '";');
        return $query;
    }

    public function removeUser($uid) {
//        $data = array('is_deleted' => '1');
//        $this->db->where('id', $uid);
//        $res = $this->db->update('user', $data);

        $query = $this->db->delete('user', array('id' => $uid));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        return $query;
    }

    public function all_user() {
        $query = $this->db->query('select * from user;');
        return $query;
    }

    public function addUser($data) {
        $res = $this->db->insert('user', $data);
        return $res;
    }

    public function count($type) {
        $this->db->where('type', $type);
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function blockUser($id) {
        $data = array('status' => 'BLOCKED');
        $this->db->where('id', $id);
        $res = $this->db->update('user', $data);
        return $res;
    }

    public function unblockUser($id) {
        $data = array('status' => 'ACTIVE');
        $this->db->where('id', $id);
        $res = $this->db->update('user', $data);
        return $res;
    }

}
