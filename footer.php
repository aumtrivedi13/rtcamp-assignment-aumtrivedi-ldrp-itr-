<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _rtcamp
 */
?>
	</div><!-- #content -->
		<div class="footer-header-image" style="background-image:url('<?php header_image(); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<nav id="site-navigation" class="main-navigation">
					<div class="bottomMenu">
							  <?php wp_nav_menu( array( 'theme_location' => 'Secondary' ) ); ?>  
					</div>
				</nav><!-- #site-navigation -->
					<div id="colophon" class="site-footer copyright-text">
					<div class="site-info">
						<?php
							/* translators: %s: CMS name, i.e. WordPress. */	
						echo get_theme_mod('footer_edit_setting');
						?>
					</div><!-- .site-info -->
				</div><!-- #colophon -->
			</div>
		
			<div class="col-md-2">
				<aside id="sidebar-tertiary" class="sidebar" align="right">
						<?php dynamic_sidebar( 'footerlogo' ); ?>
						<a href="#"><img src="<?php echo wp_get_attachment_url(get_theme_mod('footer_logo_setting'));?>"/></a>
				</aside><!-- #touch 3-->
			</div>
		</div>
	</div>
	
</div><!-- #page -->
</div>
<?php wp_footer(); ?>
</body>
</html>
