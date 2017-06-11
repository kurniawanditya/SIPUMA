<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
	public function sendemail(){
		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'kurniawanditya11@gmail.com';
        $config['smtp_pass']    = 'Novemberdelapan94';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);
		$this->email->to('if@mailinator.com');
		$this->email->from('kurniawanditya11@gmail.com','SIPUMA');
		$this->email->subject('JUDUL EMAIL (Teks)');
		$this->email->message('Isi email ditulis disini');
		$this->email->send();

        echo $this->email->print_debugger();

	}

}
