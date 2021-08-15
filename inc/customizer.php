<?php
/**
 * Zuari Theme Customizer
 *
 * @package zuari
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zuari_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_image' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'header_image_data' )->transport = 'postMessage';

	// Colors.
	$wp_customize->add_setting(
		'header_bgcolor',
		array(
			'default'           => '#eaeaea',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_bgcolor',
			array(
				'label'    => __( 'Header Background Color', 'zuari' ),
				'section'  => 'colors',
				'settings' => 'header_bgcolor',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'fgcolor',
		array(
			'default'           => '#000000',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'fgcolor',
			array(
				'label'    => __( 'Foreground Color', 'zuari' ),
				'section'  => 'colors',
				'settings' => 'fgcolor',
				// 'priority'   => 5
			)
		)
	);

	$wp_customize->add_setting(
		'enable_darkmode',
		array(
			'default'           => '',
			'sanitize_callback' => 'zuari_sanitize_enable_darkmode',
		)
	);

	$wp_customize->add_control(
		new WP_CUstomize_Control(
			$wp_customize,
			'enable_darkmode',
			array(
				'label'    => __( 'Allow the operating system\'s dark mode to override my color settings.', 'zuari' ),
				'section'  => 'colors',
				'settings' => 'enable_darkmode',
				'type'     => 'checkbox',
			)
		)
	);

	// Typography.
	$wp_customize->add_section(
		'typography',
		array(
			'title'    => __( 'Typography', 'zuari' ),
			'priority' => 90, // Before Widgets.
		)
	);

	$wp_customize->add_setting(
		'mono_font',
		array(
			'default'           => 'IBM Plex Mono',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'mono_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Site title font (Mono)', 'zuari' ),
			'choices' => array(
				'IBM Plex Mono'   => 'IBM Plex Mono',
				'Space Mono'      => 'Space Mono',
				'Source Code Pro' => 'Source Code Pro',
				'Fira Mono'       => 'Fira Mono',
			),
		)
	);

	$wp_customize->add_setting(
		'heading_font',
		array(
			'default'           => 'IBM Plex Sans Condensed',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'heading_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Heading font (Condensed)', 'zuari' ),
			'choices' => array(
				'IBM Plex Sans Condensed' => 'IBM Plex Sans Condensed',
				'Archivo Narrow'          => 'Archivo Narrow',
				'Barlow Condensed'        => 'Barlow Condensed',
				'Roboto Condensed'        => 'Roboto Condensed',
			),
		)
	);

	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => 'IBM Plex Serif',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'body_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Body font (Serif)', 'zuari' ),
			'choices' => array(
				'IBM Plex Serif'   => 'IBM Plex Serif',
				'Source Serif Pro' => 'Source Serif Pro',
				'Merriweather'     => 'Merriweather',
				'Lora'             => 'Lora',
			),
		)
	);

	$wp_customize->add_setting(
		'body_alt_font',
		array(
			'default'           => 'IBM Plex Sans',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'body_alt_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Body font alternative (Sans serif)', 'zuari' ),
			'choices' => array(
				'IBM Plex Sans'   => 'IBM Plex Sans',
				'Source Sans Pro' => 'Source Sans Pro',
				'Poppins'         => 'Poppins',
				'Rubik'           => 'Rubik',
			),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.header__title a',
				'render_callback' => 'zuari_customize_partial_blogname',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.header__description',
				'render_callback' => 'zuari_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'zuari_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zuari_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zuari_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zuari_customize_preview_js() {
	wp_enqueue_script( 'zuari-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), 'zuari', true );
}
add_action( 'customize_preview_init', 'zuari_customize_preview_js' );

/**
 * Render the header in the correct background color.
 *
 * @return void
 */
function zuari_header_bgcolor_css() {
	?>
	<meta name="theme-color" content="<?php echo esc_attr( get_theme_mod( 'header_bgcolor', 'eaeaea' ) ); ?>">
	<style media="screen">
		.header {
			background-color: <?php echo esc_attr( get_theme_mod( 'header_bgcolor', 'eaeaea' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_header_bgcolor_css' );

/**
 * Render the text and links in the correct color.
 *
 * @return void
 */
function zuari_fgcolor_css() {
	?>
	<style media="screen">
		:root {
			--fg-color: <?php echo esc_attr( get_theme_mod( 'fgcolor', '#000000' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_fgcolor_css' );

/**
 * Override the colors and add the dark mode CSS class if enabled
 *
 * @return void
 */
function zuari_dark_mode() {
	if ( get_theme_mod( 'enable_darkmode' ) === '1' ) {
		?>
			<style media="screen">
			
			/* Setting dark-mode */
 			@media (prefers-color-scheme: dark) {

 				:root {
 					--bg-color: #222;
 				}

 				body.custom-background {
 					background-color: var(--bg-color) !important;
 				}

 				.content__body img {
 	    				opacity: 0.75;
 	   				transition: opacity var(--transition-duration);
 	  			}

 	  			.content__body img:hover {
 	    				opacity: 1;
 	  			}

 				.content__body p {
 					line-height: 1.75rem;
 				}
 			}
			</style>
		<?php
	}
}
add_action( 'wp_head', 'zuari_dark_mode' );

/**
 * Takes the input value and turns it into something we can use reliably.
 *
 * @param boolean $input This is sometimes a boolean and sometimes a string.
 * @return String
 */
function zuari_sanitize_enable_darkmode( $input ) {
	if ( true === $input || '1' === $input ) {
		return '1';
	}
	return '';
}

/**
 * Render the selected fonts
 *
 * @return void
 */
function zuari_typography() {
	$mono_font     = get_theme_mod( 'mono_font', 'IBM Plex Mono' );
	$heading_font  = get_theme_mod( 'heading_font', 'IBM Plex Sans Condensed' );
	$body_font     = get_theme_mod( 'body_font', 'IBM Plex Serif' );
	$body_alt_font = get_theme_mod( 'body_alt_font', 'IBM Plex Sans' );

	$mono_font     = '"' . $mono_font . '", "Monaco", "Consolas", monospace;';
	$heading_font  = '"' . $heading_font . '", "Monaco", "Consolas", monospace;, "Roboto Condensed", "HelveticaNeue-CondensedBold", "Tahoma", sans-serif';
	$body_font     = '"' . $body_font . '", "Garamond", "Georgia", serif;';
	$body_alt_font = '"' . $body_alt_font . '", "Helvetica Neue", "Helvetica", "Nimbus Sans L", "Arial", sans-serif;';

	?>
	<style media="screen">
		:root {
			--mono-font: <?php echo $mono_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			--heading-font: <?php echo $heading_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			--body-font: <?php echo $body_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			--body-alt-font: <?php echo $body_alt_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_typography' );
