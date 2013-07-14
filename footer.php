<?php

/**
 * The template for displaying the theme footer on all pages
 *
 * @since      0.1
 * @package    Theme_Boilerplate
 * @subpackage Global_Templates
 */

get_sidebar( 'primary' );
get_sidebar( 'secondary' );

?>

		</div><!-- #main -->

		<?php

		get_sidebar( 'subsidiary' );
		get_template_part( 'menu', 'subsidiary' );

		?>

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-info">
				<?php echo apply_atomic_shortcode( 'footer_content', '<p class="credit">' . __( 'Copyright &copy; [the-year] [site-link]. Powered by [wp-link] and [theme-link].', 'theme-boilerplate' ) . '</p>' ); ?>
			</div><!-- .site-info -->

		</footer><!-- #colophon- -->

	</div><!-- #container -->

	<?php wp_footer(); ?>

</body>
</html>
