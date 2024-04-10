<?php
function besu_register_all_blocks() {
	$block_directories = glob(BESU_THEME_DIR . "/build/blocks/*", GLOB_ONLYDIR);

	foreach ($block_directories as $block) {
		register_block_type( $block );
	}
}
add_action( 'init', 'besu_register_all_blocks' );
