<?php
/**
 * Plugin Name: MTN Momo WooCommerce Payment Gateway
 * Description: WooCommerce payment gateway for MTN Momo
 * Author: kazashim kuzasuwat
 * Author URI: http://cynojine.com
 * Version: 1.0.0
 * License: GNU GPLv3
 */

define( 'MOMOPAY_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
require_once( MOMOPAY_PLUGIN_DIR_PATH . 'mtn-momopay-php-sdk/lib/Momopay.php' );
require_once( MOMOPAY_PLUGIN_DIR_PATH . 'mtn-momopay-php-sdk/lib/EventHandlerInterface.php' );
require_once( MOMOPAY_PLUGIN_DIR_PATH . 'mtn-momopay-php-sdk/lib/MomopayEventHandler.php' );

use MTN\MomopayEventHandler;
use MTN\Momopay;

defined('ABSPATH') or die('No script kiddies please!');
if (!function_exists('Mtn_Pmp_Gateway_load')) {
    add_action('plugins_loaded', 'Mtn_Pmp_Gateway_load', 20);

    DEFINE('KKD_MTNPMP', "mtn-paidmembershipspro");

    function Mtn_Pmp_Gateway_load() 
    {
        // paid memberships pro required
        if (!class_exists('PMProGateway')) {
            return;
        }
 // plugin links
add_filter('plugin_action_links', 'PMProGateway_Mtn' 'plugin_action_links'), 10, 2);


// load classes init method
add_action('init', array('PMProGateway_Rave', 'init'));
