<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="blog-posts">
					<?php foreach ($postingall as $post) {?>
						<article>
							<div class="post-header">
							  	<div class="row">
									<div class="col-md-12">
										<img class="clip-droplet circle-icon circle-bricky animate" src="<?php echo base_url();?>assets/frontend/images/hima/<?php echo $post->hima_img; ?>" /><a class="namahima" href="<?php echo base_url();?>C_Hima/detail_hima/<?php echo $post->hima_id; ?>"><?php echo $post->hima_name?></a>
									</div>
								</div>
							</div>
							<div class="box-post">
								<div class="row">
									<div class="col-md-12">
										<div class="post-image postme">
											<img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/images/bg.jpg" />
										</div>
									</div>
									<div class="col-md-12">
										<div class="post-content">
											<h4>
												<?php echo $post->posting_title; ?>
											</h4>
											<span class="waktu"> <?php echo date('d F Y', strtotime($post->posting_create_at));?></span>
											<p>
												<?php echo character_limiter( $post->posting_description,200);?>
												<a class="btn btn-dark-grey btn-xs" href="<?php echo base_url();?>Index/detail_posting/<?php echo $post->posting_id; ?>">
													Selengkapnya <i class="fa fa-arrow-circle-right"></i>
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="post-meta">
											<a href="http://www.facebook.com/sharer.php?u=<?php echo base_url();?>Index/detail_posting/<?php echo $post->posting_id; ?>" target="_blank">
											<button class="btn btn-facebook">
												<i class="fa fa-facebook"></i>
												| Share Ke Facebook
											</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</article>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>