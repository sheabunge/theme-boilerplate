<?php

/**
 * Displays the secondary sidebar
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Sidebars
 */

if ( ! is_active_sidebar( 'secondary' ) )
	return;

?>

<aside id="sidebar-secondary" class="sidebar">

	<?php dynamic_sidebar( 'secondary' ); ?>

</aside><!-- #sidebar-secondary .sidebar -->
