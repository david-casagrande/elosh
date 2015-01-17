<?php 
	function get_navigation_callback($str = true) {
		$locations = get_nav_menu_locations();  
		$menu = wp_get_nav_menu_object( $locations[ 'navigation' ] ); 
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		foreach ($menu_items as $item) {
			$i = array(
				'url' => $item->url,
				'classes' => implode(' ', $item->classes),
				'title' => $item->title,
				'object_id' => $item->object_id,
				'post_name' => $item->post_name,
				'post_parent' => $item->post_parent,
				'menu_item_parent' => $item->menu_item_parent,
				'menu_order' => $item->menu_order
			);
		}
		echo '<pre>';
		echo json_encode($menu_items);
		echo '</pre>';
	}
	add_action( 'wp_ajax_nopriv_get_navigation', 'get_navigation_callback' );  
	add_action( 'wp_ajax_get_navigation', 'get_navigation_callback' ); 
?>