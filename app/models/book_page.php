<?php
  $args = array(
    'post_type' => 'book_page',
    'post_label' => 'Book Pages',
    'post_new_item_label' => 'Add New Book Page',
    'post_slug' => 'book_page',
    'post_menu_icon' => 'book-open-text-image.png'
  );
  
  //create new CustomPostType
  $p = new Custom_Post_Type($args); 
?>