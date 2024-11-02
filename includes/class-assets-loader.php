<?php

namespace simple_contact_form\Includes;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly.

class Assets_loader {

	/**
	 *
	 * Load css/js for public users
	 *
	 * @since  1.0.0
	 */
	public function load_public_scripts() {

	}


	/**
	 *
	 * Build Scripts for Admin
	 *
	 * @since  1.0.0
	 */
	public static function load_admin_scripts( $admin_page ) {

		wp_enqueue_script(  'tinymce-admin', SCFN_ASSETS . 'js/tinymce.js', ['jquery'], SCFN_VERSION, true );
	}

}