<?php
		//GET POST TYPE: blog
		function get_blog_callback($str = false) {
				$paged = ( isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1 );
				$posts_per_page = ( isset($_REQUEST['posts_per_page']) ? $_REQUEST['posts_per_page'] : 20 );
				$page = ( isset($_REQUEST['page']) && $_REQUEST['page'] != 'false' ? $_REQUEST['page'] : false);
				$transient = ($page != false && $page != 'page' ? 'blog_'.$page : 'blog_'.$paged);

				//if ( get_transient($transient) == false || is_user_logged_in() ) {
						$args = array(
								'post_type' => array('blog'),
								'posts_per_page'=> $posts_per_page,    
								'paged' => $paged,
								'post_status' => (is_user_logged_in() ? 'any' : 'publish')                          
						);
						if($page != false && $page != 'page') {
								$args['name'] = $page;
						}
						$query = new WP_Query( $args );
						$all = array();

						while ( $query->have_posts() ) : $query->the_post();
								
								$categories = get_the_terms( get_the_ID(), 'blog-category' );
								$cat_slugs = array();
								foreach ($categories as $cat){
										$cat_slugs[] = $cat->slug;
								};

								$a = array(
										'title' => get_the_title(),
										'content' => get_the_content(),
										'categories_array' => $cat_slugs,
										'categories' => $categories,
										'slug' => $query->post->post_name,
										'post_id' => get_the_ID()
								);
								$all[] = $a;
						endwhile;
						$all = json_encode($all);
						set_transient( $transient, $all, 60*60*12 );
						wp_reset_postdata();
				//}
				//else {
				//    $all = get_transient($transient);
				//}

				echo $all;
				
				if($str != true) {
						die(); 
				}
		}
		add_action( 'wp_ajax_nopriv_get_blog', 'get_blog_callback' ); 
		add_action( 'wp_ajax_get_blog', 'get_blog_callback' ); 
?>