<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="keywords" content="ui,personas,ux,useful,affordable,ui design,usability,photography,film making, gymnastics, krishna chaitanya kotu, chaitanya gymnast, legacy pixels, funvilla's, gymnastics">

		<title>Krishna Chaitanya</title>
		<?php wp_head(); ?>
	</head>
	<body class="home-page spinner-scroll">
		<section class="page-wrapper" id="wrapper">
			<div class="spinner">
				<div class="spin-holder">
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/pageLoader.gif" alt="Loading Krishna's World" />
				</div>
			</div>
			<!-- Home Header -->
			<header class="home-header">
                <a href="<?php echo get_site_url(); ?>" class="krish-logo m-2">
                    <?php echo file_get_contents(get_template_directory_uri() . "/inc/img/krish-logo-2.svg"); ?>
                </a>
                <a id="nav-toggle" class="m-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
				<div class="container-fluid">
					<div class="row">
						<div class="col-9 col-md-9">

						</div>
						<div class="col-3 col-md-3 text-right">

						</div>
					</div>
				</div>
				<div id="nav-container">
					<div id="nav-overlay"></div>
					<nav id="nav-fullscreen">
						<ul>
<!--
							<li>
								<a href="<?php echo get_site_url(); ?>/projects">
									<span class="nav-link">Projects</span>
								</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/writings">
									<span class="nav-link">Writings</span>
								</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/art">
									<span class="nav-link">Arts</span>
								</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/blog">
									<span class="nav-link">Blogs</span>
								</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/contact">
									<span class="nav-link">Contact</span>
								</a>
							</li>
-->
							<li>
								<a href="<?php echo get_site_url(); ?>/legacy-pixels">

									<span class="nav-link">Legacy Pixels</span>
								</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/funvillas">

									<span class="nav-link">Funvilla's</span>
								</a>
							</li>
						</ul>
					</nav>

				</div>
			</header>
