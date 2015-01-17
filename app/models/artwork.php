<?php
	$args = array(
		'post_type' => 'artwork',
		'post_label' => 'Artwork',
		'post_new_item_label' => 'Add New Artwork',
		'post_slug' => 'artwork',
		'post_menu_icon' => 'palette.png',
		'taxonomy_type' => 'artwork-category',
		'taxonomy_label' => 'Artwork',
		'taxonomy_slug' => 'artwork'
	);
	
	//create new CustomPostType
	$p = new Custom_Post_Type($args); 

	//create custom taxonomy based on your post, if you dont want to create taxonomy dont call this function
	$p->create_custom_taxonomy();
?>
