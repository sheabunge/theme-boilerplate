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

		hybrid_get_content_template();

		if ( is_singular() ) {
			comments_template();
		}

	}

} else {
	get_template_part( 'loop-error' );
}
