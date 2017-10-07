<?php
/*
Template Name: Projects
*/
?>

<?php get_header(); ?>
<style type="text/css">
.page-wrapper{
	background: #fff url(<?php echo get_template_directory_uri(); ?>/inc/img/projects-background.png) no-repeat;
	background-size: cover;
	background-attachment: fixed;
}

.home-navigation ul li:first-child{display: block;}
</style>
<div id="projects" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- Sorting Projects -->
		<nav class="sort-projects">
			<ul>
				<li class="active allFilter"><a href="#" data-domain="all">ALL</a></li>
				<li class="SocialFilter"><a href="#" data-domain="Social">Social<!-- (<span class="social-count"></span>)--></a></li>
				<li class="TravelFilter"><a href="#" data-domain="Travel">Travel<!--  (<span class="travel-count"></span>)--></a></li>
				<li class="FinanceFilter"><a href="#" data-domain="Finance">Finance<!--  (<span class="finance-count"></span>)--></a></li>
				<li class="HRSystemsFilter"><a href="#" data-domain="HR">HR Systems<!--  (<span class="hr-count"></span>)--></a></li>
				<li class="HealthcareFilter"><a href="#" data-domain="Healthcare">Healthcare<!--  (<span class="healthcare-count"></span>)--></a></li>
				<li class="RapidApplicationDevelopmentFilter"><a href="#" data-domain="Rapid">RAD<!--  (<span class="rad-count"></span>)--></a></li>
				<li class="ProductsFilter"><a href="#" data-domain="Products">Products<!--  (<span class="products-count"></span>)--></a></li>
				<li class="MusicFilter"><a href="#" data-domain="Music">Music<!--  (<span class="music-count"></span>)--></a></li>
			</ul>
		</nav>
		<div class="container-fluid">
			<div class="row projects-holder">
				<?php
					$pages = get_posts(array(
						'post_type' => 'page',
						'meta_key' => '_wp_page_template',
						'meta_value' => 'page-project-des.php',
						'numberposts'=> -1
					));
					foreach($pages as $page){
						$domain = get_field('specify_domain',$page->ID);
						?>
						<div class="col-xs-12 col-sm-6 col-md-4 pdomain <?php echo $domain ?>" data-domain="<?php echo $domain ?>">
							<div class="project" id="<?php echo $page->ID ?>">
								<a href="<?php echo  get_permalink($page->ID) ?>">
									<?php echo  get_the_post_thumbnail( $page->ID, 'medium' ) ?>
								</a>
								<a href="<?php echo  get_permalink($page->ID) ?>">
									<div class="project-inf-overlay">
										<div class="inf-content">
											<h1><?php echo get_the_title($page->ID) ?></h1>
											<p><?php echo get_field('project_brief',$page->ID) ?></p>
										</div>
									</div>
								</a>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
	</main>
	<script>
		jQuery(document).ready(function(){
			/* Set Projects Count
			jQuery(".hr-count").text(jQuery('.HR').length);
			jQuery(".social-count").text(jQuery(".Social").length);
			jQuery(".travel-count").text(jQuery(".Travel").length);
			jQuery(".healthcare-count").text(jQuery(".Healthcare").length);
			jQuery(".rad-count").text(jQuery(".Rapid").length);
			jQuery(".products-count").text(jQuery(".Products").length);
			jQuery(".finance-count").text(jQuery(".Finance").length);*/

			jQuery(".sort-projects li a").on("click",function(e){
				e.preventDefault();
				jQuery(".sort-projects li").removeClass("active");
				jQuery(this).parent().addClass("active");
				var category = jQuery(this).attr("data-domain");
				if(category === "all"){
					jQuery(".projects-holder .pdomain").hide();
					jQuery(".projects-holder .pdomain").fadeIn("slow");
				}
				else{
					jQuery(".projects-holder .pdomain").hide();
					jQuery(".projects-holder .pdomain."+category).fadeIn("slow");
				}
			});

			// Domain Filtering
			var category = '';
			if(window.location.hash) {
				var hash = window.location.hash.replace("#",'').replace(/ /g,'')
				jQuery(".sort-projects li").removeClass("active");
				jQuery(".sort-projects li."+hash+"Filter").addClass("active");
				category = jQuery(".sort-projects li.active a").attr("data-domain");
				jQuery(".projects-holder .pdomain").hide();
				jQuery(".projects-holder .pdomain."+category).fadeIn("slow");
			}
		});
	</script>
</div>
<?php get_footer(); ?>
