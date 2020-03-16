<?php
class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_operator');
        $this->load->model('model_pengguna');
    }

    function login() //admin.php
    {
        if (isset($_POST['submit'])) {

            // proses login disini

            $no_hp = $this->input->post('no_hp');
            $password = $this->input->post('password');
            $passmd5 = md5($password);
            $hasil = $this->model_operator->login($no_hp, $password)->row_array();


            if ($no_hp == $hasil['no_hp'] && $passmd5 == $hasil['pass']) {

                $this->session->set_userdata('id_pengguna', $hasil['id_pengguna']);
                $this->session->set_userdata('nama', $hasil['nama']);
                $this->session->set_userdata('level', $hasil['level']);
                $this->session->set_userdata('email', $hasil['email']);
                $this->session->set_userdata('no_hp', $hasil['no_hp']);

                redirect('Dashboard');
            } else {
                $Welcome = base_url();
                echo $this->session->set_flashdata('msg', 'Nomor Handphone Atau Password Salah!');
                redirect('Welcome');
            }
        }

    }

    function login_donatur() //donatur
    {

        // proses login disini
        $no_hp = $this->input->post('no_hp');
        $password = $this->input->post('password');

        $passmd5 = md5($password);
        $hasil = $this->model_operator->login($no_hp, $password)->row_array();

        if ($no_hp == $hasil['no_hp'] && $passmd5 == $hasil['pass']) {

            if($hasil["level"] == "Admin"){
                echo $this->session->set_flashdata('msg', 'Admin pergi ya');
                redirect('login');
            }
            else{
                $this->session->set_userdata('id_pengguna', $hasil['id_pengguna']);
                $this->session->set_userdata('nama', $hasil['nama']);
                $this->session->set_userdata('level', $hasil['level']);
                $this->session->set_userdata('email', $hasil['email']);
                $this->session->set_userdata('no_hp', $hasil['no_hp']);
                redirect('welcome');
            }

        }
        else {
            $Welcome = base_url();
            echo $this->session->set_flashdata('msg', 'Nomor Handphone Atau Password Salah');
            redirect('login');
        }

    }

    function register_donatur()
    {

        // proses register disini


        if (isset($_POST['submit'])){
            $nama    = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $no_hp    = $this->input->post('no_hp');
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'pass' => md5($password),
                'no_hp' => $no_hp,
                'level' => "Donatur"
            );
            $this->model_pengguna->post($data);
            redirect('welcome');
        } else{
            echo $this->session->set_flashdata('msg', 'Isi semua');
            redirect('register');
        }

    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login_admin');
    }
    function logout_user()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }

}
