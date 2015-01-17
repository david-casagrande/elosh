<?php

    $args = array(
        'post_type' => 'blog',
        'post_label' => 'Blog',
        'post_new_item_label' => 'Add A New Blog Entry',
        'post_slug' => 'blog',
        'post_menu_icon' => 'blog-blue.png',
        'taxonomy_type' => 'blog-category',
        'taxonomy_label' => 'Blog',
        'taxonomy_slug' => 'blogs'
    );
    
    //create new CustomPostType
    $p = new Custom_Post_Type($args); 

    //create custom taxonomy based on your post, if you dont want to create taxonomy dont call this function
    $p->create_custom_taxonomy();
    
?>