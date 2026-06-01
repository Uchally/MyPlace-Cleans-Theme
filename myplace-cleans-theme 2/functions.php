<?php
/**
 * MyPlace Cleans theme functions.
 *
 * @package MyPlaceCleans
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'MYPLACE_VERSION' ) ) {
	define( 'MYPLACE_VERSION', '1.1.0' );
}

// Customizer (logo, colors, contact, social).
require get_template_directory() . '/inc/customizer.php';

// Contact form handler.
require get_template_directory() . '/inc/contact.php';

/**
 * Theme setup.
 */
function myplace_setup() {
	load_theme_textdomain( 'myplace-cleans', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 64,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
	) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'myplace-cleans' ),
		'footer'  => __( 'Footer Menu', 'myplace-cleans' ),
	) );
}
add_action( 'after_setup_theme', 'myplace_setup' );

/**
 * Enqueue styles and scripts.
 */
function myplace_assets() {
	// Fonts.
	wp_enqueue_style(
		'myplace-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Main stylesheet (style.css at theme root).
	wp_enqueue_style(
		'myplace-style',
		get_stylesheet_uri(),
		array( 'myplace-fonts' ),
		MYPLACE_VERSION
	);

	// Main JS (mobile nav etc).
	wp_enqueue_script(
		'myplace-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		MYPLACE_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'myplace_assets' );

/**
 * Register a sidebar (optional, used by blog templates).
 */
function myplace_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'myplace-cleans' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar used on blog pages.', 'myplace-cleans' ),
		'before_widget' => '<section id="%1$s" class="widget card-surface %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'myplace_widgets_init' );

/**
 * Fallback for primary menu when none assigned — renders top-level pages.
 */
function myplace_primary_menu_fallback() {
	wp_page_menu( array(
		'menu_class' => 'main-nav__list',
		'container'  => 'ul',
	) );
}

/**
 * Add a body class for pages without a featured image.
 */
function myplace_body_classes( $classes ) {
	if ( ! is_singular() || ! has_post_thumbnail() ) {
		$classes[] = 'no-featured-image';
	}
	return $classes;
}
add_filter( 'body_class', 'myplace_body_classes' );

/**
 * Excerpt length and more.
 */
function myplace_excerpt_length() { return 28; }
add_filter( 'excerpt_length', 'myplace_excerpt_length' );
function myplace_excerpt_more() { return '…'; }
add_filter( 'excerpt_more', 'myplace_excerpt_more' );

/**
 * Helper: inline SVG icons (keeps markup tidy in templates).
 */
function myplace_icon( $name ) {
	$icons = array(
		'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.37 1.9.72 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0 1 22 16.92z"/></svg>',
		'mail'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg>',
		'map'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 7-8 12-8 12s-8-5-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>',
		'chat'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>',
		'menu'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6"  x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>',
		'close' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6"  x2="6"  y2="18"/><line x1="6"  y1="6"  x2="18" y2="18"/></svg>',
	);
	echo isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}
