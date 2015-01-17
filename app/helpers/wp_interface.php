<?php 

    add_action( 'wp_head', 'adminStyles' );
    function adminStyles(){
        if( is_user_logged_in() ) {
            print(
            '<style>
                /* area for styles with wp admin bar */
            </style>'
            );
        }
    }

    // HIDE 'POSTS' TAB
    add_action( 'admin_head', 'wpt_portfolio_icons' );
    function wpt_portfolio_icons() {
        $url = get_template_directory_uri().'/assets/images/wp-interface';
        print(
        '<style type="text/css" media="screen">
            #post-body-content #postdivrich {display:none ;}
            #menu-posts, #wp-admin-bar-new-post, #menu-comments { display:none !important; }
            .wp-menu-image {overflow:hidden}
        </style>'
        );
    }

?>
