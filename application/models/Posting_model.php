<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting_model extends CI_Model
{

	var $table = 'posting';


	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_all_count()
    {
        $sql = "SELECT COUNT(*) as tol_records FROM posting";       
        $result = $this->db->query($sql)->row();
        return $result;
    }

    public function get_all_content($start,$content_per_page)
    {
        $sql = "SELECT * FROM posting,hima WHERE posting.hima_id=hima.hima_id ORDER BY posting.posting_create_at DESC LIMIT $start,$content_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }

	public function get_posting(){
		$this->db->select('*');
		$this->db->from('posting'); //memeilih tabel
		$this->db->join('hima', 'posting.hima_id = hima.hima_id');
		$this->db->order_by('posting.posting_create_at','desc'); 
		$query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
		return $query;
	}

	public function get_postingbyid($id){
		$this->db->select('*');
		$this->db->from('posting'); //memeilih tabel
		$this->db->join('hima', 'posting.hima_id = hima.hima_id'); 
		$this->db->where('posting.posting_id',$id); 
		$this->db->order_by('posting.posting_create_at','desc'); 
		$query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
		return $query;
	}

	public function get_listposting() {
		$this->db->from('posting');
		$this->db->join('hima','posting.hima_id = hima.hima_id');
		$this->db->order_by('posting.posting_create_at','desc'); 
		$query=$this->db->get();
		return $query->result();
	}


	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('posting_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function addposting_db($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function updposting_db($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delposting_db($id) {
		$this->db->where('posting_id', $id);
		$this->db->delete($this->table);
	}

	function getposting($where= ''){
		return $this->db->query("select * from posting $where;");
	}


}
