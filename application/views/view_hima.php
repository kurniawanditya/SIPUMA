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
									 foreach ($himalist as $hima){?>
									<li class="col-md-12 col-sm-12 col-xs-12 hima-list">
										<div class="row">
											<div class="col-md-5">
												<div class="thumbnail">
													<?php 
										              	if(!empty($hima->hima_img)){?>
												 			<img class="img-responsive imghima" src="<?php echo base_url()."assets/frontend/images/photo-profil/".$hima->hima_img; ?>">
										              	<?php }else{?>
										              		<img class="img-responsive imghima" src="<?php echo base_url();?>assets/frontend/images/avatar.png">
										              	<?php }
										              ?>
												</div>
											</div>
											<div class="col-md-7">
												<h3><a href="<?php echo base_url(); ?>C_Hima/detail_hima/<?php echo $hima->hima_id; ?>"><?php echo $hima->hima_name; ?></a></h3>
												<div itemprop="description" class="team-member-description">
													<p>
														<?php echo $hima->hima_desc; ?>
													</p>
												</div>
											</div>
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