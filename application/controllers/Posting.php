<?php defined('BASEPATH') or exit ('No script direct allowed');

Class Posting extends CI_Controller{

	 public function __construct() 
	 {
 		parent::__construct();
		
 		$this->load->model('user_model');
 		$this->load->model('hima_model');
 		$this->load->model('role_model');
 		$this->load->model('Posting_model');		
	  

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
	    $data['title'] = 'SIPUMA | Posting';
	    $data['pages'] = 'Posting';
	    $data['penjelasan'] = 'read';
		$data['users']=$this->user_model->get_listuser();
		$data['roles']=$this->role_model->get_listrole();
		$data['hima']=$this->hima_model->get_listhima();
		$data['posting'] = $this->Posting_model->get_listposting();

	    $this->load->view('panel/Header',$data);
	    $this->load->view('panel/V_index');
	    $this->load->view('panel/V_posting');
	    $this->load->view('panel/Footer');
	}

	public function ajax_edit($id) 
	{
		$data = $this->Posting_model->get_by_id($id);
		echo json_encode($data);
	}

	public function add_posting()
	{
		$this->form_validation->set_rules('hima_id','hima id','required');
		$this->form_validation->set_rules('posting_title','posting title','required');
		$this->form_validation->set_rules('posting_description','posting description','required');

		if($this->form_validation->run()!=false)
		{	 

		
			$config['upload_path']          = './gambar/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 200;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('input-file-preview')) {
		        $posting_image = $this->upload->data();
				$keterangan = $this->input->post('keterangan', TRUE);
			}
			else{
				echo "gambar tidak ada";
			}
		    $data = array (
		        'hima_id' => $this->input->post('hima_id'),
				'posting_title' => $this->input->post('posting_title'),
				'posting_description' => $this->input->post('posting_description'),
				'posting_image' => $posting_image['file_name']);
			 $this->Posting_model->addposting_db($data);
			 json_encode(array("status" => TRUE));
			 $this->session->set_flashdata('notif','Berhasil menambahkan Posting');
			 redirect('Hima/dash_hima');
		}	

		else
		{
			$this->session->set_flashdata('notif','Gagal memosting');

		}
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
			$this->Posting_model->updposting_db(array('posting_id' => $this->input->post('posting_id')), $data);
			// echo json_encode(array("status" => TRUE));
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
		$this->Posting_model->delposting_db($id);
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