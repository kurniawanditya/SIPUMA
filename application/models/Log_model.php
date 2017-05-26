<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Log_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tabel_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function get_listlog() {
        $this->db->select("*");
        $this->db->from("tabel_log");
        $this->db->order_by("log_time", "desc");
		$query=$this->db->get();
		return $query->result();
	}

     public function getAll() {
           $this->db->select('*');
           $this->db->from('tabel_log');
           $query = $this->db->get();
           return $query->result();
      }


}