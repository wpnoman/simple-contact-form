<?php 

namespace simple_contact_form;

use simple_contact_form\Includes\Hook;

class  Scfn_Load{
    public function __construct(){

        require_once SCFN_INCLUDE_PATH . 'dependency.php';

        // Init Plugin
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
    }

    public function plugins_loaded() {

		// load textdomain
		load_plugin_textdomain( 'simple-contact-form', false, basename( dirname( __FILE__ ) ) . '/languages' );

		// run
        $this->Load();
	}

    public function Load(){

        new Hook();
    }

   
}