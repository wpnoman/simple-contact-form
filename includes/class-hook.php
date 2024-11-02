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
        
        global $pagenow;

        // If current page is post.php and post isset than query for its post type 
        if ( 'post.php' === $pagenow || 'post-new.php' === $pagenow && isset($_GET['post_type']) && 'simple_contact_form' == $_GET['post_type'] ){
            add_filter( 'user_can_richedit' , '__return_false', 50 );
        }

    }

    public function assets_loader(){
        add_action( 'admin_enqueue_scripts', [ 'simple_contact_form\Includes\Assets_loader', 'load_admin_scripts']);
    }
    

    public function shortcode(){
        $shortcode = new Simple_contact_shortcode();
        add_shortcode('simple-contact-form', [ $shortcode, 'form_shortcode' ]);
    }
}