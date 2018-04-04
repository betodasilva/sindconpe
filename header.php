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
		<div class="header__top hide-sm">
			<div class="container">
				<div class="row gutters">
					<div class="col col-4 offset-8 text-right">
						<a href="https://www.google.com/maps/place/SINDCON/@-8.0570922,-34.8879328,17z/data=!3m1!4b1!4m5!3m4!1s0x7ab18c017b239af:0x368b3e530acc1932!8m2!3d-8.0570975!4d-34.8857441" target="_blank" class="no-decoration">
							<i class="material-icons midgray v-align-middle">map</i> Ver no mapa
						</a>
						<span style="margin-left:10px;margin-right:8px;" class="no-decoration"><i class="material-icons midgray v-align-middle">phone</i> 81 3423.8149</span>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			
			<div class="flex-header align-middle">
				<div class="site-branding">
						<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->	
				
				<div class="toggle-container text-right">
					<a href="#" data-component="toggleme" data-target="#site-navigation" class="button outline green"><i class="kube-menu"></i>	MENU</a>
				</div>
				<div class="col col-6 push-right hide-sm">
					<div class="site-description">
						<?php 
							$the_description = get_bloginfo( 'description' );
							echo $the_description;
						?>
					</div>
					<?php if ( is_active_sidebar( 'header-widget' ) ) echo '<div class="header-widget">'; dynamic_sidebar( 'header-widget' ); echo '</div>'; ?>
				</div>
			</div>
			<div class="col col-12 show-sm">
				<?php if ( is_active_sidebar( 'header-widget' ) ) echo '<div class="header-widget">'; dynamic_sidebar( 'header-widget' ); echo '</div>'; ?>
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
