<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sindcon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Source+Sans+Pro:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sindcon' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="container">
			<div class="flex-header">
				<div class="site-branding">
						<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->	
				
				<div class="toggle-container show-sm text-right">
					<a href="#" data-component="toggleme" data-target="#site-navigation" class="button outline"><i class="kube-menu"></i>	MENU</a>
				</div>
				<div class="col col-6 push-right hide-sm">
					<div class="site-description">
						<?php 
							$the_description = get_bloginfo( 'description' );
							echo $the_description;
						?>
					</div>
					
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation hide-sm">
			<div class="container">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'	 => 'nav-list'
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
