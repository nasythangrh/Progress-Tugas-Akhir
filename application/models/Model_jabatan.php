<?php 
class Model_jabatan extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
        return $this->db->get('tb_jabatan');
    }
  
    function post($data){
        $this->db->insert('tb_jabatan',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_jabatan'=>$id);
        return $this->db->get_where('tb_jabatan',$param);
    }

    function edit($data,$id)
    {

        $this->db->where('id_jabatan',$id);
        $this->db->update('tb_jabatan',$data);
    }
    function delete($id)
    {
        $this->db->where('id_jabatan',$id);
        $this->db->delete('tb_jabatan');
    }


}



 ?>