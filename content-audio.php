<?php
/**
 * This file is used for your audio post entry
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>

<article <?php post_class('blog-entry clearfix'); ?>>  
	<?php
	// Show Featured Image
	if( has_post_thumbnail() ) {  ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php }
	// Get Audio Meta
	$wpex_post_audio_mp3 = get_post_meta($post->ID, 'wpex_post_audio_mp3', true);
	$wpex_post_audio_ogg = get_post_meta($post->ID, 'wpex_post_audio_ogg', true);
	
	// Show Audio Player if the meta options aren't blank
	if($wpex_post_audio_mp3 || $wpex_post_audio_ogg) {
		
		// Get audio player scripts
		wp_enqueue_script('jplayer', get_template_directory_uri() .'/js/jquery.jplayer.min.js', array('jquery'), '2.1.0', true);
		wp_enqueue_style( 'wpex-audioplayer', WPEX_CSS_DIR .'/audioplayer.css' );
		?>
    
		<script type="text/javascript">
		jQuery(function($){
			jQuery(document).ready(function($){
				if( $().jPlayer ) {
					  $("#jquery_jplayer_<?php echo $post->ID; ?>").jPlayer({
						  ready: function () {
							  $(this).jPlayer("setMedia", {
								    poster: "<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' ); ?>",
									mp3: "<?php echo $wpex_post_audio_mp3; ?>",
									oga: "<?php echo $wpex_post_audio_ogg; ?>"
							  });
							  },
						  cssSelectorAncestor: "#jp_interface_<?php echo $post->ID; ?>",
						  swfPath: "<?php echo get_template_directory_uri(); ?>/js",
						  supplied: "<?php if($wpex_post_audio_ogg) echo 'oga'; ?><?php if($wpex_post_audio_mp3 && $wpex_post_audio_ogg) echo','; ?><?php if($wpex_post_audio_mp3) echo 'mp3'; ?>"
					  });
				  
				  }
			  });
		  });
		</script>
        <div id="jquery_jplayer_<?php echo $post->ID; ?>" class="jp-jplayer"></div>
        <div id="jp_container_<?php echo $post->ID; ?>" class="jp-audio">
            <div id="jp_interface_<?php echo $post->ID; ?>" class="jp-gui jp-interface">
                <ul class="jp-controls">
                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                    <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                    <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                </ul>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
            </div><!-- /jp_interface_<?php echo $post->ID; ?> -->
        </div><!-- .jp-jplayer -->
    <?php } ?>
   
    <div class="entry-text clearfix">
        <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </header>
		<?php
        // If not empty who the post excerpt
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
                // If post excerpt empty trim the content to 20 words
               echo wp_trim_words(get_the_content(), 20); } ?>
		<ul class="entry-meta">
        	<li><strong>Posted on:</strong> <?php echo get_the_date(); ?></li>
            <li><strong>By:</strong> <?php the_author_posts_link(); ?></li>   
            <?php if(comments_open()) { ?><li class="comment-scroll"><strong>With:</strong> <?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?></li><?php } ?>
        </ul><!-- /entry-meta -->
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->