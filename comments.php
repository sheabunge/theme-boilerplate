<?php

/**
 * Output the comments wrapper and load the content templates
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Comments
 */

/* If a post password is required or no comments are given and comments/pings are closed, bail */
if ( post_password_required() || ( ! have_comments() && ! comments_open() && ! pings_open() ) )
	return;

?>

<section id="comments">

	<?php

	get_template_part( 'comments-loop' );
	comment_form();

	?>

</section><!-- #comments -->
