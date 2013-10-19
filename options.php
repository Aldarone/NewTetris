<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_wpex_themes';
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();
	
	
	//GENERAL
	
	$options[] = array(
		'name' => __('General', 'options_framework_theme'),
		'type' => 'heading');
		
	$options['custom_logo'] = array(
		'name' => __('Custom Logo', 'options_framework_theme'),
		'desc' => __('Upload your custom logo.', 'options_framework_theme'),
		'std' => '',
		'id' => 'custom_logo',
		'type' => 'upload');
		
	$options['custom_favicon'] = array(
		'name' => __('Custom Favicon', 'options_framework_theme'),
		'desc' => __('Upload your custom site favicon.', 'options_framework_theme'),
		'id' => 'custom_favicon',
		'type' => 'upload');
		
	$options['responsive'] = array(
		'name' => __('Responsive?', 'options_framework_theme'),
		'desc' => __('Check box to enable the responsive layout.', 'options_framework_theme'),
		'id' => 'responsive',
		'std' => '1',
		'type' => 'checkbox');

	if ( function_exists( 'soliloquy_slider' ) ) {
			
		//Sliders
		$sliders = array();
		$sliders_obj = get_posts('post_type=soliloquy&sort_column=post_parent,menu_order&numberposts=-1');   
		$sliders = array( __("Select", 'wpex') => __("Select", 'wpex') ); 
		foreach ($sliders_obj as $slider) {
		$sliders[$slider->ID] = $slider->post_title; }
			 
		$options['home_slider'] = array(
			'name' => __('Homepage Soliloquy Slider', 'options_framework_theme','wpex'),
			'desc' => __('Select your homepage Soliloquy Slider.', 'options_framework_theme','wpex'),
			'id' => 'home_slider',
			'std' => 'Select',
			'type' => 'select',
			'options' => $sliders );
			
	}
	
	$options['home_subtitle'] = array(
		'name' => __('Homepage Subtitle', 'options_framework_theme'),
		'desc' => __('Check box to enable the responsive layout.', 'options_framework_theme'),
		'id' => 'home_subtitle',
		'std' => __('Welcome To Blog of AJ Clarke','wpex'),
		'type' => 'text');
		
		
	//SOCIAL

	$options[] = array(
		'name' => __('Social', 'options_framework_theme'),
		'type' => 'heading');	
		
		
	$options['header_social'] = array(
		'name' => __('Social?', 'options_framework_theme'),
		'desc' => __('Check box to enable the social section in the main menu.', 'options_framework_theme'),
		'id' => 'header_social',
		'std' => '1',
		'type' => 'checkbox');
		
	if(function_exists('wpex_get_social')) {	
	$social_links = wpex_get_social();
		foreach($social_links as $social_link) {
			$options[] = array( "name" => ucfirst($social_link),
								'desc' => ' '. __('Enter your ','wpex') . $social_link . __(' url','wpex') .' <br />'. __('Include http:// at the front of the url.', 'wpex'),
								'id' => $social_link,
								'std' => '',
								'type' => 'text');
		}
	}
		
		
	//ABOUT/SUPPORT
	
	$options[] = array(
		'name' => __('About', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Theme Credit', 'options_framework_theme'),
		'desc' => 'This theme was created by AJ Clarke from <a href="http://www.wpexplorer.com">WPExplorer.com</a>.',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Support? Donations?', 'options_framework_theme'),
		'desc' => 'If you love this free themes and wish to give back, you should consider purchasing one of my <a href="http://themeforest.net/user/WPExplorer?ref=wpexplorer">Premium Themes</a>. This way you can support me and get another great theme!<br /><br /> Thank you very much ;)',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Newsletter', 'options_framework_theme'),
		'desc' => 'To hear about new WordPress theme releases, tutorials, guides...and other great content from WPExplorer.com, you can <a href="http://wpexplorer.com/newsletter">subscribe to our Newsletter</a>',
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Advertisement', 'options_framework_theme'),
		'desc' => '<a href="http://www.wpexplorer.com/elegant-themes-main" title="Elegant Themes" target="_blank"><img src="'. get_template_directory_uri().'/images/misc/et-banner.gif" /></a>',
		'type' => 'info');


	return $options;
}


/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php } ?>