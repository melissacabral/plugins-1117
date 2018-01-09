<?php
/*
Plugin Name: MMC Hey Look Here
Description: Adds a "hello-bar" style announcement to the top of the page
Author: Melissa Cabral
Version 0.1
License: GPLv3
*/


/**
 * HTML output for the bar
 */
add_action('wp_footer', 'mmc_hey_html');
function mmc_hey_html(){
	?>
	<!-- Hey Look Here Bar by Melissa Cabral -->
	<div id="hey-look-here-bar">
		<p>This is the text for the announcement bar
			<a href="#">Click Here!</a>
			<a class="dismiss">×</a>
		</p>
	</div>
	<?php 
}

/**
 * Attach all stylesheets and JS
 */
add_action( 'wp_enqueue_scripts', 'mmc_hey_scripts' );
function mmc_hey_scripts(){
	//attach stylesheet
	$css_url = plugins_url( 'css/hey-look-here.css', __FILE__ );
						//handle,      url,   dependencies, version
	wp_enqueue_style( 'hey-look-here-css', $css_url, array(), '0.1' );

	//attach jquery
	wp_enqueue_script( 'jquery' );

	//attach our custom script
	$js_url = plugins_url( 'js/hey-look-here.js', __FILE__ );
						// handle, 			url, 	dependencies, 	version, in footer?
	wp_enqueue_script( 'hey-look-here-js', $js_url, array('jquery'), '0.1', true );
}


//no close php