<?php

// Set up the content width value based on design

if(! isset($content_width) ) {
	$content_width = 800;
}

// Set up theme default and registar various supported features

if( ! function_exists('bluebit_setup') ) {

	function bluebit_setup() {

		// make theme available for translation

		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain('bluebit', $lang_dir);

		// add post support
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
				));

		// add support for automatic feed links

		add_theme_support( 'automatic-feed-links' );

		// add theme support post thumbnails

		add_theme_support( 'post-thumbnails' );

		// register nav menus

		register_nav_menus(
			array(
					'main-menu' => __('Main Menu', 'bluebit')
				)
			);
	}

	add_action('after_setup_theme','bluebit_setup');
}

 // display meta info of post

 if(! function_exists('bluebit_post_meta')) {

 	function bluebit_post_meta() {
 		echo '<ul class="list-inline entry-meta">';

 		if ( get_post_type () == 'post') {

 			// if it's sticky, mark it
 			if( is_sticky() )
 				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i>'. __( 'Sticky', 'bluebit').'</li>';

 			// get author
 			printf(
 					'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
 					esc_url( get_author_posts_url(get_the_author_meta( 'ID' ) ) ),
 					get_the_author()
 				);

 			// get date
 			echo '<li class="meta-date"> ' . get_the_date() . ' </li>';

 			// get categories
 			$category_list = get_the_category_list(', ');

 			if ( $category_list) {
 				echo '<li class="meta-categories">'. $category_list .'</li>';
 			}

 			// get tags
 			$tag_list = get_the_tag_list('',', ');

 			if ( $tag_list) {
 				echo '<li class="meta-tag">'. $tag_list .'</li>';
 			}

 			// comments link
 			if ( comments_open() ) {
 				echo '<li><span class="meta-reply">';
 				comments_popup_link( __('Leave a comment', 'bluebit') , __('One comment so far', 'bluebit' ) , __('View all % comments','bluebit'));
 				echo '</span></li>';

 			}

 			// edit link

 			if( is_user_logged_in() ) {
 				echo '<li>';
 				edit_post_link( __('Edit', 'bluebit'), '<span class="meta-edit">', '</span>');
 				echo '</li>';
 			}
 		}
 	}
 }


 //	Display navigation to the next/prev set of posts

 if( !function_exists( 'bluebit_paging_nav')) {

 	function bluebit_paging_nav() {
 		echo '<ul>';
 		if (get_previous_posts_link() ) {

 			echo '<li class="next">';
 			echo get_previous_posts_link(__('Newer Posts &rarr;', 'bluebit'));
 			echo '</li>';

 		}
 		if (get_next_posts_link() ) {

 			echo '<li class="previous">';
 			echo get_next_posts_link(__('&larr; Older Posts', 'bluebit'));
 			echo '</li>';

 		}
 		echo'</ul>';
 	}
 }

 // REGISTER WIDGET AREAS - SIDEBAR

 if( !function_exists( 'bluebit_widget_init' ) ) {
 	 function bluebit_widget_init() {
 	 	if( function_exists( 'register_sidebar' ) ) {
 	 		register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'bluebit' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'bluebit' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'bluebit' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'bluebit' ),
					'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
 	 	}
 	 }
 	  add_action( 'widgets_init', 'bluebit_widget_init' );
 }

// CHECK LENGTH OF STRING RESPECTS MINIMUM REQ

if( !function_exists( 'bluebit_validate_length' ) ) {
	function bluebit_validate_length( $string,$min ) {
		return ( strlen( trim( $string ) ) > $min );
	}
}

// Include generated CSS in header

if( !function_exists( 'bluebit_load_wp_head ' ) ) {
	function bluebit_load_wp_head () {
		// Get the logos
		$logo = IMAGES . '/logo.png';
		$logo_retina = IMAGES . '/logo@2x.png';

		$logo_size = getimagesize( $logo );
		?>
		
		<!-- Logo CSS -->
		<style type="text/css">
			.site-logo a {
				background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;
				width: <?php echo $logo_size[0] ?>px;
				height: 60px;
				display: inline-block;
			}

			@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
			only screen and (-moz-min-device-pixel-ratio: 1.5),
			only screen and (-o-min-device-pixel-ratio: 3/2),
			only screen and (min-device-pixel-ratio: 1.5) {
				.site-logo a {
					background: transparent url( <?php echo $logo_retina; ?> ) 0 0 no-repeat;
					background-size: <?php echo $logo_size[0]; ?>px <?php echo $logo_size[1]; ?>px;
				}
			}
		</style>

		<?php

	}

	add_action( 'wp_head', 'bluebit_load_wp_head' );
}

// Load custom scripts for theme (JS AND SASS GENERATED CSS)

if(! function_exists( 'bluebit_scripts' ) ) {
	function bluebit_scripts() {
		// Support for threaded comments
		if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		//register scripts
		wp_register_script( 'jssor', SCRIPTS . '/jssor.js', array( 'jquery' ) , false, true );
		wp_register_script( 'jssor.slider.mini', SCRIPTS . '/jssor.slider.mini.js', array( 'jquery', 'jssor'), false, true );
		wp_register_script( 'bootstrap-js', 'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'bluebit_custom', SCRIPTS . '/scripts.js', array( 'jquery', 'jssor', 'jssor.slider.mini' ), false, true );

		//load scripts
		wp_enqueue_script( 'bootstrap-js' );
		wp_enqueue_script( 'bluebit_custom' );

		//load stylesheets
		wp_enqueue_style( 'font_awesome', THEMEROOT . '/stylesheets/font-awesome.min.css' );
		wp_enqueue_style( 'bluebit_master', THEMEROOT . '/stylesheets/master.css' );
	}

	add_action( 'wp_enqueue_scripts', 'bluebit_scripts');
}


?>