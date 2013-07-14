<?php

/**
 * The functions file is used to initialize everything in the theme.  It controls how the theme is loaded and
 * sets up the supported features, default actions, and default filters.  If making customizations, users
 * should create a child theme and make changes to its functions.php file (not this one).  Friends don't let
 * friends modify parent theme files. ;)
 *
 * Child themes should do their setup on the 'after_setup_theme' hook with a priority of 11 if they want to
 * override parent theme features.  Use a priority of 9 if wanting to run before the parent theme.
 *
 * @package    Boilerplate
 * @subpackage Functions
 * @version    0.1
 * @since      0.1
 * @author     Shea Bunge <info@bungeshea.com>
 * @copyright  Copyright (c) 2013, Shea Bunge
 * @link       https://github.com/bungeshea/theme-boilerplate
 * @license    http://opensource.org/licenses/MIT
 */

/* Load the core theme framework */
require_once trailingslashit( get_template_directory() ) . 'library/hybrid.php';
new Hybrid();

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since  0.1
 * @access public
 * @return void
 */
function boilerplate_theme_setup() {

	/* Get action/filter hook prefix */
	$prefix = hybrid_get_prefix();

	/* Register menus */
	add_theme_support(
		'hybrid-core-menus',
		array( 'primary', 'secondary', 'subsidiary' )
	);

	/* Register sidebars */
	add_theme_support(
		'hybrid-core-sidebars',
		array( 'primary', 'secondary', 'subsidiary' )
	);

	/* Load scripts */
	add_theme_support(
		'hybrid-core-scripts',
		array( 'comment-reply' )
	);

	/* Load styles */
	add_theme_support(
		'hybrid-core-styles',
		array( 'gallery', 'parent', 'style' )
	);

	/* Load widgets */
	add_theme_support( 'hybrid-core-widgets' );

	/* Load shortcodes */
	add_theme_support( 'hybrid-core-shortcodes' );

	/* Enable custom template hierarchy */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* Allow per-post stylesheets */
	add_theme_support( 'post-stylesheets' );

	/* Support pagination instead of prev/next links */
	add_theme_support( 'loop-pagination' );

	/* The best thumbnail/image script ever */
	add_theme_support( 'get-the-image' );

	/* Use breadcrumbs */
	add_theme_support( 'breadcrumb-trail' );

	/* Nicer [gallery] shortcode implementation */
	add_theme_support( 'cleaner-gallery' );

	/* Better captions for themes to style */
	add_theme_support( 'cleaner-caption' );

	/* Automatically add feed links to <head> */
	add_theme_support( 'automatic-feed-links' );

	/* Add custom styling to the visual editor */
	add_editor_style();

	/* Post formats */
	add_theme_support(
		'post-formats',
		array( 'aside', 'audio', 'chat', 'image', 'gallery', 'link', 'quote', 'status', 'video' )
	);

	/* Add support for a custom header image */
	add_theme_support(
		'custom-header',
		array( 'header-text' => false ) );

	/* Custom background */
	add_theme_support(
		'custom-background',
		array( 'default-color' => 'ffffff' )
	);

	/* Jetpack's Infinite Scroll module */
	add_theme_support(
		'infinite-scroll',
		array(
			'container' => 'content',
			'footer'    => 'container',
		)
	);

	/* Handle content width for embeds and images */
	hybrid_set_content_width( 1280 );

	/** Hybrid Core 1.6 changes **/
	add_filter( "{$prefix}_sidebar_defaults", 'boilerplate_sidebar_defaults' );
	add_filter( 'cleaner_gallery_defaults',   'boilerplate_gallery_defaults' );
	add_filter( 'the_content', 'boilerplate_aside_infinity', 9 );
	/****************************/
}

add_action( 'after_setup_theme', 'boilerplate_theme_setup' );

/**
 * Enqueue the custom scripts used in this theme
 *
 * @since  0.1
 * @access public
 * @return void
 */
function boilerplate_enqueue_scripts() {

	/* Get the theme version directly from WordPress */
	$ver = wp_get_theme()->get( 'Version' );

	/* Modernizr */
	wp_register_script(
		'modernizr',
		get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js',
		false,
		'2.6.2'
	);
	wp_enqueue_script( 'modernizr' );

	/* Plugins */
	wp_enqueue_script(
		'boilerplate-plugins',
		get_template_directory_uri() . '/assets/js/plugins.min.js',
		array( 'jquery' ),
		true // load in footer
	);

	/* Scripts */
	wp_enqueue_script(
		'boilerplate-scripts',
		get_template_directory_uri() . '/assets/js/main.min.js',
		array( 'jquery' ),
		$ver,
		true // load in footer
	);
}

add_action( 'wp_enqueue_scripts', 'boilerplate_enqueue_scripts' );

/* === HYBRID CORE 1.6 CHANGES. ===
 *
 * The following changes are slated for Hybrid Core version 1.6 to make it easier for
 * theme developers to build awesome HTML5 themes. The code will be removed once 1.6
 * is released.
 */

	/**
	 * Content template.  This is an early version of what a content template function will look like
	 * in future versions of Hybrid Core.
	 *
	 * @since  0.1
	 * @access public
	 * @return void
	 */
	function boilerplate_get_content_template() {

		$templates = array();
		$post_type = get_post_type();

		if ( post_type_supports( $post_type, 'post-formats' ) ) {

			$post_format = get_post_format() ? get_post_format() : 'standard';

			$templates[] = "content-{$post_type}-{$post_format}.php";
			$templates[] = "content-{$post_format}.php";
		}

		$templates[] = "content-{$post_type}.php";
		$templates[] = 'content.php';

		return locate_template( $templates, true, false );
	}

	/**
	 * Sidebar parameter defaults.
	 *
	 * @since  0.1
	 * @access public
	 * @param  array  $defaults
	 * @return array
	 */
	function boilerplate_sidebar_defaults( $defaults ) {

		$defaults = array(
			'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		);

		return $defaults;
	}

	/**
	 * Gallery defaults for the Cleaner Gallery extension.
	 *
	 * @since  0.1
	 * @access public
	 * @param  array  $defaults
	 * @return array
	 */
	function boilerplate_gallery_defaults( $defaults ) {

		$defaults['itemtag']    = 'figure';
		$defaults['icontag']    = 'div';
		$defaults['captiontag'] = 'figcaption';

		return $defaults;
	}

	/**
	 * Adds an infinity character "&#8734;" to the end of the post content on 'aside' posts.  This
	 * is from version 0.1.1 of the Post Format Tools extension.
	 *
	 * @since  0.1
	 * @access public
	 * @param  string $content The post content.
	 * @return string $content
	 */
	function boilerplate_aside_infinity( $content ) {

		if ( has_post_format( 'aside' ) && ! is_singular() )
			$content .= '  <a class="permalink" href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '">&#8734;</a>';

		return $content;
	}

/* End Hybrid Core 1.6 section */

/**
 * Output the HTML code for the custom header image
 *
 * @since  0.1
 * @access public
 * @return void
 */
function boilerplate_header_image() {

	if ( ! $header_image_url = get_header_image() )
		return;

	printf (
		'<a href="%1$s" title="%2$s" rel="home">' .
			'<img src="%3$s" width="%4$s" height="%5$s" alt="" class="header-image">' .
		'</a>',
		esc_url( home_url( '/' ) ),
		esc_attr( get_bloginfo( 'name', 'display' ) ),
		esc_url( $header_image_url ),
		get_custom_header()->width,
		get_custom_header()->height
	);

}

/**
 * Output the theme breadcrumb trail
 *
 * @since  0.1
 * @access public
 * @return void
 */
function boilerplate_breadcrumb_trail() {

	/* Use the Yoast SEO breadcrumbs if they are enabled */
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<nav class="yoast-breadcrumb breadcrumbs">', '</nav>' );
	}

	/* Otherwise, use the Hybrid Core breadcrumbs */
	elseif ( current_theme_supports( 'breadcrumb-trail' ) ) {

		breadcrumb_trail( array(
			'container' => 'nav',
			'separator' => '>',
			'before' => __( 'You are here:', 'theme-boilerplate' )
		) );
	}
}
