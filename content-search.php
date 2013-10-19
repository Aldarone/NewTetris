<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file contains the styling for blog post entries.
 */
 
//start loop
while (have_posts()) : the_post(); ?>  

<article <?php post_class('search-entry clearfix'); ?>>  
	<?php
    //get full URL to image
    $img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full');
        
    //resize & crop the image
    $featured_image = aq_resize( $img_url, 100, 80, true );
    
    //show featured image if available
    if($featured_image) {  ?>
    <div class="search-entry-image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" /></a>
    </div><!-- /search-entry-image -->
    <div class="search-entry-text">
    <?php } //featured image not set ?>
        <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
       </header>
        	<p>
			<?php
            //show excerpt
            $content = get_the_content();
            $content_stripped = strip_shortcodes($content);
            $excerpt = !empty($post->post_excerpt) ? get_the_excerpt() : wp_trim_words($content_stripped, 40);
            echo $excerpt; ?>
            </p>
        <?php if($featured_image) {  ?>
        </div><!-- /search-entry-text -->
        <?php } //featured image not set ?>
</article><!-- /entry -->
<?php
//end loop
endwhile; ?>