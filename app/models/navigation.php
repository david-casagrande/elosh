<?php 
  function register_navigation() {
    register_nav_menus(
      array(
          'navigation' => __( 'Navigation' )
      )
    );
  }
  add_action( 'init', 'register_navigation' );
?>