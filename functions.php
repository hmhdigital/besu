<?php
/**
 * Bēsu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bēsu
 */

 /**
 * Constants defined here
 */
if ( ! defined( 'BESU_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BESU_VERSION', '1.0.0' );
}

define( 'BESU_THEME_DIR', __DIR__ );

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
 * ACF Blocks Configuration
 */
require 'inc/acf-config.php';

/**
 * ACF Block Registration
 */
require 'inc/register-blocks.php';

/**
 * Enqueue scripts and styles.
 */
function besu_scripts() {
	$ASSET_INFO = include get_stylesheet_directory() . '/build/theme/index.asset.php';
	 // Loads bundled theme CSS.
	 wp_enqueue_style( 'besu-css-styles', get_stylesheet_directory_uri() . '/build/theme/index.css', array(), $ASSET_INFO['version'] );
	 wp_style_add_data( 'besu-style', 'rtl', 'replace' );


	// Loads bundled theme JS.
	wp_enqueue_script( 'besu-js-scripts', get_stylesheet_directory_uri() . '/build/theme/index.js', $ASSET_INFO['dependencies'], $ASSET_INFO['version'] );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'besu_scripts' );

