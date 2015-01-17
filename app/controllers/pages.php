<?php 

    //GET PAGES:
    function get_pages_callback($str = false) {
        $args = array(
            'post_type' =>'page',
            'post_status' => (is_user_logged_in() ? 'any' : 'publish')
        );
        $query = new WP_Query( $args );
        $all = array();

        while ( $query->have_posts() ) : $query->the_post();
            $p = array(
                'title' => get_the_title(),
                'content' => get_the_content(),
                'slug' => $query->post->post_name,
                'page_id' => get_the_ID()
            );
            $all[] = $p;
        endwhile;
        
        $all = json_encode($all);
        
        if($str) {
            echo $all;
            wp_reset_postdata();        
        }
        else {
            echo $all;
            wp_reset_postdata();
            die();    
        }  
    }
    add_action( 'wp_ajax_nopriv_get_pages', 'get_pages_callback' ); 
    add_action( 'wp_ajax_get_pages', 'get_pages_callback' ); 

?>
