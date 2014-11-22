<?php

// archive.php

// template for displaying archived pages

?>

<?php get_header() ?>

	<div class="main-content col-md-8" role='main'>
		<?php if ( have_posts() ) : the_post() ?>
		<header class="page_header">
			<h1>
				<?php

					if ( is_day() ) {
						printf( __( 'Daily Archives for %s', 'bluebit'), get_the_date() );
					} elseif (is_month() ) {
						printf( __( 'Monthly Archives for %s', 'bluebit' ), get_the_date( _x( 'F Y',
						'Monthly archives date format', 'bluebit' ) ) );
					} elseif (is_year() ) {
						printf( __( 'Yearly Archives for %s', 'bluebit' ), get_the_date( _x( 'Y',
						'Yearly archives date format', 'bluebit' ) ) );
					} else {
						_e('Archives','bluebit');
					}

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