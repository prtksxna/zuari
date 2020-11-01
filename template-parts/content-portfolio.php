<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zuari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content--wide' ); ?>>
	<?php the_title( '<h1 class="content__title">', '</h1>' ); ?>

	<div class="content__body">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zuari' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .content__body -->
</article><!-- .content -->
