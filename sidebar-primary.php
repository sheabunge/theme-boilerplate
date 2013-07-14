<?php

/**
 * Displays the primary sidebar
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Sidebar_Templates
 */

if ( ! is_active_sidebar( 'primary' ) )
	return;

?>

<aside id="sidebar-primary" class="sidebar">

	<?php dynamic_sidebar( 'primary' ); ?>

</aside><!-- #sidebar-primary .sidebar -->

