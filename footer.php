<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zuari
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'sidebar-footer' ) ) { ?>
			<div class="footer__content">
				<?php dynamic_sidebar( 'sidebar-footer' ); ?>
			</div><!-- #secondary -->
		<?php } ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
