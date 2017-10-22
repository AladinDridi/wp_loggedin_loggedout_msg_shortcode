<?php
/* @wordpress-plugin
 * Plugin Name:       Wordpress show message by shortcode for logged_in or logged_out users
 * Plugin URI:        https://githib.org/aladindridi
 * Description:       this simple plugin will provide for you shortcodes for showing message when users is logged in or logged out ..
 * Version:           1.0
 * Requires at least: 4.0
 * Tested up to: 4.8.2
 * Author:            Aladin Dridi
 * Author URI:        https://Rumi-app.org
 * Text Domain:       Wp-logged-logged_message-shortcodes 
 */
global $current_user;
$dir = plugin_dir_path(__FILE__);
    wp_enqueue_style($dir.'/style/bootstrap.css');
    wp_enqueue_style($dir.'/style/bootstrap.min.css');
function simple_message($msg){
    	$msg = shortcode_atts(
		array(
			'message' => 'no foo',
		), $msg, 'user_message' );


    return '<p class="bg-info">'.$msg['message'].'</p>';
} 
add_shortcode('user_message','simple_message');

function message_loggedout($msg){
    $msg = shortcode_atts(
		array(
			'message' => 'no foo',
		), $msg, 'user_loggedout_message');
    if(!is_user_logged_in()){
        return '<p class="bg-info">'.$msg['message'].'</p>';
    }
} 
add_shortcode('user_loggedout_message','message_loggedout');
function message_loggedin($msg){
     $msg = shortcode_atts(
		array(
			'message' => 'no foo',
		), $msg, 'user_loggedin_message');
    if (is_user_logged_in()){
        return '<p class="bg-info">'.$msg['message'].'</p>';
    }else {return null ;}
    
} 
add_shortcode('user_loggedin_message','message_loggedin');




function message_role($msg){
    $msg = shortcode_atts(
		array(
			'message' =>'fool',
            'roleid'  =>'',
		), $msg, 'user_role_message');
    if(current_user_can($msg['roleid'])==true){
        return '<p class="bg-info">'.$msg['message'].'</p>';
    
    
} 
}
add_shortcode('user_role_message','message_role');


?>