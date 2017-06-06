<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
			<?php foreach($himaid as $hima){?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="header-image"><img class="img-responsive" src="<?php echo base_url();?>assets/frontend/images/bg1.jpg"></div>
					<div class="header-name"><p><?php echo $hima->hima_name; ?> <span class="clip-study" alt="verified"></span></p></div>
				</div>
			<?php } ?>
			</div>
			<a href="<?php echo base_url();?>Login/logout">
				<i class="clip-exit"></i>
				&nbsp;Log Out
			</a>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="content-hima">
						<article>
						<?php echo $this->session->flashdata('notif');?>
						<form method="POST" action="<?php echo base_url();?>Posting/add_posting"  enctype="multipart/form-data">
							<div class="form-group">
	                          <input type="hidden"  class="form-control inputposting" id="hima_id" name="hima_id" value="<?php echo $hima->hima_id; ?>">
	                          <input type="text"  class="form-control inputposting" id="posting_title" name="posting_title" placeholder="Judul Posting">
	                        </div>
	                        <div class="form-group">
	                          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	                          	 <script>
	                          	  tinymce.init({
								  selector: '#posting_description',
								  height: 100,
								  menubar: false,
								  plugins: [
								    'advlist autolink lists link image charmap print preview anchor',
								    'searchreplace visualblocks code fullscreen',
								    'insertdatetime media table contextmenu paste code'
								  ],
								  toolbar: 'undo redo | insert | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
								  content_css: [
								    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
								    '//www.tinymce.com/css/codepen.min.css']
								});
	                          </script>
	                          <textarea id="posting_description" name="posting_description" class="form-control inputposting"  placeholder="Deskripsi Posting"></textarea>
	                        </div>
	                        <div class="form-group">
	                          <input type="file"  class="form-control inputposting" id="posting_image" name="posting_image" placeholder="posting_image">
	                        </div>
	                        <div class="form-group">
	                        	<input type="submit" data-loading-text="Loading..." class="btn btn-primary btn-submit" value="Post">
	                        </div>
						<form>
						</article>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tabs">
						<ul class="nav nav-tabs">
							<li class="active" >
								<a data-toggle="tab" href="#Profile" class="tab_a"><b> Profile</b></a>
							</li>
							<li>
								<a data-toggle="tab" href="#Posting" class="tab_a"><b> Posting</b></a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="Profile" class="tab-pane active">
							<div class="heading">
          						<span class="heading-subtitle">Masukan nama pengguna dan kata sandi <strong>untuk masuk</strong></span>
							</div>
							</div>
							<div id="Posting" class="tab-pane">
								<div class="row">
								<?php foreach($postingid as $post){?>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="content-hima">
											<article>
												<div class="box-post-hima">
													<div class="row">
														<div class="col-md-12">
															<div class="post-image postme">
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
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>