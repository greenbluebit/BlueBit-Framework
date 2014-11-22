<?php
// content-quote.php
// default template to display content in the Quote format
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
	</footer>
</article>