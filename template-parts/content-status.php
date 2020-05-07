<?php
/**
 * Template part for displaying status posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package zuari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content h-entry' ); ?>>
		<div class="content__meta">
			<?php
			zuari_posted_on();
			zuari_entry_footer();
			?>
		</div><!-- .content__meta -->
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="content__title content__title_type_status e-content">', '</h1>' );
		else :
			the_title( '<h2 class="content__title content__title_type_status e-content"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
</article><!-- .content ?> -->
