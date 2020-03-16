<?php
class Model_operator extends CI_Model{



    function login($no_hp,$password)
    {
        $cek=  array('no_hp'=>$no_hp,'pass'=>md5($password));
        return $this->db->get_where('pengguna',$cek);
        
    } 

    function tampildata()
    {
        return $this->db->get('user');
    }

    function get_one($id)
    {
        $param  =   array('no_hp'=>$id);
        return $this->db->get_where('operator',$param);
    }
}
