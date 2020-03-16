<?php
class Bank extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_bank');

    }

    function index(){
        
        $data['record'] = $this->model_bank->tampil_data();
        $this->template->load('template','bank/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
        	$id  	 = $this->input->post('id_bank');
            $nama_bank    = $this->input->post('nama_bank');
            $nama_rekening = $this->input->post('nama_rek');
            $no_rekening = $this->input->post('no_rek');
    
            $data           = array('id_bank'=>$id,
                                    'nama_bank'=>$nama_bank,
                                    'nama_rek'=>$nama_rekening,
                                    'no_rek'=>$no_rekening
                                    );
            $this->model_bank->post($data);
            redirect('bank');
        }
        else{
            echo "Data Gagal";
        }	
    }
   


    function edit()
    {
        if(isset($_POST['submit'])){
            $id=  $this->uri->segment(3);
            $nama_bank    = $this->input->post('nama_bank');
            $nama_rekening = $this->input->post('nama_rek');
            $no_rekening = $this->input->post('no_rek');

            $data           = array('id_bank'=>$id,
                                    'nama_bank'=>$nama_bank,
                                    'nama_rek'=>$nama_rekening,
                                    'no_rek'=>$no_rekening
                                    );
            $this->model_bank->edit($data,$id);
            redirect('bank');
        } else{
            $id=  $this->uri->segment(3);

            $data['record']     =  $this->model_bank->get_one($id)->row_array();
            $this->template->load('template','bank/update_data',$data);
        }
    }

    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_bank->delete($id);
        redirect('bank');
    }




}

  ?>
