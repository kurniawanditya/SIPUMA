<?php defined('BASEPATH') or exit ('No script direct allowed');

Class Posting extends CI_Controller{

	 public function __construct() 
	 {
 		parent::__construct();
		$this->load->helper('url');
 		$this->load->model('user_model');
 		$this->load->model('hima_model');
 		$this->load->model('role_model');
 		$this->load->model('posting_model');		
	  	$this->load->library('form_validation');
	  	$this->load->library('session');
	  	$this->load->helper('security');

	  	//Session
	  	$sudah_login = $this->session->userdata('sudah_login');
	    $data['role_id'] = $this->session->userdata('role_id');
	    $data['username'] = $this->session->userdata('username');

	    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
	      redirect(base_url('Login'));
	    }
	}

	public function index() 
	{
		$this->load->helper('text');
	    $data['username'] = $this->session->userdata('username');
	    $data['title'] = 'SIPUMA | Posting';
	    $data['pages'] = 'Posting';
	    $data['penjelasan'] = 'read';
		$data['users']=$this->user_model->get_listuser();
		$data['roles']=$this->role_model->get_listrole();
		$data['hima']=$this->hima_model->get_listhima();
		$data['posting'] = $this->posting_model->get_listposting();

	    $this->load->view('panel/Header',$data);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_posting');
	    $this->load->view('panel/Footer');
	}

	public function ajax_edit($id) 
	{
		$data = $this->posting_model->get_by_id($id);
		echo json_encode($data);
	}

	public function upd_posting() 
	{
		
		$this->form_validation->set_rules('posting_status','status','required');

		if($this->form_validation->run()!=false)
		{
			$data = array(
				'posting_status' => $this->input->post('posting_status'),
				'posting_create_at' => $this->input->post('posting_create_at'),
			);
			$this->posting_model->updposting_db(array('posting_id' => $this->input->post('posting_id')), $data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("edit", "mengubah data status posting");

		} 
		else 
		{
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_posting');
	      $this->load->view('panel/Footer');
		}	
	}

	public function del_posting($id) 
	{
		$this->posting_model->delposting_db($id);
		echo json_encode(array("status" => TRUE));
		$this->helper_log("delete", "menghapus data user");
	}

	public function helper_log($tipe = "", $str = "")
	{
	    $CI =& get_instance();
	 
	    if (strtolower($tipe) == "login"){
	        $log_tipe   = 0;
	    }
	    elseif(strtolower($tipe) == "logout")
	    {
	        $log_tipe   = 1;
	    }
	    elseif(strtolower($tipe) == "add"){
	        $log_tipe   = 2;
	    }
	    elseif(strtolower($tipe) == "edit"){
	        $log_tipe  = 3;
	    }
	    else{
	        $log_tipe  = 4;
	    }
	 
	    // paramter
	    $param['log_user']      = $CI->session->userdata('username');
	    $param['log_tipe']      = $log_tipe;
	    $param['log_desc']      = $str;
	 
	    //load model log
	    $CI->load->model('Log_model');
	 
	    //save to database
	    $CI->Log_model->save_log($param);
 
	}

}