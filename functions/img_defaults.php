<?php
/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! function_exists( 'wpex_img_heights' ) ) :
    function wpex_img($args){

        //blog entry
        if( $args == 'blog_entry_width' ) return '370';
        if( $args == 'blog_entry_height' ) return '9999';
        if( $args == 'blog_entry_crop' ) return false;

        //blog post
        if( $args == 'blog_width' ) return '960';
        if( $args == 'blog_height' ) return '9999';
        if( $args == 'blog_crop' ) return false;

    }
endif;
?>
