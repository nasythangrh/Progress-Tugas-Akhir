<?php 
class Model_donatur extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
        $query= "SELECT * FROM donatur";
        return $this->db->get('donatur');
    }

    function tampil_kampanye(){

        return $this->db->get('kampanye');
    }

    function tampil_pengguna(){ //level donatur

        return $this->db->get('pengguna');
    }

    function tampil_bank(){

        return $this->db->get('bank');
    }
  
    function post($data){
        $this->db->insert('donatur',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_donatur'=>$id);
        return $this->db->get_where('donatur',$param);
    }
    function getByTgl($id,$tanggal,$pengguna)
    {

        $this->db->select('*');
        $this->db->from('donatur');
        $this->db->where('id_kampanye',$id);
        $this->db->where('jam',$tanggal);
        $this->db->where('id_pengguna',$pengguna);
        $query = $this->db->get();
        return $query;
    }

    function edit($data,$id)
    {
        $this->db->where('id_donatur',$id);
        $this->db->update('donatur',$data);
    }
    function delete($id)
    {
        $this->db->where('id_donatur',$id);
        $this->db->delete('donatur');
    }
    function listDonatur($id_kampanye){
        $this->db->select('*');
        $this->db->from('donatur');
        $this->db->where('id_kampanye',$id_kampanye);
        $this->db->where('status_donasi',"Diterima");
        $this->db->order_by("id_donatur", "desc");
        $query = $this->db->get();
        return $query;
    }
    function konfirmasiDonatur($id){
        $this->db->select('*');
        $this->db->from('donatur');
        $this->db->join('kampanye','donatur.id_kampanye = kampanye.id_kampanye');
        $this->db->where('id_pengguna',$id);
        $this->db->where('status_donasi',"Menunggu");
        $query = $this->db->get();
        return $query;
    }
    function disposisi($data,$id){
        $this->db->where('id_donatur',$id);
        $this->db->update('donatur',$data);
    }


}



 ?>