<?php

// author.php

// template for displaying author archive pages

?>

<?php get_header() ?>

	<div class="main-content col-md-8" role='main'>
		<?php if ( have_posts() ) : the_post() ?>
		<header class="page_header">
			<h1>
				<?php printf( __( 'All posts by %s.', 'bluebit'), get_the_author() ); ?>
			</h1>

			<?php  
				// If the author bio exists, display it.

				if( get_the_author_meta( 'description' ) ) {
					echo '<php>' . the_author_meta( 'description' ) . '</p>';
				}
			?>

			<?php rewind_posts(); ?>
		</header>


		<?php while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php bluebit_paging_nav(); ?>

	    <?php else : ?>
	    		<?php get_template_part('content','none') ?>

		<?php endif; ?>
	</div> <!-- end main-content -->

<?php get_sidebar() ?>

<?php get_footer() ?>