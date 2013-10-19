<?php
/**
 * Social Icons Widget based on Theme Options Panel
 * @package Mason WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
class wpex_social_widget extends WP_Widget {
    /** constructor */
    function wpex_social_widget() {
        parent::WP_Widget( false, $name = __('Social Profiles','wpex') );
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<ul class="wpex-widget-social">
								<?php
								$wpex_social_links = wpex_get_social();
								//social loop
								foreach( $wpex_social_links as $wpex_social_link ) {
									if( of_get_option( $wpex_social_link ) ) {
										echo '<li><a href="'. of_get_option($wpex_social_link) .'" title="'. $wpex_social_link .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/social/'.$wpex_social_link.'.png" alt="'. $wpex_social_link .'" /></a></li>';
								} }
								?>
							</ul>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	
	    $instance = wp_parse_args( (array) $instance, array( 'title' => __('Follow Us','wpex') ) );					
        $title = esc_attr($instance['title']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wpex'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title','wpex'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php
    }


} // class wpex_social_widget
// register Recent Posts widget
add_action('widgets_init', create_function('', 'return register_widget("wpex_social_widget");'));	
?>