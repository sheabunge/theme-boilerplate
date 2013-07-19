<?php

/**
 * This template is used when no posts are found in the loop
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Loops
 */

?>

<article id="post-0" class="<?php hybrid_entry_class(); ?>">

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing found', 'theme-boilerplate' ); ?></h1>
	</header>

	<div class="entry-content">
		<p><?php _e( 'Apologies, but no entries were found.', 'theme-boilerplate' ); ?></p>
	</div><!-- .entry-content -->

</article><!-- .hentry .error -->
