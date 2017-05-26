<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo $title; ?></title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/fonts/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/theme_light.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/print.css" type="text/css" media="print"/>
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY DATATABLE-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/DataTables/media/css/DT_bootstrap.css" />
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY FORM VALIDATION-->
		<link rel="stylesheet" href="?php echo base_url();?>assets/admin/plugins/summernote/build/summernote.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<!-- start: HEADER -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<a class="navbar-brand" href="index.html">
						<img src="<?php echo base_url();?>assets/admin/images/logo.png" width="120px" height="30px">
					</a>
					<!-- end: LOGO -->
				</div>
				<div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<img src="<?php echo base_url();?>assets/admin/images/ava.png" class="circle-img" alt="">
								<span class="username"><?php echo $username ?></span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url();?>Login/logout">
										<i class="clip-exit"></i>
										&nbsp;Log Out
									</a>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">