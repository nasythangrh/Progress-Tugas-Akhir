<?php 
class Model_perkembangan extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
        $query= "SELECT * FROM perkembangan";
        return $this->db->query($query);
    }
    function tampil_kampanye(){
        
        return $this->db->get('kampanye');
    }
    function post($data){
        $this->db->insert('perkembangan',$data);
    }
    function get_one($id)
    {
        $param  =   array('id_perkembangan'=>$id);
        return $this->db->get_where('perkembangan',$param);
    }
    function edit($data,$id)
    {
        $this->db->where('id_perkembangan',$id);
        $this->db->update('perkembangan',$data);
    }
    function delete($id)
    {
        $this->db->where('id_perkembangan',$id);
        $this->db->delete('perkembangan');
    }
    function get_one_kembang($id_kampanye){
        $this->db->select('*');
        $this->db->from('perkembangan');
        $this->db->where('id_kampanye',$id_kampanye);
        $this->db->order_by('id_perkembangan','DESC');
        return $this->db->get();
    }


}



 ?>