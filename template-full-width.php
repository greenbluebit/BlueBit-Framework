<?php

	// template-full-width.php

	// Template Name: Full Width Page

?>


<?php get_header(); ?>

	<div class="main-content col-md-12" role='main'>
		<?php while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Article Header -->

					<header class='entry-header'> <?php
					//show thumbnail if it has and doesn t need a password
					if ( has_post_thumbnail() && !post_password_required() ) : ?>
					<figure class='entry-thumbnail'><?php the_post_thumbnail(); ?> </figure>
					<?php endif;?>

					<h1><?php the_title(); ?></h1>

					</header>

	<!-- Article Content -->

	<div class='entry-content'>
		<?php the_content();

		wp_link_pages();
		?>
	</div>

	<!-- Article Footer -->

	<footer class='entry-footer'>
		<?php 
			if ( is_user_logged_in() ) {
				echo '<p>';
				edit_post_link( __( 'Edit', 'bluebit'), '<span class="meta-edit">');
				echo '<p>';
			}
		?>
	</footer>
			</article>

			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>