<?php 
class Model_kategori extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
        return $this->db->get('kategori');
    }
  
    function post($data){
        $this->db->insert('kategori',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_kategori'=>$id);
        return $this->db->get_where('kategori',$param);
    }

    function edit($data,$id)
    {

        $this->db->where('id_kategori',$id);
        $this->db->update('kategori',$data);
    }
    function delete($id)
    {
        $this->db->where('id_kategori',$id);
        $this->db->delete('kategori');
    }


}



 ?>