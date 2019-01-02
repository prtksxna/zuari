<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zuari
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400,700|IBM+Plex+Sans+Condensed:400,700|IBM+Plex+Serif:300i,400,400i,700|IBM+Plex+Sans:100,300i,400,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zuari' ); ?></a>

	<?php if ( is_front_page() && is_home() ) { ?>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<?php $zuari_description = get_bloginfo( 'description', 'display' );
		if ( $zuari_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $zuari_description; /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-intro' ) ) { ?>
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-intro' ); ?>
			</aside><!-- #secondary -->
		<?php } ?>
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'zuari' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header>
	<?php } else { ?>
		<header class="top-bar">
			<?php the_custom_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'zuari' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</header>
	<?php } ?>

	<div id="content" class="site-content">
