<?php

/**
 * The fallback template, when a more
 * suitable template can't be found
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Templates
 */

get_header();

?>

<main id="content" class="site-content hfeed" role="main">

	<?php

	get_template_part( 'loop-meta' );

	get_template_part( 'loop' );

	get_template_part( 'loop-nav' );

	?>

</main><!-- #content -->

<?php

get_footer();
