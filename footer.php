<?php

// footer.php

// The template for footer display

?>

		</div> <!-- end row -->
	</div> <!-- end container -->


	<!-- FOOTER -->

	<footer class="side-footer">
		<div class="container">
			<?php get_sidebar( 'footer' ); ?>

			<div class="copyright">
				<p>
					&copy; <?php echo date( 'Y' ); ?>
					<a href="<?php echo home_url(); ?>">
						<?php bloginfo( 'name' ); ?> 
					</a>
					<?php _e('All rights reserved', 'bluebit'); ?>
					| Here we can write basically anything you'd like.
				</p>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?> 

<script src='https://livesupporti.com/Scripts/client.js?acc=86bec6ed-093a-4a60-b836-4cb2974ff569'></script>
</body>

</html>