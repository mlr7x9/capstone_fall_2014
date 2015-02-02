<?php
/*
Plugin Name: bbp profile information
Plugin URL: http://www.rewweb.co.uk/bbp-profile-information/
Description: adds up to 4 fields to the bbp user profile and displays any combination of these under the authors avatar in topics and replies
Version: 1.1
Author: Robin Wilson
Author URI: http://www.rewweb.co.uk/
Contributors: Parts of code adapted from Pippin's Restrict Content plugin, with thanks.

*/


/*******************************************
* global variables
*******************************************/

// load the plugin options
$rpi_options = get_option( 'rpi_settings' );

if(!defined('RPI_PLUGIN_DIR'))
	define('RPI_PLUGIN_DIR', dirname(__FILE__));




/*******************************************
* file includes
*******************************************/

include(RPI_PLUGIN_DIR . '/includes/settings.php');
include(RPI_PLUGIN_DIR . '/includes/display.php');





