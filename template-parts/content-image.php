<?php
/**
* Template part for displaying image posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
* @package zuari
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> <?php zuari_iro(); ?>>
	<div class="content__meta">
		<?php
		zuari_posted_on();
		zuari_entry_footer();
		?>
	</div><!-- .content__meta -->

	<?php zuari_post_thumbnail(); ?>

	<div class="content__body content__body_type_aside">
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
	</div><!-- .content__body -->
</article><!-- .content -->
