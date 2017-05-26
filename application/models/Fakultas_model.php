<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{

	var $table = 'fakultas';


	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_listfakultas() {
		$this->db->from('fakultas');
		$query=$this->db->get();
		return $query->result();
	}


	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('fakultas_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function addfakultas_db($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function updfakultas_db($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delfakultas_db($id) {
		$this->db->where('fakultas_id', $id);
		$this->db->delete($this->table);
	}

	function getFakultas($where= ''){
		return $this->db->query("select * from fakultas $where;");
	}


}
