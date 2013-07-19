<?php

/**
 * Used for displaying the previous/next comment page links
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Comments
 */

/* Bail early if comment paging is disabled or there is less then one comment page */
if ( ! get_option( 'page_comments' ) || get_comment_pages_count() < 1 )
	return;

?>

<div class="comments-nav">
	<?php previous_comments_link( __( '&larr; Previous', 'theme-boilerplate' ) ); ?>

	<span class="page-numbers"><?php
		printf (
			__( 'Page %1$s of %2$s', 'theme-boilerplate' ),
			( get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1 ),
			get_comment_pages_count()
		);
	?></span>

	<?php next_comments_link( __( 'Next &rarr;', 'theme-boilerplate' ) ); ?>
</div><!-- .comments-nav -->
