<?php
// content.php
// default template to display content

define ( 'THEMEROOT', get_stylesheet_directory_uri() );
define ( 'IMAGES', THEMEROOT . '/images' );

?>


<article id='post-<?php the_ID(); ?>' <?php post_class(); ?> >
	<!-- Article Header -->

	<header class='entry-header'> <?php
	//show thumbnail if it has and doesn t need a password
	if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<figure class='entry-thumbnail'><?php the_post_thumbnail(); ?> </figure>
	<?php endif;

	// if single only title else link

	if (is_single() ) : ?>
	 	<h1><?php the_title(); ?></h1>
	 <?php else : ?>
	 	<h1><a href='<?php the_permalink(); ?>' rel='bookmark'><?php the_title() ?></a></h1>
	 <?php endif ?>

	 <p class='entry-meta'>
	 	<?php
	 		bluebit_post_meta();
	 	?>
	 </p>
	</header>

	<!-- Article Content -->

	<div class='entry-content'>
		<?php
			if( is_search() ) {
				the_excerpt();
		} else {

				the_content( __( 'Continue reading &rarr;', 'bluebit'));

				wp_link_pages();
		}
	?>
	</div>

	<!-- Article Footer -->

	<footer class='entry-footer'>
		<?php
			// if we have one page and author biography exists, show it
			if( is_single() && get_the_author_meta('description')) {
				echo '<h2>' . __('Written by ', 'bluebit') . get_the_author() . '</h2>';	
				echo '<p>';
				echo the_author_meta('description');
				echo '</p>';			
			}
			if( function_exists( 'get_field' ) ) {
				if( !empty(get_field( 'post_friend' ) ) ) {
					$friend = get_field( 'post_friend' );
					echo '<p>';
					echo $friend;
					echo '</p>';	
				}
				if( !empty(get_field( 'post_enemy' ) ) ) {
					$enemy = get_field( 'post_enemy' );
					echo '<p>';
					echo $enemy;
					echo '</p>';	
				}

				if( !empty(get_field( 'post_date' ) ) ) {
					$date = get_field( 'post_date' );
					echo '<p>';
					echo $date;
					echo '</p>';	
				}
			} else {
				echo 'Please Install Advanced Custom Field Plugin';
			}
		?>
	</footer>
</article>