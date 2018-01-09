<?php 
/*
Plugin Name: MMC Admin Tweaks
Description: Customizing the admin panel, login screen and register screen
Author: Melissa Cabral
Plugin URI: http://wordpress.melissacabral.com
Author URI: http://melissacabral.com
Version: 0.1
License: GPLv3
 */

/**
 * Style the Login & Register Forms
 */
function mmc_login_style(){
	$url = plugins_url( 'css/login.css', __FILE__ );
	wp_enqueue_style( 'login-css', $url  );
}
add_action( 'login_enqueue_scripts', 'mmc_login_style' );

//change the href of the login logo
function mmc_login_logo_href(){
	return home_url();
}
add_filter( 'login_headerurl', 'mmc_login_logo_href' );


//change the title of the login logo link
function mmc_login_logo_title(){
	return 'Return to the home page';
}
add_filter( 'login_headertitle', 'mmc_login_logo_title');


/**
 * Remove unnecessary dashboard widgets
 */
function mmc_dashboard(){
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

	//remove the "news" box for non-admin users
	if( ! current_user_can( 'manage_options' ) ):
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	endif;

	//add our custom dashboard widget
	//$widget_id, $widget_name, $callback
	wp_add_dashboard_widget( 'mmc_dashboard_widget', 'Useful Video', 
		'mmc_dash_widget_content' );
}
add_action( 'wp_dashboard_setup', 'mmc_dashboard' );


//custom function for our dashboard widget content
function mmc_dash_widget_content(){
	?>
	<p>Here's a helpful thing:</p>
	<iframe width="320" height="200" src="https://www.youtube.com/embed/VxJ69qBn-GQ" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
	<?php 
}

/**
 * Add or remove items from the Toolbar (Admin Bar)
 */
function mmc_toolbar( $wp_admin_bar ){
	//remove the WP logo and dropdown
	$wp_admin_bar->remove_node('wp-logo');

	//add a contact button
	$wp_admin_bar->add_node( array(
		'id' 	=> 'mmc_contact',
		'title' => '<span class="ab-icon" style="top:2px;"></span>Contact Me',
		'href'	=> 'mailto:melissacabral@gmail.com',
	) );
}
add_action( 'admin_bar_menu', 'mmc_toolbar', 999 );