<?php

class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	  	$this->load->model('Login_model');
		$this->load->model('universitas_model');
		$this->load->model('fakultas_model');
		$this->load->model('hima_model');
		$this->load->model('role_model');
		$this->load->model('user_model');

		//Session
		$sudah_login = $this->session->userdata('sudah_login');
	    $data['role_id'] = $this->session->userdata('role_id');
	    $data['username'] = $this->session->userdata('username');

	    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
	      redirect(base_url('LoginHima'));
	    }

	}

	public function index()
	{
		$data['title'] = 'SIPUMA | Dashboard';
	    $data['pages'] = 'Dashboard';
	    $data['username'] = $this->session->userdata('username');

		// Jumlah 
		$universitas = $this->universitas_model->getUniversitas()->num_rows();
		$fakultas 	 = $this->fakultas_model->getFakultas()->num_rows();
		$hima 			 = $this->hima_model->getHima()->num_rows();
		$role 		   = $this->role_model->getRole()->num_rows();
		$user 		   = $this->user_model->getUser()->num_rows();

		$data2 = array(
			'jml_universitas' => $universitas,
			'jml_fakultas' 		=> $fakultas,
			'jml_hima' 				=> $hima,
			'jml_role' 				=> $role,
			'jml_user' 				=> $user,
		);

	    $this->load->view('panel/Header',$data,$data2);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_dashboard',$data2);
	    $this->load->view('panel/Footer');
    
  	}


}
