<?php
/**
 * This file loads the CSS and Javascript used for the theme.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
 
add_action('wp_enqueue_scripts','wpex_load_scripts');
function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	// Main
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// Responsive
	if( of_get_option('responsive') == '1') wp_enqueue_style('wpex-responsive', WPEX_CSS_DIR . '/responsive.css');
	
	// Font awesome
	wp_enqueue_style('awesome-font', WPEX_CSS_DIR . '/awesome_font.css', 'style');
	
	// Google Fonts
	wp_enqueue_style('opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,300,600,700&subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext', 'style');
	
	// PrettyPhoto Lightbox
	wp_enqueue_style('prettyphoto', WPEX_CSS_DIR . '/prettyphoto.css', 'style', true);
	
	

	/*******
	*** jQuery
	*******************/
	
	// Main Scripts
	wp_enqueue_script('hoverIntent', WPEX_JS_DIR .'/hoverintent.js', array('jquery'), 'r6', true);
	wp_enqueue_script('superfish', WPEX_JS_DIR .'/superfish.js', array('jquery'), '1.4.8', true);
	wp_enqueue_script('easing', WPEX_JS_DIR .'/easing.js', array('jquery'), '1.3', true);
	wp_enqueue_script('flexslider', WPEX_JS_DIR .'/flexslider-min.js', array('jquery'), '2', true);
	wp_enqueue_script('prettyphoto', WPEX_JS_DIR .'/prettyphoto.js', array('jquery'), '3.1.4', true);
	
	// Load Isotope
	wp_enqueue_script('isotope', WPEX_JS_DIR .'/isotope.min.js', array('jquery'), '1.5.19', true);
	wp_enqueue_script('wpex-isotope-blog-init', WPEX_JS_DIR .'/isotope_blog.js', array('jquery'), '1.0', true);

	// Responsive
	wp_enqueue_script('fitvids', WPEX_JS_DIR .'/fitvids.js', array('jquery'), 1.0, true);
	wp_enqueue_script('uniform', WPEX_JS_DIR .'/uniform.js', array('jquery'), '1.7.5', true);
	wp_enqueue_script('wpex-responsive', WPEX_JS_DIR .'/responsive.js', array('jquery'), '', true);
	
	// Comment replies
	if(is_single() || is_page()) {
		wp_enqueue_script('comment-reply');
	}
	
	// Localize responsive nav
	$nav_params = array(
		'text' => __('Menu','wpex'),
	);
	wp_localize_script( 'wpex-responsive', 'responsiveLocalize', $nav_params );
	
	// Initialize
	wp_enqueue_script('wpex-global-init', WPEX_JS_DIR .'/initialize.js', false, '1.0', true);

	
} //end wpex_load_scripts()
?>