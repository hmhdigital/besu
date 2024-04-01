<?php
/**
 * Bēsu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bēsu
 */

if ( ! defined( 'BESU_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BESU_VERSION', '1.0.0' );
}

 /**
 * Navi composer autoload
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
}

/**
 * Wordpress defaults and theme features.
 */
require get_template_directory() . '/inc/bootstrap.php';

/**
 *  Navi custom menu functionality.
 */
require get_template_directory() . '/inc/custom-menu.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue scripts and styles.
 */
function besu_scripts() {

	 // Loads bundled theme CSS.
	 wp_enqueue_style( 'besu-css-styles', get_template_directory_uri() . '/build/index.css',
	 array(),
	 (include get_template_directory() . '/build/index.asset.php')['version']
	 );
	 wp_style_add_data( 'besu-style', 'rtl', 'replace' );


	// Loads bundled theme JS.
	wp_enqueue_script('besu-js-scripts', get_template_directory_uri() . '/build/index.js',
	(include get_template_directory() . '/build/index.asset.php')['dependencies'],
	(include get_template_directory() . '/build/index.asset.php')['version'],
	true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'besu_scripts' );

