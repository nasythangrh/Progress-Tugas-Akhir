<?php
class Kategori extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_kategori');
        //chek_session();
    }

    function index(){
        
        $data['record'] = $this->model_kategori->tampil_data();
        $this->template->load('template','kategori/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
        	$id  	 = $this->input->post('id_kategori');
            $nama_kategori    = $this->input->post('nama_kategori');
   
            $data           = array('id_kategori'=>$id,
            						'nama_kategori'=>$nama_kategori
            );
            $this->model_kategori->post($data);
            redirect('kategori');
        }
        else{
            echo "Data Gagal";
        }	
    }

    function edit()
    {
       if(isset($_POST['submit'])){
               
            $id      = $this->input->post('id_kategori');
            $nama_kategori    = $this->input->post('nama_kategori');
   
            $data           = array('id_kategori'=>$id,
                                    'nama_kategori'=>$nama_kategori
            );
            $this->model_kategori->edit($data,$id);
            redirect('kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            //$this->load->model('model_kategori');
            $data['record']     =  $this->model_kategori->get_one($id)->row_array();
            $this->template->load('template','kategori/update_data',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_kategori->delete($id);
        redirect('kategori');
    }




}

  ?>
