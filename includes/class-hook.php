<?php 

namespace simple_contact_form\Includes;
use simple_contact_form\Includes\Simple_contact_admin;
use simple_contact_form\Includes\Simple_contact_shortcode;

class Hook{
    public function __construct()
    {
        $this->scfn_cpt();
        $this->remove_visuals();

        $this->assets_loader();

        $this->shortcode();
    }

    public function scfn_cpt(){

        $scfn_cpt = new Simple_contact_admin();

        add_action( 'init', [ $scfn_cpt, 'simple_contact_form_cpt'], 0 );

        add_filter('manage_simple_contact_form_posts_columns', [ $scfn_cpt, 'scf_add_custom_column']);

        add_action('manage_simple_contact_form_posts_custom_column', [ $scfn_cpt, 'scf_custom_column_content' ], 10, 2);

    }
    

    public function remove_visuals(){
        
        // function disable_richedit_for_simple_contact_form($can_edit) 
        add_filter('user_can_richedit', function( $can_edit ){
            
                // Check if we are in the admin area
                if (is_admin()) {
                    // Get the current screen object
                    $screen = get_current_screen();
            
                    // Check if the screen exists and if the post type is 'simple_contact_form'
                    if ($screen && $screen->post_type === 'simple_contact_form') {
                        return false; // Disable the rich editor
                    }
                }
                return $can_edit; // Return the default behavior for other post types
            
        }, 50);
        

    }

    public function assets_loader(){
        add_action( 'admin_enqueue_scripts', [ 'simple_contact_form\Includes\Assets_loader', 'load_admin_scripts']);
    }
    

    public function shortcode(){
        $shortcode = new Simple_contact_shortcode();
        add_shortcode('simple-contact-form', [ $shortcode, 'form_shortcode' ]);
    }
}