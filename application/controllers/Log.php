<?php 

Class Log extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Log_model'); 
    
        //Session
        $sudah_login = $this->session->userdata('sudah_login');
        $data['role_id'] = $this->session->userdata('role_id');
        $data['username'] = $this->session->userdata('username');

        // jika $sudah_login == false atau belum login maka akan kembali ke redirect login
        if (!$sudah_login) { 
          redirect(base_url('LoginHima'));
        }
    }


    public function index() {
        $data['username'] = $this->session->userdata('username');
        $data['title'] = 'SIPUMA | Log';
        $data['pages'] = 'Log';
        $data['penjelasan'] = 'read';

        $data['logs']=$this->Log_model->get_listlog();

        $this->load->view('panel/Header',$data);
        $this->load->view('panel/V_index');
        $this->load->view('panel/V_log');
        $this->load->view('panel/Footer');
        
    }

}