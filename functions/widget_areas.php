<?php
/**
 * Define sidebars for use in this theme
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

//main sidebar
register_sidebar(array(
	'name' => __( 'Sidebar','wpex'),
	'id' => 'sidebar',
	'description' => __( 'Widgets in this area are used on the main sidebar region.','wpex' ),
	'before_widget' => '<div class="sidebar-box %2$s clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h4><span>',
	'after_title' => '</span></h4>',
));

//footer 1
register_sidebar(array(
	'name' => __( 'Footer 1','wpex'),
	'id' => 'footer-one',
	'description' => __( 'Widgets in this area are used in the first footer column','wpex' ),
	'before_widget' => '<div class="footer-widget %2$s clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h4><span>',
	'after_title' => '</span></h4>',
));
//footer 2
register_sidebar(array(
	'name' => __( 'Footer 2','wpex'),
	'id' => 'footer-two',
	'description' => __( 'Widgets in this area are used in the second footer column','wpex' ),
	'before_widget' => '<div class="footer-widget %2$s clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h4><span>',
	'after_title' => '</span></h4>'
));
//footer 3
register_sidebar(array(
	'name' => __( 'Footer 3','wpex'),
	'id' => 'footer-three',
	'description' => __( 'Widgets in this area are used in the third footer column','wpex' ),
	'before_widget' => '<div class="footer-widget %2$s clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h4><span>',
	'after_title' => '</span></h4>',
));
?>