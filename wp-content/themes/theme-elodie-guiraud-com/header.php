<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thème_elodie-guiraud.com
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'theme-elodie-guiraud-com' ); ?></a>
	<?php if ( is_front_page() ) : ?> 
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<span><?php echo do_shortcode( "[global_variable variable_name='LOGOSITE']") ?></span>
				<?php echo do_shortcode( "[global_variable variable_name='INTROPHRASE']") ?>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->
	
	<?php else : ?>
		<header id="masthead" class="site-header">
			<div class="site-branding">
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span><?php echo do_shortcode( "[global_variable variable_name='LOGOSITE']") ?></span> <?php bloginfo( 'name' ); ?></a></p>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->	
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'theme-elodie-guiraud-com' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->		
	<?php 
		endif;
		$theme_elodie_guiraud_com_description = get_bloginfo( 'description', 'display' );
		if ( $theme_elodie_guiraud_com_description || is_customize_preview() ) :
	?>
				<p class="site-description">
				
				<?php echo $theme_elodie_guiraud_com_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				
			<?php endif; ?>

	