<?php
/**
 * zuari Theme Customizer
 *
 * @package zuari
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zuari_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image_data'  )->transport = 'postMessage';


	$wp_customize->add_setting('header_bgcolor', array(
		'default' => '#eaeaea',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'header_bgcolor',
		array(
			'label'      => __( 'Header Background Color', 'zuari' ),
			'section'    => 'colors',
			'settings'   => 'header_bgcolor',
	    'priority'   => 1
		)
	));

	$wp_customize->add_setting('fgcolor', array(
		'default' => '#000000',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'fgcolor',
		array(
			'label'      => __( 'Foreground Color', 'zuari' ),
			'section'    => 'colors',
			'settings'   => 'fgcolor',
	    #'priority'   => 5
		)
	));

	$wp_customize->add_setting( 'enable_darkmode', array (
		'default' => '',
		'sanitize_callback' => 'sanitize_enable_darkmode'
	) );
	$wp_customize->add_control( new WP_CUstomize_Control(
		$wp_customize,
		'enable_darkmode',
		array(
			'label' => __( 'Allow the operating system\'s dark mode to override my color settings.', 'zuari' ),
			'section' => 'colors',
			'settings' => 'enable_darkmode',
			'type' => 'checkbox'
		)
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header__title a',
			'render_callback' => 'zuari_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.header__description',
			'render_callback' => 'zuari_customize_partial_blogdescription',
		) );
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
	wp_enqueue_script( 'zuari-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), false, true );
}
add_action( 'customize_preview_init', 'zuari_customize_preview_js' );

/**
 * Render the header in the correct background color.
 *
 * @return void
 */
function zuari_header_bgcolor_css() {
	?>
	<style media="screen">
		.header {
			background-color: <?php echo esc_attr(get_theme_mod('header_bgcolor', 'eaeaea')); ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'zuari_header_bgcolor_css');

/**
 * Render the text and links in the correct color.
 *
 * @return void
 */
function zuari_fgcolor_css() {
	?>
	<style media="screen">
		:root {
			--fg-color: <?php echo esc_attr(get_theme_mod('fgcolor', '#000000')); ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'zuari_fgcolor_css');

/**
 * Override the colors and add the dark mode CSS class if enabled
 *
 * @return void
 */
function zuari_dark_mode() {
	if ( get_theme_mod( 'enable_darkmode') === '1' ) {

		?>
			<style media="screen">
			@media (prefers-color-scheme: dark) {
				:root {
					--bg-color: #222;
					--fg-color: #bdc3c7;
				}

				body.custom-background {
					background-color: var(--bg-color) !important;
				}
			}
			</style>
		<?php
	}
}
add_action( 'wp_head', 'zuari_dark_mode');

function sanitize_enable_darkmode( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}
