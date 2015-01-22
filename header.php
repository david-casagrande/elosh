<!DOCTYPE html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo( 'name' ); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?php bloginfo('description'); ?>" />

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/assets/css/ie.css'; ?>" media="screen" />
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php if( is_user_logged_in() ) { ?>
  <style>
    /* #app-window > .margin, #modal > .margin, #left-nav .brand, #loading-screen .margin { margin-top: 28px; } */
  </style>
<?php } ?>

<?php wp_head(); ?>

</head>
<body>
