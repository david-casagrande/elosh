<?php

$client_dir = get_template_directory_uri().'/elosh-client/bower_components/elosh-client/dist/assets/';
$bower_dir = get_template_directory_uri().'/elosh-client/bower_components/';

$scripts = array(
  array('script' => 'vendor',       'src' => $client_dir.'vendor.js', 'load_in_footer' => true ),
  array('script' => 'elosh-client', 'src' => $client_dir.'elosh-client.js', 'load_in_footer' => true ),
  array('style'  => 'foundation',   'src' => $bower_dir.'/foundation/css/foundation.css' ),
  array('style'  => 'app',          'src' => $client_dir.'elosh-client.css' )
);

foreach($scripts as $script) {
  $p = new Enque_Script($script);
}

?>
