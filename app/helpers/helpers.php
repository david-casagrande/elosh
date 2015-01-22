<?php

  class Custom_Post_Type {

    function __construct($args) {
      $this->args = isset($args) ? $args : array();
      $this->post_type = isset($this->args['post_type']) ? $this->args['post_type'] : '';
      $this->post = array(
        'label' => isset($args['post_label']) ? $args['post_label'] : '',
        'description' => isset($args['post_new_item_label']) ? $args['post_new_item_label'] : 'Add New',
        'slug' => isset($args['post_slug']) ? $args['post_slug'] : $this->post_type,
        'supports' => isset($args['post_supports']) ? $args['post_supports'] : array('title', 'editor', 'custom-fields', 'author'),
        'menu_icon' => isset($args['post_menu_icon']) ? get_template_directory_uri().'/assets/images/wp-interface/'.$args['post_menu_icon'] : false,
        'hierarchical' => isset($args['hierarchical']) ? $args['hierarchical'] : false
      );

      $this->taxonomy_type = isset($this->args['taxonomy_type']) ? $this->args['taxonomy_type'] : '';
      $this->taxonomy = array(
        'label' => isset($args['taxonomy_label']) ? $args['taxonomy_label'] : '',
        'slug' => isset($args['taxonomy_slug']) ? $args['taxonomy_slug'] : $this->taxonomy_type
      );
      if( !post_type_exists( $this->post_type ) ) {
        add_action('init', array( &$this,'register_post_type') );
      }
    }

    public function register_post_type(){
      $post = $this->post;
      $args = array(
        'label' => __( $post['label'] ),
        'description' => __( $post['description'] ),
        'public' => true,
        'show_ui' => true,
          'capability_type' => 'post',
        'menu_position'=> 4,
        'hierarchical' => $post['hierarchical'],
        'menu_icon' => $post['menu_icon'],
        'supports' => $post['supports'],
        'rewrite' => array('slug' => $post['slug']),
        'has_archive' => $post['slug']
      );
      register_post_type( $this->post_type, $args);
    }

    public function register_custom_taxonomy(){
      $tax = $this->taxonomy;
      $label = $tax['label'];
        $labels = array(
            'name'                       => _x( $label.' Categories', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( $label, 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( $label.' Categories', 'text_domain' ),
            'all_items'                  => __( 'All '.$label.' Categories', 'text_domain' ),
            'parent_item'                => __( 'Parent '.$label.' Category', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent '.$label.' Category:', 'text_domain' ),
            'new_item_name'              => __( 'New '.$label.' Categories', 'text_domain' ),
            'add_new_item'               => __( 'Add New '.$label.' Category', 'text_domain' ),
            'edit_item'                  => __( 'Edit '.$label.' Category', 'text_domain' ),
            'update_item'                => __( 'Update '.$label.' Category', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate '.$label.' categories with commas', 'text_domain' ),
            'search_items'               => __( 'Search '.$label.' Categories', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or Remove '.$label.' Category', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used '.$label.' Categories', 'text_domain' ),
        );

        $rewrite = array(
            'slug'                       => $tax['slug'],
            'with_front'                 => true,
            'hierarchical'               => true,
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'query_var'                  => $this->taxonomy_type.'-category',
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( $this->taxonomy_type, array($this->post_type), $args );
    }

    public function create_custom_taxonomy(){
      add_action( 'init', array(&$this, 'register_custom_taxonomy'), 0 );
    }
  }

  class Enque_Script {
    function __construct($args) {
      $this->args = isset($args) ? $args : array();
      add_action('wp_enqueue_scripts', array( &$this,'register_and_enque') );
    }
    public function register_and_enque(){
      $script = array(
        'name'       => isset($this->args['script']) ? $this->args['script'] : false,
        'src'        => isset($this->args['src']) ? $this->args['src'] : false,
        'deps'       => isset($this->args['script_dependencies']) ? $this->args['script_dependencies'] : false,
        'ver'        => isset($this->args['script_version']) ? $this->args['script_version'] : false,
        'in_footer'  => isset($this->args['load_in_footer']) ? $this->args['load_in_footer'] : false,
        'use_wp_lib' => isset($this->args['use_wp_lib']) ? $this->args['use_wp_lib'] : false,
        'style' => isset($this->args['style']) ? $this->args['style'] : false
      );

      //check for required
      if($script['name'] && $script['src']) {
        wp_register_script( $script['name'], $script['src'], $script['deps'], $script['ver'], $script['in_footer'] );
        wp_enqueue_script( $script['name'] );
      }

      if($script['style'] && $script['src']) {
        wp_enqueue_style($script['style'], $script['src'], $script['deps'], $script['ver'], $script['in_footer'] );
        wp_enqueue_script( $script['name'] );
      }

      if($script['name'] && $script['use_wp_lib']) {
        wp_enqueue_script( $script['name'] );
      }
    }
  }
?>
