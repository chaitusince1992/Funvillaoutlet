<?php
/*
Template Name: Research Description
*/
?>

<?php get_header(); ?>
<style type="text/css">
	.home-navigation ul li:first-child{display: block;}
	.video{
		text-align: center;
	}
	iframe{
		height: 50vh;
		width: 50vw;
		margin: 0 auto;
	}
	@media screen and (max-width: 680px){
		iframe{
			width: 100%;
			height: auto;
		}
	}
</style>
	<?php
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
		$curl = get_field('casestudyurl',get_the_ID());
	?>
	<section class="project-intro" style="background-image: url(<?php echo $src[0]; ?> );">
	<img src="<?php echo $src[0]; ?>" alt="" class="img-responsive visible-xs">
		<div class="project-title-sub">
			<h1 class="project-title-box" data-casestudy="<?php echo $curl ?>"><?php echo get_the_title($page->ID) ?></h1>
			<span class="project-tags">
				<?php
					$posttags = get_the_tags();
					if ($posttags) {
						foreach($posttags as $tag) {
							echo '<span>'.$tag->name.'</span> ';
						}
					}
				?>
			</span>
		</div>
	</section>
	<section class="project-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 pro-title">
					<h1 class="project-title"></h1>
				</div>
			</div>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-xs-12 col-sm-12 col-md-9 description">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
					</article>
				</div>
				<?php endwhile;?>

				<div class="col-xs-12 col-sm-12 col-md-3 additional-details">
					<!-- Tenure -->
					<div class="info">
						<strong>Timeline</strong>
						<p class="timeline"><?php echo get_field('research_tenure',get_the_ID()) ?></p>
					</div>
					<!-- Client -->
					<div class="info">
						<strong>Client</strong>
						<p class="client"><?php echo get_field('research_client',get_the_ID()) ?></p>
					</div>
					<!-- Domain -->
					<div class="info">
						<strong>Domain</strong>
						<p class="domain"><?php echo get_field('research_domain',get_the_ID()) ?></p>
					</div>
					<!-- Role -->
					<div class="info">
						<strong>Role</strong>
						<p class="role"><?php echo get_field('research_role',get_the_ID()) ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php $assets = get_field('showcase_assets');
	if( $assets == 'Yes' ){ ?>

	<?php $image = get_field('showcase_image');
	if( !empty($image) ): ?>
	<!-- Showcase Images -->
	<section class="project-banner" style="background-image:url(<?php echo $image['url']; ?>)">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="banner-image-holder">
						<img src="<?php echo get_field('showcase_content_image')['url']; ?>" alt=" "/>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="content">
						<h1 class="heading"><?php echo get_field('showcase_title',get_the_ID()) ?></h1>
						<p><?php echo get_field('showcase_des',get_the_ID()) ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php } ?>

	<?php $testimonials = get_field('testimonials');
	if( $testimonials == 'Yes' ){ ?>
	<!-- Testimonial Stats -->
	<section class="testimonial-stats">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="heading"><?php echo get_field('research_testimonial_heading',get_the_ID()) ?></h1>
					<div><img src="<?php echo get_template_directory_uri(); ?>/inc/img/sample-4.png" alt="" /></div>
					<h2><?php echo get_field('research_testimonial_description',get_the_ID()) ?></h2>
					<div class="share-options">
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php $videoUrl = get_field('video-youtube',get_the_ID());
	if( $videoUrl != '' ){ ?>
	<section class="video">
		<iframe width="100%" height="100%" src="<?php echo $videoUrl ?>" frameborder="0" allowfullscreen></iframe>
	</section>
	<?php } ?>

	<!-- More -->
	<section class="more-content">
		<?php echo get_field('more_content_research',get_the_ID()) ?>
	</section>

	<!--Share Icons-->
	<section class="text-center share-via">
		<h5>Share via</h5>
		<?php echo do_shortcode('[apss_share]') ?>
	</section>

	<?php
		if($curl != ''){
	?>
		<!-- Download Case Study -->
		<section class="download-case-study">
			<form role="form" id="csform">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">Interested to know more?</h3>
							<h4 class="text-center">Get the detailed case study here</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 col-sm-offset-1 col-md-offset-1">
							<label class="sr-only" for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3">
							<label class="sr-only" for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required/>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3">
							<label class="sr-only" for="company">Company</label>
							<input type="text" class="form-control" id="company" name="company" placeholder="Company Name" required/>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-2">
							<button type="submit" class="btn">
								<div class="spinner-loader">Loading…</div>
								Email Me
							</button>
						</div>
					</div>
				</div>
			</form>
		</section>
	<?php } ?>

	<!-- Related Projects-->
	<?php
		$relatedBlog1 = get_field('related_blog_one',get_the_ID());
		$relatedBlog2 = get_field('related_blog_two',get_the_ID());
		$postid1 = url_to_postid( $relatedBlog1 );
		$postid2 = url_to_postid( $relatedBlog2 );
		$src1 = wp_get_attachment_image_src( get_post_thumbnail_id($postid1), array( 5600,1000 ), false, '' );
		$src2 = wp_get_attachment_image_src( get_post_thumbnail_id($postid2), array( 5600,1000 ), false, '' );
		if($relatedBlog1 != '' && $relatedBlog2 != ''){
	?>
		<section class="related-blogs">
			<div class="container-fluid">
				<div class="row header-row">
					<div class="col-md-12 text-center">
						<h1>Related Blogs</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<div class="project">
							<a href="<?php the_permalink($postid1) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid1); ?>">
								<img src="<?php echo $src1[0]?>" alt=" " width="100%"/>
							</a>
							<a href="<?php the_permalink($postid1) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid1); ?>">
								<div class="project-inf-overlay">
									<div class="inf-content">
										<h1><?php echo get_the_title($postid1) ?></h1>
										<p><?php echo get_field('project_brief',$postid1) ?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="project">
							<a href="<?php the_permalink($postid2) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid2); ?>">
								<img src="<?php echo $src2[0]?>" alt=" " width="100%"/>
							</a>
							<a href="<?php the_permalink($postid2) ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute($postid2); ?>">
								<div class="project-inf-overlay">
									<div class="inf-content">
										<h1><?php echo get_the_title($postid2) ?></h1>
										<p><?php echo get_field('project_brief',$postid2) ?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	<script>
	jQuery(document).ready(function(){
		jQuery(".project-content .description p").not(':first').wrapAll("<div class='newspaper-style' />");
		jQuery(".project-title").text(jQuery(".project-content .description p:first").text());
		jQuery(".project-content .description p:first").remove();
	});
	</script>

<?php get_footer(); ?>
