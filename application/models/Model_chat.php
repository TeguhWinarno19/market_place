<?php

class Model_chat extends CI_Model{
    public function chat_list($id){
        $this->db->select('*');
        $this->db->from('chat_list');
        $this->db->where('chat_list.id_user', $id);
        $this->db->order_by('chat_list.id_chat','DESC');
        return $this->db->get();
    }
    public function toko($id){
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->join('kota','kota.id_kota = toko.id_kota');
        $this->db->where('toko.id_toko', $id);
        $this->db->order_by('toko.id_toko','DESC');
        return $this->db->get();
    }

    public function get_chat_list($id)
    {
        $this->db->select('c.id_user, c.id_toko, c.pesan, c.id_chat, c.dilihat as last_chat');
        $this->db->from('chat_list c');
        $this->db->join('(SELECT id_user, id_toko, MAX(id_chat) as max_chat
                        FROM chat_list 
                        GROUP BY id_user, id_toko) as last_chat', 
                        'last_chat.id_user = c.id_user 
                        AND last_chat.id_toko = c.id_toko 
                        AND last_chat.max_chat = c.id_chat', 
                        'inner');
        $this->db->where('c.id_user', $id);
        $this->db->order_by('c.id_chat', 'DESC');
        return $this->db->get()->result();
    }
    public function get_chat_list1($id)
    {
        $this->db->select('c.id_user, c.id_toko, c.pesan, c.id_chat, c.dilihat as last_chat');
        $this->db->from('chat_list c');
        $this->db->join('(SELECT id_user, id_toko, MAX(id_chat) as max_chat
                        FROM chat_list 
                        GROUP BY id_user, id_toko) as last_chat', 
                        'last_chat.id_user = c.id_user 
                        AND last_chat.id_toko = c.id_toko 
                        AND last_chat.max_chat = c.id_chat', 
                        'inner');
        $this->db->where('c.id_toko', $id);
        $this->db->order_by('c.id_chat', 'DESC');
        return $this->db->get()->result();
    }

 
     // Mengambil semua chat antara id_user dan id_toko
    public function get_chat_detail($id_user, $id_toko)
     {
        $this->db->select('*');
        $this->db->from('chat_list');
        $this->db->where('chat_list.id_user', $id_user);
        $this->db->where('chat_list.id_toko', $id_toko);
        $this->db->order_by('id_chat', 'ASC');
        return $this->db->get()->result();
     }
     public function update_seen1($where1, $where2, $where3, $data,$table)
     {
         $this->db->where('chat_list.id_user',$where1);
         $this->db->where('chat_list.id_toko',$where2);
         $this->db->where('chat_list.sender',$where3);
         $this->db->update($table,$data);
     }
     public function notif($where1)
     {
        $this->db->select('*');
        $this->db->from('chat_list');
        $this->db->where('chat_list.id_toko',$where1);
        $this->db->where('chat_list.sender != ',$where1);
        $this->db->where('chat_list.dilihat', '0');
        return $this->db->get();
     }
     public function notif2($where1)
     {
        $this->db->select('*');
        $this->db->from('chat_list');
        $this->db->where('chat_list.id_user',$where1);
        $this->db->where('chat_list.sender != ',$where1);
        $this->db->where('chat_list.dilihat', '0');
        return $this->db->get();
     }
}