<?php

/**
 * Displays the subsidiary sidebar, usually loaded in the footer
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Sidebars
 */

if ( ! is_active_sidebar( 'subsidiary' ) )
	return;

?>

<aside id="sidebar-subsidiary" class="sidebar">

	<?php dynamic_sidebar( 'subsidiary' ); ?>

</aside><!-- #sidebar-subsidiary .sidebar -->
