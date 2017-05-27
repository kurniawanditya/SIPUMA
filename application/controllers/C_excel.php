<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class C_excel extends CI_Controller {
 
      //constructor class C_excel
      public function __construct() {
           parent::__construct();
           //load helper url
           $this->load->helper('url');
           //load model 'model_buku'
           $this->load->model('log_model');
      }
 
      //halaman awal untuk menampilkan tabel
      public function index() {
 
           $data = array( 'title' => 'Laporan Excel Log History User',
                'logs' => $this->log_model->get_listlog());
 
           $this->load->view('panel/vw_excel',$data);
      }
 
      //export ke dalam format excel
      public function export_excel(){
           $data = array( 'title' => 'Laporan Excel Log History User',
                'logs' => $this->log_model->get_listlog());
 
           $this->load->view('panel/vw_laporan_excel',$data);
      }
 
 }