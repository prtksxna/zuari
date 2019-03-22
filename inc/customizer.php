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
		'default' => 'eaeaea',
		'transport' => 'postMessage',
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
			background-color: <?php echo get_theme_mod('header_bgcolor', 'eaeaea'); ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'zuari_header_bgcolor_css');
