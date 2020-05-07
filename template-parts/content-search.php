<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zuari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
	<?php the_title( sprintf( '<h2 class="content__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<?php if ( 'post' === get_post_type() ) : // TODO: WHAT TO DO HERE? ?>
		<div class="content__meta">
			<?php
			zuari_posted_on();
			zuari_entry_footer();
			?>
		</div><!-- .content__meta -->
	<?php endif; ?>

	<?php zuari_post_thumbnail(); ?>

	<div class="content__body">
		<?php the_excerpt(); ?>
	</div><!-- .content__body -->
</article><!-- .content -->
