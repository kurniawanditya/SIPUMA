<?php 
defined('BASEPATH') or exit ('No script direct allowed');

class Loginhima extends CI_Controller{

    function __construct(){
    	  parent::__construct();
      	$this->load->helper('form');
      	$this->load->model('Login_model');
      	$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('security');

  	}

  //method untuk mengecek apakah sudah login atau belum
    public function index(){
        $sudah_login = $this->session->userdata('sudah_login');
        $data['role_id'] = $this->session->userdata('role_id');
        $data['username'] = $this->session->userdata('username');
        $data['title'] = 'SIPUMA | Login Admin';

         if(empty($sudah_login))
         {
          $this->load->view('register',$data);
         }
         else
         {
            $role_id = $this->session->userdata('role_id');
            if($role_id == '1')
            {
              header('location:'.base_url().'Dashboard');
            }
            else if($role_id == '2'){
              header('location:'.base_url().'Login/login_hima');
            }
         }
  	}


  // Method proses login
  	public function login(){
        $this->load->library('form_validation');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $enkripsi_pass = hash('md5',$password);

        $data_from_db = $this->Login_model->cek_user($username,$enkripsi_pass);// mengambil data dari fungsi cek_user
        $hitung_datadb = count($data_from_db);

        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');// melakukan validasi form login
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');

        if ($this->form_validation->run()==FALSE) {// jika validasi terjadi kesalahan maka akan kembali ke halaman awal
        $this->load->view('login_panel');// ^ dengan menampilkan error

        }else {
            if ($hitung_datadb>0) {
              $session_data = array('user_id'=>$data_from_db[0]->user_id,
                                     'username'=>$data_from_db[0]->username,
                                     'role_id'=>$data_from_db[0]->role_id,
                                     'user_status'=>$data_from_db[0]->user_status,
                                     'user_create_at'=>$data_from_db[0]->user_create_at,
                                     'sudah_login'=>TRUE);// data yang di gunakan untuk session yang di ambil dari database di atas

              $this->session->set_userdata($session_data);// set data-data session

              if($this->session->userdata('role_id')=='1' && $this->session->userdata('user_status')=='Active') {
                  $this->helper_log('login','masuk ke sistem');
                  redirect('Dashboard');
              }elseif ($this->session->userdata('role_id')=='2' && $this->session->userdata('user_status')=='Active') {
              	  echo "ini adalah halaman untuk HIMA";
                  //redirect('C_Front/login_hima');
              }

              }else {
                  $this->session->set_flashdata('notif','Gagal! Username atau password salah');
                 	redirect(base_url('Login'));
              }
        }

  	}

    //Method Logout
    function logout(){
        $this->session->sess_destroy();// menghancurkan session
        $this->helper_log('logout','keluar dari sistem');
        redirect(base_url('Login'));// melakukan kembali ke fungsi home 
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
