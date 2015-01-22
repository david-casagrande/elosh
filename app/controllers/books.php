<?php
  function get_books_callback($str = false) {

    $cacheKey = 'books';
    $cache = get_transient($cacheKey);
    if(!$str) {
      @header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
    }
    if( is_user_logged_in() || empty($cache) ) {

      $args = array(
        'post_type' => array('books'),
        'posts_per_page'=> -1,
        'post_status' => (is_user_logged_in() ? 'any' : 'publish')
      );
      $query = new WP_Query( $args );
      $all = array();

      while ( $query->have_posts() ) : $query->the_post();
        $a = array(
          'id'           => get_the_ID(),
          'title'        => get_field('title'),
          'title_notes'  => get_field('title_notes'),
          'banner_image' => get_field('banner_image'),
          'cover_image'  => get_field('cover_image'),
          'narrative'    => get_field('narrative'),
          'book_pages'   => get_field('book_pages'),
          'slug'         => str_replace('-', '_', $query->post->post_name)
        );

        //build related book_pages data array
        $book_pages = array();
        foreach ($a['book_pages'] as $book_page) {
          $b = array(
            'id'          => $book_page->ID,
            'title'       => get_field('title', $book_page->ID),
            'book_title'  => $a['title'],
            'medium'      => get_field('medium', $book_page->ID),
            'description' => get_field('description', $book_page->ID),
            'thumbnail'   => get_field('thumbnail', $book_page->ID),
            'image'       => get_field('image', $book_page->ID),
            'slug'        => $book_page->post_name
          );
          $book_pages[] = $b;
        }
        $a['book_pages'] = $book_pages;

        $all[] = $a;
      endwhile;

      $all = json_encode(array('books' => $all));
      set_transient( $cacheKey, $all, YEAR_IN_SECONDS);
      echo $all;
      wp_reset_postdata();
    }
    else {
      echo $cache;
    }

    if(!$str) { die(); }
  }
  add_action( 'wp_ajax_nopriv_get_books', 'get_books_callback' );
  add_action( 'wp_ajax_get_books', 'get_books_callback' );
?>
