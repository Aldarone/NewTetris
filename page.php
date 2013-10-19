<?php
/**
 * Page.php is used to render your regular pages.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
// Show featured image
if( has_post_thumbnail( get_the_ID() ) ) {
	$wpex_header_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
	echo '<div id="page-featured-img"><img src="'. $wpex_header_img[0] .'" alt="'. get_the_title() .'" /></div>';
} ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>	
</div><!-- /page-heading -->

<div id="single-page-content" class="container sidebar-bg clearfix">
    <article id="post" class="clearfix">
        <div class="entry clearfix">	
            <?php the_content(); ?>
        </div><!-- /entry -->         
    <?php comments_template(); ?>
    </article><!-- /post -->
	<?php
	endwhile; endif;
	get_sidebar(); // Loads the sidebar.php file ?>
</div><!-- /container -->

<?php
get_footer(); // Loads the footer.php file ?>