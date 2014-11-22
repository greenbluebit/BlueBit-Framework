<?php

// category.php

// template for displaying category pages

?>

<?php get_header() ?>

	<div class="main-content col-md-8" role='main'>
		<?php if ( have_posts() ) : the_post() ?>
		<header class="page_header">
			<h1>
				<?php

					printf( __( 'Category Archives for %s', 'bluebit' ), single_cat_title( '', false ) );
				 ?>
			</h1>

			<?php 
					//show optional categ description
					if ( category_description() ) {
						echo '<p>' . category_description() . '</p>';
					} ?>
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