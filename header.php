<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _RTCAMP
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
      
        
            
            
       <header id="masthead" class="site-header" style="background-image:url('<?php header_image(); ?>');">
		<div class="container">
		<div class="row">
		<div class="col-md-5">
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
			$__rtcamp_description = get_bloginfo( 'description', 'display' );
			if ( $__rtcamp_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $__rtcamp_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</div>
		<div class="col-md-7">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '__rtcamp' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'Primary',
				
			) );
			?>
		</nav><!-- #site-navigation --></div>
		</div>
		</div>
	</header><!-- #masthead -->

            <div id="content" class="site-content">
