<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Universitas_model extends CI_Model
{

	var $table = 'universitas';


	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_listuniversitas() {
		$this->db->from('universitas');
		$query=$this->db->get();
		return $query->result();
	}


	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('universitas_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function adduniversitas_db($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function upduniversitas_db($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function deluniversitas_db($id) {
		$this->db->where('universitas_id', $id);
		$this->db->delete($this->table);
	}

	function getUniversitas($where= ''){
		return $this->db->query("select * from universitas $where;");
	}


}
