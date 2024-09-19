<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bēsu
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php block_template_part( 'content', get_post_type() )?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
