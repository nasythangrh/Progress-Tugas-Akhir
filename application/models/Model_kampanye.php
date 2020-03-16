<?php 
class Model_kampanye extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
        $query= "SELECT * FROM kampanye";
        return $this->db->query($query);
    }
    function tampil_kategori(){
        
        return $this->db->get('kategori');
    }
    function post($data){
        $this->db->insert('kampanye',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_kampanye'=>$id);
        return $this->db->get_where('kampanye',$param);
    }
    function getByKategori($id)
    {
        $param  =   array('id_kategori'=>$id);
        return $this->db->get_where('kampanye',$param);
    }

    function edit($data,$id)
    {

        $this->db->where('id_kampanye',$id);
        $this->db->update('kampanye',$data);
    }
    function delete($id)
    {
        $this->db->where('id_kampanye',$id);
        $this->db->delete('kampanye');
    }


}



 ?>