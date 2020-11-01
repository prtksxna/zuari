<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zuari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-tile' ); ?>>
	<?php zuari_post_thumbnail(); ?>
	<?php the_title( '<h1 class="portfolio__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h1>' ); ?>
	<p class="portfolio__desc"><?php echo get_the_excerpt(); ?></p>
</article><!-- .content -->
