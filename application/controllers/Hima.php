<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hima extends CI_Controller {

	 public function __construct() {
 		parent::__construct();
		$this->load->library('form_validation');
    	$this->load->library('session');
    	$this->load->helper('security');
		$this->load->helper('url');
 		$this->load->model('hima_model');
		$this->load->model('universitas_model');
		$this->load->model('fakultas_model');
		$this->load->model('user_model');

		$sudah_login = $this->session->userdata('sudah_login');
	    $data['role_id'] = $this->session->userdata('role_id');
	    $data['username'] = $this->session->userdata('username');

	    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
	      redirect(base_url('Login'));
	    }
	}


	public function index() {
	  $sudah_login = $this->session->userdata('sudah_login');
	  $data['role_id'] = $this->session->userdata('role_id');
	  $data['username'] = $this->session->userdata('username');
	  $data['title'] = 'SIPUMA | HIMA';
	  $data['pages'] = 'Hima';
	  $data['penjelasan'] = ' create,read,update & delete';
	  $data['himas']=$this->hima_model->get_listhima();
	  $data['universitas']=$this->universitas_model->get_listuniversitas();
	  $data['fakultas']=$this->fakultas_model->get_listfakultas();
	  $data['users']=$this->user_model->get_listuser();

      $this->load->view('panel/Header',$data);
      $this->load->view('panel/V_index');
      $this->load->view('panel/V_hima');
      $this->load->view('panel/Footer');
	}

	public function add_hima() {
	 $this->form_validation->set_rules('hima_name','hima name','required|min_length[4]');
	 $this->form_validation->set_rules('hima_desc','hima description','required');
	 $this->form_validation->set_rules('fakultas_id','fakultas id','required');
	 $this->form_validation->set_rules('universitas_id','universitas id','required');
	 $this->form_validation->set_rules('hima_status','hima status','required');

		 if($this->form_validation->run()!=false)
		 {
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'hima_name' =>$this->input->post('hima_name'),
				'hima_desc' => $this->input->post('hima_desc'),
				'fakultas_id' => $this->input->post('fakultas_id'),
				'universitas_id' => $this->input->post('universitas_id'),
				'hima_status' => $this->input->post('hima_status'),
			);

			$insert = $this->hima_model->addhima_db($data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("add", "menambah data hima");
		}
		else 
		{
			  $this->load->view('panel/Header',$data);
		      $this->load->view('panel/V_index');
		      $this->load->view('panel/V_hima');
		      $this->load->view('panel/Footer');
		}
		
	}

	public function ajax_edit($id) {
		$data = $this->hima_model->get_by_id($id);
		echo json_encode($data);
	}

	public function upd_hima() {

		$this->form_validation->set_rules('hima_name','hima name','required|min_length[2]');
		$this->form_validation->set_rules('hima_desc','hima description','required');
		$this->form_validation->set_rules('fakultas_id','fakultas id','required');
		$this->form_validation->set_rules('universitas_id','universitas id','required');
		$this->form_validation->set_rules('hima_status','hima status','required');

		if($this->form_validation->run()!=false){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'hima_name' =>$this->input->post('hima_name'),
				'hima_desc' => $this->input->post('hima_desc'),
				'fakultas_id' => $this->input->post('fakultas_id'),
				'universitas_id' => $this->input->post('universitas_id'),
				'hima_status' => $this->input->post('hima_status'),
				'hima_create_at' => $this->input->post('hima_create_at'),
			);
			$this->hima_model->updhima_db(array('hima_id' => $this->input->post('hima_id')), $data);
			echo json_encode(array("status" => TRUE));
			$this->helper_log("edit", "mengubah data hima");
		}
		else {
		  $this->load->view('panel/Header',$data);
	      $this->load->view('panel/V_index');
	      $this->load->view('panel/V_hima');
	      $this->load->view('panel/Footer');
		}
		
	}

	public function del_hima($id) {
		$this->hima_model->delhima_db($id);
		echo json_encode(array("status" => TRUE));
		$this->helper_log("delete", "menghapus data hima");
	}

	public function helper_log($tipe = "", $str = ""){
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
