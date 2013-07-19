<?php

/**
 * Displays the secondary navigation menu
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Navigation
 */

if ( ! has_nav_menu( 'secondary' ) )
	return;

wp_nav_menu( array(
	'theme_location'  => 'secondary',
	'container'       => 'nav',
	'container_id'    => 'menu-secondary',
	'container_class' => 'menu',
	'menu_id'         => 'menu-secondary-items',
	'menu_class'      => 'menu-items',
	'fallback_cb'     => '',
	'items_wrap'      => '<h3 class="menu-toggle" title="' . esc_attr__( 'Navigation', 'theme-boilerplate' ) . '">' . __( 'Navigation', 'theme-boilerplate' ) . '</h3><div class="wrap"><ul id="%1$s" class="%2$s">%3$s</ul></div>'
) );
