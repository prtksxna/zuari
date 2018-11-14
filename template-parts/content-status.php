<?php
/**
 * Template part for displaying status posts
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
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title type-status">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title type-status"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->
