<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 public function __construct() 
	 {
 		parent::__construct();
 		$this->load->model('User_model');
 		$this->load->model('Role_model');	
	  	

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
	    $data['username'] = $this->session->userdata('username');
	    $data['title'] = 'SIPUMA | User';
	    $data['pages'] = 'User';
	    $data['penjelasan'] = 'create,read,update & delete';
		$data['users']=$this->User_model->get_listuser();
		$data['roles']=$this->Role_model->get_listrole();

	    $this->load->view('panel/Header',$data);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_user');
	    $this->load->view('panel/Footer');
	}

	public function add_user() 
	{
		$data['pages'] = 'User';
	    $data['penjelasan'] = 'create,read,update & delete';
	    $data['username'] = $this->session->userdata('username');	    
		$data['users']=$this->User_model->get_listuser();

		$this->form_validation->set_rules('username','Username','required|min_length[4]');
		$this->form_validation->set_rules('password','password','required|min_length[4]');
		$this->form_validation->set_rules('role_id','Role ID','required');
		$this->form_validation->set_rules('user_status','User status','required');

		if($this->form_validation->run()!=false)
		{
			$data = array(
					'username' 	  => $this->input->post('username'),
					'password' 	  => md5($this->input->post('password')),
					'role_id' 	  => $this->input->post('role_id'),
					'user_status' => $this->input->post('user_status'),
				);
			$insert = $this->User_model->adduser_db($data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("add", "menambahkan data user");
		} 
		else 
		{
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_user',$data);
	      $this->load->view('panel/Footer');

		}
	}

	public function ajax_edit($id) 
	{
		$data = $this->User_model->get_by_id($id);
		echo json_encode($data);
	}

	public function upd_user() 
	{
		$this->form_validation->set_rules('username','Username','required|min_length[4]');
		$this->form_validation->set_rules('password','password','required|min_length[4]');
		$this->form_validation->set_rules('role_id','Role ID','required');
		$this->form_validation->set_rules('user_status','User status','required');

		if($this->form_validation->run()!=false)
		{
			$data = array(

				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'role_id' => $this->input->post('role_id'),
				'user_status' => $this->input->post('user_status'),
				'user_create_at' => $this->input->post('user_create_at')
			);
			$this->User_model->upduser_db(array('user_id' => $this->input->post('user_id')), $data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("edit", "mengubah data user");

		} 
		else 
		{
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_user');
	      $this->load->view('panel/Footer');
		}	
	}

	public function del_user($id) 
	{
		$this->User_model->deluser_db($id);
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