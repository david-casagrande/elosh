<?php

  //GET POST TYPE: artwork
  function get_artwork_callback($str = false) {
    $cacheKey = 'artwork';
    $cache = get_transient($cacheKey);

    if(!$str) {
      @header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
    }
    if( is_user_logged_in() || empty($cache) ) {

      $args = array(
        'post_type' => array('artwork'),
        'posts_per_page'=> -1,
        'post_status' => (is_user_logged_in() ? 'any' : 'publish')
      );
      $query = new WP_Query( $args );
      $all = array();

      while ( $query->have_posts() ) : $query->the_post();

        $categories = get_the_terms( get_the_ID(), 'artwork-category' );
        $cat_slugs = array();
        foreach ($categories as $cat){
            $cat_slugs[] = $cat->slug;
        };

        $a = array(
          'id'          => get_the_ID(),
          'title'       => get_field('title'),
          'medium'      => get_field('medium'),
          'description' => get_field('description'),
          'thumbnail'   => get_field('thumbnail'),
          'image'       => get_field('image'),
          'categories'  => $cat_slugs,
          //'categories'  => get_the_terms( get_the_ID(), 'artwork-category' ),
          'slug'        => $query->post->post_name
        );
        $all[] = $a;
      endwhile;

      $all = json_encode(array('artworks' => $all));
      set_transient( $cacheKey, $all, YEAR_IN_SECONDS);
      echo $all;

      wp_reset_postdata();
    }
    else {
      echo $cache;
    }

    if(!$str) { die(); }
  }
  add_action( 'wp_ajax_nopriv_get_artwork', 'get_artwork_callback' );
  add_action( 'wp_ajax_get_artwork', 'get_artwork_callback' );

?>
