<?php 

namespace simple_contact_form\Includes;

class Simple_contact_shortcode{

    public function form_shortcode($atts) {
        // Set default attributes and extract the provided attributes
        $atts = shortcode_atts(
            array(
                'id' => '', // Default value for ID is empty
            ),
            $atts,
            'simple-contact-form' // Shortcode name
        );
    
        // Get the ID from the shortcode attributes
        $id = intval($atts['id']); // Convert to integer for security
    
        // Check if ID is provided
        if ($id) {
            // Example content retrieval based on ID

            ob_start();
            $this->retrive_form_content($id);
            return ob_get_clean();

        } else {
            return 'No ID provided.';
        }
    }
    public function retrive_form_content($id){
        // return '<h2>' . esc_html($post->post_title) . '</h2>';
        $post = get_post(post: $id);
    
            if ($post) {
                // Return the post title as an example, or customize this as needed

                $pattern = "/input/i";
                if ( preg_match($pattern, $post->post_content) ){

                    $this->form_header_start();
                    echo $post->post_content;
                    $this->submit_button();
                }

            } else {
                return 'Form not found.';
            }
    }

    private function submit_button(){
        echo '<input type="submit" value="Submit">';
    }
    
    private function form_header_start(){
        echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
    }
    private function form_header_end(){
        echo '</form>';
    }
}