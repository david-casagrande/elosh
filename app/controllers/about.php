<?php 
  function get_about_callback($str = false) {
    $cacheKey = 'about';
    $cache = get_transient($cacheKey);
    
    if( is_user_logged_in() || empty($cache) ) {     

      $args = array(
          'pagename' =>'about'
      );
      $query = new WP_Query( $args );
      $all = array();

      while ( $query->have_posts() ) : $query->the_post();
        $p = array(
          'id'          => get_the_ID(),
          'image'       => get_field('image'),
          'narrative_one' => get_field('narrative_1'),
          'narrative_two' => get_field('narrative_2')
        );
        $all[] = $p;
      endwhile;
      
      $all = json_encode( array('about' => count($all) > 0 ? $all[0] : array() ));
      set_transient( $cacheKey, $all, YEAR_IN_SECONDS);
      echo $all;
      wp_reset_postdata();
    }
    else {
      echo $cache;
    }

    if(!$str) { die(); }

  }
  add_action( 'wp_ajax_nopriv_get_about', 'get_about_callback' ); 
  add_action( 'wp_ajax_get_about', 'get_about_callback' ); 
?>