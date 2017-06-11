<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hima extends CI_Controller {

	public function __construct() {
 		parent::__construct();
 		$this->load->model('Hima_model');
 		$this->load->model('Universitas_model');
 		$this->load->model('Fakultas_model');
 		$this->load->model('User_model');
 		$this->load->model('Email_model');
		$sudah_login = $this->session->userdata('sudah_login');
	    $data['role_id'] = $this->session->userdata('role_id');
	    $data['username'] = $this->session->userdata('username');

	    if (!$sudah_login) { // jika $sudah_login == false atau belum login maka akan kembali ke redirect yang di tuju
	      redirect(base_url('LoginHima'));
	    }
	}

	public function index() {
		$sudah_login = $this->session->userdata('sudah_login');
		$data['role_id'] = $this->session->userdata('role_id');
		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'SIPUMA | HIMA';
		$data['pages'] = 'Hima';
		$data['penjelasan'] = ' create,read,update & delete';
		$data['himas']=$this->Hima_model->get_listhima();
		$data['universitas']=$this->Universitas_model->get_listuniversitas();
		$data['fakultas']=$this->Fakultas_model->get_listfakultas();
		$data['users']=$this->User_model->get_listuser();

		$this->load->view('panel/Header',$data);
		$this->load->view('panel/V_index');
		$this->load->view('panel/V_hima');
		$this->load->view('panel/Footer');
	}

	public function dash_hima() {
		$user_id = $this->session->userdata('user_id');
		$data['himaid'] = $this->Hima_model->get_himabyuser($user_id)->result();
		foreach ($data['himaid'] as $key) {
			$idhima=$key->hima_id;
		}
		$data['postingid'] = $this->Hima_model->get_postingbyhima($idhima)->result();
		$this->load->view('Himadashboard',$data);
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

			$insert = $this->Hima_model->addhima_db($data);
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
		$data = $this->Hima_model->get_by_id($id);
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
			$this->Hima_model->updhima_db(array('hima_id' => $this->input->post('hima_id')), $data);
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

	public function edithima($id){
		$data['univ'] = $this->Universitas_model->get_listuniversitas();
		$data['fakultas'] = $this->Fakultas_model->get_listfakultas();
		$data['himaid'] = $this->Hima_model->get_himabyid($id)->result();
		$this->load->view('edithima.php',$data);

	}
	public function update() {
		$this->form_validation->set_rules('hima_name','hima name','required|min_length[2]');
		$this->form_validation->set_rules('hima_email','hima email','required');
		$this->form_validation->set_rules('hima_desc','hima desc','required');
		$this->form_validation->set_rules('hima_univ','hima univ','required');
		$this->form_validation->set_rules('fakultas_id','fakultas id','required');
		if($this->form_validation->run()!=false){
			$config['upload_path']          = './assets/frontend/images/photo-profil/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 200;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('hima_img')) {
		        $posting_image = $this->upload->data();
				$keterangan = $this->input->post('keterangan', TRUE);
				$img = $posting_image['file_name'];
			}
			else{
				$img = $this->input->post('hima_img_if');
			}

			$config2['upload_path']          = './assets/frontend/images/banner/';
			$config2['allowed_types']        = 'gif|jpg|png';
			$config2['max_size']             = 200;

			$this->load->library('upload', $config2);
			if ($this->upload->do_upload('hima_img2')) {
		        $posting_image2 = $this->upload->data();
				$keterangan = $this->input->post('keterangan', TRUE);
				$img2 = $posting_image2['file_name'];
			}
			else{
				$img2 = $this->input->post('hima_banner_if');
			}

			$data = array (
				'hima_email' => $this->input->post('hima_email'),
				'hima_name' => $this->input->post('hima_name'),
				'hima_desc' => $this->input->post('hima_desc'),
				'fakultas_id' => $this->input->post('fakultas_id'),
				'universitas_id' => $this->input->post('hima_univ'),
				'hima_img' => $img,
				'hima_banner' => $img2
			);

			$this->Hima_model->updhima_db(array('hima_id' => $this->input->post('hima_id')), $data);
			json_encode(array("status" => TRUE));
			$this->session->set_flashdata('notif','Berhasil merubah data Hima');
			redirect('Hima/dash_hima');


		}
		else{
			$this->session->set_flashdata('notif','Gagal! Periksa kembali data yang anda masukkan');
		}
		
	}

	public function del_hima($id) {
		$this->Hima_model->delhima_db($id);
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
	public function sendemail(){
		$email = 'himasi@mailinator.com';
		$this->Email_model->sendemail($email);		
	}


}
