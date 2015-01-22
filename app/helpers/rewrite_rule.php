<?php
function custom_rewrite_rule() {
  add_rewrite_rule('([^/]*)/([^/]*)/([^/]*)/?','index.php','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);
?>
