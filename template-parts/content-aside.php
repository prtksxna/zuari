<?php
/**
 * Template part for displaying aside posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package zuari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php
			zuari_posted_on();
			zuari_posted_by();
			zuari_entry_footer();
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php zuari_post_thumbnail(); ?>

	<div class="entry-content type-aside">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'zuari' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zuari' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
