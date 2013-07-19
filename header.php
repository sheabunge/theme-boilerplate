<?php

/**
 * The template for displaying the header on all pages
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Templates
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php hybrid_document_title(); ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>
<body class="<?php hybrid_body_class(); ?>">

<div id="container">

	<?php get_template_part( 'menu', 'primary' ); ?>

	<header id="branding" class="site-header">

		<h1 class="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

	</header><!-- #header -->

	<?php boilerplate_header_image();

	get_template_part( 'menu', 'secondary' ); ?>

	<div class="site-body">

		<?php boilerplate_breadcrumb_trail(); ?>
