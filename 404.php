<?php 

// 404.php

// template for displaying not found errors
// edit htaccess file
// ErrorDocument 404 /wordpressLearn/index.php?error=404
// change wordpressLearn with whatever folder wordpress is in. If no folder, then don't write anythin there

 ?>

 <?php get_header(); ?>

 <div class="container-404">
 	<h1>
		<?php _e( 'Error 404 - Nothing Found', 'bluebit' ); ?>	
 	</h1>
 	<p>
		<?php _e( 'So it looks like nothing was found here. Maybe try a search?', 'bluebit'); ?>
 	</p>

 	<?php get_search_form() ?>
 </div>