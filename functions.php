<?php
/**
 * _RTCAMP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _RTCAMP
 */

if ( ! function_exists( '_rtcamp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _rtcamp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _RTCAMP, use a find and replace
		 * to change '_rtcamp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_rtcamp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'Primary', 'Primary Header Navigation' );
        register_nav_menu( 'Secondary', 'Footer Navigation' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
        
        //
         add_theme_support( 'menus' );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_rtcamp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
        
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		 	$args = array(
	   'flex-width'    => true,
	   'width'         => 1000,
	   'flex-height'    => true,
	   'height'        => 250,
	   'default-image' => get_template_directory_uri() . '/images/logo.jpg',
        );
	add_theme_support( 'custom-logo', $args );

	$args = array(
	   'flex-width'    => true,
	   'width'         => 1000,
	   'flex-height'    => true,
	   'height'        => 250,
	   'default-image' => get_template_directory_uri() . '/images/header-bg.jpg',
        );
	add_theme_support( 'custom-header', $args );
	}
	
endif;
add_action( 'after_setup_theme', '_rtcamp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _rtcamp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_rtcamp_content_width', 640 );
}
add_action( 'after_setup_theme', '_rtcamp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _rtcamp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_rtcamp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', '_rtcamp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}

add_action( 'widgets_init', '_rtcamp_widgets_init' );


add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Latest News Sidebar' ),
            'description'   => __( 'Edit the Latest news sidebar' ),
            'before_widget' => '<div id="latest_news"><div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
	register_sidebar(
        array(
            'id'            => 'secondary',
            'name'          => __( 'Recent Projects Sidebar' ),
            'description'   => __( 'Edit the Recent projects content' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
	register_sidebar(
        array(
            'id'            => 'tertiary',
            'name'          => __( 'Stay in Touch Sidebar' ),
            'description'   => __( 'Manage Social Media Links on sidebar' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
	register_sidebar(
        array(
            'id'            => 'footerlogo',
            'name'          => __( 'footer logo' ),
            'description'   => __( 'Manage footer logo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}
/**
 * Enqueue scripts and styles.
 */
function _rtcamp_scripts() {
		wp_enqueue_style( '_rtcamp-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0.0', 'all');	
	
	wp_enqueue_style( 'custom2', get_template_directory_uri() . '/css/mystyle.css', array(), '1.0.0', 'all');
	
	wp_enqueue_style( 'custom3', get_template_directory_uri() . '/lib/css/font-awesome.min.css', array(), '1.0.0', 'all');

	wp_enqueue_script( '_rtcamp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/jquery/jquery.min.js', array(), '20151215', true );	
	
	wp_enqueue_script( '_rtcamp-js', get_template_directory_uri() . '/lib/js/bootstrap.js', array(), '20151215', true );
	
	wp_enqueue_script( '_rtcamp-jstether', get_template_directory_uri() . '/lib/js/tether.min.js', array(), '20151215', true );

	wp_enqueue_script( '_rtcamp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', '_rtcamp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function Custom_footer_edit($wp_customize){
	$wp_customize->add_section('footer_edit_section', array(
	'title' => 'Footer Edit'
	));
	
	$wp_customize->add_setting('footer_edit_setting', array(
	'default' => '2018 rtPanel. All Rights Reserved. Designed by Aum Trivedi(IT-LDRP_ITR)'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_edit_control', array(
	'label' => 'Footer Text',
	'section' => 'footer_edit_section',
	'settings' => 'footer_edit_setting'
	)));
}
add_action('customize_register', 'Custom_footer_edit');





function footer_logo($wp_customize){
	$wp_customize->add_section('Footer_Logo_change', array(
	'title' => 'Footer Logo Edit'
	));
	
	$wp_customize->add_setting('footer_logo_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_logo', array(
	'label' => 'Footer Logo Change',
	'section' => 'Footer_Logo_change',
	'settings' => 'footer_logo_setting',
	'width' => 194,
	'height' => 60
	)));
}
add_action('customize_register','footer_logo');

/*Featured posts*/
function Custom_feature_edit($wp_customize){
	$wp_customize->add_section('featured_post_image_one_section', array(
	'title' => 'Featured Posts Carousel'
	));
	
	$wp_customize->add_setting('featured_post_image_one_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_one_control', array(
	'label' => 'Featured post image 1',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_one_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_post_image_two_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_two_control', array(
	'label' => 'Featured post image 2',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_two_setting',
	'width' => 960,
	'height' => 300
	)));
	
	$wp_customize->add_setting('featured_post_image_three_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_three_control', array(
	'label' => 'Featured post image 3',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_three_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_post_image_four_setting');
	
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_post_image_four_control', array(
	'label' => 'Featured post image 4',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_post_image_four_setting',
	'width' => 960,
	'height' => 300
	)));
	$wp_customize->add_setting('featured_image_one_title', array(
	'default' => 'Title one'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_one_title', array(
	'label' => 'Title Text 1',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_one_title'
	)));
	
	
	$wp_customize->add_setting('featured_image_two_title', array(
	'default' => 'Title two'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_two_title', array(
	'label' => 'Title Text 2',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_two_title'
	)));
	
	
	
	$wp_customize->add_setting('featured_image_three_title', array(
	'default' => 'Title three'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_three_title', array(
	'label' => 'Title Text 3',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_three_title'
	)));
	

	$wp_customize->add_setting('featured_image_four_title', array(
	'default' => 'Title four'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'featured_post_four_title', array(
	'label' => 'Title Text 4',
	'section' => 'featured_post_image_one_section',
	'settings' => 'featured_image_four_title'
	)));
	
	$wp_customize->add_setting('features_post_content_one', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_one_control', array(
	'label' => 'Content for post 1',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_one',
	'type'=>'textarea'
	)));
	
	$wp_customize->add_setting('features_post_content_two', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_two_control', array(
	'label' => 'Content for post 2',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_two',
	'type'=>'textarea'
	)));
	
		$wp_customize->add_setting('features_post_content_three', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_three_control', array(
	'label' => 'Content for post 3',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_three',
	'type'=>'textarea'
	)));
	
	$wp_customize->add_setting('features_post_content_four', array(
	'default' => 'Lorem Ipsum dolor sit amet'
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'features_post_content_four_control', array(
	'label' => 'Content for post 4',
	'section'=>'featured_post_image_one_section',
	'settings'=>'features_post_content_four',
	'type'=>'textarea'
	)));
}
add_action('customize_register', 'Custom_feature_edit');

   function new_excerpt_more( $more ) {
   global $post;
   return '… <a href="'. get_permalink( $post->ID ) . '">' . 'Read More &raquo;' . '</a>';
   }
   add_filter( 'excerpt_more' , 'new_excerpt_more' );
   
   
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}




