<?php
$dir = get_template_directory_uri().'/assets/javascripts';

$vendor_dir = get_template_directory_uri().'/bower_components';

$scripts = array(
  array('script' => 'jquery',     'use_wp_lib' => true, 'script_version' => '1.10.1'  ),
  array('script' => 'less',       'script_src' => $dir.'/libs/less.min.js' ),
  array('script' => 'handlebars', 'script_src' => $dir.'/libs/handlebars.js' ),
  array('script' => 'ember',      'script_src' => $dir.'/libs/ember.js' ),
  array('script' => 'ember_data', 'script_src' => $dir.'/libs/ember-data.js'),
  array('script' => 'foundation',  'script_src' => $dir.'/libs/foundation.min.js'),

  array('script' => 'narrative',  'script_src' => $dir.'/helpers/narrative.js'),

  array('script' => 'application','script_src' => $dir.'/application/application.js'),
  array('script' => 'router','script_src' => $dir.'/application/config/router.js'),
  array('script' => 'adapter','script_src' => $dir.'/application/config/adapter.js'),
  array('script' => 'serializer','script_src' => $dir.'/application/config/serializer.js'),

  array('script' => 'categories_transform','script_src' => $dir.'/application/transformations/categories.js'),

  array('script' => 'show_art_modal','script_src' => $dir.'/application/mixins/show_art_modal.js'),
  array('script' => 'loading_screen_mixin','script_src' => $dir.'/application/mixins/loading_screen.js'),

  array('script' => 'application_route','script_src' => $dir.'/application/routes/application.js'),
  array('script' => 'loading_route','script_src' => $dir.'/application/routes/loading.js'),
  array('script' => 'about_route','script_src' => $dir.'/application/routes/about.js'),
  array('script' => 'artwork_route','script_src' => $dir.'/application/routes/artwork.js'),
  array('script' => 'book_route','script_src' => $dir.'/application/routes/books.js'),
  array('script' => 'book_main_route','script_src' => $dir.'/application/routes/books_main.js'),
  array('script' => 'index_route','script_src' => $dir.'/application/routes/index.js'),

  array('script' => 'application_controller','script_src' => $dir.'/application/controllers/application.js'),
  array('script' => 'artwork_controller','script_src' => $dir.'/application/controllers/artwork_category.js'),
  array('script' => 'artwork_modal_controller','script_src' => $dir.'/application/controllers/artwork_modal.js'),
  array('script' => 'about_controller','script_src' => $dir.'/application/controllers/about.js'),
  array('script' => 'book_pages_controller','script_src' => $dir.'/application/controllers/book_pages.js'),

  array('script' => 'navigation_view','script_src' => $dir.'/application/views/navigation.js'),
  array('script' => 'artwork_modal_view','script_src' => $dir.'/application/views/artwork_modal.js'),

  array('script' => 'artwork_category_model','script_src' => $dir.'/application/models/artwork_category.js'),
  array('script' => 'artwork_model','script_src' => $dir.'/application/models/artwork.js'),
  array('script' => 'about_model','script_src' => $dir.'/application/models/about.js'),
  array('script' => 'contact_model','script_src' => $dir.'/application/models/contact.js'),
  array('script' => 'book_model','script_src' => $dir.'/application/models/book.js'),
  array('script' => 'image_object_model','script_src' => $dir.'/application/models/image_object.js')

);

if(APP_ENVIRONMENT == 'production') {
  $scripts = array(
    array('script' => 'jquery',     'use_wp_lib' => true ),
    //array('script' => 'less',       'script_src' => $dir.'/libs/less.min.js' ),
    array('script' => 'handlebars', 'script_src' => $dir.'/libs/handlebars.min.js' ),
    array('script' => 'ember',      'script_src' => $dir.'/libs/ember.min.js' ),
    array('script' => 'ember_data', 'script_src' => $dir.'/libs/ember-data.min.js'),
    array('script' => 'foundation', 'script_src' => $dir.'/libs/foundation.min.js'),
    array('script' => 'app',        'script_src' => $dir.'/elosh_app.js')
  );
}

$client_dir = get_template_directory_uri().'/elosh-client/dist/assets/';

$scripts = array(
  array('script' => 'vendor',     'script_src' => $client_dir.'vendor.js' ),
  array('script' => 'elosh-client',     'script_src' => $client_dir.'elosh-client.js' )
);

foreach($scripts as $script) {
  $p = new Enque_Script($script);
}


?>
