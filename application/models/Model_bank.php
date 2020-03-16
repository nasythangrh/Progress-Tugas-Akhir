<?php 
class Model_bank extends CI_Model{
	function __construct(){
      parent::__construct();
        $this->load->database();
    }

    function tampil_data(){
        return $this->db->get('bank');
    }
  
    function post($data){
        $this->db->insert('bank',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_bank'=>$id);
        return $this->db->get_where('bank',$param);
    }

    function edit($data,$id)
    {

        $this->db->where('id_bank',$id);
        $this->db->update('bank',$data);
    }
    function delete($id)
    {
        $this->db->where('id_bank',$id);
        $this->db->delete('bank');
    }


}



 ?>