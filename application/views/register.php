<?php include("header.php"); ?>
<div class="main-container">
	<section class="wrapper padding50">
		<div class="container">
			<div class="row">

				<?php if (!empty($this->session->flashdata('notif'))){ ?>
					<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('notif');?></div><br>
				<?php } ?>
				<div class="col-md-4 no-padding no-margin">
					<div class="kiri">
						<h1>
							LOGIN<br>
							CONNECT<br>
							WITH PEOPLE
						</h1>
					</div>
				</div>
				<div class="col-md-8 no-padding no-margin login">
					<div class="tabs">
						<ul class="nav nav-tabs">
							<li class="active" >
								<a data-toggle="tab" href="#Masuk" class="tab_a"><b> MASUK</b></a>
							</li>
							<li>
								<a data-toggle="tab" href="#Daftar" class="tab_a"><b> DAFTAR</b></a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="Masuk" class="tab-pane active">
							<div class="heading">
          						<span class="heading-subtitle">Masukan nama pengguna dan kata sandi <strong>untuk masuk</strong></span>
							</div>
								<?=form_open('Login/login',array('class'=>'form-login'));?>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">Nama Pengguna</span>
													<input type="text" id="name" class="form-control " maxlength="100" data-msg-required="Silahkan isi username anda" value="" name="username" required>
												</div>
												
											</div>
											<div class="col-md-12">
												<div class="input-group">
													  <span class="input-group-addon" id="basic-addon1">Nama Hima</span>
														<input type="password" id="password" name="password" class="form-control " maxlength="100" data-msg-required="Kata Sandi Salah" required>
													</div>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<input type="submit" data-loading-text="Loading..." class="btn btn-teal" value="Masuk">
											</div>
											<div class="col-md-6 forgot-password">
												<!-- <a href="#">Lupa Password</a> -->
											</div>
										</div>
									</div>
								<?=form_close();?>
							</div>
							<div id="Daftar" class="tab-pane">
								<div class="heading">
          						<span class="heading-subtitle">Daftar sekarang untuk mendapatkan nama pengguna dan kata sandi</span>
							</div>
								<form method="POST" action="<?php echo base_url();?>C_Hima/add_hima"  enctype="multipart/form-data">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">Nama Hima</span>
													<input type="text" id="name" class="form-control" maxlength="100" value="" name="hima_name" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">Email</span>
												  	<input type="email" id="email" name="hima_email" class="form-control" maxlength="100" required>
												</div>
												
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">password</span>
												  	<input type="password" id="email" name="hima_password" class="form-control" maxlength="100" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">Universitas</span>
												  <select class="form-control" name="hima_univ"  aria-describedby="basic-addon1" required>
												  	<?php foreach ($univ as $un) { ?>
												  		<option value="<?php echo $un->universitas_id ?>"><?php echo $un->universitas_name ?></option>
												  	<?php } ?>
												  </select>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">Fakultas</span>
												  <select class="form-control" name="hima_fak"  aria-describedby="basic-addon1" required>
												  	<?php foreach ($fakul as $un) { ?>
												  		<option value="<?php echo $un->fakultas_id ?>"><?php echo $un->fakultas_name ?></option>
												  	<?php } ?>
												  </select>
												</div>
											</div>

											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1">File </span>
												  <input type="file" name="hima_file" class="form-control" required>
												</div>
												
											</div>
											<label class="lab">Sertakan berkas/surat yang mengatakan anda adalah HIMA dari Kampus Anda</label>
										</div>
									</div>
									<?php echo $this->session->flashdata('notif');?>
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<input type="submit" data-loading-text="Loading..." class="btn btn-teal" value="Daftar">
											</div>
											<div class="col-md-6 forgot-password">
												<!-- <a href="#">Lupa Password</a> -->
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>