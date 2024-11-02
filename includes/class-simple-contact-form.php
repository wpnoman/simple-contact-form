<?php 

namespace simple_contact_form\Includes;

class Simple_contact_form{
    public static function simple_contact_form_cpt() {
        $labels = array(
            'name'                  => _x( 'Simples Contact Forms', 'Post Type General Name', 'textdomain' ),
            'singular_name'         => _x( 'Simples Contact Form', 'Post Type Singular Name', 'textdomain' ),
            'menu_name'             => __( 'Simples Forms', 'textdomain' ),
            'name_admin_bar'        => __( 'Simples Contact Form', 'textdomain' ),
            'archives'              => __( 'Item Archives', 'textdomain' ),
            'attributes'            => __( 'Item Attributes', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'textdomain' ),
            'all_items'             => __( 'All Forms', 'textdomain' ),
            'add_new_item'          => __( 'Add New Form', 'textdomain' ),
            'add_new'               => __( 'Add New', 'textdomain' ),
            'new_item'              => __( 'New Form', 'textdomain' ),
            'edit_item'             => __( 'Edit Form', 'textdomain' ),
            'update_item'           => __( 'Update Form', 'textdomain' ),
            'view_item'             => __( 'View Form', 'textdomain' ),
            'view_items'            => __( 'View Forms', 'textdomain' ),
            'search_items'          => __( 'Search Form', 'textdomain' ),
            'not_found'             => __( 'Not found', 'textdomain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'textdomain' ),
            'featured_image'        => __( 'Featured Image', 'textdomain' ),
            'set_featured_image'    => __( 'Set featured image', 'textdomain' ),
            'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
            'use_featured_image'    => __( 'Use as featured image', 'textdomain' ),
            'insert_into_item'      => __( 'Insert into form', 'textdomain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this form', 'textdomain' ),
            'items_list'            => __( 'Forms list', 'textdomain' ),
            'items_list_navigation' => __( 'Forms list navigation', 'textdomain' ),
            'filter_items_list'     => __( 'Filter forms list', 'textdomain' ),
        );
        
        $args = array(
            'label'                 => __( 'Simples Contact Form', 'textdomain' ),
            'description'           => __( 'Custom post type for Simples Contact Forms', 'textdomain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-email',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
        );
        
        register_post_type( 'simple_contact_form', $args );
    }

    function scf_add_custom_column($columns) {
        
        // Create an array to hold the reordered columns
        $new_columns = array();
        
        // Loop through existing columns and add them to the new array
        foreach ($columns as $key => $value) {
            // Add your custom column right before the "date" column
            if ($key == 'date') {
                $new_columns['scfn_shortcode'] = 'Shortcode';
            }
            $new_columns[$key] = $value;
        }
        
        return $new_columns;
    }

    function scf_custom_column_content($column, $post_id) {
        if ($column == 'scfn_shortcode') {
            $string = '[simple-contact-form id="' . get_the_ID().'"]';
            // echo $string;
            echo "<input text='text' value=' $string ' class='regular-text'>";
        }
    }
    
}