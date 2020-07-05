<?php

    function my_login_logo() { ?>
        <style type="text/css">
            #login h1 a,
            .login h1 a {
                background-image: url(<?php get_template_directory_uri(); ?>/app/themes/theme/dist/images/logo.png);
                width: 320px;
        		height: 105px;
                background-size: contain;
                background-position: center;
        		background-repeat: no-repeat;
            }
        </style>
    <?php }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );

    function my_login_logo_url() {
        return home_url();
    }
    add_filter( 'login_headerurl', 'my_login_logo_url' );

    function my_login_logo_url_title() {
        return 'Meu Futuro COM VC';
    }
    add_filter( 'login_headertext', 'my_login_logo_url_title' );
