<?php

/**
 * This is the posts loop template.
 * Doesn't actually output anything, just starts the loop and loads
 * content templates
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Loops
 */

if ( have_posts() ) {

	while ( have_posts() ) {
		the_post();

		/* Update when Hybrid Core 1.6 is released. This function will no longer be available. */
		boilerplate_get_content_template();

		if ( is_singular() ) {
			comments_template();
		}

	}

} else {
	get_template_part( 'loop-error' );
}
