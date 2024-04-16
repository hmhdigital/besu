<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bēsu
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'besu' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$besu_description = get_bloginfo( 'description', 'display' );
			if ( $besu_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $besu_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<?php

		/**
		 * Primary Navigation using Navi by Log1x
		 *
		 * @link https://developer.wordpress.org/reference/functions/wp_get_nav_menu_items/
		 *
		 * @package Bēsu
		 */

		$navigation = \Log1x\Navi\Navi::make()->build('menu-1');
		?>

		<?php if ( $navigation->isNotEmpty() ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<ul id="primary-menu">
					<?php foreach ( $navigation->toArray() as $item ) : ?>
						<li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?>">
							<a href="<?php echo $item->url; ?>">
								<?php echo $item->label; ?>
							</a>

							<?php if ( $item->children ) : ?>
								<ul >
									<?php foreach ( $item->children as $child ) : ?>
										<li class="<?php echo $child->classes; ?> <?php echo $child->active ? 'current-item' : ''; ?>">
											<a href="<?php echo $child->url; ?>">
												<?php echo $child->label; ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		<?php endif; ?>
	</header><!-- #masthead -->
