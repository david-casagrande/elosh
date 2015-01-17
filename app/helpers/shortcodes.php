<?php 
function title( $atts, $content = null ) {  
  return $content ? '<span class="title">'.trim($content).'</span>' : '';  
}  
add_shortcode('title', 'title');
?>