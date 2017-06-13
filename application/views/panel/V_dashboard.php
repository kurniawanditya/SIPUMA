<!-- start: PAGE -->
			<div class="main-content">
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li class="active">
									<i class="clip-file"></i>
										<?php echo $pages ?>
								</li>
								<li class="search-box">
									<form class="sidebar-search">
										<div class="form-group">
											<input type="text" placeholder="Start Searching...">
											<button class="submit">
												<i class="clip-search-3"></i>
											</button>
										</div>
									</form>
								</li>
							</ol>
							<div class="page-header">
								<h1>Dashboard</h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-3">
							<div class="core-box">
								<div class="heading">
									<i class="clip-user-3 circle-icon circle-green"></i>
									<h2><?= $jml_universitas ?> Universitas</h2>
								</div>
								<div class="content">Jumlah data Universitas ada <?= $jml_universitas ?> </div>
								<a class="view-more" href="<?php echo base_url()?>Dashboard">
									Selengkapnya <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="core-box">
								<div class="heading">
									<i class="clip-clip circle-icon circle-teal"></i>
									<h2><?= $jml_fakultas ?> Fakultas</h2>
								</div>
								<div class="content">Jumlah data Fakultas ada <?= $jml_fakultas ?> </div>
								<a class="view-more" href="<?php echo base_url()?>Fakultas">
									Selengkapnya <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="core-box">
								<div class="heading">
									<i class="clip-database circle-icon circle-bricky"></i>
									<h2><?= $jml_hima ?> Hima</h2>
								</div>
								<div class="content">Jumlah data Hima ada <?= $jml_hima ?> </div>
								<a class="view-more" href="<?php echo base_url()?>Hima">
									Selengkapnya <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="core-box">
								<div class="heading">
									<i class="clip-database circle-icon circle-bricky"></i>
									<h2><?= $jml_role ?> Role</h2>
								</div>
								<div class="content">Jumlah data Role ada <?= $jml_role ?> </div>
								<a class="view-more" href="<?php echo base_url()?>Role">
									Selengkapnya <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="core-box">
								<div class="heading">
									<i class="clip-database circle-icon circle-teal"></i>
									<h2><?= $jml_user ?> User</h2>
								</div>
								<div class="content">Jumlah data User ada <?= $jml_user ?> </div>
								<a class="view-more" href="<?php echo base_url()?>User">
									Selengkapnya <i class="clip-arrow-right-2"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
						Hallo <?php echo $username ?> anda login sebagai Admin
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->
