<?php

// tag.php

// template for displaying tag pages

?>

<?php get_header() ?>

	<div class="main-content col-md-8" role='main'>
		<?php if ( have_posts() ) : the_post() ?>
		<header class="page_header">
			<h1>
				<?php

					printf( __( 'Tag Archives for %s', 'bluebit' ), single_tag_title( '', false ) );
				 ?>
			</h1>

			<?php 
					//show optional tag description
					if ( tag_description() ) {
						echo '<p>' . tag_description() . '</p>';
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