<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hima_model extends CI_Model
{

	var $table = 'hima';


	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_hima(){
		return $this->db->get('hima');
		
	}

	public function get_himabyid($id){
		$this->db->select('*');
		$this->db->from('hima'); 
		$this->db->where('hima_id',$id); 
		$query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
		return $query;
	}

	public function get_postingbyhima($id){
		$this->db->select('*');
		$this->db->from('posting'); //memeilih tabel
		$this->db->join('hima', 'posting.hima_id = hima.hima_id'); 
		$this->db->where('posting.hima_id',$id); 
		$query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
		return $query;
	}

	public function get_listhima() {
		$this->db->from('hima');
		$this->db->join('fakultas','hima.fakultas_id = fakultas.fakultas_id');
		$this->db->join('universitas','hima.universitas_id = universitas.universitas_id');
		$this->db->join('user','hima.user_id = user.user_id');
		$query=$this->db->get();
		return $query->result();
	}


	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('hima_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function addhima_db($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function updhima_db($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delhima_db($id) {
		$this->db->where('hima_id', $id);
		$this->db->delete($this->table);
	}

	function getHima($where= ''){
		return $this->db->query("select * from hima $where;");
	}


}
