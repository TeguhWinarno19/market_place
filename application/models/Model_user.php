<?php

class Model_user extends CI_Model{
    public function tampil_data(){
        return $this->db->get('user');
    }
    public function get_user_by_id($id_user) {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }
    public function edit_user($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    Public function detail_user($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query;
    }
}