<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hima_model extends CI_Model
{

	var $table = 'hima';


	public function __construct() {
		parent::__construct();
	}

	public function get_hima(){
		$this->db->select('*');
		$this->db->from('hima');
		$this->db->order_by('hima_id','asc');
		$result = $this->db->get();
		return $result;
	}

	public function get_all_count_byhima($id)
    {
    	$this->db->select('count(*) as tol_records');
		$this->db->from('posting'); //memeilih tabel
		$this->db->join('hima', 'posting.hima_id = hima.hima_id'); 
		$this->db->where('posting.hima_id',$id);
		$this->db->order_by('posting.posting_create_at','desc'); 
		$result = $this->db->get()->row(); //simpan database yang udah di get alias ambil ke query
		return $result;

    }
  //   public function get_all_content($id,$start,$content_per_page)
  //   {
    	
  //   	$this->db->select('*');
		// $this->db->from('posting'); //memeilih tabel
		// $this->db->join('hima', 'posting.hima_id = hima.hima_id'); 
		// $this->db->where('posting.hima_id',$id);
		// $this->db->order_by('posting.posting_create_at','desc'); 
		// $limit = "$start,$content_per_page";
		// $this->db->limit($limit);
		// $result = $this->db->get()->result(); //simpan database yang udah di get alias ambil ke query
		// return $result;

  //   }
    
    public function get_all_content($id,$start,$content_per_page)
    {
        $sql = "SELECT * FROM posting,hima WHERE posting.hima_id=hima.hima_id AND posting.hima_id=$id ORDER BY posting.posting_create_at DESC LIMIT $start,$content_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }

	public function get_himabyid($id){
		$this->db->select('*');
		$this->db->from('hima'); 
		$this->db->join('fakultas','hima.fakultas_id = fakultas.fakultas_id');
		$this->db->join('universitas','hima.universitas_id = universitas.universitas_id');
		$this->db->where('hima_id',$id); 
		$query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
		return $query;
	}

	public function get_himabyuser($id){
		$this->db->select('*');
		$this->db->from('hima'); 
		$this->db->join('fakultas','hima.fakultas_id = fakultas.fakultas_id');
		$this->db->join('universitas','hima.universitas_id = universitas.universitas_id');
		$this->db->where('user_id',$id); 
		$query = $this->db->get(); //simpan database yang udah di get alias ambil ke query
		return $query;
	}

	public function get_postingbyhima($id){
		$this->db->select('*');
		$this->db->from('posting'); //memeilih tabel
		$this->db->join('hima', 'posting.hima_id = hima.hima_id'); 
		$this->db->where('posting.hima_id',$id);
		$this->db->order_by('posting.posting_create_at','desc'); 
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
