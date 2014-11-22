<?php

// comments.php

// template for displaying comments on a post

?>

<?php

	//prevent the direct loading of comments.php
	if(! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER[ 'SCRIPT-FILENAME' ]) == 'comments.php'  ) {
		die( __( 'You cannot access this page directly.', 'bluebit'));
	}

	//if post is password protected, show info and return.

	if(post_password_required()) : ?>
		<p>
			<?php
				_e( 'This post is password protected. Enter the password to view the comments.', 'bluebit');
			
				return;
			?>
		</p>

	<?php endif; ?>


<!-- COMMENTS AREA -->

<div class="comments-area" id="comments">
		<?php if( have_comments() ) : ?>
			<h2 class="comments-title">
				<?php
					printf( _nx( 'One Comment', ' %1$s comments', get_comments_number(), 'Comment title', 'bluebit' ), number_format_i18n( get_comments_number() ) );

				?>
			</h2>

			<ol class="comments">
				<?php wp_list_comments() ?>
			</ol>

			<?php
				// if more then one page of comments, show controls
				if( get_comment_pages_count() > 1 && get_option( 'page_comments') ) :

			?>

				<nav class="comment-nav" role='navigation'>
					<p class="comment-nav-prev">
						<?php previous_comments_link( __( '&larr; Older Comments', 'bluebit')); ?>
					</p>
					<p class='comment-nav-next'>
						<?php next_comments_link( __( 'Newer comments &rarr;', 'bluebit')); ?>
					</p>

				</nav> <!-- end comment navigation -->

			<?php endif; ?>

			<?php
				// If the comments are closed, display info text
				if( !comments_open() && get_comments_number() ) : 
			?>
				<p class="no-comments">
					<? php _e( 'Comments are closed', 'bluebit') ?>
				</p>
			<?php endif; ?>
		<?php endif; ?>

		<?php comment_form(); ?>
</div> <!-- end comments area -->