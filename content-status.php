<?php

/**
 * Used for displaying the content for posts with the status post format
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Content
 */

?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<?php if ( get_option( 'show_avatars' ) ) { ?>
			<header class="entry-header">
				<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
			</header><!-- .entry-header -->
		<?php } ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'theme-boilerplate' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[post-format-link] updated on [entry-published] [entry-edit-link before="| "]<br>[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'theme-boilerplate' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else { ?>

		<?php if ( get_option( 'show_avatars' ) ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?></a>
		<?php } ?>

		<div class="entry-content">
			<?php the_content( __( 'Read more &rarr;', 'theme-boilerplate' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'theme-boilerplate' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<?php if ( !get_option( 'show_avatars' ) ) { ?>

			<footer class="entry-footer">
				<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[post-format-link] updated on [entry-published] [entry-permalink before="| "] [entry-edit-link before="| "]', 'theme-boilerplate' ) . '</div>' ); ?>
			</footer><!-- .entry-footer -->

		<?php } ?>

	<?php } ?>

</article><!-- .hentry -->
