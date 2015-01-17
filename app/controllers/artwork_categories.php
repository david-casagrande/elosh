<?php 
  function get_artwork_categories_callback($str = false) {
    $cacheKey = 'artwork_categories';
    $cache = get_transient($cacheKey);

    if( is_user_logged_in() || empty($cache) ) {
      $categories = get_categories(array('taxonomy'=>'artwork-category') );
      echo json_encode(array('artwork_categories' => $categories));
      set_transient( $cacheKey, $categories, 60*60*12 );
      wp_reset_postdata();
    }
    else {
      echo json_encode(array('artwork_categories' => $cache));
    }
    if(!$str) { die(); }  
  }
  add_action( 'wp_ajax_nopriv_get_artwork_categories', 'get_artwork_categories_callback' ); 
  add_action( 'wp_ajax_get_artwork_categories', 'get_artwork_categories_callback' ); 
?>