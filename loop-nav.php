<?php

/**
 * This is the loop content for post navigation
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Loops
 */

if ( is_attachment() ) : ?>

	<div class="loop-nav">
		<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Return to entry', 'theme-boilerplate' ) . '</span>' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( is_singular( 'post' ) ) : ?>

	<div class="loop-nav">
		<?php previous_post_link( '%link', '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Previous', 'theme-boilerplate' ) . '</span>' ); ?>
		<?php next_post_link( '%link', '<span class="next">' . __( 'Next <span class="meta-nav">&rarr;</span>', 'theme-boilerplate' ) . '</span>' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( ! is_singular() && current_theme_supports( 'loop-pagination' ) ) :

	loop_pagination( array(
		'prev_text' => __( '<span class="meta-nav">&larr;</span> Previous', 'theme-boilerplate' ),
		'next_text' => __( 'Next <span class="meta-nav">&rarr;</span>', 'theme-boilerplate' )
	) );

elseif ( ! is_singular() && $nav = get_posts_nav_link( array(
	'sep' => '',
	'prelabel' => '<span class="previous">' . __( '<span class="meta-nav">&larr;</span> Previous', 'theme-boilerplate' ) . '</span>', 'nxtlabel' => '<span class="next">' . __( 'Next <span class="meta-nav">&rarr;</span>', 'theme-boilerplate' ) . '</span>' ) ) ) : ?>

	<div class="loop-nav">
		<?php echo $nav; ?>
	</div><!-- .loop-nav -->

<?php endif;
