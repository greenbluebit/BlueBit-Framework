<?php
// content-link.php
// default template to display content in the Link format
?>

<article id='post-<?php the_ID(); ?>' <?php post_class(); ?> >


	<!-- Article Content -->

	<div class='entry-content'>
		<?php
				the_content( __( 'Continue reading $rarr;', 'bluebit'));

				wp_link_pages();

	?>
	</div>

	<!-- Article Footer -->

	<footer class='entry-footer'>
		<p class='entry-meta'>
	 	<?php
	 		bluebit_post_meta();
	 	?>
	 </p>
		<?php
			// if we have one page and author biography exists, show it
			if( is_single() && get_the_author_meta('description')) {
				echo '<h2>' . __('Written by ', 'bluebit') . get_the_author() . '</h2>';	
				echo '<p>' . the_author_meta('description') . '</p>';			
			}
		?>
	</footer>
</article>