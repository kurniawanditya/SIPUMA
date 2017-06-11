<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Posting_model');
	}
	public function index()
	{
		$total_data = $this->Posting_model->get_all_count();
        $content_per_page = 4; 
        $this->data['total_data'] = ceil($total_data->tol_records/$content_per_page);
        $this->load->view('index', $this->data, FALSE);

		// $data['postingall'] = $this->Posting_model->get_posting()->result();
		// $this->load->view('Index',$data);
	}

	public function load_more()
    {
        $group_no = $this->input->post('group_no');
        $content_per_page = 4;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->Posting_model->get_all_content($start,$content_per_page);
        if(isset($all_content) && is_array($all_content) && count($all_content)) : 
            foreach ($all_content as $key => $content) :
                 echo"
             		<div class='blog-posts'>
             			<article>
             				<div class='post-header'>
							  	<div class='row'>
									<div class='col-md-12'>
									"; if (!empty($content->hima_img)){?>
										<img class='circle-icon circle-bricky animate' src='<?php echo base_url();?>assets/frontend/images/photo-profil/<?php echo $content->hima_img;?>'/>
									<?php }else{?>
										<img class='circle-icon circle-bricky animate' src='<?php echo base_url();?>assets/frontend/images/avatar.png'/>
										<?php } ?>
										<?php echo"
										<a class='namahima' href='".base_url()."C_Hima/detail_hima/".$content->hima_id."'>".$content->hima_name."</a>
									</div>
								</div>
							</div>
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

	public function detail_posting($id)
	{
		$data['postingid'] = $this->Posting_model->get_postingbyid($id)->result();
		$this->load->view('detail_posting',$data);
	}
}
