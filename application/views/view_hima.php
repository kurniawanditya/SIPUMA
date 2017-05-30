<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<h1 class="center">Himpunan Mahasiswa</h1>
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<ul class="team-list animate-group">
									<?php 
									 foreach ($data as $hima){?>
									<li class="col-md-3 col-sm-3 col-xs-6 hima-list">
										<div class="thumbnail">
											<img class="animate" src="<?php echo base_url(); ?>assets/frontend/images/hima/<?php echo $hima->hima_img; ?>" alt="" data-animation-options='{"animation":"fadeInLeft", "duration":"200"}'>
											<span class="image-overlay"><a target="_blank" href="#"><i data-original-title="Detail" data-placement="top" class="tooltips clip-stack-2 circle-icon circle-small"></i></a></span>
										</div>
										<h3><?php echo $hima->hima_name; ?></h3>
										<div>
											Universitas Komputer Indonesia
										</div>
										<div itemprop="description" class="team-member-description">
											<p>
												<?php echo $hima->hima_desc; ?>
											</p>
										</div>
									</li>	
									<?php } ?>							
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>