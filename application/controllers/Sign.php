<?php 
/**
* 
*/
class Sign extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->models('model_user');
	}


	function login()
	{
		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$username = $this->input->post('password');
			$hasil 	= $this->model_user->login($username,$password);
			
			if ($hasil==1) 
			{
				$this->session->userdata(array('status_login'=>'oke'));
				redirect('dashboard');
			}else{
				redirect('sign/login');
				}
			
		}
		else{

			$this->load->view('login');			
		}
}
		function logout(){
			$this->session->sess_destroy();
			redirect('sign/login');
		}

		 
}









 ?>
