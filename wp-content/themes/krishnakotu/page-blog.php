<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<style type="text/css">
	.home-navigation ul li:first-child{display: block;}
	#nav-fullscreen ul li a .nav-link{
		padding:30px !important;
	}
	.blog-intro .content {
    position: absolute;
    bottom: 0;
    background: rgba(0,0,0,.7);
    padding: 0px 25px;
}
.featured{
		margin-left: -25px;
		position: relative;
    	top: 8px;
}

/*** Blog ***/
body{
	line-height:0;
}
.page-wrapper {
 position:absolute;
}
.blog-wrapper{
	height:auto;
}

.blog-intro  .link-button:link, .blog-intro  .link-button:hover, .blog-intro .link-button:visited, .blog-intro .link-button:active {
    font-size: 14px;
    letter-spacing: 1px;
    line-height: 21px;
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    border: 1px solid #919598;
    padding: 10px 30px;
    border-radius: 999px;
    color: #919598;
    text-transform: uppercase;
}
.blog-intro .link-button:hover {
    transition: all 0.7s ease-out;
    background: #cd3433;
    color: #fff;
    border-color: #d0353b;
}
.blog-items .equal-height .col-xs-12{
	width:100%;
}

@media screen and (max-width: 992px){
	.blog-items {
		padding: 0;
		padding-top:70px;
	}
}
@media screen and (max-width: 768px){
.page-wrapper {
 position:relative;
}
.featured {
    margin-left: -15px;
}
#nav-fullscreen ul li a .nav-link{
	padding:20px !important
}
}
</style>

<section class="blog-wrapper">
<?php
$args = array(
	'posts_per_page' => 1,
	// 'post__in'  => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1,
	'post_status' => 'publish'
);
$query = new WP_Query( $args );
	while ($query->have_posts()) : $query->the_post();
	$exclude_featured = $post->ID; ?>
	<section class="blog-intro hidden-sm-down">
		<section class="featured-banner"><?php the_post_thumbnail(); ?></section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-7 col-md-5 offset-md-1 offset-sm-1">
					<div class="content">
					<span class="featured">Featured</span>
						<h4 class="date"><?php the_date(); ?></h4>
						<h1 class="heading"><?php the_title(); ?></h1>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" class="link-button">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; wp_reset_query(); ?>

	<section class="blog-items hidden-md-up">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="row hidden-sm-up">
							<?php
								$args = array(
									'posts_per_page' => 1,
									'post__in'  => get_option( 'sticky_posts' ),
									'ignore_sticky_posts' => 1,
									'post_status' => 'publish'
								);
								$query = new WP_Query( $args );
									while ($query->have_posts()) : $query->the_post();
									$exclude_featured = $post->ID; ?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<a href="<?php the_permalink(); ?>">
										<article class="blog-tile">
											<?php the_post_thumbnail('custom_medium'); ?>
											<div class="blog-expert">
												<p class="text-muted">
												<?php if(is_sticky(get_the_ID())) : ?>
												<span class="featured">Featured</span>
												<?php endif; ?>
												<?php echo get_the_date(); ?></p>
												<h4 class="heading">
												<?php if (strlen($post->post_title) > 30) {
													echo substr(the_title($before = '', $after = '', FALSE), 0, 30) . '...'; } else {
													the_title();
												} ?></h4>
												<p><?php the_excerpt(); ?></p>
											</div>
											<div class="read-more">
												<a href="<?php the_permalink(); ?>">Read More</a>
											</div>
										</article>
									</a>
								</div>
								<?php endwhile; wp_reset_query(); ?>

							</div>

							<div class="blog-sidebar visible-xs hidden-sm-down">
								<!-- Sidebar Content Here -->
								<?php if ( is_active_sidebar( 'blog' ) ) : ?>
										<?php dynamic_sidebar( 'blog' ); ?>
								<?php endif; ?>
							</div>

							<div class="row hidden-sm-down">
								<div class="col-md-12 blog-section">
									<h1 class="heading">Latest</h1>
									<img src="<?php echo get_template_directory_uri(); ?>/inc/img/sample-4.png" alt="line"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

	<section class="blog-items has-sidebar">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="row hidden-xs">
								<div class="col-md-12 blog-section">
									<h1 class="heading">Latest</h1>
									<img src="<?php echo get_template_directory_uri(); ?>/inc/img/sample-4.png" alt="line"/>
								</div>
							</div>
							<div class="row equal-height">
							<?php
							$args = array(
								'post_type' => 'post',
								'post__in' => null,
        				'posts_per_page' => 999,
        				'ignore_sticky_posts' => 1,
								'post__not_in' => array($exclude_featured),
								'$paged' => $paged,
								'post_status' => 'publish'
							);
							$query = new WP_Query( $args );
							while ($query->have_posts()) : $query->the_post();
							if ( $exclude_featured == get_the_ID() )
        				continue; ?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<a href="<?php the_permalink(); ?>">
										<article class="blog-tile">
											<?php the_post_thumbnail('custom_medium'); ?>
											<div class="blog-expert">
												<p class="text-muted">
												<?php if(is_sticky(get_the_ID())) : ?>
												<span class="featured">Featured</span>
												<?php endif; ?>
												<span><?php echo get_the_date(); ?>,</span>
												<span><?php the_author_meta( 'first_name' ); ?></span>
												<span><?php the_author_meta( 'last_name' );  ?></span>
												</p>
												<h4 class="heading">
												<?php if (strlen($post->post_title) > 30) {
													echo substr(the_title($before = '', $after = '', FALSE), 0, 30) . '...'; } else {
													the_title();
												} ?></h4>
												<p><?php the_excerpt(); ?></p>
											</div>
											<div class="read-more">
												<a href="<?php the_permalink(); ?>">Read More</a>
											</div>
										</article>
									</a>
								</div>
								<?php endwhile; wp_reset_query(); ?>

							</div>
						</div>
						<div class="col-md-4 blog-sidebar hidden-xs hidden-sm">
							<!-- Sidebar Content Here -->
							<?php if ( is_active_sidebar( 'blog' ) ) : ?>
									<?php dynamic_sidebar( 'blog' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
</section>
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
