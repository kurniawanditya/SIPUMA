<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Universitas extends CI_Controller {

	 public function __construct() 
	 {
 		parent::__construct();
		$this->load->helper('url');
 		$this->load->model('universitas_model');
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
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'SIPUMA | Universitas';
		$data['pages'] = 'Universitas';
		$data['penjelasan'] = ' create,read,update & delete';
		$data['universitas']=$this->universitas_model->get_listuniversitas();

	    $this->load->view('panel/Header',$data);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_universitas');
	    $this->load->view('panel/Footer');		
	}

	public function add_universitas() 
	{
		$this->form_validation->set_rules('universitas_name','universitas name','required|min_length[3]');
		$this->form_validation->set_rules('universitas_desc','universitas description','required');
		$this->form_validation->set_rules('universitas_status','universitas status','required');

		if($this->form_validation->run()!=false)
		{
		   $data = array(
			 'universitas_name' =>$this->input->post('universitas_name'),
			 'universitas_desc' => $this->input->post('universitas_desc'),
			 'universitas_status' => $this->input->post('universitas_status'),
			);
			 $insert = $this->universitas_model->adduniversitas_db($data);
			 echo json_encode(array("status" => TRUE));
			 $this->helper_log("add", "menambah data universitas");
		}
		else 
		{
		   $this->load->view('panel/Header',$data);
		   $this->load->view('panel/V_index');
		   $this->load->view('panel/V_universitas');
		   $this->load->view('panel/Footer');
		}	
	}

	public function ajax_edit($id) 
	{
		$data = $this->universitas_model->get_by_id($id);
		echo json_encode($data);
	}

	public function upd_universitas() 
	{
	  	$this->form_validation->set_rules('universitas_name','universitas name','required|min_length[3]');
	  	$this->form_validation->set_rules('universitas_desc','universitas description','required');
	 	$this->form_validation->set_rules('universitas_status','universitas status','required');
		
		if($this->form_validation->run()!=false)
		{
			$data = array(
		      'universitas_name' =>$this->input->post('universitas_name'),
		      'universitas_desc' => $this->input->post('universitas_desc'),
		      'universitas_status' => $this->input->post('universitas_status'),
		      'universitas_create_at' => $this->input->post('universitas_create_at'),
			);
			$this->universitas_model->upduniversitas_db(array('universitas_id' => $this->input->post('universitas_id')), $data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("edit", "mengubah data universitas");

		} 
		else 
		{
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_universitas');
	      $this->load->view('panel/Footer');
		}
	}

	public function del_universitas($id) 
	{
		$this->universitas_model->deluniversitas_db($id);
		echo json_encode(array("status" => TRUE));
		$this->helper_log("delete", "menghapus data universitas");
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
