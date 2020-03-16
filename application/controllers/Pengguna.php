<?php
class Pengguna extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_pengguna');
    }

    function index(){
        $data['record'] = $this->model_pengguna->tampil_data();
        $this->template->load('template','pengguna/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
        	$id  	 = $this->input->post('id_pengguna');
            $nama    = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            $no_hp    = $this->input->post('no_hp');
            $level = $this->input->post('level');
                $data = array('id_pengguna' => $id,
                    'nama' => $nama,
                    'email' => $email,
                    'pass' => $password,
                    'no_hp' => $no_hp,
                    'level' => $level
                );
                $this->model_pengguna->post($data);
                redirect('pengguna');

        } else{
            echo "Data Gagal";
        }
    }

    function edit()
    {
        if(isset($_POST['submit'])){
            $id=  $this->uri->segment(3);
            $nama    = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            $no_hp    = $this->input->post('no_hp');
            $level = $this->input->post('level');
            $config['upload_path'] = './assets/images/foto';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->upload->initialize($config);

                $data = array('id_pengguna' => $id,
                    'nama' => $nama,
                    'email' => $email,
                    'pass' => $password,
                    'no_hp' => $no_hp,
                    'level' => $level
                );
                $this->model_pengguna->edit($data,$id);
                redirect('pengguna');
            } else{
                $id=  $this->uri->segment(3);
                $data['record']     =  $this->model_pengguna->get_one($id)->row_array();
                $this->template->load('template','pengguna/update_data',$data);
        }
    }

    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_pengguna->delete($id);
        redirect('pengguna');
    }




}

  ?>
