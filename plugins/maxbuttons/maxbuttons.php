<?php
/*
Plugin Name: MaxButtons
Plugin URI: http://maxbuttons.com
Description: The best WordPress button generator. This is the free version; the Pro version <a href="http://maxbuttons.com/?ref=mbfree">can be found here</a>.
Version: 7.13.3
Author: Max Foundry
Author URI: http://maxfoundry.com
Text Domain: maxbuttons
Domain Path: /languages

Copyright 2019 Max Foundry, LLC (http://maxfoundry.com)
*/
namespace MaxButtons;

if (! defined('MAXBUTTONS_ROOT_FILE'))
	define("MAXBUTTONS_ROOT_FILE", __FILE__);
if (! defined('MAXBUTTONS_VERSION_NUM'))
	define('MAXBUTTONS_VERSION_NUM', '7.13.3');

define('MAXBUTTONS_RELEASE',"11 November 2019");

if (! function_exists('MaxButtons\maxbutton_double_load'))
{
	function maxbutton_double_load()
	{
		$message =  __("Already found an instance of MaxButtons running. Please check if you are trying to activate two MaxButtons plugins and deactivate one. ","maxbuttons" );
		echo "<div class='error'><h4>$message</h4></div>";
		return;
	}
}

if (function_exists("MaxButtons\MB"))
{
	add_action('admin_notices', 'MaxButtons\maxbutton_double_load');
	return;
}

// In case of development, copy this to wp-config.php
// define("MAXBUTTONS_DEBUG", true);
// define("MAXBUTTONS_BENCHMARK",true);

require_once( trailingslashit(dirname(MAXBUTTONS_ROOT_FILE)) . "classes/maxbuttons-class.php");

/*

// external libraries
if ( version_compare(PHP_VERSION, '5.4', '<' ) )
{
		require_once("assets/libraries/scssphp_legacy/scss.inc.php");
}
else
{
	require_once("assets/libraries/scssphp/scss.inc.php");
}
require_once("assets/libraries/simple-template/simple_template.php");

if (! class_exists('simple_html_dom_node'))
	require_once("assets/libraries/simplehtmldom/simple_html_dom.php");
*/

// runtime.
if (! function_exists("MaxButtons\MB"))	{
	function MB()
	{
		return maxButtonsPlugin::getInstance();
	}
}
$m = new maxButtonsPlugin();
do_action('maxbuttons/plugin/init' , $m);

// Activation / deactivation
register_activation_hook(__FILE__, array(maxUtils::namespaceit("maxInstall"),'activation_hook') );
register_deactivation_hook(__FILE__,array(maxUtils::namespaceit("maxInstall"), 'deactivation_hook') );
