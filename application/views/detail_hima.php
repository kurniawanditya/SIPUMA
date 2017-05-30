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
												<?php echo character_limiter( $post->posting_description,200);?><a href="<?php echo base_url();?>
												welcome/detail_posting/<?php echo $post->posting_id; ?>">Selengkapnya</a>
											</p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="post-meta">
											<span><a href="http://www.facebook.com/sharer.php?u=http://www.kang-cahya.com/p/advertiser-page.html" target="_blank">Share To Facebook</a></span>
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
	</section>
</div>
<?php include("footer.php"); ?>