<?php

// index.php

// main template file
?>

<?php get_header() ?>

<div class='main-content col-md-8' role='main'>
	<?php if( have_posts()) : while (have_posts() ) : the_post(); ?>
			<?php if(in_category('featured_posts')) : ?>
				<script>
				var param = "<div>" +
                                    "<img src='<?php if( !empty(get_field( 'feature_image' ) ) ) { echo get_field( 'feature_image' ); }?>'>" +
                                    "<div class='cap' u='caption' t='T' style='display:none; color:white; position: absolute; top: 200px; left: 100px; background-color:rgb(67, 100, 41);'>" +
                                        "<a class='offer_link' href='<?php echo get_permalink( get_the_ID() ); ?>'><?php if( !empty(get_field( 'tour_name' ) ) ) { echo get_field( 'tour_name' ); }?> <br>" +
                                        "ONLY <br>" +
                                        "<?php if(!empty( get_field( 'tour_price' ) ) ) { echo get_field( 'tour_price' ); } ?>" +
                                        "</a>" +
                                    "</div>" +
                                "</div>";
					$("#slides").append(param);
				</script>
			<?php endif; ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>

	<?php bluebit_paging_nav() ?>

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>