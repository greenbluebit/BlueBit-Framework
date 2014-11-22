<?php
// content-gallery.php
// default template to display posts with Gallery format
?>

<article id='post-<?php the_ID(); ?>' <?php post_class(); ?> >
	<!-- Article Header -->

	<header class='entry-header'> <?php
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
			

				the_content( __( 'Continue reading $rarr;', 'bluebit'));

				wp_link_pages();
	
	?>
	</div>

	<!-- Article Footer -->

	<footer class='entry-footer'>
		<?php
			// if we have one page and author biography exists, show it
			if( is_single() && get_the_author_meta('description')) {
				echo '<h2>' . __('Written by ', 'bluebit') . get_the_author() . '</h2>';	
				echo '<p>' . the_author_meta('description') . '</p>';			
			}
		?>
	</footer>
</article>