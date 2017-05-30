<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="blog-posts">
					<?php foreach ($postingid as $post) {?>
						<article>
							<div class="post-header">
							  	<div class="row">
									<div class="col-md-12">
										<img class="clip-droplet circle-icon circle-bricky animate" src="<?php echo base_url();?>assets/frontend/images/hima/<?php echo $post->hima_img; ?>" /><a class="namahima" href="#"><?php echo $post->hima_name?></a>
									</div>
								</div>
							</div>
							<div class="box-post">
								<div class="row">
									<div class="col-md-12">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="post-image detail">
											<img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/images/sliders/slidebg1.png" />
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
											<a href="http://www.facebook.com/sharer.php?u=http://www.kang-cahya.com/p/advertiser-page.html" target="_blank">
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
				<div class="col-md-3">
					<aside class="sidebar">
						<form>
							<div class="input-group">
								<input type="text" id="s" name="s" placeholder="Cari Sesuatu..." class="form-control">
								<span class="input-group-btn">
									<button class="btn btn-main-color" type="submit">
										<i class="fa fa-search"></i>
									</button> </span>
							</div>
						</form>
						<hr>
						<h4>List HIMA</h4>
						<ul class="nav nav-list blog-categories">
							<li>
								<a href="#">
									HIMA AKUNTANSI
								</a>
							</li>
							<li>
								<a href="#">
									HIMA IF
								</a>
							</li>
						</ul>

						<hr>
					<!-- 	<h4>About Us</h4>
						<p>
							Culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus.
						</p> -->
					</aside>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>