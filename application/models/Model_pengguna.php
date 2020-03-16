<?php 
class Model_pengguna extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
//        $this->db->select('*');
//        $this->db->from('pengguna');
////        $this->db->where('id_pengguna',$id_pengguna);
////        $this->db->where('level', "Admin", "Donatur");
//        $this->db->order_by("level", "asc");
//        $query = $this->db->get();
//        return $query;
        return $this->db->get('pengguna');

    }
  
    function post($data){
        $this->db->insert('pengguna',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_pengguna'=>$id);
        return $this->db->get_where('pengguna',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->update('pengguna',$data);
    }
    function delete($id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->delete('pengguna');
    }


}



 ?>