<?php 

/*
 * Plugin Name:       Simple Contact Form
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            WP Noman
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * Text Domain:       simple-contact-form
 * Domain Path:       /languages
 */

//  prefix scfn



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Define constance
 */

define( 'SCFN_VERSION', '1.0.0' );
define( 'SCFN_SLUG', 'simple-contact-form' );
define( 'SCFN_ADDONS_BASE', plugin_basename( __FILE__ ) );
define( 'SCFN_ADDONS_URL', plugins_url( '/', __FILE__ ) );
define( 'SCFN_ADDONS_DIR', dirname( __FILE__ ) );
define( 'SCFN_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'SCFN_ASSETS', SCFN_ADDONS_URL . 'assets/' );
define( 'SCFN_INCLUDE_PATH', SCFN_ADDONS_DIR . '/includes/' );
define( 'SCFN_TEMPLATE_PATH', SCFN_ADDONS_DIR . '/includes/templates/' );
define( 'SCFN_ASSETS_PATH', wp_upload_dir()['basedir'] . '/' . SCFN_SLUG . '/' );
define( 'SCFN_ASSETS_URI', wp_upload_dir()['baseurl'] . '/' . SCFN_SLUG . '/' );


require_once SCFN_ADDONS_DIR . '/load.php';
if( class_exists('simple_contact_form\Scfn_Load' )){
    new simple_contact_form\Scfn_Load();
}


