<?php
/**
* theme's functions and definitions
*/
/**
* First, let's set the maximum content width based on the theme's design and stylesheet.
* This will limit the width of all uploaded images and embeds.
*/
if ( ! isset( $content_width ) )
	$content_width = 320; /* pixels */
if ( ! function_exists( 'theme_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which runs
* before the init hook. The init hook is too late for some features, such as indicating
* support post thumbnails.
*/
function theme_setup() {
/**
* Make theme available for translation.
* Translations can be placed in the /languages/ directory.
*/
load_theme_textdomain( 'imaginea', get_template_directory() . '/languages' );
/**
* Add default posts and comments RSS feed links to <head>.
		*/
add_theme_support( 'automatic-feed-links' );

		/**
		* Enable support for post thumbnails and featured images.
		*/
		add_theme_support( 'post-thumbnails' );

		/**
		* Add support for two custom navigation menus.
		*/
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'theme' ),
			'secondary' => __('Secondary Menu', 'theme' )
		) );

		/**
		* Enable support for the following post formats:
		* aside, gallery, quote, image, and video
		*/
		add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
		add_theme_support( 'post-thumbnails');
		add_image_size( 'custom_medium', 410, 230, true);
				/**
				* Register twitter widget.
				*/
				function tweets_widgets_init() {
					register_sidebar( array(
						'name'          => 'tweets widget',
						'id'            => 'tweets',
						'before_widget' => '<div>',
						'after_widget'  => '</div>',
						'before_title'  => '<h2>',
						'after_title'   => '</h2>',
					) );
				}
				add_action( 'widgets_init', 'tweets_widgets_init' );
			/**
				* Register blog widget.
				*/
				function blog_widgets_init() {
					register_sidebar( array(
						'name'          => 'blog widget',
						'id'            => 'blog',
						'before_widget' => '<div>',
						'after_widget'  => '</div>',
						'before_title'  => '<h2>',
						'after_title'   => '</h2>',
					) );
				}
				add_action( 'widgets_init', 'blog_widgets_init' );
				/*Add Google captcha field to Comment form*/
				if (! is_user_logged_in() ) {
					add_filter('comment_form','add_google_captcha');
					function add_google_captcha(){
						echo '<div class="g-recaptcha" data-sitekey= "6LenWRkTAAAAAMYsyi21nAREo91OBn5FLnsr2x_Y"></div>';
					}
				}
				/*End of Google captcha*/
				/* Remove tags widget from post admin dashboard */
				function remove_my_post_metaboxes() {
				remove_meta_box( 'tagsdiv-post_tag','post','normal' ); // Tags Metabox
			}
			add_action('admin_menu','remove_my_post_metaboxes');
			/**
			* Add custom taxonomies
			*/
			function add_custom_taxonomies() {
				// Add new "Post Tags" taxonomy to Posts
				register_taxonomy('post_tags', 'post', array(
					// Hierarchical taxonomy (like categories)
					'hierarchical' => true,
					// This array of options controls the labels displayed in the WordPress Admin UI
					'labels' => array(
						'name' => _x( 'Post Tags', 'taxonomy general name' ),
						'singular_name' => _x('Post Tags', 'taxonomy singular name' ),
						'search_items' =>  __( 'Search Post Tags' ),
						'all_items' => __( 'All Post Tags' ),
						'parent_item' => __( 'Parent post_tags' ),
						'parent_item_colon' => __( 'Parent Post Tags:' ),
						'edit_item' => __( 'Edit Post Tags' ),
						'update_item' => __( 'Update Post Tags' ),
						'add_new_item' => __( 'Add New Post Tags' ),
						'new_item_name' => __( 'New Post Tags Name' ),
						'menu_name' => __( 'Post Tags' ),
					),
					// Control the slugs used for this taxonomy
					'rewrite' => array(
						'slug' => 'post_tags',
						'with_front' => false,
						'hierarchical' => false
					),
				));
			}
			add_action( 'init', 'add_custom_taxonomies', 0 );
			function new_excerpt_length($length) {
				return 25;
			}
			add_filter('excerpt_length', 'new_excerpt_length');
			/**
				* Remove jQuery migrate script
			*/
				add_filter( 'wp_default_scripts', 'barrjoneslegal_remove_jquery_migrate' );
				function barrjoneslegal_remove_jquery_migrate( &$scripts ) {
					if ( ! is_admin() ) :
						$scripts->remove( 'jquery' );
						$scripts->add( 'jquery', false, array( 'jquery-core' ), false );
					endif;
				}
				function wpb_latest_sticky() {
					/* Get all sticky posts */
					$sticky = get_option( 'sticky_posts' );
					/* Sort the stickies with the newest ones at the top */
					rsort( $sticky );
					/* Get the 5 newest stickies (change 5 for a different number) */
					$sticky = array_slice( $sticky, 0, 5 );
					/* Query sticky posts */
					$the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
			// The Loop
					if ( $the_query->have_posts() ) {
						$return .= '<ul>';
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$return .= '<li><a href="' .get_permalink(). '" title="'  . get_the_title() . '">' . get_the_title() . '</a></li>';
						}
						$return .= '</ul>';
					} else {
				// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					return $return;
				}
				add_shortcode('latest_stickies', 'wpb_latest_sticky');
				add_filter('widget_text', 'do_shortcode');
			}
		endif; // theme_setup
		add_action( 'after_setup_theme', 'theme_setup' );
			/**
			* Enqueue scripts and styles
			**/
			function insidekris_scripts() {
				wp_enqueue_style( 'kris-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css', array(), false );
				wp_enqueue_style( 'kris-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), false );
//				wp_enqueue_style( 'kris-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css', array(), false );
				wp_enqueue_style( 'kris-style', get_stylesheet_uri() );
				wp_enqueue_style( 'kris-fullpage', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.4/jquery.fullpage.css', array(), false );
				 wp_enqueue_script( 'kris-fullpage-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.4/jquery.fullpage.min.js', array( 'jquery' ), '20160627', true );



//				wp_enqueue_script( 'kris-slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', array( 'jquery' ), '20160627', true );
				if ( is_home() &&  is_front_page() ) {
					wp_enqueue_script( 'kris-home', get_template_directory_uri() . '/inc/js/home.js', array( 'jquery','kris-fullpage-js' ),'20160627', true );
//					wp_enqueue_script( 'kris-bodymovin', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/4.10.2/bodymovin.min.js', array( 'jquery' ), true );
				}
				if ( !is_home() &&  !is_front_page() ) {
					wp_enqueue_script( 'kris-custom', get_template_directory_uri() . '/inc/js/custom.js', array( 'jquery','kris-fullpage-js' ), '20160627', true );
				}
			}
			add_action( 'wp_enqueue_scripts', 'insidekris_scripts' );
		// Defer Javascripts
		// Defer jQuery Parsing using the HTML5 defer property
			if (!(is_admin() )) {
				function defer_parsing_of_js ( $url ) {
					if ( FALSE === strpos( $url, '.js' ) ) return $url;
					if ( strpos( $url, 'jquery.js' ) ) return $url;
		// return "$url' defer ";
					return "$url' defer onload='";
				}
				add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
			}
			/*custom functions*/
			function my_responsive_thumbnail($post_id){
	// Get the featured image ID
				$attachment_id = get_post_thumbnail_id($post_id);
	// Get alt text or set the $alt_text variable to the post title if no alt text exists
				$alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
				if ( !$alt_text ) { $alt_text = esc_html( get_the_title($post_id) ); }
	// Get the info for each image size including the original (full)
				$thumb_original = wp_get_attachment_image_src($attachment_id, 'full');
				$thumb_large    = wp_get_attachment_image_src($attachment_id, 'large-thumb');
				$thumb_medium   = wp_get_attachment_image_src($attachment_id, 'medium-thumb');
				$thumb_small    = wp_get_attachment_image_src($attachment_id, 'small-thumb');
	// Create array containing each image size + the alt tag
				$thumb_data = array(
					'thumb_original' => $thumb_original[0],
					'thumb_large'    => $thumb_large[0],
					'thumb_medium'   => $thumb_medium[0],
					'thumb_small'    => $thumb_small[0],
					'thumb_alt'      => $alt_text
				);
	// Echo out <picture> element based on code from above
				echo '<picture class="img-fluid">';
			echo '<!--[if IE 9]><video style="display: none;"><![endif]-->'; // Fallback for IE9
			echo '<source srcset="' . $thumb_data['thumb_original'] . ', ' . $thumb_data['thumb_original'] . '" media="(min-width: 1200px)">';
			echo '<source srcset="' . $thumb_data['thumb_large'] . ', ' . $thumb_data['thumb_original'] . ' 2x" media="(min-width: 800px)">';
			echo '<source srcset="' . $thumb_data['thumb_medium'] . ', ' . $thumb_data['thumb_large'] . ' 2x" media="(min-width: 400px)">';
			echo '<source srcset="' . $thumb_data['thumb_small'] . ', ' . $thumb_data['thumb_medium'] . ' 2x">';
			echo '<!--[if IE 9]></video><![endif]-->'; // Fallback for IE9
			echo '<img src="'. $thumb_data['thumb_original'] .'" srcset="' . $thumb_data['thumb_small'] . ', ' . $thumb_data['thumb_medium'] . ' 2x" alt="' . $thumb_data['thumb_alt'] . '" class="img-fluid">';
			echo '</picture>';
		}
		?>
