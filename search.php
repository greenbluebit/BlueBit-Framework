<?php

// search.php

// template for displaying search results

?>

<?php get_header() ?>

	<div class="main-content col-md-8" role='main'>
		<?php if ( have_posts() ) : the_post() ?>
		<header class="page_header">
			<h1>
				<?php

					printf( __( 'Search results for %s', 'bluebit' ), get_search_query() );
				 ?>
			</h1>
			
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