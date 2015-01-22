<?php
  function get_contact_callback($str = false) {
    $cacheKey = 'contact';
    $cache = get_transient($cacheKey);
    if(!$str) {
      @header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
    }
    if( is_user_logged_in() || empty($cache) ) {

      $args = array(
          'pagename' =>'contact'
      );
      $query = new WP_Query( $args );
      $all = array();

      while ( $query->have_posts() ) : $query->the_post();
          $p = array(
            'id'                => get_the_ID(),
            'contact_narrative' => get_field('contact_narrative'),
            'email'             => get_field('email'),
            'phone'             => get_field('phone'),
            'store_link'        => get_field('store_link'),
            'twitter'           => get_field('twitter')
          );
          $all[] = $p;
      endwhile;

      $all = json_encode( array('contact' => count($all) > 0 ? $all[0] : array() ));
      set_transient( $cacheKey, $all, YEAR_IN_SECONDS);
      echo $all;
      wp_reset_postdata();
    }
    else {
      echo $cache;
    }
    if(!$str) { die(); }
  }
  add_action( 'wp_ajax_nopriv_get_contact', 'get_contact_callback' );
  add_action( 'wp_ajax_get_contact', 'get_contact_callback' );
?>
