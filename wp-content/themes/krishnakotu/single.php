<?php
/**
 * The Template for displaying all single posts
 */
?>

<?php get_header(); ?>

<style type="text/css">
	body{
		line-height:0;
	}
	.home-navigation ul li:first-child{display: block;}
	.page-wrapper{
		position:absolute;
	}
	.blog-wrapper{
		height:auto;
	}
	.project a:link, .project a:hover, .project a:visited, .project a:active {
		color: #fff;
	}

	.project a:last-child {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
	}

	a:hover, a:focus {
		text-decoration: none !important;
		outline: none !important;
	}
	.project-inf-overlay {
		display: table;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		width: 100%;
		max-width: 100%;
		height: 100%;
		white-space: normal;
		background: rgba(0,0,0,0.6);
		border: 15px solid transparent;
		opacity: 0;
		transition: opacity 0.7s ease-out;
	}

	.project:hover .project-inf-overlay {
		opacity: 1;
	}

	.inf-content {
		display: table-cell;
		vertical-align: bottom;
		padding: 10px;
	}
	.project p {
		font-size: 14px;
		margin: 0;
		line-height: 18px;
	}
	.project h1 {
		text-transform: uppercase;
		color: #fff;
		margin: 0;
		letter-spacing: 0;
		margin-bottom: 5px;
		font-size: 18px;
	}
	.other-blogs, .related-blogs, .related-projects {
		background: #ede9e6;
		background: -webkit-linear-gradient(135deg,#fdfdfd,#ede9e6);
		background: -o-linear-gradient(135deg,#fdfdfd,#ede9e6);
		background: -moz-linear-gradient(135deg,#fdfdfd,#ede9e6);
		background: linear-gradient(135deg,#fdfdfd,#ede9e6);
		/* margin: 0 -20px -30px -20px; */
		padding: 50px;
	}
	.container-fluid {
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
	}
	.project {
		position: relative;
		overflow: hidden;
		margin-bottom: 30px;
	}
	.other-blogs .project, .related-blogs .project, .related-projects .project {
		margin: 0;
		max-height: none;
	}

	.footer-bottom{
		padding:20px 0px;
	}
	.author-info{
			line-height:2;
	}
	footer .nav{
		display:flex;
	}

	@media screen and (min-width: 992px){
		.other-blogs .col-md-4:first-child, .related-blogs .col-md-4:first-child, .related-projects .col-md-4:first-child {
			margin-left: 16.66666667%!important;
		}
	}
	@media (min-width: 992px){
		.col-md-4 {
			width: 33.33333333%;
		}
	}
	@media screen and (max-width: 992px){
		.attachment-custom_medium, .featured-banner, .featured-banner img, #post-banner, #post-banner img {
			height: auto !important;
		}
		.blog-description .col-md-12 {
			padding: 0;
		}
	}


	@media screen and (max-width: 768px){
		.page-wrapper {
			position:relative;
		}
		.blog-wrapper {
			margin-top: 60px;
			padding: 20px 20px 0 !important;
		}
		.other-blogs, .related-blogs, .related-projects {
			padding: 50px 20px;
			margin:0px;
		}
		.other-blogs .project, .related-blogs .project, .related-projects .project {
			margin-top: 30px!important;
		}
		.other-blogs .project:first-child, .related-blogs .project:first-child, .related-projects .project:first-child {
			margin: 0;
		}
		.blog-description .white-bg {
			padding: 10px;
			margin-top: 0 !important;
			background: #fff;
		    margin-bottom: 30px;
		}
		.blog-description .white-bg>p {
			font-size: 12px;
		}
		.blog-description h1 {
			font-size: 22px;
			line-height: 30px;
			 margin: 0;
		}
		div.wp-caption.aligncenter, div.wp-caption.aligncenter img, .p2 img, p img.aligncenter{
			width:100% !important;
			height:auto;
		}
		footer .nav {
			display: inline-block;
			padding: 10px 0px;
		}
		.nav>li {
			float: right;
			width: 6em;
			text-align: left;
			padding-bottom: 2.1%;
			line-height: 1;
		}
		.footer-brand-mobile{
			padding:10px 0px;
		}
	}
</style>

<section class="blog-wrapper">
<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
	?>
<section id="post-banner">
	<?php the_post_thumbnail(); ?>
</section>
<section class="blog-description">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="white-bg">
					<p class="text-muted date text-center">
					<?php if(is_sticky(get_the_ID())) : ?>
					<span class="featured">Featured</span>
					<?php endif; ?>
					<?php the_date(); ?>&nbsp;&nbsp;<?php post_read_time(); ?></p>
					<h1 class="heading text-center"><?php the_title(); ?></h1>
					<p class="text-muted author text-center">By <?php the_author(); ?></p>
					<p class="text-center"><img src="<?php echo get_template_directory_uri(); ?>/inc/img/sample-4.png" alt="line"/></p>
					<p><?php the_content(); ?></p>

					<div class="author-info">
							<em>About <?php the_author(); ?> : <?php echo the_author_description()?></em>
							<div><a href="<?php echo get_site_url(); ?>"><?php echo get_site_url(); ?></a></div>
					</div>

					<?php $array = wp_get_post_terms(get_queried_object()->ID,'post_tags'); ?>
					<?php if(!empty($array)) : ?>
					<div class="tags">
					<?php foreach($array as $array) { ?>
						<a href="<?php echo get_site_url(); ?>/post_tags/<?php echo $array->slug; ?>" rel="tag"><?php echo $array->name; ?></a>
					<?php } ?>
					</div>
					<?php endif ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) {
						comments_template();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>
</section>

		<!--<?php if ( is_active_sidebar( 'blog' ) ) : ?>
				<?php dynamic_sidebar( 'blog' ); ?>
		<?php endif; ?>-->

	<!--Google Captcha code-->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript">

	jQuery("#submit").click(function(e){
		var data_2;
			jQuery.ajax({
					type: "POST",
					url: "<?php echo get_template_directory_uri(); ?>/google_captcha.php",
					data: jQuery('#commentform').serialize(),
					async:false,
					success: function(data) {
					if(data.nocaptcha==="true"){
							data_2=1;
							}else if(data.spam==="true")
								{
							data_2=1;
								}
							else
								{
							data_2=0;
								}
					}
			});
			if(data_2!=0){
				e.preventDefault();
				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/, email = jQuery("#email").val();
				if(jQuery("#author").val() == ''){
					alert("Please enter Name");
				}else if(!filter.test(email)){
					alert("Please enter Valid Email");
				}else if(jQuery("#comment").val() == ''){
					alert("Please enter Comments");
				}else{
					if(data_2==1){
						<?php if (!is_user_logged_in()): ?>
						alert("Please check the captcha");
						<?php endif; ?>
					}else{
						alert("Please Don't spam");
					}
				}
			}else
				{
					jQuery("#commentform").submit
				}
		});
	</script>

	<section class="text-center share-via">
		<h5>Share via</h5>
		<?php echo do_shortcode('[apss_share]') ?>
	</section>
	<?php
			// Previous Post
			$prpo1 = get_previous_post();
			$prpoid1 = $prpo1->ID;
			$prev_post_url1 = get_permalink($prpoid1);
			$postid1 = url_to_postid( $prev_post_url1 );
			$src1 = wp_get_attachment_image_src( get_post_thumbnail_id($postid1), array( 5600,1000 ), false, '' );

			// Next post
			$prpo2 = get_next_post();
			$prpoid2 = $prpo2->ID;
			$prev_post_url2 = get_permalink($prpoid2);
			$postid2 = url_to_postid( $prev_post_url2 );
			$src2 = wp_get_attachment_image_src( get_post_thumbnail_id($postid2), array( 5600,1000 ), false, '' );

			if($prpo1 != '' && $prpo2 != ''){
	?>
	<div class="other-blogs">
		<div class="container-fluid">
			<div class="row header-row">
				<div class="col-md-12 text-center">
					<h1>Other Articles</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="project">
						<a href="<?php the_permalink($postid1) ?>" title="Permanent Link to <?php the_title_attribute($postid1); ?>">
							<img src="<?php echo $src1[0]?>" alt=" " width="100%"/>
						</a>
						<a href="<?php the_permalink($postid1) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid1); ?>">
							<div class="project-inf-overlay">
								<div class="inf-content">
									<p>Previous Article</p>
									<h1><?php echo get_the_title($postid1) ?></h1>
									<p><?php echo get_field('project_brief',$postid1) ?></p>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="project">
						<a href="<?php the_permalink($postid2) ?>" title="Permanent Link to <?php the_title_attribute($postid2); ?>">
							<img src="<?php echo $src2[0]?>" alt=" " width="100%"/>
						</a>
						<a href="<?php the_permalink($postid2) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid2); ?>">
							<div class="project-inf-overlay">
								<div class="inf-content">
									<p>Next Article</p>
									<h1><?php echo get_the_title($postid2) ?></h1>
									<p><?php echo get_field('project_brief',$postid2) ?></p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } else if($prpo1 != ''){ ?>
		<div class="other-blogs">
			<div class="container-fluid">
				<div class="row header-row">
					<div class="col-md-12 text-center">
						<h1>Other Articles</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-4 col-md-offset-4">
						<div class="project">
							<a href="<?php the_permalink($postid1) ?>" title="Permanent Link to <?php the_title_attribute($postid1); ?>">
								<img src="<?php echo $src1[0]?>" alt=" " width="100%"/>
							</a>
							<a href="<?php the_permalink($postid1) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid1); ?>">
								<div class="project-inf-overlay">
									<div class="inf-content">
										<p>Previous Article</p>
										<h1><?php echo get_the_title($postid1) ?></h1>
										<p><?php echo get_field('project_brief',$postid1) ?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } else if($prpo2 != ''){ ?>
		<div class="other-blogs">
			<div class="container-fluid">
				<div class="row header-row">
					<div class="col-md-12 text-center">
						<h1>Other Articles</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-4 col-md-offset-4">
						<div class="project">
							<a href="<?php the_permalink($postid2) ?>" title="Permanent Link to <?php the_title_attribute($postid2); ?>">
								<img src="<?php echo $src2[0]?>" alt=" " width="100%"/>
							</a>
							<a href="<?php the_permalink($postid2) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid2); ?>">
								<div class="project-inf-overlay">
									<div class="inf-content">
										<p>Next Article</p>
										<h1><?php echo get_the_title($postid2) ?></h1>
										<p><?php echo get_field('project_brief',$postid2) ?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

<footer style="position:unset;">
    <div class="container">
        <div class="row footer-top">
            <div class="col-12 col-lg-6 col-md-6 footer-brand-nav hidden-xs-down footer-brand">
                <div class="h4" style="text-transform:uppercase;">Imaginea <br> Design</div>
                <div class="h6 copyright">Copyright 2017</div>
            </div>
            <div class="col-12 col-lg-6 col-md-6 footer-brand-nav">
                <ul class="nav">
                    <li><a href="<?php echo get_site_url(); ?>/about">About Us</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/services">Services</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/#intro">Projects</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/blog">Blogs</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href="">News</a></li>
                    <!-- <li><a href="">News</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href="">Blogs</a></li>
                    <li><a href="">Projects</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">About Us</a></li>-->
                </ul>
            </div>
        </div>
        <div class="row social-link-container justify-content-center">
            <div class="footer-social col-12">
                <a class="facebook" href="https://www.facebook.com/imagineadesignlabs/" target="_blank"><span class="fa fa-facebook-square"></span></a>
                <a class="twitter" href="https://twitter.com/designImaginea/" target="_blank"><span class="fa fa-twitter"></span></a>
                <a class="google-plus" href="https://plus.google.com/108043340756149547804" target="_blank"><span class="fa fa-google-plus"></span></a>
                <a class="instagram" href="https://www.instagram.com/imagineadesign" target="_blank"><span class="fa fa-instagram"></span></a>
                <a class="youtube" href="https://www.youtube.com/channel/UC6hr8CMqPQgpE600YwP0dlQ" target="_blank"><span class="fa fa-youtube-play"></span></a>
                <a class="linkedin" href="https://www.linkedin.com/company/imaginea" target="_blank"><span class="fa fa-linkedin"></span></a>
            </div>
            <div class="col-12 footer-bottom">
                <a href="">Terms &amp; Conditions</a>
                <span>&nbsp;|&nbsp;</span>
                <a href="">Privacy policy</a>
                <span>&nbsp;|&nbsp;</span>
                <a href="">FAQs</a>
            </div>
        </div>

        <div class="row hidden-sm-up"><div class="col-12 footer-brand-mobile">IDL Copyright 2017</div></div>
    </div>
    </footer>
<?php wp_footer(); ?>
<script>
window.onload = function(){
jQuery(".spinner").fadeOut();
jQuery("body").removeClass("spinner-scroll");
}
</script>
</body>
</html>
