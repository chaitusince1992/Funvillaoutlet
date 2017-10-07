<?php
/*
Template Name: Research
*/
?>

<?php get_header(); ?>
<style type="text/css">
	.home-navigation ul li:first-child{display: block;}
</style>
<div id="labnrats" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container-fluid">
			<div class="row header-row">
				<div class="col-md-offset-2 col-md-8 col-md-offset-2 text-center">
					<h1>Formalized Curiosity</h1>
					<div><img src="<?php echo get_template_directory_uri(); ?>/inc/img/sample-4.png" alt="" /></div>
					<p>The future does not arrive on its own. It arrives because the thinkers take it upon them to arrive at something unpredictable. The "unpredictable" has always been the reason history has been rewritten. There have been solutions to problems age old that haven’t been seen. That line of thought, to view an existing issue differently and also to foresee a problem before its time, is called curiosity.</p>
					<h4><strong>"We are curious"</strong></h4>
				</div>
			</div>
			<div class="row labs-content">

			<?php
			$id = get_the_ID();
			while ( have_posts() ) : the_post();
				$pages = get_posts(array(
					'post_type' => 'page',
					'meta_key' => '_wp_page_template',
					'post_parent' => $id,
					 // 'meta_value' => array('page-research-des.php', 'page-iot-des.php'),
					'numberposts'=> -1
				));
				foreach($pages as $page){ ?>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="lab-box">
						<div class="row">
							<div class="col-md-12">
								<?php $title =  get_the_title($page->ID) ?>
								<h1 class="visible-xs"><?php echo $title ?></h1>
								<h2 class="visible-xs">
									<?php
										$tags = '';
										$posttags = get_the_tags($page->ID);
										if ($posttags) {
											foreach($posttags as $tag) {
												$tags .= $tag->name.' / ';
											}
											echo $tags;
										}
									?>
								</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-12 col-md-12 research-tags" data-tags="<?php echo $tags ?>">
								<div class="lab-image" data-title="<?php echo $title ?>">
									<?php $image = get_field('tile_image',$page->ID);?>
									<img src="<?php echo $image['url']; ?>" alt="Tile Image">
								</div>
							</div>
							<div class="col-xs-6 col-sm-12 col-md-12">
							<?php
								$projectsBreif = get_field( "research_brief",$page->ID );
								if($projectsBreif){ ?>
								<p><?php echo get_field('research_brief',$page->ID) ?></p>
								<?php }else{ ?>
								<p><?php echo get_field('iot_project_brief',$page->ID) ?></p>
								<?php }?>
							</div>
						</div>
						<div class="explore-link">
							<?php $assets = get_field('main_body',$page->ID);
							$retail_assets=get_field('iot_main_body',$page->ID);
							if( $assets == 'Yes' || $retail_assets = 'Yes'){ ?>
								<a href="<?php echo  get_permalink($page->ID) ?>">Explore</a>
							<?php } ?>
						</div>
					</div>
				</div>

				<?php } endwhile; ?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>
