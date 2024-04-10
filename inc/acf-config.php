<?php
/**
 * ACF Set custom load and save JSON points.
 */

add_filter( 'acf/json/load_paths', 'besu_json_load_paths' );
add_filter( 'acf/settings/save_json/type=acf-field-group', 'besu_json_save_path_field_groups' );
add_filter( 'acf/settings/save_json/type=acf-ui-options-page', 'besu_json_save_path_option_pages' );
add_filter( 'acf/settings/save_json/type=acf-post-type', 'besu_json_save_path_post_types' );
add_filter( 'acf/settings/save_json/type=acf-taxonomy', 'besu_json_save_path_taxonomies' );
add_filter( 'acf/json/save_file_name', 'besu_json_filename', 10, 3 );


/**
 * Set a custom ACF JSON load path.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/#loading-explained
 *
 * @param array $paths Existing, incoming paths.
 * @return array $paths New, outgoing paths.
 *
 * @since 0.1.1
 */
function besu_json_load_paths( $paths ) {

	$paths[] = BESU_THEME_DIR . '/acf-json/field-groups';
	$paths[] = BESU_THEME_DIR . '/acf-json/options-pages';
	$paths[] = BESU_THEME_DIR . '/acf-json/post-types';
	$paths[] = BESU_THEME_DIR . '/acf-json/taxonomies';

	return $paths;
}

/**
 * Set custom ACF JSON save point for
 * ACF generated post types, field groups, taxonomies, and options pages.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/#saving-explained
 *
 * @return string $path New, outgoing path.
 *
 * @since 0.1.1
 */
function besu_json_save_path_post_types() {
	return BESU_THEME_DIR . '/acf-json/post-types';
}

function besu_json_save_path_field_groups() {
	return BESU_THEME_DIR . '/acf-json/field-groups';
}

function besu_json_save_path_taxonomies() {
	return BESU_THEME_DIR . '/acf-json/taxonomies';
}

function besu_json_save_path_option_pages() {
	return BESU_THEME_DIR . '/acf-json/options-pages';
}

/**
 * Customize the file names for each file.
 *
 * @link https://www.advancedcustomfields.com/resources/local-json/#saving-explained
 *
 * @param string $filename  The default filename.
 * @param array  $post      The main post array for the item being saved.
 *
 * @return string $filename
 *
 * @since  0.1.1
 */
function besu_json_filename( $filename, $post ) {
	$filename = str_replace(
		array(
			' ',
			'_',
		),
		array(
			'-',
			'-',
		),
		$post['title']
	);

	$filename = strtolower( $filename ) . '.json';

	return $filename;
}
