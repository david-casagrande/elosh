<?php
  $args = array(
    'post_type' => 'books',
    'post_label' => 'Books',
    'post_new_item_label' => 'Add a New Book',
    'post_slug' => 'books',
    'post_menu_icon' => 'book-open.png',
  );
  
  //create new CustomPostType
  $p = new Custom_Post_Type($args); 

?>
