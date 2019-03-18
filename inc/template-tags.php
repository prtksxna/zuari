<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zuari
 */

if ( ! function_exists( 'zuari_iro') ) {
	function zuari_iro() {
		$id = get_the_ID();
		$bg_color = get_post_meta($id, 'bg_color', true);
 		$fg_color = get_post_meta($id, 'fg_color', true);
		$bg_string = '';
		$fg_string = '';

		if ( !empty( $bg_color) ) {
			$bg_string = 'data-bg-color="'. $bg_color .'"';
		}

		if ( !empty( $fg_color) ) {
			$fg_string = 'data-fg-color="'. $fg_color .'"';
		}

		echo $bg_string . ' ' . $fg_string;
	}
}

if ( ! function_exists( 'zuari_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function zuari_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'zuari_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function zuari_posted_by() {
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'zuari_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function zuari_entry_footer() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '<span class="content__meta__tags">', esc_html_x( ' ', 'list item separator', 'zuari' ), '</span>' );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( $tags_list ); // WPCS: XSS OK.
			}
		}

		/*if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( '' );
			echo '</span>';
		}*/

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'zuari' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'zuari_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function zuari_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="content__thumbnail">
				<?php the_post_thumbnail('large'); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="content__thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'large', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
