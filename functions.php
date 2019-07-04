<?php
/**
 * redux functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package redux
 */

if ( ! function_exists( 'redux_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function redux_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on redux, use a find and replace
		 * to change 'redux' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'redux', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'redux' ),
			'menu-2' => esc_html__( 'Footer-1', 'redux' ),
			'menu-3' => esc_html__( 'Footer-1', 'redux' ),
		) );

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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'redux_custom_background_args', array(
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
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'redux_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function redux_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'redux_content_width', 640 );
}
add_action( 'after_setup_theme', 'redux_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function redux_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'redux' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'redux' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'redux_widgets_init' );

function custom_init() {
	$args = array(
		'public' => true,
		'label' => 'Gallery',
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
	);
	register_post_type('gallery', $args);
}
add_action('init', 'custom_init');

function register_private_taxonomy() {

		$args = array(
			'public' => true,
			'label' => 'Sort',
			'rewrite' => false,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
		);
		register_taxonomy('sort', 'gallery', $args);
	
}
add_action('init', 'register_private_taxonomy');

/**
 * Enqueue scripts and styles.
 */
function redux_scripts() {
	wp_enqueue_style( 'redux-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'redux-fontawesome', get_template_directory_uri().'/assets/css/font-awesome.css' );
    wp_enqueue_style( 'redux-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
    wp_enqueue_style( 'redux-slick', get_template_directory_uri().'/assets/css/slick.css' );
    wp_enqueue_style( 'redux-fancybox', get_template_directory_uri().'/assets/css/jquery.fancybox.css' );
    wp_enqueue_style( 'redux-default-theme', get_template_directory_uri().'/assets/css/theme-color/default-theme.css' );
	wp_enqueue_style( 'redux-stylesheet', get_template_directory_uri().'/assets/css/style.css' );
	wp_enqueue_style( 'redux-font-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
	wp_enqueue_style( 'redux-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700'  );
	
 
	wp_enqueue_style('jquery');

	wp_enqueue_script( 'redux-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
    // wp_enqueue_script( 'redux-jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true );
    wp_enqueue_script( 'redux-js-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '20151215', true );
    wp_enqueue_script( 'redux-js-slick', get_template_directory_uri() . '/assets/js/slick.js', array(), '20151215', true );
    wp_enqueue_script( 'redux-waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array(), '20151215', true );
    wp_enqueue_script( 'redux-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.js', array(), '20151215', true );
	wp_enqueue_script( 'redux-mixitup', get_template_directory_uri() . '/assets/js/jquery.mixitup.js', array(), '20151215', true );
	wp_enqueue_script( 'redux-js-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array(), '20151215', true );
	wp_enqueue_script( 'redux-js-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );



	wp_enqueue_script( 'redux-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'redux_scripts' );

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
 * Load TGM
 */
require get_template_directory() . '/TGM/redux-theme.php';

/**
 * Load Redux
 */
require get_template_directory() . '/inc/redux-config.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

