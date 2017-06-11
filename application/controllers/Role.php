<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct() 
	 {
 		parent::__construct();
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
	    $data['title'] = 'SIPUMA | Role';
	    $data['pages'] = 'Role';
	    $data['penjelasan'] = ' create,read,update & delete';

		$data['roles']=$this->Role_model->get_listrole();
	    $this->load->view('panel/Header',$data);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_role');
	    $this->load->view('panel/Footer');	
	}

	public function add_role() 
	{
		$this->form_validation->set_rules('role_name','role name','required|min_length[4]');
		$this->form_validation->set_rules('role_status','role status','required');

		if($this->form_validation->run()!=false)
		{
			$data = array(
				'role_id' => $this->input->post('role_id'),
				'role_name' => $this->input->post('role_name'),
				'role_status' => $this->input->post('role_status')
			);
			$insert = $this->Role_model->addrole_db($data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("add", "menambah data role");
		
		} else {
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_role');
	      $this->load->view('panel/Footer');
		}
	}

	public function ajax_edit($id) 
	{
		$data = $this->Role_model->get_by_id($id);
		echo json_encode($data);
	}

	public function upd_role() 
	{
		$this->form_validation->set_rules('role_name','role name','required|min_length[4]');
		$this->form_validation->set_rules('role_status','role status','required');

		if($this->form_validation->run()!=false)
		{
			$data = array(
				'role_id' => $this->input->post('role_id'),
				'role_name' => $this->input->post('role_name'),
				'role_status' => $this->input->post('role_status'),
				'role_create_at' => $this->input->post('role_create_at')
			);
			$this->Role_model->updrole_db(array('role_id' => $this->input->post('role_id')), $data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("edit", "mengubah data role");
		} else {
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_role');
	      $this->load->view('panel/Footer');
		}
		
	}

	public function del_role($id) {
		$this->Role_model->delrole_db($id);
		echo json_encode(array("status" => TRUE));
		$this->helper_log("delete", "menghapus data role");
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
