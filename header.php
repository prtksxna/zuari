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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zuari' ); ?></a>

	<?php if ( is_front_page() && is_home() ) { ?>
	<header
		class="header"
		style="background-image: url(<?php header_image() ?>)"
	>
		<div class="header__container">
			<div class="header__branding">
				<?php the_custom_logo(); ?>
				<h1 class="header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
			<?php $zuari_description = get_bloginfo( 'description', 'display' );
			if ( $zuari_description || is_customize_preview() ) :
				?>
				<p class="header__description"><?php echo esc_html($zuari_description); /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar-intro' ) ) { ?>
				<div class="header__text">
					<?php dynamic_sidebar( 'sidebar-intro' ); ?>
				</div><!-- #secondary -->
			<?php } ?>
			<nav>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'top-navigation',
					'depth'          => 1,
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header>
	<?php } else { ?>
		<header class="header_type_bar">
			<h1 class="header_type_bar__title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php $zuari_description = get_bloginfo( 'description', 'display' );
				if ( $zuari_description || is_customize_preview() ) :
					?>
					<span class="header_type_bar__description">&mdash; <?php echo esc_html($zuari_description); /* WPCS: xss ok. */ ?></span>
				<?php endif; ?>
			</h1>
			<nav>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'top-navigation top-navigation_type_bar',
					'depth'          => 1,
				) );
				?>
			</nav><!-- #site-navigation -->
		</header>
	<?php } ?>

	<div id="content" class="site-content">
