<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Posting_model');
        $this->load->helper('url');
        $this->load->helper('text');
	}
	public function index()
	{
		$data['postingall'] = $this->Posting_model->get_posting()->result();
		$this->load->view('Index',$data);
	}

	public function detail_posting($id)
	{
		$data['postingid'] = $this->Posting_model->get_postingbyid($id)->result();
		$this->load->view('Index',$data);
	}
}
