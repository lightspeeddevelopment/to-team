<?php
/*
 * Plugin Name:	Tour Operator Team
 * Plugin URI:	{plugin-url}
 * Description:	{plugin-description}
 * Author:		{your-name}
 * Version: 	1.0.0
 * Author URI: 	{your-url}
 * License: 	GPL2+
 * Text Domain: to-team
 * Domain Path: /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('TO_TEAM_PATH',  plugin_dir_path( __FILE__ ) );
define('TO_TEAM_CORE',  __FILE__ );
define('TO_TEAM_URL',  plugin_dir_url( __FILE__ ) );
define('TO_TEAM_VER',  '1.0.0' );

/**
 * Runs once when the plugin is activated.
 */
function to_team_activate_plugin() {
    $lsx_to_password = get_option('lsx_api_instance',false);
    if(false === $lsx_to_password){
    	update_option('lsx_api_instance',LSX_API_Manager::generatePassword());
    }
}
register_activation_hook( __FILE__, 'to_team_activate_plugin' );

/* ======================= The API Classes ========================= */
if(!class_exists('LSX_API_Manager')){
	require_once('classes/class-lsx-api-manager.php');
}

/** 
 *	Grabs the email and api key from the LSX Search Settings.
 */ 
function to_team_options_pages_filter($pages){
	$pages[] = 'to-settings';
	return $pages;
}
add_filter('lsx_api_manager_options_pages','to_team_options_pages_filter',10,1);

function to_team_api_admin_init(){
	$options = get_option('_to_settings',false);
	$data = array('api_key'=>'','email'=>'');

	if(false !== $options && isset($options['general'])){
		if(isset($options['general']['to-team_api_key']) && '' !== $options['general']['to-team_api_key']){
			$data['api_key'] = $options['general']['to-team_api_key'];
		}
		if(isset($options['general']['to-team_email']) && '' !== $options['general']['to-team_email']){
			$data['email'] = $options['general']['to-team_email'];
		}		
	}

	$api_array = array(
		'product_id'	=>		'TO Team',
		'version'		=>		'1.0.0',
		'instance'		=>		get_option('lsx_api_instance',false),
		'email'			=>		$data['email'],
		'api_key'		=>		$data['api_key'],
		'file'			=>		'to-team.php'
	);
	$lsx_to_api_manager = new LSX_API_Manager($api_array);
}
add_action('admin_init','to_team_api_admin_init');

/* ======================= Below is the Plugin Class init ========================= */

require_once( TO_TEAM_PATH . '/classes/class-to-team.php' );