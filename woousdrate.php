<?php

 /**
 * @package LogicEmpower
 */

 /**
 * Plugin Name: Woo USD Rate
 * Plugin URI: https://www.logicempower.com/contact-us
 * Description: With this plugin, you can save your woocommerce products in USD and give for each category a rate for your currenct
 * Version: 1.0
 * Author: Logic Empower
 * Author URI: https://www.logicempower.com
 */

 // If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ):
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

/**
 * The code that runs during plugin activation
 */
function activate_logicempower() 
{
	LogicInc\Base\Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_logicempower() 
{
	LogicInc\Base\Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_logicempower' );
register_deactivation_hook( __FILE__, 'deactivate_logicempower' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'LogicInc\\Init' ) ):
	LogicInc\Init::register_services();
endif;