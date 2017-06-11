<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_hima extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();		
		$this->load->model('Hima_model');
	}
	public function index()
	{
		$data['data'] = $this->Hima_model->get_hima()->result();
		$this->load->view('view_hima',$data);
	}
	public function detail_hima($id)
	{	
		$total_data = $this->Hima_model->get_all_count_byhima($id);
        $content_per_page = 4; 
        $this->data['total_data'] = ceil($total_data->tol_records/$content_per_page);
		$this->data['himaid'] = $this->Hima_model->get_himabyid($id)->result();
        $this->load->view('detail_hima', $this->data, FALSE);

		// $data['postingid'] = $this->Hima_model->get_postingbyhima($id)->result();
		// $this->load->view('detail_hima',$data);

	}
	public function load_more($id)
    {
        $group_no = $this->input->post('group_no');
        $content_per_page = 4;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->Hima_model->get_all_content($id,$start,$content_per_page);
        if(isset($all_content) && is_array($all_content) && count($all_content)) : 
            foreach ($all_content as $key => $content) :
                 echo"
             		<div class='blog-posts'>
             			<article>
							<div class='box-post'>
								<div class='row'>
									"; if(!empty($content->posting_image)){ echo"
									<div class='col-md-12'>
										<div class='post-image postme'>
											<center>
											<img class='img-responsive' src='".base_url()."gambar/".$content->posting_image."'/>
											</center>
										</div>
									</div>
									";}else{

									}echo "
									<div class='col-md-12'>
										<div class='post-content'>
											<h4>
												".$content->posting_title."
											</h4>
											<span class='waktu'>".date('d F Y', strtotime($content->posting_create_at))."</span>
											<p>
												".character_limiter( $content->posting_description,200)."
												<a class='view-more' href='".base_url()."Index/detail_posting/".$content->posting_id."'>
													Selengkapnya <i class='fa fa-angle-right'></i>
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class='row'>
									<div class='col-md-12'>
										<div class='post-meta'>
											<a href='http://www.facebook.com/sharer.php?u=".base_url()."Index/detail_posting/".$content->posting_id."' target='_blank'>
											<button class='btn btn-facebook'>
												<i class='fa fa-facebook'></i>
											</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</article>
             		</div>
             		";                 
            endforeach;                                
        endif; 
    }
	public function add_hima() {
		$this->form_validation->set_rules('hima_name','hima name','required|min_length[4]');
		$this->form_validation->set_rules('hima_email','hima email','required|min_length[12]');

		 if($this->form_validation->run()!=false)
		 {
			$data = array(
				'hima_name' =>$this->input->post('hima_name'),
				'hima_email' => $this->input->post('hima_email'),
			);

			$insert = $this->Hima_model->addhima_db($data);
			echo json_encode(array("status" => TRUE)); 
			$this->session->set_flashdata('notif','Silahkan tunggu 2x24 jam untuk dapatkan konfirmasi di email anda');
             redirect(base_url('Loginhima'));
		}
		else 
		{
			  $this->load->view('register');
		}
		
	}
}
