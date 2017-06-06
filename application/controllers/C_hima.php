<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_hima extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();		
		$this->load->model('Hima_model');
	}
	public function index()
	{
		$data['data'] = $this->Hima_model->get_hima()->result();
		$this->load->view('view_hima',$data);
	}
	public function detail_hima($id)
	{	
		$data['himaid'] = $this->Hima_model->get_himabyid($id)->result();
		$data['postingid'] = $this->Hima_model->get_postingbyhima($id)->result();
		$this->load->view('detail_hima',$data);

	}
	public function add_hima() {
		$this->form_validation->set_rules('hima_name','hima name','required|min_length[4]');
		$this->form_validation->set_rules('hima_email','hima email','required|min_length[12]');

		 if($this->form_validation->run()!=false)
		 {
			$data = array(
				'hima_name' =>$this->input->post('hima_name'),
				'hima_email' => $this->input->post('hima_email'),
			);

			$insert = $this->Hima_model->addhima_db($data);
			echo json_encode(array("status" => TRUE)); 
			$this->session->set_flashdata('notif','Silahkan tunggu 2x24 jam untuk dapatkan konfirmasi di email anda');
             redirect(base_url('Loginhima'));
		}
		else 
		{
			  $this->load->view('register');
		}
		
	}
}
