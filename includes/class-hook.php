<?php 

namespace simple_contact_form\Includes;
// use simple_contact_form\Includes\Simple_contact_form;

class Hook{
    public function __construct()
    {
        $this->scfn_cpt();
        $this->remove_visuals();

        $this->assets_loader();
    }

    public function scfn_cpt(){
        add_action( 'init', [ 'simple_contact_form\Includes\Simple_contact_form', 'simple_contact_form_cpt'], 0 );

        // add_filter('manage_simple_contact_form_posts_columns', [ 'simple_contact_form\Includes\Simple_contact_form', 'scf_add_custom_column']);

        // add_filter('manage_edit-simple_contact_form_sortable_columns', [ 'simple_contact_form\Includes\Simple_contact_form' ,'scf_custom_column_sortable'] );

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
    
}