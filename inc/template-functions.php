<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package zuari
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zuari_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'zuari_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function zuari_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'zuari_pingback_header' );

/**
 * Detect what type of blog post this is. The return values should match
 * get_post_format values where possible
 *
 * @link https://codex.wordpress.org/Function_Reference/get_post_format
 * @link https://www.w3.org/TR/post-type-discovery/
 * @return String
 */
function zuari_post_type_discovery() {
	if (
			has_post_thumbnail() &&
			get_the_title() === ''
	) {
		return 'image';
	}

	if (
		get_the_content() === '' &&
		get_the_title() !== ''
	) {
		return 'status';
	}

	if (
		get_the_content() !== '' &&
		get_the_title() === ''
	) {
		return 'aside';
	}

	return get_post_type();
}

/**
 * Detect what type of blog post this is. The return values should match
 * get_post_format values where possible
 *
 * @link https://developer.wordpress.org/reference/functions/get_the_archive_title/
 * @param String $title Archive title.
 * @return String
 */
function zuari_archive_title( $title ) {
	// From https://www.binarymoon.co.uk/2017/02/hide-archive-title-prefix-wordpress/.

	// Skip if the site isn't LTR, this is visual, not functional.
	// Should try to work out an elegant solution that works for both directions.
	if ( is_rtl() ) {
		return $title;
	}

	// Split the title into parts so we can wrap them with spans.
	$title_parts = explode( ': ', $title, 2 );
	// Glue it back together again.
	if ( ! empty( $title_parts[1] ) ) {
		$title = wp_kses(
			$title_parts[1],
			array(
				'span' => array(
					'class' => array(),
				),
			)
		);
		$title = '<span class="archive-header__title__type">' . esc_html( $title_parts[0] ) . '</span>' . $title;
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'zuari_archive_title' );
