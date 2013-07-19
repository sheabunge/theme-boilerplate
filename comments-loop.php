<?php

/**
 * Loop through the comments
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Comments
 */

/* Bail early if no comments can be found */
if ( ! have_comments() )
	return;

?>

<h2 id="comments-number"><?php
	comments_number( '',
		__( 'One Response', 'theme-boilerplate' ),
		__( '% Responses', 'theme-boilerplate' )
	);
?></h2>

<?php get_template_part( 'comments-loop-nav' ); ?>

<ol class="comment-list">
	<?php wp_list_comments( hybrid_list_comments_args() ); ?>
</ol><!-- .comment-list -->
