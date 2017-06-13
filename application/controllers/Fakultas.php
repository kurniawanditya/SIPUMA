<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fakultas extends CI_Controller {

	 public function __construct()
	 {
 		parent::__construct();
 		$this->load->model('fakultas_model');
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
	  	$data['title'] = 'SIPUMA | Fakultas';
	  	$data['pages'] = 'Fakultas';
	  	$data['penjelasan'] = ' create,read,update & delete';
		$data['fakultas']=$this->fakultas_model->get_listfakultas();

	    $this->load->view('panel/Header',$data);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_fakultas');
	    $this->load->view('panel/Footer');
	}

	public function add_fakultas() 
	{
		$this->form_validation->set_rules('fakultas_name','fakultas','required|min_length[4]');
		$this->form_validation->set_rules('fakultas_desc','fakultas description','required');
		$this->form_validation->set_rules('fakultas_status','fakultas status','required');

		if($this->form_validation->run()!=false)
		{
			$data = array(
				'fakultas_name' =>$this->input->post('fakultas_name'),
				'fakultas_desc' => $this->input->post('fakultas_desc'),
				'fakultas_status' => $this->input->post('fakultas_status'),
			);
			$insert = $this->fakultas_model->addfakultas_db($data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("add", "menambah data fakultas");
		} else {
		  	$this->load->view('panel/Header',$data);
	      	$this->load->view('panel/V_index');
	      	$this->load->view('panel/V_fakultas');
	      	$this->load->view('panel/Footer');
		}
	}

	public function ajax_edit($id) 
	{
		$data = $this->fakultas_model->get_by_id($id);
		echo json_encode($data);
	}

	public function upd_fakultas() 
	{
		$this->form_validation->set_rules('fakultas_name','fakultas','required|min_length[4]');
		$this->form_validation->set_rules('fakultas_desc','fakultas description','required');
		$this->form_validation->set_rules('fakultas_status','fakultas status','required');

		if($this->form_validation->run()!=false){
			$data = array(
      			'fakultas_name' =>$this->input->post('fakultas_name'),
      			'fakultas_desc' => $this->input->post('fakultas_desc'),
      			'fakultas_status' => $this->input->post('fakultas_status'),
      			'fakultas_create_at' => $this->input->post('fakultas_create_at'),
			);
			$this->fakultas_model->updfakultas_db(array('fakultas_id' => $this->input->post('fakultas_id')), $data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("edit", "mengubah data fakultas");
		} else {
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_fakultas');
	      $this->load->view('panel/Footer');
		}
		
	}

	public function del_fakultas($id) 
	{
		$this->fakultas_model->delfakultas_db($id);
		echo json_encode(array("status" => TRUE));
		$this->helper_log("delete", "menghapus data fakultas");
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
