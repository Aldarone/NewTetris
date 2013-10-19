<?php
/**
 * Search.php is used for your search result pages.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template
?>

<header id="page-heading">
	<h1 id="archive-title"><?php _e('Search Results For','wpex'); ?>: &quot<?php the_search_query(); ?>&quot</h1>
</header><!-- /page-heading -->

<div id="search-results-page" class="container sidebar-bg clearfix">
    <div id="post" class="clearfix">
		<?php
		if (have_posts()) : 
		
			//show posts using the serach loop
			get_template_part( 'content', 'search');
		
		else :
		
			_e('Sorry, no results where found','wpex');
		
		endif;
		?>
    </div><!-- /post  -->
	<?php get_sidebar(); // Loads the sidebar.php file ?>
</div><!-- /search-results-page -->
<?php wpex_pagination(); //paginate pages ?>
<?php get_footer(); // Loads the footer.php file ?>