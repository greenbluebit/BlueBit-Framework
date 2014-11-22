<?php

// CHECK FOR SPECIAL DATE

if(! function_exists( 'bluebit_holiday' ) ) {
	function bluebit_holiday() {
		$date = date('d-m');

		switch($date) {

			case '01-01' :
				$message = 'Happy New Years';
				break;
			case '25-12' :
				$message = 'Happy Christmas';
				break;
			case '31-10' :
				$message = "Happy Halloween";
				break;

			default :
				$message = "Welcome";
				break;
		}

		return $message;
	}
}

// OVERWRITE WELCOME

if(! function_exists( 'bluebit_howdy' ) ) {
	function bluebit_howdy($translated_text, $text, $domain) {
		$howdy_replacer = str_replace('Howdy', bluebit_holiday(), $text);
		return $howdy_replacer;
	}

	add_filter('gettext', 'bluebit_howdy', 10, 3);
}

// not needed for current project, useful for future
if(! function_exists( 'bluebit_custom_post_types' ) ) {
	function bluebit_custom_post_types() {

	$labels = array(
		'name'                       => _x( 'Featured Posts', 'Taxonomy General Name', 'bluebit' ),
		'singular_name'              => _x( 'Featured Post', 'Taxonomy Singular Name', 'bluebit' ),
		'menu_name'                  => __( 'Featured Post', 'bluebit' ),
		'all_items'                  => __( 'All Items', 'bluebit' ),
		'parent_item'                => __( 'Parent Item', 'bluebit' ),
		'parent_item_colon'          => __( 'Parent Item:', 'bluebit' ),
		'new_item_name'              => __( 'New Item Name', 'bluebit' ),
		'add_new_item'               => __( 'Add New Item', 'bluebit' ),
		'edit_item'                  => __( 'Edit Item', 'bluebit' ),
		'update_item'                => __( 'Update Item', 'bluebit' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bluebit' ),
		'search_items'               => __( 'Search Items', 'bluebit' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bluebit' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'bluebit' ),
		'not_found'                  => __( 'Not Found', 'bluebit' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'featured', array( 'post' ), $args );

}

	// Hook into the 'init' action
	add_action( 'init', 'bluebit_custom_post_types', 0 );
}

?>