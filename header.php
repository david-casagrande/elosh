<!DOCTYPE html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo( 'name' ); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?php bloginfo('description'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />


<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/assets/css/foundation/stylesheets/app.css'; ?>" media="all" />

<?php if(/*APP_ENVIRONMENT == 'development'*/false) { ?>
  <script type="text/javascript">less = { env: 'development' }; </script>
  <link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri().'/assets/css/style.less'; ?>" media="all" />
<?php } else { ?>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/assets/css/style.css'; ?>" media="all" />
<?php } ?>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/assets/css/ie.css'; ?>" media="screen" />
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript">
    app = {};
    app.settings = {};
    app.util = {};
    app.settings.ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    app.settings.template_url = "<?php bloginfo('stylesheet_directory'); ?>/assets/templates/";
    app.isAdmin = false;
    app.development =  <?php echo APP_ENVIRONMENT == 'development' ?  'true' :  'false'; ?>
</script>

<?php if( is_user_logged_in() ) { ?>
  <style>
    #app-window > .margin, #modal > .margin, #left-nav .brand, #loading-screen .margin { margin-top: 28px; }
  </style>
  <script type="text/javascript">
      app.isAdmin = true;
  </script>

<?php } ?>

<meta name="elosh-client/config/environment" content="%7B%22modulePrefix%22%3A%22elosh-client%22%2C%22environment%22%3A%22development%22%2C%22baseURL%22%3A%22/%22%2C%22locationType%22%3A%22auto%22%2C%22EmberENV%22%3A%7B%22FEATURES%22%3A%7B%7D%7D%2C%22APP%22%3A%7B%22LOG_ACTIVE_GENERATION%22%3Atrue%2C%22LOG_VIEW_LOOKUPS%22%3Atrue%7D%2C%22contentSecurityPolicyHeader%22%3A%22Content-Security-Policy-Report-Only%22%2C%22contentSecurityPolicy%22%3A%7B%22default-src%22%3A%22%27none%27%22%2C%22script-src%22%3A%22%27self%27%20%27unsafe-eval%27%22%2C%22font-src%22%3A%22%27self%27%22%2C%22connect-src%22%3A%22%27self%27%22%2C%22img-src%22%3A%22%27self%27%22%2C%22style-src%22%3A%22%27self%27%22%2C%22media-src%22%3A%22%27self%27%22%7D%2C%22exportApplicationGlobal%22%3Atrue%7D" />

<?php wp_head(); ?>

</head>
<body>
