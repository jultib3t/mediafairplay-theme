<?php

function wpexplorer_login_logo()
{ ?>
  <style type="text/css">
    /* body {
            background: #000 !important;
        } */
    body {
      background: linear-gradient(-45deg, #020024, #090979, #0647a2, #000000) !important;
      background-size: 400% 400% !important;
      animation: gradient 15s ease infinite !important;
      font-family: Arial, Helvetica, sans-serif;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    body.login div#login h1 a {
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/mediafairplay-logo.png');
      padding-bottom: 30px;
    }

    body.login div#login h1 a {
      background-size: 100% 100%;
      width: 180px;
      height: 140px;
    }

    .login form {
      background: transparent !important;
      border: none !important;
    }

    .login form p.forgetmenot {
      display: none !important;
    }

    .login #nav {
      display: none !important;
    }

    .login p#backtoblog {
      display: none !important;
    }

    input#wp-submit {
      width: 100%;
      background: #96aa00 !important;
      border: none !important;
    }

    .login form {
      margin-top: 0px !important;
      padding-top: 10px !important;
    }

    div#login .login form {
      margin-top: 10px !important;
    }

    #login form .login label {
      color: #fff !important;
    }

    #login form p label {
      color: #fff;
    }

    .login label {
      color: #fff;
    }


    .anony-wrapper {
      max-width: 400px;
      background: #9e9e9e;
      width: 100%;
      height: 120px;
      position: absolute;
      left: 10px;
      top: 10px;
      display: flex;
      flex-direction: row;
      border-left: 6px solid #f44336;
    }

    .anony-wrapper .anony-image img {
      max-width: 120px;
      width: 100%;
      height: auto;
    }

    .anony-text {
      display: flex;
      flex-direction: column;
    }

    .alert-message-default {
      background-color: #eee;
      border-color: #b4b4b4;
    }

    .alert-message-default h4 {
      color: #000;
    }

    .anony-image {
      width: 130px;
      display: flex;
      align-items: center;
    }

    .anony-text {
      justify-content: center;
    }

    span#gfg {
      font-weight: bold;
      margin-bottom: 8px;
    }

    span.phrase {
      font-size: 11px;
      margin-top: 10px;
    }

    @media(max-width: 1000px) {
      .anony-wrapper {
        display: none;
      }
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'wpexplorer_login_logo');

function mfp_login_scripts()
{
  wp_enqueue_script('myscript', get_bloginfo('template_directory') . '/js/login.js', array('jquery'), '', true);
}
add_action('login_footer', 'mfp_login_scripts');
