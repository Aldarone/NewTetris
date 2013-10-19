<?php
/**
 * This file is used for your video post entry
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */  
?>

<article <?php post_class('blog-entry clearfix'); ?>>  
	<div class="entry-text clearfix">
    	<div class="quote-content">
			<?php the_content(); ?><div class="quote-author">&#8211; <?php the_title(); ?></div>
        </div><!-- /quote-content -->
    </div><!-- /blog-entry-text-->
</article><!-- /blog-entry -->