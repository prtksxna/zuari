<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zuari
 */

get_header('wide');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header--portfolio">
				<?php
				the_archive_title( '<h1 class="page-title archive-header__title">', '</h1>' );
				the_archive_description( '<div class="archive-header__desc">', '</div>' );
				?>
			</header><!-- .archive-header -->

			<div class="portfolio-grid">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'portfolio-grid' );

				endwhile;
				?>
			</div>
			<?php
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
