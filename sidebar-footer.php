<?php

// sidebar.php

// primary sidebar


?>

<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

	<aside class="footer-sidebar" role='complementary'>
		<div class='row'>
		<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
	</aside> <!-- end sidebar -->

<?php endif; ?>