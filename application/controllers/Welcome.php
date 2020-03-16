<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct() {
        parent::__construct();
        $this->load->model('model_kategori');
        $this->load->model('model_kampanye');
        $this->load->model('model_donatur');
        $this->load->model('model_bank');
        $this->load->model('model_pengguna');
        $this->load->model('model_perkembangan');
        $this->load->helper('nominal');
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function frontend(){
        $data['kategori'] = $this->model_kategori->tampil_data();
        $data['kampanye'] = $this->model_kampanye->tampil_data();
        $data['donatur'] = $this->model_donatur->tampil_data();
        $this->load->view('frontend/index',$data);
    }
    public function kampanye(){
        $data['kategori'] = $this->model_kategori->tampil_data();
        $data['kampanye'] = $this->model_kampanye->tampil_data();
        $data['donatur'] = $this->model_donatur->tampil_data();
        $this->load->view('frontend/kampanye',$data);
    }
    public function kategori(){
        $id = $this->uri->segment(3);
        $data['kategori'] = $this->model_kategori->tampil_data();
        $data['donatur'] = $this->model_donatur->tampil_data();
        $data['kampanye'] = $this->model_kampanye->getByKategori($id);
        $this->load->view('frontend/kategori',$data);
    }
    public function detail(){
        $id = $this->uri->segment(3);
        $data['kategori'] = $this->model_kategori->tampil_data();
        $data['bank'] = $this->model_bank->tampil_data();
        $data['listdonatur'] = $this->model_donatur->listDonatur($id);
        $data['kampanye'] = $this->model_kampanye->get_one($id)->row_array();
        $data['perkembangan'] = $this->model_perkembangan->get_one_kembang($id)->result_array();
        $this->load->view('frontend/detail_kampanye',$data);
    }
    public function login(){
        $data['kategori'] = $this->model_kategori->tampil_data();

            $this->load->view('frontend/login_donatur',$data);

    }
    public function register(){
        $data['kategori'] = $this->model_kategori->tampil_data();
        if (isset($_POST['submit'])){
            redirect("Auth/login");
        }
        else{
            $this->load->view('frontend/register_donatur',$data);
        }
    }
    public function konfirmasi(){
        $data['kategori'] = $this->model_kategori->tampil_data();
        $data['donatur'] = $this->model_donatur->konfirmasiDonatur($this->session->userdata('id_pengguna'));
        $this->load->view('frontend/konfirmasi',$data);
    }
    public function lengkapi(){
        $data['kategori'] = $this->model_kategori->tampil_data();
//        $data['donatur'] = $this->model_donatur->konfirmasiDonatur($this->session->userdata('id_pengguna'));
        $data['donatur'] = $this->model_donatur->get_one($this->uri->segment(3))->row_array();

        $this->load->view('frontend/pembayaran',$data);
    }
}
