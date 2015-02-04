<?php

$client_dir = get_template_directory_uri().'/assets/dist/assets/';
$foundation_dir = get_template_directory_uri().'\/assets/';

if(defined('APP_ENVIRONMENT') && constant('APP_ENVIRONMENT') == 'production') {
  $client_dir = get_template_directory_uri().'/assets/dist_production/assets/';
}

$scripts = array(
  array('script' => 'vendor',       'src' => $client_dir.'vendor.js', 'load_in_footer' => true ),
  array('script' => 'elosh-client', 'src' => $client_dir.'elosh-client.js', 'load_in_footer' => true ),
  array('style'  => 'foundation',   'src' => $foundation_dir.'foundation.min.css' ),
  array('style'  => 'elosh-css',    'src' => $client_dir.'elosh-client.css' )
);

foreach($scripts as $script) {
  $p = new Enque_Script($script);
}

?>
